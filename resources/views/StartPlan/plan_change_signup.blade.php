<style>
    .price-wrap {
    background: transparent;
    padding: 0;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }
    .price-wrap:hover{
/*        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);*/
    }
    .price_main_column.dis_cls .price-wrap {
/*        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);*/
        position: relative;
    }
    .price_main_column.dis_cls .price-wrap::before {
    content: "✔";
    position: absolute;
    top: 3px;
    left: 5px;
    width: 15px;
    height: 15px;
    background: #28a745;
    color: white;
    font-size: 10px;
    text-align: center;
    line-height: 15px;
    border-radius: 100px;
    font-weight: bold;
    z-index: 9;
}
    .price-inner {
    padding: 5px 0px 5px 0px;
    }
    .price-inner h3{
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    span.price-num{
        font-size: 15px;
    }
    span.cur-num{
    left: -45px;
    font-size: 15px;
    top: 20px;
    }

    span.cur-num.cr1 {
    left: -40px;
    font-size: 15px;
    top: 20px;
    }
    em{
    font-size: 12px;
    font-weight: 600;
    }
    span.lst-month {
    font-weight: 400;
    }
    .box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}

.ribbon {
  width: 100%;
  height: 50px;
  overflow: hidden;
  position: absolute;
  top: -20px;
  left: 0px;
  border-radius: 10px;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 100%;
  padding: 3px 0;
  background-color: #2f3f58;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  /* font: 700 18px/1 'Lato', sans-serif; */
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
  font-weight: 600;
  font-size: 12px;
}
.price-inner {
    background: radial-gradient(circle at 10% 20%, rgb(255, 255, 255) 0%, #e3ecf5 100.7%);
    cursor: pointer;
}
.dis_cls .price-inner {
    background: radial-gradient(circle at 10% 20%, rgb(255, 255, 255) 0%, #e3ecf5 100.7%);
    border: 2px solid #2f3f58;
}
.price-inner:hover{
    background: radial-gradient(circle at 10% 20%, rgb(255, 255, 255) 0%, #e3ecf5 100.7%);
    border: 2px solid #2f3f58;
}
.tab_price>label{
    padding: 7px 25px 5px;
    font-size: 12px;
}
.tabs_price{
    border: 1px solid #ccc;
}
.price-list-num{
    margin-bottom: 0px;
}
</style>
    <div class="feature-icon-wrapper mb-3">
                    <div class="container-md">
                       <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center">
                                    <!-- <h3 class="heading">Pricing</h3> -->
                                    <div class="parent_tabs_price">
                                    <ul class="tabs_price" style="position:relative;">
                                        <span style="position: absolute;
    right: 5px;
    top: 25px;
    background: #df9242;
    border-radius: 100px;
    color: white;
    padding: 2px 6px 2px 6px;
    font-size: 12px;
    font-weight: 600;">save 40%+</span>
                                    <li class="tab_price" data-name="monthly"><label class="active">Monthly</label></li>
                                    <li class="tab_price" data-name="yearly"><label>Yearly</label></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row sec-6-row-bg">
@foreach($plan_db as $plan)
@if(Auth()->user()->plan_id == $plan->id)
     @php
            $disable = 'dis_cls';
            $actionClass = '';
    @endphp
@else
    @php
            $disable = '';
            $actionClass = 'click_change_plan';
    @endphp
@endif
      <div class="col-md-3 price_main_column {{ $disable }}" data-dur="{{ $plan->duration }}">
        <div class="price-wrap">
          <div class="price-inner {{ $actionClass }}" data-oid="{{ $plan->id }}" data-id="{{ $plan->stripe_plan }}" style="position:relative;">
            @if($plan->name == 'Manage')
     <!-- <div class="ribbon"><span>Recommended</span></div> -->
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
                    <span class="price-num">{{ $monthlyPrice }} <em>/Month</em></span>
                    <span class="lst-month"></span>
                </div>
          </div>
        </div>
      </div>
@endforeach
    </div>
                    </div>
                </div>