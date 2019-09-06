<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SiteController extends Controller
{
    public function index(){
      return view('index');
    }

    public function login(){
      $datos = request()->all();
      if(Auth::attempt($datos))
        return redirect()->to('productos');
      return redirect()->to('/');

    }

    public function productos(){
      return view('productos');
    }
}
