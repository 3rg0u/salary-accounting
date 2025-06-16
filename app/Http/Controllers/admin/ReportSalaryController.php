<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Falculty;
use App\Models\Salary;
use App\Models\Semester;
use Exception;
use Illuminate\Http\Request;

class ReportSalaryController extends Controller
{
    //


    public function index()
    {
        $years = AcademicYear::with('salaries')->orderBy('end', 'asc')->skip(max(0, AcademicYear::count() - 5))->take(5)->get();
        return view('admin.report.index', ['years' => $years]);
    }


    public function show($sem_code)
    {
        $faculties = Falculty::with([
            'salaries' => function ($query) use ($sem_code) {
                $query->where('sem_code', $sem_code);
            }
        ])->get();
        return view('admin.report.semester', ['faculties' => $faculties, 'sem_code' => $sem_code]);
    }



    public function allIndex()
    {
        $years = AcademicYear::all();
        return view('admin.report.all.index', ['years' => $years]);
    }


    public function allShow($sem_code)
    {
        try {
            $prof_bills = Salary::where('sem_code', $sem_code)->get()->groupBy('prof_id');
            return view('admin.report.all.detail', ['semester' => Semester::firstWhere('code', $sem_code), 'prof_bills' => $prof_bills]);
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
