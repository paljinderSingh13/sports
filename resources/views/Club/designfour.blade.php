@extends('layouts.master')
@section('content')
<div class="page-wrapper">
   <!-- Page Content-->
   <div class="page-content designfour">
      <div class="container-xxl">
         <div class="row justify-content-center mt-3">
            <div class="col-12">
               <div class="card rounded-5">
                  <div class="card-header rounded-5">
                     <div class="row align-items-center">
                        <div class="col">
                           <h4 class="card-title">Club Form</h4>
                        </div>
                        <!--end col-->
                     </div>
                     <!--end row-->                                  
                  </div>
                  <!--end card-header-->
                  <div class="card-body pt-0">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="mb-3 row">
                              <label for="Logo" class="col-sm-2 col-form-label text-end">Logo</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="file"  id="Logo">
                              </div>
                           </div>                           
                            <div class="mb-3 row">
                              <label for="Address" class="col-sm-2 col-form-label text-end">Address</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="text"  id="Address">
                              </div>
                           </div>
                           <div class="mb-3 row">
                              <label class="col-sm-2 col-form-label text-end">State</label>
                              <div class="col-sm-10">
                                 <select class="form-select form-select-lg" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                 </select>
                              </div>
                           </div>
                           <div class="mb-3 row">
                              <label for="PostalCode" class="col-sm-2 col-form-label text-end">Postal Code</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="number"  id="PostalCode">
                              </div>
                           </div>
                           <div class="mb-3 row">
                              <label for="Phone" class="col-sm-2 col-form-label text-end">Phone</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="number"  id="Phone">
                              </div>
                           </div>

                           <div class="mb-3 row">
                              <label for="example-email-input" class="col-sm-2 col-form-label text-end">Email</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="email" value="bootstrap@example.com" id="example-email-input">
                              </div>
                           </div>
                           
                        </div>
                        <!--end col-->
                        
                        <div class="col-lg-6">
                        <div class="mb-3 row">
                              <label for="Name" class="col-sm-2 col-form-label text-end">Name</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="text"  id="Name">
                              </div>
                        </div>
                           
                           <div class="mb-3 row">
                              <label for="example-month-input" class="col-sm-2 col-form-label text-end">Month</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="month" value="2011-08" id="example-month-input">
                              </div>
                           </div>
                           <div class="mb-3 row">
                              <label for="example-week-input" class="col-sm-2 col-form-label text-end">Week</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="week" value="2011-W33" id="example-week-input">
                              </div>
                           </div>
                           <div class="mb-3 row">
                              <label for="example-time-input" class="col-sm-2 col-form-label text-end">Time</label>
                              <div class="col-sm-10">
                                 <input class="form-control form-control-lg" type="time" value="13:45:00" id="example-time-input">
                              </div>
                           </div>
                           <div class="mb-3 row has-warning">
                              <label for="inputHorizontalWarning" class="col-sm-2 col-form-label text-end">Email</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control form-control-warning" id="inputHorizontalWarning" placeholder="name@example.com">
                                 <small class="form-text text-muted">Example help text that remains unchanged.</small>
                              </div>
                           </div>
                           <div class="mb-3 row has-success">
                              <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label text-end">Email</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control is-valid" id="inputHorizontalSuccess" placeholder="name@example.com">
                                 <div class="valid-feedback">Success! You've done it.</div>
                              </div>
                           </div>
                           <div class="mb-3 row has-error">
                              <label for="inputHorizontalDnger" class="col-sm-2 col-form-label text-end">Email</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control is-invalid" id="inputHorizontalDnger" placeholder="name@example.com">
                                 <div class="invalid-feedback">Sorry, that username's taken. Try another?</div>
                              </div>
                           </div>
                        </div>
                        <!--end col-->
                     </div>
                     <!--end row-->              
                  </div>
                  <!--end card-body--> 
               </div>
               <!--end card--> 
            </div>
            <!--end col-->                                                       
         </div>
         <!--end row-->
      </div>
      <!-- container -->
      <!--end Rightbar/offcanvas-->
      <!--end Rightbar-->
      <!--Start Footer-->
      <footer class="footer text-center text-sm-start d-print-none">
         <div class="container-xxl">
            <div class="row">
               <div class="col-12">
                  <div class="card mb-0 rounded-bottom-0">
                     <div class="card-body">
                        <!-- <p class="text-muted mb-0">
                           ©
                           <script> document.write(new Date().getFullYear()) </script>
                           Rizz
                           <span
                               class="text-muted d-none d-sm-inline-block float-end">
                               Crafted with
                               <i class="iconoir-heart text-danger"></i>
                               by Mannatthemes</span>
                           </p> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!--end footer-->
   </div>
   <!-- end page content -->
</div>
@endsection