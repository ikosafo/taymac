<?php include "includes/header.php"; ?>

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb" style="height: 10% !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                        <h3 class="breadcrumb_title">Contact</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Our Contact -->
    <section class="our-contact pb0 bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-8">
                    <div class="form_grid">
                        <h4 class="mb5">Get in touch with us</h4>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_name" name="form_name" class="form-control"
                                               required="required" type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_email" name="form_email" class="form-control
                                        required email" required="required" type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_phone" name="form_phone" class="form-control
                                        required phone" required="required" type="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_subject" name="form_subject" class="form-control
                                        required" required="required" type="text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="form_message" class="form-control required"
                                                  rows="8" required="required" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="form-group mb0">
                                        <button type="button" class="btn btn-lg btn-thm" id="savemessage">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="contact_localtion">
                        <h4>Contact Us</h4>

                        <?php $getcontact = $mysqli->query("select * from taymac_contact LIMIT 1");
                              $rescontact = $getcontact->fetch_assoc();
                        ?>

                        <div class="content_list">
                            <h5><i class="fa fa-map-marker"></i> Address</h5>
                            <p>
                                <?php echo $rescontact['address'] ?>
                            </p>
                        </div>
                        <div class="content_list">
                            <h5><i class="fa fa-phone"></i> Phone</h5>
                            <p>
                                <?php echo $rescontact['phone'] ?>
                            </p>
                        </div>
                        <div class="content_list">
                            <h5><i class="fa fa-mobile-phone"></i> Mobile</h5>
                            <p>
                                <?php echo $rescontact['mobile'] ?>
                            </p>
                        </div>
                        <div class="content_list">
                            <h5><i class="fa fa-envelope-open-o"></i> Mail</h5>
                            <p><a href="#">
                                    <?php echo $rescontact['email'] ?>
                                </a>
                            </p>
                        </div>
                        <div class="content_list">
                            <h5><i class="fa fa-globe"></i> Website</h5>
                            <p>www.taymac.net</p>
                        </div>
                       <!-- <h5>Follow Us</h5>
                        <ul class="contact_form_social_area">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p0 mt50">
            <div class="row">
                <div class="col-lg-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3217.8372837019488!2d-0.17655346556275306!3d5.6133319779001845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfee557f23e5c8842!2sFidelity%20Bank%20ATM%20-%20Airport!5e0!3m2!1sen!2sgh!4v1591198622359!5m2!1sen!2sgh"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </section>

<?php include "includes/footer.php"; ?>

<script>

    $("#savemessage").click(function () {
        var form_name = $("#form_name").val();
        var form_email = $("#form_email").val();
        var form_phone = $("#form_phone").val();
        var form_subject = $("#form_subject").val();
        var form_message = $("#form_message").val();

        var error = '';
        if (form_name == "") {
            error += 'Please enter name\n';
            $("#form_name").focus();
        }
        if (form_email == "") {
            error += 'Please enter email\n';
            $("#form_email").focus();
        }
        if (form_email != "" && !form_email.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            error += 'Please enter valid email \n';
            $("#form_email").focus();
        }
        if (form_phone == "") {
            error += 'Please enter phone number\n';
            $("#form_phone").focus();
        }
        if (form_subject == "") {
            error += 'Please enter subject\n';
            $("#form_subject").focus();
        }
        if (form_message == "") {
            error += 'Please enter message\n';
            $("#form_message").focus();
        }

        if (error == "") {
            $.ajax({
                type: "POST",
                url: "savemessage.php",
                data: {
                    form_name: form_name,
                    form_email: form_email,
                    form_phone: form_phone,
                    form_subject: form_subject,
                    form_message: form_message
                },
                success: function (text) {
                    alert('Message Sent');
                   location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
            });
        }
        else {
            $.notify(error, {position: "top center"});
        }
        return false;

    });

</script>
