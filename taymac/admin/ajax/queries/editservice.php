<?php

include('../../config.php');

$servicetenant = mysqli_real_escape_string($mysqli, $_POST['servicetenant']);
$servicetype = mysqli_real_escape_string($mysqli, $_POST['servicetype']);
$servicetypeother = mysqli_real_escape_string($mysqli, $_POST['servicetypeother']);
$servicecost = mysqli_real_escape_string($mysqli, $_POST['servicecost']);
$servicedate = mysqli_real_escape_string($mysqli, $_POST['servicedate']);
$servicedescription = mysqli_real_escape_string($mysqli, $_POST['servicedescription']);
$i_index = mysqli_real_escape_string($mysqli, $_POST['i_index']);

$getid = $mysqli->query("select * from tenants where tenantname = '$servicetenant'");
$resid = $getid->fetch_assoc();
$tenantid = $resid['id'];

//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("UPDATE `service`
SET 
  `servicetype` = '$servicetype',
  `servicetypeother` = '$servicetypeother',
  `servicetenant` = '$tenantid',
  `servicecost` = '$servicecost',
  `servicedate` = '$servicedate',
  `servicedescription` = '$servicedescription'
  
WHERE `id` = '$i_index'") or die(mysqli_error($mysqli));

echo 1;



?>