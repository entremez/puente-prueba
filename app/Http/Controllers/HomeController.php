<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $type = Auth::user()->type;
            $user = Auth::user()->$type;
        }
        return view('home')->with(compact('user'));
    }

    public function welcome()
    {
        if(Auth::check()){
            $type = Auth::user()->type;
            $user = Auth::user()->$type;
        }
        dd(Auth::user()->type);
        return view('welcome')->with(compact('user'));
    }
}
