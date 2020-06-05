<?php

include('../../config.php');

$tenantname = mysqli_real_escape_string($mysqli, $_POST['tenantname']);
$tenantproperty = mysqli_real_escape_string($mysqli, $_POST['tenantproperty']);
$tenanttelephone = mysqli_real_escape_string($mysqli, $_POST['tenanttelephone']);
$tenantemail = mysqli_real_escape_string($mysqli, $_POST['tenantemail']);
$tenantdatecommenced = mysqli_real_escape_string($mysqli, $_POST['tenantdatecommenced']);
$tenantdatecompleted = mysqli_real_escape_string($mysqli, $_POST['tenantdatecompleted']);
$tenantrates = mysqli_real_escape_string($mysqli, $_POST['tenantrates']);
$tenantdescription = mysqli_real_escape_string($mysqli, $_POST['tenantdescription']);

//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("INSERT INTO `tenants`
            (`tenantname`,
             `tenantproperty`,
             `tenanttelephone`,
             `tenantemail`,
             `tenantdatecommenced`,
             `tenantdatecompleted`,
             `tenantrates`,
             `tenantdescription`,
             `tenantperiod`)
VALUES ('$tenantname',
        '$tenantproperty',
        '$tenanttelephone',
        '$tenantemail',
        '$tenantdatecommenced',
        '$tenantdatecompleted',
        '$tenantrates',
        '$tenantdescription',
        '$datetime')") or die(mysqli_error($mysqli));

echo 1;



?>