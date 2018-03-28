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
        $providersLeft = collect();
        $providersCenter = collect();
        $providersRight = collect();
        foreach ($providers as $key => $provider) {
            if($key%3 == 0){
                $providersRight->push($provider);
            }elseif($key%2 == 0){
                $providersCenter->push($provider);
            }else{
                $providersLeft->push($provider);
            }
        }
        $filter = "";
        return view('providers')->with(compact('providers','providersCenter', 'providersLeft', 'providersRight', 'services', 'checked', 'filter'));
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
        $providersLeft = collect();
        $providersCenter = collect();
        $providersRight = collect();
        if(isset($provider_approved)){
            $providers = collect(array_unique($provider_approved));
            foreach ($providers as $key => $provider) {
                if($key<3){
                    if($key == 0 )
                        $providersLeft->push($provider);
                    if($key == 1 )
                        $providersCenter->push($provider);
                    if($key == 2 )
                        $providersRight->push($provider);
                }else{
                    $key%3 == 0 ? $providersLeft->push($provider): '';
                    $key%3 == 1 ? $providersCenter->push($provider): '';
                    $key%3 == 2 ? $providersRight->push($provider): '';
                }
            }
        }
        $services = Service::get();
        $filter = "service";
        return view('providers')->with(compact('providers','providersCenter', 'providersLeft', 'providersRight', 'services', 'checked', 'filter'));
    }
}
