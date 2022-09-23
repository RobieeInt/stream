<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//define auth
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // if email not with @admin.com add @admin.com
        if (!strpos($request->email, '@admin.com')) {
            $request->email = $request->email . '@admin.com';
        }else{
            $request->email = $request->email;
        }


        // $credentials = $request->only('email', 'password');
        $credentials = $request->only('password');
        $credentials['email'] = $request->email;
        $credentials['role'] = 'admin';

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'error' => 'Pastikan Email & Password Benar.',
        ])->withInput();


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
