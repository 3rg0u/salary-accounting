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
        $references = Degree::pluck('abbreviation');
        $falculties = Falculty::pluck('abbreviation');
        return view('admin.professor.index', ['professors' => $data, 'references' => $references, 'falculties' => $falculties]);
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


    public function updateInfor(Request $request, $id)
    {
        try {
            $valid = $request->validate(
                [
                    'fullname' => 'nullable',
                    'email' => 'nullable',
                    'falculty' => 'nullable',
                    'refs' => 'nullable'
                ]
            );


            //whether email is modified or not
            $prof = Professor::where('id', $id)->firstOrFail();
            $prof_email = $prof->email;
            if ($valid['email'] != null && $valid['email'] != $prof_email) {
                $account = User::where('email', $prof_email)->firstOrFail();
                $account->fill(
                    [
                        'email' => $valid['email']
                    ]
                );
                $account->update($account->getDirty());
            }
            unset($valid['email']); //ignore email cuz $prof->email is cascadeOnUpdate
            $prof->fill($valid);
            $prof->update($prof->getDirty());
            return back()->with('success', 'Cập nhật thông tin thành công!');
        } catch (Throwable $exc) {
            return back()->with('error', 'Đã có lỗi xảy ra!');
        }
    }

    public function updatePassword(Request $request, $id)
    {
        try {
            $valid = $request->validate(
                [
                    'password' => 'required',
                    'password-confirm' => 'required'
                ]
            );
            if ($valid['password'] != $valid['password-confirm']) {
                return back()->with('error', 'Mật khẩu không trùng khớp!');
            }
            $prof_email = Professor::where('id', $id)->firstOrFail()->email;
            $account = User::where('email', $prof_email)->firstOrFail();
            $account->update(
                [
                    'password' => Hash::make($valid['password'])
                ]
            );
            return back()->with('success', 'Cập nhật mật khẩu thành công!');
        } catch (Throwable $exc) {
            return back()->with('error', 'Đã có lỗi xảy ra!');
        }
    }


    public function destroy($id)
    {
        try {
            $prof = Professor::where('id', $id)->firstOrFail();
            $account = User::where('email', $prof->email)->firstOrFail();

            $prof->delete();
            $account->delete();

            return back()->with('success', 'Xóa thông tin thành công!');
        } catch (Throwable $exc) {
            return back()->with('error', 'Đã xảy ra lỗi!');
        }
    }
}
