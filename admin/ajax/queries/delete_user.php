<?php
include('../../../config.php');
$id=$_POST['i_index'];

$mysqli->query("delete from taymac_mis_users where id = '$id'") or die(mysqli_error($mysqli));

echo 1;
?>