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
    //  dd($picture);

      //look at type, spit out correct list
      //grab data from db and insert into view
      return view('dashboard.list', [
        'picture' => $picture,
      ]);
    }

    public function update(Request $request)
    {

      //update object
      //if request has pic id, do something otherwise redirect
      //if put and no parameter, handle it.


      $picture = $request->input('pic_id');
      $pic = Picture::find($picture);
      $pic->description = "hiisiaia";
      $pic->type= 'travel';
      $pic->save();
      //associate picture to a user?
      return view('dashboard.list', [
        'picture' => $pic,
      ]);
    }
}
