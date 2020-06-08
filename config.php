<?php

define('USERNAME', 'newjodabri@gmail.com');
define('PASSWORD', 'jodabri@2019');
define('MFCEMAIL', 'info@ahpcgh.org');
define('MFCSENDEREMAIL', 'info@ahpcgh.org');
define('APPROOT', dirname(dirname( __FILE__ )));

date_default_timezone_set('UTC');

$mysqli= new mysqli('localhost:3308','root','root','taymac');

/*$reg_root = 'https://registration.ahpcgh.org';
$reg_root_side = 'https://registration.ahpcgh.org';*/

if($mysqli->connect_errno){
    echo"cannot connect MYSQLI error no{$mysqli->connect_errno}:{$mysqli->connect_errno}";
    exit();
}

session_start();


function lock($item){

    return base64_encode(base64_encode(base64_encode($item)));
}
function unlock($item){

    return base64_decode(base64_decode(base64_decode($item)));
}

function getBill($professionid,$registrationtype){
    global $mysqli;
    $getuser = "select amount from billings  where professionid ='$professionid' and registrationtype='$registrationtype'";
    $bill = $mysqli->query($getuser)->fetch_assoc();
    return $bill['amount'];
}




?>