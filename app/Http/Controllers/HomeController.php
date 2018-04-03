<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Instance;
use App\User;

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
        if(auth()->check()){
            switch(auth()->user()->type){
                case "Admin":
                    return redirect()->route('admin.dashboard');
                    break;
                case "Provider":
                    return redirect()->route('provider.dashboard');
                    break;
                case "Company":
                    return redirect()->route('company.dashboard');
                    break;
            }
        }
        return view('auth.login');
    }

    public function welcome()
    {
        $cases = Instance::inRandomOrder()->get();
        $cases_approved = collect();
        foreach ($cases as $case) {
            if($case->provider()->get()->first()->approved == 1)
                $cases_approved->put($case);
        }
        $cases = $cases_approved;
        if(auth()->check())
            $dashboard = auth()->user()->route_name;
        return view('welcome')->with(compact('cases', 'dashboard'));
    }

}
