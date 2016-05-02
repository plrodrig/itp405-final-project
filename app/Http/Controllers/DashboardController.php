<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
Use Validator;
use App\Services\API\Geolocation;
use Cache;

class DashboardController extends Controller
{
    //
    public function index()
    {
      if(Auth::check()){
        return view('dashboard.dashboard');
      }
      return redirect('/login');
    }
    public function logout()
    {
      Auth::logout();
      return redirect('/login');
    }

    public function results(Request $request){
      $location = $request->input('location');
    //  dd($location);
      if(Cache::get($location)){
        $jsonString = Cache::get($location);
      } else {
        $geolocation = new Geolocation([
          //'clientID' => ''
        ]);
        $locationsJson = $geolocation->location($location);
        //return $location;
        $locations = json_decode($locationsJson);
        $address = $locations->results[0]->formatted_address;
        //pass into instagram api
        $lat = $locations->results[0]->geometry->location->lat;
        $lng = $locations->results[0]->geometry->location->lng;
        $url = "https://api.instagram.com/v1/media/search?lat=$lat&lng=$lng&client_id=32c49420641e47cf8af943b347fdfd0f";
        $jsonString = file_get_contents($url);
        Cache::put($lat+$lng, $jsonString, 30);
      }

      $json = json_decode($jsonString, true);
    	// dd($address);
    	// dd($locations->results[0]->formatted_address);
    	// dd($locations->results[0]->formatted_address);
    	// dd($locations['results']['formatted_address']);
    	// var_dump($locations);
    	// return;

    	return view('dashboard.results', [
        'a' => $address,
        'b' => $lat,
        'images' => $json['data']
      ]);
    }



}
