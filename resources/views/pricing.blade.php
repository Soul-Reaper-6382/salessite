@extends('layouts.app')
@section('title', 'Pricing - Smugglers')
@section('content')
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="bg-white">

                                     @include('plans')


                <div class="feature-icon-wrapper section-space--pt_60 section_pricing-calculator" style="display:">
                    <div class="container" style="border-radius: 10px;
    border: 1px solid #ccc;
    padding: 20px 20px 50px 20px;">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center section-space--mb_40">
                                    <h5 class="heading">How much can Smugglers save you?</h5>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <p>How many hours do you waste each week on manual prospecting, researching clients and manual copy-pasting?</p> 

                            <h5 class="hour_h5"><span class="hour_span">1</span> hours</h5>
                            <div class="range-item">
                            <div class="range-input d-flex position-relative">
                              <input type="range" min="0" max="19" class="form-range" name="dataShared" id="hoursSaved" value="0" />
                              <div class="range-line">
                                <span class="active-line"></span>
                              </div>
                              <div class="dot-line">
                                <span class="active-dot"></span>
                              </div>
                            </div>
                            <ul class="list-inline list-unstyled">
                              <li class="list-inline-item">
                                <span>1h</span>
                              </li>
                               <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="large"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="large"></p>
                              </li>
                              <li class="list-inline-item">
                                <span>10h</span>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="large"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="large"></p>
                              </li>
                              <li class="list-inline-item">
                                <span>20h</span>
                              </li>
                            </ul>
                          </div>

                            <p>How much is one hour of your time worth to you? 
                                    <input type="number" value="50" min="3" max="10000" name="hourly_rate" id="hourlyRate"> / hr
                                </p>   
                            </div>
                            <div class="col-md-6 col-md-6-roi">
                                <p>ROI Calculator</p>

                                  <h5 class="hour_h5"><span>$</span><span id="roiAmount">0</span></h5>

                                <p>is your Monthly ROI with Smugglers</p>
                                
                                 <p style="margin:0">
                                    <span>The calculation:</span><br>
                                    <span>Hours saved monthly</span><span style="float: right;" id="calcHours">0</span><br>
                                    <span>Time value saved by Smugglers</span><span style="float: right;" id="timeValueSaved">$0</span><br>
                                    <span>Smugglers monthly cost (yearly plan)</span><span style="float: right;">$10</span><br>
                                  </p>

                                <hr style="margin: 0;">

                                  <p><span>Total monthly ROI</span> <span style="float: right;" id="totalRoi">$0</span></p>
                            </div>
                        </div>

                </div>
            </div>

            <!--===========  rev_redraw-wrapper  Start =============-->
                <div class="rev_redraw-wrapper">
                        <div class="rev_redraw-inner-box bg-gray-2 rev_redraw-space">
                            <!-- start Circle Menu -->
                            <div id="uc_ue_circle_menu_elementor_b433c4f" class="element_circle_main_window d-none d-md-block" data-show-tip="false">
                                <div class="ue-ciclegraph">
                                    <h5 class="heading gethead">{{ $circleTextSettings->heading_one }}</h5>
                                    <p class="gettext">{{ $circleTextSettings->text }}</p>
                                    <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                                    <div class="uc-items-wrapper">
                                        @for ($i = 1; $i <= 10; $i++)
                                            @php
                                                $circleField = 'cir' . $i;
                                                $circleField2 = 'text' . $i;
                                                $circleText = $circleTextSettings->$circleField;
                                                $circleText2 = $circleTextSettings->$circleField2;
                                            @endphp
                                            <a class="element_circle ue-circle elementor-repeater-item-{{ $i }} sl-{{ $i }}" title="{{ $circleText }}" href="javascript:void(0);" id="uc_ue_circle_menu_elementor_b433c4f_item{{ $i }}" data-head="{{ $circleText }}" data-text="{{ $circleText2 }}"
                                             style="transform: rotate({{ 306 + ($i - 1) * 36 }}deg) translate(271px) rotate(-{{ 306 + ($i - 1) * 36 }}deg);">
                                                <div class="ue-circle-content">
                                                    <div class="ue-circle-title">{{ $circleText }}</div>
                                                </div>
                                            </a>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <div class="container element_circle_main_mobile d-block d-md-none">
                            <div class="row">
                                 @for ($i = 1; $i <= 10; $i++)
                                            @php
                                                $circleField = 'cir' . $i;
                                                $circleField2 = 'text' . $i;
                                                $circleText = $circleTextSettings->$circleField;
                                                $circleText2 = $circleTextSettings->$circleField2;
                                            @endphp
                            <div class="col-md-6 main-circle-content">
                                  <h5>{{ $circleText }}</h5>
                                  <p>{{ $circleText2 }}</p>
                            </div>
                            @endfor
                            </div>
                            </div>
                            <!-- end Circle Menu -->
                        </div>
                    </div>
                <!--===========  rev_redraw-wrapper  End =============-->

                <!--===========  feature-icon-wrapper  Start =============-->
                <div class="feature-icon-wrapper bg- section-space--pb_0">
                    <div class="container-fluid" style="padding-left: 0px;">

                        <div class="row">
                            <div class="col-lg-8 section-space--pt_0">
                                <video class="elementor-video" src="{{ asset($videoSettings->video_two) }}" autoplay="" loop="" muted="muted" controlslist="nodownload"></video>
                            </div>
                            <div class="col-lg-4 section-space--pt_100 secondvid_text" style="padding: 25px 25px;  display: flex; flex-direction: column;">
                                <h5 class="heading">{{ $home_text2->heading_one ?? '' }}</h5>
                                    <p class="mt-3 mb-3">{!! $home_text2->text ?? '' !!}</p>
                                    <div class="btn-2inn">
                                     <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue" data-bs-toggle="modal" data-bs-target="#integrationsModal">See all integrations</a>
                                     <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
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
                location.href="https://calendly.com/awilliams-mdq/smugglers-product-demo-q-a";
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


    

function updateROI() {
  const hoursSaved = parseInt(parseInt(document.getElementById("hoursSaved").value) + parseInt(1)) * 4;
  const hourlyRate = parseFloat(document.getElementById("hourlyRate").value);
  const bardeenCost = 10;

  // Calculate time value saved
  const timeValueSaved = hoursSaved * hourlyRate;

  // Calculate total ROI
  const totalRoi = timeValueSaved - bardeenCost;

  // Update display elements
  document.getElementById("calcHours").textContent = hoursSaved;
  document.getElementById("timeValueSaved").textContent = `$${timeValueSaved.toFixed(2)}`;
  document.getElementById("totalRoi").textContent = `$${totalRoi.toFixed(2)}`;
  document.getElementById("roiAmount").textContent = totalRoi.toFixed(2);
}

// Attach event listeners to inputs
document.getElementById("hoursSaved").addEventListener("input", updateROI);
document.getElementById("hourlyRate").addEventListener("input", updateROI);

// Initial call to populate fields with default values
updateROI();

        // Range Input
function SliderFun(ele) {
  for (let i = 0; i < ele.length; i++) {
    const element = ele[i];

    const values = element.value;
    const dataValue = element.getAttribute("max");
    const fullValue = Math.round((values * 100) / dataValue);
    element.nextSibling.parentNode.querySelector(".active-line").style.width =
      fullValue + "%";
    if (element.nextSibling.parentNode.querySelector(".active-dot")) {
      element.nextSibling.parentNode.querySelector(".active-dot").style.left =
        fullValue + "%";
    }
    document.querySelector('.hour_span').textContent = parseInt(values) + parseInt(1);
    // if (values % 3 === 0) {
    console.log("The value is an integer." + values);
    console.log("values", values / 3);
    const vals = values / 3;
    const ulList = element.parentNode.parentElement.querySelectorAll("ul li");
    for (let ids = 0; ids < ulList.length; ids++) {
      if (ids < vals || ids == vals) {
        ulList[ids].classList.add("active");
      } else {
        ulList[ids].classList.remove("active");
      }
    }
    // }
  }
}
SliderFun($(".range-input input"));

$(".range-input input").on("input", function () {
  SliderFun($(this));
});

$(document).on('click','.element_circle',function(){
        var head = $(this).attr('data-head');
        var text = $(this).attr('data-text');
        $('.gethead').text(head)
        $('.gettext').text(text)
      })

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



</html>
@endsection

