<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;

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
            'users' => $users,
            'categories' => Category::all()
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
            'user' => $user,
            'categories' => Category::all()
        ]);
    }

    public function updateUser($id, Request $req) {
        
        $validated = $req->validate([
            'name' => 'string|nullable|max:255',
            'email' => 'string|nullable|email|max:255|unique:users',
        ]);


        $user = User::findOrFail($id);
        $user['name'] = $req->input('name') ? $req->input('name') : $user['name'] ;
        $user['email'] = $req->input('email') ? $req->input('email') : $user['email'];
        $user['role'] = $req->input('role') ? $req->input('role') : $user['role'];
        $user->update();
        return redirect()
                ->route('getUsers')
                ->with('msg', 'User has been deleted successfully');
    }

    
}
