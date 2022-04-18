<style>
  /*Code to change color of active link*/
  .navbar-nav > li > a.active {
      color:#0d6dfdf3 !important;
  }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container px-5">
  <a class="fw-bold fs-3 text-nowrap" style="text-decoration:none" href="/home">ANCSSC<a class="fs-5" style="text-decoration:none">&nbsp;&nbsp;members</a></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='members' ? 'active' : '' }}" href="/members">Members</a></li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ Request::segment(1)=='projects' ? 'active' : '' }} {{ Request::segment(1)=='projects-my' ? 'active' : '' }}" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Projects</a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                    <li><a class="dropdown-item {{ Request::segment(1)=='projects' ? 'active' : '' }}" href="/projects">All Projects</a></li>
                      <li><a class="dropdown-item {{ Request::segment(1)=='projects-my' ? 'active' : '' }}" href="/projects-my">My Projects</a></li>
                    </ul>     
              </li>
              <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='resources' ? 'active' : '' }}" href="/resources">Resources</a></li>
              <li class="nav-item"><a class="nav-link {{ Request::segment(1)=='login-events' ? 'active' : '' }}" href="/login-events">Events</a></li>

              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ Request::segment(1)=='user-profile' ? 'active' : '' }} {{ Request::segment(1)=='password/reset' ? 'active' : '' }}" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">My Profile</a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                    <li><a class="dropdown-item {{ Request::segment(1)=='user-profile' ? 'active' : '' }}" href="/user-profile">Edit My Profile</a></li>
                      <li><a class="dropdown-item {{ Request::segment(1)=='password/reset' ? 'active' : '' }}" href="/password/reset">Change Password</a></li>
                    </ul>     
              </li>
                
              <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}">Log out</a></li> 
          </ul>
      </div>
  </div>
            <!-- Custom Google Search -->
            <script async src="https://cse.google.com/cse.js?cx=f44adf12da156c20f"></script>
            <div id="cse" style="width: 25%; margin: 0 auto">
            <div class="gcse-search"></div>
         <!-- Custom Google Search -->
</nav>