<?php
include('../../config.php');

$i_index=$_POST['i_index'];
$mysqli->query("delete from billing where id='$i_index'") or die(mysqli_error($mysqli));

echo 1;
?>
