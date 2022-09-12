<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('role', 'user')->paginate(8);
        return view('admin.index', ['users' => $users]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
}
