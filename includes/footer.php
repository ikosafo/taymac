<!-- Our Footer -->
<section class="footer_one home3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pr0 pl0">
                <div class="footer_about_widget home3">
                    <h4>Location</h4>
                    <p>
                        GROUND FLOOR LE PIERRE, 14 CHOICE CLOSE OFF SENCHI STREET <br/>
                        AIRPORT RESIDENTIAL AREA, ACCRA
                    </p>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_contact_widget home3">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa fa-envelope-open-o"></i> P.O. BOX AN 7310, ACCRA - NORTH</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i> +233 (0) 245-710-614</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> info@taymac.net</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_social_widget home3">
                    <h4>Follow us</h4>
                    <ul class="mb30">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                    </ul>
                    <p>
                        Follow us on our social media links
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_social_widget home3">
                    <h4>Subscribe</h4>
                    <form class="footer_mailchimp_form home3">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Your email">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                    <p>
                        Get the most recent updates from our site
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Footer Bottom Area -->
<section class="footer_middle_area home3 pt30 pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="copyright-widget home3 text-right">
                    <p>&copy; 2020 Taymac</p>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="scrollToHome home8" href="#"><i class="flaticon-arrows"></i></a>
</div>
<!-- Wrapper End -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="assets/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/isotop.js"></script>
<script type="text/javascript" src="assets/js/snackbar.min.js"></script>
<script type="text/javascript" src="assets/js/simplebar.js"></script>
<script type="text/javascript" src="assets/js/parallax.js"></script>
<script type="text/javascript" src="assets/js/scrollto.js"></script>
<script type="text/javascript" src="assets/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/progressbar.js"></script>
<script type="text/javascript" src="assets/js/slider.js"></script>
<script type="text/javascript" src="assets/js/timepicker.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCmkDpS9DDEV73V2YT1OeOK4tA-HcSxDQ"type="text/javascript"></script>
<script type="text/javascript" src="assets/js/google-maps.js"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="assets/js/script.js"></script>
<script>
    var bsCarouselItems = 1;
    if($('.bs_carousel .carousel-item').length){
        $('.bs_carousel .carousel-item').each(function(index, element) {
            if (index == 0) {
                $('.bs_carousel_prices').addClass('pprty-price-active pprty-first-time');
            }
            $('.bs_carousel_prices .property-carousel-ticker-counter').append('<span>0' + bsCarouselItems + '</span>');
            bsCarouselItems += 1;
        });
    }

    $('.bs_carousel_prices .property-carousel-ticker-total').append('<span>0' + $('.bs_carousel .carousel-item').length + '</span>');

    if($('.bs_carousel').length){
        $('.bs_carousel').on('slide.bs.carousel', function(carousel) {
            $('.bs_carousel_prices').removeClass('pprty-first-time');
            $('.bs_carousel_prices').carousel(carousel.to);
        });
    }

    if($('.bs_carousel').length){
        $('.bs_carousel').on('slid.bs.carousel', function(carousel) {
            var tickerPos = (carousel.to) * 25;
            $('.bs_carousel_prices .property-carousel-ticker-counter > span').css('transform', 'translateY(-' + tickerPos + 'px)');
        });
    }

    if($('.bs_carousel .property-carousel-control-next').length){
        $('.bs_carousel .property-carousel-control-next').on('click',function(e) {
            $('.bs_carousel').carousel('next');
        });
    }

    if($('.bs_carousel .property-carousel-control-prev').length){
        $('.bs_carousel .property-carousel-control-prev').on('click',function(e) {
            $('.bs_carousel').carousel('prev');
        });
    }
    if($('.bs_carousel').length){
        $('.bs_carousel').carousel({
            interval: 6000,
            pause: "true"
        });
    }
</script>
</body>


</html>