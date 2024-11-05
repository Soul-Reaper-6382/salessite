@guest
    <div id="price" class="feature-icon-wrapper section-space--ptb_60">
                    <div class="container-md p-0">

                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center">
                                    <h3 class="heading">Pricing</h3>
                                    <div class="parent_tabs_price">
                                    <ul class="tabs_price" style="position:relative;">
                                    <span style="    position: absolute;
    right: 10px;
    top: 40px;
    background: #df9242;
    border-radius: 100px;
    color: white;
    padding: 2px 10px 2px 10px;
    font-size: 14px;
    font-weight: bold;">save 40%+</span>
                                    <li class="tab_price" data-name="monthly"><label class="active">Monthly</label></li>
                                    <li class="tab_price" data-name="Yearly"><label>Yearly</label></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row sec-6-row-bg sec-price g-0">
@foreach($plan_db as $plan)
    <div class="col-md-3 price_main_column" data-dur="{{ $plan->duration }}">
        <div class="price-wrap">
            <div class="price-inner">
                <h3>{{ $plan->name }}</h3>
                <div class="price-list-num">
                    @php
                        $monthlyPrice = ($loop->iteration > 4) ? round($plan->price / 12) : $plan->price;
                        $numLength = strlen((string)$monthlyPrice);
                        $curNumClass = ($numLength == 2) ? 'cur-num cr1' : 'cur-num';
                    @endphp
                    <span class="{{ $curNumClass }}">$</span>
                    <span class="price-num">{{ $monthlyPrice }}</span>
                    <span class="lst-month">/Month</span>
                </div>

                <h2 style="display: none;">
                    <div class="sh-contents-plan">
                        @if($loop->iteration == 1 || $loop->iteration == 5)
                            <span class=" free-month"> Start  1 month free</span>  
                        @endif
                        <span class="curn">$</span>
                        <span class="over-lin"> {{ $monthlyPrice }} </span>
                        <span class="time">/Month</span>
                    </div>
                </h2>

                <div class="list-price-dis">
                    <ul>
                        <li class="gry" style="display:none;">Tools & Management 
                <div class="contentp" >     <ul class="gry">         <li style="list-style-type: none;">             <ol>                 <li>Stock, Sales, Purchases  Deals Management</li>                 <li>Employee Scheduling  Tasks</li>                 <li>Marketing, Surveys and Brand Development</li>                 <li>Website, Delivery, Pick-up, Subscriptions  Events</li>                 <li>Chat, Reporting, Preferences  More</li>             </ol>         </li>     </ul> </div>
                </li>
                @foreach($plan->keys as $key)
                <li>
                    @if ($key->video_url)
                        <span class="{{ $key->given == 'no' ? 'gry' : $key->given }}" 
                              data-url="{{ asset($key->video_url) }}" 
                              onclick="showVideoModal(this)" style="cursor: pointer;">{{ $key->key_name }}</span>
                    @else
                        <span class="{{ $key->given == 'no' ? 'gry' : $key->given }}" title="Video not available">{{ $key->key_name }}</span>
                    @endif
                </li>
            @endforeach
                    </ul>
                </div>

                <a href="javascript:void(0);" class="click_reg_a"
                 @if($plan->name == 'Manage')
                    style="background: #2f3f58; color: white; border: 1px solid #2f3f58;"
                    @endif
                data-id="{{ $plan->stripe_plan }}">Get Started</a>
                <!-- <button class="learn-more">Learn More</button> -->
            </div>
        </div>
    </div>
@endforeach

    </div>

    <div class="row pat-design">
      <img src="{{ asset('pat.png') }}" alt="">
    </div>
                    </div>
                </div>
@else
@if(Auth::user()->stripe_id == null)
@include('plan_change_start')
@else
@include('plan_change_dash')
@endif
@endguest