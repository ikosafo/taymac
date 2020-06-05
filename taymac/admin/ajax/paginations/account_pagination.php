<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
include ('datefunc.php');

// DB table to use
$table = 'account_login';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'first_name', 'dt' => 0 ),
    array( 'db' => 'last_name',  'dt' => 1 ),
    array( 'db' => 'email_address',   'dt' => 2 ),
    array( 'db' => 'period',     'dt' => 3 ),
    array( 'db' => 'period','dt' => 4,
        'formatter' => function($d) {
            return time_elapsed_string($d);
        }
    ),
    array( 'db' => 'email_verified','dt' => 5,
        'formatter' => function($d) {
            return getverified($d);
        }
    ),
    array( 'db' => 'email_verified_period',     'dt' => 6 ),
    array( 'db' => 'email_verified_period','dt' => 7,
        'formatter' => function($d) {
            return time_elapsed_string($d);
        }
    )
);



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('ssp.class.php');

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
