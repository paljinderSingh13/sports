@extends('layouts.master')
@section('content')

<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content">
<div class="container-xxl"> 

<div class="row ">
   
    <div class="col-md-12 col-lg-12">
        <div class="card rounded-5 mt-3">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title text-center text-primary fs-1 text-uppercase">Create Schedule </h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form id="form-validation-2" class="form row">
                    
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Type" class="form-label">Type <span class="text-danger">*</span></label>                       
                        <select class="form-select form-select-lg" id="Type" aria-label="Default select example" required>
                           <option selected>Select Type</option>
                           <option value="Tournaments">Tournaments</option>
                           <option value="Game">Game</option>
                           <option value="Practice">Practice</option>
                       </select>
                           <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Team" class="form-label">Team <span class="text-danger">*</span></label>                       
                        <select class="form-select form-select-lg" id="Team" aria-label="Default select example" required>
                           <option selected>Select Team</option>
                           <option value="Team A">Team A</option>
                           <option value="Team B">Team B</option>
                       </select>
                           <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" type="date" id="Date" placeholder="Date" required>
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Time" class="form-label">Time <span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" type="time" id="Time" placeholder="Time" required>
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="DateFrom" class="form-label">Date From <span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" type="date" id="DateFrom" placeholder="Date From" required>
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Dateto" class="form-label">Date To <span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" type="date" id="Dateto" placeholder="Date To" required>
                        <small>Error Message</small>
                    </div>
                    
                    <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">                            
                            <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2 ">Submit</button>
                        </div>
                        <div class="col-lg-6 col-6 col-sm-6 mb-2">
                        <button type="button" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</button>
                        </div>
                    </div> 
                    </div>     
                </form><!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->
                       
</div><!--end row-->

</div><!-- container -->
@endsection