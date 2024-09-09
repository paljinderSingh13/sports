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
                        <h3 class="card-title">Club Form</h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form id="form-validation-2" class="form row" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="logo" class="form-label">Logo</label>
                        <input class="form-control" type="file" name="logo" id="logo" placeholder="Logo">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Name" class="form-label">Name</label>
                        <input class="form-control" type="text" name="name" id="Name" placeholder="Name">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Address" class="form-label">Address</label>
                        <input class="form-control" type="text" name="address" id="Address" placeholder="Address">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="City" class="form-label">City</label>
                        <input class="form-control" type="text" name="city" id="City" placeholder="City">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label class="col-form-label">State</label>
                       
                            <select class="form-select" aria-label="Default select example" name="state">
                                <option selected>State</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                                <small>Error Message</small>
                        
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label class="col-form-label">Country</label>
                       
                            <select class="form-select" aria-label="Default select example" name="country">
                                <option selected>Country</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>
                        
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="PostalCode" class="form-label">Postal Code</label>
                        <input class="form-control" type="text" name="postal_code" id="PostalCode" placeholder="Postal Code">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="ContactName" class="form-label">Contact Name</label>
                        <input class="form-control" type="text" name="contact_name" id="ContactName" placeholder="Contact Name">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Phone" class="form-label">Phone</label>
                        <input class="form-control" type="text" name="phone" id="Phone" placeholder="Phone">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Email" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="Email" placeholder="Email">
                        <small>Error Message</small>
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