@extends('layouts.app')
@section('title', 'Pricing - Smugglers')
@section('content')
<style type="text/css">
    .calc_tabs{
        margin-bottom: 20px;
    }
    .calc_tabs p {
    background: #f1ecec59;
    border-radius: 10px;
    padding: 10px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    color: #c7bebe;
}
.calc_tabs p:hover{
background: hsl(45.18deg 100% 50%);
color: black;
}
.calc_tabs p.active{
background: hsl(45.18deg 100% 50%);
color: black;
}
p.pcls{
    text-align: center;
    font-size: 16px;
    font-weight: 400;
}

@media only screen and (max-width: 767px) {
.calc_tabs p{
    margin-bottom: 10px;
}
}
.input-container {
    position: relative;
    display: inline-block;
    text-align: center;
}

.currency-symbol {
    position: absolute;
    left: 8px;
    transform: translateX(-50%);
    top: -4px;
    margin-top: 5px;
    font-size: 15px;
    color: #333;
}

.numberInput{
  text-align: center;
}

</style>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="bg-white">

                                     @include('plans')


                <div class="feature-icon-wrapper section-space--ptb_60 section_pricing-calculator" style="display:">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center section-space--mb_20">
                                    <h5 class="heading">{{ $calcSettings->heading_one }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="border-radius: 10px;
    border: 1px solid #ccc;
    padding: 20px 20px 20px 20px;">

                         <div class="row calc_tabs">
                            <div class="col-lg-3">
                                <p class="active" data-id="2">{{ $calcSettings->heading_tab_two ?? '' }}</p>
                            </div>
                             <div class="col-lg-3">
                                <p data-id="4">{{ $calcSettings->heading_tab_four ?? '' }}</p>
                            </div>
                            <div class="col-lg-3">
                                <p class="" data-id="1">{{ $calcSettings->heading_tab ?? '' }}</p>
                            </div>
                            <div class="col-lg-3">
                                <p data-id="3">{{ $calcSettings->heading_tab_three ?? '' }}</p>
                            </div>

                        </div>

                        <div class="calc_tab_visi" data-id="1" style="display:none;">
                        <div class="row">
                            <div class="col-md-6">
                            <p class="pcls">{{ $calcSettings->text_one }}</p> 

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

                          <div class="row">
                            <div class="col-md-12 text-center">
                            <p class="m-0">{{ $calcSettings->text_two }} </p>
                             <div class="input-container">
                              <input type="text" class="numberInput" value="50" min="0" max="100000" name="hourly_rate" id="hourlyRate" style="    padding: 0px 0px 0px 15px;"> / hr
                                  <span class="currency-symbol">$</span>
                              </div>
                                </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-md-6-roi">
                                <h5 class="text-center">{{ $calcSettings->heading_two }}</h5>

                                  <h5 class="hour_h5" style="margin: 25px 0px 0px 0px;"><span>$</span><span id="roiAmount">0</span></h5>

                                <p style="text-align: center;margin-bottom: 25px;"><b>{!! $calcSettings->text_three !!}</b></p>
                                
                                 <p style="margin:0">
                                    <span>{{ $calcSettings->text_four }}</span><br>
                                    <span>{{ $calcSettings->text_five }}</span><span><b style="float: right;" id="calcHours">0</b></span><br>
                                    <span><b>{{ $calcSettings->text_six }}</b></span><span><b style="float: right;" id="timeValueSaved">$0</b></span><br>
                                    <span>{{ $calcSettings->text_seven }}</span><span><b style="float: right;">$49</b></span><br>
                                  </p>

                                <hr style="margin: 0;">

                                  <p><span><b>{{ $calcSettings->text_eight }}</b></span> <b style="float: right;" id="totalRoi">$0</b></p>
                            </div>
                        </div>
                        </div>
                        
                        <div class="calc_tab_visi" data-id="2" style="display:;">
                            <div class="row">
                            <div class="col-md-6">
                            <p class="pcls">{{ $calcSettings->text_ten }}</p> 

                            <h5 class="hour_h5"><span class="hour_span">No Risk</span></h5>
                            <div class="range-item">
                            <div class="range-input d-flex position-relative">
                              <input type="range" min="0" max="5" class="form-range" name="dataShared" id="hoursSaved2" value="0" />
                              <div class="range-line">
                                <span class="active-line"></span>
                              </div>
                              <div class="dot-line">
                                <span class="active-dot"></span>
                              </div>
                            </div>
                            <ul class="list-inline list-unstyled">
                              <li class="list-inline-item">
                                <span>No Risk</span>
                              </li>
                              <li class="list-inline-item">
                                <span>Low Risk</span>
                              </li>
                              <li class="list-inline-item">
                                <span>Low-Medium Risk</span>
                              </li>
                              <li class="list-inline-item">
                                <span>Medium Risk</span>
                              </li>
                              <li class="list-inline-item">
                                <span>High-Medium Risk</span>
                              </li>
                              <li class="list-inline-item">
                                <span>High Risk</span>
                              </li>
                            </ul>
                          </div>

                          <div class="row">
                            <div class="col-md-6 text-center">
                            <p class="m-0">{{ $calcSettings->text_eighteen }} </p>
                             <div class="input-container">
                              <input type="text" class="numberInput" value="1,000" min="0" max="100000" name="hourly_rate" id="monthlyRate" style="    padding: 0px 0px 0px 15px;"> / mo
                                  <span class="currency-symbol">$</span>
                              </div>
                                </div>


                            <div class="col-md-6 text-center">   
                            <p class="m-0">{{ $calcSettings->text_eleven }} </p>
                            <div class="input-container">
                                    <input type="text" class="numberInput" value="5" min="0" max="100" name="hourly_rate" id="netprofit"> %
                                </div>
                                </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-md-6-roi">
                                <h5 class="text-center">{{ $calcSettings->heading_three }}</h5>

                                  <h5 class="hour_h5" style="margin: 25px 0px 0px 0px;"><span>$</span><span id="roiAmount2">0</span></h5>

                                <p style="text-align: center;margin-bottom: 25px;"><b>{!! $calcSettings->text_twelve !!}</b></p>
                                
                                 <p style="margin:0">
                                    <span>{{ $calcSettings->text_thirteen }}</span><br>
                                    <span>{{ $calcSettings->text_fourteen }}</span><span><b style="float: right;" id="calcHours2">0</b></span><br>
                                    <span><b>{{ $calcSettings->text_fifteen }}</b></span><span><b style="float: right;" id="timeValueSaved2">$0</b></span><br>
                                    <span>{{ $calcSettings->text_sixteen }}</span><span><b style="float: right;">$49</b></span><br>
                                  </p>

                                <hr style="margin: 0;">

                                  <p><span><b>{{ $calcSettings->text_seventeen }}</b></span> <b style="float: right;" id="totalRoi2">$0</b></p>
                            </div>
                        </div>
                        </div>


                        <div class="calc_tab_visi" data-id="4" style="display:none;">
                            <div class="row">
                            <div class="col-md-6">
                            <p class="pcls">{{ $calcSettings->text_twenty_eight }}</p> 

                            <h5 class="hour_h5"><span class="hour_span">No Discounts</span></h5>
                            <div class="range-item">
                            <div class="range-input d-flex position-relative">
                              <input type="range" min="0" max="3" class="form-range" name="dataShared" id="hoursSaved4" value="0" />
                              <div class="range-line">
                                <span class="active-line"></span>
                              </div>
                              <div class="dot-line">
                                <span class="active-dot"></span>
                              </div>
                            </div>
                            <ul class="list-inline list-unstyled">
                              <li class="list-inline-item">
                                <span>No Discounts</span>
                              </li>
                              <li class="list-inline-item">
                                <span>2-3 Discounts</span>
                              </li>
                              <li class="list-inline-item">
                                <span>3-10 Discounts</span>
                              </li>
                              <li class="list-inline-item">
                                <span>10+ Discounts</span>
                              </li>
                            </ul>
                          </div>

                          <div class="row">
                          <div class="col-md-6 text-center">
                              <p class="m-0">{{ $calcSettings->text_thirty_six }}</p>
                              <div class="input-container">
                                  <input type="text" class="numberInput" value="1,000" min="0" max="100000" name="hourly_rate" id="pexpense" style="    padding: 0px 0px 0px 15px;"> / mo
                                  <span class="currency-symbol">$</span>
                              </div>
                          </div>
                          <div class="col-md-6 text-center">
                              <p class="m-0">{{ $calcSettings->text_twenty_nine }}</p>
                              <div class="input-container">
                                  <input type="text" class="numberInput" value="500" min="0" max="100000" name="hourly_rate" id="npexpense" style="    padding: 0px 0px 0px 15px;"> / mo
                                  <span class="currency-symbol">$</span>
                              </div>
                          </div>
                      </div>


                            </div>
                            <div class="col-md-6 col-md-6-roi">
                                <h5 class="text-center">{{ $calcSettings->heading_five }}</h5>

                                  <h5 class="hour_h5" style="margin: 25px 0px 0px 0px;"><span>$</span><span id="roiAmount4">0</span></h5>

                                <p style="text-align: center;margin-bottom: 25px;"><b>{!! $calcSettings->text_thirty !!}</b></p>
                                
                                 <p style="margin:0">
                                    <span>{{ $calcSettings->text_thirty_one }}</span><br>
                                    <span>{{ $calcSettings->text_thirty_two }}</span><span><b style="float: right;" id="calcHours4">0</b></span><br>
                                    <span><b>{{ $calcSettings->text_thirty_three }}</b></span><span><b style="float: right;" id="timeValueSaved4">$0</b></span><br>
                                    <span>{{ $calcSettings->text_thirty_four }}</span><span><b style="float: right;">$49</b></span><br>
                                  </p>

                                <hr style="margin: 0;">

                                  <p><span><b>{{ $calcSettings->text_thirty_five }}</b></span> <b style="float: right;" id="totalRoi4">$0</b></p>
                            </div>
                        </div>
                        </div>

                        <div class="calc_tab_visi" data-id="3" style="display:none;">
                            <div class="row">
                            <div class="col-md-6">
                            <p class="pcls">{{ $calcSettings->text_nineteen }}</p> 

                            <h5 class="hour_h5"><span class="hour_span">1</span> times</h5>
                            <div class="range-item">
                            <div class="range-input d-flex position-relative">
                              <input type="range" min="0" max="19" class="form-range" name="dataShared" id="hoursSaved3" value="0" />
                              <div class="range-line">
                                <span class="active-line"></span>
                              </div>
                              <div class="dot-line">
                                <span class="active-dot"></span>
                              </div>
                            </div>
                            <ul class="list-inline list-unstyled">
                              <li class="list-inline-item">
                                <span>1t</span>
                              </li>
                               <li class="list-inline-item">
                                <p class="small"></p>
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
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="large"></p>
                              </li>
                              <li class="list-inline-item">
                                <span>10t</span>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
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
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="small"></p>
                              </li>
                              <li class="list-inline-item">
                                <p class="large"></p>
                              </li>
                              <li class="list-inline-item">
                                <span>20t</span>
                              </li>
                            </ul>
                          </div>
   
                            </div>
                            <div class="col-md-6 col-md-6-roi">
                                <h5 class="text-center">{{ $calcSettings->heading_four }}</h5>

                                  <h5 class="hour_h5" style="margin: 25px 0px 0px 0px;"><span>$</span><span id="roiAmount3">0</span></h5>

                                <p style="text-align: center;margin-bottom: 25px;"><b>{!! $calcSettings->text_twenty_one !!}</b></p>
                                
                                 <p style="margin:0">
                                    <span>{{ $calcSettings->text_twenty_two }}</span><br>
                                    <span>{{ $calcSettings->text_twenty_three }}</span><span><b style="float: right;" id="calcHours3">0</b></span><br>
                                    <span><b>{{ $calcSettings->text_twenty_four }}</b></span><span><b style="float: right;" id="timeValueSaved3">$0</b></span><br>
                                    <span>{{ $calcSettings->text_twenty_five }}</span><span><b style="float: right;">$49</b></span><br>
                                  </p>

                                <hr style="margin: 0;">

                                  <p><span><b>{{ $calcSettings->text_twenty_six }}</b></span> <b style="float: right;" id="totalRoi3">$0</b></p>
                            </div>
                        </div>
                        </div>

                        <div class="btn-2inn mt-5">
                              <a href="{{ route('register') }}" class="ht-btn ht-btn-md btn-blue">Get Started </a>
                              <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue click_all_learnmore" style="background: #df9242;">learn more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                              </div>
                </div>
            </div>

            <!--===========  rev_redraw-wrapper  Start =============-->
                <div class="rev_redraw-wrapper section-space--ptb_60">
                        <div class="rev_redraw-inner-box section-space--ptb_60">
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

                            <div class="container-fluid element_circle_main_mobile d-block d-md-none p-0">
                            <div class="row g-0" style="display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding: 10px;
    scroll-behavior: smooth;">
                                 @for ($i = 1; $i <= 10; $i++)
                                            @php
                                                $circleField = 'cir' . $i;
                                                $circleField2 = 'text' . $i;
                                                $circleText = $circleTextSettings->$circleField;
                                                $circleText2 = $circleTextSettings->$circleField2;
                                            @endphp
                            <div class="col-md-6 main-circle-content" style="margin-right: 5px;width:95%;">
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
                <div class="feature-icon-wrapper bg- section-space--pt_60">
                    <div class="container-fluid p-0">

                        <div class="row g-0">
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
    font-size: 19px;">Copyright © 2024 Smugglers</p>
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
    $(document).on('click','.calc_tabs p',function(){
        var id = $(this).attr('data-id');
        $('.calc_tabs p').removeClass('active')
        $(this).addClass('active')
        $('.calc_tab_visi').hide();
        $('.calc_tab_visi[data-id="'+id+'"]').show();
        })
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
  const hoursSaved = parseInt(parseInt(document.getElementById("hoursSaved").value) + parseInt(1));
  const hourlyRate = parseFloat(document.getElementById("hourlyRate").value.replace(/,/g, ""));
  const bardeenCost = 49;

  // Calculate time value saved
  const timeValueSaved = hoursSaved * hourlyRate;

  // Calculate total ROI
  const totalRoi = timeValueSaved - bardeenCost;

  // Update display elements
  document.getElementById("calcHours").textContent = formatWithCommas(hoursSaved);
  document.getElementById("timeValueSaved").textContent = `$${formatWithCommas(timeValueSaved.toFixed(2))}`;
  document.getElementById("totalRoi").textContent = `$${formatWithCommas(totalRoi.toFixed(2))}`;
  document.getElementById("roiAmount").textContent = formatWithCommas(totalRoi.toFixed(2));
}

// Attach event listeners to inputs
document.getElementById("hoursSaved").addEventListener("input", updateROI);
document.getElementById("hourlyRate").addEventListener("input", updateROI);

// Initial call to populate fields with default values
updateROI();


// function updateROI2() {
//   const revenueInput = parseFloat(document.getElementById("monthlyRate").value.replace(/,/g, ""));
//   const netProfitRate = parseFloat(document.getElementById("netprofit").value.replace(/,/g, "")) / 100;
//   const smugglersCost = 49; // Smugglers’ Monthly Cost

//   // Retrieve slider position to determine risk level and growth/discount rates
//   const riskLevel = parseInt(document.getElementById("hoursSaved2").value);
//   let monthlyGrowthRate, riskDiscountRate, riskLabel;

//   // Determine growth and discount rates based on risk level
//   switch (riskLevel) {
//     case 0:
//       monthlyGrowthRate = 0.002; // 0.2%
//       riskDiscountRate = 0.001;   // 0.1%
//       riskLabel = "No Risk";
//       break;
//     case 1:
//       monthlyGrowthRate = 0.004; // 0.4%
//       riskDiscountRate = 0.002;   // 0.2%
//       riskLabel = "Low Risk";
//       break;
//     case 2:
//       monthlyGrowthRate = 0.007; // 0.7%
//       riskDiscountRate = 0.003;   // 0.3%
//       riskLabel = "Low-Medium Risk";
//       break;
//     case 3:
//       monthlyGrowthRate = 0.008; // 0.8%
//       riskDiscountRate = 0.004;   // 0.4%
//       riskLabel = "Medium Risk";
//       break;
//     case 4:
//       monthlyGrowthRate = 0.009; // 0.9%
//       riskDiscountRate = 0.005;   // 0.5%
//       riskLabel = "High-Medium Risk";
//       break;
//     case 5:
//       monthlyGrowthRate = 0.010; // 1.0%
//       riskDiscountRate = 0.006;   // 0.6%
//       riskLabel = "High Risk";
//       break;
//     default:
//       monthlyGrowthRate = 0.010;
//       riskDiscountRate = 0.006;
//       riskLabel = "High Risk";
//   }

//   // Update risk label text
//   const calcTabVisiParent = document.querySelector('.calc_tab_visi[data-id="2"]');
//   calcTabVisiParent.querySelector('.hour_span').textContent = riskLabel;

//   // Calculate Effective Growth Rate for annual compounding
//   const effectiveGrowthRate = Math.pow(1 + monthlyGrowthRate, 12) - 1;

//   // Projected Revenue Increase
//   const projectedRevenueIncrease = revenueInput * (1 + effectiveGrowthRate) * netProfitRate;

//   // Apply risk discount to revenue increase
//   const discountedRevenueIncrease = projectedRevenueIncrease * (1 - riskDiscountRate);

//   // Monthly Savings Calculation
//   const monthlySavings = discountedRevenueIncrease - smugglersCost;

//   // Update display elements
//   // document.getElementById("calcHours2").textContent = `${formatWithCommas((effectiveGrowthRate * 100).toFixed(2))}%`; // Display growth %
//   document.getElementById("calcHours2").textContent = `$${formatWithCommas(projectedRevenueIncrease.toFixed(2))}`; // Display growth %
//   document.getElementById("timeValueSaved2").textContent = `$${formatWithCommas(discountedRevenueIncrease.toFixed(2))}`;
//   document.getElementById("totalRoi2").textContent = `$${formatWithCommas(monthlySavings.toFixed(2))}`;
//   document.getElementById("roiAmount2").textContent = formatWithCommas(monthlySavings.toFixed(2));
// }

// // Attach event listeners to inputs
// document.getElementById("hoursSaved2").addEventListener("input", updateROI2);
// document.getElementById("monthlyRate").addEventListener("input", updateROI2);
// document.getElementById("netprofit").addEventListener("input", updateROI2);

// // Initial call to populate fields with default values
// updateROI2();


function updateROI2() {
  const revenueInput = parseFloat(document.getElementById("monthlyRate").value.replace(/,/g, ""));
  const netProfitRate = parseFloat(document.getElementById("netprofit").value.replace(/,/g, "")) / 100;
  const smugglersCost = 49; // Smugglers’ Monthly Cost

  // Retrieve slider position to determine risk level and growth/discount rates
  const riskLevel = parseInt(document.getElementById("hoursSaved2").value);
  let riskMultiplier, C8, C9, riskLabel;

  // Determine growth and discount rates based on risk level
  switch (riskLevel) {
    case 0:
      riskMultiplier = 1.002429;
      C8 = 1.04917;
      C9 = 0.999;
      riskLabel = "No Risk";
      break;
    case 1:
      riskMultiplier = 1.004917;
      C8 = 1.07466;
      C9 = 0.998;
      riskLabel = "Low Risk";
      break;
    case 2:
      riskMultiplier = 1.007466;
      C8 = 1.10076;
      C9 = 0.997;
      riskLabel = "Low-Medium Risk";
      break;
    case 3:
      riskMultiplier = 1.010076;
      C8 = 1.1275;
      C9 = 0.996;
      riskLabel = "Medium Risk";
      break;
    case 4:
      riskMultiplier = 1.012750;
      C8 = 1.15488;
      C9 = 0.995;
      riskLabel = "High-Medium Risk";
      break;
    case 5:
      riskMultiplier = 1.015488;
      C8 = 1.18488;
      C9 = 0.994;
      riskLabel = "High Risk";
      break;
    default:
      riskMultiplier = 1.002429;
      C8 = 1.04917;
      C9 = 0.999;
      riskLabel = "No Risk";
  }

  // Update risk label text
  const calcTabVisiParent = document.querySelector('.calc_tab_visi[data-id="2"]');
  calcTabVisiParent.querySelector('.hour_span').textContent = riskLabel;

  const var_EC = revenueInput * (C8 - 1);
  const var_IP = var_EC * netProfitRate;
  const var_DF = revenueInput * (1 - C9);
  const var_TMR = Math.abs(parseFloat(var_IP) - parseFloat(var_DF) - parseFloat(smugglersCost));
  document.getElementById("roiAmount2").textContent = formatWithCommas(var_EC.toFixed(2));
  document.getElementById("calcHours2").textContent = `$${formatWithCommas(var_IP.toFixed(2))}`;
  document.getElementById("timeValueSaved2").textContent = `$${formatWithCommas(var_DF.toFixed(2))}`;
  document.getElementById("totalRoi2").textContent = `$${formatWithCommas(var_TMR.toFixed(2))}`;
}

// Attach event listeners to inputs
document.getElementById("hoursSaved2").addEventListener("input", updateROI2);
document.getElementById("monthlyRate").addEventListener("input", updateROI2);
document.getElementById("netprofit").addEventListener("input", updateROI2);

// Initial call to populate fields with default values
updateROI2();


function updateROI3() {
  // Retrieve user inputs
  const mistakesAvoided = parseInt(document.getElementById("hoursSaved3").value) + 1;  // Mistakes avoided from slider input
  // const averageEmployeeCost = parseFloat(document.getElementById("avgEmployeeCost3").value) || 0;  // Average employee monthly cost input
  const averageEmployeeCost = 0;  // Average employee monthly cost input

  const costPerMistake = 100;  // Constant
  const smugglersCost = 49;    // Constant

  // Calculate components
  const mistakesCostSaved = mistakesAvoided * costPerMistake;  // Mistakes Avoided × Cost per Mistake
  const teamEfficiencyGains = averageEmployeeCost * 0.07;      // Team Efficiency Gains = Avg Employee Cost * 7%
  
  // Calculate total ROI
  const totalRoi = (mistakesCostSaved + teamEfficiencyGains) - smugglersCost;

  // Update display elements
  document.getElementById("calcHours3").textContent = formatWithCommas(mistakesAvoided);
  document.getElementById("timeValueSaved3").textContent = `$${formatWithCommas((mistakesCostSaved + teamEfficiencyGains).toFixed(2))}`;
  document.getElementById("totalRoi3").textContent = `$${formatWithCommas(totalRoi.toFixed(2))}`;
  document.getElementById("roiAmount3").textContent = formatWithCommas(totalRoi.toFixed(2));
}

// Attach event listeners to inputs
document.getElementById("hoursSaved3").addEventListener("input", updateROI3);
// document.getElementById("avgEmployeeCost3").addEventListener("input", updateROI3);

// Initial call to populate fields with default values
updateROI3();


function updateROI4() {
  // Retrieve inputs
  const productCosts = parseFloat(document.getElementById("pexpense").value.replace(/,/g, ""));
  const nonProductCosts = parseFloat(document.getElementById("npexpense").value.replace(/,/g, ""));
  const smugglersCost = 49;

  // Retrieve slider value to determine discount rate
  const discountLevel = parseInt(document.getElementById("hoursSaved4").value);
  let D6, D7, D8, riskLabel;

  // Define discount rate based on slider position
  switch (discountLevel) {
    case 0:
      D6 = 0.95;
      D7 = 0.975;
      D8 = 0.999;
      riskLabel = 'No Discounts';
      break;
    case 1:
      D6 = 0.96;
      D7 = 0.98;
      D8 = 0.98;
      riskLabel = '2-3 Discounts';
      break;
    case 2:
      D6 = 0.965;
      D7 = 0.985;
      D8 = 0.97;
      riskLabel = '3-10 Discounts';
      break;
    case 3:
      D6 = 0.97;
      D7 = 0.99;
      D8 = 0.975;
      riskLabel = '10+ Discounts';
      break;
    default:
      D6 = 0.95;
      D7 = 0.975;
      D8 = 0.999;
      riskLabel = 'No Discounts';
  }

// Update risk label text
  const calcTabVisiParent = document.querySelector('.calc_tab_visi[data-id="4"]');
  calcTabVisiParent.querySelector('.hour_span').textContent = riskLabel;
  
  const var_EC = productCosts * (1 - D6) + nonProductCosts * (1 - D7);
  const var_IP = var_EC * 0.985;
  const var_DF = productCosts * (1 - D8);
  const var_TMR = Math.abs(parseFloat(var_IP) - parseFloat(var_DF));

  document.getElementById("calcHours4").textContent = `$${formatWithCommas((var_IP).toFixed(2))}`;
  document.getElementById("timeValueSaved4").textContent = `$${formatWithCommas(var_DF.toFixed(2))}`;
  document.getElementById("totalRoi4").textContent = `$${formatWithCommas(var_TMR.toFixed(2))}`;
  document.getElementById("roiAmount4").textContent = formatWithCommas(var_EC.toFixed(2));
}

// Attach event listeners
document.getElementById("hoursSaved4").addEventListener("input", updateROI4);
document.getElementById("pexpense").addEventListener("input", updateROI4);
document.getElementById("npexpense").addEventListener("input", updateROI4);

// Initial call
updateROI4();

function formatWithCommas(number) {
  return new Intl.NumberFormat().format(number);
}

        // Range Input
function SliderFun(ele) {
  for (let i = 0; i < ele.length; i++) {
    let element = ele[i];

    let values = element.value;
    let dataValue = element.getAttribute("max");
    let calcTabVisi = element.closest('.calc_tab_visi');
    const calcTabVisiDataId = element.closest('.calc_tab_visi').getAttribute('data-id');
    let fullValue = Math.round((values * 100) / dataValue);
    let fullValue_get = '';
    if(calcTabVisiDataId == 1){
    fullValue_get = parseInt(fullValue)
    if(values >= 1){
      fullValue_get = parseInt(fullValue) + parseInt(1)
    }
    if(values >= 4){
      fullValue_get = parseInt(fullValue)
    }
    if(values >= 6){
      fullValue_get = parseInt(fullValue) - parseInt(3)
    }
    if(values >= 9){
      fullValue_get = parseInt(fullValue)
    }
    if(values >= 10){
      fullValue_get = parseInt(fullValue) + parseInt(1)
    }
    if(values >= 13){
      fullValue_get = parseInt(fullValue)
    }
    if(values >= 15){
      fullValue_get = parseInt(fullValue) - parseInt(3)
    }
    if(values >= 19){
      fullValue_get = parseInt(fullValue)
    }
    calcTabVisi.querySelector('.hour_span').textContent = parseInt(values) + parseInt(1);
    }
    else if(calcTabVisiDataId == 2){
    if(values == 0){
    fullValue_get = parseInt(fullValue)
    }
    if(values >= 1){
      fullValue_get = parseInt(fullValue) - parseInt(6)
    }
    if(values >= 4){
      fullValue_get = parseInt(fullValue)
    }
    }
    else if(calcTabVisiDataId == 3){
    fullValue_get = parseInt(fullValue)
    if(values >= 1){
      fullValue_get = parseInt(fullValue) + parseInt(1)
    }
    if(values >= 4){
      fullValue_get = parseInt(fullValue)
    }
    if(values >= 6){
      fullValue_get = parseInt(fullValue) - parseInt(3)
    }
    if(values >= 9){
      fullValue_get = parseInt(fullValue)
    }
    if(values >= 10){
      fullValue_get = parseInt(fullValue) + parseInt(1)
    }
    if(values >= 13){
      fullValue_get = parseInt(fullValue)
    }
    if(values >= 15){
      fullValue_get = parseInt(fullValue) - parseInt(3)
    }
    if(values >= 19){
      fullValue_get = parseInt(fullValue)
    }
    calcTabVisi.querySelector('.hour_span').textContent = parseInt(values) + parseInt(1);
    }
    else if(calcTabVisiDataId == 4){
    fullValue_get = parseInt(fullValue)
    if(values >= 3){
      fullValue_get = parseInt(fullValue) - parseInt(2)
    }
    }
    else{
    calcTabVisi.querySelector('.hour_span').textContent = parseInt(values) + parseInt(1);
    }
    element.nextSibling.parentNode.querySelector(".active-line").style.width =
      fullValue_get + "%";
    if (element.nextSibling.parentNode.querySelector(".active-dot")) {
      element.nextSibling.parentNode.querySelector(".active-dot").style.left =
        fullValue_get + "%";
    }
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

<script>
     // Select all inputs with the class 'numberInput'
    const numberInputs = document.querySelectorAll('.numberInput');

    numberInputs.forEach(input => {
        input.addEventListener('input', () => {
            // Remove non-numeric characters
            let value = input.value.replace(/[^0-9]/g, '');

            // Format the number with commas
            value = new Intl.NumberFormat('en-US').format(value);

            // Set the formatted value back to the input
            input.value = value;
        });
    });
</script>

</html>
@endsection

