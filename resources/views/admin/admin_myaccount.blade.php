@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-box"></i>
                </span> My Account
              </h3>
            </div>
            @include('admin.inc.notify')
            <div class="row justify-content-center">
              
              <div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{ url('update-account') }}" method="POST">
                    	@csrf
                      <div class="form-group">
                        <label for="fname" class="form-label">First Name</label>
                                <input name="fname" type="text" required class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="First Name" value="{{ Auth::user()->fname }}">
                                @error('fname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                      </div>

                      <div class="form-group">
                        <label for="lname" class="form-label">Last Name</label>
                                <input name="lname" type="text" required class="form-control @error('lname') is-invalid @enderror" id="lname" placeholder="Last Name" value="{{ Auth::user()->lname }}">
                                @error('lname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                      </div>

                      <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                      </div>

                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Update Account</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
            
            
          </div>
@endsection