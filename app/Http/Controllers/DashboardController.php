<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
Use Validator;
use App\Services\API\Geolocation;

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

    public function results($location){
      $geolocation = new Geolocation([
    		//'clientID' => ''
    	]);
    	$locationsJson = $geolocation->location($location);
    	//return $location;
    	$locations = json_decode($locationsJson);
    	$address = $locations->results[0]->formatted_address;
    	// dd($address);
    	// dd($locations->results[0]->formatted_address);
    	// dd($locations->results[0]->formatted_address);
    	// dd($locations['results']['formatted_address']);
    	// var_dump($locations);
    	// return;

    	return view('dashboard.results', [
        'a' => $address
      ]);
    }



}
