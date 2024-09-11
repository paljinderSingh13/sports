@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card rounded-5 mt-3">
                                    <div class="card-header rounded-5">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0">                      
                                                <h4 class="card-title fs-1 text-primary text-uppercase">Teams </h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">
                                            <a class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4" href="{{route('team.create',$id)}}"><i class="far fa-plus-square"></i> Add Team</a>
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
                                                        <td>
                                                            <a href="{{ route('administrator.create', $team->id) }}" class="btn btn-success btn-sm"> <i class="far fa-user"></i> Administrator</a>
                                                            <a href="{{ route('team.edit', $team->id) }}" class="btn btn-blue btn-sm"><i class="far fa-edit"></i> Edit</a>
                    <form action="{{ route('team.destroy', $team->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="executeExample('teamdelete')"  onclick="return confirm('Are you sure you want to delete this club?');"><i class="far fa-trash-alt"></i> Delete</button>
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
        


@endsection