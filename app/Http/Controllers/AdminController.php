<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
        {
            $this->middleware('isAdmin');
            $this->middleware('auth');
        }

    public function getUsers() {
        $users = User::all();
        return view('admin.users.users', [
            'users' => $users
        ]);
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
                ->route('admin')
                ->with('msg', 'User has been deleted successfully');
    }

    public function getUser($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit_user', [
            'user' => $user
        ]);
    }

    public function updateUser($id, Request $req) {
        $user = User::findOrFail($id);
        $user['name'] = $req->input('name') ? $req->input('name') : $user['name'] ;
        $user['email'] = $req->input('email') ? $req->input('email') : $user['email'];
        $user['role'] = $req->input('role') ? $req->input('role') : $user['role'];
        $user->update();
        return back()
                ->with('msg', 'User has been edited successfully');
    }
}
