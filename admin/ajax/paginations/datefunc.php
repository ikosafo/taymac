<?php

function lock($item){

    return base64_encode(base64_encode(base64_encode($item)));
}
function unlock($item){

    return base64_decode(base64_decode(base64_decode($item)));
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getverified ($verified) {
    if ($verified == '1') {
        return 'Verfied';
    }
    else {
        return '<span style="color: red">Not Verified</span>';
    }
}

function getpayment ($payment) {
    if ($payment == '1') {
        return '<span style="color:green">Paid</span>';
    }
    else {
        return '<span style="color: red">Not Paid</span>';
    }
}


function linkdetails ($applicant_id) {
$newid = lock(lock($applicant_id));
 return  '<a href="provisional_details.php?app_id='.$newid.'" target="_blank">
    <button class="btn btn-success btn-outline btn-sm" style="font-size: small">
        View details
    </button>
</a>';
}

function perlinkdetails ($applicant_id) {
    $newid = lock(lock($applicant_id));
    return  '<a href="permanent_details.php?app_id='.$newid.'" target="_blank">
    <button class="btn btn-success btn-outline btn-sm" style="font-size: small">
        View details
    </button>
</a>';
}




// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'root',
    'db'   => 'ahpc',
    'host' => 'localhost:3308'
);


/*$sql_details = array(
    'user' => 'ahpcgh_root',
    'pass' => 'Server@2019$',
    'db'   => 'ahpcgh_registration',
    'host' => 'localhost:3306'
);*/
