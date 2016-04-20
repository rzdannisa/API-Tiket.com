<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Http\Controllers\TiketAPI\APIController as API;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function get_Currency()
    {
      $api = new API;
      $hasil = $api -> getCurl('general_api/listCurrency');
      \App\currency::whereRaw('id>0')->delete();
      $data = array();
      foreach($hasil->result as $key)
      {
        $curr = new \App\currency;
        $curr -> code = $key -> code;
        $curr -> name = $key -> name;
        $curr -> save();
        $data['id'][$curr->id]=$key->code;
      }
      echo json_encode(
                      array(
                          'status_code'=>200,
                          'inserted_data'=>sizeof($data['id'])
                      )
      );
    }

    public function get_Country()
    {
      $api = new API;
      $hasil = $api -> getCurl('general_api/listCountry');
      \App\Country::whereRaw('id>0')->delete();
      $data = array();
      foreach($hasil as $key)
      {
        $ctr = new \App\Country;
        $ctr->country_id = $key->country_id;
        $ctr->country_name = $key->country_name;
        $ctr->country_areacode = $key->country_areacode;
        $ctr->save();
        $data['id'][$curl->id]=$key->code;
      }
      echo json_encode(
                      array(
                          'status_code'=>200,
                          'inserted_data'=>sizeof($data[id])
                      )
      );
    }

    public function view_Currency()
    {
      $s['data'] = \App\currency::all();
      return view('master.currency')->with($s);
    }

    public function view_Lang()
    {
      $s['data'] = \App\Currency::all();
      return view('master.lang')->with($s);
    }

    public function view_Country()
    {
      $s['data'] = \App\Currency::all();
      return view('master.country')->with($s);
    }

}
