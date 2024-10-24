    <div class="feature-icon-wrapper ">
                    <div class="container-md">
                       <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center">
                                    <!-- <h3 class="heading">Pricing</h3> -->
                                    <div class="parent_tabs_price">
                                    <ul class="tabs_price">
                                    <li class="tab_price" data-name="monthly"><label class="active">Monthly</label></li>
                                    <li class="tab_price" data-name="Yearly"><label>Yearly</label></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row sec-6-row-bg sec-price">
@foreach($plan_db as $plan)
      <div class="col-md-3 price_main_column" data-dur="{{ $plan->duration }}">
        <div class="price-wrap">
          <div class="price-inner">
            <h5>{{ $plan->name }}
            </h5>
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
           <a href="javascript:void(0);" class="click_change_plan" data-id="{{ $plan->id }}" >Select Plan</a>

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