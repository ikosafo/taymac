<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

// Include database configuration
require_once 'config.php';


// Fetch team data
$query = "SELECT * FROM ws_team WHERE id = 1";
$result = $mysqli->query($query);
if (!$result) {
    error_log('Fetch team query failed: ' . $mysqli->error);
    $team = [
        'member1_name' => 'MR. JOSHUA M.K. KPAKPAH (Jnr.)',
        'member1_role' => 'DIRECTOR',
        'member1_email' => 'info@taymac.net',
        'member1_phone' => '+ 233 (0) 266-107-130',
        'member1_description1' => 'Mr. Kpakpah holds a Bachelor of Arts degree in Geography and Resource Development. He is a licensed Customs House Agent and a trained Project Management Professional, currently pursuing certification and licensing. Additionally, he possesses the NEBOSH International General Certificate in Safety and Health and is a registered IOSH-approved trainer, which enables him to deliver Managing Safely courses globally. Mr. Kpakpah is also undergoing training to become a Lead Auditor for OHSAS 18001 and ISO 14001 standards.',
        'member1_description2' => 'He has over 17 years of work experience, including four years in logistics handling, port clearing, warehousing, and supply chain management for a multinational company in Ghana.',
        'member1_description3' => 'Joshua has over six years of experience as a Local Operations and Safety Manager at Independent Commodity Supplies Limited, a UK-based firm. In this role, he was responsible for overseeing the company\'s local operations, which included material sourcing, the transportation of supplies—encompassing hazardous cargo—warehousing, safety compliance, and stock control. His expertise in these areas contributed to the efficient and safe management of operations within the organization. Joshua is currently a Director at a salt works in Ghana and serves as a Health, Safety, and Environment (HSE) Tutor, recognized for his engaging, straightforward, and interactive training sessions. He is passionate about guiding organizations to adopt preventative rather than reactionary safety measures, believing this approach enhances business performance while ensuring a safe working environment. In addition, Joshua leads Taymac, collaborating with both local and international partners to drive safety initiatives and operational excellence.',
        'member2_name' => 'MR. MAXMILLAN KOFI MADDY',
        'member2_role' => 'CONSULTANT',
        'member2_email' => 'info@taymac.net',
        'member2_phone' => '00447860271867',
        'member2_description1' => 'Maxmillan Kofi Maddy is a qualified Technician Safety and Health Practitioner who holds the NEBOSH Construction and Risk Management Certificate. In addition to this, he possesses several specialized qualifications, including Risk Assessor and COSHH (Control of Substances Hazardous to Health) Assessor. He is also certified as a City and Guilds Train the Trainer, enabling him to effectively deliver training programs in safety and health practices.',
        'member2_description2' => 'He has 10 years of experience in the Health and Safety industry, including 6 years as a Health and Safety Systems Owner for Boots Alliance Plc, a multinational manufacturing company specializing in pharmaceuticals and wellness products. Additionally, he has spent 4 years working as a Health and Safety Advisor within local government. During this period, Max has acquired extensive experience in various areas, including workplace and manual handling risk assessments, interpreting relevant legislation, conducting accident investigations, and coaching and assessing staff against Standard Operating Procedures. He has successfully implemented and maintained Health and Safety Management Systems (OHSAS 18001), developed and reviewed safety policies, conducted internal audits, and provided general Health and Safety training. As an IOSH-approved trainer, Max delivers the Managing Safely Course and holds a NEBOSH Diploma in Occupational Safety and Health, further enhancing his qualifications in the field.',
        'member2_description3' => 'Max\'s commitment to safety is unparalleled, and he is dedicated to fostering a safe and productive working environment. He served as the Health Safety Advisor for Nottinghamshire Council in the United Kingdom from 2012 to 2015. Currently, he holds the position of Senior HSSE Advisor at S&T (UK), a leading global player in the construction industry. His expertise and proactive approach to health, safety, security, and environmental management significantly contribute to organizational success and employee well-being.'
    ];
} else {
    $team = $result->fetch_assoc();
    if (!$team) {
        $team = [
            'member1_name' => 'MR. JOSHUA M.K. KPAKPAH (Jnr.)',
            'member1_role' => 'DIRECTOR',
            'member1_email' => 'info@taymac.net',
            'member1_phone' => '+ 233 (0) 266-107-130',
            'member1_description1' => 'Mr. Kpakpah holds a Bachelor of Arts degree in Geography and Resource Development. He is a licensed Customs House Agent and a trained Project Management Professional, currently pursuing certification and licensing. Additionally, he possesses the NEBOSH International General Certificate in Safety and Health and is a registered IOSH-approved trainer, which enables him to deliver Managing Safely courses globally. Mr. Kpakpah is also undergoing training to become a Lead Auditor for OHSAS 18001 and ISO 14001 standards.',
            'member1_description2' => 'He has over 17 years of work experience, including four years in logistics handling, port clearing, warehousing, and supply chain management for a multinational company in Ghana.',
            'member1_description3' => 'Joshua has over six years of experience as a Local Operations and Safety Manager at Independent Commodity Supplies Limited, a UK-based firm. In this role, he was responsible for overseeing the company\'s local operations, which included material sourcing, the transportation of supplies—encompassing hazardous cargo—warehousing, safety compliance, and stock control. His expertise in these areas contributed to the efficient and safe management of operations within the organization. Joshua is currently a Director at a salt works in Ghana and serves as a Health, Safety, and Environment (HSE) Tutor, recognized for his engaging, straightforward, and interactive training sessions. He is passionate about guiding organizations to adopt preventative rather than reactionary safety measures, believing this approach enhances business performance while ensuring a safe working environment. In addition, Joshua leads Taymac, collaborating with both local and international partners to drive safety initiatives and operational excellence.',
            'member2_name' => 'MR. MAXMILLAN KOFI MADDY',
            'member2_role' => 'CONSULTANT',
            'member2_email' => 'info@taymac.net',
            'member2_phone' => '00447860271867',
            'member2_description1' => 'Maxmillan Kofi Maddy is a qualified Technician Safety and Health Practitioner who holds the NEBOSH Construction and Risk Management Certificate. In addition to this, he possesses several specialized qualifications, including Risk Assessor and COSHH (Control of Substances Hazardous to Health) Assessor. He is also certified as a City and Guilds Train the Trainer, enabling him to effectively deliver training programs in safety and health practices.',
            'member2_description2' => 'He has 10 years of experience in the Health and Safety industry, including 6 years as a Health and Safety Systems Owner for Boots Alliance Plc, a multinational manufacturing company specializing in pharmaceuticals and wellness products. Additionally, he has spent 4 years working as a Health and Safety Advisor within local government. During this period, Max has acquired extensive experience in various areas, including workplace and manual handling risk assessments, interpreting relevant legislation, conducting accident investigations, and coaching and assessing staff against Standard Operating Procedures. He has successfully implemented and maintained Health and Safety Management Systems (OHSAS 18001), developed and reviewed safety policies, conducted internal audits, and provided general Health and Safety training. As an IOSH-approved trainer, Max delivers the Managing Safely Course and holds a NEBOSH Diploma in Occupational Safety and Health, further enhancing his qualifications in the field.',
            'member2_description3' => 'Max\'s commitment to safety is unparalleled, and he is dedicated to fostering a safe and productive working environment. He served as the Health Safety Advisor for Nottinghamshire Council in the United Kingdom from 2012 to 2015. Currently, he holds the position of Senior HSSE Advisor at S&T (UK), a leading global player in the construction industry. His expertise and proactive approach to health, safety, security, and environmental management significantly contribute to organizational success and employee well-being.'
        ];
    }
}
error_log('Fetched team data: ' . print_r($team, true));


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
                            <li class="breadcrumb-item d-flex align-items-center active" aria-current="page">Team</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Agent Content -->
        <div class="py-5">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <!-- Start Section Header Title -->
                        <div class="section-header text-center mb-5">
                            <!-- Start Section Header title -->
                            <h2 class="h1 fw-semibold mb-3 section-header__title text-capitalize">Meet Our <span class="underline position-relative text-primary">Team</span></h2>
                            <!-- /.End Section Header Title -->
                        <!--/. End Section Header -->
                    </div>
                </div>

                <!-- Start Team Section -->
                <div class="container py-5">
                    <div class="row g-4">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xxl-3">
                            <div class="agent-card shadow p-4 rounded-4 text-center position-relative">
                                <a href="team_detail.php?id=1" class="card-link"></a>
                                <h5 class="mt-4 mb-1"><?php echo htmlspecialchars($team['member1_name']); ?></h5>
                                <div class="text-primary fw-medium"><?php echo htmlspecialchars($team['member1_role']); ?></div>
                                <div class="d-flex flex-wrap gap-2 justify-content-center mt-3 position-relative z-1">
                                    <button type="button" class="btn btn-outline-default btn-sm fw-medium">
                                        <i class="fa fa-user-tie fs-14 fs-e me-1"></i><?php echo htmlspecialchars($team['member1_email']); ?>
                                    </button>
                                    <button type="button" class="btn btn-outline-default btn-sm fw-medium">
                                        <i class="fa fa-phone fs-14 me-1"></i><?php echo htmlspecialchars($team['member1_phone']); ?>
                                    </button>
                                </div>
                                <hr class="mt-3">
                                <div class="mt-3"><?php echo htmlspecialchars(substr($team['member1_description1'], 0, 900) . (strlen($team['member1_description1']) > 900 ? '...' : '')); ?></div>
                                <button type="button" class="btn btn-primary btn-sm hstack mx-auto mt-3 gap-2" data-aos="fade-up">
                                    <span>Read More</span>
                                    <span class="vr"></span>
                                    <i class="fa-arrow-right fa-solid fs-14"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xxl-3">
                            <div class="agent-card shadow p-4 rounded-4 text-center position-relative">
                                <a href="team_detail.php?id=2" class="card-link"></a>
                                <h5 class="mt-4 mb-1"><?php echo htmlspecialchars($team['member2_name']); ?></h5>
                                <div class="text-primary fw-medium"><?php echo htmlspecialchars($team['member2_role']); ?></div>
                                <div class="d-flex flex-wrap gap-2 justify-content-center mt-3 position-relative z-1">
                                    <button type="button" class="btn btn-outline-default btn-sm fw-medium">
                                        <i class="fa fa-user-tie fs-14 fs-e me-1"></i><?php echo htmlspecialchars($team['member2_email']); ?>
                                    </button>
                                    <button type="button" class="btn btn-outline-default btn-sm fw-medium">
                                        <i class="fa fa-phone fs-14 me-1"></i><?php echo htmlspecialchars($team['member2_phone']); ?>
                                    </button>
                                </div>
                                <hr class="mt-3">
                                <div class="mt-3"><?php echo htmlspecialchars(substr($team['member2_description1'], 0, 900) . (strlen($team['member2_description1']) > 900 ? '...' : '')); ?></div>
                                <button type="button" class="btn btn-primary btn-sm hstack mx-auto mt-3 gap-2" data-aos="fade-up">
                                    <span>Read More</span>
                                    <span class="vr"></span>
                                    <i class="fa-arrow-right fa-solid fs-14"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. End Team Section -->
            </div>
        </div>
        <!-- /. End Agent Content -->
    </div>

<?php include ('includes/footer.php'); ?>