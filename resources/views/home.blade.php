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
                                        <p>Text for Image {{ $index + 1 }}</p>
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
    font-size: 20px;">Copyright © 2024 Smugglers</p>
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
<!-- Mirrored from htmldemo.net/mitech/index-cybersecurity.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jul 2023 20:59:07 GMT -->
</html>
@endsection

