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
                        <h3 class="breadcrumb_title">Team</h3>
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
                        <h2 class="mt0">Our Team</h2>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12 col-lg-12">
                    <div class="row">

                        <?php $getteam = $mysqli->query("select * from taymac_team");
                        while ($resteam = $getteam->fetch_assoc()){ ?>

                            <div class="col-md-4 col-lg-4">
                                <div class="feat_property home7 agent">

                                    <div class="details">
                                        <div class="tc_content">
                                            <h4><?php echo $resteam['member_name'] ?></h4>
                                            <p class="text-thm"><?php echo $resteam['member_position'] ?></p>
                                            <ul class="prop_details mb0">
                                                <li><a href="#">Mobile: <?php echo $resteam['member_mobile'] ?></a></li>
                                                <li><a href="#">Email: <?php echo $resteam['member_email'] ?></a></li>
                                                <li><a href="#">Website: www.taymac.net</a></li>
                                            </ul>
                                        </div>
                                        <div class="fp_footer">
                                          <?php echo $resteam['member_description']; ?>
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

<?php include "includes/footer.php"; ?>