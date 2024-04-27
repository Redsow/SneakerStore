<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->is_admin == 1) {
            $users = User::all();
            return view('admin.admin', compact('users'));
        } else {
            abort(403);
        }
    }
}
