<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//use Tiket API Controller
use App\Htto\Controllers\TiketAPI\APIController as API;

class Reservasi extends Controller
{
  
  public function flight()
  {
    //add airport data
    $s['airport'] = \App\Airport::all();
    //view reservasi/flight.blade.php with data
    return view('reservasi.flight')->with($s);
  }

}
