<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;
use App\Company;
use App\Instance;
use App\CompanySurvey;
use Charts;

class AdminController extends Controller
{
    public function index()
    {
/*        $query = CompanySurvey::groupBy('company_id')->latest()->get();*/
/*        dd($query);*/
//dd(CompanySurvey::distinct(['company_id','result'])->get(['company_id', 'result']));

        $chart = Charts::database(CompanySurvey::get(), 'bar', 'highcharts')
            ->title("Resultados")
            ->elementLabel("Niveles")
            ->dimensions(890, 600)
            ->responsive(false)
            ->groupBy('result');
        $providers = Provider::all();
        $companies = Company::all();
        $cases = Instance::all();
        $dashboard = "dashboard";
        return view('admin/dashboard')->with(compact('providers', 'companies', 'cases', 'dashboard', 'chart'));
    }

    public function showProviders()
    {
        $providers = Provider::all();
        return view('admin/dashboard-providers')->with(compact('providers'));
    }

    public function request()
    {
        $providers = Provider::all();
        return view('admin/dashboard-providers-request')->with(compact('providers'));
    }

    public function showCompanies()
    {
        $companies = Company::all();
        $providers = Provider::all();
        return view('admin/dashboard-companies')->with(compact('companies', 'providers'));
    }
}
