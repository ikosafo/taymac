<?php
include('../../../config.php');

$amount_paid = mysqli_real_escape_string($mysqli, $_POST['amount_paid']);
$theindex = mysqli_real_escape_string($mysqli, $_POST['theindex']);
$datepaid = date('Y-m-d H:i:s');

$getamtpaid = $mysqli->query("select * from admin_taymac_billing where id = '$theindex'");
$resamtpaid = $getamtpaid->fetch_assoc();
$amtpaid = $resamtpaid['amt_paid'];
$updatedamt = $amtpaid + $amount_paid;



$mysqli->query("INSERT INTO `admin_bill_payments`
            (
             `billid`,
             `amountpaid`,
             `datepaid`)
VALUES (
    '$theindex',
    '$amount_paid',
    '$datepaid')") or die(mysqli_error($mysqli));


$mysqli->query("UPDATE `admin_taymac_billing`
SET
  `amt_paid` = '$updatedamt'

WHERE `id` = '$theindex'") or die(mysqli_error($mysqli));

echo 1;
