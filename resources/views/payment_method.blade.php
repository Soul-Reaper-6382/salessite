@if(Auth()->user()->status == 1)
@extends('layouts.dashboard')
@section('title', 'Payment Method - Smugglers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <section id="account-overview">
                <h1 class="dashboard_title_heading">Payment Method</h1>
                @if(Auth::user()->stripe_id == null)
                @include('trialtext')
                @else
                <div class="account-details mt-3 mb-3">
                     @if(count($paymentMethods) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Card Number</th>
                                    <th>Card Type</th>
                                    <th>Expiry Date</th>
                                    <th>Default</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentMethods as $paymentMethod)
                                    <tr>
                                        <td>{{ '**** **** **** ' . substr($paymentMethod->card->last4, -4) }}</td>
                                        <td>{{ ucfirst($paymentMethod->card->brand) }}</td>
                                        <td>{{ $paymentMethod->card->exp_month . '/' . $paymentMethod->card->exp_year }}</td>
                                        <td>
                                            @if($paymentMethod->id === Auth::user()->default_payment_method_id)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No payment methods available.</p>
                    @endif
                </div>
                @endif
            </section>
</div>
</div>
@include('layouts.footer_dashboard')
@endsection
@endif