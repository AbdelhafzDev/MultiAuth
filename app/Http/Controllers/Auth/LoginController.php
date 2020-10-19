<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $request->session()->flash('success', 'success login');
        return redirect()->intended('/user/home');
    }
}
