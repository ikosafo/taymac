<?php
include('../../../config.php');

$tenant_name = mysqli_real_escape_string($mysqli, $_POST['tenant_name']);
$tenant_property = mysqli_real_escape_string($mysqli, $_POST['tenant_property']);
$date_started = mysqli_real_escape_string($mysqli, $_POST['date_started']);
$date_completed = mysqli_real_escape_string($mysqli, $_POST['date_completed']);
$tenant_telephone = mysqli_real_escape_string($mysqli, $_POST['tenant_telephone']);
$tenant_email = mysqli_real_escape_string($mysqli, $_POST['tenant_email']);
$tenant_description = mysqli_real_escape_string($mysqli, $_POST['tenant_description']);
$payment_rate = mysqli_real_escape_string($mysqli, $_POST['payment_rate']);
$datetime = date("Y-m-d H:i:s");

$mysqli->query("INSERT INTO `admin_taymac_tenant`
            (`tenant_name`,
             `tenant_property`,
             `date_started`,
             `date_completed`,
             `tenant_telephone`,
             `tenant_email`,
             `tenant_description`,
             `payment_rate`)
VALUES ('$tenant_name',
        '$tenant_property',
        '$date_started',
        '$date_completed',
        '$tenant_telephone',
        '$tenant_email',
        '$tenant_description',
        '$payment_rate')") or die(mysqli_error($mysqli));

echo 1;
