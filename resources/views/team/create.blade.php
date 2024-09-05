@extends('layouts.master')
@section('content')


<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content">
<div class="container-xxl"> 

<div class="row">
   
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title">Team Form</h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form id="form-validation-2" class="form row" enctype="multipart/form-data" action="{{ route('team.store') }}" method="POST">
                    @csrf

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="name" class="form-label">Team Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <input type="hidden" class="form-control" id="club_id" value="{{$id}}" name="club_id" required>
                    </div>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="age_group" class="form-label">Age Group</label>
                        <input type="text" class="form-control" id="age_group" name="age_group" required>
                    </div>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="season" class="form-label">Season</label>
                        <input type="text" class="form-control" id="season" name="season" required>
                    </div>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </div>
                    </div> 

                </form><!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->                                                         <div class="col-md-6 col-lg-2">
    </div>                      
</div><!--end row-->

</div><!-- container -->

    
    
@endsection