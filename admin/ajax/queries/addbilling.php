<?php

include('../../config.php');

$billingtype = mysqli_real_escape_string($mysqli, $_POST['billingtype']);
$billingtypeother = mysqli_real_escape_string($mysqli, $_POST['billingtypeother']);
$billingtenant = mysqli_real_escape_string($mysqli, $_POST['billingtenant']);
$billingfor = mysqli_real_escape_string($mysqli, $_POST['billingfor']);
$billingamount = mysqli_real_escape_string($mysqli, $_POST['billingamount']);
$billingmonthnumber = mysqli_real_escape_string($mysqli, $_POST['billingmonthnumber']);
$billingdate = mysqli_real_escape_string($mysqli, $_POST['billingdate']);
$billdelivered = mysqli_real_escape_string($mysqli, $_POST['billdelivered']);
$billingdescription = mysqli_real_escape_string($mysqli, $_POST['billingdescription']);

//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("INSERT INTO `billing`
            (`billingtype`,
             `billingtypeother`,
             `billingtenant`,
             `billingfor`,
             `billingamount`,
             `billingmonthnumber`,
             `billingdate`,
             `billdelivered`,
             `billingdescription`,
             `billingperiod`)
VALUES ('$billingtype',
        '$billingtypeother',
        '$billingtenant',
        '$billingfor',
        '$billingamount',
        '$billingmonthnumber',
        '$billingdate',
        '$billdelivered',
        '$billingdescription',
        '$datetime')") or die(mysqli_error($mysqli));

echo 1;



?>