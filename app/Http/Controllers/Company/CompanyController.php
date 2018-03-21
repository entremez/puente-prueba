<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;

class CompanyController extends Controller
{
    public function index()
    {
        $chart = Charts::create('percentage', 'justgage')
          ->title('Tu nivel')
          ->elementLabel('')
          ->values([3,0,5])
          ->responsive(false)
          ->height(300)
          ->width(0);
        $user = auth()->user();
        $data = $user->name();
        $dashboard = "company-dashboard";
        return view('company.dashboard')->with(compact('user', 'data', 'chart', 'dashboard'));
    }
}
