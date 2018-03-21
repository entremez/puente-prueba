<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instance;

class InstanceController extends Controller
{
    public function show(Instance $instance)
    {
        return view('cases')->with(compact('instance'));
    }
}
