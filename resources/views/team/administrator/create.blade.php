@extends('layouts.master')
@section('content')


<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content">
<div class="container-xxl"> 

<div class="row">
   
    <div class="col-md-6 col-lg-12">
        <div class="card rounded-5 mt-3">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title fs-1 text-primary text-center text-uppercase">Administrator Form</h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form class="form row" action="{{ route('administrator.store') }}" method="POST">
                    @csrf
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="teamid" class="form-label">Team id</label>
                        <input type="text" class="form-control form-control-lg"  name="teamid" required placeholder="Team id">
                        
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" required placeholder="Name">
                        <input type="hidden" name="team_id" value="{{$id}}" required>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select form-select-lg" name="type" required>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control form-control-lg" name="phone" required placeholder="Phone">
                    </div>        
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" name="email" required placeholder="Email">
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-select-lg" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">                            
                            <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2 ">Create Administrator</button>
                        </div>
                        <div class="col-lg-6 col-6 col-sm-6 mb-2">
                        <button type="button" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</button>
                        </div>
                    </div>  
                </div>
                </form>
                <!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->                                                        
     <div class="col-md-6 col-lg-2">
    </div>                      
</div><!--end row-->

</div><!-- container -->

    
    
@endsection