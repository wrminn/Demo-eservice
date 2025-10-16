<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AuthController extends Controller
{
    public  function showLoginForm()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {

    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     $loginData = [
    //         'user_email' => $credentials['email'],
    //         'password'   => $credentials['password'],
    //     ];


    //     if (Auth::attempt($loginData)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/backend');
    //     }

    //     return back()->withErrors([
    //         'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
    //     ])->onlyInput('email');
    // }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $loginData = [
            'user_email' => $credentials['email'],
            'password'   => $credentials['password'],
        ];

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            if ($user->user_permission == 2) {
                return redirect()->intended('/backend');
            } elseif ($user->user_permission == 3) {
                return redirect()->intended('/ServiceCenterOnline');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'บัญชีนี้ไม่มีสิทธิ์เข้าใช้งานระบบ',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
        ])->onlyInput('email');
    }


    // ออกจากระบบ
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
