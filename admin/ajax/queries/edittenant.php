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

$getid = $mysqli->query("select * from properties where propertyname = '$tenantproperty'");
$resid = $getid->fetch_assoc();
$propertyid = $resid['id'];
$i_index = mysqli_real_escape_string($mysqli, $_POST['i_index']);


//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("UPDATE `tenants`
SET 
  `tenantname` = '$tenantname',
  `tenantproperty` = '$propertyid',
  `tenanttelephone` = '$tenanttelephone',
  `tenantemail` = '$tenantemail',
  `tenantdatecommenced` = '$tenantdatecommenced',
  `tenantdatecompleted` = '$tenantdatecompleted',
  `tenantrates` = '$tenantrates',
  `tenantdescription` = '$tenantdescription'
  
WHERE `id` = '$i_index'") or die(mysqli_error($mysqli));

echo 1;



?>