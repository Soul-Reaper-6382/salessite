@extends('layouts.app')
@section('title', 'All Integration - Smugglers')
@section('content')
<style type="text/css">
    .ht-box-icon.style-01 .icon-box-wrap .icon {
    height: auto;
    text-align: center;
    width: 100%;
    margin: auto;
     margin-bottom: 0px; 
    color: #086AD8;
}
.button-text{
    color: #df9242;
}
.ht-box-icon.style-01 .icon-box-wrap{
    padding: 10px 10px 10px 10px;
}

.close-button_form {
  float: right;
  width: 1rem;
  font-size: 1em;
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
</style>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="bg-white">


                    <div class="tabs-wrapper section-space--ptb_60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper text-center section-space--mb_60 wow move-up animated">
                    <h6 class="section-sub-title mb-20">All Integrations</h6>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ht-tab-wrap">
                <div class="row">
                    <div class="col-12 text-center wow move-up animated">
                        <ul class="nav justify-content-center ht-tab-menu" role="tablist">
                            @foreach($categories as $key => $category)
                                <li class="tab__item nav-item {{ $key == 0 ? 'active' : '' }}" role="presentation">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="nav-tab{{ $key }}" data-bs-toggle="tab" href="#category-tab{{ $key }}" role="tab" aria-selected="false">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tab-content ht-tab__content wow move-up animated">
                    @foreach($categories as $key => $category)
                        <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}" id="category-tab{{ $key }}" role="tabpanel" aria-labelledby="nav-tab{{ $key }}">
                            <div class="tab-history-wrap section-space--mt_30">
                                <div class="row">
                                    @if($category->integrations->count() > 0)
                                        <div class="col-12">
                                            <div class="feature-list__one">
                                                <div class="row">
                                                    @foreach($category->integrations as $integration)
                                                    <div class="col-lg-3 col-md-4 wow move-up animated">
                                                        <!-- ht-box-icon Start -->
                                                        <div class="ht-box-icon style-01 single-svg-icon-box">
                                                            <div class="icon-box-wrap">
                                                                <div class="icon">
                                                                    <img src="{{ url($integration->image) }}" class="img-fluid">
                                                                </div>
                                                                <div class="content">
                                                                    <h6 class="heading mt-3">{{ \Illuminate\Support\Str::limit($integration->heading, 20) }}</h6>
                                                                    <div class="text">{{ \Illuminate\Support\Str::limit($integration->text, 20) }}</div>
                                                                    <div class="feature-btn">
                                                                        <a href="javascript:void(0)" class="learn-more-btn mt-1" data-integration='@json($integration)'>
                                                                            <span class="button-text">Learn more</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ht-box-icon End -->
                                                    </div>
                                                @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>No integrations found in this category.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


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








<!-- Modal -->
<div class="modal fade" id="learnMoreModal" tabindex="-1" aria-labelledby="learnMoreModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content" style="border: 2px solid #df9242;">
      <div class="modal-header" style="border:none;">
        <button type="button" class="btn-close close-button_form" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="integrationImage" src="" class="img-fluid mb-3" alt="Integration Image">
        <h5 class="heading" id="integrationHeading"></h5>
        <p id="integrationDescription"></p>
      </div>
    </div>
  </div>
</div>




@include('layouts.footer_home')

<script>
    function showIntegrationDetails(integration) {
        // Set the modal data with integration details
        $('#integrationImage').attr('src', integration.image);
        $('#integrationHeading').text(integration.heading);
        $('#integrationDescription').text(integration.text);

        // Show the modal
        $('#learnMoreModal').modal('show');
    }

    // Example of using this function
    $(document).on('click', '.learn-more-btn', function() {
        const integration = $(this).data('integration');

        // Call the function to display the modal with the selected integration details
        showIntegrationDetails(integration);
    });
</script>


<script type="text/javascript">

    $(document).ready(function() {

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


   

   
});
</script>
<!-- Mirrored from htmldemo.net/mitech/index-cybersecurity.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jul 2023 20:59:07 GMT -->
</html>
@endsection

