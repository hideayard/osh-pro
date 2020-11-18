<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once ('config/MysqliDb.php');
include_once ("config/db.php");
$db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);
include("config/functions.php");

$id = isset($_SESSION['i']) ? $_SESSION['i'] : "";
$tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";

$ucux_id = isset($_POST['ucux_id']) ? $_POST['ucux_id'] : ""; 
$ucux_status = isset($_POST['ucux_status']) ? $_POST['ucux_status'] : ""; 

$mode = isset($_POST['mode']) ? $_POST['mode'] : ""; 
$tgl = (new \DateTime())->format('Y-m-d H:i:s');

$flag = 0;
switch($ucux_status)
{
  case "ON PROCESS" : {
                        $flag = 1;
      
                        }break;
  case "FINISH" : { //finish must be admin or the person who take the job
                    $params = Array($ucux_id,$id);//, 'admin');
                    $ucux_query = $db->rawQuery("SELECT ucux_id FROM ucux WHERE ucux_id = ? and ucux_modified_by = ? ", $params); 
                    if(count($ucux_query))
                    {
                        $flag=1;
                    }
                }break;
case "CANCEL" : { //finish must be admin or the person who take the job
                $params = Array($ucux_id,$id);//, 'admin');
                $ucux_query = $db->rawQuery("SELECT ucux_id FROM ucux WHERE ucux_id = ? and ucux_modified_by = ? ", $params); 
                if(count($ucux_query))
                {
                    $flag=1;
                }
            }break;
  default : {
                $flag=0;
            }break;
}

//
        
 

  
// $rv = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
// return value status, info, messages, 
$status = false; 
$info = "0";
$messages = 'update failed: ';//. $db->getLastError();

if($flag==1 || $tipe == "ADMIN")
{   
    $data = Array ("ucux_id" => $ucux_id,
                 "ucux_status" => $ucux_status,
                 "ucux_modified_by" => $id,
                 "ucux_modified_at" => $tgl,
                 "ucux_is_deleted" => 0
  );
    $db->where ('ucux_id', $ucux_id);
    if ($db->update ('ucux', $data))
    {   $status = true; 
        $info = $ucux_status;
        $messages = "Success Update data to ".$ucux_status; 
    }//$db->count . ' records were updated';
    else
    {   
        $status = false; 
        $info = "0";
        $messages = 'update failed: ' . $db->getLastError();
    } 
}
else
{  
    $status = false; 
        $info = "0";
        $messages = 'You are not the person who take the job';

//   $hasil = $db->insert ('ucux', $data);
//   if($hasil)
//   {
//       echo $ucux_status;
//     // $info = 1;//"Insert berhasil!";
//   }
//   else
//   {
//     // echo 0;
//     echo $db->getLastError();
// 
//   }
}
echo json_encode( array("status" => $status,"info" => $info,"messages" => $messages ) );
        
  
  // $hasil = $db->rawQuery($sql);// or die(mysql_error());
  // echo "<script>alert('$hasil');</script>";
  // var_dump($hasil);
  

?>