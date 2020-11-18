<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once ('config/MysqliDb.php');
include_once ("config/db.php");
$db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);
include("config/functions.php");       

          $program_name_ms = isset($_POST['program_name_ms']) ? $_POST['program_name_ms'] : ""; 
          $program_name_en = isset($_POST['program_name_en']) ? $_POST['program_name_en'] : ""; 
          $program_code = isset($_POST['program_code']) ? $_POST['program_code'] : ""; 

          $program_remark = isset($_POST['program_remark']) ? $_POST['program_remark'] : ""; 
          $program_status = isset($_POST['program_status']) ? $_POST['program_status'] : "";          

          $id = isset($_SESSION['i']) ? $_SESSION['i'] : "";
          $info = "Insert Sukses!!";
          $tgl = (new \DateTime())->format('Y-m-d H:i:s');
          


  $data = Array ("program_id" => null,
                 "program_name_ms" => $program_name_ms,
                 "program_name_en" => $program_name_en,
                 "program_code" => $program_code,//$sesi_tgl->format('Y-m-d'),
                 "program_remark" => $program_remark,
                 "program_status" => 1,
                 "program_created_by" => $id,
                 "program_created_at" => $tgl,
                 "program_modified_by" => $id,
                 "program_modified_at" => $tgl  );
//   var_dump($data); 
//   echo "<hr>";
  $hasil = $db->insert ('program', $data);
  
  // $hasil = $db->rawQuery($sql);// or die(mysql_error());
  // echo "<script>alert('$hasil');</script>";
  // var_dump($hasil);
  if($hasil)
  {
      echo 1;
    // $info = 1;//"Insert berhasil!";
  }
  else
  {
    // echo 0;
    echo $db->getLastError();
    // $info = 0;//"Insert gagal!";
  }


?>