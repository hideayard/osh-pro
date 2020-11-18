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
    $table = 'oshe';



    // Table's primary key
    $primaryKey = 'oshe_id';
    
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
    /*
    $txt_field= "oshe_nama,oshe_email,oshe_tarikh,oshe_tempat,oshe_agency,program_name_ms,oshe_bil_peserta,oshe_photo,oshe_checkbox1,oshe_checkbox2,oshe_checkbox3,oshe_checkbox4,oshe_checkbox5,oshe_checkbox6,oshe_checkbox7,oshe_ulasan";

    */
    // $_COOKIE[$cookie_name]=0;
    // $cookie_name = "oshe";
    // $cookie_value = 0;
    // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    $i=-1;
    $counter = 0;
    $columns = array(
            array(
                'db'        => 'oshe_id',
                'dt'        => ++$i,
                'formatter' => function( $d, $row ) {
                    global $counter;
                        return ++$counter;
                }
            ),array(
            'db'        => 'oshe_id',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                $tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";
                $mode = isset($_GET['mode']) ? $_GET['mode'] : ""; 

                switch($mode)
                {
                    case "draft" : {
                        return '<a href="index.php?page=draftoshe&oshe_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'oshe\',\'draft\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;

                    }break;
                    case "submitted" : {
                        if($tipe == "ADMIN")
                        {
                            return '<a href="index.php?page=submittedoshe&oshe_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'oshe\',\'submitted\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;
                        }
                        else
                        {
                            return '<a href="index.php?page=submittedoshe&oshe_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> ';
                            //| <a onclick="actiondelete(\'oshe\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;    
                        }
                    }break;
                    default : {$pagename = "draftoshe";}break;
                    
                }
                // if($d)
                // {//<img class="direct-chat-img" src="../uploads/oshe/user3-128x128.jpg" alt="Message User Image">
                //     // return '|<span><i class="fa fa-delete"></i>view</span>';
                //     return '<a href="index.php?page='.$pagename.'&oshe_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'oshe\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;
                // }
                // else
                // {
                //     return '<a href="index.php?page='.$pagename.'&oshe_id='.$d.'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'oshe\','.$d.')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;
                    
                //     //return '<a href="index.php?page='.$pagename.'&oshe_id='.$d.'" class="btn btn-primary">View Detail</a>' ;

                //     // return '<a href="index.php?page=draftoshe&oshe_id=1'.$d.'">View Detail</a>';
                //     // return '<img src="uploads/oshe/avatar5.png" class="direct-chat-img" alt="User Image">';
                // }
            }
        )
        ,array( 'db' => 'oshe_email', 'dt' => ++$i )
        ,array( 'db' => 'oshe_pejabat',  'dt' => ++$i )
        ,array( 'db' => 'oshe_majikan',   'dt' => ++$i )
        ,array( 'db' => 'oshe_kod_majikan',   'dt' => ++$i )
        ,array( 'db' => 'oshe_tarikh',   'dt' => ++$i 
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
        )// ,array( 'db' => 'oshe_tarikh',   'dt' => 4 )
        ,array( 'db' => 'oshe_bil_peserta',   'dt' => ++$i )
        ,array( 'db' => 'oshe_ca',   'dt' => ++$i )
        ,array( 'db' => 'oshe_ia',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox1',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox2',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox3',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox4',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox5',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox6',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox7',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox8',   'dt' => ++$i )
        ,array( 'db' => 'oshe_checkbox8_text',   'dt' => ++$i )
        ,array( 'db' => 'oshe_cadangan',   'dt' => ++$i )
        ,array(
            'db'        => 'oshe_photo1',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/oshe/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/oshe/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/oshe/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'oshe_photo2',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/oshe/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/oshe/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/oshe/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'oshe_photo3',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/oshe/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/oshe/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/oshe/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'oshe_photo4',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/oshe/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/oshe/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/oshe/avatar5.png" class="direct-chat-img" alt="User Image">';
                }
            }
        )
        ,array(
            'db'        => 'oshe_photo5',
            'dt'        => ++$i,
            'formatter' => function( $d, $row ) {
                if($d)
                {//<img class="direct-chat-img" src="../uploads/oshe/user3-128x128.jpg" alt="Message User Image">
                    return '<img src="uploads/oshe/'.$d.'"  class="direct-chat-img" alt="User Image">';
                }
                else
                {
                    return '<img src="uploads/oshe/avatar5.png" class="direct-chat-img" alt="User Image">';
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
    
    // echo json_encode(
    //     SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    // );
    $created_by = " oshe_created_by = ".$id_user;

    if($tipe == "ADMIN"||$tipe == "HQ")
    {
        $created_by = " oshe_is_deleted = 0 ";
    }
    if($id=="")
    {
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );
    }
    else
    {
        if($mode=="draft")
        {
            echo json_encode(
                SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null, $created_by ." AND oshe_status = 2 AND oshe_email <> '' " )
            );
        }
        else
        {
            echo json_encode(
                SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null, $created_by ." AND oshe_status = 1 AND oshe_email <> '' " )
            );
        }
        
    }

}       