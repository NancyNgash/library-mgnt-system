@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(auth()->user()->role=='1' ||auth()->user()->role=='2')
            <div class="card">
            <div class="card-header">Latest Categories</div>

<div class="card-body">
    <table class="table table-bordered mb-0">
    
        <thead>
        <tr>
            <th scope="col" width="60">#</th>
            <th scope="col" width="60">Name</th>
            <th scope="col" width="200">Created By</th>
        </tr>
        </thead>

        <tbody>
        @php($categories=\App\Category::all())
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->user->name }}</td>
            </tr>

        @endforeach

        @else
            @endif
        </tbody>
    </table>
</div>
</div>

<div class="card mt-4">
<div class="card-header">Latest Books</div>

<div class="card-body">
    <table class="table table-bordered mb-0">
        <thead>
        <tr>
            <th scope="col" width="60">#</th>
            <th scope="col" width="60">Title</th>
            <th scope="col" width="60">Published By:</th>
            <th scope="col" width="200">Created By</th>
        </tr>
        </thead>

        <tbody>
        @php($books=\App\Book::all())
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->book_title }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->user->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
    </div>
</div>
@endsection
