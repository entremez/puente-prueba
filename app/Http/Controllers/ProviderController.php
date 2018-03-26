<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Provider;
use App\Instance;
use App\Service;
use App\ProviderService;

class ProviderController extends Controller
{
    public function detail(Provider $provider)
    {
        $cases = Instance::where('provider_id','=', $provider->id)->get();
        return view('provider')->with(compact('provider', 'cases'));
    }

    public function show()
    {
        $checked = "";
        $services = Service::get();
        $providers = Provider::inRandomOrder()->where('approved','=','1')->get();
        return view('providers')->with(compact('providers', 'services', 'checked'));
    }

    public function filtered(Request $request)
    {
        $checked = $request->input('service');
        if($checked == null)
            return redirect()->route('providers-list');
        foreach ($checked as $check) {
            $providers_service = ProviderService::distinct()->where('service_id','=',$check)->get();
            foreach ($providers_service as $provider_id) {
                $provider = Provider::find($provider_id->provider_id);
                if($provider->approved == 1)
                    $provider_approved[] = $provider;
            }
        }
        $providers = collect();
        if(isset($provider_approved)){
            $providers = collect(array_unique($provider_approved));
        }
        //dd($providers);
        $services = Service::get();
        return view('providers')->with(compact('providers', 'services', 'checked'));
    }
}
