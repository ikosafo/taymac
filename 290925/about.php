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
                        <h3 class="breadcrumb_title">Who we are</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Text Content -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2 class="mt0">About TAYMAC</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-xl-6 col-md-6">
                    <div class="about_content">

                       <?php
                       $getabout = $mysqli->query("select * from taymac_aboutus LIMIT 1");
                       $resabout = $getabout->fetch_assoc();
                       echo $resabout['aboutus'];
                       ?>

                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-md-6">
                    <div class="about_content">

                        <?php
                        $getabout = $mysqli->query("select * from taymac_pm LIMIT 1");
                        $resabout = $getabout->fetch_assoc();
                        echo $resabout['pm_text'];
                        ?>

                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- About Text Content -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2 class="mt0">Our Story</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                $getabout = $mysqli->query("select * from taymac_story LIMIT 1");
                $resabout = $getabout->fetch_assoc();
                echo $resabout['story_text'];
                ?>

            </div>


        </div>
    </section>


    <!-- About Text Content -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2 class="mt0">Past and Present Clients</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php $getclients = $mysqli->query("select * from taymac_ppclient");
                while ($resclient = $getclients->fetch_assoc()) { ?>
                <div class="col-lg-4 col-xl-4">
                        <i class="fa fa-angle-right"></i> <?php echo $resclient['client_name'] ?> <br/>
                    </div>
                <?php } ?>
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

<?php include "includes/footer.php"; ?>