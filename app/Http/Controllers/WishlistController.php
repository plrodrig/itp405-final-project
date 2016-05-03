<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use App\Http\Requests;
use App\User;
use Hash;
Use Validator;
use App\Models\Picture;

class WishlistController extends Controller
{
    //
    public function index(Request $request)
    {

      $pic = $request->session()->get('pic');
      //use model for look up
      //get pic  object
      $picture = Picture::find($pic);


      //look at type, spit out correct list
      //grab data from db and insert into view
      return view('dashboard.list', [
        'picture' => $picture,
      ]);
    }
}
