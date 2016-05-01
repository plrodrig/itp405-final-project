<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
Use Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
      return view('login.login');
    }

    public function login(Request $request)
    {
    //  $validator = Validator::make($request->all(), [
      //              'email' => 'required',
        //            'password' => 'required',
      // ]);
      $credentials = [
        'email' => $request->input('email'),
        'password' => $request->input('password')
      ];
      if(Auth::attempt($credentials)){
        return redirect('/dashboard');
      }
      return view('login.login');
    }



}
