<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Falculty;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class ProfessorController extends Controller
{
    //

    public function index()
    {
        $data = Professor::all();
        return view('admin.professor.index', ['professors' => $data]);
    }


    public function create()
    {
        $references = Degree::pluck('abbreviation');
        $falculties = Falculty::pluck('abbreviation');
        return view('admin.professor.create', ['references' => $references, 'falculties' => $falculties]);
    }


    public function store(Request $request)
    {
        $valid = $request->validate(
            [
                'fullname' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'password-confirm' => 'required',
                'falculty' => 'nullable',
                'refs' => 'nullable',
            ]
        );
        if ($valid['password'] != $valid['password-confirm']) {
            return back()->with('error', 'Mật khẩu không trùng khớp!');
        }

        try {

            User::create(
                [
                    'email' => $valid['email'],
                    'password' => Hash::make($valid['password']),
                    'role' => 'prof'
                ]
            );
            Professor::create(
                [
                    'fullname' => $valid['fullname'],
                    'email' => $valid['email'],
                    'falculty' => $valid['falculty'],
                    'refs' => $valid['refs']
                ]
            );
            return redirect()->route('admin.professor.index')->with('success', 'Thêm thông tin giảng viên thành công!');
        } catch (Throwable $exc) {
            return back()->with('error', 'Đã xảy ra lỗi!');
        }
    }
}
