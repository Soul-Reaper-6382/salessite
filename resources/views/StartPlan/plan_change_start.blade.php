<style>
    .box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}

/* common */
.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid #2980b9;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 250px;
  padding: 5px 0;
  background-color: #2f3f58;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  /* font: 700 18px/1 'Lato', sans-serif; */
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
  font-weight: 600;
  font-size: 16px;
}

/* top right*/
.ribbon-top-right {
  top: -10px;
  right: -10px;
}
.ribbon-top-right::before,
.ribbon-top-right::after {
  border-top-color: transparent;
  border-right-color: transparent;
}
.ribbon-top-right::before {
  top: 0;
  left: 0;
}
.ribbon-top-right::after {
  bottom: 0;
  right: 0;
}
.ribbon-top-right span {
  left: -25px;
  top: 30px;
  transform: rotate(45deg);
}
</style>
    <div class="feature-icon-wrapper ">
                    <div class="container-md">
                       <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center">
                                    <!-- <h3 class="heading">Pricing</h3> -->
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
                                    <li class="tab_price" data-name="yearly"><label>Yearly</label></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row sec-6-row-bg sec-price">
@foreach($plan_db as $plan)
@if(Auth()->user()->plan_id == $plan->id)
     @php
            $disable = 'dis_cls';
            $actionText = 'Selected';
            $actionClass = '';
    @endphp
@else
    @php
            $disable = '';
            $actionText = 'Select Plan';
            $actionClass = 'click_change_plan';
    @endphp
@endif
      <div class="col-md-3 price_main_column {{ $disable }}" data-dur="{{ $plan->duration }}">
        <div class="price-wrap">
          <div class="price-inner" style="position:relative;">
            @if($plan->name == 'Manage')
     <div class="ribbon ribbon-top-right"><span>Recommended</span></div>
                    @endif
            <h3>{{ $plan->name }}
            </h3>
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
           <a href="javascript:void(0);" class="{{ $actionClass }}" data-id="{{ $plan->id }}" >{{ $actionText }}</a>

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