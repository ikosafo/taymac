<?php require('inc/header.php'); ?>
<!-- End Navbar -->
<!-- Contact Us -->
<section class="section-map">
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d800.0834708711124!2d-0.1769734708506934!3d5.612863034420757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9b1ac01d9079%3A0xfee557f23e5c8842!2sFidelity%20Bank%20ATM%20-%20Airport!5e1!3m2!1sen!2sgh!4v1570285500088!5m2!1sen!2sgh"
                    width="1270" height="355" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</section>
<!-- End Contact Us -->
<!-- Contact Me -->
<section class="section-padding  bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 contact-us">
                <div class="section-title">
                    <h2 class="mt-1 mb-5">Get In Touch</h2>
                </div>
                <h6 class="text-dark"><i class="mdi mdi-home-map-marker"></i> Address :</h6>
                <p>Ground Floor Le Pierre, 14 Choice Close Off Senchi Street Airport Residential Area, Accra</p>
                <h6 class="text-dark"><i class="mdi mdi-phone"></i> Phone :</h6>
                <p>+233 (0) 245-710-614</p>
                <h6 class="text-dark"><i class="mdi mdi-deskphone"></i> Mobile :</h6>
                <p>+233 (0) 302-789-025</p>
                <h6 class="text-dark"><i class="mdi mdi-email"></i> Email :</h6>
                <p>info@taymac.net</p>
                <h6 class="text-dark"><i class="mdi mdi-link"></i> Website :</h6>
                <p>www.taymac.net</p>
            </div>
            <form class="col-lg-8 col-md-8" name="sentMessage" id="contactForm" novalidate>
                <div class="section-title">
                    <h2 class="mt-1 mb-5">Contact Us</h2>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Full Name" class="form-control" id="name" required
                               data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="control-group form-group col-md-6">
                        <label>Phone Number <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="tel" placeholder="Phone Number" class="form-control" id="phone" required
                                   data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group col-md-6">
                        <div class="controls">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="email" placeholder="Email Address" class="form-control" id="email" required
                                   data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message <span class="text-danger">*</span></label>
                        <textarea rows="4" cols="100" placeholder="Message" class="form-control" id="message" required
                                  data-validation-required-message="Please enter your message"
                                  maxlength="999"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-secondary btn-lg">Send Message</button>
            </form>
        </div>
    </div>
</section>
<!-- End Contact Me -->


<?php require('inc/footer.php'); ?>

