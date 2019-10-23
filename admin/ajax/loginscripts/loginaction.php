<?php
include("../../config.php");

$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$pass = mysqli_real_escape_string($mysqli, $_POST['password']);
$password = md5($pass);

$res = $mysqli->query("SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'");
$getdetails = $res->fetch_assoc();
$rowcount = mysqli_num_rows($res);

$today = date("Y-m-d H:i:s");
$fullname = $getdetails['fullname'];
$password = $getdetails['password'];
$userid = $getdetails['id'];
$status = $getdetails['status'];

$_SESSION['fullname'] = $fullname;
$_SESSION['password'] = $password;
$_SESSION['userid'] = $userid;
$_SESSION['status'] = $status;
$_SESSION['username'] = $username;

if ($rowcount == "0") {
    echo 2;

}
else {
    echo 1;
}

?>