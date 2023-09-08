<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FireguardController extends Controller
{
    public function index()
    {
        $users = User::where('role', 2)->get();
        return view('fireguard.index', compact('users'));
    }

    public function create(Request $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'role' => 2
        ]);

        return back()->with('success', 'User created successfully');
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->only('first_name', 'last_name', 'email', 'gender', 'age', 'phone_number'));
        return back()->with('success', 'User updated successfully');
    }
}
