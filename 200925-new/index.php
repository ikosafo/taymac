<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database configuration
require_once 'config.php';


// Fetch hero data
$query = "SELECT * FROM ws_hero WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch hero query failed: ' . $mysqli->error);
    $hero = [
        'title' => 'Expert Solutions for Property Management, Health and Safety, and Farming.',
        'subtitle' => 'REALTORS YOU CAN TRUST',
        'hero_image' => URLROOT . '/assets/images/hero.webp' // Default image
    ];
} else {
    $hero = $result->fetch_assoc();
    if (!$hero) {
        $hero = [
            'title' => 'Expert Solutions for Property Management, Health and Safety, and Farming.',
            'subtitle' => 'REALTORS YOU CAN TRUST',
            'hero_image' => URLROOT . '/assets/images/hero.webp' // Default image
        ];
    }
}
error_log('Fetched hero data for index: ' . print_r($hero, true));



// Fetch approach data
$query = "SELECT * FROM ws_approach WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch approach query failed: ' . $mysqli->error);
    $approach = [
        'title' => 'We embrace a proactive CAN DO mindset, tackling challenges head-on.',
        'subtitle' => 'Our Approach',
        'step1_title' => 'Find Your Ideal Property in Prime Locations.',
        'step1_description' => 'Discover your perfect property in highly sought-after areas, where convenience, comfort, and community align to provide the best living and investment opportunities.',
        'step1_icon' => 'fa-map-location',
        'step2_title' => 'Schedule a Visit with Our Expert Agents.',
        'step2_description' => 'Arrange an appointment at your convenience with one of our dedicated agents. We\'re prepared to offer personalized insights and tailored solutions to help you make informed decisions.',
        'step2_icon' => 'fa-calendar-alt',
        'step3_title' => 'Experience Tailored Real Estate Solutions.',
        'step3_description' => 'Partner with our experienced team to receive customized real estate solutions designed to meet your specific goals, ensuring a seamless and successful property search or transaction.',
        'step3_icon' => 'fa-igloo'
    ];
} else {
    $approach = $result->fetch_assoc();
    if (!$approach) {
        $approach = [
            'title' => 'We embrace a proactive CAN DO mindset, tackling challenges head-on.',
            'subtitle' => 'Our Approach',
            'step1_title' => 'Find Your Ideal Property in Prime Locations.',
            'step1_description' => 'Discover your perfect property in highly sought-after areas, where convenience, comfort, and community align to provide the best living and investment opportunities.',
            'step1_icon' => 'fa-map-location',
            'step2_title' => 'Schedule a Visit with Our Expert Agents.',
            'step2_description' => 'Arrange an appointment at your convenience with one of our dedicated agents. We\'re prepared to offer personalized insights and tailored solutions to help you make informed decisions.',
            'step2_icon' => 'fa-calendar-alt',
            'step3_title' => 'Experience Tailored Real Estate Solutions.',
            'step3_description' => 'Partner with our experienced team to receive customized real estate solutions designed to meet your specific goals, ensuring a seamless and successful property search or transaction.',
            'step3_icon' => 'fa-igloo'
        ];
    }
}
error_log('Fetched approach data: ' . print_r($approach, true));


// Fetch why choose data
$query = "SELECT * FROM ws_why_choose WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch why choose query failed: ' . $mysqli->error);
    $why_choose = [
        'title' => 'Why Choose TAYMAC',
        'reason1_title' => 'No Hidden Fees',
        'reason1_description' => 'We believe in complete transparency. With us, you can rest assured that there are no surprise costs or hidden charges. Every fee is clearly outlined upfront, so you know exactly what to expect. Our goal is to provide a seamless and trustworthy experience, ensuring you get the best value for your investment without any financial surprises.',
        'reason2_title' => 'Property Appraisal',
        'reason2_description' => 'Our expert property appraisal services help you make informed decisions, whether you\'re buying, selling, or renting. We provide accurate, up-to-date valuations based on local market trends and property conditions, ensuring you get the best possible insight into the true worth of any property. Trust our experienced team to guide you in making smart property investments.',
        'reason3_title' => 'Large Coverage',
        'reason3_description' => 'With an extensive portfolio that spans across multiple cities and regions, we offer unparalleled access to a wide range of properties. Whether you’re looking for a home in the heart of the city, a peaceful suburban retreat, or a prime investment opportunity in a growing market, our large coverage ensures we have options to meet every need and lifestyle across various locations.'
    ];
} else {
    $why_choose = $result->fetch_assoc();
    if (!$why_choose) {
        $why_choose = [
            'title' => 'Why Choose TAYMAC',
            'reason1_title' => 'No Hidden Fees',
            'reason1_description' => 'We believe in complete transparency. With us, you can rest assured that there are no surprise costs or hidden charges. Every fee is clearly outlined upfront, so you know exactly what to expect. Our goal is to provide a seamless and trustworthy experience, ensuring you get the best value for your investment without any financial surprises.',
            'reason2_title' => 'Property Appraisal',
            'reason2_description' => 'Our expert property appraisal services help you make informed decisions, whether you\'re buying, selling, or renting. We provide accurate, up-to-date valuations based on local market trends and property conditions, ensuring you get the best possible insight into the true worth of any property. Trust our experienced team to guide you in making smart property investments.',
            'reason3_title' => 'Large Coverage',
            'reason3_description' => 'With an extensive portfolio that spans across multiple cities and regions, we offer unparalleled access to a wide range of properties. Whether you’re looking for a home in the heart of the city, a peaceful suburban retreat, or a prime investment opportunity in a growing market, our large coverage ensures we have options to meet every need and lifestyle across various locations.'
        ];
    }
}
error_log('Fetched why choose data: ' . print_r($why_choose, true));



include ('includes/header.php');
?>

    <div class="blog-header background-image position-relative text-white background-no-repeat background-size-cover background-center" data-image-src="<?php echo htmlspecialchars($hero['hero_image']); ?>" style="background-image: url('<?php echo htmlspecialchars($hero['hero_image']); ?>');">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6); z-index: 0;"></div>
        
        <div class="container position-relative z-1">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                    <div class="bg-soft-primary d-inline-block fw-medium mb-3 rounded-pill section-header__subtitle text-capitalize text-white">
                        <?php echo htmlspecialchars($hero['subtitle']); ?>
                    </div>
                    <h3 class="fw-semibold display-5 text-white">
                        <span class="underline position-relative text-primary"><?php echo htmlspecialchars(implode(' ', array_slice(explode(' ', $hero['title']), 0, 2))); ?></span> <?php echo htmlspecialchars(implode(' ', array_slice(explode(' ', $hero['title']), 2))); ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>


    <!-- Our Approach Section -->
    <div class="bg-white py-5 angled lower-start wrapper">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-header text-center mb-5 aos-init aos-animate" data-aos="fade-down">
                        <div class="bg-soft-primary d-inline-block fw-medium mb-3 rounded-pill section-header__subtitle text-capitalize text-primary">
                            Our Approach
                        </div>
                        <h4 class="h4 fw-semibold mb-3 section-header__title text-capitalize">
                            <?php echo htmlspecialchars($approach['title']); ?>
                        </h4>
                        <div class="sub-title fs-16"><?php echo htmlspecialchars($approach['subtitle']); ?></div>
                    </div>
                </div>
            </div>
            <div class="row g-4 g-md-5 justify-content-center work-process">
                <div class="col-sm-6 col-lg-4">
                    <div class="work-process position-relative p-3 px-xl-5 aos-init aos-animate" data-aos="fade" data-aos-delay="300">
                        <div class="step-box position-relative d-inline-block mb-4 d-flex gap-3">
                            <div class="fs-5 text-dark fw-semibold">01/</div>
                            <i class="fs-50 fa-solid <?php echo htmlspecialchars($approach['step1_icon']); ?> text-primary"></i>
                        </div>
                        <div class="step-desc">
                            <h4 class="fs-20 fw-semibold"><?php echo htmlspecialchars($approach['step1_title']); ?></h4>
                            <p><?php echo htmlspecialchars($approach['step1_description']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-process position-relative p-3 px-xl-5 aos-init aos-animate" data-aos="fade" data-aos-delay="400">
                        <div class="step-box position-relative d-inline-block mb-4 d-flex gap-3">
                            <div class="fs-5 text-dark fw-semibold">02/</div>
                            <i class="fs-50 fa-solid <?php echo htmlspecialchars($approach['step2_icon']); ?> text-primary"></i>
                        </div>
                        <div class="step-desc">
                            <h4 class="fs-20 fw-semibold"><?php echo htmlspecialchars($approach['step2_title']); ?></h4>
                            <p><?php echo htmlspecialchars($approach['step2_description']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-process position-relative p-3 px-xl-5 aos-init aos-animate" data-aos="fade" data-aos-delay="500">
                        <div class="step-box position-relative d-inline-block mb-4 d-flex gap-3">
                            <div class="fs-5 text-dark fw-semibold">03/</div>
                            <i class="fs-50 fa-solid <?php echo htmlspecialchars($approach['step3_icon']); ?> text-primary"></i>
                        </div>
                        <div class="step-desc">
                            <h4 class="fs-20 fw-semibold"><?php echo htmlspecialchars($approach['step3_title']); ?></h4>
                            <p><?php echo htmlspecialchars($approach['step3_description']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5 bg-gradient-primary">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-header text-center mb-5" data-aos="fade-down">
                        <div class="bg-soft-primary d-inline-block fw-medium mb-3 rounded-pill section-header__subtitle text-capitalize text-primary">Featured Properties</div>
                        <h4 class="h4 fw-semibold mb-3 section-header__title text-capitalize">Discover Our Handpicked Selection of Premier Properties.</h4>
                       </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="border-0 card card-property rounded-3 shadow w-100 flex-fill overflow-hidden">
                        <a href="#" class="card-link"></a>
                        <div class="property-img card-image-hover overflow-hidden">
                            <img src="<?php echo URLROOT ?>/assets/images/hero.webp" alt="" class="img-fluid">
                            <div class="bg-white card-property-badge d-inline-block end-1 fs-13 fw-semibold position-absolute property-tags px-2 py-1 rounded-3 text-dark top-1">
                                For Rent
                            </div>
                        </div>
                        <div class="card-property-content-wrap d-flex flex-column h-100 position-relative p-4">
                           <h4 class="property-card-title mb-3">Accra, Ghana</h4>
                            <div class="card-property-description mb-3">Mix of town houses and apartments</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                    <div class="border-0 card card-property rounded-3 shadow w-100 flex-fill overflow-hidden">
                        <a href="#" class="card-link"></a>
                        <div class="property-img card-image-hover overflow-hidden">
                            <img src="<?php echo URLROOT ?>/assets/images/pr1.webp" alt="" class="img-fluid">
                            <div class="bg-white card-property-badge d-inline-block end-1 fs-13 fw-semibold position-absolute property-tags px-2 py-1 rounded-3 text-dark top-1">
                                For Rent
                            </div>
                        </div>
                        <div class="card-property-content-wrap d-flex flex-column h-100 position-relative p-4">
                            <h4 class="property-card-title mb-3">Airport - Accra, Ghana</h4>
                            <div class="card-property-description mb-3">Office Space</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                    <div class="border-0 card card-property rounded-3 shadow w-100 flex-fill overflow-hidden">
                        <a href="#" class="card-link"></a>
                        <div class="property-img card-image-hover overflow-hidden">
                            <img src="<?php echo URLROOT ?>/assets/images/pr2.webp" alt="" class="img-fluid">
                            <div class="bg-white card-property-badge d-inline-block end-1 fs-13 fw-semibold position-absolute property-tags px-2 py-1 rounded-3 text-dark top-1">
                                For Rent
                            </div>
                        </div>
                        <div class="card-property-content-wrap d-flex flex-column h-100 position-relative p-4">
                            <h4 class="property-card-title mb-3">East Legon - Accra, Ghana</h4>
                            <div class="card-property-description mb-3">Apartments</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                    <div class="border-0 card card-property rounded-3 shadow w-100 flex-fill overflow-hidden">
                        <a href="#" class="card-link"></a>
                        <div class="property-img card-image-hover overflow-hidden">
                            <img src="<?php echo URLROOT ?>/assets/images/pr3.webp" alt="" class="img-fluid">
                            <div class="bg-white card-property-badge d-inline-block end-1 fs-13 fw-semibold position-absolute property-tags px-2 py-1 rounded-3 text-dark top-1">
                                For Rent
                            </div>
                        </div>
                        <div class="card-property-content-wrap d-flex flex-column h-100 position-relative p-4">
                            <h4 class="property-card-title mb-3">Accra, Ghana</h4>
                            <div class="card-property-description mb-3">Office Installations</div>
                        </div>
                    </div>
                </div>
                
            </div>

            <a href="property-management">
                <button type="button" class="btn btn-primary btn-lg hstack mx-auto mt-5 gap-2" data-aos="fade-up">
                    <span>Browse More Properties</span>
                    <span class="vr"></span>
                    <i class="fa-arrow-right fa-solid fs-14"></i>
                </button>
            </a>
           
        </div>
    </div>

    <!-- Why Choose Section -->
    <div class="py-5 bg-grey">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-header text-center mb-5 aos-init aos-animate" data-aos="fade-down">
                        <h2 class="h1 fw-semibold mb-3 section-header__title text-capitalize">
                            <span class="underline position-relative text-primary"><?php echo htmlspecialchars(explode(' ', $why_choose['title'])[0]); ?></span> <?php echo htmlspecialchars(implode(' ', array_slice(explode(' ', $why_choose['title']), 1))); ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item border-0 mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <?php echo htmlspecialchars($why_choose['reason1_title']); ?>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    <?php echo htmlspecialchars($why_choose['reason1_description']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <?php echo htmlspecialchars($why_choose['reason2_title']); ?>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    <?php echo htmlspecialchars($why_choose['reason2_description']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <?php echo htmlspecialchars($why_choose['reason3_title']); ?>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    <?php echo htmlspecialchars($why_choose['reason3_description']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Newslatter -->
    <div class="bg-primary newslatter position-relative py-5 mx-3 mx-xl-5 rounded-4 position-relative overflow-hidden">
        <div class="container p-4 position-relative z-1">
            <div class="row">
                <div class="col-md-10 offset-md-1">
               
                    <div class="section-header text-center mb-5" data-aos="fade-down"> 
                        <div class="bg-white d-inline-block fw-medium mb-3 rounded-pill section-header__subtitle text-capitalize text-primary">Our Latest Articles</div>             
                        <h4 class="h4 fw-semibold mb-3 section-header__title text-capitalize text-white">Subscribe to get most recent updates and periodic newsletters</h4>
                     </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="row g-4 align-items-end newslatter-form">
                        <div class="col-sm">
                            <!-- Start Form Group -->
                            <div class="form-group">
                                <label class="text-white bg-primary fw-semibold">Full Name</label>
                                <input type="text" class="form-control bg-transparent">
                            </div>
                            <!-- /. End Form Group -->
                        </div>
                        <div class="col-sm">
                            <!-- Start Form Group -->
                            <div class="form-group">
                                <label class="text-white bg-primary">Enter Email</label>
                                <input type="email" class="form-control bg-transparent">
                            </div>
                            <!-- /. End Form Group -->
                        </div>
                        <div class="col-sm-auto">
                            <!-- Start Button -->
                            <button type="button" class="btn btn-lg btn-light w-100">Subscribe</button>
                            <!-- /. End Button -->
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="card-sketch">
            <img src="<?php echo URLROOT ?>/assets/img/png-img/house-sketch.png" alt="" class="card-sketch-image">
        </div>
    </div>
    <!-- /.End Newslatter -->

<?php include ('includes/footer.php'); ?>