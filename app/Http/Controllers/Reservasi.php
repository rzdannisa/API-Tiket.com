<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
//use Tiket API Controller
use App\Http\Controllers\TiketAPI\APIController as API;

class Reservasi extends Controller
{

  public function flight()
  {
    //add airport data
    $s['airport'] = \App\Airport::all();
    //view reservasi/flight.blade.php with data
    return view('reservasi.flight')->with($s);
  }

  public function searchflight()
  {
  	$data = [];
  	$data['d'] = Input::get('from');
  	$data['a'] = Input::get('to');
  	$data['date'] = date_format(
  						date_create(
  							Input::get('depart_date')
  							),"Y-m-d");
  	if(Input::get('type')=="RT"){
  		$data['ret_date'] = date_format(
  								date_create(
  									Input::get('return_date')
  								),"Y-m-d");
  	}
  	$data['adult'] = Input::get('adult');
  	$data['child'] = Input::get('child');
  	$data['infant'] = Input::get('infant');
  	$data['v'] = 1;

  	//kosongkan session token untuk transaksi
  	\Session::Put('token','');
  	//panggil class API
  	$newapi = new API;

  	$log = new \App\Logtrx;
  	$log->request = json_encode($data);
  	$log->token = session('token');
  	$log->save();

  	$sd = new \App\search_data;
  	$sd->depart_city = Input::get('from');
  	$sd->arrive_city = Input::get('to');
  	$sd->depart_date = date_format(
  							date_create(
  								Input::get('depart_date')
  							),"Y-m-d");
  	if (Input::get('type')=="RT") {
  		$sd->return_date = date_format(
  								date_create(
  									Input::get('return_date')
  								),"Y-m-d");
  	}
  	$sd->adult = Input::get('adult');
  	$sd->child = Input::get('child');
  	$sd->infant = Input::get('infant');
  	$sd->var = $data['v'];
  	$sd->token = session('token');
  	$sd->save();

  	//panggil curl ke search/flight dengan parameter $data
  	$hasil = $newapi->getCurl('search/flight',$data);
  	echo json_encode($hasil);

  	$sd->result = json_encode($hasil);
  	$sd->save();

  	$log->response = json_encode($hasil);
  	$log->status_code = $hasil->diagnostic->status;
  	$log->save();

  }

}
