<?php
use App\Services\API\Geolocation;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/geolocation/{loc}', function($loc){
	$geolocation = new Geolocation([
		//'clientID' => ''
	]);
	$location = $geolocation->location($loc);
	return $location;
});

Route::get('/', function () {
    return view('welcome');
});
