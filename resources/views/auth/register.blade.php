@extends('layouts.reg')

@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header">{{ __("Let's Get You Started!") }}</div>

                <div class="card-body">
                    <p class="text-center mt-2">Already have an account? <a class="btn-link" href="{{ route('login') }}">{{ __('Log in here') }}</a></p>
                    <form id="payment-form" method="POST" action="{{ url('registerstore') }}">
                        @csrf

                        <div class="row mb-3">
    <label for="username" class="col-md-12 col-form-label">Username</label>
    <div class="col-md-12">
        <input name="username" type="text"  class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username">
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="password" class="col-md-12 col-form-label">Password</label>
    <div class="col-md-12" style="position:relative;">
        <p style="position: absolute; right: 20px; font-size: 12px; color: #cc9249; font-weight: bold; bottom: -15px;">The password must be at least 8 characters.</p>
        <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" minlength="8"  autocomplete="new-password" placeholder="Password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="password-confirm" class="col-md-12 col-form-label">Confirm Password</label>
    <div class="col-md-12">
        <input id="password-confirm" type="password" class="input form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-12 col-form-label">Email Address</label>
    <div class="col-md-12">
        <input name="email" type="email"  class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="email-confirm" class="col-md-12 col-form-label">Confirm Email Address</label>
    <div class="col-md-12">
        <input name="email_confirmation" type="email"  class="form-control @error('email_confirmation') is-invalid @enderror" id="email-confirm" placeholder="Confirm Email Address">
         @error('email_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<h4 class="text-center"> Additional Fields </h4>
<div class="row mb-3">
    <label for="first-name" class="col-md-12 col-form-label">First Name</label>
    <div class="col-md-12">
        <input name="first_name" type="text"  class="form-control @error('first_name') is-invalid @enderror" id="first-name" placeholder="First Name">
        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="last-name" class="col-md-12 col-form-label">Last Name</label>
    <div class="col-md-12">
        <input name="last_name" type="text"  class="form-control @error('last_name') is-invalid @enderror" id="last-name" placeholder="Last Name">
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="store-license" class="col-md-12 col-form-label">Store License</label>
    <div class="col-md-12">
        <input name="store_license" type="text"  class="form-control @error('store_license') is-invalid @enderror" id="store-license" placeholder="Store License">
        @error('store_license')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                        

                        <div class="row">
                            <div class="col-md-10">
                                <input id="roles" type="hidden" class="form-control" name="roles" value="2">
                            </div>
                        </div>

                            <div class="row mb-3">
            <div class="col-md-12">
    <div class="form-check">
  <input class="" type="checkbox" id="privacy_policy" name="privacy_policy">
  <label class="form-check-label" for="privacy_policy" style="display: contents;">I hereby certify that the information provided is accurate and truthful, and I affirm that I am the legitimate representative of the liquor store identified by the registration number entered. I understand that providing false information may constitute fraud under 18 U.S.C. § 1028, which addresses fraud and related activities involving identification documents, authentication features, and information, and may result in penalties including fines and imprisonment. *.</label>
</div>

@error('privacy_policy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The terms must be accepted.</strong>
                                    </span>
                                @enderror
</div>
</div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn loginbtn btnsubmit" disabled>
                                    {{ __('Submit and Confirm') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








    </div>
    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fas fa-chevron-up"></i>
        <i class="arrow-bottom fas fa-chevron-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->

    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.html">
                                    <img src="logo.png" class="img-fluid" alt="Smuggler" style="max-width: 90px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-end">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                    <ul>
                        <li class="">
                            <a href="{{ url('home') }}">Home</a></li>
                            <li class="">
                            <a href="{{ route('login') }}">Log in</a></li>
                            <li class="">
                                                         <a href="{{ route('register') }}" class="btn btn-gradient-primary custom_header_btn">Try smugglers for free</a>
                                                        </li>
                                </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->







    <!--====================  search overlay ====================-->
    <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 ms-auto col-4">
                        <!-- search content -->
                        <div class="search-content text-end">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <form action="#">
                        <input type="text" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of search overlay  ====================-->








    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->

    <script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script type="text/javascript">
        $(document).on('change','#privacy_policy',function(){
        if($(this).is(':checked')){
            $('.btnsubmit').removeClass('btn-custom')
            $('.btnsubmit').removeAttr('disabled')
        }
        else{
            $('.btnsubmit').addClass('btn-custom')
            $('.btnsubmit').attr('disabled','disabled')
        }
    })
    </script>
@endsection
