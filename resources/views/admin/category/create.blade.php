@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Category - create</div>
                    <div class="card-body">
                    <div class="form-group">
                        <form action= "{{ route('categories.store')}}" method="post" enctype="multipart/form-data">
                         @csrf
                         <input type="text" name="name" class="form-control m-2" placeholder="category name">
                        <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
