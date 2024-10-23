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
                          <th> Phone </th>
                          <th> Qualification </th>
                          <th> Practice name </th>
                          <th> Created_at </th>
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
                          <td> {{ $user->phone }} </td>
                          <td> {{ $user->qualifications }} </td>
                          <td> {{ $user->practice_name }} </td>
                          <td> {{ $user->created_at }} </td>
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