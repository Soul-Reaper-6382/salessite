<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Smugglers')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Smugglers">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- CSS
        ============================================ -->

    <!-- Font Family CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->

    <link rel="stylesheet" href="{{ asset('assets/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.min.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>

    <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <img src="{{ url('logo.png') }}" aria-label="Smuggler" width="90px" height="48" class="img-fluid" alt="Smuggler">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>




     <!--====================  header area ====================-->
    <div class="header-area header-area--default">

        <!-- Header Bottom Wrap Start -->
        <div class="header-bottom-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header default-menu-style position-relative">

                            <!-- brand logo -->
                            <div class="header__logo">
                                <a href="{{ url('home') }}">
                                    <img src="{{ url('logo.png') }}" aria-label="Smuggler" width="90px" height="48" class="img-fluid" alt="Smuggler">
                                </a>
                            </div>

                            <!-- header midle box  -->
                            <div class="header-right-box">
                                <div class="header-bottom-wrap d-md-block d-none">
                                    <div class="header-bottom-inner">
                                        <div class="header-bottom-left-wrap">
                                            <!-- navigation menu -->
                                            <div class="header__navigation d-none d-xl-block">
                                                <nav class="navigation-menu">
                                                    
                                                    <ul>
                                                         <li class="">
                                                            <a href="{{ url('home') }}"><span>Home</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('dashboard') }}"><span>Account Overview</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('billing_history') }}"><span>Billing History</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('payment_method') }}"><span>Payment Method</span></a>
                                                        </li>
                                                        <li class="">
                                                            <div class="dropdown">
                                                        <button class="dropbtn"><i class="fa fa-cog"></i> Settings</button>
                                                        <div class="dropdown-content">
                                                            <a href="{{ url('change_password') }}">Change Password</a>
                                                            @if(Auth::user()->stripe_id == null)
                                                            <a href="{{ url('add_a_card') }}">add a card</a>
                                                            @endif
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                        </li>
                                                       <!--  <li class="">
                                                            <a class="" style="float: right;color: red;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                                        </li> -->
                                            </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                                <!-- hidden icons menu -->
                                <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                                    <a href="javascript:void(0)">
                                        <i class="far fa-ellipsis-h-alt"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom Wrap End -->

    </div>
    <!--====================  End of header area  ====================-->

              @if ($flash = session('message'))
        <div class="container" style="justify-content: center;display: flex;">
            <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $flash }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            </div>
        </div>
        @elseif ($flash = session('error'))
        <div class="container" style="justify-content: center;display: flex;">
            <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $flash }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        </div>
        @endif
            @yield('content')
   
</body>
</html>



