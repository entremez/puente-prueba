<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\Result;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function index()
    {
        $surveys= auth()->user()->name()->surveys()->orderBy('created_at', 'desc')->get();
        $last_trip = new Carbon($surveys->first()->created_at);
        $last_trip = $last_trip->format('d-m-Y');
        $level = $surveys->first()->result;
        $description = Result::find($level)->description;
        $chart = Charts::create('percentage', 'justgage')
          ->title('Tu nivel')
          ->elementLabel('')
          ->values([$level,0,5])
          ->responsive(false)
          ->height(300)
          ->width(0);
        $user = auth()->user();
        $data = $user->name();
        $dashboard = "company/dashboard";
        return view('company.dashboard')->with(compact('user', 'data', 'chart', 'dashboard', 'last_trip', 'level', 'description', 'surveys'));
    }

    public function timeline(){
      $surveys= auth()->user()->name()->surveys()->orderBy('created_at', 'desc')->get();
      $description = Result::find($surveys->first()->result)->description;
      return view('company.timeline')->with(compact('surveys','description'));
    }
}
