<style>
    /*Code to change color of active link*/
    .navbar-nav > li > a.active {
        color:#0d6dfdf3 !important;
    }
  </style>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container px-5">
  <a class="fw-bold fs-3 text-nowrap" style="text-decoration:none" href="/">ANCSSC<a class="fs-5" style="text-decoration:none">&nbsp;</a></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
             <li class="nav-item"><a  class="nav-item"><a class="nav-link {{ Request::segment(1)=='about' ? 'active' : '' }}" href="about">About</a></li>
              <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='membership' ? 'active' : '' }}" href="membership">Membership</a></li>
              <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='events' ? 'active' : '' }}" href="events">Events</a></li>  
              <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='contact' ? 'active' : '' }}" href="contact">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='login' ? 'active' : '' }}" href="login">Login</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='register' ? 'active' : '' }}" href="register">Register</a></li>
              
          </ul>
      </div>
  </div>
          <!-- Custom Google Search -->
          <script async src="https://cse.google.com/cse.js?cx=f44adf12da156c20f"></script>
          <div id="cse" style="width: 25%; margin: 0 auto">
          <div class="gcse-search"></div>
       <!-- Custom Google Search -->
</nav>
