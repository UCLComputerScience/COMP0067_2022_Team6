<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container px-5">
    <a href="http://127.0.0.1:8000/"><img src="https://ancssc.com/wp-content/uploads/2019/07/ANCSSC.png"href="/" alt="..." height="36"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" href="members">Members</a></li>
              <li class="nav-item"><a class="nav-link" href="projects">Projects</a></li>
              <li class="nav-item"><a class="nav-link" href="resources">Resources</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Events</a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                      <li><a class="dropdown-item" href="events">Upcoming Events</a></li>
                      <li><a class="dropdown-item" href="past-events"> Events</a></li>
                    </ul>     </li>
              <li class="nav-item"><a class="nav-link" href="contact">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}">Log Out</a></li> 
          </ul>
      </div>
  </div>
</nav>