<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ url('/admin') }}"><img src="{{ url('/logo.png') }}" style="width: 120px;height: 70px;" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="{{ url('/admin') }}"><img src="{{ url('/logo.png')}}" style="height:20px" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="{{ url('assets/images/faces/face1.jpg') }}" alt="image">
            <!-- <span class="availability-status online"></span> -->
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{ url('admin_myaccount') }}">
            <i class="mdi mdi-account-box me-2 text-primary"></i> My Account </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('admin_changepassword') }}">
            <i class="mdi mdi-account-key me-2 text-primary"></i> Change Password </a>
        </div>
      </li>
      <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
          <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
      </li>
      
      <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          <i class="mdi mdi-power"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>

