<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;
use App\Company;
use App\Instance;

class AdminController extends Controller
{
    public function index()
    {
        $providers = Provider::count();
        $companies = Company::count();
        $cases = Instance::count();
        $dashboard = "dashboard";
        return view('admin/dashboard')->with(compact('providers', 'companies', 'cases', 'dashboard'));
    }

    public function showProviders()
    {
        $providers = Provider::all();
        return view('admin/dashboard-providers')->with(compact('providers'));
    }

    public function showCompanies()
    {
        $companies = Company::all();
        return view('admin/dashboard-companies')->with(compact('companies'));
    }
}
