<?php include "includes/header.php"; ?>


    <!-- 4th Home Slider -->
    <section class="p0">
        <div class="container-fluid p0">
            <div class="home8-slider vh-100">
                <div id="bs_carousel" class="carousel slide bs_carousel" data-ride="carousel" data-pause="false" data-interval="7000">
                    <div class="carousel-inner">

                        <?php
                        $dataslide = 0;
                        $getslider = $mysqli->query("select * from taymac_slider");
                        while ($resslider = $getslider->fetch_assoc()) {
                            $imageid = $resslider['imageid'];
                            ?>

                            <div class="carousel-item <?php if ($dataslide == '0'){
                                echo "active";
                            } ?>" data-slide="<?php echo $dataslide ?>" data-interval="false">
                                <div class="bs_carousel_bg" style="background-image: url(<?php
                                $getimage = $mysqli->query("select * from taymac_image_slider where imageid = '$imageid'");
                                $resimage = $getimage->fetch_assoc();
                                echo 'admin/'.$resimage['image_location'];
                                ?>);">

                                </div>
                                <div class="bs-caption">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-7 col-lg-8">
                                                <div class="main_title">
                                                    <?php echo $resslider['header_text'] ?>
                                                </div>
                                                <?php echo $resslider['slider_text'];?>?
                                            </div>
                                            <div class="col-md-5 col-lg-4">
                                                <div class="feat_property home8">
                                                    <div class="details">
                                                        <div class="tc_content">
                                                            <ul class="tag">
                                                                <li class="list-inline-item">
                                                                    <a href="#">
                                                                        <?php echo $resslider['property_status']  ?>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <h4>
                                                                <?php echo $resslider['property_type'] ?>
                                                            </h4>
                                                            <p><span class="flaticon-placeholder"></span>
                                                                <?php echo $resslider['property_location'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $dataslide++;
                        } ?>

                    </div>
                    <div class="property-carousel-controls">
                        <a class="property-carousel-control-prev" role="button" data-slide="prev">
                            <span class="flaticon-left-arrow-1"></span>
                        </a>
                        <a class="property-carousel-control-next" role="button" data-slide="next">
                            <span class="flaticon-right-arrow"></span>
                        </a>
                    </div>
                </div>
                <div class="carousel slide bs_carousel_prices" data-ride="carousel" data-pause="false" data-interval="false">
                    <div class="carousel-inner"></div>
                    <div class="property-carousel-ticker">
                        <div class="property-carousel-ticker-counter"></div>
                        <div class="property-carousel-ticker-divider">&nbsp;&nbsp;/&nbsp;&nbsp;</div>
                        <div class="property-carousel-ticker-total"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Feature Properties -->
    <section id="feature-property" class="feature-property mt80 pb50">
        <div class="container-fluid ovh">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center mb40">
                        <h2>Office Installations</h2>
                        <p>We offer installations for offices</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="feature_property_home3_slider">

                        <?php $getinstallation = $mysqli->query("select * from taymac_image_install");
                        while ($resinstall = $getinstallation->fetch_assoc()){ ?>

                            <div class="item">
                                <div class="feat_property home3">
                                    <div class="thumb">
                                        <img class="img-whp" src="<?php echo 'admin/'.$resinstall['image_location']; ?>"
                                             alt="fp1.jpg" width="60" height="260">
                                        <div class="thmb_cntnt">
                                            <ul class="icon mb0">
                                                <li class="list-inline-item"><a href="#"><span class="flaticon-back"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Feature Properties -->
    <section id="feature-property" class="feature-property bgc-f7">
        <div class="container ovh">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center mb40">
                        <h2>Featured Properties</h2>
                        <p>Find the latest properties of Taymac</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="feature_property_slider">

                        <?php $getproperty = $mysqli->query("select * from taymac_fp p join taymac_image_fp i ON
                                                               p.imageid = i.imageid");
                        while ($resproperty = $getproperty->fetch_assoc()) { ?>

                            <div class="item">
                                <div class="feat_property">
                                    <div class="thumb">
                                        <img class="img-whp"
                                             src="<?php echo 'admin/'.$resproperty['image_location']; ?>"
                                             width="70" height="300"
                                             alt="FP Image">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item"><a href="#">
                                                        <?php echo $resproperty['property_status'] ?>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="icon mb0">
                                                <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <div class="tc_content">
                                            <h4><?php echo $resproperty['property_type'] ?></h4>
                                            <p><span class="flaticon-placeholder"></span>
                                                <?php echo $resproperty['property_location'] ?>
                                            </p>
                                            <p>
                                                <?php echo $resproperty['fp_description'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Find Comfort Place -->
    <section id="comfort-place" class="comfort-place pb30 bb1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2>REALTORS you can trust</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                $getrealtor = $mysqli->query("select * from taymac_realtor");
                while ($resrealtor = $getrealtor->fetch_assoc()) { ?>

                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="why_chose_us">
                            <div class="icon">
                                <span class="<?php echo $resrealtor['flat_icon'] ?>"></span>
                            </div>
                            <div class="details">
                                <h4>
                                    <?php echo $resrealtor['realtor_text'] ?>
                                </h4>
                            </div>
                        </div>
                    </div>

                <?php } ?>


            </div>
        </div>
    </section>

    <!-- Our Testimonials -->
    <section id="our-testimonials" class="our-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2 class="color-white">What our Clients think</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="testimonial_grid_slider">

                        <?php
                        $getfeedback = $mysqli->query("select * from taymac_client_feedback");
                        while ($resfeedback = $getfeedback->fetch_assoc()) { ?>
                            <div class="item">
                                <div class="testimonial_grid">
                                    <div class="details">
                                        <h4><?php echo $resfeedback['client_name'] ?></h4>

                                        <p class="mt25">
                                            <?php echo $resfeedback['client_text'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include "includes/footer.php"; ?>