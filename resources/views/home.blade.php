@extends('layouts.app')
@section('title', 'Home - Smugglers')
@section('content')
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="bg-white">

                     <div class="projects-wrapper projectinfotechno-bg section-space--pt_60" style="background-position: left;">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center section-space--mb_60">
                              <h1 class="heading homeh1">{{ $textSettings->heading_one ?? '' }} <br> {{ $textSettings->heading_two ?? '' }}</h1>
                              <h5 class="mt-3 mb-3 homeh5">{!! $textSettings->text ?? '' !!}</h5>
                              <div class="btn-2inn">
                              <a href="{{ route('register') }}" class="ht-btn ht-btn-md btn-blue">Get Started </a>
                              <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                              </div>
                            </div>
                            <!-- section-title-wrap Start -->
                          </div>
                        </div>
                      </div>
                    </div>


                     <!--===========  feature-icon-wrapper  Start =============-->
                <div class="feature-icon-wrapper section-space--pb_0">
                    <div class="container-fluid p-0">

                        <div class="row g-0">
                            <div class="col-lg-12">
                                <video class="elementor-video" src="{{ asset($videoSettings->video_one) }}" autoplay="" loop="" muted="muted" controlslist="nodownload"></video>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===========  feature-icon-wrapper  End =============-->

                <!--===========  feature-icon-wrapper  Start =============-->
                <div class="feature-icon-wrapper section-space--ptb_60">
                    <div class="container-fluid p-0">

                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center section-space--mb_40">
                                    <h3 class="heading">Feature Demos</h3>
                                </div>
                            </div>
                        </div>

                          <div class="row g-0">
            <div class="col-lg-12 wow move-up">
                <div class="marquee">
                    <div class="marquee-content" id="marquee-content">
                        @if($images->count() > 0)
                            @php
                                $count = 0;
                            @endphp

                            @foreach($images as $index => $image)
                                @if ($count % 2 == 0)
                                    @if ($count > 0)
                                        </div>
                                    @endif
                                    <div class="marquee-item div-class-2">
                                @endif

                                <div class="marquee-box box-image-overlay-{{ $index + 1 }}">
                                    <img src="{{ url($image->image) }}" alt="">
                                    <div class="image-overlay">
                                        <p>{{ $image->text }}</p>
                                    </div>
                                </div>

                                @php
                                    $count++;
                                @endphp
                            @endforeach

                            @if ($count % 2 != 0)
                                </div>
                            @endif
                        @else
                            <p>No images found</p>
                        @endif
                        
                    </div>
                </div>
            </div>
            </div>
            </div>

                    <div class="popup">
        <span class="close">&times;</span>
      <div class="pop-box-css">
          <div class="pop-box-css-right">
              <img class="popup-content" src="">
          </div>
           <div class="pop-box-css-left">
      <p class="add-content"></p>
      <div class="section-title-wrap text-center section-space--mb_60">
        <div class="btn-2inn">
                              <a href="{{ route('register') }}" class="ht-btn ht-btn-md btn-blue">Get Started </a>
                              <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                            </div>
                            </div>
          </div>
      </div>
      
        
      </div>
                    </div>
                </div>
                <!--===========  feature-icon-wrapper  End =============-->

                



                <!--====================  Conact us Section Start ====================-->
            <div class="contact-us-section-wrappaer bg-black section-space--ptb_120" style="display:;">
                <div class="container" style="position:relative;">
                    <img class="d-none d-lg-block" src="{{ url('sunlight.webp') }}" style="position: absolute;
    bottom: 0;
    left: 17%;
    width: 300px;
    height: 300px;
    z-index: 0;">
                    <div class="row align-items-center">
                         <div class="col-lg-1 col-lg-1">
                         </div>
                         <div class="col-lg-4 col-lg-4 mb-20">
                            <div class="contact-info-one">
                                <h3 class="heading scroll_left_heading">{{ $graphic_text->heading }}</h3>
                                <p class="scroll_left_p">{{ $graphic_text->text }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="conact-us-wrap-one scroll_right_side">
                                {!! $graphic_text->text2 !!}

                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
            <!--====================  Conact us Section End  ====================-->

                @include('plans')

                 

                <div id="afterpenel" class="feature-icon-wrappe section-space--ptb_60 infotechno-section-bg-01" style="background-color:#EBEBEB;">
    <div class="container">
        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center section-space--mb_40">
                                    <h3 class="heading">How easy it is to setup?</h3>
                                </div>
                            </div>
                        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-tabs">
                    <div class="steps">
                        @foreach($steps as $index => $step)
                            <div class="step @if($index == 0) active @endif" data-step="{{ $index + 1 }}">Step {{ $index + 1 }}</div>
                        @endforeach
                    </div>
                    <div class="content sh-contents">
                        @foreach($steps as $index => $step)
                            <div class="step-content @if($index == 0) active @endif" data-content="{{ $index + 1 }}">
                                <div class="stp-content">
                                    @if ($index % 2 == 0)
                                        <div class="stp-con-inn">
                                            @if (in_array(pathinfo($step->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                <img src="{{ url($step->file) }}" alt="">
                                            @elseif (in_array(pathinfo($step->file, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov','webm']))
                                            <video class="elementor-video" src="{{ url($step->file) }}" autoplay="" loop="" muted="muted" controlslist="nodownload"></video>
                                            @endif
                                        </div>
                                        <div class="stp-con-inn">
                                            <div class="stp-con-inn-sm">
                                                <h3>{{ $step->heading }}</h3>
                                                <p>{!! $step->text !!}</p>
                                                @if ($step->buttons)
                                                    <div class="btn-2inn">
                                                        @foreach($step->buttons as $button)
                                                            <a href="{{ $button['link'] }}" class="btn" style="background-color: {{ $button['color'] }};">{{ $button['text'] }}</a>
                                                        @endforeach
                                                         @if(count($step->buttons) == 1)
                                                        <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more  <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="stp-con-inn">
                                            <div class="stp-con-inn-sm">
                                                <h3>{{ $step->heading }}</h3>
                                                <p>{!! $step->text !!}</p>
                                                @if ($step->buttons)
                                                    <div class="btn-2inn">
                                                        @foreach($step->buttons as $button)
                                                            <a href="{{ $button['link'] }}" class="btn" style="background-color: {{ $button['color'] }};">{{ $button['text'] }}</a>
                                                        @endforeach
                                                        @if(count($step->buttons) == 1)
                                                        <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more  <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="stp-con-inn">
                                            @if (in_array(pathinfo($step->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                <img src="{{ url($step->file) }}" alt="">
                                            @elseif (in_array(pathinfo($step->file, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov','webm']))
                                               <video class="elementor-video" src="{{ url($step->file) }}" autoplay="" loop="" muted="muted" controlslist="nodownload"></video>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>                            
            </div>
        </div>
    </div>
</div>

                <!--===========  feature-icon-wrapper  End =============-->

                
            </div>
        </div>




        <!--====================  footer area ====================-->
        <div class="footer-area-wrapper" style="background-color:#df9242;">
            <div class="footer-copyright-area" style="padding:10px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center text-md-start">
                            <p class="copyright-ptext" style="text-align: center;
    color: white;
    font-size: 20px;">Copyright © 2024 Smugglers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of footer area  ====================-->









<!-- Modal structure -->
<div class="modal fade" id="integrationsModal" tabindex="-1" aria-labelledby="integrationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="integrationsModalLabel">Supported POS Systems</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Loop through integration logos here -->
                    @foreach($integrations as $integration)
                        <div class="col-md-3 text-center mb-4 int_img">
                            <img src="{{ url($integration->image) }}" class="img-fluid">
                        </div>
                    @endforeach

                    <div class="col-md-12 text-center">
                        <a href="{{ url('all_integration') }}" style="text-decoration: underline;
    font-size: 17px;
    color: #df9242;">see more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.lead_form')
@include('layouts.footer_home')

    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollToPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



<script>
    // Wait for the document to load
    window.onload = function() {
        const paragraphs = document.querySelectorAll(".scroll_right_side p");
         paragraphs.forEach(function(paragraph) {
        paragraph.style.cursor = "pointer";  // Optional: Change cursor to pointer to indicate it's clickable

        // Add click event to each paragraph
        paragraph.addEventListener("click", function() {
            window.location.href = "register";  // Redirect to the register page
        });
        });

        paragraphs.forEach((p, index) => {
            // Use ScrollTrigger to control the animation based on scroll position
            gsap.to(p, {
                scrollTrigger: {
                    trigger: p,
                    start: "top 20%",  // When the top of the p element reaches 80% of the viewport
                    end: "bottom 40%", // When the bottom of the p element reaches 20% of the viewport
                    toggleActions: "play reverse play reverse",
                    onEnter: () => {
                        // Change color of current paragraph to red
                        gsap.to(p, { color: "#df9242", duration: 0.1 });

                        // Reset the color of all other paragraphs to black
                        paragraphs.forEach((otherP) => {
                            if (otherP !== p) {
                                gsap.to(otherP, { color: "grey", duration: 0.1 });
                            }
                        });
                    },
                    onLeaveBack: () => {
                        // Change color of current paragraph to red
                        gsap.to(p, { color: "#df9242", duration: 0.1 });

                        // Reset the color of all other paragraphs to black
                        paragraphs.forEach((otherP) => {
                            if (otherP !== p) {
                                gsap.to(otherP, { color: "grey", duration: 0.1 });
                            }
                        });
                    }
                }
            });
        });
    }
</script>

<script type="text/javascript">
$(document).on('click','#lead_form_next',function(){
    const firstName = document.getElementById("first_name");
    const lastName = document.getElementById("last_name");
    const phoneNumber = document.getElementById("phone_number");
    const email = document.getElementById("email");
     function validateEmail(email) {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailPattern.test(email);
    }
    if (firstName.value.trim() === "" || 
            lastName.value.trim() === "" || 
            phoneNumber.value.trim() === "" || 
            email.value.trim() === "") {

            alert("Please fill in all required fields.");
        }
         else if (!validateEmail(email.value.trim())) {
            alert("Please enter a valid email address.");
        } 
         else {
        $('#lead_form_one').hide();
        $('#lead_form_two').show();
        }
})
$('#multi-step-form').submit(function(e) {
        e.preventDefault();
        $('.error_invalid_lead_lic').hide();
        $('.error_invalid_lead').hide();
        $('.success_lead').hide();
        var storeName = $('#store_names').val();
        var licenseNumber = $('#store_license').val();
        var stateSelected = $('#statefetch').val();

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
            if(data.message == 'notmatch'){
            $('.error_invalid_lead_lic').show();
            }
            else{
                $('.success_lead').show();
                setTimeout(function(){
                location.href="https://calendly.com/awilliams-mdq/smugglers-product-demo-q-a";
                },2000)
            }
        },
        error: function(err) {
            if (err.responseJSON && err.responseJSON.message) {
                console.log('Error message:', err.responseJSON.message);
                $('.error_invalid_lead p').text(err.responseJSON.message);
            } else if (err.responseText) {
                // Fallback in case responseJSON is not available
                console.log('Raw error response:', err.responseText);
                $('.error_invalid_lead p').text('An unexpected error occurred. Please try again.');
            } else {
                console.log('Unknown error:', err);
                $('.error_invalid_lead p').text('Something went wrong. Please contact support.');
            }
            $('.error_invalid_lead').show();
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
            $('.store_license_div').hide();
            $('.spinner_license_text').show();
            if (stateget_val == 'Select State') {
                 $('#store_license').unmask();
                 $('#store_license').val('')
                 $('#store_license').attr('placeholder', 'License Number');
                 $('#state_old').val('');
                 $('.spinner_license_text').hide();
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
        var url_statefetch = "{{ url('stateget_change_home') }}";
          $.ajax({
        url: url_statefetch,
        type: 'POST',
        data: {stateget_val : stateget_val},
        // processData: false,
        // contentType: false,
        // cache: false,
        // dataType: "json",
         success: function(data) {
            console.log(data);
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
            $('.spinner_license_text').hide();
            $('#store_license').removeAttr('readonly')
            }
            else{
            var maskFormat = data.message.license_no.replace(/[A-Za-z]/g, 'A').replace(/[0-9]/g, '0');
            applyMask(maskFormat);
            $('.store_license_div').show();
            $('.spinner_license').hide();
            $('.spinner_license_text').hide();
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
        $('#multi-step-form').submit(); 
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

        

      $(document).on('click','.click_reg_a',function(){
        var id = $(this).data('id');
        var url_reg = "{{ url('register') }}/" + id;
        location.href = url_reg;
      })
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
  // Stop carousel on hover
  $(".marquee").hover(
    function() {
      $(".marquee-content").css("animation-play-state", "paused");
    },
    function() {
      $(".marquee-content").css("animation-play-state", "running");
    }
  );

  // Open image in lightbox on click
  $(".marquee-item img").click(function() {
    var imageUrl = $(this).attr("src");
    $(".popup-content").attr("src", imageUrl);
    $(".popup").css("display", "flex");
    var textimg = $(this).parents('.marquee-box').find('p').text();
    $(".add-content").text(textimg);
    $(".add-content").css("display", "block");
  });

  // Close popup
  $(".close").click(function() {
    $(".popup").css("display", "none");
  });


    $('.click_change_plan_upd').on('click', function() {
    var planId = $(this).data('id');
    var planName = $(this).closest('.price_main_column').find('h5').text().trim(); // Get and trim the plan name

    // Show a confirmation dialog
    var confirmMessage = `Are you sure you want to change your plan to ${planName}? This action will ${planId ? 'upgrade' : 'downgrade'} your current plan.`;
    var confirmed = confirm(confirmMessage);

    if (confirmed) {
        // Proceed with the AJAX request if confirmed
        $.ajax({
            url: '{{ route("change_plan") }}',
            type: 'POST',
            data: {
                plan_id: planId,
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                // Optionally, you can reload the page or update the UI
                location.reload();
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseJSON.error);
            }
        });
    } else {
        // User canceled the action
        console.log('Plan change canceled.');
    }

});
  
    $('.click_change_plan').on('click', function() {
    var planId = $(this).data('id');
    var planName = $(this).closest('.price_main_column').find('h5').text().trim(); // Get and trim the plan name

    
        // Proceed with the AJAX request if confirmed
        $.ajax({
            url: '{{ route("starting_plan_set") }}',
            type: 'POST',
            data: {
                plan_id: planId,
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                // Optionally, you can reload the page or update the UI
                location.href = 'add_a_card';
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseJSON.error);
            }
        });
});

});


    $(document).ready(function() {
    $('.step').on('click', function() {
        var step = $(this).data('step');
        
        $('.step').removeClass('active');
        $(this).addClass('active');
        
        $('.step-content').removeClass('active');
        $('.step-content[data-content="' + step + '"]').addClass('active');
    });
 
    $('.next-btn').on('click', function() {
        var activeStep = $('.step.active').data('step');
        var nextStep = activeStep + 1;

        if (nextStep <= 5) {
            $('.step').removeClass('active');
            $('.step[data-step="' + nextStep + '"]').addClass('active');

            $('.step-content').removeClass('active');
            $('.step-content[data-content="' + nextStep + '"]').addClass('active');
        }
    });

    // Initialize first step as active
    $('.step[data-step="1"]').addClass('active');
    $('.step-content[data-content="1"]').addClass('active');
});

    $(document).ready(function(){
  $(".learn-more").click(function(){
    $(".contentp").slideToggle();
    $(".learn-more").text(function(i, text){
      return text === "Learn More" ? "Show Less" : "Learn More";
    });
  });
});

    $(document).ready(function(){
  $(".learn-more2").click(function(){
    $(".contentp2").slideToggle();
    $(this).text(function(i, text){
      return text === "Learn More" ? "Show Less" : "Learn More";
    });
  });
});

    $(document).ready(function(){
  $(".learn-more2").click(function(){
    $(".contentp3").slideToggle();
    $(this).text(function(i, text){
      return text === "Learn More" ? "Show Less" : "Learn More";
    });
  });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const marqueeContent = document.getElementById("marquee-content");
    
    // Duplicate the content after the page loads
    const duplicateContent = marqueeContent.innerHTML;
    marqueeContent.innerHTML += duplicateContent;

});
</script>

</html>
@endsection

