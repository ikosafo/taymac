<?php

include('../../config.php');

$propertyname = mysqli_real_escape_string($mysqli, $_POST['propertyname']);
$propertylocation = mysqli_real_escape_string($mysqli, $_POST['propertylocation']);
$propertytype = mysqli_real_escape_string($mysqli, $_POST['propertytype']);
$propertydescription = mysqli_real_escape_string($mysqli, $_POST['propertydescription']);
$propertyaddress = mysqli_real_escape_string($mysqli, $_POST['propertyaddress']);

//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("INSERT INTO `properties`
            (`propertyname`,
             `propertylocation`,
             `propertytype`,
             `propertydescription`,
             `propertyaddress`,
             `propertyperiod`)
VALUES ('$propertyname',
        '$propertylocation',
        '$propertytype',
        '$propertydescription',
        '$propertyaddress',
        '$datetime')") or die(mysqli_error($mysqli));

echo 1;



?>