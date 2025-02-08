<div class="modal_form">
  <div class="modal-content_form">
    <span class="close-button_form">&times;</span>
    
     <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h5 class="heading" style="font-size: 20px;">We're excited that you're interested in Smugglers!</h5>
            <p>Get early access to exciting updates, exclusive offers, and a sneak peek at what’s coming next! Join us on our journey to make life simpler and more fulfilling for our Partners - just like you!</p>
        </div>
     </div>
     <div id="lead_form_one">
    <form id="submit_home_lead" method="POST" action="{{ url('submit_home_lead') }}">
    @csrf
     <div class="row mb-3">
    <div class="col-md-6">
    <label for="first-name" class="col-md-12 col-form-label">First Name</label>
    <div class="col-md-12">
        <input name="first_name" type="text"  class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="First Name" required>
        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    
    <div class="col-md-6">
    <label for="last-name" class="col-md-12 col-form-label">Last Name</label>
    <div class="col-md-12">
        <input name="last_name" type="text"  class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" required>
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
    <label for="first-name" class="col-md-12 col-form-label">Phone Number</label>
    <div class="col-md-12">
        <input name="phone_number" type="text"  class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Phone Number" required>
        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
   </div>
    </div>


    <div class="col-md-6">
    <label for="email" class="col-md-12 col-form-label">Email Address</label>
    <div class="col-md-12">
        <input name="email" type="email"  class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" value="{{ old('email') }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>

<div class="col-md-12 success_message" style="display:none;">
    <p class="" style="text-align: center; color: green;">Thank you! Your request has been received successfully.</p>
</div>


<div class="col-md-12 error_invalid_lead" style="display:none;">
        <p class="" style="    text-align: center;
    color: red;;"></p>
    </div>

    <div class="row mb-0 ">
                            <div class="col-md-12" style="justify-content:center;display: flex;">
                                <button type="submit" id="lead_form_next" class="btn loginbtn ci_submit_btn_next">
                                    {{ __('Next') }}
                                </button>
                                 <button type="button" class="btn loginbtn ci_submit_btn_loader_next" style="display:none;">    <div class="spinner_btn"></div></button>
                            </div>
                        </div>
        </form>
</div>


<div id="lead_form_two" style="display:none;">
    <form id="multi-step-form" method="POST" action="{{ url('lead_storehubspot') }}">
<div class="row mb-3">
    <div class="col-md-12">
    <label for="state" class="col-md-12 col-form-label">State</label>
    <div class="col-md-12" style="position:relative;">
         <div id="preloader_state_fetch" class="preloader_state_fetch_select" style="display: none;">
        <div class="spinner_state_fetch"></div>
        </div>
        <span id="loadingMessageState">Please wait...</span>
        <select id="statefetch" name="statefetch" class="form-control @error('statefecth') is-invalid @enderror">
        </select>
        @error('statefetch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    </div>

<div class="row mb-3">
    
    <div class="col-md-12 spinner_license_text" style="display:none;">
    <div class="col-md-12" style="position: relative;">
        <div class="" style="    text-align: center;
    color: red;
    position: absolute;
    left: 0;
    right: 0;
    top: -15px;">Please Wait...</div>
    </div>
    </div>

     <div class="col-md-7 store_license_div" style="display:;">
     <label for="store-name" class="col-md-12 col-form-label">Store Name</label>
    <div class="col-md-12" style="position: relative;">
        <div id="preloader_state_fetch" class="preloader_store_fetch_select" style="display: none;">
        <div class="spinner_state_fetch"></div>
        </div>
        <select id="store_names" name="store_name" class="form-control @error('store_name') is-invalid @enderror">
        </select>
        <span class="invalid-feedback error_already_store_name" role="alert" style="display:none;">
            <strong>Store name already exists</strong>
        </span>
        @error('store_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-5 store_license_div" style="display:;">
     <label for="store-license" class="col-md-12 col-form-label">Store License Number</label>
    <div class="col-md-12" style="position: relative;">
        <div id="preloader_state_fetch" class="preloader_lic_fetch_select" style="display: none;">
        <div class="spinner_state_fetch"></div>
        </div>
        <input name="store_license" type="text"  class="form-control @error('store_license') is-invalid @enderror" id="store_license" >
        <input name="lastHUBId" type="hidden"  class="lastHUBId" id="lastHUBId" >
        <span class="invalid-feedback error_already" role="alert" style="display:none;">
            <strong>License already exists</strong>
        </span>
        @error('store_license')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>



    <div class="col-md-12 error_invalid_lead_lic" style="display:none;">
        <p class="" style="    text-align: center;
    color: red;;">Invalid Store name and License Number</p>
    </div>

    <div class="col-md-12 error_invalid_lead" style="display:none;">
        <p class="" style="    text-align: center;
    color: red;;"></p>
    </div>

    <div class="col-md-12 success_lead" style="display:none;">
        <p class="" style="    text-align: center;
    color: green;;">Thank you! Your request has been received successfully.</p>
    </div>

    </div>
                        <div class="row mb-0 ">
                            <div class="col-md-12" style="justify-content:center;display: flex;">
                                <button type="submit" class="btn loginbtn ci_submit_btn_submit">
                                    {{ __('Submit') }}
                                </button>
                                 <button type="button" class="btn loginbtn ci_submit_btn_loader_submit" style="display:none;">    <div class="spinner_btn"></div></button>
                            </div>
                        </div>

                    </form>
    </div>


  </div>
</div>