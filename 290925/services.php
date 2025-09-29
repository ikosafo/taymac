<?php include "includes/header.php"; ?>

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb" style="height: 10% !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                        <h3 class="breadcrumb_title">Services</h3>
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
                        <h2 class="mt0">Our Services</h2>
                    </div>
                </div>
            </div>


            <?php
            $getabout = $mysqli->query("select * from taymac_health LIMIT 1");
            $resabout = $getabout->fetch_assoc();
            echo $resabout['health_text'];
            ?>
            

        </div>
    </section>


<?php include "includes/footer.php"; ?>