@if(Auth()->user()->status == 1)
@if(Auth()->user()->stripe_id == '')
@extends('layouts.reg')
@section('title', 'Card Details - Smugglers')
@section('content')
@php
$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

$intent = $stripe->setupIntents->create(['usage' => 'on_session']); 
@endphp
<style>
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
            <div class="col-md-12 col-sm-12 col-lg-8" style="">
                <div class="card">
                    <div class="card-header cardheader">{{ __('Card Details') }}</div>

                    <form action="{{ url('update_card_detail') }}" method="POST" id="submit_store_info">
                        @csrf
                        <div class="card-body">

                            <div class="row mb-1">

                            <div class="col-md-12">
                                <p class="headingcard">Enter Credit or Debit card details.</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div id="card-element"></div>
                                 <div id="card-errors" role="alert"></div>
                            </div>
                        </div>

                        </div>
                        <div class="row">
                               <div class="col-md-12" style="justify-content:center;display: flex;">
                                <a href="https://smugglers-system.com/" style="    line-height: 3;
    font-size: 18px;
    text-decoration: underline;
    color: blue;
    margin: 0px 10px;">skip card</a>
                                   <button type="submit" class="btn loginbtn" data-secret="{{ $intent->client_secret }}" id="card-button">
                                    {{ __('Continue') }}
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