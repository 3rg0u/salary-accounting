<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;

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

            if ($start->gte($end)) {
                return back()->withErrors(['error' => 'Ngày kết thúc phải nằm sau ngày bắt đầu mở!']);
            }

            return back()->with('success', 'Mở năm học mới thành công!');

        } catch (Exception $err) {
            return back()->withErrors(['error' => 'Đã có lỗi xảy ra!']);
        }
    }


    private static function genCode(DateTime $start, DateTime $end)
    {
        return 'PKA_' . $start->format('Y') . '_' . $end->format('Y') . sprintf("%03d", AcademicYear::count());
    }
}
