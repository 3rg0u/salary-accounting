<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Semester;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    //

    public function store(Request $request, $year)
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


            $aca_year = AcademicYear::where('code', $year)->firstOrFail();


            $year_start = Carbon::parse($aca_year->start);
            $year_end = Carbon::parse($aca_year->end);

            $conflict = Semester::where('start', '<', $end)->where('end', '>', $start)->exists();
            if ($conflict)
                return back()->withErrors('Đã có kì học khác đang diễn ra trong thời gian này!');


            if ($start->lt($year_start))
                return back()->withErrors(['errors' => 'Ngày bắt đầu học kì không được nằm trước ngày bắt đầu của năm học!']);
            if ($end->gt($year_end))
                return back()->withErrors(['errors' => 'Ngày kết thúc học kì không được nằm sau ngày kết thúc năm học!']);

            if ($start->gte($end)) {
                return back()->withErrors(['error' => 'Ngày bắt đầu học kì phải nằm trước ngày kết thúc!']);
            }
            if ($start->diffInMonths($end) < 3) {
                return back()->withErrors(['error' => 'Một học kì phải diễn ra trong ít nhất 3 tháng!']);
            }

            $code = self::genCode($year_start, $year_end, $aca_year->semesters()->count());

            Semester::create(
                [
                    'code' => $code,
                    'aca_year' => $aca_year->code,
                    'start' => $start,
                    'end' => $end,
                ]
            );

            return back()->with('success', 'Mở học kì mới thành công!');

        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    private static function genCode($start, $end, $length)
    {
        return $start->format('Y') . '_' . $end->format('Y') . '_' . sprintf("%02d", $length + 1);
    }
}
