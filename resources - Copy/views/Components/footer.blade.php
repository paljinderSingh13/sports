<div class="footer">
                <div class="copyright">
                    <p>Copyright © 2024 - All Right Reserved By RECSTEP</p>
                </div>
            </div>
            </div>


            <!-- Required vendors -->
       <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
        <!-- Apex Chart -->
        <script src="{{asset('assets/vendor/apexchart/apexchart.js')}}"></script>
        <script src="{{asset('assets/vendor/chart-js/chart.bundle.min.js')}}"></script>
        <!-- Chart piety plugin files -->
        <script src="{{asset('assets/vendor/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
        <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
        <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
        <!-- Dashboard 1 -->
        <script src="{{asset('assets/js/dashboard/dashboard-1.js')}}"></script>
        <script src="{{asset('assets/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('assets/js/ic-sidenav-init.js')}}"></script>
        <!-- <script src="js/demo.js"></script> -->
        <!-- <script src="js/styleSwitcher.js"></script> -->

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1.5,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 40,
                    },
                    1200: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                },
            });
            var swiper = new Swiper(".mySwiper1", {
                slidesPerView: 4,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 20,
                    },
                },
            });
        </script>

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
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        @yield('js')
    </body>
    <!--end body-->

</html>