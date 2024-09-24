@extends('layouts.master')
@section('content')


<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content team-form">
<div class="container-xxl"> 

<div class="row">
   
    <div class="col-md-6 col-lg-12">
        <div class="card rounded-5 mt-3">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title fs-1 text-primary text-center text-uppercase">Team Form</h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
               <form id="form-validation-2" class="form row" enctype="multipart/form-data" action="{{ route('team.update', base64_encode($team->id)) }}" method="POST">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->

    <div class="mb-2 col-lg-6 col-sm-12">
        <label for="name" class="form-label">Team Name</label>
        <input type="text" class="form-control form-control-lg" id="name" name="name" required placeholder="Team Name" value="{{ old('name', $team->name) }}">
        <input type="hidden" class="form-control form-control-lg" id="club_id" value="{{ $team->club_id }}" name="club_id" required>
    </div>

    <div class="mb-2 col-lg-6 col-sm-12">
        <label for="age_group" class="form-label">Age Group</label>
        <input type="text" class="form-control form-control-lg" id="age_group" name="age_group" required placeholder="Age Group" value="{{ old('age_group', $team->age_group) }}">
    </div>

    <div class="mb-2 col-lg-6 col-sm-12">
        <label for="season" class="form-label">Season</label>
        <input type="text" class="form-control form-control-lg" id="season" name="season" required placeholder="Season" value="{{ old('season', $team->season) }}">
    </div>

    <div class="mb-2 col-lg-6 col-sm-12">
        <label for="status" class="form-label">Status</label>
        <select class="form-select form-select-lg" id="status" name="status" required>
            <option value="1" {{ old('status', $team->status) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $team->status) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">
                <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Update</button>
            </div>
            <div class="col-lg-6 col-6 col-sm-6 mb-2">
                <a href="{{ route('team.list', base64_encode($team->club_id)) }}" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
            </div>
        </div>
    </div>
</form>
<!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->                                                         <div class="col-md-6 col-lg-2">
    </div>                      
</div><!--end row-->

</div><!-- container -->

    
    
@endsection