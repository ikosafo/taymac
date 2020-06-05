<?php

include('../../config.php');

$propertyname = mysqli_real_escape_string($mysqli, $_POST['propertyname']);
$propertylocation = mysqli_real_escape_string($mysqli, $_POST['propertylocation']);
$propertytype = mysqli_real_escape_string($mysqli, $_POST['propertytype']);
$propertydescription = mysqli_real_escape_string($mysqli, $_POST['propertydescription']);
$propertyaddress = mysqli_real_escape_string($mysqli, $_POST['propertyaddress']);
$i_index = mysqli_real_escape_string($mysqli, $_POST['i_index']);


//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("UPDATE `properties`
SET 
  `propertyname` = '$propertyname',
  `propertylocation` = '$propertylocation',
  `propertytype` = '$propertytype',
  `propertydescription` = '$propertydescription',
  `propertyaddress` = '$propertyaddress'
WHERE `id` = '$i_index'") or die(mysqli_error($mysqli));

echo 1;



?>