<?php include "includes/header.php"; ?>

    <div class="home10-mainslider">
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-banner-wrapper home10">
                        <div class="banner-style-one owl-theme owl-carousel">
                            <div class="slide slide-one" style="background-image: url(assets/images/background/57.jpg);height: 620px;">
                                <div class="container">
                                    <div class="row home-content">
                                        <div class="col-lg-12 text-center p0">
                                            <h2 class="banner_top_title">TAYMAC FARMS</h2>
                                            <h3 class="banner-title">Your Fresh Vegetable Hub</h3>
                                            <div class="btn"><a href="#" class="banner-btn">Learn More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide slide-one" style="background-image: url(assets/images/background/58.jpg);height: 620px;">
                                <div class="container">
                                    <div class="row home-content">
                                        <div class="col-lg-12 text-center p0">
                                            <h2 class="banner_top_title">TAYMAC FARMS</h2>
                                            <h3 class="banner-title">We Produce Fresh Green House Grown Vegetables for Shops,
                                                Restaurants, Hotels and Individuals</h3>
                                            <div class="btn"><a href="#" class="banner-btn">Learn More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide slide-one" style="background-image: url(assets/images/background/59.jpg);height: 620px;">
                                <div class="container">
                                    <div class="row home-content">
                                        <div class="col-lg-12 text-center p0">
                                            <h2 class="banner_top_title">VISIT OUR FARM</h2>
                                            <h3 class="banner-title">Our Farm Is Open To Customers 24/7. Come Take a Look at Ghana's Coolest Farm</h3>
                                            <div class="btn"><a href="#" class="banner-btn">Learn More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-btn-block banner-carousel-btn">
                            <span class="carousel-btn left-btn"><i class="flaticon-left-arrow-1 left"></i></span>
                            <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
                        </div><!-- /.carousel-btn-block banner-carousel-btn -->
                    </div><!-- /.main-banner-wrapper -->
                </div>
            </div>
        </div>
    </div>

<?php
$getabout = $mysqli->query("select * from taymac_farm LIMIT 1");
$resabout = $getabout->fetch_assoc();
echo $resabout['farm_text'];
?>


<?php include "includes/footer.php"; ?>