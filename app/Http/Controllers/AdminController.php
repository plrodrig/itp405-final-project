<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
Use Validator;

class AdminController extends Controller
{
    public function index()
    {
      if (Auth::user()->email == "admin@usc.edu")
      {
        $users = User::all();
        return view('dashboard.admin',[
          'users' => $users,
        ]);
      }else{
        return view('dashboard.dashboard');
      }
    }

    public function delete(Request $request)
    {
      $id = $request->input("user_id");
      $user = User::find($id);
      $user->delete();
      $users = User::all();
      return view('dashboard.admin', [
        'users' => $users,
      ]);
    }
}
