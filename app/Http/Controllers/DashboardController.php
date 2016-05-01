<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
Use Validator;

class DashboardController extends Controller
{
    //
    public function index()
    {
      return view('dashboard.dashboard');
    }


}
