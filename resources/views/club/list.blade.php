@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Club List</h4>                      
                                            </div><!--end col-->
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>Contact Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <!-- <th>Status</th> -->
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($clubs as $club)
                                                    <tr>
                                                        <td><img src="{{asset($club->logo)}}" alt="Logo" width="50"></td>
                                                        <td>{{ $club->name }}</td>
                                                        <td>{{ $club->address }}</td>
                                                        <td>{{ $club->city }}</td>
                                                        <td>{{ $club->contact_name }}</td>
                                                        <td>{{ $club->phone }}</td>
                                                        <td>{{ $club->email }}</td>
                                                        <!-- <td>{{ $club->status }}</td> -->
                                                        <td><a class="btn btn-primary py-0 px-1" href="{{route('team.list',$club->id)}}">Teams </a><a href="{{ route('club.edit', $club->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('club.destroy', $club->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this club?');">Delete</button>
                    </form></td>
                                                    </tr>
                                                   @endforeach
                                                </tbody>
                                            </table>
                                        </div>   
                                    </div><!--end card-body--> 
                                </div><!--end card--> 
                            </div> <!--end col-->                                                        
                        </div><!--end row-->

                                                        
                    </div><!-- container -->
        </div>
</div>


@endsection