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
                                                <h4 class="card-title">List of Administrators <a href="{{route('administrator.create',$team_id)}}"><span>+</span>Add</a></h4>                      
                                            </div><!--end col-->
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Team ID</th>
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($administrators as $index => $administrator)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $administrator->team_id }}</td>
                                                            <td>{{ $administrator->name }}</td>
                                                            <td>{{ $administrator->type }}</td>
                                                            <td>{{ $administrator->phone }}</td>
                                                            <td>{{ $administrator->email }}</td>
                                                            <td>
                                                                <span class="badge {{ $administrator->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                                                    {{ ucfirst($administrator->status) }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="text-center">No administrators found.</td>
                                                        </tr>
                                                    @endforelse
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