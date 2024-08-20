@if(Auth()->user()->status == 1)
@extends('layouts.dashboard')
@section('title', 'Monthly vs Yearly - Smugglers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <section id="account-overview">
                <h1 class="dashboard_title_heading">Monthly vs Yearly</h1>
                @if(Auth::user()->stripe_id == null)
                @include('trialtext')
                @else
                <div class="account-details mt-3 mb-3">
                    
                </div>
                @endif
            </section>
</div>
</div>
@include('layouts.footer_dashboard')
@endsection
@endif