@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student - create</div>
                    <div class="card-body">
                    <div class="form-group">
                        <form action= "{{ route('students.store')}}" method="post" enctype="multipart/form-data">
                         @csrf
                         <label for="">Name</label>
                        <input type="text" name="name" class="form-control m-2" placeholder="name">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control m-2" placeholder="mail@gmail.com"> 
                        <label for="">Phone</label>    
                         <input type="text" name="phone" class="form-control m-2" placeholder="Phone Number">
                         <label for="">Address</label>
                         <input type="text" name="address" class="form-control m-2" placeholder="Address">
                         <label for="">Gender</label>
                         <select name="gender" id="gender" class="form-control m-2">
                            <option>--</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                        <label for="">Class</label>
                         <input type="text" name="class" class="form-control m-2" placeholder="class">
                            <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
