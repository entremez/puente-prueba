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
        $surveys = auth()->user()->instance()->survey_responses();
        $last_trip = auth()->user()->instance()->survey_responses()->orderBy('created_at', 'desc')->first()->created_at;
        $actual_result = $surveys->orderBy('created_at', 'desc')->get()->first()->total;
        return view('company.dashboard',[
            'number_of_surveys' => count($surveys->get()),
            'last_trip' => \Carbon\Carbon::parse($last_trip)->format('d-m-Y'),
            'actual_result' => $actual_result
            ]);
    }

    public function timeline(){
        $surveys = auth()->user()->instance()->survey_responses();
        return view('company.timeline',[
            'number_of_surveys' => count($surveys->get()),
            'surveys' => $surveys->orderBy('created_at','desc')->get(),
        ]);
    }
}
