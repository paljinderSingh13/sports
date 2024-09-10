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
                                                <h4 class="card-title">Teams <a href="{{route('team.create',$id)}}"><span>+</span>Add</a></h4>                      
                                            </div><!--end col-->
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                     <th>Club ID</th>
                                                    <th>Name</th>
                                                    <th>Age Group</th>
                                                    <th>Season</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($teams as $team)
                                                    <tr>
                                                        <td>{{ $team->club_id }}</td>
                                                        <td>{{ $team->name }}</td>
                                                        <td>{{ $team->age_group }}</td>
                                                        <td>{{ $team->season }}</td>
                                                        <td>{{ ucfirst($team->status) }}</td>
                                                        <td><a href="{{ route('administrator.create', $team->id) }}" class="btn btn-success btn-sm">Administrator</a><a href="{{ route('team.edit', $team->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('team.destroy', $team->id) }}" method="POST" style="display:inline-block;">
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