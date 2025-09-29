<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

// Include database configuration
require_once 'config.php';


// Fetch properties
$query = "SELECT * FROM ws_properties ORDER BY id";
$result = $mysqli->query($query);
$properties = [];
if (!$result) {
    error_log('Fetch properties query failed: ' . $mysqli->error);
} else {
    while ($row = $result->fetch_assoc()) {
        $properties[] = $row;
    }
}
error_log('Fetched properties: ' . print_r($properties, true));

// Fetch "What we do" content
$query = "SELECT * FROM ws_property_content WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch property content query failed: ' . $mysqli->error);
    $content = [
        'subtitle' => 'What we do',
        'paragraph1' => 'At Taymac, we deliver an exceptional property management experience that preserves and enhances the asset value of your property throughout its lifespan. Our highly skilled team is dedicated to providing top-tier service in maintaining and protecting the quality of properties under our care.',
        'paragraph2' => 'As a full-service residential, non-residential, and commercial property management company operating in Ghana, we leverage our expertise, the latest technology, and superior customer service to ensure a seamless, stress-free experience for property owners. Our clientele includes prominent diplomatic missions and a range of organizations in Ghana.',
        'paragraph3' => 'In addition to property management, we also offer comprehensive office fit-out services for banks and multinational corporations across Ghana. Specializing in aluminium glazing and office partitions, we work with both glass and gypsum board materials to create customized solutions. With Taymac, property owners can maximize the financial benefits of their assets without the complexities of handling time-consuming management tasks.',
        'paragraph4' => 'Being a landlord goes far beyond collecting rent; it includes addressing challenges like dealing with difficult tenants, coordinating major and minor repairs, and maintaining the overall value of the property. We also handle move-ins, inspections, contractor management, and all necessary paperwork. At Taymac, we take care of every aspect of property management, both big and small, providing our clients with the confidence that their property is in trusted hands.',
        'list_item1' => 'Security management to safeguard your property.',
        'list_item2' => 'Ensuring compliance with Health, Safety, Security, and Environmental (HSSE) standards.',
        'list_item3' => 'Daily janitorial services for a clean and well-maintained environment.',
        'list_item4' => 'Implementation of planned preventative and reactive maintenance schedules to preserve the value and functionality of your property.',
        'list_item5' => 'Internal office fit-outs, specializing in aluminium glazing and gypsum board partitions tailored to your requirements.'
    ];
} else {
    $content = $result->fetch_assoc();
    if (!$content) {
        $content = [
            'subtitle' => 'What we do',
            'paragraph1' => 'At Taymac, we deliver an exceptional property management experience that preserves and enhances the asset value of your property throughout its lifespan. Our highly skilled team is dedicated to providing top-tier service in maintaining and protecting the quality of properties under our care.',
            'paragraph2' => 'As a full-service residential, non-residential, and commercial property management company operating in Ghana, we leverage our expertise, the latest technology, and superior customer service to ensure a seamless, stress-free experience for property owners. Our clientele includes prominent diplomatic missions and a range of organizations in Ghana.',
            'paragraph3' => 'In addition to property management, we also offer comprehensive office fit-out services for banks and multinational corporations across Ghana. Specializing in aluminium glazing and office partitions, we work with both glass and gypsum board materials to create customized solutions. With Taymac, property owners can maximize the financial benefits of their assets without the complexities of handling time-consuming management tasks.',
            'paragraph4' => 'Being a landlord goes far beyond collecting rent; it includes addressing challenges like dealing with difficult tenants, coordinating major and minor repairs, and maintaining the overall value of the property. We also handle move-ins, inspections, contractor management, and all necessary paperwork. At Taymac, we take care of every aspect of property management, both big and small, providing our clients with the confidence that their property is in trusted hands.',
            'list_item1' => 'Security management to safeguard your property.',
            'list_item2' => 'Ensuring compliance with Health, Safety, Security, and Environmental (HSSE) standards.',
            'list_item3' => 'Daily janitorial services for a clean and well-maintained environment.',
            'list_item4' => 'Implementation of planned preventative and reactive maintenance schedules to preserve the value and functionality of your property.',
            'list_item5' => 'Internal office fit-outs, specializing in aluminium glazing and gypsum board partitions tailored to your requirements.'
        ];
    }
}
error_log('Fetched property content: ' . print_r($content, true));


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
                            <li class="breadcrumb-item d-flex align-items-center active" aria-current="page">Property Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
			<!-- Start Property Section -->
            <div class="container py-4">
                <div class="about-text align-items-center g-4 justify-content-between row">
                    <div class="col-md-12 col-lg-7">
                        <div class="row g-4 justify-content-center">
                            <?php foreach ($properties as $index => $property): ?>
                                <div class="col-sm-6 col-lg-4 col-xl-6 d-flex aos-init aos-animate" data-aos-delay="<?php echo 300 + ($index * 100); ?>">
                                    <div class="border-0 card card-property rounded-3 shadow w-100 flex-fill overflow-hidden">
                                        <a href="#" class="card-link"></a>
                                        <div class="property-img card-image-hover overflow-hidden">
                                            <img src="<?php echo URLROOT . htmlspecialchars($property['image']); ?>" alt="" class="img-fluid">
                                            <div class="bg-white card-property-badge d-inline-block end-1 fs-13 fw-semibold position-absolute property-tags px-2 py-1 rounded-3 text-dark top-1">
                                                <?php echo htmlspecialchars($property['status']); ?>
                                            </div>
                                        </div>
                                        <div class="card-property-content-wrap d-flex flex-column h-100 position-relative p-4">
                                            <h4 class="property-card-title mb-3"><?php echo htmlspecialchars($property['title']); ?></h4>
                                            <div class="card-property-description mb-3"><?php echo htmlspecialchars($property['description']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 ps-xxl-5">
                        <div class="text-block">
                            <h6 class="fs-14 fw-bold heading-sm l-spacing-1 position-relative text-primary text-uppercase">
                                <?php echo htmlspecialchars($content['subtitle']); ?>
                            </h6>
                            <p class="mb-4"><?php echo htmlspecialchars($content['paragraph1']); ?></p>
                            <p><?php echo htmlspecialchars($content['paragraph2']); ?></p>
                            <p><?php echo htmlspecialchars($content['paragraph3']); ?></p>
                            <p><?php echo htmlspecialchars($content['paragraph4']); ?></p>
                            <hr class="mt-5">
                            <p class="mb-4">Taymac offers comprehensive property and facilities management solutions, ensuring every aspect of your property is expertly managed. Our services include:</p>
                            <ul class="list-checked mb-9 mb-md-10 ps-0">
                                <li><?php echo htmlspecialchars($content['list_item1']); ?></li>
                                <li><?php echo htmlspecialchars($content['list_item2']); ?></li>
                                <li><?php echo htmlspecialchars($content['list_item3']); ?></li>
                                <li><?php echo htmlspecialchars($content['list_item4']); ?></li>
                                <li><?php echo htmlspecialchars($content['list_item5']); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.End Property Section -->
		</div>
    </div>

<?php include ('includes/footer.php'); ?>