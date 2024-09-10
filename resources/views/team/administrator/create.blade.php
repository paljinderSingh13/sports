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
                        <h3 class="card-title">Administrator Form</h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form action="{{ route('administrator.store') }}" method="POST">
    @csrf
    <input type="hidden" name="team_id" value="{{$id}}" required>
    
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" required>

    <label for="type">Type:</label>
    <input type="text" class="form-control" name="type" required>

    <label for="phone">Phone:</label>
    <input type="text" class="form-control" name="phone" required>

    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" required>

    <label for="status">Status:</label>
    <select class="form-control" name="status" required>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>

    <button type="submit" class="btn btn-success">Create Administrator</button>
</form>
<!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->                                                         <div class="col-md-6 col-lg-2">
    </div>                      
</div><!--end row-->

</div><!-- container -->

    
    
@endsection