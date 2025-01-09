@php
    $layout = isset($layout) ? $layout : 'layouts.default'; // Provide a default layout if needed
@endphp
@if(Auth::user()->status == 1)
@section('title', 'Dashboard - Smugglers')
@section('content')
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
@section('title', 'Dashboard - Smuggler')

@section('content')
<style type="text/css">
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
.spinner_btn {
    border: 4px solid rgba(0, 0, 0, 0.1);
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border-left-color: #09f;
    animation: spin 1s linear infinite;
}

.spinner_license{
    border: 4px solid rgba(0, 0, 0, 0.1);
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border-left-color: #09f;
    animation: spin 1s linear infinite;
    position: absolute;
    top: 7px;
    left: 50%;
}
@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
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
    <form method="POST" action="{{ url('submit_checkstore_license') }}" id="checkstore_license">
    @csrf
    <div class="row mb-3">
    <div class="col-md-4">
    <label for="state" class="col-md-12 col-form-label">State</label>
    <div class="col-md-12">
        <select id="statefetch" name="statefetch" class="form-control @error('statefecth') is-invalid @enderror" required>
        </select>
        @error('statefetch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-4">
     <label for="store-license" class="col-md-12 col-form-label">Store Name</label>
    <div class="col-md-12" style="position: relative;">
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

    <div class="col-md-4">
     <label for="store-license" class="col-md-12 col-form-label">Store License Number</label>
    <div class="col-md-12" style="position: relative;">
        <input name="store_license" type="text"  class="form-control @error('store_license') is-invalid @enderror" id="store_license">
        <span class="invalid-feedback error_already" role="alert" style="display:none;">
            <strong>License already exists</strong>
        </span>
        @error('store_license')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="spinner_license" style="display:none;"></div>
    </div>
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

    @if($plan->name == 'Startaa')
    <div class="alert alert-info" style="padding: 5px;">
        <p style="text-align: center;"><span style="font-size: 13px;
    font-weight: bold;">${{ $plan->price }} / {{ $plan->duration }}</span> start 1 month free</p>
    </div>
    @elseif($plan->name == 'Starta')
    <div class="row mb-1">

                            <div class="col-md-12">
                                <p class="headingcard">Enter Credit or Debit card details.</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p style="margin: 0;
    text-align: right;
    font-weight: 700;">${{ $plan->price }} / {{ $plan->duration }}</p>
                                <div id="card-element"></div>
                                 <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                       
                        <div class="row mb-1">

                            <div class="col-md-12">
                                <p class="cardwarning">A valid Credit or Debit card is required when establishing a new account.</p>
                            </div>
                        </div>
    @else
    @endif
                <div class="row">
                            <div class="col-md-10">
                                <input id="state_old" type="hidden" class="form-control" name="state_old">
                                <input id="License_old" type="hidden" class="form-control" name="License_old">
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








    @include('layouts.footer_home')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

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
            fetch_state_func();
        })

        function fetch_state_func(){
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
            });
        var url_statefetch_func = "{{ url('statefetch_func') }}";
          $.ajax({
        url: url_statefetch_func,
        type: 'POST',
         success: function(data) {
            console.log(data);
            if (data.response && data.response.results && data.response.results.data) {
                var states = data.response.results.data;
                var $select = $('#statefetch');
                
                // Clear existing options
                $select.empty();
                
                // Add default option
                $select.append('<option value="">Select State</option>');
                
                // Loop through the states array and append options
                $.each(states, function(index, state) {
                    $select.append('<option value="' + state.display_name + '" data-id="' + state.name + '">' + state.display_name + '</option>');
                });
            } else {
                console.error('Invalid data format', data);
            }
        },
        error: function(err) {
            console.log(err)
        }
    });
        }
        $(document).on('change','#statefetch',function() {
            var stateget_val = $(this).find('option:selected').text();
            var stateget_id = $(this).find('option:selected').attr('data-id');
            var stateget_val1 = $(this).val();
            if (stateget_val == 'Select State') {
                 $('#store_license').unmask();
                 $('#store_license').val('')
                 $('#store_license').attr('placeholder', 'License Number');
                 $('#state_old').val('');
                 $('#store_names').empty();
            }
            else{
            $('#state_old').val(stateget_id);
            $('.spinner_license').show();
            $('#store_license').attr('readonly','readonly')
            $('#store_license').val('')
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
            });
        var url_statefetch = "{{ url('stateget_change') }}";
          $.ajax({
        url: url_statefetch,
        type: 'POST',
        data: {stateget_val : stateget_val},
        // processData: false,
        // contentType: false,
        // cache: false,
        // dataType: "json",
         success: function(data) {
            console.log(data.message.license_no);
            $('#store_names').empty();

             // Check if store names are available
            if (data.storename && data.storename.length > 0) {
                // Append a default "Select a Store" option
                $('#store_names').append('<option value="">Select a Store</option>');
                
                // Loop through the store names and append them to the select dropdown
                $.each(data.storename, function(index, storeName) {
                    $('#store_names').append('<option value="' + storeName + '">' + storeName + '</option>');
                });
            } else {
                // If no stores are found, show a placeholder
                $('#store_names').append('<option value="">No stores available</option>');
            }

            if(data.message.license_no === undefined){
                $('#store_license').unmask();
                 $('#store_license').val('')
                 $('#store_license').attr('placeholder', 'License Number');
            $('.spinner_license').hide();
            $('#store_license').removeAttr('readonly')
            }
            else{
            var maskFormat = data.message.license_no.replace(/[A-Za-z]/g, 'A').replace(/[0-9]/g, '0');
            applyMask(maskFormat);
            $('.spinner_license').hide();
            $('#store_license').removeAttr('readonly')
            }
        },
        error: function(err) {
            console.log(err)
            $('.spinner_license').hide();
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

            var placeholder = format_type.replace(/A/g, 'X').replace(/0/g, '1');
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
            if(data.message == 'notmatch'){
         	$('.ci_submit_btn').show();
        	$('.error_licenses').show();
        	$('.ci_submit_btn_loader').hide();
            }
            if(data.message == 'match'){
            	$('#checkstore_license').hide();
                $('#submit_store_info').show();
                $('.ci_submit_btn').show();
                $('.ci_submit_btn_loader').hide();
                $('#store_name').val(data.storeData.store_name);
                $('#entity_name').val(data.storeData.entity_name);
                $('#store_address').val(data.storeData.store_address);
                $('#store_city').val(data.storeData.city);
                $('#store_county').val(data.storeData.country);
                $('#store_state').val(data.storeData.state);
                $('#License_old').val(data.licenseNumber);
            }
        },
        error: function(err) {
            console.log(err)
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
@endsection

@endif