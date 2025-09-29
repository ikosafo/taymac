<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


include ('includes/header.php');?>

<div class="main-content">
		<div class="border-bottom py-3">
			<div class="container">
				<div class="row gy-2 gx-4 gx-md-5">
					<h4 class="col-auto fs-18 fw-semibold mb-0 page-title text-capitalize">What we do</h4>
					<div class="border-start col-auto">
						<ol class="align-items-center breadcrumb fw-medium mb-0">
							<li class="breadcrumb-item d-flex align-items-center">
								<a href="/" class="text-decoration-none"> <i class="fa-solid fa-house-chimney-crack fs-18"></i> </a>
							</li>
                            <li class="breadcrumb-item d-flex align-items-center">
                                <a href="health-safety" class="text-decoration-none"> Health and Safety </a>
                            </li>
							<li class="breadcrumb-item d-flex align-items-center active" aria-current="page">Manual Handling</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="py-5">
			<div class="container py-4">
				
				<div class="about-text align-items-center g-4 justify-content-between row">
					<div class="col-md-12 col-lg-5">
						<div class="row g-3 g-sm-4 align-items-center">
							
							<div class="col-12">
								<div class="row g-3 g-sm-4">
									<div class="col-12"> <img src="<?php echo URLROOT ?>assets/images/fm5.webp" class="img-fluid rounded-3" alt=""> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-7 ps-xxl-5">
						<div class="text-block">
							<h6 class="fs-14 fw-bold heading-sm l-spacing-1 position-relative text-primary text-uppercase">
                            Manual Handling</h6>
							<h4 class="mb-4">Manual Handling Training</h4>

						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>


<?php include ('includes/footer.php'); ?>