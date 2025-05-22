<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Http\Request;
use Throwable;

class DegreeController extends Controller
{
    //
    public function index()
    {
        $data = Degree::all();
        return view('admin.degree.index', ['degrees' => $data]);
    }

    public function create()
    {
        return view('admin.degree.create');
    }


    public function store(Request $request)
    {
        $valid = $request->validate(
            [
                'fullname' => 'required|string|min:5|unique:falculties',
                'abbreviation' => 'required|string|min:2|max:15|unique:falculties',
                'coeff' => 'numeric|min:0|nullable'
            ]
        );

        try {
            Degree::create($valid);
            return redirect()->route('admin.degree.index')->with('success', 'Thêm danh mục mới thành công!');
        } catch (Throwable $exc) {
            return back()->withErrors(['error' => 'Đã có lỗi xảy ra!']);

        }
    }


    public function update(Request $request, $id)
    {
        try {
            $degree = Degree::findOrFail($id);
            $data = $request->validate(
                [
                    'fullname' => 'required|string|min:2',
                    'abbreviation' => 'required|string|min:2|max:15',
                    'coeff' => 'numeric|min:0|nullable'
                ]
            );

            $degree->fill($data);
            $degree->update($degree->getDirty());
            return back()->with('success', 'Cập nhật thông tin thành công!');
        } catch (Throwable $exc) {
            return back()->withErrors(['error' => 'Đã có lỗi xảy ra!']);

        }
    }


    public function destroy($id)
    {
        try {
            $degree = Degree::findOrFail($id);
            $degree->delete();
            return back()->with('success', 'Xóa thông tin hoàn tất!');
        } catch (Throwable $exc) {
            return back()->withErrors(['error' => 'Đã có lỗi xảy ra!']);

        }
    }

}
