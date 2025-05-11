<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Falculty;
use Illuminate\Http\Request;
use Throwable;

class FalcultyController extends Controller
{
    //
    public function index()
    {
        $data = Falculty::all();
        return view('admin.falculty.index', ['falculties' => $data]);
    }

    public function create()
    {
        return view('admin.falculty.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $valid = $request->validate(
            [
                'fullname' => 'required|unique:falculties',
                'abbreviation' => 'required:unique:falculties',
            ]
        );
        try {
            Falculty::create($valid);
        } catch (Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

        return redirect()->route('admin.falculty.index')->with('success', 'Tạo khoa mới thành công!');
    }

    public function update(Request $request, $id)
    {
        try {
            $falculty = Falculty::findOrFail($id);
            $data = $request->validate(
                [
                    'fullname' => 'required',
                    'abbreviation' => 'required'
                ]
            );

            $falculty->fill($data);
            $falculty->update($falculty->getDirty());
            return back()->with('success', 'Cập nhật thông tin thành công!');
        } catch (Throwable $exc) {
            return back()->with('error', 'Đã xảy ra lỗi!');
        }
    }

    public function destroy($id)
    {
        try {
            $falculty = Falculty::findOrFail($id);
            $falculty->delete();
            return back()->with('success', 'Xóa thông tin hoàn tất!');
        } catch (Throwable $exc) {
            return back()->with('error', 'Đã xảy ra lỗi!');
        }
    }
}
