@if(Auth()->user()->status == 1)
@extends('layouts.dashboard')
@section('title', 'Billing History - Smugglers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <section id="account-overview">
                <h1 class="dashboard_title_heading">Billing History</h1>
                @if(Auth::user()->stripe_id == null)
                @include('trialtext')
                @else
                <div class="account-details mt-3 mb-3">
                    @if(count($invoices) > 0)
                    <p style="    text-align: right;
    font-size: 13px;
    color: black;
    font-weight: 500;
    font-family: math;"><span style="    font-weight: 800;
    font-family: 'Inter';
    font-size: 14px;">Next Billing: </span>{{ $nextBillingDate }}</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                     <th>Preview</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp($invoice->created)->format('F j, Y') }}</td>
                                        <td>{{ $invoice->description ?? 'Invoice #' . $invoice->id }}</td>
                                        <td>${{ number_format($invoice->amount_paid / 100, 2) }}</td>
                                        <td>{{ ucfirst($invoice->status) }}</td>
                                        <td>
                                            <a href="{{ $invoice->hosted_invoice_url }}" target="_blank">View Invoice</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No billing history available.</p>
                    @endif
                </div>
                @endif
            </section>
</div>
</div>
@include('layouts.footer_dashboard')
@endsection
@endif