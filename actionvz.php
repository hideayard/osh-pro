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

  $target_dir = "uploads/vz/";
  $mode = isset($_POST['mode']) ? $_POST['mode'] : ""; 
  $type = isset($_POST['type']) ? $_POST['type'] : ""; 

    switch($mode)
    {
      case "submit" : {$vz_status = 1;}break;
      case "save" : {$vz_status = 2;}break;
      // case "delete" : {$vz_status = 3;}break;
      default : {$vz_status = 1;}break;
    }

    $vz_id = isset($_POST['vz_id']) ? $_POST['vz_id'] : ""; 


              $vz_nama = isset($_POST['vz_nama']) ? $_POST['vz_nama'] : ""; 
              $vz_email = isset($_POST['vz_email']) ? $_POST['vz_email'] : ""; 
              $vz_tarikh = isset($_POST['vz_tarikh']) ? (new \DateTime($_POST['vz_tarikh']))->format('Y-m-d') ." " . (new \DateTime())->format('H:i:s') : (new \DateTime())->format('Y-m-d H:i:s'); 
              
              $vz_tempat = isset($_POST['vz_tempat']) ? $_POST['vz_tempat'] : ""; 
              $vz_agency = isset($_POST['vz_agency']) ? $_POST['vz_agency'] : "";          
              $vz_program = isset($_POST['vz_program']) ? $_POST['vz_program'] : ""; 
              $vz_bil_peserta = isset($_POST['vz_bil_peserta']) ? $_POST['vz_bil_peserta'] : ""; 
              $vz_ulasan = isset($_POST['vz_ulasan']) ? $_POST['vz_ulasan'] : ""; 
            
              $vz_photo1 = isset($_POST['vz_photo1']) ? $_POST['vz_photo1'] : ""; 
              $vz_photo2 = isset($_POST['vz_photo2']) ? $_POST['vz_photo2'] : ""; 
              $vz_photo3 = isset($_POST['vz_photo3']) ? $_POST['vz_photo3'] : ""; 
              $vz_photo4 = isset($_POST['vz_photo4']) ? $_POST['vz_photo4'] : ""; 
              $vz_photo5 = isset($_POST['vz_photo5']) ? $_POST['vz_photo5'] : ""; 
          
              $delete_vz_photo1 = isset($_POST['delete_vz_photo1']) ? $_POST['delete_vz_photo1'] : ""; 
              $delete_vz_photo2 = isset($_POST['delete_vz_photo2']) ? $_POST['delete_vz_photo2'] : ""; 
              $delete_vz_photo3 = isset($_POST['delete_vz_photo3']) ? $_POST['delete_vz_photo3'] : ""; 
              $delete_vz_photo4 = isset($_POST['delete_vz_photo4']) ? $_POST['delete_vz_photo4'] : ""; 
              $delete_vz_photo5 = isset($_POST['delete_vz_photo5']) ? $_POST['delete_vz_photo5'] : ""; 

              $message = "Insert Sukses!!";
              $tgl = (new \DateTime())->format('Y-m-d H:i:s');
              $hasil_upload1 = $hasil_upload2 = $hasil_upload3 = $hasil_upload4 = $hasil_upload5 = null;
              
              $uploadOk =1 ;
          

      $data = Array (
                    "vz_nama" => $vz_nama,
                    "vz_email" => $vz_email,
                    "vz_tarikh" => $vz_tarikh,//->format('Y-m-d H:i:s'),
                    "vz_tempat" => $vz_tempat,
                    "vz_agency" => $vz_agency,
                    "vz_program" => $vz_program,
                    "vz_bil_peserta" => $vz_bil_peserta,
                    "vz_ulasan" => $vz_ulasan,
                    "vz_status" => $vz_status
      );

      if(isset($_FILES["vz_photo1"]["name"]))
    { //echo 1;
      $hasil_upload1 = upload_files("vz","vz_photo1",0);
      $uploadOk .= "<br>".$hasil_upload1["uploadOk"];
      $message .= "<br>".$hasil_upload1["message"];
      $vz_photo1 = $hasil_upload1["file_name"];
      $data += array('vz_photo1' => $hasil_upload1["file_name"]);
    }


    if(isset($_FILES["vz_photo2"]["name"]))
    { //echo 2;
      $hasil_upload2 = upload_files("vz","vz_photo2",1);
      $uploadOk .= "<br>".$hasil_upload2["uploadOk"];
      $message .= "<br>".$hasil_upload2["message"];
      $vz_photo2 = $hasil_upload2["file_name"];
      $data += array('vz_photo2' => $hasil_upload2["file_name"]);
    }


    if(isset($_FILES["vz_photo3"]["name"]))
    { //echo 3;
      $hasil_upload3 = upload_files("vz","vz_photo3",2);
      $uploadOk .= "<br>".$hasil_upload3["uploadOk"];
      $message .= "<br>".$hasil_upload3["message"];
      $vz_photo3 = $hasil_upload3["file_name"];
      $data += array('vz_photo3' => $hasil_upload3["file_name"]);
    }


    if(isset($_FILES["vz_photo4"]["name"]))
    { //echo 4;
      $hasil_upload4 = upload_files("vz","vz_photo4",3);
      $uploadOk .= "<br>".$hasil_upload4["uploadOk"];
      $message .= "<br>".$hasil_upload4["message"];
      $vz_photo4 = $hasil_upload4["file_name"];
      $data += array('vz_photo4' => $hasil_upload4["file_name"]);
    }


    if(isset($_FILES["vz_photo5"]["name"]))
    { //echo 5;
      $hasil_upload5 = upload_files("vz","vz_photo5",4);
      $uploadOk .= "<br>".$hasil_upload5["uploadOk"];
      $message .= "<br>".$hasil_upload5["message"];
      $vz_photo5 = $hasil_upload5["file_name"];
      $data += array('vz_photo5' => $hasil_upload5["file_name"]);
    }
    if(isset($_POST['delete_vz_photo1']))
    {
      $data += array('vz_photo1' => null);
      $path_file = $target_dir.$filename1;
      if (file_exists($path_file)) {     unlink ( $path_file);   }

    }
    if(isset($_POST['delete_vz_photo2']))
    {
      $data += array('vz_photo2' => null);
      $path_file = $target_dir.$filename2;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_vz_photo3']))
    {
      $data += array('vz_photo3' => null);
      $path_file = $target_dir.$filename3;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_vz_photo4']))
    {
      $data += array('vz_photo4' => null);
      $path_file = $target_dir.$filename4;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_vz_photo5']))
    {
      $data += array('vz_photo5' => null);
      $path_file = $target_dir.$filename5;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
      

      $hasil_eksekusi = false;

    if(isset($_POST['vz_id']))
    {    
      if($mode == "delete" && $tipe=="ADMIN")
        {
          $db->where('vz_id', $vz_id);
          $hasil_eksekusi = $db->delete('vz');
          $message = "Delete Success !!";
        }
        else
        {
          $data += array('vz_modified_by' => $id_user);
          $data += array('vz_modified_at' => $tgl);
          $data += array('vz_is_deleted' => 0);

          $db->where ('vz_id', $vz_id);
          $hasil_eksekusi = $db->update ('vz', $data);
          $message = "Delete Success !!";

        }
        
        if ($hasil_eksekusi)
        {   
          echo json_encode( array("status" => true,"info" => $vz_status,"messages" => $message ) );
        }//$db->count . ' records were updated';
        else
        {   
          echo json_encode( array("status" => false,"info" => 'update failed: ' . $db->getLastError(),"messages" => $message ) );

        }

      }
      else
      {  
          $data += array("vz_id" => null);
          $data += array('vz_created_by' => $id_user);
          $data += array('vz_created_at' => $tgl);
        if($db->insert ('vz', $data))
        {
          echo json_encode( array("status" => true,"info" => $vz_status,"messages" => $message ) );
      
          // $message = 1;//"Insert berhasil!";
        }
        else
        {
          // echo 0;
          echo json_encode( array("status" => false,"info" => $db->getLastError(),"messages" => $message ) );
      
      
        }
      }
  
  }//end else
?>