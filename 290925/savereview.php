<?php
include('config.php');

ob_start();
system('ipconfig /all');
$mycom=ob_get_contents();
ob_clean();
$findme = 'physique';
$pmac = strpos($mycom, $findme);
$mac_address = substr($mycom,($pmac+33),17);

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip_address=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip_address=$_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;

}
$ip_add = getRealIpAddr();

$reviewname = mysqli_real_escape_string($mysqli, $_POST['reviewname']);
$reviewtitle = mysqli_real_escape_string($mysqli, $_POST['reviewtitle']);
$reviewtext = mysqli_real_escape_string($mysqli, $_POST['reviewtext']);
$blogid = mysqli_real_escape_string($mysqli, $_POST['blogid']);
$today = date('Y-m-d H:i:s');

$mysqli->query("INSERT INTO `taymac_blog_review`
            (
             `reviewname`,
             `reviewtitle`,
             `reviewtext`,
             `dateposted`,
             `blogid`,
             `macaddress`,
             `ipaddress`
             )
VALUES (
        '$reviewname',
        '$reviewtitle',
        '$reviewtext',
        '$today',
        '$blogid',
        '$mac_address',
        '$ip_add'
        )
") or die(mysqli_error($mysqli));
