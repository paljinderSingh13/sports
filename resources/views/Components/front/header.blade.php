 <!-- Navbar & Hero Start -->
  <body>
    <div>
         <div class="header">
          <div class="container-fluid nav-bar p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5  py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    <h1 class="display-5 text-secondary m-0"><img src="front/img/logo.png" class="img-fluid" alt="" /></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{route('front.index')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('front.about')}}" class="nav-item nav-link">About</a>
                        <a href="#" class="nav-item nav-link">Service</a>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown"><span class="dropdown-toggle">Pages</span></a>
                            <div class="dropdown-menu m-0">
                                <a href="feature.html" class="dropdown-item">Feature</a>
                                <a href="countries.html" class="dropdown-item">Countries</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="training.html" class="dropdown-item">Training</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div> -->
                        <a href="{{route('front.contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="#" class="btn btn-primary border-secondary  join_now_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Join Now</a>
                    <a href="" class="btn btn-primary border-secondary  blog_btn">Blog</a>
                </div>
            </nav>
        </div>
    </div>
        <!-- Navbar & Hero End -->


        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body">
        <div class="con_form form_brd">
            
                 <div class="text-center mb-4"><img src="{{asset('front/img/logo.png')}}"></div>
                    <form action="#" method="post">
                                        <div class="">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="account_type" placeholder="Account Type" name="account_type">
                                             <option value="" selected disabled hidden>Account Type</option>
                                            <option value="Club">Club</option>
                                            <option value="Personal">Personal</option>
                                        </select>
                                        <!-- <label for="account_type">Account Type</label> -->
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control" id="phone" placeholder="Phone">
                                        <label for="phone">Your Phone</label>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Join Now</button>
                                </div>
                            </div>
                         </div>
                        </form>
                                  </div>
      </div>
      
    </div>
  </div>
</div>