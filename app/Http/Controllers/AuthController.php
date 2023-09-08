<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    function login(Request $request)
    {

        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => true], $request->remember);

        if ($auth) {
            return redirect()->intended('dashboard')->with('success', 'Logged in successfully');
        } else {
            return back()->with('error', 'Login failed, please check email or password.');
        }
    }
}
