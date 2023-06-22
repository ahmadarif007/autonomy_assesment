<!DOCTYPE html>
<html>
    @include('frontend.includes.head')
    <body>
        <div class="page-wrapper">
            <div class="background" style="background-image: url(assets/images/demos/demo-24/slider/back-1.jpg);">
                <header class="header">
                    @include('frontend.includes.header')
                </header><!-- End .header -->
            </div>
            @yield('mainContent')

            <footer class="footer mt-3">
                @include('frontend.includes.footer')
            </footer>
        </div>

        <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

        <div class="mobile-menu-overlay">
        </div><!-- End .mobil-menu-overlay -->
        <div class="mobile-menu-container mobile-menu-light">
            @include('frontend.includes.mobileMenu')
        </div><!-- End .mobile-menu-container -->

        <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
            @include('frontend.includes.popup')
        </div>
        
        @include('frontend.includes.script')
    </body>
</html>