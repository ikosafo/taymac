<?php

include('../../config.php');

$servicetenant = mysqli_real_escape_string($mysqli, $_POST['servicetenant']);
$servicetype = mysqli_real_escape_string($mysqli, $_POST['servicetype']);
$servicetypeother = mysqli_real_escape_string($mysqli, $_POST['servicetypeother']);
$servicecost = mysqli_real_escape_string($mysqli, $_POST['servicecost']);
$servicedate = mysqli_real_escape_string($mysqli, $_POST['servicedate']);
$servicedescription = mysqli_real_escape_string($mysqli, $_POST['servicedescription']);

//$password = md5($pass);

$datetime = date("Y-m-d H:i:s");



$mysqli->query("INSERT INTO `service`
            (`servicetype`,
             `servicetypeother`,
             `servicetenant`,
             `servicecost`,
             `servicedate`,
             `servicedescription`,
             `serviceperiod`)
VALUES ('$servicetype',
        '$servicetypeother',
        '$servicetenant',
        '$servicecost',
        '$servicedate',
        '$servicedescription',
        '$datetime')") or die(mysqli_error($mysqli));

echo 1;



?>