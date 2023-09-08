<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function index()
    {
        $users = User::query()->where('role', 3)->get();
        return view('members.index', compact('users'));
    }
}
