@if(Auth()->user()->status == 1)
@extends('layouts.dashboard')
@section('title', 'Change Password - Smugglers')
@section('content')
    <div class="container">
        <div class="row justify-content-center rowcustom">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header cardheader">{{ __('Chnage Password') }}</div>

                    <form action="{{ url('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password" required>
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password" required>
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password" required>
                            </div>

                        </div>
                        <div class="row mb-0 mt-3">
                               <div class="col-md-12" style="justify-content:center;display: flex;">
                                   <button type="submit" class="btn loginbtn">
                                    {{ __('Change Password') }}
                                </button>
                               </div> 
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer_dashboard')
@endsection
@endif