<?php
include("../../../config.php");

// Function to get IP address
function getIpAddress() {
    $ip_address = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}

// Function to get MAC address (Linux-based servers)
function getMacAddress($ip_address) {
    $mac_address = 'Unknown';
    try {
        // Execute arp command to get MAC address
        $output = shell_exec("arp -a " . escapeshellarg($ip_address));
        if ($output) {
            preg_match('/([a-fA-F0-9:]{17})/', $output, $matches);
            if (!empty($matches[1])) {
                $mac_address = $matches[1];
            }
        }
    } catch (Exception $e) {
        // Handle errors silently
        $mac_address = 'Unknown';
    }
    return $mac_address;
}

// Get IP and MAC address
$ip_add = getIpAddress();
$mac_address = getMacAddress($ip_add);

$username = $_POST['username'];
$pass = $_POST['password'];
$password = md5($pass);

$res = $mysqli->query("SELECT * FROM taymac_mis_users WHERE `username` = '$username'
                                       AND `password` = '$password'");
$getdetails = $res->fetch_assoc();
$rowcount = mysqli_num_rows($res);

$today = date("Y-m-d H:i:s");

$full_name = $getdetails['full_name'];
$password = $getdetails['password'];
$user_id = $getdetails['user_id'];
$user_type = $getdetails['usertype'];

$_SESSION['full_name'] = $full_name;
$_SESSION['password'] = $password;
$_SESSION['user_id'] = $user_id;
$_SESSION['user_type'] = $user_type;
$_SESSION['username'] = $username;

if ($rowcount == "0") {
    $mysqli->query("INSERT INTO `taymac_logs_mis`
            (`message`,
             `logdate`,
             `username`,
             `mac_address`,
             `ip_address`,
             `action`)
    VALUES ('Log In Error (Wrong Username or Password)',
            '$today',
            '$username',
            '$mac_address',
            '$ip_add',
            'Failed')") or die(mysqli_error($mysqli));
    echo 2;
} else {
    $mysqli->query("INSERT INTO `taymac_logs_mis`
            (`message`,
             `logdate`,
             `username`,
             `mac_address`,
             `ip_address`,
             `action`)
    VALUES ('Logged in Successfully',
            '$today',
            '$username',
            '$mac_address',
            '$ip_add',
            'Successful')") or die(mysqli_error($mysqli));
    echo 1;
}
?>