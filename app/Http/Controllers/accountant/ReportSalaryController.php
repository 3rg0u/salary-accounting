<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Falculty;
use App\Models\Salary;
use App\Models\Semester;
use Exception;

class ReportSalaryController extends Controller
{
    //


    public function index()
    {
        $years = AcademicYear::with('salaries')->orderBy('end', 'asc')->skip(max(0, AcademicYear::count() - 5))->take(5)->get();
        return view('accountant.report.index', ['years' => $years]);
    }


    public function show($sem_code)
    {
        $faculties = Falculty::with([
            'salaries' => function ($query) use ($sem_code) {
                $query->where('sem_code', $sem_code);
            }
        ])->get();
        return view('accountant.report.semester', ['faculties' => $faculties, 'sem_code' => $sem_code]);
    }



    public function allIndex()
    {
        $years = AcademicYear::all();
        return view('accountant.report.all.index', ['years' => $years]);
    }


    public function allShow($sem_code)
    {
        try {
            $prof_bills = Salary::where('sem_code', $sem_code)->get()->groupBy('prof_id');
            return view('accountant.report.all.detail', ['semester' => Semester::firstWhere('code', $sem_code), 'prof_bills' => $prof_bills]);
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
