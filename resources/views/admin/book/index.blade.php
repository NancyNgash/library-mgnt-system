@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ Session('message') }}
            </div>
            @endif

            @if(Session::has('delete-message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ Session('delete-message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(auth()->user()->role=='1' ||auth()->user()->role=='2' )
                    Book - list
                    <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary float-right">Add
                        New</a>
                    @else
                    @endif
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">Book_title</th>
                                <th scope="col">Category_type</th>
                                <th scope="col">Author</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">Status</th>
                                @if(auth()->user()->role=='3' )
                                <th scope="col">Request</th>
                                @else
                                @endif
                                @if(auth()->user()->role=='1' ||auth()->user()->role=='2')
                                <th scope="col" width="200">Created By</th>
                                <th scope="col" width="129">Action</th>
                                @else
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $book->book_title }}</td>
                                <td>{{ $book->category_type }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>
                                    @if ($book->status == 'Y')
                                    <span class='badge badge-success'>Available</span>
                                    @else
                                    <span class='badge badge-danger'>Issued</span>
                                    @endif
                                </td>
                                @if(auth()->user()->role=='3')
                                <td>
                                    @csrf
                                    <!-- <form action="{{ route('issuebooks.store') }}"  method='post' id='myform'>
                                        <button class="btn btn-sm btn-primary float-left" type="submit">Borrow book</button>
                                    </form> -->
                                    <a href="{{ route('issuebook.create') }}" class="btn btn-sm btn-primary float-left">Borrow Book
                        </a>
                                    @else
                                    @endif
                                    @if(auth()->user()->role=='1' ||auth()->user()->role=='2')
                                <td>{{ $book->user->name }}</td>
                                <td>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                @else
                                @endif
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