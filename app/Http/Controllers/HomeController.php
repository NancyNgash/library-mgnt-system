<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->limit('5')->get();
        $books = Book::orderBy('id', 'DESC')->where('category_type', 'book')->limit('5')->get();
        return view('admin.index', compact('categories', 'books'));
    }
}
