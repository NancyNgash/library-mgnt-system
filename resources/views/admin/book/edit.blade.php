@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">book - edit</div>

                    <div class="card-body">
            <form action="{{ route('edit_submit') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">book Title</label>
              <input type="hidden" class="form-control" name="book_id" value="{{ $book->id}}"/>
              <input type="text" class="form-control" name="book_title" value="{{ $book->book_title}}" placeholder="Edit book title">
              <label for="">Category</label>
              <select class="form-control"name='category_type'>
                    <option value="">Select Category</option>
                    @php($categories=\App\Category::all())
                    @foreach($categories as $category)
                    <option value="{{$category->name}}" {{$book->category_type == $category->name ? 'selected' : '' }} >{{$category->name}}</option>
                    @endforeach
                  </select>
                           <label for="">Author</label>
              <input type="text" class="form-control" name="author" value="{{ $book->author}}" placeholder="Edit author">
              <label for="">Publisher</label>
              <input type="text" class="form-control" name="publisher" value="{{ $book->publisher}}" placeholder="Edit publisher">
              
            </div>
           
            <div class="form-group" style="margin-top: 24px;">
              <input type="submit" class="btn btn-primary" value="Update">
            </div>

          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection