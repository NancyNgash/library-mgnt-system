@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Category - edit</div>

                    <div class="card-body">
            <form action="{{ route('submit-edit') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Category Name</label>
              <input type="hidden" class="form-control" name="category_id" value="{{ $category->id}}"/>
              <input type="text" class="form-control" name="name" value="{{ $category->name}}" placeholder="Edit name">
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