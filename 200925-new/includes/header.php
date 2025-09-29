<?php
$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include ('./config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="<?php echo URLROOT ?>assets/images/taymac.png">
    <title>Taymac - REALTORS you can trust</title>
    <link href="<?php echo URLROOT ?>assets/plugins/aos/aos.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/smartmenus/jquery.smartmenus.bootstrap-4.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/select2-bootstrap-5/select2-bootstrap-5-theme.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/OwlCarousel2/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/OwlCarousel2/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT ?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Custom Style For This Template -->
    <link href="<?php echo URLROOT ?>assets/css/style.css" rel="stylesheet">

    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "objp4gq1h0");
    </script>
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader-wrapper flex-column align-items-center justify-content-center">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p class="fs-12 fw-semibold mb-0 mt-3 text-uppercase">Please wait...</p>
        </div>
    </div>
    <!-- /.Page Loader -->
   <!-- Start Topbar -->
	<div class="topbar d-none d-lg-block bg-light text-dark">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4 col-lg-3 col-xl-3">
					<a href="/" class="headerLogo">
						<img src="<?php echo URLROOT ?>assets/images/taymac.png" alt="" height="60">
					</a>
				</div>
				<div class="col-md-8 col-lg-9 col-xl-9 d-none d-md-block">
					<div class="d-flex justify-content-end">
						<div class="d-flex align-items-center help-info">
							<div class="flex-shrink-0 icon">
								<i class="fa-clock fa-solid fs-30 text-dark"></i>
							</div>
							<div class="flex-grow-1 ms-3">
								<h6 class="fs-15 fw-semibold help-info__title mb-0 text-dark">MON - FRI: 08:00AM - 17:00PM</h6>
								<p class="sub-text mb-0 fs-14 text-dark">Saturday and Sunday - <span class="fw-semibold text-warning">CLOSED</span></p>
							</div>
						</div>
						<div class="d-flex align-items-center help-info ms-4">
							<div class="flex-shrink-0 icon">
								<i class="fa-solid fa-mobile-button fs-30 text-dark"></i>
							</div>
							<div class="flex-grow-1 ms-3">
								<h6 class="fs-15 fw-semibold help-info__title mb-0 text-dark">233 (0) 245-710-614</h6>
								<p class="sub-text mb-0 fs-14 text-dark">Contact Us For Help</p>
							</div>
						</div>
						<div class="d-flex align-items-center help-info ms-4">
							<div class="flex-shrink-0 icon">
								<i class="fa-solid fa-street-view fs-30 text-dark"></i>
							</div>
							<div class="flex-grow-1 ms-3">
								<h6 class="fs-15 fw-semibold help-info__title mb-0 text-dark">51 Choice Close off Senchi Street</h6>
								<p class="sub-text mb-0 fs-14 text-dark">Airport Residential Area, Accra</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.End Topbar -->

    <div class="navbar-wrap sticky-top no-logo">
        <div class="container-lg nav-container position-relative">
            <nav class="custom-navbar navbar navbar-expand-lg">
                <a class="border-end navbar-brand pe-3 pe-sm-4 py-0" href="/">
                    <img class="logo-dark" src="<?php echo URLROOT ?>assets/images/taymac.png" alt="">
                    <img class="logo-white" src="<?php echo URLROOT ?>assets/images/taymac.png" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="align-items-center border-bottom d-flex d-lg-none justify-content-between mb-3 navbar-collapse__header pb-3">
                        <div class="collapse-brand flex-shrink-0">
                            <a href="#"><img src="<?php echo URLROOT ?>assets/images/taymac.png" alt=""></a>
                        </div>
                        <div class="flex-grow-1 ms-3 text-end">
                            <button type="button" class="bg-transparent border-0 collapse-close p-0 position-relative"><span></span> <span></span></button>
                        </div>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/') echo 'active'; ?>" href="/">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php if (strpos($_SERVER['REQUEST_URI'], 'about') !== false || strpos($_SERVER['REQUEST_URI'], 'team') !== false || strpos($_SERVER['REQUEST_URI'], 'story') !== false) echo 'active'; ?>" href="#">
                                About Us
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/about') echo 'active'; ?>" href="about">Who we are</a></li>
                                <li><a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/team') echo 'active'; ?>" href="team">Team</a></li>
                                <li><a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/story') echo 'active'; ?>" href="story">Our Story</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php if (strpos($_SERVER['REQUEST_URI'], 'property-management') !== false || strpos($_SERVER['REQUEST_URI'], 'health-safety') !== false || strpos($_SERVER['REQUEST_URI'], 'taymac-farms') !== false) echo 'active'; ?>" href="#">
                                What We Do
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/property-management') echo 'active'; ?>" href="property-management">Property Management</a></li>
                                <li><a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/health-safety') echo 'active'; ?>" href="health-safety">Health and Safety</a></li>
                                <li><a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/taymac-farms') echo 'active'; ?>" href="taymac-farms">Taymac Farms</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php if (strpos($_SERVER['REQUEST_URI'], 'risk-management') !== false || strpos($_SERVER['REQUEST_URI'], 'training') !== false || strpos($_SERVER['REQUEST_URI'], 'courses') !== false || strpos($_SERVER['REQUEST_URI'], 'first-aid') !== false || strpos($_SERVER['REQUEST_URI'], 'manual-handling') !== false || strpos($_SERVER['REQUEST_URI'], 'coshh') !== false) echo 'active'; ?>" href="#">
                                Other Services
                            </a>
                            <ul class="dropdown-menu mega-menu">
                                <li>
                                    <span class="row">
                                        <span class="col-6">
                                            <a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/risk-management') echo 'active'; ?>" href="risk-management">Risk Management</a>
                                            <a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/training') echo 'active'; ?>" href="training">Trainings</a>
                                            <a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/courses') echo 'active'; ?>" href="courses">Risk Assessment Courses</a>
                                        </span>
                                        <span class="col-6">
                                            <a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/first-aid') echo 'active'; ?>" href="first-aid">First Aid</a>
                                            <a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/manual-handling') echo 'active'; ?>" href="manual-handling">Manual Handling</a>
                                            <a class="dropdown-item <?php if ($_SERVER['REQUEST_URI'] == '/coshh') echo 'active'; ?>" href="coshh">COSHH</a>
                                        </span>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/blog') echo 'active'; ?>" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/contact') echo 'active'; ?>" href="contact">Contact</a></li>
                    </ul>
                </div>
                <div class="d-flex gap-1 ms-lg-5">
                    <a href="/admin/" target="_blank" class="btn btn-primary btn-login hstack gap-2">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <div class="vr d-none d-sm-inline-block"></div>
                        <span class="d-none d-sm-inline-block">Taymac Online</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    </div>
