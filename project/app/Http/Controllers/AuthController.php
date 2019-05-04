<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }

    public function postLogin(Request $request)
    {

      if (Auth::attempt($request->only('username','password')))
      return redirect()->route('peminjaman.create');
      else return redirect('/login');

    }

    public function logout()
    {
      Auth::logout();
      return redirect('/login');
    }
}
