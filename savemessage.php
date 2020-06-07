<?php
include('config.php');

$form_name = mysqli_real_escape_string($mysqli, $_POST['form_name']);
$form_email = mysqli_real_escape_string($mysqli, $_POST['form_email']);
$form_phone = mysqli_real_escape_string($mysqli, $_POST['form_phone']);
$form_subject = mysqli_real_escape_string($mysqli, $_POST['form_subject']);
$form_message = mysqli_real_escape_string($mysqli, $_POST['form_message']);
$today = date('Y-m-d H:i:s');


$mysqli->query("INSERT INTO `taymac_message`
            (`formname`,
             `formemail`,
             `formphone`,
             `formsubject`,
             `formmessage`,
             `periodsent`
             )
VALUES ('$form_name',
        '$form_email',
        '$form_phone',
        '$form_subject',
        '$form_message',
        '$today'
        )") or die(mysqli_error($mysqli));

echo 1;
