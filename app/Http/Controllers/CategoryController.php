<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->user_id = Auth::id();
        $category->name = $request->name;

        $category->save();

        Session::flash('message', 'Category created successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //dd($category);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        // $this->validate($request, [
        //     'thumbnail' => 'required',
        //     'title' => 'required|unique:categories,title,' . $category->id,
        // ],
        //     [
        //         'thumbnail.required' => 'Enter thumbnail url',
        //         'title.required' => 'Enter title',
        //         'title.unique' => 'Category already exist',
        //     ]);

        $name = $request->input('name');
        $category_id = $request->input('category_id'); 

        $update = DB::table('categories')
        ->where('id', $category_id) 
        ->update([
            'name'=>$name,
        ]);

        
         if($update==true )
         {
            Session::flash('message', 'Category updated successfully');
        return redirect()->route('categories.index'); 
         }else {
            Session::flash('message', 'Not updated');
        return redirect()->route('categories.index');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash('delete-message', 'Category deleted successfully');
        return redirect()->route('categories.index');
    }
}
