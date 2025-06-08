<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Professor;
use App\Models\Salary;
use App\Models\Semester;
use Exception;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    //


    public function index()
    {
        $years = AcademicYear::all();
        return view('accountant.salary.index', ['years' => $years]);
    }

    public function eval_salary()
    {
        try {
            $semester = Semester::opening();
            $classes = $semester->openedClasses;
            foreach ($classes as $class) {
                $prof = $class->professor;
                $course = $class->course;
                $wage = AcademicYear::opening()->wage->amount;
                $att = $course->cls_hours * ($course->coeff + $class->coeff);
                $salary = $prof->degree->coeff * $att * $wage;

                $attributes = [
                    'year_code' => AcademicYear::opening()->code,
                    'sem_code' => $semester->code,
                    'prof_id' => $prof->pid,
                    'cls_code' => $class->code,
                ];
                Salary::updateOrCreate(

                    $attributes,
                    [
                        'amount' => $salary
                    ]
                );
            }
            return back()->with('success', 'Tính lương cho học kỳ hoàn tất!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function detail($semester)
    {
        try {
            $prof_bills = Salary::where('sem_code', $semester)->get()->groupBy('prof_id');
            return view('accountant.salary.detail', ['semester' => Semester::firstWhere('code', $semester), 'prof_bills' => $prof_bills]);
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
