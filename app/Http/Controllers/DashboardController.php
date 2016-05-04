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
use Illuminate\Support\Facades\Input;
use App\Models\Picture;

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

    public function store(Request $request)
    {
      //need access to these parameters so i can save it to picture object
    //  $location = $request->input('location');
    //  $full_name = $request->input('full_name');
    //  $img_url = $request->input('url');
      $picture = new Picture;
      $picture->location = $request->input('location');
      $picture->name = $request->input('full_name');
      $picture->link = $request->input('img_url');
      $picture->tag = $request->input('tag');
      $picture->user_id = Auth::user()->id;
      //add user_id.
      $picture->save();
      $pic_id = $picture->id;
      //return redirect('/login')->with('success', true);
      //create new picture object
      //add details in here
      $request->session()->put('pic', $pic_id);
      $request->session()->save();
      //save
      return redirect('/wishlist')->with('success', true);
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
