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
      //CHECK IF OBJECT IS IN DATABSE ALREADY


      $picture = $request->input('pic_id');
      $pic = Picture::find($picture);
      $userInput = $request->input('optradio');
      //dd($request->input('optradio'));
      $comp2 = '1';
      $comp3 = '2';
      $comp4 = '3';
      //dd($request->input('optradio'));
      if(strtolower($userInput) == strtolower($comp2)){
          $pic->type= 'Dream';
      }
      elseif(strtolower($userInput) == strtolower($comp3)){
          $pic->type= 'Reach';
      }else{
        $pic->type= 'Within';
      }


      $pic->description = $request->input('comments');
      $pic->save();
      //associate picture to a user?
      return view('dashboard.list', [
        'picture' => $pic,
      ]);
    }
}
