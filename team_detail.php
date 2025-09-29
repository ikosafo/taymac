<?php
// team_detail.php

require_once 'config.php';

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', 'C:\wamp64\logs\php_error.log');

// Get team member ID
$member_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($member_id < 1 || $member_id > 2) {
    header('Location: team.php');
    exit;
}

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
error_log('Fetched team data for member ' . $member_id . ': ' . print_r($team, true));

// Select member data based on ID
$member = [];
if ($member_id == 1) {
    $member = [
        'name' => $team['member1_name'],
        'role' => $team['member1_role'],
        'email' => $team['member1_email'],
        'phone' => $team['member1_phone'],
        'description1' => $team['member1_description1'],
        'description2' => $team['member1_description2'],
        'description3' => $team['member1_description3']
    ];
} elseif ($member_id == 2) {
    $member = [
        'name' => $team['member2_name'],
        'role' => $team['member2_role'],
        'email' => $team['member2_email'],
        'phone' => $team['member2_phone'],
        'description1' => $team['member2_description1'],
        'description2' => $team['member2_description2'],
        'description3' => $team['member2_description3']
    ];
}

$page_title = htmlspecialchars($member['name']) . ' - Team';

require_once 'includes/header.php';
?>

<!-- Start Team Member Detail Section -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="agent-card shadow p-4 rounded-4 text-center position-relative">
                <h5 class="mt-4 mb-1"><?php echo htmlspecialchars($member['name']); ?></h5>
                <div class="text-primary fw-medium"><?php echo htmlspecialchars($member['role']); ?></div>
                <div class="d-flex flex-wrap gap-2 justify-content-center mt-3 position-relative z-1">
                    <button type="button" class="btn btn-outline-default btn-sm fw-medium">
                        <i class="fa fa-user-tie fs-14 fs-e me-1"></i><?php echo htmlspecialchars($member['email']); ?>
                    </button>
                    <button type="button" class="btn btn-outline-default btn-sm fw-medium">
                        <i class="fa fa-phone fs-14 me-1"></i><?php echo htmlspecialchars($member['phone']); ?>
                    </button>
                </div>
                <hr class="mt-3">
                <div class="mt-3"><?php echo htmlspecialchars($member['description1']); ?></div>
                <p class="mt-2"><?php echo htmlspecialchars($member['description2']); ?></p>
                <p class="mt-2"><?php echo htmlspecialchars($member['description3']); ?></p>
                <a href="team.php" class="btn btn-primary btn-sm hstack mx-auto mt-3 gap-2" data-aos="fade-up">
                    <span>Back to Team</span>
                    <span class="vr"></span>
                    <i class="fa-arrow-left fa-solid fs-14"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /. End Team Member Detail Section -->

<?php require_once 'includes/footer.php'; ?>