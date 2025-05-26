<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\Falculty;
use App\Models\OfferedCourse;
use App\Models\Semester;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\BackedEnumCaseNotFoundException;
use PhpParser\Node\Expr;
use Symfony\Component\Process\ExecutableFinder;

class CourseOfferingController extends Controller
{
    //

    public function index()
    {
        $semester = Semester::opening();
        $year = $semester->academicyear;
        $falculties = Falculty::all();
        return view('admin.classes.index', ['year' => $year, 'semester' => $semester, 'falculties' => $falculties]);
    }


    public function show($semes, $falculty)
    {
        try {
            $semester = Semester::where('code', $semes)->firstOrFail();
            $f = Falculty::where('abbreviation', $falculty)->firstOrFail();
            $courses = $f->openedcourses();
            return view('admin.classes.show', ['falculty' => $f, 'semester' => $semester, 'courses' => $courses]);
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function store(Request $request, $falculty)
    {
        try {
            $valid = $request->validate(
                [
                    'course_code' => 'required',
                    'cls_nums' => 'required|numeric|min:1',
                    'std_nums' => 'required|numeric|min:15|max:100'
                ]
            );
            $semester = Semester::opening();
            $cls_nums = (int) $valid['cls_nums'];
            unset($valid['cls_nums']);
            for ($i = 0; $i < $cls_nums; ++$i) {
                $data = array_merge(
                    $valid,
                    [
                        'falculty' => $falculty,
                        'sem_code' => $semester->code,
                        'code' => self::genCode()
                    ]
                );
                OfferedCourse::create($data);
                sleep(1);
            }
            return back()->with('success', 'Mở lớp thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function detail($semes, $course)
    {
        try {
            $c = Course::where('code', $course)->get()->firstOrFail();
            $semester = Semester::where('code', $semes)->get()->firstOrFail();
            $classes = Course::where('code', $course)->get()->firstOrFail()->ongoingclasses($semes);
            return view('admin.classes.detail', ['course' => $c, 'classes' => $classes, 'semester' => $semester]);
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function assign(Request $request, $class)
    {
        try {
            $professor = $request->validate(
                ['prof_id' => 'required|exists:professors,pid']
            );

            OfferedCourse::firstWhere('code', $class)->update($professor);
            return back()->with('success', 'Thêm giảng viên phụ trách thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function close($class)
    {
        try {
            OfferedCourse::firstWhere('code', $class)->delete();
            return back()->with('success', 'Đóng lớp hoàn tất!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function closeall($course)
    {
        try {
            OfferedCourse::where('course_code', $course)->delete();
            return back()->with('success', 'Đóng học phần thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function genCode()
    {
        return 'FSE' . '-' . md5(Carbon::now());
    }
}
