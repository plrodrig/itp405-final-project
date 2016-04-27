<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    //
    public function createUser()
    {
      return view('register.createUser');
    }
}
