<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Provider;
use App\Instance;
use App\Service;
use App\ProviderService;
use App\Category;

class ProviderController extends Controller
{
    public function show()
    {
        return view('providers',[
            'categories' => Category::get(),
            'services' => Service::get(),
            'providers' => Provider::where('approved','1')->inRandomOrder()->get()
            ]);
    }

    public function filtered(Request $request, $serviceId)
    {
        if($request->ajax()){
            $service = Service::find($serviceId);
            $providers = $service->providers()->get();
            $providersFiltered = new Collection();
            foreach ($providers as $provider) {
                $providersFiltered->push($provider->provider()->first());
            }
            return $providersFiltered;
        }
    }

    public function detail(Provider $provider)
    {
        $services = $provider->services()->get();
        $service = new Collection();
        foreach ($services as $s) {
            $service->push($s->service()->first());
        }
        return view('provider',[
            'provider' => $provider,
            'cases' => Instance::where('provider_id','=', $provider->id)->get(),
            'service' => $service
            ]);
    }
}
