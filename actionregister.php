<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once ('config/MysqliDb.php');
include_once ("config/db.php");
$db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);
include("config/functions.php");    

$tgl = (new \DateTime())->format('Y-m-d H:i:s');
$user_status = 0;

            $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : ""; 
            $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : ""; 
            $user_pass = isset($_POST['user_pass']) ? $_POST['user_pass'] : ""; 
            $user_nama = isset($_POST['user_nama']) ? $_POST['user_nama'] : ""; 
            $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : ""; 
            $user_hp = isset($_POST['user_hp']) ? $_POST['user_hp'] : ""; 
            $user_tipe = isset($_POST['user_tipe']) ? $_POST['user_tipe'] : ""; 

            $user_cawangan = isset($_POST['user_cawangan']) ? $_POST['user_cawangan'] : ""; 
            $user_job_position = isset($_POST['user_job_position']) ? $_POST['user_job_position'] : ""; 
            $user_company = isset($_POST['user_company']) ? $_POST['user_company'] : ""; 

          $message = "Insert Sukses!!";
          $tgl = (new \DateTime())->format('Y-m-d H:i:s');          
  
$sql = "SELECT * FROM users where user_name='$user_name' ";
$data = $db->rawQuery($sql);
if(count($data)>0)
{
	echo json_encode( array("status" => false,"info" => "error","messages" => "Username Already Exist" ) );
}
else
{
		  
  $data = Array ();
  if($user_name!="")
  {
	  $data += array('user_name' => $user_name);
  }
  if($user_pass!="")
  {
      $data += array('user_pass' => md5($user_pass));
  }
  if($user_nama!="")
  {
      $data += array('user_nama' => $user_nama);
  }
  if($user_email!="")
  {
      $data += array('user_email' => $user_email);
  }
  if($user_hp!="")
  {
      $data += array('user_hp' => $user_hp);
  }
  if($user_tipe!="")
  {
      $data += array('user_tipe' => $user_tipe);
  }
  if($user_cawangan!="")
  {
      $data += array('user_cawangan' => $user_cawangan);
  }
  if($user_job_position!="")
  {
      $data += array('user_job_position' => $user_job_position);
  }
  if($user_company!="")
  {
      $data += array('user_company' => $user_company);
  }
  if($user_status!="")
  {
      $data += array('user_status' => $user_status);
  }
  $hasil_eksekusi = false;

  
      $data += array("user_id" => null);
      $data += array('user_status' => 0);
      $data += array('user_foto' => "avatar5.png");
      $data += array('user_created_by' => null);
      $data += array('user_created_at' => $tgl);
    if($db->insert ('users', $data))
    {
      echo json_encode( array("status" => true,"info" => "success","messages" => $message ) );
      }
    else
    {
      // echo 0;
      echo json_encode( array("status" => false,"info" => $db->getLastError(),"messages" => $message ) );
  
  
    }
  
} 

?>