@extends('layouts.app')
@section('title', 'Home - Smugglers')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/codepen_bg_panel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .main-circle-content {
    text-align: center;
    border: 3px solid #fbbc04;
    padding: 50px 20px;
    min-height: 360px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 9px;
    justify-content: center;
    margin-bottom: 10px;
}

.content-hide p{
margin-bottom:0px !important;
}

.secondvid_text a{
    align-self: center;
}

  h1, h5 {
    transition: color 0.5s ease;
  }
 .scrolled-h1 {
    color: #df9242;
    font-family: monospace;
  }

  .scrolled-h5 {
    color: #2f3f58;
    font-family: monospace;
  }


.modal_form {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  transform: scale(1.1);
  transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modal-content_form {
  position: absolute;
  border: 2px solid #df9242;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 2rem 2.5rem;
  width: 50em;
  border-radius: 0.5rem;
}
.close-button_form {
  float: right;
  width: 2.5rem;
  font-size: 1.2em;
  line-height: 2;
  padding: 0 .2em .15em;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: #ddd;
  color: #333;
  transition: color 0.12s ease-in-out;
  position: absolute;
  top: 10px;
  right: 20px;
}
.close-button_form:hover {
  color: #d75b4c;
}
.show-modal_form {
  opacity: 1;
  visibility: visible;
  transform: scale(1.0);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
  z-index: 9;
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

</style>

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
                              <a href="{{ route('register') }}" class="ht-btn ht-btn-md btn-blue">Get Started </a>
                              <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                            </div>
                            <!-- section-title-wrap Start -->
                          </div>
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
                <div class="feature-icon-wrapper section-space--ptb_60">
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
          </div>
      </div>
      
        
      </div>
                    </div>
                </div>
                <!--===========  feature-icon-wrapper  End =============-->

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

                <div id="afterpenel" class="feature-icon-wrappe section-space--ptb_60 infotechno-section-bg-01" style="background-color:#EBEBEB;">
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

                <!--===========  feature-icon-wrapper  Start =============-->
                <div class="feature-icon-wrapper bg-gray section-space--pb_60">
                    <div class="container-fluid" style="padding-left: 0px;">

                        <div class="row">
                            <div class="col-lg-8 section-space--pt_60">
                                <video class="elementor-video" src="{{ asset($videoSettings->video_two) }}" autoplay="" loop="" muted="muted" controlslist="nodownload"></video>
                            </div>
                            <div class="col-lg-4 section-space--pt_100 secondvid_text" style="padding: 100px 25px;  display: flex; flex-direction: column;">
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

                 <!--====================  Conact us Section Start ====================-->
            <div class="contact-us-section-wrappaer bg-black section-space--ptb_120" style="display:;">
                <div class="container" style="position:relative;">
                    <img class="d-none d-lg-block" src="{{ url('sunlight.webp') }}" style="position: absolute;
    bottom: 0;
    left: 25%;
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

                <!--===========  feature-icon-wrapper  Start =============-->
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
                <!--===========  feature-icon-wrapper  End =============-->

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

<div class="modal_form">
  <div class="modal-content_form">
    <span class="close-button_form">&times;</span>
    <form id="multi-step-form" method="POST" action="{{ url('lead_storehubspot') }}">
    @csrf
     <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h5 class="heading">Join Our Project</h5>
            <p class="">We are excited to share the latest news about our ongoing project. Stay tuned for more updates, and don't miss out on what's coming next!</p>
        </div>
     </div>
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

<div class="row mb-3">
    <div class="col-md-12">
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

    <div class="col-md-6 store_license_div" style="display:none;">
     <label for="store-license" class="col-md-12 col-form-label">Store License Number</label>
    <div class="col-md-12" style="position: relative;">
        <input name="store_license" type="text"  class="form-control @error('store_license') is-invalid @enderror" id="store_license" >
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

    <div class="col-md-6 store_license_div" style="display:none;">
     <label for="store-name" class="col-md-12 col-form-label">Store Name</label>
    <div class="col-md-12" style="position: relative;">
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
    color: green;;">Lead submitted successfully</p>
    </div>

    </div>

     <div class="row mb-0 ">
                            <div class="col-md-12" style="justify-content:center;display: flex;">
                                <button type="submit" class="btn loginbtn">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

        </form>

  </div>
</div>
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
<script>
    // Wait for the document to load
    window.onload = function() {
        const paragraphs = document.querySelectorAll(".scroll_right_side p");

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

$('#multi-step-form').submit(function(e) {
        e.preventDefault();
        $('.error_invalid_lead_lic').hide();
        $('.error_invalid_lead').hide();
        $('.success_lead').hide();
        var storeName = $('#store_names').val();
        var licenseNumber = $('#store_license').val();
        var stateSelected = $('#statefetch').val();

        if (!storeName && !licenseNumber) {
        alert("Please select a store or enter a license number.");
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
            if(data.message == 'notmatch'){
            $('.error_invalid_lead_lic').show();
            }
            else{
                $('.success_lead').show();
                location.reload(true);
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


         if(window.location.hash) {
        var target = window.location.hash;
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 500);
        }
      $(document).on('click','.element_circle',function(){
        var head = $(this).attr('data-head');
        var text = $(this).attr('data-text');
        $('.gethead').text(head)
        $('.gettext').text(text)
      })
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
<!-- Mirrored from htmldemo.net/mitech/index-cybersecurity.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jul 2023 20:59:07 GMT -->
</html>
@endsection

