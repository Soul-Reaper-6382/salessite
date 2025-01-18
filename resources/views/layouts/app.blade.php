<html data-wf-page="663e8406a99364ab1b17371a" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Smugglers')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Smugglers">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- CSS
        ============================================ -->

    <!-- Font Family CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->

    <link rel="stylesheet" href="{{ asset('assets/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.min.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/codepen_bg_panel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
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
    border: 6px solid #ccc;
    border-top-color: #3498db;
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
</style>
    @stack('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <img src="{{ url('logo.png') }}" aria-label="Smuggler" width="90px" height="48" class="img-fluid" alt="Smuggler">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>




     <!--====================  header area ====================-->
    <div class="header-area header-area--default">

        <!-- Header Bottom Wrap Start -->
        <div class="header-bottom-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header default-menu-style position-relative">

                            <!-- brand logo -->
                            <div class="header__logo">
                                <a href="{{ url('home') }}">
                                    <img src="{{ url('logo.png') }}" aria-label="Smuggler" width="90px" height="48" class="img-fluid" alt="Smuggler">
                                </a>
                            </div>

                            <!-- header midle box  -->
                            <div class="header-right-box">
                                <div class="header-bottom-wrap d-md-block d-none">
                                    <div class="header-bottom-inner">
                                        <div class="header-bottom-left-wrap">
                                            <!-- navigation menu -->
                                            <div class="header__navigation d-none d-xl-block">
                                                <nav class="navigation-menu">
                                                    @guest
                                                    <ul>
                                                        <li class="">
                                                            <a href="{{ url('home') }}"><span>Home</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('pricing') }}"><span>Pricing</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('about-us') }}"><span>About Us</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('login') }}"><span>Log in</span></a>
                                                        </li>
                                                        <li class="">
                                                         <a href="{{ route('register') }}" class="ht-btn ht-btn-md btn-blue custom_header_btn">Try smugglers for free</a>
                                                        </li>
                                                    </ul>
                                                    @else
                                                    <ul>
                                                        <li class="">
                                                            <a href="{{ url('home') }}"><span>Home</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('pricing') }}"><span>Pricing</span></a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ url('about-us') }}"><span>About Us</span></a>
                                                        </li>
                                                        <li class="">
                                                            @if(Auth::user()->roles->first()->name == 'admin')
                                                            <a href="{{ url('admin') }}"><span>Goto Adminpanel</span></a>
                                                            @elseif(Auth::user()->roles->first()->name == 'csr')
                                                            <a href="{{ url('csr_panel') }}"><span>Goto CSR Panel</span></a>
                                                            @else
                                                            <a href="{{ url('dashboard') }}"><span>Account</span></a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                    @endguest
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                                <!-- hidden icons menu -->
                                <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                                    <a href="javascript:void(0)">
                                        <i class="far fa-ellipsis-h-alt"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom Wrap End -->

    </div>
    <!--====================  End of header area  ====================-->

        
            @yield('content')
            @include('layouts.lead_form')
            @include('layouts.footer_home')

            <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0N5EYJ2644"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-0N5EYJ2644');
</script>
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/46911547.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function showVideoModal(element) {
    var videoUrl = element.getAttribute('data-url');
        if (videoUrl) {

    // Set the video source in the modal
    var videoElement = document.getElementById('modalVideo');
    videoElement.src = videoUrl;
    videoElement.autoplay = true;
    videoElement.loop = true;
    videoElement.controls = false;


    // Show the modal
    var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
    videoModal.show();

    
    // When modal is hidden, stop the video
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        videoElement.pause();
        videoElement.currentTime = 0;
    }, { once: true });
    }
    }
</script>


<script type="text/javascript">
$('#submit_home_lead').submit(function(e) {
    e.preventDefault();
            let formData = new FormData(this);

           $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
         success: function(data) {
            console.log(data)
            if(data.status == 'success'){
                $('.success_lead').show();
                setTimeout(function(){
                $('.success_lead').hide();
                $('#lead_form_one').hide();
                $('#lead_form_two').show();
                },2000)
                window.lastHUBId = data.id;
                $('#lastHUBId').val(window.lastHUBId)
            }
            else{
                $('.error_invalid_lead').show();
                $('.error_invalid_lead p').text(data.message);
                setTimeout(function(){
                $('.error_invalid_lead').hide();
                },3000)
            }
        }
        })
})
$('#multi-step-form').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
         $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
         success: function(data) {
            console.log(data);
            if(data.status == 'success'){
                    $('.success_lead').show();
                    setTimeout(function(){
                    $('.success_lead').hide();
                    location.reload(true);
                    },2000)
                }
            else{
                $('.error_invalid_lead').show();
                $('.error_invalid_lead p').text(data.message);
                setTimeout(function(){
                $('.error_invalid_lead').hide();
                },3000)
            }
        }

    });
    });

        function fetch_state_func(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    
                    var url_statefetch_func = "{{ url('statefetch_func_home') }}";
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
        var url_statefetch = "{{ url('stateget_change_home') }}";
          $.ajax({
        url: url_statefetch,
        type: 'POST',
        data: {stateget_val : stateget_val},
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
                        $select.append('<option value="' + store.name + '" disabled>' + store.name + ' (Already selected)</option>');
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
        },
        error: function(err) {
            console.log(err)
            $('.preloader_lic_fetch_select').hide();
            $('.preloader_store_fetch_select').hide();
            $('#store_license').removeAttr('readonly');
        },
        complete: function() {
                $('.preloader_lic_fetch_select').hide();
                $('.preloader_store_fetch_select').hide();
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

    $(document).ready(function() {
        fetch_state_func()
        var modal = document.querySelector(".modal_form");
        var triggers = document.querySelectorAll(".click_all_learnmore");
        var closeButton = document.querySelector(".close-button_form");

        function toggleModal() {
            const firstName = document.getElementById("first_name").value.trim();
            const lastName = document.getElementById("last_name").value.trim();
            const phoneNumber = document.getElementById("phone_number").value.trim();
            const email = document.getElementById("email").value.trim();

        if (firstName && lastName && phoneNumber && email) {
        // If all fields are filled, submit the form
        $('#submit_home_lead').submit(); 
        }

        modal.classList.toggle("show-modal_form");
    
        }

        function windowOnClick(event) {
          if (event.target === modal) {
            toggleModal();
          }
        }

        for (var i = 0, len = triggers.length; i < len; i++) {
          triggers[i].addEventListener("click", toggleModal);
        }
        closeButton.addEventListener("click", toggleModal);
        window.addEventListener("click", windowOnClick);

        

        $(document).on('click', '.click_reg_a', function () {
            var id = $(this).data('id');
            var isGuest = "{{ Auth::guest() }}"; // Check if the user is a guest
            var url;

            if (isGuest) {
                url = "{{ url('register') }}/" + id;
            } else {
                var role = "{{ Auth::check() ? Auth::user()->roles->first()->name : '' }}";

                if (role === 'admin') {
                    url = "{{ url('admin') }}";
                } else if (role === 'csr') {
                    url = "{{ url('csr_panel') }}";
                } else {
                    url = "{{ url('dashboard') }}";
                }
            }

            location.href = url;
        });

            $('.tab_price').on('click', function() {
                var name = $(this).data('name').toLowerCase(); // Get the data-name value and convert to lowercase

                // Remove active class from all labels and add to the clicked one
                $('.tab_price label').removeClass('active');
                $(this).find('label').addClass('active');

                // Show elements matching the data-name and hide others
                $('.price_main_column').each(function() {
                    if ($(this).data('dur') === name) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });


});
</script>

@stack('scripts')
   
</body>
</html>



