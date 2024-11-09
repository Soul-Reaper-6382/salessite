<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <video id="modalVideo" width="100%" height="auto" controls>
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showVideoModal(element) {
    var videoUrl = element.getAttribute('data-url');
        if (videoUrl) {

    // Set the video source in the modal
    var videoElement = document.getElementById('modalVideo');
    videoElement.src = videoUrl;
    videoElement.autoplay = true;
    videoElement.loop = true;
    videoElement.controls = false;


    // Show the modal
    var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
    videoModal.show();

    
    // When modal is hidden, stop the video
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        videoElement.pause();
        videoElement.currentTime = 0;
    }, { once: true });
    }
}

</script>
</div>
    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fas fa-chevron-up"></i>
        <i class="arrow-bottom fas fa-chevron-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->

    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.html">
                                    <img src="logo.png" class="img-fluid" alt="Smuggler" style="max-width: 90px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-end">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                     @guest
                    <ul>
                        <li class="">
                            <a href="{{ url('home') }}">Home</a></li>
                            <li class="">
                            <a href="{{ url('pricing') }}">Pricing</a></li>
                            <li class="">
                            <a href="{{ url('about-us') }}">About Us</a></li>
                            <li class="">
                            <a href="{{ route('login') }}">Log in</a></li>
                            <li class="">
                                                         <a href="{{ route('register') }}" class="ht-btn ht-btn-md btn-blue custom_header_btn">Try smugglers for free</a>
                                                        </li>
                                                        <li class="">
                                                         <a href="javascript:void(0);" class="ht-btn ht-btn-md btn-blue custom_header_btn click_all_learnmore">Learn more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                                                        </li>
                                </ul>
                    @else
                    <ul>
                        <li class="">
                        <a href="{{ url('home') }}">Home</a></li>
                        <li class="">
                            <a href="{{ url('pricing') }}">Pricing</a></li>
                            <li class="">
                            <a href="{{ url('about-us') }}">About Us</a></li>
                                                        <li class="">
                                                            @if(Auth::user()->roles->first()->name == 'admin')
                                                            <a href="{{ url('admin') }}">Goto Adminpanel</a>
                                                            @else
                                                            <a href="{{ url('dashboard') }}">Goto Dasboard</a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                    @endguest
                </nav>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->







    <!--====================  search overlay ====================-->
    <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 ms-auto col-4">
                        <!-- search content -->
                        <div class="search-content text-end">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <form action="#">
                        <input type="text" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of search overlay  ====================-->








    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->

    <script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>