<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once ('config/MysqliDb.php');
include_once ("config/db.php");
$db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);
include("config/functions.php");

$file = basename($_SERVER['PHP_SELF']);
$filename = (explode(".",$file))[0];
if(!check_role($filename,''))
{
  echo json_encode( array("status" => false,"info" => "You are not authorized.!!!","messages" => "You are not authorized.!!!" ) );
}
else
{

    $id_user = isset($_SESSION['i']) ? $_SESSION['i'] : "";
    $tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";
    $target_dir = "uploads/ucux/";
    $mode = isset($_POST['mode']) ? $_POST['mode'] : ""; 
    $type = isset($_POST['type']) ? $_POST['type'] : ""; 

    switch($mode)
    {
      case "submit" : {$ucux_status = 'OPEN';}break;
      case "save" : {$ucux_status = 'DRAFT';}break;
      // case "delete" : {$ucux_status = 3;}break;
      default : {$ucux_status = 'OPEN';}break;
    }
                
    $ucux_id = isset($_POST['ucux_id']) ? $_POST['ucux_id'] : ""; 

              $ucux_building = isset($_POST['ucux_building']) ? $_POST['ucux_building'] : ""; 
              $ucux_floor = isset($_POST['ucux_floor']) ? $_POST['ucux_floor'] : ""; 
              $ucux_location = isset($_POST['ucux_location']) ? $_POST['ucux_location'] : ""; 
              $ucux_description = isset($_POST['ucux_description']) ? $_POST['ucux_description'] : ""; 
              $ucux_remarks = isset($_POST['ucux_remarks']) ? $_POST['ucux_remarks'] : ""; 
              $ucux_risk = isset($_POST['ucux_risk']) ? $_POST['ucux_risk'] : ""; 
              $ucux_condition = isset($_POST['ucux_condition']) ? $_POST['ucux_condition'] : ""; 
              $ucux_txtform = isset($_POST['ucux_txtform']) ? $_POST['ucux_txtform'] : ""; 

              //txtform
              $ucux_photo1 = isset($_POST['ucux_photo1']) ? $_POST['ucux_photo1'] : ""; 
              $ucux_photo2 = isset($_POST['ucux_photo2']) ? $_POST['ucux_photo2'] : ""; 
              $ucux_photo3 = isset($_POST['ucux_photo3']) ? $_POST['ucux_photo3'] : ""; 
              $ucux_photo4 = isset($_POST['ucux_photo4']) ? $_POST['ucux_photo4'] : ""; 
              $ucux_photo5 = isset($_POST['ucux_photo5']) ? $_POST['ucux_photo5'] : ""; 

              $delete_ucux_photo1 = isset($_POST['delete_ucux_photo1']) ? $_POST['delete_ucux_photo1'] : ""; 
              $delete_ucux_photo2 = isset($_POST['delete_ucux_photo2']) ? $_POST['delete_ucux_photo2'] : ""; 
              $delete_ucux_photo3 = isset($_POST['delete_ucux_photo3']) ? $_POST['delete_ucux_photo3'] : ""; 
              $delete_ucux_photo4 = isset($_POST['delete_ucux_photo4']) ? $_POST['delete_ucux_photo4'] : ""; 
              $delete_ucux_photo5 = isset($_POST['delete_ucux_photo5']) ? $_POST['delete_ucux_photo5'] : "";    
              
              $filename1 = isset($_POST['filename1']) ? $_POST['filename1'] : ""; 
              $filename2 = isset($_POST['filename2']) ? $_POST['filename2'] : ""; 
              $filename3 = isset($_POST['filename3']) ? $_POST['filename3'] : ""; 
              $filename4 = isset($_POST['filename4']) ? $_POST['filename4'] : ""; 
              $filename5 = isset($_POST['filename5']) ? $_POST['filename5'] : ""; 
              
              $id_user = isset($_SESSION['i']) ? $_SESSION['i'] : "";
              $tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";

              $message = "Insert Sukses!!";
              $tgl = (new \DateTime())->format('Y-m-d H:i:s');
              $hasil_upload = null;
              $uploadOk =1 ;

              // $info = "Insert Sukses!!";
              // $tgl = (new \DateTime())->format('Y-m-d H:i:s');
              

              $data = Array (
              "ucux_txtform" => $ucux_txtform,
              "ucux_building" => $ucux_building,
              "ucux_floor" => $ucux_floor,
              "ucux_location" => $ucux_location,
              "ucux_description" => $ucux_description,//$sesi_tgl->format('Y-m-d'),
              "ucux_remarks" => $ucux_remarks,
              "ucux_risk" => $ucux_risk,
              "ucux_condition" => $ucux_condition,
              "ucux_status" => $ucux_status
    );
    // var_dump($data);

    if(isset($_FILES["ucux_photo1"]["name"]))
    { //echo 1;
      $hasil_upload1 = upload_files("ucux","ucux_photo1",0);
      $uploadOk .= "<br>".$hasil_upload1["uploadOk"];
      $message .= "<br>".$hasil_upload1["message"];
      $ucux_photo1 = $hasil_upload1["file_name"];
      $data += array('ucux_photo1' => $hasil_upload1["file_name"]);
    }


    if(isset($_FILES["ucux_photo2"]["name"]))
    { //echo 2;
      $hasil_upload2 = upload_files("ucux","ucux_photo2",1);
      $uploadOk .= "<br>".$hasil_upload2["uploadOk"];
      $message .= "<br>".$hasil_upload2["message"];
      $ucux_photo2 = $hasil_upload2["file_name"];
      $data += array('ucux_photo2' => $hasil_upload2["file_name"]);
    }


    if(isset($_FILES["ucux_photo3"]["name"]))
    { //echo 3;
      $hasil_upload3 = upload_files("ucux","ucux_photo3",2);
      $uploadOk .= "<br>".$hasil_upload3["uploadOk"];
      $message .= "<br>".$hasil_upload3["message"];
      $ucux_photo3 = $hasil_upload3["file_name"];
      $data += array('ucux_photo3' => $hasil_upload3["file_name"]);
    }


    if(isset($_FILES["ucux_photo4"]["name"]))
    { //echo 4;
      $hasil_upload4 = upload_files("ucux","ucux_photo4",3);
      $uploadOk .= "<br>".$hasil_upload4["uploadOk"];
      $message .= "<br>".$hasil_upload4["message"];
      $ucux_photo4 = $hasil_upload4["file_name"];
      $data += array('ucux_photo4' => $hasil_upload4["file_name"]);
    }


    if(isset($_FILES["ucux_photo5"]["name"]))
    { //echo 5;
      $hasil_upload5 = upload_files("ucux","ucux_photo5",4);
      $uploadOk .= "<br>".$hasil_upload5["uploadOk"];
      $message .= "<br>".$hasil_upload5["message"];
      $ucux_photo5 = $hasil_upload5["file_name"];
      $data += array('ucux_photo5' => $hasil_upload5["file_name"]);
    }
    if(isset($_POST['delete_ucux_photo1']))
    {
      $data += array('ucux_photo1' => null);
      $path_file = $target_dir.$filename1;
      if (file_exists($path_file)) {     unlink ( $path_file);   }

    }
    if(isset($_POST['delete_ucux_photo2']))
    {
      $data += array('ucux_photo2' => null);
      $path_file = $target_dir.$filename2;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_ucux_photo3']))
    {
      $data += array('ucux_photo3' => null);
      $path_file = $target_dir.$filename3;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_ucux_photo4']))
    {
      $data += array('ucux_photo4' => null);
      $path_file = $target_dir.$filename4;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_ucux_photo5']))
    {
      $data += array('ucux_photo5' => null);
      $path_file = $target_dir.$filename5;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }

            
    $hasil_eksekusi = false;
    if(isset($_POST['ucux_id']))
    {   //delete atau update
        if($mode == "delete" && $tipe=="ADMIN")
        {
          $db->where('ucux_id', $ucux_id);
          $hasil_eksekusi = $db->delete('ucux');
          $message = "Delete Success !!";
        }
        else
        {
          $data += array('ucux_modified_by' => $id_user);
          $data += array('ucux_modified_at' => $tgl);
          $data += array('ucux_is_deleted' => 0);

          $db->where ('ucux_id', $ucux_id);
          $hasil_eksekusi = $db->update ('ucux', $data);
          $message = $data;//"Update Success !!";

        }
        

        
        
        if ($hasil_eksekusi)
        {   
          echo json_encode( array("status" => true,"info" => 1,"messages" => $message ) );
        }//$db->count . ' records were updated';
        else
        {   
          echo json_encode( array("status" => false,"info" => 'update failed: ' . $db->getLastError(),"messages" => $message ) );

        }
          
    }
    else
    {  
      $data += array("ucux_id" => null);
      $data += array('ucux_created_by' => $id_user);
        $data += array('ucux_created_at' => $tgl);
        $data += array('ucux_modified_by' => $id_user);
          $data += array('ucux_modified_at' => $tgl);
          $data += array('ucux_is_deleted' => 0);
      if($db->insert ('ucux', $data))
      {
        echo json_encode( array("status" => true,"info" => 1,"messages" => $message ) );

        // $message = 1;//"Insert berhasil!";
      }
      else
      {
        // echo 0;
        echo json_encode( array("status" => false,"info" => $db->getLastError(),"messages" => $message ) );


      }
    }
            
      // $hasil = $db->rawQuery($sql);// or die(mysql_error());
      // echo "<script>alert('$hasil');</script>";
      // var_dump($hasil);
      
}
?>