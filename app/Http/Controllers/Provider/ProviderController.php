<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = $user->name();
        $dashboard = "provider-dashboard";
        if (empty($data->logo) OR empty($data->description))
            return view('provider.config-dashboard')->with(compact('data','user', 'dashboard'));
        return view('provider.dashboard')->with(compact('user', 'data', 'dashboard'));
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
        ];
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'logo' => 'required|image',
            'description' => 'required',
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

        return redirect('provider/dashboard');
    }
}
