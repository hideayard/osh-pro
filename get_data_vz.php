<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   session_start();
   $tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";
   $id_user = isset($_SESSION['i']) ? $_SESSION['i'] : "";
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
require_once ('config/MysqliDb.php');
include_once ("config/db.php");
include_once ("config/functions.php");
$db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);


$file = basename($_SERVER['PHP_SELF']);
$filename = (explode(".",$file))[0];

if(!check_role($filename,''))
{
  echo json_encode( array("status" => false,"info" => "You are not authorized.!!!","messages" => "You are not authorized.!!!" ) );
}
else
{
    $id = isset($_GET['id']) ? $_GET['id'] : ""; 
    $mode = isset($_GET['mode']) ? $_GET['mode'] : ""; 
    // DB table to use
    $table = 'vz';
    
    // Table's primary key
    $primaryKey = 'vz_id';
    
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
    /*
    $txt_field= "vz_nama,vz_email,vz_tarikh,vz_tempat,vz_agency,program_name_ms,vz_bil_peserta,vz_photo,vz_checkbox1,vz_checkbox2,vz_checkbox3,vz_checkbox4,vz_checkbox5,vz_checkbox6,vz_checkbox7,vz_ulasan";

    */
    // $cookie_name = "vz";
    // $cookie_value = 0;
    // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    $i=-1;
    $counter = 0;
    $columns = array(
        array(
            'db'        => 'vz_id',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                global $counter;
                return ++$counter;
            }
        )
        ,array(
            'db'        => 'vz_id',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                $tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";
                $mode = isset($_GET['mode']) ? $_GET['mode'] : ""; 

                switch($mode)
                {
                    case "draft" : {
                        return '<a href="index.php?page=draftvz&vz_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'vz\',\'draft\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;

                    }break;
                    case "submitted" : {
                        if($tipe == "ADMIN"||$tipe == "HQ")
                        {
                            return '<a href="index.php?page=submittedvz&vz_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'vz\',\'submitted\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;
                        }
                        else
                        {
                            return '<a href="index.php?page=submittedvz&vz_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> ';
                            //| <a onclick="actiondelete(\'vz\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;    
                        }
                    }break;
                    default : {$pagename = "draftvz";}break;
                    
                }

            }
        )
        ,array( 'db' => 'vz_created_at', 'dt' => ++$i )
        ,array( 'db' => 'vz_nama', 'dt' => ++$i )
        ,array( 'db' => 'vz_email',  'dt' => ++$i )
        ,array( 'db' => 'vz_tarikh',   'dt' => ++$i 
            ,'formatter' => function( $d, $row ) {
                if($d)
                {
                    return (new \DateTime($d))->format('d/m/Y');
                }
                else
                {
                    return NULL;;
                }
            }
        )

        ,array( 'db' => 'vz_tempat',   'dt' => ++$i )
        ,array( 'db' => 'vz_agency',   'dt' => ++$i )
        ,array( 'db' => 'vz_program',   'dt' => ++$i )
        ,array( 'db' => 'vz_bil_peserta',   'dt' => ++$i )
        ,array( 'db' => 'vz_ulasan',   'dt' => ++$i )

        ,array(
            'db'        => 'vz_photo1',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/vz/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/vz/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/vz/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'vz_photo2',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/vz/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/vz/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/vz/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'vz_photo3',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/vz/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/vz/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/vz/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'vz_photo4',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/vz/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/vz/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/vz/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'vz_photo5',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/vz/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/vz/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/vz/avatar5.png" class="direct-chat-img" alt="User Image">';
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

    $created_by = " vz_created_by = ".$id_user;

    if($tipe == "ADMIN"||$tipe == "HQ")
    {
        $created_by = " vz_is_deleted = 0 ";
    }

    if($id=="")
    {
        echo json_encode(
            // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
            SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null, " vz_is_deleted = 0 " ." AND vz_nama <> ''" )
        );
    }
    else
    {
        if($mode=="draft")
        {
            echo json_encode(
                SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null, $created_by ." AND vz_nama <> '' AND vz_status = 2" )
            );
        }
        else
        {
            echo json_encode(
                SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null, $created_by ." AND vz_nama <> '' AND vz_status = 1" )
                // SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null, "vz_created_by = ".$id )
            );
        }
        
    }
}