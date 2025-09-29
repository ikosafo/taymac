<?php
include('config.php');

$star = $_POST['star'];
$blogid = $_POST['blogid'];
$today = date('Y-m-d H:i:s');

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


if ($star == 'One Star') { $num = 1;?>
    <ul>
        <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="2star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="3star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="4star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
    </ul>
<?php }
else if ($star == 'Two Stars') {$num = 2;
?>

    <ul>
        <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="3star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="4star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
    </ul>

<?php }
else if ($star == 'Three Stars') { $num = 3;
    ?>
    <ul>
        <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="3star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="4star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
    </ul>
<?php }
else if ($star == 'Four Stars') { $num = 4;
    ?>

    <ul>
        <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="3star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="4star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                <i class="fa fa-star"></i></a>
        </li>
    </ul>

<?php }
else if ($star == 'Five Stars') { $num = 5;
    ?>

    <ul>
        <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="3star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="4star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
        <li class="list-inline-item"><a href="#" id="5star" style="color:#bcc52a !important;">
                <i class="fa fa-star"></i></a>
        </li>
    </ul>

<?php }


$mysqli->query("INSERT INTO `taymac_blog_rating`
            (
             `dateposted`,
             `rating`,
             `macaddress`,
             `ipaddress`,
             `postid`,
             `ratenum`
             )
VALUES (
        '$today',
        '$star',
        '$mac_address',
        '$ip_add',
        '$blogid',
        '$num'
        )") or die(mysqli_error($mysqli));

//echo 1;



