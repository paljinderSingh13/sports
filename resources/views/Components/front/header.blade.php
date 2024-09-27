 <!-- Navbar & Hero Start -->
  <body>
    <div>
         <div class="header">
          <div class="container-fluid nav-bar p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="display-5 text-secondary m-0"><img src="front/img/logo_new.png" class="img-fluid" alt="" /></h1>
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
                    <a href="{{route('front.join')}}" class="btn btn-primary border-secondary rounded-pill join_now_btn">Join Now</a>
                    <a href="" class="btn btn-primary border-secondary rounded-pill blog_btn">Blog</a>
                </div>
            </nav>
        </div>
    </div>
        <!-- Navbar & Hero End -->