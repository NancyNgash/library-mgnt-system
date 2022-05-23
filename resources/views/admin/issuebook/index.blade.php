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
                    IssuedBook - list
                    @if(auth()->user()->role=='1' ||auth()->user()->role=='2' )
                    <a href="{{ route('issuebooks.create') }}" class="btn btn-sm btn-primary float-right">Issue Book
                    </a>
                    @else
                    @endif
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Issued on</th>
                                <th scope="col">Approval status</th>
                                @if(auth()->user()->role=='1' ||auth()->user()->role=='2' )
                                <th scope="col">Approval update</th>
                                @else
                                @endif
                                <th scope="col">Status</th>
                                @if(auth()->user()->role=='1' ||auth()->user()->role=='2' )
                                <th scope="col" width="129">Action</th>
                                @else
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($issuebooks as $issuebook)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $issuebook->student_id}}</td>
                                <td>{{ $issuebook->book_id}}</td>
                                <td>{{ $issuebook->created_at}}</td>
                                </td>
                                @if($issuebook->approvalstatus==1)
                                <td><span class='badge badge-primary'>Approved</span></td>
                               
                                @elseif($issuebook->approvalstatus==2)
                                <td><span class='badge badge-danger'>Rejected</span></td>
                                @else 
                                <td>
                                    <span class="badge badge-danger"><b>Pending</b></span>
                                </td>
                                @endif

                                        @if(auth()->user()->role=='1' ||auth()->user()->role=='2' )
                                        <td>
                                    <div class="dropdown">
                                        <form action="{{route('issuebook.statusupdate', $issuebook->id)}}" method="post">
                                            @csrf
                                            <select onchange="this.form.submit()" class="select2  form-control-lg form-control-select form-control" name="approvalstatus" id="approvalstatus" required>
                                                <option value="">Approval</option>
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>

                                            </select>
                                        </form>
                                    </div>
                                </td>
                                @else
                                @endif
                                @if($issuebook->status==1)
                                <td>
                                    <span class="badge badge-success"><b>Returned already</b></span>
                                </td>
                                @elseif($issuebook->status==2)
                                <td><span class='badge badge-danger'>Canceled</span></td>
                                @else
                                <td><span class='badge badge-danger'>Not Returned yet</span></td>
                                @endif
                                @if(auth()->user()->role=='1' ||auth()->user()->role=='2' )

                                <td>
                                    <div class="dropdown">
                                        <form action="{{route('issuebook.update', $issuebook->id)}}" method="post">
                                        @csrf
                                        <select onchange="this.form.submit()" class="select2  form-control-lg form-control-select form-control" name="status" id="status" required>
                                            <option value="">Update</option>
                                            <option value="1">Returned</option>
                                            <option value="2">Canceled</option>

                                        </select>
                                        </form>

                                    </div>
                                </td>
                                @else
                                @endif
                            </tr>

                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection