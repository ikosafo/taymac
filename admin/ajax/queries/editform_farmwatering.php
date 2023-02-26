<?php
include('../../../config.php');

$cycle = mysqli_real_escape_string($mysqli, $_POST['cycle']);
$tunnel = mysqli_real_escape_string($mysqli, $_POST['tunnel']);
$product = mysqli_real_escape_string($mysqli, $_POST['product']);
$input_kg = mysqli_real_escape_string($mysqli, $_POST['input_kg']);
$input_g = mysqli_real_escape_string($mysqli, $_POST['input_g']);
$time_start = mysqli_real_escape_string($mysqli, $_POST['time_start']);
$time_end = mysqli_real_escape_string($mysqli, $_POST['time_end']);
$date_activity = mysqli_real_escape_string($mysqli, $_POST['date_activity']);
$activity_description = mysqli_real_escape_string($mysqli, $_POST['activity_description']);
$theindex = mysqli_real_escape_string($mysqli, $_POST['theindex']);
$datetime = date('Y-m-d H:i:s');

$getproductid = $mysqli->query("select * from farm_products where product_name = '$product'");
$resid = $getproductid->fetch_assoc();
$productid = $resid['id'];

$gettunnelid = $mysqli->query("select * from farm_funnel where funnel_name = '$tunnel'");
$restid = $gettunnelid->fetch_assoc();
$tunnelid = $restid['id'];


$mysqli->query("UPDATE `farm_watering`
SET
  `starttime` = '$time_start',
  `endtime` = '$time_end',
  `cycle` = '$cycle',
  `tunnel` = '$tunnelid',
  `product` = '$productid',
  `input_kg` = '$input_kg',
  `input_g` = '$input_g',
  `date_activity` = '$date_activity',
  `activity_description` = '$activity_description'

WHERE `id` = '$theindex'") or die(mysqli_error($mysqli));

echo 1;
