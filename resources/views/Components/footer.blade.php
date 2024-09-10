<footer class="footer text-center text-sm-start d-print-none">
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
    </footer>
    
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

        <script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        @yield('js')
    </body>
    <!--end body-->

</html>