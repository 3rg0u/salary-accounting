<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassCoeff;
use App\Models\Semester;
use App\Models\Wage;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class AcademicYearController extends Controller
{
    //

    public function index()
    {
        $years = AcademicYear::all();
        return view('admin.affairs.index', ['years' => $years]);
    }


    public function create()
    {
        return view('admin.affairs.create');
    }


    public function store(Request $request)
    {
        try {
            $valid = $request->validate(
                [
                    'start' => 'required|date',
                    'end' => 'required|date'
                ]
            );

            $start = Carbon::parse($valid['start']);
            $end = Carbon::parse($valid['end']);


            // if ($start->lt(Carbon::now()) || $end->lt(Carbon::now()))
            //     return back()->withErrors(['error' => "Không thể mở năm học mới trong quá khứ!"]);

            $conflict = AcademicYear::where('start', '<', $end)->where('end', '>', $start)->exists();
            if ($conflict)
                return back()->withErrors('Đã có năm học khác diễn ra trong thời gian này!');



            if ($start->gte($end)) {
                return back()->withErrors(['error' => 'Ngày bắt đầu năm học phải nằm trước ngày kết thúc năm học!']);
            }

            if ($start->diffInMonths($end) < 9) {
                return back()->withErrors(['error' => 'Một năm học phải kéo dài ít nhất 9 tháng!']);
            }

            $code = self::genCode($start, $end);
            AcademicYear::create(
                [
                    'code' => $code,
                    'start' => $start,
                    'end' => $end
                ]
            );

            Wage::create(
                [
                    'year_code' => $code,
                ]
            );

            ClassCoeff::create(
                [
                    'year_code' => $code
                ]
            );
            return redirect()->route('admin.affairs.index')->with('success', 'Mở năm học mới thành công!');

        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function show($code)
    {
        try {
            $year = AcademicYear::where('code', $code)->firstOrFail();
            return view('admin.affairs.show', ['year' => $year, 'semesters' => $year->semesters]);
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    private static function genCode(DateTime $start, DateTime $end)
    {
        return 'PKA_' . $start->format('Y') . '_' . $end->format('Y');
    }
}
