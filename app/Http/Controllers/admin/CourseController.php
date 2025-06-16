<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Falculty;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index()
    {
        $falculties = Falculty::all();
        return view('admin.courses.index', ['falculties' => $falculties]);
    }

    public function show($falculty)
    {
        try {
            $f = Falculty::where('abbreviation', $falculty)->firstOrFail();
            $coures = $f->courses;
            return view('admin.courses.show', ['falculty' => $f, 'courses' => $coures]);
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function store(Request $request, $falculty)
    {
        try {

            $valid = $request->validate(
                [
                    'name' => 'required|string|min:5|max:50',
                    'cred_hours' => 'required|integer|min:1|max:10',
                    'cls_hours' => 'required|integer|min:15|max:45',
                    'coeff' => 'required|numeric|min:1|max:3'
                ]
            );

            $valid = array_merge($valid, ['falculty' => $falculty, 'code' => self::genCode()]);
            Course::create(
                $valid
            );

            return back()->with('success', 'Thêm học phần thành công!');


        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function update(Request $request, $code)
    {
        try {
            $valid = $request->validate(
                [
                    'name' => 'required|string|min:5|max:50|unique:courses',
                    'cred_hours' => 'required|numeric|min:1|max:10',
                    'cls_hours' => 'required|numeric|min:15|max:45',
                    'coeff' => 'nullable|numeric|min:1|max:3'
                ]

            );
            $course = Course::where('code', $code)->firstOrFail();
            $course->fill(
                $valid
            );
            $course->update($course->getDirty());
            return back()->with('success', 'Cập nhật thông tin cho học phần thành công!');

        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }


    public function destroy($code)
    {
        try {
            $course = Course::where('code', $code)->firstOrFail();
            $course->delete();
            return back()->with('success', 'Xóa bỏ học phần thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    private static function genCode()
    {
        return 'PKC' . '-' . md5(Carbon::now());
    }
}
