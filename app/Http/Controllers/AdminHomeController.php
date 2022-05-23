<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Issuebook;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function homepage(){
    	$book=Book::count();
    	$std=User::count();
    	$notreturnbook=Issuebook::where('status','0')->count();
    	
     return view('admin.home',compact('book','std','notreturnbook'));
    }
}
