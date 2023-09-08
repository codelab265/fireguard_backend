<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    function delete(Request $request)
    {
        $id = $request->id;
        $page = $request->page;

        if ($page == "users") {
            User::find($id)->delete();
            return back()->with('success', 'User deleted successfully');
        } else {
            return back()->with('error', 'Item not found');
        }
    }
}
