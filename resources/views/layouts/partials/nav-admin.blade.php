<style>
  /*Code to change color of active link*/
  .navbar-nav > li > a.active {
      color: #0d6dfdf3 !important;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container px-5">
  <a class="fw-bold fs-3 text-nowrap" style="text-decoration:none" href="/home">ANCSSC<a class="fs-5" style="text-decoration:none">&nbsp;&nbsp;admin</a></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item"> <a class="nav-link {{ Request::segment(1)=='admin-members' ? 'active' : '' }}" href="/admin-members">Members</a></li>
                <li class="nav-item"> <a class="nav-link {{ Request::segment(1)=='admin-manage-events' ? 'active' : '' }}" href="/admin-manage-events">Events</a></li>
                <li class="nav-item"> <a class="nav-link  {{ Request::segment(1)=='admin-projects-manage' ? 'active' : '' }}" href="/admin-projects-manage">Projects</a></li>
                <li class="nav-item"> <a class="nav-link {{ Request::segment(1)=='admin-manage-resources' ? 'active' : '' }}" href="/admin-manage-resources">Resources</a></li>
                <li class="nav-item"> <a class="nav-link {{ Request::segment(1)=='admin-analytics' ? 'active' : '' }}"  href="/admin-analytics">Analytics</a></li>
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