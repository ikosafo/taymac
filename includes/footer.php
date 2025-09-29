<?php 
require_once 'config.php';


// Fetch footer data from ws_contact
$query = "SELECT logo, phone1, email, address FROM ws_contact WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch footer query failed: ' . $mysqli->error);
    $footer = [
        'logo' => 'assets/images/taymac.png',
        'phone1' => '+233 (0) 245-710-614',
        'email' => 'info@taymac.net',
        'address' => '3rd Floor Le Pierre, 51 Choice Close off Senchi Street, Airport Residential Area, Accra'
    ];
} else {
    $footer = $result->fetch_assoc();
    if (!$footer) {
        $footer = [
            'logo' => 'assets/images/taymac.png',
            'phone1' => '+233 (0) 245-710-614',
            'email' => 'info@taymac.net',
            'address' => '3rd Floor Le Pierre, 51 Choice Close off Senchi Street, Airport Residential Area, Accra'
        ];
    }
}
error_log('Fetched footer data: ' . print_r($footer, true));
?>

<!-- Start Footer -->
<footer class="main-footer">
        <div class="container pt-4">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 py-3 py-md-5 pe-xl-5">
                    <div class="footer-about">
                        <div class="mb-3 d-inline-block">
                            <img src="<?php echo URLROOT . htmlspecialchars($footer['logo']); ?>" alt="Taymac Logo" height="60">
                        </div>
                        <a class="d-block fw-medium mb-1" href="tel:<?php echo htmlspecialchars($footer['phone1']); ?>">
                            <i class="fa-solid fa-phone me-2"></i>
                            <span><?php echo htmlspecialchars($footer['phone1']); ?></span>
                        </a>
                        <a class="email-link d-block mb-1 fw-medium" href="mailto:<?php echo htmlspecialchars($footer['email']); ?>">
                            <i class="fa-solid fa-envelope me-2"></i>
                            <span><?php echo htmlspecialchars($footer['email']); ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 py-3 py-md-5 pe-xl-5">
                    <div class="footer-about">
                        <a class="d-block fw-medium mt-4">
                            <i class="fa-solid fa-map-marker"></i>
                            <span><?php echo nl2br(htmlspecialchars($footer['address'])); ?></span>
                        </a>
                    </div>
                </div>
                
                <div class="col-6 col-sm-4 col-md-4 col-lg col-xl-4 py-3 py-md-5">
                    <h3 class="fs-20 fw-semibold link-title mb-3 position-relative">Connect with us</h3>
                    <!-- Start Social Icon -->
                    <ul class="list-unstyled social-icon">
                        <li>
                            <a href="#" class="align-items-center d-flex">
                                <div class="align-items-center bg-primary d-flex d-inline-block fs-19 icon-wrap justify-content-center me-3 rounded-2 text-center text-white inst"><i class="fab fa-instagram"></i></div>Instagram
                            </a>
                        </li>
                        <li>
                            <a href="#" class="align-items-center d-flex">
                                <div class="align-items-center bg-primary d-flex d-inline-block fs-19 icon-wrap justify-content-center me-3 rounded-2 text-center text-white twi"><i class="fab fa-twitter"></i></div>Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="align-items-center d-flex">
                                <div class="align-items-center bg-primary d-flex d-inline-block fs-19 icon-wrap justify-content-center me-3 rounded-2 text-center text-white fb"><i class="fab fa-facebook-f"></i></div>Facebook
                            </a>
                        </li>
                    </ul>
                    <!-- /.End Social Icon -->
                </div>
            </div>
            <hr class="mb-0 mt-4">
            <div class="py-4">
                <div class="align-items-center row mb-2">
                    <!-- Start Copy Rights Text -->
                    <div class="col-sm-auto copy">&copy; <?= date('Y'); ?> Taymac</div>
                    <!-- /.End Copy Rights Text -->
                </div>
            </div>
        </div>
    </footer>
    <!-- /.End Footer -->
    <!-- Optional JavaScript -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo URLROOT ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/smartmenus/jquery.smartmenus.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/smartmenus/jquery.smartmenus.bootstrap-4.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/select2/select2.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/OwlCarousel2/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/counter-up/jquery.counterup.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/simple-parallax/simpleParallax.min.js"></script>
    <script src="<?php echo URLROOT ?>assets/plugins/aos/aos.min.js"></script>
    <!-- Custom Script For This Template -->
    <script src="<?php echo URLROOT ?>assets/js/script.js"></script>
</body>
</html>