<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Falculty;
use App\Models\Professor;
use App\Models\User;
use Carbon\Carbon;
use Exception;
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
                'fullname' => 'required|string|min:5',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'password-confirm' => 'required|string|min:8',
                'falculty' => 'required|exists:falculties,abbreviation',
                'refs' => 'required|exists:degress,abbreviation',
            ]
        );
        if ($valid['password'] != $valid['password-confirm']) {
            return back()->withErrors(['error' => 'Mật khẩu không trùng khớp!']);

        }
        try {
            User::create(
                [
                    'email' => $valid['email'],
                    'password' => Hash::make($valid['password']),
                    'role' => 'prof'
                ]
            );

            unset($valid['password']);
            unset($valid['password-confirm']);

            $valid = array_merge($valid, ['pid' => self::genPID()]); // add pid

            Professor::create(
                $valid
            );


            return redirect()->route('admin.professor.index')->with('success', 'Thêm thông tin giảng viên thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);

        }
    }


    public function updateInfor(Request $request, $id)
    {
        try {
            $valid = $request->validate(
                [
                    'fullname' => 'nullable|string|min:5',
                    'email' => 'nullable|email|unique:users,email',
                    'falculty' => 'required|exists:falculties,abbreviation',
                    'refs' => 'required|exists:degrees,abbreviation'
                ]
            );


            //whether email is modified or not
            $prof = Professor::where('pid', $id)->firstOrFail();
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
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);

        }
    }

    public function updatePassword(Request $request, $id)
    {
        try {
            $valid = $request->validate(
                [
                    'password' => 'required|string|min:8',
                    'password-confirm' => 'required|string|min:8'
                ]
            );
            if ($valid['password'] != $valid['password-confirm']) {
                return back()->with('error', 'Mật khẩu không trùng khớp!');
            }
            $prof_email = Professor::where('pid', $id)->firstOrFail()->email;
            $account = User::where('email', $prof_email)->firstOrFail();
            $account->update(
                [
                    'password' => Hash::make($valid['password'])
                ]
            );
            return back()->with('success', 'Cập nhật mật khẩu thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);

        }
    }


    public function destroy($id)
    {
        try {
            $prof = Professor::where('pid', $id)->firstOrFail();
            $account = User::where('email', $prof->email)->firstOrFail();

            $prof->delete();
            $account->delete();

            return back()->with('success', 'Xóa thông tin thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);

        }
    }

    private static function genPID()
    {
        return 'PKU' . '-' . md5(Carbon::now());
    }
}
