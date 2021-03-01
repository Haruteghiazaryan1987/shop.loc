<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $role = $user->getRoleNames()->first();
        if (!$role) {
            return view('home');
        } else {
            return redirect()->route($role);
        }
        // return/*  route($role.'_home') */view('home');
    }
}
