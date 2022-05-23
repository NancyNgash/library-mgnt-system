@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Book - create</div>
                    <div class="card-body">
                    <div class="form-group">
                        <form action= "{{ route('books.store')}}" method="post" enctype="multipart/form-data">
                         @csrf
                         <label for="">book Title</label>
                        <input type="text" name="book_title" class="form-control m-2" placeholder="book title">
                        <label for="">Category</label>
                        <select class="form-control "name='category_type'>
                    <option>Select Category</option>
                    @php($categories=\App\Category::all())
                    @foreach($categories as $category)
                    <option>{{$category->name}}</option>
                    @endforeach
                  </select>
                        <label for="">Author</label>    
                         <input type="text" name="author" class="form-control m-2" placeholder="author name">
                         <label for="">Publisher</label>
                         <input type="text" name="publisher" class="form-control m-2" placeholder="publisher name">
                        <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
