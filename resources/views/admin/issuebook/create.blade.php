@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Issue Book</div>
                    <div class="card-body">
                    <div class="form-group">
                        <form action= "{{ route('issuebook.store')}}" method="post" enctype="multipart/form-data">
                         @csrf
                         <select class="form-control "name='student_id'>
                    <option>Select Student</option>
                    @php($users=\App\user::all())
                    @foreach($users as $user)
                    <option>{{$user->name}}</option>
                    @endforeach
                  </select>
                        <select class="form-control "name='book_id'>
                    <option>Select Book</option>
                    @php($books=\App\book::all())
                    @foreach($books as $book)
                    <option>{{$book->book_title}}</option>
                    @endforeach
                  </select>
                        
                        <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
