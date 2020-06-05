<!-- Footer -->
<section class="section-padding footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <h6 class="mb-4">LOCATION</h6>
                <p>GROUND FLOOR LE PIERRE, 14 CHOICE CLOSE OFF SENCHI STREET<br>AIRPORT RESIDENTIAL AREA, ACCRA</p>
            </div>
            <div class="col-lg-3 col-md-3">
                <h6 class="mb-4">CONTACT US</h6>
                <p class="mb-0"><a class="text-warning" href="#"><i class="mdi mdi-contact-mail"></i> P.O. BOX AN 7310,
                        ACCRA - NORTH</a></p>
                <p class="mb-0"><a class="text-warning" href="#"><i class="mdi mdi-phone"></i> +233 (0) 245-710-614</a>
                </p>
                <p class="mb-0"><a class="text-success" href="#"><i class="mdi mdi-email"></i> info@taymac.net</a>
                </p>
                <p class="mb-0"><a class="text-secondary" href="#"><i class="mdi mdi-earth"></i> www.taymac.net</a></p>
            </div>

            <div class="col-lg-3 col-md-3">
                <h6 class="mb-4">NEWSLETTER</h6>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email Address">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button"><i class="mdi mdi-arrow-right"></i></button>
                    </div>
                </div>
                <p class="text-info newsletter-info"><i class="mdi mdi-email-variant"></i> Get the most recent updates
                    from our site </p>
            </div>

            <div class="col-lg-3 col-md-3">
                <h6 class="mb-4">GET IN TOUCH</h6>
                <div class="footer-social">
                    <a class="btn-facebook" href="#"><i class="mdi mdi-facebook"></i></a>
                    <a class="btn-twitter" href="#"><i class="mdi mdi-twitter"></i></a>
                    <a class="btn-instagram" href="#"><i class="mdi mdi-instagram"></i></a>
                    <a class="btn-whatsapp" href="#"><i class="mdi mdi-whatsapp"></i></a>
                    <a class="btn-messenger" href="#"><i class="mdi mdi-facebook-messenger"></i></a>
                    <a class="btn-google" href="#"><i class="mdi mdi-google"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Footer -->
<!-- Copyright -->
<div class="pt-4 pb-4 text-center footer-bottom">
    <p class="mt-0 mb-0">&copy; Copyright <?php echo date('Y') ?> <strong>Taymac</strong>.
        All Rights Reserved</p>
</div>
<!-- End Copyright -->
<!-- Bootstrap core JavaScript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Contact form JavaScript -->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<script src="assets/js/jqBootstrapValidation.js"></script>
<script src="assets/js/contact_me.js"></script>
<!-- select2 Js -->
<script src="assets/vendor/select2/js/select2.min.js"></script>
<!-- Custom -->
<script src="assets/js/custom.js"></script>
<script async src="assets/https://www.googletagmanager.com/gtag/js?id=UA-120909275-1"></script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-120909275-1');
</script>

<script>
    window.purechatApi = {
        l: [], t: [], on: function () {
            this.l.push(arguments);
        }
    };
    (function () {
        var done = false;
        var script = document.createElement('script');
        script.async = true;
        script.type = 'text/javascript';
        script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';
        document.getElementsByTagName('HEAD').item(0).appendChild(script);
        script.onreadystatechange = script.onload = function (e) {
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                var w = new PCWidget({c: 'd252ec46-660a-4444-bbb1-4cc325e2569c', f: true});
                done = true;
            }
        };
    })();</script>

<script>
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>

</body>


</html>
