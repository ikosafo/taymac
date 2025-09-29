<?php include "includes/header.php"; ?>

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb" style="height: 10% !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">What we do</li>
                        </ol>
                        <h3 class="breadcrumb_title">Property Management</h3>
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
                        <h2 class="mt0">Property and Facilities Management</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-xl-6">
                    <div class="feat_property home7 agent">
                        <div class="details">
                            <div class="tc_content">
                                <h4>Aluminum Glazing and Office Partition</h4>
                            </div>
                            <div class="fp_footer">
                                <p>
                                    We deliver an exceptional property management experience that will maintain the asset value of your property
                                    throughout its lifespan. Our skilled team is able to provide the best in maintaining and preserving the quality
                                    of Properties under our care.
                                </p>
                                <p>
                                    We are a full service, residential, non-residential and commercial property management Company operating in Ghana.
                                    We use our expertise, the latest technology, and superior customer service skills to provide a stress-free owner
                                    experience. Among our clients are some diplomatic missions in Ghana.
                                </p>
                                <p>
                                    We also undertake entire office fit out services for some banks and Corporate multinational Companies in Ghana. We
                                    specialize in but not limited to aluminium glazing and office partition using both glass or gypsum board. With TCL,
                                    you can maximize the financial benefits of owning a Property, without the burden of handling the complicated and time
                                    consuming management tasks that come with it. How you manage your property today has a great impact on its value
                                    tomorrow.
                                </p>
                                <p>
                                    As a do-it-yourself landlord collecting rent checks isn't the only responsibility you
                                    have to deal with every month. Landlords are occasionally overwhelmed by big issues such
                                    as, unsuitable tenants, major and minor repairs that maintain the value of the Property.
                                    We also coordinate move-ins, inspections, hiring contractors, and tedious paperwork.
                                    Fortunately, taking care of "all" issues big and small is our business. Thereby,
                                    offering our customers the confidence to leave their Property in the hands of a trusted
                                    partner like TCL
                                </p>
                                <p>TCL provides a total property and facilities management solution, services we provide
                                    include the following <br/>

                                    <i class="fa fa-angle-right"></i> Security <br/>
                                    <i class="fa fa-angle-right"></i> Ensuring your building is complaint to HSSE standards <br/>
                                    <i class="fa fa-angle-right"></i> Daily Janitorial Services <br/>
                                    <i class="fa fa-angle-right"></i> Undertaking Planned Preventative
                                    and Reactive Maintenance schedules for the Property <br/>
                                    <i class="fa fa-angle-right"></i> Internal Office fit out using
                                    various types of aluminium glazing and gypsum boards <br/>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">

                    <div class="row">

                        <?php $getproperty = $mysqli->query("select * from taymac_property p JOIN taymac_image_property i
                                                             ON p.imageid = i.imageid LIMIT 6");
                        while ($resproperty = $getproperty->fetch_assoc()) {
                        ?>

                        <div class="col-md-6 col-lg-6">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class=""
                                         src="<?php echo 'admin/'.$resproperty['image_location']; ?>" width="270" height="260"
                                         alt="Img">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <?php echo $resproperty['property_status'] ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <h4><?php echo $resproperty['property_type'] ?></h4>
                                       <p>
                                           <i class="fa fa-map-marker"></i> <?php echo $resproperty['property_location'] ?>
                                       </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <?php } ?>

                        <div class="col-lg-12 mt20">
                            <div class="mbp_pagination">
                                <ul class="page_navigation">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="/property">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="/property2">2</a>
                                    </li>
                                   <!-- <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">29</a></li>-->
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

<?php include "includes/footer.php"; ?>