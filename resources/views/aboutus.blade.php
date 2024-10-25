@extends('layouts.app')
@section('title', 'About Us - Smugglers')
@section('content')
<style type="text/css">
  .aboutp p{
    font-size: 15px;
  }
</style>
<div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="breadcrumb_box">
                        <h2 class="breadcrumb-title">{{ $about->heading_one ?? '' }}</h2>
                        <!-- breadcrumb-list start -->
                        {!! $about->text_one ?? '' !!}
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="bg-white">

            <div class="section-space--ptb_60 ">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-6 ">
                                                <div class="tab-history-image">
                                                        <div class="">
                                                            <img class="img-fluid" src="{{ url($about->image_one) }}" style=" border: 2px solid #dbe4ed;    border-radius: 4px;">
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center aboutp">
                                                <div class="tab-content-inner">
<div class="col-lg-12" style="">
<h6 class="section-title mb-20">{{ $about->heading_two ?? '' }}</h6>
<div class="text mb-30">
 {!! $about->text_two ?? '' !!}
</div>
                                                </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                  </div>                 
                  </div> 

                  <div class="section-space--ptb_60 ">
                  <div class="container">
                    <div class="row">
                                            <div class="col-lg-6 d-flex align-items-center aboutp">
                                                <div class="tab-content-inner">
<div class="col-lg-12" style="">
<h6 class="section-title mb-20">{{ $about->heading_three ?? '' }}</h6>
<div class="text mb-30">
{!! $about->text_three ?? '' !!}
</div>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 ">
                                                <div class="tab-history-image">
                                                        <div class="">
                                                            <img class="img-fluid" src="{{ url($about->image_two) }}" style=" border: 2px solid #dbe4ed;    border-radius: 4px;">
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                  </div>                 
                  </div>                 


                 <!--====================  testimonial section ====================-->
            <div class="testimonial-slider-area section-space--ptb_60 bg-gray-3" style="display: ">
                <div class="container-fluid container-fluid--cp-80">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h3 class="heading mb-20">Testimonials</h3>
                                <h6 class="section-sub-title mb-20">Why do people praise about<span class="" style="color:#2f3f58;"> Smugglers?</span></h6>
                            </div>
                            <div class="testimonial-slider">
                                <div class="swiper-container testimonial-slider__container-two">
                                    <div class="swiper-wrapper testimonial-slider__wrapper" style="height: auto;">
                                        @foreach($testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="testimonial-slider__single wow move-up">
                                                <p class="mt-3 mb-3">{{ $testimonial->text }}</p>
                                                <div class="author-info">
                                                    <div class="testimonial-slider__media">
                                                        <img src="{{ url($testimonial->image) }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="testimonial-slider__author">
                                                        <h6 class="heading">{{ $testimonial->name }}</h6>
                                                        <span class="designation">{{ $testimonial->store }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper-pagination swiper-pagination-t0 section-space--mt_40"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  End of testimonial section  ====================-->


<!--===========  panel slider  start =============-->

                <section id="panels" class="d-none d-md-block" style="position:relative;display: none !important;">

  <div class="page">

    <div class="sc-slide-wrapper" id="scSlideWrapper">
        <header>
    <div class="sc-top-nav nav-bar">
      <div class="container">
        <ul class="sc-top-nav-list">
          <li class="active"><a href="#scHeroSection" class="sc-slide-nav">panel 1</a></li>
          <li><a href="#scSaleSection" class="sc-slide-nav">panel 2</a></li>
          <li><a href="#scWhySection" class="sc-slide-nav">panel 3</a></li>
          <li><a href="#scEstimateSection" class="sc-slide-nav">panel 4</a></li>
        </ul>
      </div>
    </div>
  </header>
      <section class="sc-slide-section gradient-green" id="scHeroSection">
        <div class="container position-relative">
          <div class="row">
            <div class="col-sm-12">
              <h1>panel 1</h1>
            </div>
          </div>
        </div>

      </section>
      <section class="sc-slide-section gradient-blue" id="scSaleSection">
        <div class="container position-relative">
          <div class="row">
            <div class="col-sm-12">
              <h1>panel 2</h1>
            </div>
          </div>
        </div>
      </section>
      <section class="sc-slide-section gradient-orange" id="scWhySection">
        <div class="container position-relative">
          <div class="row">
            <div class="col-sm-12">
              <h1>panel 3</h1>
            </div>
          </div>
        </div>
      </section>
      <section class="sc-slide-section gradient-green" id="scEstimateSection">
        <div class="container position-relative">
          <div class="d-flex">
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
            <div class="fix-w">
              dynamic card
            </div>
          </div>
        </div>

      </section>
    </div>

    <div class="sc-page-nav">
      <span class="sc-page-nav-prev">

      </span>
      <span class="sc-page-nav-next">
        <a href="#scSaleSection" class="sc-page-nav-item">
          <i class="fa-solid fa-circle-chevron-right"></i>
        </a>
      </span>
    </div>
  </div>

                </section>

                <!--===========  panel slider End =============-->

                
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









@include('layouts.lead_form')
@include('layouts.footer_home')

    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollToPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


<script>
    gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

    let slidesContainer = document.querySelector("#scSlideWrapper"),
      tween;

    const slides = gsap.utils.toArray("#scSlideWrapper .sc-slide-section");
    tween = gsap.to(slides, {
      // xPercent: -100 * (slides.length - 1),
      x: () => -1 * (slidesContainer.scrollWidth - innerWidth),
      ease: "none",
      scrollTrigger: {
        trigger: "#scSlideWrapper",
        pin: true,
        start: "top top",
        scrub: 1,
        // snap: {
        //     snapTo: 1 / (slides.length - 1),
        //     inertia: false,
        //     duration: {
        //         min: 0.1,
        //         max: 0.1,
        //     },
        // },
        end: () => "+=" + (slidesContainer.scrollWidth - innerWidth),
        onUpdate: (self) => {
          const slideIndex = Math.round(self.progress * (slides.length - 1));
          const slideId = slides[slideIndex].id;
          updateActiveNav(slideId);
          updatePrevNext(slideId);
        }
      }
    });

    document.querySelectorAll(".sc-slide-nav").forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        scrollToTarget(e.target.getAttribute("href"));
      });
    });

    jQuery(document).on("click", ".sc-page-nav-item", function (e) {
      e.preventDefault();
      scrollToTarget(e.target.parentNode.getAttribute("href"));
    });

    function scrollToTarget(href) {
      let targetEle = document.querySelector(href),
        y = targetEle;
      if (targetEle && slidesContainer.isSameNode(targetEle.parentElement)) {
        let totalScroll = tween.scrollTrigger.end - tween.scrollTrigger.start,
          totalMovement = slidesContainer.scrollWidth - innerWidth;
        y = Math.round(
          tween.scrollTrigger.start +
            (targetEle.offsetLeft / totalMovement) * totalScroll
        );
      }
      gsap.to(window, {
        scrollTo: {
          y: y,
          autoKill: false
        },
        duration: 1
      });
    }

    function updateActiveNav(slideId) {
      jQuery(".sc-top-nav-list li").removeClass("active");
      jQuery(`a[href="#${slideId}"]`).parent().addClass("active");
    }

    function updatePrevNext(slideId) {
      let links = {
        scHeroSection: {
          next: "#scSaleSection"
        },
        scSaleSection: {
          prev: "#scHeroSection",
          next: "#scWhySection"
        },
        scWhySection: {
          prev: "#scSaleSection",
          next: "#scEstimateSection"
        },
        scEstimateSection: {
          prev: "#scWhySection"
        }
      };

      jQuery(".sc-page-nav-prev").html("");
      jQuery(".sc-page-nav-next").html("");

      if (links[slideId].hasOwnProperty("prev")) {
        jQuery(".sc-page-nav-prev").html(`
                        <a href="${links[slideId]["prev"]}" class="sc-page-nav-item">
                            <i class="fa-solid fa-circle-chevron-left"></i>
                        </a>`);
      }

      if (links[slideId].hasOwnProperty("next")) {
        jQuery(".sc-page-nav-next").html(`
                        <a href="${links[slideId]["next"]}" class="sc-page-nav-item">
                            <i class="fa-solid fa-circle-chevron-right"></i>
                        </a>`);
      }
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

