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
                         <div class="col-lg-5 col-lg-5 mb-20">
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
@endsection
@push('scripts')

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

$(document).ready(function() {
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
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const marqueeContent = document.getElementById("marquee-content");
    
    // Duplicate the content after the page loads
    const duplicateContent = marqueeContent.innerHTML;
    marqueeContent.innerHTML += duplicateContent;

});
</script>
@endpush


