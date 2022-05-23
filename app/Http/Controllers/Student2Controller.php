<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show(){
    	$std=User::all();
    	return view('admin.student.index',compact('std'));
    }
}
