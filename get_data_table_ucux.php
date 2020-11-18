<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
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
include_once ("config/db.php");

// DB table to use
$table = 'ucux';
 
// Table's primary key
$primaryKey = 'ucux_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
/*
$txt_field= "ucux_nama,ucux_email,ucux_tarikh,ucux_tempat,ucux_agency,program_name_ms,ucux_bil_peserta,ucux_photo,ucux_checkbox1,ucux_checkbox2,ucux_checkbox3,ucux_checkbox4,ucux_checkbox5,ucux_checkbox6,ucux_checkbox7,ucux_ulasan";
$txt_field= "ucux_txtform
,ucux_building
,ucux_floor
,ucux_location
,ucux_description
,ucux_remarks
,ucux_risk
,ucux_condition
,ucux_photo
";
*/
$i=-1;
$columns = array(
    array( 'db' => 'ucux_txtform', 'dt' => ++$i )
    ,array( 'db' => 'ucux_building',  'dt' => ++$i )
    ,array( 'db' => 'ucux_floor',   'dt' => ++$i  )
    ,array( 'db' => 'ucux_location',   'dt' => ++$i )
    ,array( 'db' => 'ucux_description',   'dt' => ++$i )
    ,array( 'db' => 'ucux_remarks',   'dt' => ++$i )
    ,array( 'db' => 'ucux_risk',   'dt' => ++$i )
    ,array( 'db' => 'ucux_condition',   'dt' => ++$i )

    ,array(
        'db'        => 'ucux_photo',
        'dt'        => ++$i,
        'formatter' => function( $d, $row ) {
            if($d)
            {
                return '<img src="dist/img/'.$d.'"  class="direct-chat-img" alt="User Image">';
            }
            else
            {
                return '<img src="dist/img/avatar5.png" class="direct-chat-img" alt="User Image">';
            }
        }
    )
    // ,array(
    //     'db'        => 'salary',
    //     'dt'        => 5,
    //     'formatter' => function( $d, $row ) {
    //         return '$'.number_format($d);
    //     }
    // )
);
 

 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
$created_by = " ucux_is_deleted = 0 ";
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null, $created_by ." AND ucux_txtform <> ''" )
    // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);