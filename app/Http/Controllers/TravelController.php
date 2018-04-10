<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function mainTravel()
    {
        return view('travel.main');
    }

    public function guestTravel()
    {
        return view('travel.guest');
    }
}
