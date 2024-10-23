@extends('layouts.app')
@section('title', 'Login - Smugglers')
@section('content')
<style type="text/css">
   .footer-area-wrapper{
        background-color: #cc9249;
    position: fixed;
    bottom: 0;
    width: 100%;
   }
   .rowcustom{
    height: 75%;
    /* margin: 0; */
    display: flex;
    justify-content: center;
    align-items: center;
   }
</style>
<div class="container">
    <div class="row justify-content-center rowcustom">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header cardheader">{{ __('Welcome') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0 mt-3">
                               <div class="col-md-12" style="justify-content:center;display: flex;">
                                   <button type="submit" class="btn loginbtn">
                                    {{ __('Log in') }}
                                </button>
                               </div> 
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12" >
                                <a class="btn-link text-end" href="{{ route('register') }}">
                                        {{ __('Join Now') }}
                                    </a>
                                    <span>|</span>
                                @if (Route::has('password.request'))
                                    <a class="btn-link text-end" href="{{ route('password.request') }}">
                                        {{ __('Lost Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <!--====================  footer area ====================-->
        <div class="footer-area-wrapper" style="background-color:#df9242;">
            <div class="footer-copyright-area" style="padding:10px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center text-md-start">
                            <p class="copyright-ptext" style="text-align: center;
    color: white;
    font-size: 20px;">Copyright © 2024 Smugglers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of footer area  ====================-->








@include('layouts.footer_home')
@endsection
