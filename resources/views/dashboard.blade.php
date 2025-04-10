@php
    $layout = isset($layout) ? $layout : 'layouts.default'; // Provide a default layout if needed
@endphp
@if(Auth::user()->status == 1)
@section('title', 'Dashboard - Smugglers')
@section('content')
<!-- CSS -->

<div class="container">
    <div class="row justify-content-center">
    <section id="account-overview">
                <h1 class="dashboard_title_heading">Account Overview</h1>
                <div class="account-details">
                    <div class="detail-item">
                        <span class="detail-title">Name:</span>
                        <span class="detail-value name">{{ Auth::user()->fname}} {{ Auth::user()->lname}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Email:</span>
                        <span class="detail-value email">{{ Auth::user()->email}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Phone:</span>
                        <span class="detail-value email">{{ Auth::user()->phone}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Account Created:</span>
                        <span class="detail-value account-created">{{ Auth::user()->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Subscription Status:</span>
                    @if(Auth::user()->stripe_id == null)
                        <span class="detail-value subscription-status">Trial</span>
                    @else
                        @if ($planStatus === 'trialing' && isset($trialEnd))
                        <span class="detail-value subscription-status">Trial End: {{ \Carbon\Carbon::createFromTimestamp($trialEnd)->toDateTimeString() }}</span>
                        @else
                        <span class="detail-value subscription-status">{{ $planStatus }} </span>
                        @endif
                    @endif
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Current Plan:</span>
                        @if(Auth::user()->stripe_id == null)
                        <span class="detail-value subscription-status">Trial</span>
                        @else
                        <span class="detail-value current-plan">{{ $planName }} / {{ $billingInterval }} 
                            <a href="{{ url('change_plan') }}" style="font-size: 11px;
    color: blue;
    text-decoration: underline;">Change Plan</a>
</span>
                        @endif
                    </div>
                    @if(Auth::user()->stripe_id == null)
                    <div class="detail-item">
                        <span class="detail-title">Trial Ends At:</span>
                        <span class="detail-value trial-ends-at">{{ Auth::user()->trial_ends_at->format('F j, Y') }}</span>
                    </div>
                    @endif
                </div>

                <div class="account-details mt-3 mb-3">
                    <div class="detail-item">
                        <span class="detail-title">License Number:</span>
                        <span class="detail-value name"> 
                        {{ Auth::user()->userDetail->lic_no }}
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Store Name:</span>
                        <span class="detail-value email">{{ Auth::user()->userDetail->store_name}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Entity Name:</span>
                        <span class="detail-value account-created">{{ Auth::user()->userDetail->entity_name}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Store Address:</span>
                        <span class="detail-value subscription-status">{{ Auth::user()->userDetail->store_address}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">City:</span>
                        <span class="detail-value current-plan">{{ Auth::user()->userDetail->store_city}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">County:</span>
                        <span class="detail-value current-plan">{{ Auth::user()->userDetail->store_county}}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">State:</span>
                        <span class="detail-value current-plan">{{ Auth::user()->userDetail->store_state}}</span>
                    </div>
                </div>
            </section>
</div>
</div>
 @include('layouts.footer_dashboard')
@endsection
@else
@extends($layout)
@section('title', 'Dashboard - Smugglers')

@section('content')
<style type="text/css">
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    min-height: 100vh;
}

.card {
    position: relative; /* Change from fixed to relative for better responsiveness */
    top: auto;
    width: 90%; /* Adjust width dynamically */
    max-width: 800px; /* Limit max width for large screens */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    background: #fff;
}

.card-body {
    height: 600px;
    overflow-y: auto; /* Scrollable content */
}
   .underbody {
    top: 0;
}
/* Responsive Design */
@media only screen and (max-width: 768px) { 
    .card {
        width: 95%; /* Increase width on smaller screens */
        max-width: 100%;
    }
    .card-body {
        height: auto; /* Adjust height for smaller devices */
    }
}

@media only screen and (max-width: 480px) {
    .card {
        width: 100%; /* Full width on very small screens */
        border-radius: 0; /* Remove border-radius for a natural mobile feel */
    }
    .card-body {
        height: auto; /* Further reduce height for better usability */
    }
}
@media only screen and (max-width: 767px) {
  body {
    display: block;
    justify-content: center;
    align-items: center;
   margin-top: 30px;
   }
  }
.spinner_btn {
    border: 4px solid rgba(0, 0, 0, 0.1);
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border-left-color: #09f;
    animation: spin 1s linear infinite;
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
/* Set the height of the Select2 dropdown */
.select2-container .select2-selection--single {
    height: 38px !important; /* Adjust the height as needed */
    display: flex !important;
    align-items: center; /* Vertically align text */
    border-color: #e3dbdb !important;
}

/* Adjust font size and padding */
.select2-container--default .select2-selection--single .select2-selection__rendered {
    font-size: 16px; /* Adjust font size */
    padding-left: 10px; /* Adjust padding for the text */
    line-height: 50px; /* Match the height */
}

/* Style the dropdown arrow */
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 35px !important; /* Match the height */
    width: 35px !important; /* Adjust arrow container width */
}

/* Adjust dropdown options height */
.select2-results__option {
    padding: 10px; /* Adjust padding for dropdown items */
    font-size: 14px; /* Adjust font size */
}

.select2-container--default .select2-selection--single .select2-selection__clear {
    position: absolute !important;
    right: 30px;
}


/* Preloader container */
#preloader_state_fetch {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(231 226 226 / 80%);
    z-index: 99;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Spinner styling */
.spinner_state_fetch {
    width: 40px;
    height: 40px;
    border: 6px solid #2f3f58;
    border-top-color: #df9242;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}
.select2-container--default .select2-results__option[aria-disabled=true] {
    color: #db7e7e;
}

#loadingMessageState{
    color: #df9242;
    position: absolute;
    right: 35px;
    z-index: 9;
    top: 4px;
    font-size: 16px;
    display: none;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@php
$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

$intent = $stripe->setupIntents->create(['usage' => 'on_session']); 
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-8" style="">
            <div class="card">
                <div class="card-header cardheader">{{ __("Welcome!") }} {{ Auth()->user()->username }} <a class="" style="float: right;color: red;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></div>

                <div class="card-body">
  @if ($flash = session('message'))
        <div class="container" style="justify-content: center;display: flex;">
            <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $flash }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            </div>
        </div>
        @elseif ($flash = session('error'))
        <div class="container" style="justify-content: center;display: flex;">
            <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $flash }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        </div>
        @endif
    <form method="POST" action="{{ url('submit_dash_checkstore_license') }}" id="checkstore_license">
    @csrf
    <div class="row mb-3">
    <div class="col-md-6">
    <label for="state" class="col-md-12 col-form-label">State</label>
    <div class="col-md-12" style="position:relative;">
        <div id="preloader_state_fetch" class="preloader_state_fetch_select" style="display: none;">
        <div class="spinner_state_fetch"></div>
    </div>
            <span id="loadingMessageState">Please wait...</span>
        <select id="statefetch" name="statefetch" class="form-control @error('statefecth') is-invalid @enderror" required>
        </select>
        @error('statefetch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-7">
     <label for="store-license" class="col-md-12 col-form-label">Store Name</label>
    <div class="col-md-12" style="position: relative;">
        <div id="preloader_state_fetch" class="preloader_store_fetch_select" style="display: none;">
        <div class="spinner_state_fetch"></div>
        </div>
        <select name="store_name"  class="form-control @error('store_name') is-invalid @enderror" id="store_names">
        </select>
        <span class="invalid-feedback error_already_storename" role="alert" style="display:none;">
            <strong>Store name already exists</strong>
        </span>
        @error('store_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-5">
     <label for="store-license" class="col-md-12 col-form-label">Store License Number</label>
    <div class="col-md-12" style="position: relative;">
        <div id="preloader_state_fetch" class="preloader_lic_fetch_select" style="display: none;">
        <div class="spinner_state_fetch"></div>
        </div>
        <input name="store_license" type="text"  class="form-control @error('store_license') is-invalid @enderror" id="store_license">
        @error('store_license')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-12" style="text-align:center;">
        <span class="invalid-feedback error_already" role="alert" style="display:none;">
            <strong>Store name or License already exists</strong>
        </span>
    </div>

    </div>

    <div class="row mb-0 error_licenses" style="display: none;justify-content: center;">
    	<div class="col-md-12">
    	<p style="padding: 10px;
    font-size: 14px;
    color: red;
    font-weight: 600;
    border-radius: 5px;
    text-align: center;">please make sure the info you provided is correct</p>
    	</div>
    	<div class="col-md-12">
    	<p style="    background: beige;
    padding: 10px;
    font-size: 15px;
    color: black;
    font-weight: 700;
    border-radius: 5px;
    margin: 10px 0px 10px 0px;">If you’re having trouble signing up, book a call with us and we will walk you through our system <a href="#" style="color: blue;
    text-decoration: underline;">Click now</a></p>
    	</div>
    </div>

    <div class="row mb-0 ">
                            <div class="col-md-12" style="justify-content:center;display: flex;">
                                <button type="submit" class="btn loginbtn ci_submit_btn">
                                    {{ __('Confirm Information') }}
                                </button>
                                 <button type="button" class="btn loginbtn ci_submit_btn_loader" style="display:none;">    <div class="spinner_btn"></div></button>
                            </div>
                        </div>

                    </form>

      <form method="POST" action="{{ url('submit_store_info') }}" id="submit_store_info" style="display:;">
    @csrf
    <div class="row mb-3">
    <div class="col-md-6">
    <label for="first-name" class="col-md-12 col-form-label">Owner First Name</label>
    <div class="col-md-12">
        <input name="first_name" type="text"  class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="Owner First Name" required>
        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    
    <div class="col-md-6">
    <label for="last-name" class="col-md-12 col-form-label">Owner Last Name</label>
    <div class="col-md-12">
        <input name="last_name" type="text"  class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Owner Last Name" required>
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    </div>

     <div class="row mb-3">
    <div class="col-md-6">
    <label for="first-name" class="col-md-12 col-form-label">Store Name</label>
    <div class="col-md-12">
        <input name="store_name" type="text"  class="form-control @error('store_name') is-invalid @enderror" id="store_name" placeholder="Store Name" required>
        @error('store_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    
    <div class="col-md-6">
    <label for="last-name" class="col-md-12 col-form-label">Entity Name</label>
    <div class="col-md-12">
        <input name="entity_name" type="text"  class="form-control @error('entity_name') is-invalid @enderror" id="entity_name" placeholder="Entity Name" required>
        @error('entity_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    </div>

    <div class="row mb-3">
    <div class="col-md-6">
    <label for="first-name" class="col-md-12 col-form-label">Store Address</label>
    <div class="col-md-12">
        <input name="store_address" type="text"  class="form-control @error('store_address') is-invalid @enderror" id="store_address" placeholder="Store Address" required>
        @error('store_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    
    <div class="col-md-6">
    <label for="last-name" class="col-md-12 col-form-label">Store City</label>
    <div class="col-md-12">
        <input name="store_city" type="text"  class="form-control @error('store_city') is-invalid @enderror" id="store_city" placeholder="Store City" required>
        @error('store_city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    </div>

    <div class="row mb-3">
    <div class="col-md-6">
    <label for="first-name" class="col-md-12 col-form-label">Store County</label>
    <div class="col-md-12">
        <input name="store_county" type="text"  class="form-control @error('store_county') is-invalid @enderror" id="store_county" placeholder="Store County" required>
        @error('store_county')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    
    <div class="col-md-6">
    <label for="last-name" class="col-md-12 col-form-label">Store State</label>
    <div class="col-md-12">
        <input name="store_state" type="text"  class="form-control @error('store_state') is-invalid @enderror" id="store_state" placeholder="Store State" required>
        @error('store_state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    </div>

    @include('StartPlan.plan_change_signup')


    <div class="alert alert-info free_trial_info" style="padding: 5px;display: none;">
    </div>
    @if($plan->name == 'Startaa')
        
    @elseif($plan->name == 'Starta')
    @else
    @endif

    <div class="row mb-1 stripe_card_mounted_row">

                            <div class="col-md-12">
                                <p class="headingcard">Enter Credit or Debit card details.</p>
                            </div>
                        </div>

                        <div class="row mb-3 stripe_card_mounted_row">
                            <div class="col-md-12">
                                <p style="margin: 0;
    text-align: right;
    font-weight: 700;display:none; ">${{ $plan->price }} / {{ $plan->duration }}</p>
                                <div id="card-element"></div>
                                 <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                       
                        <div class="row mb-1 stripe_card_mounted_row">

                            <div class="col-md-12">
                                <p class="cardwarning">A valid Credit or Debit card is required when establishing a new account.</p>
                            </div>
                        </div>
                        
                <div class="row">
                            <div class="col-md-10">
                                <input id="state_old" type="hidden" class="form-control" name="state_old">
                                <input id="License_old" type="hidden" class="form-control" name="License_old">
                                <input id="free_trial" type="hidden" class="form-control" name="free_trial">
                                <input id="companyId" type="hidden" class="form-control" name="companyId">
                                <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="{{ Auth::user()->plan_id}}">
                            </div>
                        </div>

                            <div class="row mb-3">
            <div class="col-md-12">
   <div class="form-check">
    <input class="" type="checkbox" id="privacy_policy" name="privacy_policy">
    <label class="form-check-label" for="privacy_policy" style="display: contents;">
        <span id="short-text">
            I hereby certify that the information provided is accurate and truthful, and…
        </span>
        <span id="full-text" style="display: none;">
            I hereby certify that the information provided is accurate and truthful, and I affirm that I am the legitimate representative of the liquor store identified by the registration number entered. I understand that providing false information may constitute fraud under 18 U.S.C. § 1028, which addresses fraud and related activities involving identification documents, authentication features, and information, and may result in penalties including fines and imprisonment. *.
        </span>
        <a href="javascript:void(0);" id="read-more" onclick="toggleText()" style="    color: blue;">read more</a>
    </label>
</div>

@error('privacy_policy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The terms must be accepted.</strong>
                                    </span>
                                @enderror
</div>
</div>

    <div class="row mb-0 ">
                            <div class="col-md-12" style="justify-content:center;display: flex;">
                                <button type="submit" data-secret="{{ $intent->client_secret }}" id="card-button" class="btn loginbtn btnsubmit" disabled>
                                    {{ __('Create Account') }}
                                </button>
                            </div>
                        </div>

    </form>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    function card_mounted(){
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
                        name: cardHolderName.value
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
}
</script>

    <script type="text/javascript">
        function toggleText() {
    var shortText = document.getElementById("short-text");
    var fullText = document.getElementById("full-text");
    var readMoreLink = document.getElementById("read-more");

    if (fullText.style.display === "none") {
        fullText.style.display = "inline";
        shortText.style.display = "none";
        readMoreLink.textContent = "read less";
    } else {
        fullText.style.display = "none";
        shortText.style.display = "inline";
        readMoreLink.textContent = "read more";
    }
}

        $(document).ready(function(){
            document.getElementById('submit_store_info').style.display = 'none';
            setTimeout(function(){
            var dataDur = $(".price_main_column.dis_cls").attr("data-dur"); // Get data-dur value
            $('.tab_price[data-name="'+dataDur+'"]').click()
            },5000)

            $('.tab_price').on('click', function() {
                var name = $(this).data('name').toLowerCase(); // Get the data-name value and convert to lowercase

                // Remove active class from all labels and add to the clicked one
                $('.tab_price label').removeClass('active');
                $(this).find('label').addClass('active');
                if(name == 'monthly'){
                    var monthly_len = $(".price_main_column.dis_cls[data-dur='monthly']").length;
                    if(monthly_len == 0){
                        $(".click_change_plan[data-oid='2']").click();
                    }
                }
                else{
                    var yearly_len = $(".price_main_column.dis_cls[data-dur='yearly']").length;
                    if(yearly_len == 0){
                        $(".click_change_plan[data-oid='6']").click();
                    }
                }
                // Show elements matching the data-name and hide others
                $('.price_main_column').each(function() {
                    if ($(this).data('dur') === name) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            $(document).on('click','.click_change_plan',function(){
                $('.price-inner').addClass('click_change_plan');
                $(this).removeClass('click_change_plan');
                $('.price_main_column').removeClass('dis_cls')
                $(this).closest('.price_main_column').addClass('dis_cls')
                var planId = $(this).data('id');
                var planoId = $(this).data('oid');
                $('#plan_id').val(planoId)
                        $.ajax({
                        url: '{{ route("signup_plan_set") }}',
                        type: 'POST',
                        data: {
                            plan_id: planoId,
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
                        },
                        success: function(response) {
                        },
                        error: function(xhr) {
                            console.log(xhr)
                            alert('An error occurred: ' + xhr.responseJSON.error);
                        }
                    });
            })
        })
        fetch_state_func();

        function fetch_state_func(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var url_statefetch_func = "{{ url('statefetch_func') }}";
             // Show the preloader before making the AJAX request
            $('.preloader_state_fetch_select').show();

            $.ajax({
                url: url_statefetch_func,
                type: 'POST',
                success: function(data) {
                    console.log('Response:', data);  // Log the response data
                    if (data.response) {
                        var states = data.response;  // The states are an array of names
                        var $select = $('#statefetch');
                        
                        // Clear existing options
                        $select.empty();
                        
                        // Add default option
                        $select.append('<option value="">Select State</option>');
                        
                        // Loop through the states array and append options
                        $.each(states, function(index, state) {
                            // Here, you directly use `state` (which is the name of the state)
                            $select.append('<option value="' + state + '" data-id="' + state + '">' + state + '</option>');
                        });
                        $select.select2({
                            placeholder: 'Search for a state',
                            allowClear: true,
                            width: '100%'  // Adjust the width to fit the container
                        });
                    } else {
                        console.error('Invalid data format', data);
                    }

                },
                error: function(err) {
                    console.log('Error:', err);  // Log any errors
                },
                complete: function() {
                // Hide the preloader after the request is complete
                $('.preloader_state_fetch_select').hide();
                }
            });
        }

        $(document).on('change','#statefetch',function() {
            // var stateget_val = $(this).find('option:selected').text();
            // var stateget_id = $(this).find('option:selected').attr('data-id');
            var stateget_val = $(this).val();
            if (stateget_val == '') {
                 $('#store_license').unmask();
                 $('#store_license').val('')
                 $('#store_license').attr('placeholder', 'License Number');
                 $('#state_old').val('');
                 $('#store_names').empty();
            }
            else{
            $('#state_old').val(stateget_val);
            $('.preloader_store_fetch_select').show();
            $('.preloader_lic_fetch_select').show();
            $('#store_license').attr('readonly','readonly')
            $('#store_license').val('')
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
            });
        var url_statefetch = "{{ url('stateget_change') }}";
        $('#statefetch').prop('disabled', true);
        $('#loadingMessageState').show();
          $.ajax({
        url: url_statefetch,
        type: 'POST',
        data: {stateget_val : stateget_val},
        timeout: 30000, // Timeout in milliseconds
         success: function(data) {
            console.log(data)
            var $select = $('#store_names');
            $select.empty();

            // Check if store names are available
            if (data && data.stores && data.stores.length > 0) {
                // Append a default "Select a Store" option
                $select.append('<option value="">Select a Store</option>');

                // Create a list of user store names for quick matching
                let userStoreNames = data.userstores.map(userStore => userStore.store_name);

                // Loop through the store names and append them to the select dropdown
                $.each(data.stores, function (index, store) {
                    // Check if the store name exists in userstores
                    if (userStoreNames.includes(store.name)) {
                        // Add the option as disabled if it matches a user store
                        // $select.append('<option value="' + store.name + '" disabled>' + store.name + ' (Already selected)</option>');
                    } else {
                        // Add the option as selectable
                        $select.append('<option value="' + store.name + '">' + store.name + '</option>');
                    }
                });

                // Initialize or refresh Select2
                $select.select2({
                    placeholder: 'Search for a store name',
                    allowClear: true,
                    width: '100%' // Adjust the width to fit the container
                });
            } else {
                // If no stores are found, show a placeholder
                $select.append('<option value="">No stores available</option>');
            }


           var store = data.stores[0]; // Assume you want to check the first store in the array
            var licenseNo = store.state_license_number;

            if (licenseNo === undefined || licenseNo === '') {
                // If no license number, unmask and clear the field
                $('#store_license').unmask();
                $('#store_license').val('');
                $('#store_license').attr('placeholder', 'License Number');
                $('#store_license').removeAttr('readonly');
            } else {
                // If license number exists, apply the mask
                var maskFormat = licenseNo.replace(/[A-Za-z]/g, 'A').replace(/[0-9]/g, '0');
                applyMask(maskFormat);
                $('#store_license').removeAttr('readonly');
            }
            $('.preloader_lic_fetch_select').hide();
            $('.preloader_store_fetch_select').hide();
            $('#statefetch').prop('disabled', false);
            $('#loadingMessageState').hide();
        },
        error: function(err) {
            console.log(err)
            $('#statefetch').change()
            $('#store_license').removeAttr('readonly');
        }
    });
      }
        })

        function applyMask(format_type) {
            $('#store_license').mask(format_type, {
                'translation': {
                    A: { pattern: /[A-Za-z]/ }, // A for any letter
                    0: { pattern: /[0-9]/ }     // 0 for any digit
                }
            });

            var placeholder = format_type.replace(/A/g, 'X').replace(/0/g, '#');
            $('#store_license').attr('placeholder', placeholder);
        }

    	$('#checkstore_license').submit(function(e) {
        e.preventDefault();
        $('.ci_submit_btn').hide();
        $('.error_licenses').hide();
        $('.error_already').hide();
        $('.ci_submit_btn_loader').show();

        var storeName = $('#store_names').val();
        var licenseNumber = $('#store_license').val();
        var stateSelected = $('#statefetch').val();

        if (!storeName && !licenseNumber) {
        alert("Please select a store or enter a license number.");
        $('.ci_submit_btn_loader').hide();
        $('.ci_submit_btn').show();
        return false;
        }

        let formData = new FormData(this);
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
         $.ajax({
        // headers: {
        //     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        // },
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        processData: false,
    	contentType: false,
    	cache: false,
        dataType: "json",
         success: function(data) {
            console.log(data);
            if(data.message == 'already_exist'){
                $('.ci_submit_btn').show();
                $('.error_already').show();
                $('.ci_submit_btn_loader').hide();
            }
            else if(data.message == 'notmatch'){
         	$('.ci_submit_btn').show();
        	$('.error_licenses').show();
        	$('.ci_submit_btn_loader').hide();
            }
            else if(data.message == 'match'){
            	$('#checkstore_license').hide();
                $('#submit_store_info').show();
                $('.ci_submit_btn').show();
                $('.ci_submit_btn_loader').hide();
                $('#store_name').val(data.storeData.name);
                $('#entity_name').val(data.storeData.entity_name);
                $('#store_address').val(data.storeData.address);
                $('#store_city').val(data.storeData.city);
                $('#store_county').val(data.storeData.license_county);
                $('#store_state').val(data.storeData.state);
                $('#License_old').val(data.storeData.state_license_number);
                $('#free_trial').val(data.storeData.free_trial);
                $('#companyId').val(data.storeData.companyId);
                if(data.storeData.free_trial == '' || data.storeData.free_trial == 'No Free Trial'){
                    $('.stripe_card_mounted_row').show();
                    card_mounted();
                    $('.free_trial_info').hide();
                }
                else{
                    $('.stripe_card_mounted_row').hide();
                    $('.free_trial_info').show();
                    $('.free_trial_info').append('<p style="text-align: center;">Start '+data.storeData.free_trial+'</p>');
                }
            }
            else{
            $('.ci_submit_btn').show();
            $('.error_licenses').show();
            $('.ci_submit_btn_loader').hide();
            }

        },
        error: function(err) {
            console.log(err)
            $('#checkstore_license').submit();
        }
    });
    });

        $(document).on('change','#privacy_policy',function(){
        if($(this).is(':checked')){
            $('.btnsubmit').removeClass('btn-custom')
            $('.btnsubmit').removeAttr('disabled')
        }
        else{
            $('.btnsubmit').addClass('btn-custom')
            $('.btnsubmit').attr('disabled','disabled')
        }
    })
    </script>
@endpush


@endif