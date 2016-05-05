<?php
use App\Services\API\Geolocation;
use Illuminate\Http\Request;
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
	$locationsJson = $geolocation->location($loc);
	//return $location;
	$locations = json_decode($locationsJson);
	$address = $locations->results[0]->formatted_address;
	// dd($address);
	// dd($locations->results[0]->formatted_address);
	// dd($locations->results[0]->formatted_address);
	// dd($locations['results']['formatted_address']);
	// var_dump($locations);
	// return;

	return view('geolocation', [
    'a' => $address
  ]);
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
	Route::get('/register', 'RegisterController@index');
	Route::post('/register/new', 'RegisterController@create');
	Route::get('/login', 'LoginController@index');
	Route::post('/login/auth', 'LoginController@login');
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/logout', 'DashboardController@logout');
	Route::get('/results', 'DashBoardController@results');
	Route::post('/results', 'DashboardController@store');
	//Route::get('/wishlist', 'WishlistController@index');
	Route::get('/wishlist', 'WishlistController@index');
	Route::post('/wishlist', 'WishlistController@update');
//	Route::get('/dream', 'WishlistController@dreamIndex');
	Route::get('/admin', 'AdminController@index');
	Route::post('/admin', 'AdminController@delete');
});
