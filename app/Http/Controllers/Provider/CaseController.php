<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\ProviderService;
use App\Service;

class CaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $cases = auth()->user()->name()->instances()->get();
        return view('provider.index')->with(compact('user', 'cases', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $services = ProviderService::where('provider_id','=', $user->name()->id)->get();
        foreach ($services as $service) {
            $services_provider[] = Service::where('id','=',$service->service_id)->get()->first();
        }
        $services = collect($services_provider);
        return view('provider.create')->with(compact('services', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Debe ingresar el nombre.',
            'images.required' => 'Debe adjuntar al menos una imagen',
            'images.image' => 'Solo se admiten imágenes en formato jpeg, png, bmp, gif, o svg',
            'description.required' => 'Describe el caso en una frase',
            'description.max' => 'La descripción no debe superar los 250 caracteres',
            'long_description.required' => 'Debes ingresar una descripción detallada del caso',
            'images.*.max' => 'Las imágenes no deben ser mayores a 1.5 Mb',
            'service.required' => 'Debe seleccionar al menos un servicio',
        ];
        $rules = [
            'name' => 'required',
            'description' => 'required|max:250',
            'long_description' => 'required',
            'images.*' => 'required|image|max:1500',
            'service' => 'required',
        ];
        $this->validate($request, $rules, $messages);
        $images = $request->file('images');
        foreach ($images as $key => $image) {
            if($key == 0){

            }
        }
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
        $provider->long_description = $request->input('long_description');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


/*if($request->hasFile('photos'))
{
    $allowedfileExtension=['pdf','jpg','png','docx'];
    $files = $request->file('photos');
    foreach($files as $file){
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);
        if($check)
        {
            $items= Item::create($request->all());
            foreach ($request->photos as $photo) {
                $filename = $photo->store('photos');
                ItemDetail::create([
                    'item_id' => $items->id,
                    'filename' => $filename
                ]);
            }
        echo "Upload Successfully";
        }else{
            echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
        }
    }
}*/