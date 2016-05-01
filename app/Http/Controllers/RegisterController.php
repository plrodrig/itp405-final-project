<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use App\Http\Requests;
use App\User;
use Hash;
Use Validator;

class RegisterController extends Controller
{
    //
    public function index(Request $request)
    {
      $errors = $request->session()->get('errors', new MessageBag);

      if(count($errors) > 0){
        dd($errors);
      }

      if ($request->session()->has('err')) {
        //dd($request->session()->get('err'));
        $v = $request->session()->get('err');
        $request->session()->forget('err');
        //dd($v);

        return view('register.create', [
          'errop' => $v
        ]);
      }

      return view('register.create');
    }

    public function create(Request $request)
    {
    //
      $validation = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);

      if($validation->fails()) {
        $request->session()->put('err', $validation->messages());
        $request->session()->save();
        return redirect('/register')->withInput()->withErrors($validation);
      }

      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = Hash::make($request->input('password'));
      $user->save();
      return redirect('/login')->with('success', true);
    //  $user->name = $request->input('name');
    //  $user->email = $request->input('email');
    //  $user->password = Hash::make($request->input('password'));
  //    $user->save();
    }

  //  public function create(){
    //  return view('register.create');
  //  }
}
