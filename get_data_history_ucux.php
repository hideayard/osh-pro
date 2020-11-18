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
 
 if(!check_role($filename,''))
 {
   echo json_encode( array("status" => false,"info" => "You are not authorized.!!!","messages" => "You are not authorized.!!!" ) );
 }
 else
 {
        
    $counter = isset($_POST['counter']) ? $_POST['counter'] : "0"; 
    //  $counter++;
    
    $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status=0 AND ucux_txtform <> ''  order by ucux_id desc  LIMIT  $counter,6 "; 
    $result = $db->rawQuery($sql);//@mysql_query($sql);
    echo json_encode($result);
    //  var_dump($result);
// echo $sql;
 }
?>