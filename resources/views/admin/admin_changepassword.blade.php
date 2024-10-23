@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-key"></i>
                </span> Change Password
              </h3>
            </div>
            @include('admin.inc.notify')
            <div class="row justify-content-center">
              
              <div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{ url('admin_update-password') }}" method="POST">
                    	@csrf
                      <div class="form-group">
                        <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input required name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                      </div>

                      <div class="form-group">
                        <label for="newPasswordInput" class="form-label">New Password</label>
                                <input required name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                      </div>


                      <div class="form-group">
                        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input required name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                      </div>

                      

                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Change Password</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
            
            
          </div>
@endsection