<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
      return view('login.login');
    }

}
