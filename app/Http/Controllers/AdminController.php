<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function manageUsers()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.manage_users', ['users' => $users]);
    }


    public function updateUserRole(Request $request)
    {
        foreach ($request->input('users') as $userId => $role) {
            $user = User::findOrFail($userId);
            $user->role = $role;
            $user->save();
        }

        return redirect()->route('dashboard')->with('success', 'User roles updated successfully');
    }
}

