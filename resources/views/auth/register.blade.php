@extends('layouts.reg')
@section('title', 'Register - Smugglers')
@section('content')
<style type="text/css">
    body{
    display: flex;
    justify-content: center;
    align-items: center;
   margin-top: 30px;
   }
   .underbody {
    top: 0;
}
@media only screen and (max-width: 767px) {
  body {
    display: block;
    justify-content: center;
    align-items: center;
   margin-top: 30px;
   }
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-8" style="">
            <div class="card">
                <div class="card-header cardheader">{{ __("Let's Get You Started!") }}</div>

                <div class="card-body">
                    <p class="text-center mt-2">Already have an account? <a class="btn-link" href="{{ route('login') }}">{{ __('Log in here') }}</a></p>
    <form id="multi-step-form" method="POST" action="{{ url('registerstore') }}">
    @csrf
    <input type="hidden" name="stripe_plan" value="{{ $stripe_plan }}">
     <div class="row mb-3">
     <div class="col-md-6">
    <label for="username" class="col-md-12 col-form-label">Username</label>
    <div class="col-md-12">
        <input name="username" type="text"  class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" required>
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-6">
    <label for="first-name" class="col-md-12 col-form-label">Phone Number</label>
    <div class="col-md-12">
        <input name="phone_number" type="text"  class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Phone Number" required>
        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
   </div>
    </div>

    </div>

<div class="row mb-3">
    <div class="col-md-6">
    <label for="email" class="col-md-12 col-form-label">Email Address</label>
    <div class="col-md-12">
        <input name="email" type="email"  class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" value="{{ old('email') }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="col-md-6">
    <label for="email-confirm" class="col-md-12 col-form-label">Confirm Email Address</label>
    <div class="col-md-12">
        <input name="email_confirmation" type="email"  class="form-control @error('email_confirmation') is-invalid @enderror" id="email-confirm" placeholder="Confirm Email Address" value="{{ old('email_confirmation') }}" required>
         @error('email_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>

<div class="row mb-3">

    <div class="col-md-6">
    <label for="password" class="col-md-12 col-form-label">Password</label>
    <div class="col-md-12" style="position:relative;">
        <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" minlength="8"  autocomplete="new-password" placeholder="Password" value="{{ old('password') }}" value="{{ old('password') }}" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-6">
    <label for="password-confirm" class="col-md-12 col-form-label">Confirm Password</label>
    <div class="col-md-12">
        <input id="password-confirm" type="password" class="input form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password" value="{{ old('password') }}" required>
    </div>
    </div>
</div>

<div class="row">
                            <div class="col-md-10">
                                <input id="roles" type="hidden" class="form-control" name="roles" value="2">
                            </div>
                        </div>

                        <div class="row mb-0 ">
                            <div class="col-md-12" style="justify-content:center;display: flex;">
                                <button type="submit" class="btn loginbtn">
                                    {{ __('Verify Me') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








   @include('../layouts.footer_home')
@endsection
