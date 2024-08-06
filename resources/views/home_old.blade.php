@extends('layouts.app')
@section('title', 'Home - Smuggler')
@section('content')


    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="bg-white">

                     <div class="container section-space--pt_60">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- section-title-wrap Start -->
                                <div class="section-title-wrap text-center section-space--mb_60">
                                    <h1 class="heading">{{ $textSettings->heading_one ?? '' }} <br> {{ $textSettings->heading_two ?? '' }}</h1>
                                    <h5 class="mt-3 mb-3">{{ $textSettings->text ?? '' }}</h5>
                                      <a href="{{ route('register') }}" class="ht-btn ht-btn-md">Get Started </a>
                                </div>
                                <!-- section-title-wrap Start -->
                            </div>
                        </div>
                     </div>


                     <!--===========  feature-icon-wrapper  Start =============-->
                <div class="feature-icon-wrapper section-space--pb_0">
                    <div class="container-fluid" style="padding-left: 0px;">

                        <div class="row">
                            <div class="col-lg-12">
                                <video class="elementor-video" src="{{ asset($videoSettings->video_one) }}" autoplay="" loop="" muted="muted" controlslist="nodownload"></video>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===========  feature-icon-wrapper  End =============-->

                <!--===========  feature-icon-wrapper  Start =============-->
                <div class="feature-icon-wrapper section-space--pb_60">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center section-space--mb_40">
                                    <h3 class="heading">Feature Demos</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-12 wow move-up">
                            <div class="marquee">
        <div class="marquee-content"> 
          <div class="marquee-item div-class-2 ">
          <div class="marquee-box  box-image-overlay-1">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-4.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          <div class="marquee-box  box-image-overlay-2">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-5.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          </div>
          <div class="marquee-item  box-image-overlay-3">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-3.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
            <div class="marquee-item div-class-2">
          <div class="marquee-box  box-image-overlay-4">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-9.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          <div class="marquee-box  box-image-overlay-5">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-10.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          </div>
          <div class="marquee-item  box-image-overlay-6">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-6.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
          <div class="marquee-item div-ex-box  box-image-overlay-7">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-11.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
          
           <!--hhhhhh-->
          
            <div class="marquee-item div-class-2 ">
          <div class="marquee-box  box-image-overlay-8" >
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-5.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          <div class="marquee-box  box-image-overlay-9">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-13.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          </div>
          <div class="marquee-item  box-image-overlay-10">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-7.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
          <div class="marquee-item div-ex-box  box-image-overlay-11">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-12.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
            
          </div>
          <!--hhhhhh-->
          
           <!--hhhhhh-->
          
            <div class="marquee-item div-class-2  ">
          <div class="marquee-box box-image-overlay-12">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-10.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          <div class="marquee-box  box-image-overlay-13">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-9.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          </div>
          <div class="marquee-item box-image-overlay-14">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-8.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
          
           <!--hhhhhh-->
          
            <div class="marquee-item div-class-2">
          <div class="marquee-box  box-image-overlay-15">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-5.png" alt="">
      
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          <div class="marquee-box box-image-overlay-16">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-10.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          </div>
          <div class="marquee-item box-image-overlay-17">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-6.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
          
           <!--hhhhhh-->
          
            <div class="marquee-item div-class-2 box-image-overlay-18">
          <div class="marquee-box">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-4.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          <div class="marquee-box  box-image-overlay-19">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-13.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          
          </div>
          <div class="marquee-item box-image-overlay-20 ">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-3.png" alt="">
            <div class="image-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
          <div class="marquee-item div-ex-box box-image-overlay-21 ">
            <img src="https://sm2.webxcube.com/wp-content/uploads/2024/04/image-12.png" alt="">
            <div class="image-overlay hide-content-overlay">
              <p>Text for Image 1</p>
          </div>
          </div>
          <!--hhhhhh-->
          
          
        </div>
      </div>

      
                        </div>
                    </div>

                    <div class="popup">
        <span class="close">&times;</span>
      <div class="pop-box-css">
          <div class="pop-box-css-left">
      <p class="add-content image-overlay-1">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-2">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-3">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-4">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-5">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-6">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-7">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-8">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-9">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-10">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-11">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-12">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-13">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-14">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-15">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-16">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-17">jOne Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-18">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-19">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-20">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      <p class="add-content image-overlay-21">One Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi, ducimus culpa, aliquam tenetur quos vel repellendus deserunt at, fugiat voluptas adipisci rerum expedita rem nulla optio eos accusamus debitis?</p>
      
          </div>
          <div class="pop-box-css-right">
              <img class="popup-content" src="">
          </div>
      </div>
      
        
      </div>
                    </div>
                </div>
                <!--===========  feature-icon-wrapper  End =============-->

                <div class="feature-icon-wrappe section-space--ptb_60">
                    <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-tabs">
          <div class="steps">
            <div class="step active" data-step="1">Step 1</div>
            <div class="step" data-step="2">Step 2</div>
            <div class="step" data-step="3">Step 3</div>
            <div class="step" data-step="4">Step 4</div>
            <div class="step" data-step="5">Step 5</div>
        </div>
        <div class="content sh-contents">
            <div class="step-content" data-content="1">
              <div class="stp-content">
                <div class="stp-con-inn">
                  <img src="Screenshot 2024-07-05 000127.png" alt="">
                </div>
                <div class="stp-con-inn">
                  <div class="stp-con-inn-sm">
                   <h3>Enroll</h3>
                  <p>Join the Smugglers family by entering your basic information to create an account. This first step opens the door to a suite of powerful tools designed to elevate your business.
                  </p>
                  <p class="sm-text">Click on the “Sign Up” button to Enroll and begin the sign-up process.  </p>
                 <a href="#"  class="btn btn-gradient-primary">Sign Up for Free</a>
                </div>
                </div>
              </div>

               
            </div>
            <div class="step-content" data-content="2">

              <div class="stp-content">
                <div class="stp-con-inn">
                  <div class="stp-con-inn-sm">
                    <h3>Setup</h3>
                    <p>Connect your POS system to our cutting-edge OMS and input your preferences. Whether you do it yourself or with our friendly support team, you’ll be set up in no time. This seamless process ensures you’re ready to start transforming your business operations.                    </p>
                    <p class="sm-text">Choose between setting up independently, requesting assistance, or scheduling a live demo.                    </p>
                    <div class="btn-2inn">
                     <a href="#"  class="btn btn-gradient-primary">Get Started</a>
                     <a href="#"  class="btn btn-gradient-primary_or">Request a Demo</a>
                    </div>
                </div>
                </div>
                <div class="stp-con-inn">
                  <img src="Screenshot 2024-07-05 000127.png" alt="">
                </div>
                
              </div>

            </div>
            <div class="step-content" data-content="3">
              <div class="stp-content">
                <div class="stp-con-inn">
                  <img src="Screenshot 2024-07-05 000127.png" alt="">
                </div>
                <div class="stp-con-inn">
                  <div class="stp-con-inn-sm">
                    <h3>Customize</h3>
                    <p>Now, let’s get personal! We’ll work closely with you to tailor our system to your unique business needs. With a dedicated customer representative, you’ll explore features like inventory management, distributor orders, and customer relationship tools. This phase can last as long as you need, allowing you to refine your preferences and feel confident in using our system to its fullest potential.


                    </p>
                    <p class="sm-text">Schedule a walkthrough call with us to customize your account.

                    </p>
                    <div class="btn-2inn">
                     <a href="#"  class="btn btn-gradient-primary">Schedule Call</a>
                     <a href="#"  class="btn btn-gradient-primary_or">Customize Now</a>
                    </div>
                </div>
                </div>
              </div>
            </div>
            <div class="step-content" data-content="4">

              <div class="stp-content">
                <div class="stp-con-inn">
                  <div class="stp-con-inn-sm">
                    <h3>Advance</h3>
                    <p>Time to level up! With a deep understanding of your operations, we start offering tailored recommendations that can revolutionize your business. Expect insights on new product launches, operational strategies, and more. Advanced features like strategic pricing, customer engagement enhancements, and comprehensive analytics come into play, guiding you towards peak performance.</p>
                    <p class="sm-text">Explore recommendations and set up campaigns.

                    </p>
                    <div class="btn-2inn">
                     <a href="#"  class="btn btn-gradient-primary">Explore Recommendations</a>
                     <a href="#"  class="btn btn-gradient-primary_or">Set Up Campaigns</a>
                    </div>
                </div>
                </div>
                <div class="stp-con-inn">
                  <img src="Screenshot 2024-07-05 000127.png" alt="">
                </div>
                
              </div>

            </div>
          
          
          <div class="step-content" data-content="5">
            <div class="stp-content">
              <div class="stp-con-inn">
                <img src="Screenshot 2024-07-05 000127.png" alt="">
              </div>
              <div class="stp-con-inn">
                <div class="stp-con-inn-sm">
                  <h3>Master</h3>
                  <p>Welcome to the pinnacle of optimization! This final stage unleashes the full power of our system with advanced integrations and automations. Seamlessly manage orders, social media, e-commerce channels, and more, while our system handles the details. Continuous, data-driven recommendations ensure your business thrives effortlessly, giving you the freedom to focus on what you love.                  </p>
                  <p class="sm-text">Upgrade to master solutions for expanded capabilities.</p>
                 <a href="#"  class="btn btn-gradient-primary">Upgrade to Master</a>
              </div>
              </div>
            </div>
          </div>
          
        </div>
        </div>                            

                        </div>
                    </div>
                </div>
                </div>
                <!--===========  feature-icon-wrapper  End =============-->

                <!--===========  feature-icon-wrapper  Start =============-->
                <div class="feature-icon-wrapper bg-gray section-space--pb_60">
                    <div class="container-fluid" style="padding-left: 0px;">

                        <div class="row">
                            <div class="col-lg-8">
                                <video class="elementor-video" src="{{ asset($videoSettings->video_two) }}" autoplay="" loop="" muted="muted" controlslist="nodownload"></video>
                            </div>
                            <div class="col-lg-4 section-space--pt_100">
                                <h5 class="heading">{{ $home_text2->heading_one ?? '' }}</h5>
                                    <p class="mt-3 mb-3">{{ $home_text2->text ?? '' }}</p>
                                      <a href="#" class="ht-btn ht-btn-md">See all integrations </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===========  feature-icon-wrapper  End =============-->

                <!--===========  feature-icon-wrapper  Start =============-->
@include('plans')
                <!--===========  feature-icon-wrapper  End =============-->

                <!--===========  rev_redraw-wrapper  Start =============-->
                <div class="rev_redraw-wrapper">
                        <div class="rev_redraw-inner-box bg-gray-2 section-space--mt_40 rev_redraw-space">
                            <!-- start Circle Menu -->
                            <div id="uc_ue_circle_menu_elementor_b433c4f" class="" data-show-tip="false">
                                <div class="ue-ciclegraph">
                                    <h5 class="heading">{{ $circleTextSettings->heading_one }}</h5>
                                    <p>{{ $circleTextSettings->text }}</p>
                                    <div class="uc-items-wrapper">
                                        @for ($i = 1; $i <= 10; $i++)
                                            @php
                                                $circleField = 'cir' . $i;
                                                $circleText = $circleTextSettings->$circleField;
                                            @endphp
                                            <a class="ue-circle elementor-repeater-item-{{ $i }} sl-{{ $i }}" title="{{ $circleText }}" href="#" id="uc_ue_circle_menu_elementor_b433c4f_item{{ $i }}" style="transform: rotate({{ 306 + ($i - 1) * 36 }}deg) translate(271px) rotate(-{{ 306 + ($i - 1) * 36 }}deg);">
                                                <div class="ue-circle-content">
                                                    <div class="ue-circle-title">{{ $circleText }}</div>
                                                </div>
                                            </a>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <!-- end Circle Menu -->
                        </div>
                    </div>
                <!--===========  rev_redraw-wrapper  End =============-->
            </div>
        </div>




        <!--====================  footer area ====================-->
        <div class="footer-area-wrapper" style="background-color:#cc9249;">
            <div class="footer-copyright-area" style="padding:10px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center text-md-start">
                            <p class="copyright-ptext" style="text-align: center;
    color: white;
    font-size: 20px;">Copyright © 2024 Smugglerish</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of footer area  ====================-->









  
@include('layouts.footer_home')

<script type="text/javascript">
    $(document).ready(function() {
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
  });

  // Close popup
  $(".close").click(function() {
    $(".popup").css("display", "none");
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
<!-- Mirrored from htmldemo.net/mitech/index-cybersecurity.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jul 2023 20:59:07 GMT -->
</html>
@endsection

