<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function index(){
       return (Auth::user()) ? redirect()->route('admin') : $this->login();
   }

public function login(){
    return view('auth.login');
}
public function processlogin(Request $request){
    $credentials=[
        'email'=>$request->email,
        'password'=>$request->password,
    ];
    if(Auth::attempt($credentials)){
        return view('admin.index');
        
    }
}



}