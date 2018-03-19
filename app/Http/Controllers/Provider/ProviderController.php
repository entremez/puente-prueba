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
        if (empty($data->logo)) {
            return view('provider.config-dashboard')->with(compact('data','user'));
        }
        return view('provider.dashboard');
    }

    public function edit(Request $request)
    {
        $messages = [
            'name.required' => 'Debe ingresar el nombre.',
            'address.required' => 'Debe ingresar la dirección'
        ];
        $rules = [
            'name' => 'required',
            'address' => 'required',
        ];
        $this->validate($request, $rules, $messages);
        $data = auth()->user()->name();
        dd($data);
    }
}
