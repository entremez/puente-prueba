<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Instance;

class ProviderController extends Controller
{
    public function detail(Provider $provider)
    {
        $cases = Instance::where('provider_id','=', $provider->id)->get();
        return view('provider')->with(compact('provider', 'cases'));
    }

    public function show()
    {
        $providers = Provider::inRandomOrder()->get();
        return view('providers')->with(compact('providers'));
    }
}
