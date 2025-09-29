<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database configuration
require_once 'config.php';



// Fetch about data
$query = "SELECT * FROM ws_about WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch about query failed: ' . $mysqli->error);
    $about = [
        'title' => 'About',
        'paragraph1' => 'TAYMAC, established in 2011 as Taymac Safety Consulting Limited and registered in Ghana under registration number CA-88,491, was founded to address the critical need for prioritizing Occupational Health, Safety, Security, and Environmental Management (HSSE) across all sectors of industry, commerce, and business. Since its inception, TAYMAC has been committed to making HSSE the foremost concern in the operational practices of its clients, ensuring a safer and more sustainable working environment for all.',
        'paragraph2' => 'In early 2012, TAYMAC expanded its operations into Property and Facility Management, seizing a strategic opportunity to diversify its service offerings. To better align with this shift in focus, the company rebranded from Taymac Safety Consulting Limited to TAYMAC, reflecting its broader range of expertise and commitment to delivering comprehensive management solutions.',
        'paragraph3' => 'As we managed properties in Accra, we gradually expanded into aluminum glazing and office partitioning, utilizing glass, aluminum profiles, and gypsum board. This shift occurred alongside managing tenant move-ins for properties under our care. By 2016, we had fully transitioned into comprehensive facilities management, incorporating office cleaning services as part of our operations. The consistent quality and durability of our work have earned us a solid reputation, enabling us to build an impressive and growing clientele over the years.',
        'methodology_title' => 'Project Methodology',
        'methodology_item1' => 'We utilize premium materials for all our projects, carefully tailored to meet the unique requirements of each client, ensuring optimal results from the outset of every engagement.',
        'methodology_item2' => 'All necessary equipment will be deployed to the site, with work conducted in consideration of other building occupants. This may require us to operate after regular business hours or during weekends, depending on the specific needs of our clients.',
        'methodology_item3' => 'The final project handover is completed upon the client\'s full approval and satisfaction.'
    ];
} else {
    $about = $result->fetch_assoc();
    if (!$about) {
        $about = [
            'title' => 'About',
            'paragraph1' => 'TAYMAC, established in 2011 as Taymac Safety Consulting Limited and registered in Ghana under registration number CA-88,491, was founded to address the critical need for prioritizing Occupational Health, Safety, Security, and Environmental Management (HSSE) across all sectors of industry, commerce, and business. Since its inception, TAYMAC has been committed to making HSSE the foremost concern in the operational practices of its clients, ensuring a safer and more sustainable working environment for all.',
            'paragraph2' => 'In early 2012, TAYMAC expanded its operations into Property and Facility Management, seizing a strategic opportunity to diversify its service offerings. To better align with this shift in focus, the company rebranded from Taymac Safety Consulting Limited to TAYMAC, reflecting its broader range of expertise and commitment to delivering comprehensive management solutions.',
            'paragraph3' => 'As we managed properties in Accra, we gradually expanded into aluminum glazing and office partitioning, utilizing glass, aluminum profiles, and gypsum board. This shift occurred alongside managing tenant move-ins for properties under our care. By 2016, we had fully transitioned into comprehensive facilities management, incorporating office cleaning services as part of our operations. The consistent quality and durability of our work have earned us a solid reputation, enabling us to build an impressive and growing clientele over the years.',
            'methodology_title' => 'Project Methodology',
            'methodology_item1' => 'We utilize premium materials for all our projects, carefully tailored to meet the unique requirements of each client, ensuring optimal results from the outset of every engagement.',
            'methodology_item1' => 'All necessary equipment will be deployed to the site, with work conducted in consideration of other building occupants. This may require us to operate after regular business hours or during weekends, depending on the specific needs of our clients.',
            'methodology_item3' => 'The final project handover is completed upon the client\'s full approval and satisfaction.'
        ];
    }
}
error_log('Fetched about data: ' . print_r($about, true));



// Fetch clients data
$query = "SELECT * FROM ws_clients WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch clients query failed: ' . $mysqli->error);
    $clients = [
        'subtitle' => 'Our present and past clients',
        'title' => 'Trusted by countless organizations for our commitment to excellence',
        'list1_client1' => 'Cnergy Ghana Limited',
        'list1_client2' => 'Colgate Palmolive Ghana Limited',
        'list1_client3' => 'Best Assurance Company Limited',
        'list1_client4' => 'Special Investment Company Limited',
        'list1_client5' => 'China Pipeline Petroleum, Ghana Office',
        'list2_client1' => 'Novartis Pharma A.G.',
        'list2_client2' => 'Best Pensions Limited',
        'list2_client3' => 'Amec Foster Wheeler Ghana Office',
        'list2_client4' => 'Best Point Saving and Loans Company Limited',
        'list2_client5' => 'Louis Dreyfus Commodities - West Africa Office'
    ];
} else {
    $clients = $result->fetch_assoc();
    if (!$clients) {
        $clients = [
            'subtitle' => 'Our present and past clients',
            'title' => 'Trusted by countless organizations for our commitment to excellence',
            'list1_client1' => 'Cnergy Ghana Limited',
            'list1_client2' => '',
            'list1_client3' => '',
            'list1_client4' => '',
            'list1_client5' => '',
            'list2_client1' => 'Novartis Pharma A.G.',
            'list2_client2' => '',
            'list2_client3' => '',
            'list2_client4' => '',
            'list2_client5' => ''
        ];
    }
}
error_log('Fetched clients data: ' . print_r($clients, true));

// Prepare client lists, filtering out empty values
$list1_clients = array_filter([
    $clients['list1_client1'],
    $clients['list1_client2'],
    $clients['list1_client3'],
    $clients['list1_client4'],
    $clients['list1_client5']
], function($value) {
    return !empty($value);
});
$list2_clients = array_filter([
    $clients['list2_client1'],
    $clients['list2_client2'],
    $clients['list2_client3'],
    $clients['list2_client4'],
    $clients['list2_client5']
], function($value) {
    return !empty($value);
});

include ('includes/header.php');?>

<div class="main-content">
		<div class="border-bottom py-3">
			<div class="container">
				<div class="row gy-2 gx-4 gx-md-5">
					<h4 class="col-auto fs-18 fw-semibold mb-0 page-title text-capitalize">About Us</h4>
					<div class="border-start col-auto">
						<ol class="align-items-center breadcrumb fw-medium mb-0">
							<li class="breadcrumb-item d-flex align-items-center">
								<a href="/" class="text-decoration-none"> <i class="fa-solid fa-house-chimney-crack fs-18"></i> </a>
							</li>
							<li class="breadcrumb-item d-flex align-items-center active" aria-current="page">Who we are</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="py-5">
			<div class="container py-4">
				<div class="row">
					<div class="col-xl-10 mb-5">
						<h1 class="display-6 fw-bold">We embrace a proactive <span class="underline position-relative text-primary">CAN DO</span>  mindset, tackling challenges head-on.</h1>
						<p class="fs-17 mb-0">Our commitment to continuous improvement drives us to seek innovative solutions for both our team and our systems.</p>	
					</div>
				</div>
				
				<div class="about-text align-items-center g-4 justify-content-between row">
					<div class="col-md-12 col-lg-7">
						<div class="row g-3 g-sm-4 align-items-center">
							<!-- Image -->
							<div class="col-6">
								<div class="position-relative">
									<div class="line-shape"></div> <img src="<?php echo URLROOT ?>assets/images/ab1.webp" class="img-fluid rounded-3 position-relative" alt="">
								</div>
							</div>
							<div class="col-6">
								<div class="row g-3 g-sm-4">
									<!-- Image -->
									<div class="col-12"> <img src="<?php echo URLROOT ?>assets/images/pr2.webp" class="img-fluid rounded-3" alt=""> </div>
									<!-- Image -->
									<div class="col-12"> <img src="<?php echo URLROOT ?>assets/images/ab2.webp" class="img-fluid rounded-3" alt=""> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-5 ps-xxl-5">
				
						<!-- About Section -->
						<div class="container py-5">
							<div class="text-block" data-aos="fade-up">
								<h6 class="fs-14 fw-bold heading-sm l-spacing-1 position-relative text-primary text-uppercase">
									<?php echo htmlspecialchars($about['title']); ?>
								</h6>
								<p class="mb-4"><?php echo htmlspecialchars($about['paragraph1']); ?></p>
								<p class="mb-4"><?php echo htmlspecialchars($about['paragraph2']); ?></p>
								<p class="mb-4"><?php echo htmlspecialchars($about['paragraph3']); ?></p>
								<hr class="mt-5">
								<h4 class="mb-4"><?php echo htmlspecialchars($about['methodology_title']); ?></h4>
								<ul class="list-checked mb-9 mb-md-10 ps-0">
									<li><?php echo htmlspecialchars($about['methodology_item1']); ?></li>
									<li><?php echo htmlspecialchars($about['methodology_item2']); ?></li>
									<li><?php echo htmlspecialchars($about['methodology_item3']); ?></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		

		<!-- Start Customers Section -->
		<div class="py-5 bg-gradient-primary">
			<div class="container py-4">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<!-- Start Section Header Title -->
						<div class="section-header text-center mb-5" data-aos="fade-up">
							<!-- Start Subtitle -->
							<div class="bg-soft-primary d-inline-block fw-medium mb-3 rounded-pill section-header__subtitle text-capitalize text-primary"><?php echo htmlspecialchars($clients['subtitle']); ?></div>
							<!-- /. End Subtitle -->
							<h4 class="h4 fw-semibold mb-3 section-header__title text-capitalize"><?php echo htmlspecialchars($clients['title']); ?></h4>
						</div>
						<!--/. End Section Header -->
					</div>
				</div>
				<div class="row align-items-center justify-content-center g-4 g-xl-5" data-aos="fade-up" data-aos-delay="100">
					<div class="col-6 col-sm-3 col-xxl text-center">
						<ul class="list-checked">
							<?php foreach ($list1_clients as $client): ?>
								<li><?php echo htmlspecialchars($client); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-6 col-sm-3 col-xxl text-center">
						<ul class="list-checked">
							<?php foreach ($list2_clients as $client): ?>
								<li><?php echo htmlspecialchars($client); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /. End Customers Section -->
	
	</div>


<?php include ('includes/footer.php'); ?>