@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-search"></i>
                </span> All Users
              </h3>
            </div>
            @include('admin.inc.notify')
            <div class="row justify-content-center">
              
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> #</th>
                          <th> First name </th>
                          <th> Last name</th>
                          <th> Email </th>
                          <th> Lic no </th>
                          <th> status </th>
                          <th> Created_at </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $count = 0;
                        @endphp
                        @foreach($all_user as $user)
                        @php
                        $count++;
                        @endphp
                        <tr>
                          <td> {{ $count }} </td>
                          <td> {{ $user->fname }} </td>
                          <td> {{ $user->lname }} </td>
                          <td> {{ $user->email }} </td>
                          <td>{{ $user->userDetail->lic_no ?? 'N/A' }}</td>
                          <td>{{ $user->status == 1 ? 'registered' : 'unregistered' }}</td>
                          <td> {{ $user->created_at }} </td>
                          @if($user->status == 1)
                          <td></td>
                          @else
                          <td> <form action="{{ route('delete_user', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> </td>
                          @endif
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            
            
          </div>
@endsection