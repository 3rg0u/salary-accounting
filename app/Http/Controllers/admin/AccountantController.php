<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountantController extends Controller
{
    //


    public function index()
    {
        $accounts = User::where('role', 'accountant')->get();
        return view('admin.accounts.index', ['accounts' => $accounts]);
    }


    public function store(Request $request)
    {
        try {
            $valid = $request->validate(
                [
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8',
                    'password-confirm' => 'required|string|min:8'
                ]
            );
            if ($valid['password'] != $valid['password-confirm']) {
                return back()->withErrors(['error' => 'Mật khẩu không trùng khớp!']);
            }


            User::create(
                [
                    'email' => $valid['email'],
                    'password' => Hash::make($valid['password']),
                    'role' => 'accountant'
                ]
            );

            return back()->with('success', 'Tạo tài khoản thành công!');

        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
