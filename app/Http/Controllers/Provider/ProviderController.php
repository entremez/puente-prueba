<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\ProviderService;

class ProviderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = $user->name();
        $phone = $data->phone;
        $services = Service::get();
        if (empty($data->logo) OR empty($data->description))
            return view('provider.config-dashboard')->with(compact('data','user', 'services'));
        $services = ProviderService::where('provider_id', '=',$data->id)->get();
        return view('provider.dashboard')->with(compact('user', 'data','services', 'phone'));
    }

    public function edit(Request $request)
    {
        $messages = [
            'name.required' => 'Debe ingresar el nombre.',
            'address.required' => 'Debe ingresar la dirección',
            'logo.required' => 'Debe adjuntar una imagen',
            'logo.image' => 'Solo se admiten imágenes en formato jpeg, png, bmp, gif, o svg',
            'phone.required' => 'Debe ingresar número de teléfono',
            'description.required' => 'Debe ingresar una descripción',
            'service.required' => 'Debe seleccionar al menos un servicio',
        ];
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'logo' => 'required|image',
            'description' => 'required',
            'service' => 'required',
        ];
        $this->validate($request, $rules, $messages);
        $file = $request->file('logo');
        $path = public_path().'/providers/logos';
        $provider = auth()->user()->name();
        $fileName = $provider->id."-".uniqid()."-".$file->getClientOriginalName();
        $file->move($path, $fileName);

        $provider->logo = $fileName;
        $provider->name = $request->input('name');
        $provider->address = $request->input('address');
        $provider->phone = $request->input('phone');
        $provider->description = $request->input('description');
        $provider->save();

        $services = $request->input('service');
        for ($i=0; $i < count($services); $i++) {
            $provider_service = new ProviderService();
            $provider_service->provider_id = $provider->id;
            $provider_service->service_id = $services[$i];
            $provider_service->save();
        }

        return redirect('provider/dashboard');
    }
}
