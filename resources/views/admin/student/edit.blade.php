@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">student - edit</div>

                    <div class="card-body">
            <form action="{{ route('submit-edit') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="hidden" class="form-control" name="student_id" value="{{ $student->id}}"/>
              <input type="text" class="form-control" name="name" value="{{ $student->name}}" placeholder="Edit student name">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $student->email}}" placeholder="Edit phone Email.">
              <label for="">Phone</label>
              <input type="number" class="form-control" name="phone" value="{{ $student->phone}}" placeholder="Edit phone no.">
              <label for="">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $student->address}}" placeholder="Edit address">
              <label for="">Gender</label>
              <select class="form-control" name="gender" value="{{ $student->gender}}">
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>
              <label for="">Class</label>
              <input type="text" class="form-control" name="class" value="{{ $student->class}}" placeholder="Edit class">
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