<!-- <footer class="footer text-center text-sm-start d-print-none">
        <div class="container-xxl">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0 rounded-bottom-0">
                        <div class="card-body">
                            <p class="text-muted mb-0">
                                ©
                                <script> document.write(new Date().getFullYear()) </script>
                                Recstep
                                <span
                                    class="text-muted d-none d-sm-inline-block float-end">
                                    Crafted with
                                    <i class="iconoir-heart text-danger"></i>
                                    </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
    
    <!--end footer-->
</div>
<!-- end page content -->
</div>
 <!-- Javascript  -->  
        <!-- vendor js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
        <script src="{{asset('assets/js/pages/datatable.init.js')}}"></script> 

         <!-- Sweet-Alert  -->
        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script> 
        <!-- <script src="{{asset('assets/js/pages/sweet-alert.init.js')}}"></script>  -->
        <script src="{{asset('assets/js/pages/mysweet-alert.init.js')}}"></script> 
        <script src="{{asset('assets/js/app.js')}}"></script> 

        <script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
 @if(session('success'))
       <!--  <div class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert" style="z-index: 1051;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <input type="hidden" id="successMsg" value="{{ session('success') }}">
        <a id="success" onclick="executeExample('customPositions')" >&nbsp;</a>
       
    @endif
       <script >
            function executeExample(t) {
                var msg = $('#successMsg').val();

                switch (t) {
                    case "customPositions":
                        return void Swal.fire({ position: "top-end", icon: "success", title: msg, showConfirmButton: !1, timer: 3000 });
                }
            }
            
       </script>
       <script>
           $(document).ready(function() {
                // Set a timeout to delay the execution of the code inside
                setTimeout(function() {
                        $('#success').click();
                    
                }, 800); // 3000 milliseconds = 3 seconds
            });
       </script>
        @yield('js')
    </body>
    <!--end body-->

</html>