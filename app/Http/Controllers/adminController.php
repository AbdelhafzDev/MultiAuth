<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->intended('admin/home');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => trans('auth.failed')]);
    }
}
