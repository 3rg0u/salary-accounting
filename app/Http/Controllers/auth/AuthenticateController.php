<?php

namespace App\Http\Controllers\auth;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AuthenticateController extends Controller
{
    public function showFormSignIn()
    {
        return view("auth.signin");
    }
    public function handleSignIn()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            /**
             * @var User $user
             */
            $user = Auth::user();
            if ($user->isProfessor()) {
                return redirect()->route('professor');
            } else if ($user->isAdmin()) {
                return redirect()->route('admin.falculty.index');
            }
            return redirect()->route('accountant.degree.index');
        }

        return back()->withErrors([
            'email' => 'Password or email is incorrect!',
        ])->onlyInput('email');
    }

    public function handleSignOut()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('signin');
    }
}
