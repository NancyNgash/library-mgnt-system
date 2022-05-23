<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book= new Book();
        $book->user_id = Auth::id();
        $book->book_title = $request->book_title;
        $book->category_type = $request->category_type;
        $book->author = $request->author;
        $book->publisher = $request->publisher;

        $book->save();

        Session::flash('message', 'Book added successfully');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book_title = $request->input('book_title');
        $category_type = $request->input('category_type');
        $author = $request->input('author');
        $publisher = $request->input('publisher');
        $book_id = $request->input('book_id'); 
        

        $update = DB::table('books')
        ->where('id', $book_id) 
        ->update([
            'book_title'=>$book_title,
            'category_type'=>$category_type,
            'author'=>$author,
            'publisher'=>$publisher,
        ]);

        if($update==true )
        {
           Session::flash('message', 'book updated successfully');
       return redirect()->route('books.index'); 
        }else {
           Session::flash('message', 'Not updated');
       return redirect()->route('books.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        Session::flash('delete-message', 'book deleted successfully');
        return redirect()->route('books.index');
    }
}
