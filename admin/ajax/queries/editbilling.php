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
$i_index = mysqli_real_escape_string($mysqli, $_POST['i_index']);

$getid = $mysqli->query("select * from tenants where tenantname = '$billingtenant'");
$resid = $getid->fetch_assoc();
$tenantid = $resid['id'];

//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("UPDATE `billing`
SET 
  `billingtype` = '$billingtype',
  `billingtypeother` = '$billingtypeother',
  `billingtenant` = '$tenantid',
  `billingfor` = '$billingfor',
  `billingamount` = '$billingamount',
  `billingmonthnumber` = '$billingmonthnumber',
  `billingdate` = '$billingdate',
  `billdelivered` = '$billdelivered',
  `billingdescription` = '$billingdescription'
  
WHERE `id` = '$i_index'") or die(mysqli_error($mysqli));

echo 1;



?>