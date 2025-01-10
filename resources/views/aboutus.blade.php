@extends('layouts.app')
@section('title', 'About Us - Smugglers')
@section('content')
@push('styles')
<style type="text/css">
  .aboutp p{
    font-size: 15px;
  }
</style>
<link href="{{ asset('assets/css/hiw.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
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

            <div class="section-space--pt_30 ">
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
<h6 class="section-title mb-20 mt-20">{{ $about->heading_two ?? '' }}</h6>
<div class="text mb-30">
 {!! $about->text_two ?? '' !!}
</div>
                                                </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                  </div>                 
                  </div> 

                  <div class="section-space--ptb_30 ">
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
<main id="main">
  <div data-w-id="122f97d3-501b-db74-4f56-f322d0d3b3ec" class="home_track">      

    <div class="home_camera">
      <div class="eyebrow u-text-center workflow">How it works</div>
      <div class="wrap__sticky sticky">
        <div class="container">
          <div class="stepper-wrap">
              @foreach($journey as $index => $journeys)
                  <div class="step-block {{ $index === 0 ? 'active' : '' }}">
                      <a id="slink{{ $index + 1 }}" data-scroll="{{ 900 + ($index * 1400) }}" href="#" class="tab_menu-btn btn cc-secondary cc-small w-inline-block">
                          <div>{{ $journeys->heading }}</div> <!-- Fetching the heading from the journey -->
                      </a>
                      <div class="step-block__progress-bar">
                          <div class="step-block__progress-bar-inner progress-bar__{{ $index + 1 }}"></div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>

      </div>
      <div class="home_frame">
        @foreach($journey as $index => $journeys)
    <div id="workflow-{{ $index + 1 }}" class="home_item {{ $index === 0 ? 'first' : '' }}">
        <div class="home_item-content_wrap">
            <div class="col col-lg-5">
                <div>
                    <div class="txt-chip cc-color-blueberry-400">
                        <div class="text-small">{{ $journeys['label'] }}</div>
                    </div>
                    <h2 class="h3 u-mt-1">{{ $journeys['heading'] }}</h2>
                    <p class="u-mt-1 u-mb-1">{!! $journeys['text'] !!}</p>
                    <a animaton-style="default" href="{{ $journeys['link'] }}" class="btn w-inline-block">
                        <div>{{ $journeys['button'] }}</div>
                    </a>
                </div>
            </div>
            @if ($index === 0)
           <div class="col col-lg-6">
            @else
           <div class="col col-lg-8">
            @endif
    <div class="u-product_container u-z-index-1 cc-dropshadow">
        <div class="clay_table w-embed">
 @if (in_array(pathinfo($journeys->path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'PNG']))
                <img src="{{ url($journeys['path']) }}" style="max-width: 100%; margin-bottom: -12px; width: 100%;">
@elseif (in_array(pathinfo($journeys->path, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov','webm']))
            <video src="{{ $journeys['path'] }}" autoplay playsinline loop muted data-video="true" preload="none" style="max-width: 100%;"></video>
            @endif
        </div>
    </div>
</div>

        
        <!-- Additional Images Based on Index -->
        @if ($index === 0)
        </div>
        @elseif ($index === 1)
        </div>
            <img src="{{ url('images/rop1.webp') }}" loading="lazy" sizes="(max-width: 991px) 100vw, 853.046875px" srcset="{{ url('images/rop1.webp') }}" alt="" class="workflow-cord enrichment"/>
        @elseif ($index === 2)
        </div>
            <img src="{{ url('images/rop2.webp') }}" loading="lazy" sizes="(max-width: 991px) 100vw, 1030.03125px" srcset="{{ url('images/rop2.webp') }}" alt="" class="workflow-cord ai"/>
        @elseif ($index === 3)
            <img src="{{ url('images/rop4.webp') }}" loading="lazy" sizes="(max-width: 991px) 100vw, 685.78125px" srcset="{{ url('images/rop4.webp') }}" alt="" class="workflow-cord last"/>
            <img src="{{ url('images/rop3.webp') }}" loading="lazy" sizes="(max-width: 991px) 100vw, 910.03125px" srcset="{{ url('images/rop3.webp') }}" alt="" class="workflow-cord msg"/>
            </div>
        @endif
    </div>
@endforeach

      
      </div>
</main>

<!--===========  panel slider End =============-->


                
            </div>
        </div>
        </div>




@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/hiw.js') }}" type="text/javascript"></script> 
@endpush

