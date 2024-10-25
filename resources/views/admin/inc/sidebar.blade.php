<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/admin') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

     <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#homepage_set" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Home Page Setting</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-clipboard-text menu-icon"></i>
      </a>
      <div class="collapse" id="homepage_set">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('/text_setting') }}">Text Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/videos_setting') }}">Videos Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/images_setting') }}">Images Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/steps_setting') }}">Steps Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/graphic_textsetting') }}">Graphic Text Setting</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('/about_setting') }}">
        <span class="menu-title">About Us Setting</span>
        <i class="mdi mdi-text menu-icon"></i>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{ url('/integration_images') }}">
      <span class="menu-title">Integration Images</span>
        <i class="mdi mdi-image menu-icon"></i>
    </a>
  </li>

     <li class="nav-item">
      <a class="nav-link" href="{{ url('/testimonials') }}">
        <span class="menu-title">Testimonials</span>
        <i class="mdi mdi-comment-account menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('/calculator_setting') }}">
        <span class="menu-title">Calculator Setting</span>
        <i class="mdi mdi-calculator menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('/price_setting') }}">
        <span class="menu-title">Pricing Setting</span>
        <i class="mdi mdi-currency-usd menu-icon"></i>
      </a>
    </li>


    <!-- <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-account-search menu-icon"></i>
      </a>
      <div class="collapse" id="user">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('/adduser') }}">Add User</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/allusers') }}">All Users</a></li>
        </ul>
      </div>
    </li> -->

    

    
    
    
  </ul>
</nav>