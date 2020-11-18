<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 session_start();

 require_once ('config/MysqliDb.php');
 include_once ("config/db.php");
 $db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);
 include_once ("config/functions.php");

 $file = basename($_SERVER['PHP_SELF']);
 $filename = (explode(".",$file))[0];
 
//  if(!check_role($filename,''))
//  {
// //    echo json_encode( array("status" => false,"info" => "You are not authorized.!!!","messages" => "You are not authorized.!!!" ) );
//  }
//  else
//  {
    $id_user = isset($_SESSION['i']) ? $_SESSION['i'] : "";
    $tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";

    $counter = isset($_POST['counter']) ? $_POST['counter'] : "0"; 
    $ucux_id = isset($_POST['ucux_id']) ? $_POST['ucux_id'] : ""; 

    $mode = isset($_POST['mode']) ? $_POST['mode'] : ""; 
    $created_by = " ucux_created_by = ".$id_user;
 
    if($tipe == "ADMIN"||$tipe == "HQ")//||$tipe == "HQ")
    {
        $created_by = " ucux_is_deleted = 0 ";
    }
    switch($mode)
    {
    case "submit" : {$ucux_status = 1;
        // $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status='OPEN'   order by ucux_id desc  LIMIT  $counter,6 "; 
        $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status IN ('OPEN','ON PROCESS')  AND ucux_txtform <> ''  order by ucux_id desc  LIMIT  $counter,6"; 

    }
    break;

    case "draft" : {$ucux_status = 2;
        $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status='DRAFT' AND ucux_txtform <> ''  and ".$created_by." order by ucux_id desc  LIMIT  $counter,6 "; 

    }break;

    case "history" : {
        if($_SESSION['t']=="ADMIN")
        {
            $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status NOT IN ('DRAFT','OPEN') AND ucux_txtform <> ''  order by ucux_id desc  LIMIT  $counter,6 "; 
        }
        else
        {
            $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status NOT IN ('DRAFT','OPEN') AND ucux_txtform <> '' and ".$created_by ."  order by ucux_id desc  LIMIT  $counter,6 "; 
        }
        $ucux_status = 0;

    }break;

    default : {$ucux_status = 1;
        // $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status='OPEN'  order by ucux_id desc  LIMIT  $counter,6 "; 
        $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status IN ('OPEN','ON PROCESS')  AND ucux_txtform <> ''  order by ucux_id desc  LIMIT  $counter,6"; 

    }break;
    }
        
    //  $counter++;
    
    $result = $db->rawQuery($sql);//@mysql_query($sql);
    echo json_encode($result);
    //  var_dump($result);
    // echo $sql;
// }
?>