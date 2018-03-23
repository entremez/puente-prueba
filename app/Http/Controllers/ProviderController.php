<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Instance;

class ProviderController extends Controller
{
    public function show(Provider $provider)
    {
        $cases = Instance::where('provider_id','=', $provider->id)->get();
        return view('providers')->with(compact('provider', 'cases'));
    }
}
