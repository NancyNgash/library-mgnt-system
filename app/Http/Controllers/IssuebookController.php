<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Issuebook;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class IssuebookController extends Controller
{
  
    public function index()
    {   
        $issuebooks = Issuebook::orderBy('id', 'DESC')->get();
        return view('admin.issuebook.index', compact('issuebooks'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.issuebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $issuebook= new Issuebook();
        $issuebook->user_id = Auth::id();
        $issuebook->student_id = $request->student_id;
        $issuebook->book_id = $request->book_id;
        $issuebook->save();

        Session::flash('message', 'Book issued successfully');
        return redirect()->route('issuebooks.index');
    
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $name=User::find(Issuebook::find($id)->student_id)->name;
        $book=Book::find(Issuebook::find($id)->book_id)->title;
        $date=Issuebook::find($id);
        //return $date;
        
        return view('admin.issuebook.edit',compact('name','book','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $issuebook_id)
    {
        $status=$request->input('status');
        $issuebook = Issuebook::find($issuebook_id);
        $issuebook->update([
            'status'=>$status
        ]);
        

        $issuebook->save();

        Session::flash('message', 'Status updated successfully');
        return redirect()->route('issuebooks.index');
        
    }

    public function statusupdate(Request $request, $issuebook_id)
    {
        $approvalstatus=$request->input('approvalstatus');
        $issuebook = Issuebook::find($issuebook_id);
        $issuebook->update([
            'approvalstatus'=>$approvalstatus
        ]);

        $issuebook->save();

        Session::flash('message', 'Status updated successfully');
        return redirect()->route('issuebooks.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
