<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use App\Http\Requests;
use App\User;
use Hash;
Use Validator;
use App\Models\Picture;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
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

    public function dream()
    {
      $list= Wishlist::where('user_id',Auth::user()->id)->where('type', 'Dream')->get()->pop();
      $pictures = Picture::where('list_id',$list->id)->get();
      $type = 'Dream';
      return view('dashboard.mylist', [
        'list' => $pictures,
        'type' => $type,
      ]);
    }

    public function reach()
    {
      $list= Wishlist::where('user_id',Auth::user()->id)->where('type', 'Reach')->get()->pop();
      $pictures = Picture::where('list_id',$list->id)->get();
      $type = 'Reach';
      return view('dashboard.mylist', [
        'list' => $pictures,
        'type' => $type,
      ]);
    }

    public function within()
    {
      $list= Wishlist::where('user_id',Auth::user()->id)->where('type', 'Within')->get()->pop();
      $pictures = Picture::where('list_id',$list->id)->get();
      $type = 'Within';
    //  dd($pictures);
      return view('dashboard.mylist', [
        'list' => $pictures,
        'type' => $type,
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
      // $comp2 = '1';
      // $comp3 = '2';
      // $comp4 = '3';
      //dd($request->input('optradio'));
      $wishlist = Wishlist::where('user_id',Auth::user()->id)->where('type', $userInput)->get()->pop();
  //    $wishlist = Wishlist::where('type', '=', $userInput)->get();
  //    dd($wishlist);
      $pic->list_id = $wishlist->id;
      // if(strtolower($userInput) == strtolower($comp2)){
      //     $pic->type= 'Dream';
      // }
      // elseif(strtolower($userInput) == strtolower($comp3)){
      //     $pic->type= 'Reach';
      // }else{
      //   $pic->type= 'Within';
      // }
      $pic->description = $request->input('comments');
      $pic->save();
      //type and name
      //->where('user_id', '=', Auth::user()->id)
      //create a list, if null
    //  $list= List::where('type', '=', $pic->type);
      //$pic = Picture::find( $request->input('pic_id'));
      //NOW JUST FIND THAT WISHLIST AND UPDATE THAT SHIZ
      //$mylist = new Wishlist;
      //$mylist->user_id = Auth::user()->id;
      //$mylist->type = $pic->type;
      //$mylist->save();

//look for list titled reach and belongs to user
//grab its id, go to pic id, it has list field ,list_id. save lsit id from saved list object.




      //dd($wishlist);
      //add a picture to this wishlist, or assicate it.

      //first it will return the databse where userid matches
      //if nto then no pic
    //  $toSearch  = List::find(Auth::user()->id);
  //    $list = List::with('users')->findOrFail(Auth::user()->id);
    //  if( $picture->user_id = Auth::user()->id){

        //$list = List::find($picture);
      //  $list->name == $pic->type
      //}
      //associate picture to a user?
      //return view('dashboard.list', [
        //'picture' => $pic,
      //]);
      return view('dashboard.dashboard');
    }
}
