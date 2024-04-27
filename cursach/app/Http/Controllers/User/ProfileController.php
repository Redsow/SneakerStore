<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function delete($id)
    {
        if (auth()->user()->is_admin){
            $user = User::findOrFail($id);
            return view('admin.users.delete', compact('user'));
        } else {
            abort(403);
        }
    }

    public function destroy($id)
    {
        if (auth()->user()->is_admin){
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/admin')->with('success', 'User deleted successfully.');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

}
