<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Instance;

class HomeController extends Controller
{
    private $cases;
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
                    return redirect()->action('Admin\AdminController@index');
                    break;
                case "Provider":
                    return redirect()->action('Provider\ProviderController@index');
                    break;
                case "Company":
                    return redirect()->action('Company\CompanyController@index');
                    break;
            }
        }
        return view('auth.login');
    }

    public function welcome()
    {
        $cases = Instance::inRandomOrder()->paginate(6);
        return view('welcome')->with(compact('cases'));
    }

}
