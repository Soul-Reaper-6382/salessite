@if(Auth()->user()->status == 1)
@if(Auth()->user()->stripe_id == '')
@extends('layouts.dashboard')
@section('title', 'Add a Card - Smugglers')
@section('content')
@php
$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

$intent = $stripe->setupIntents->create(['usage' => 'on_session']); 
@endphp
<style>
    .headingcard{
    text-align: center;
    margin: 0px 0px 0px 35px;
    font-size: 20px;
    font-weight: bold;
    font-family: inherit;
}
.cardwarning{
       /* margin: 0px 15px 0px 0px;
    font-size: 14px;
    text-align: right;*/
    margin: -10px 10px 0px 0px;
    font-size: 14px;
    text-align: right;
    color: blue;
}
.invalid-feedback {
     display: block;
    }
    #card-element{
        padding: 10px 10px 10px 10px;
    background: white;
    border: 2px solid #e6e6eb;
    border-radius: 10px;
}
#card-errors{
    text-align: center;
    color: red;
    font-family: cursive;
}
</style>
    <div class="container">
        <div class="row justify-content-center rowcustom">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header cardheader">{{ __('add a card') }}</div>

                    <form action="{{ url('update_make_payment') }}" method="POST" id="submit_store_info">
                        @csrf
                        <div class="card-body">

                            <div class="row mb-1">

                            <div class="col-md-12">
                                <p class="headingcard">Enter Credit or Debit card details.</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p style="margin: 0;
    text-align: right;
    font-weight:500;">
    {{-- ${{ $plan->price }} / {{ $plan->duration }} --}} 
    <b>Current Plan:</b> {{ $plan->name }} / {{ $plan->duration }}  
    <a href="{{ url('starting_plan') }}" style="font-size: 11px;
    color: blue;
    text-decoration: underline;">Change Plan</a>
</p>
                                <div id="card-element"></div>
                                 <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                       
                        <div class="row mb-1">

                            <div class="col-md-12">
                                <p class="cardwarning">A valid Credit or Debit card is required when establishing a new account.</p>
                            </div>
                        </div>

                        </div>
                        <div class="row mb-0 mt-3">
                               <div class="col-md-12" style="justify-content:center;display: flex;">
                                   <button type="submit" class="btn loginbtn" data-secret="{{ $intent->client_secret }}" id="card-button">
                                    {{ __('Confirm Payment') }}
                                </button>
                               </div> 
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer_dashboard')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')
   
    const elements = stripe.elements()
    var style = {
  base: {
    color: "#32325d",
  }
};
    const cardElement = elements.create('card', { hidePostalCode: true, style: style })
  
    cardElement.mount('#card-element');
   
    const form = document.getElementById('submit_store_info')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('first_name')
    const displayError = document.getElementById('card-errors');
   
    form.addEventListener('submit', async (e) => {
        e.preventDefault()
   
        cardBtn.disabled = true
        displayError.textContent = '';
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: "{{ Auth::user()->fname }} {{ Auth::user()->lname }}"
                    }   
                }
            }
        )
   
        if(error) {
            displayError.textContent = error.message;
            console.log(error)
            cardBtn.disabled = false
            
        } else {
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            form.appendChild(token)
            form.submit();
        }
    })
</script>

@endsection
@else
<script type="text/javascript">
    location.href = 'dashboard';
</script>
@endif
@endif