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
  echo json_encode( array("status" => false,"info" => $filename ,"messages" => "You are not authorized.!!!" ) );
}
else
{
  $target_dir = "uploads/oshe/";
  $id_user = isset($_SESSION['i']) ? $_SESSION['i'] : "";
  $tipe = isset($_SESSION['t']) ? $_SESSION['t'] : "";

  $mode = isset($_POST['mode']) ? $_POST['mode'] : ""; 
  $type = isset($_POST['type']) ? $_POST['type'] : ""; 

    switch($mode)
    {
      case "submit" : {$oshe_status = 1;}break;
      case "save" : {$oshe_status = 2;}break;
      // case "delete" : {$oshe_status = 3;}break;
      default : {$oshe_status = 1;}break;
    }
              $oshe_id = isset($_POST['oshe_id']) ? $_POST['oshe_id'] : ""; 
              $oshe_email = isset($_POST['oshe_email']) ? $_POST['oshe_email'] : ""; 
              $oshe_pejabat = isset($_POST['oshe_pejabat']) ? $_POST['oshe_pejabat'] : ""; 
              $oshe_majikan = isset($_POST['oshe_majikan']) ? $_POST['oshe_majikan'] : ""; 
              $oshe_kod_majikan = isset($_POST['oshe_kod_majikan']) ? $_POST['oshe_kod_majikan'] : ""; 
              $oshe_tarikh = isset($_POST['oshe_tarikh']) ? (new \DateTime($_POST['oshe_tarikh']))->format('Y-m-d') ." " . (new \DateTime())->format('H:i:s') : (new \DateTime())->format('Y-m-d H:i:s'); 

              $oshe_bil_peserta = isset($_POST['oshe_bil_peserta']) ? $_POST['oshe_bil_peserta'] : ""; 
              $oshe_ca = isset($_POST['oshe_ca']) ? $_POST['oshe_ca'] : ""; 
              $oshe_ia = isset($_POST['oshe_ia']) ? $_POST['oshe_ia'] : ""; 
              //checkbox
              $oshe_checkbox1 = isset($_POST['oshe_checkbox1']) ? $_POST['oshe_checkbox1'] : ""; 
              $oshe_checkbox2 = isset($_POST['oshe_checkbox2']) ? $_POST['oshe_checkbox2'] : ""; 
              $oshe_checkbox3 = isset($_POST['oshe_checkbox3']) ? $_POST['oshe_checkbox3'] : ""; 
              $oshe_checkbox4 = isset($_POST['oshe_checkbox4']) ? $_POST['oshe_checkbox4'] : ""; 
              $oshe_checkbox5 = isset($_POST['oshe_checkbox5']) ? $_POST['oshe_checkbox5'] : ""; 
              $oshe_checkbox6 = isset($_POST['oshe_checkbox6']) ? $_POST['oshe_checkbox6'] : ""; 
              $oshe_checkbox7 = isset($_POST['oshe_checkbox7']) ? $_POST['oshe_checkbox7'] : ""; 
              $oshe_checkbox8 = isset($_POST['oshe_checkbox8']) ? $_POST['oshe_checkbox8'] : ""; 
              $oshe_checkbox8_text = isset($_POST['oshe_checkbox8_text']) ? $_POST['oshe_checkbox8_text'] : ""; 

              $oshe_checkbox1 = ($oshe_checkbox1=="on") ? true : false; 
              $oshe_checkbox2 = ($oshe_checkbox2=="on") ? true : false; 
              $oshe_checkbox3 = ($oshe_checkbox3=="on") ? true : false; 
              $oshe_checkbox4 = ($oshe_checkbox4=="on") ? true : false; 
              $oshe_checkbox5 = ($oshe_checkbox5=="on") ? true : false; 
              $oshe_checkbox6 = ($oshe_checkbox6=="on") ? true : false; 
              $oshe_checkbox7 = ($oshe_checkbox7=="on") ? true : false; 
              $oshe_checkbox8 = ($oshe_checkbox8=="on") ? true : false; 



              $oshe_cadangan = isset($_POST['oshe_cadangan']) ? $_POST['oshe_cadangan'] : "";           
              
              $oshe_photo1 = isset($_POST['oshe_photo1']) ? $_POST['oshe_photo1'] : ""; 
              $oshe_photo2 = isset($_POST['oshe_photo2']) ? $_POST['oshe_photo2'] : ""; 
              $oshe_photo3 = isset($_POST['oshe_photo3']) ? $_POST['oshe_photo3'] : ""; 
              $oshe_photo4 = isset($_POST['oshe_photo4']) ? $_POST['oshe_photo4'] : ""; 
              $oshe_photo5 = isset($_POST['oshe_photo5']) ? $_POST['oshe_photo5'] : ""; 

              $delete_oshe_photo1 = isset($_POST['delete_oshe_photo1']) ? $_POST['delete_oshe_photo1'] : ""; 
              $delete_oshe_photo2 = isset($_POST['delete_oshe_photo2']) ? $_POST['delete_oshe_photo2'] : ""; 
              $delete_oshe_photo3 = isset($_POST['delete_oshe_photo3']) ? $_POST['delete_oshe_photo3'] : ""; 
              $delete_oshe_photo4 = isset($_POST['delete_oshe_photo4']) ? $_POST['delete_oshe_photo4'] : ""; 
              $delete_oshe_photo5 = isset($_POST['delete_oshe_photo5']) ? $_POST['delete_oshe_photo5'] : ""; 

              $filename1 = isset($_POST['filename1']) ? $_POST['filename1'] : ""; 
              $filename2 = isset($_POST['filename2']) ? $_POST['filename2'] : ""; 
              $filename3 = isset($_POST['filename3']) ? $_POST['filename3'] : ""; 
              $filename4 = isset($_POST['filename4']) ? $_POST['filename4'] : ""; 
              $filename5 = isset($_POST['filename5']) ? $_POST['filename5'] : ""; 
              
              $message = "Insert Sukses!!";
              $tgl = (new \DateTime())->format('Y-m-d H:i:s');
              $hasil_upload1 = $hasil_upload2 = $hasil_upload3 = $hasil_upload4 = $hasil_upload5 = null;

              $uploadOk =1 ;

              $data = Array (
              "oshe_email" => $oshe_email,
              "oshe_pejabat" => $oshe_pejabat,
              "oshe_majikan" => $oshe_majikan,
              "oshe_kod_majikan" => $oshe_kod_majikan,
              "oshe_tarikh" => $oshe_tarikh,//$sesi_tgl->format('Y-m-d'),
              "oshe_bil_peserta" => $oshe_bil_peserta,
              "oshe_ca" => $oshe_ca,
              "oshe_ia" => $oshe_ia,
              "oshe_checkbox1" => $oshe_checkbox1,
              "oshe_checkbox2" => $oshe_checkbox2,
              "oshe_checkbox3" => $oshe_checkbox3,
              "oshe_checkbox4" => $oshe_checkbox4,
              "oshe_checkbox5" => $oshe_checkbox5,
              "oshe_checkbox6" => $oshe_checkbox6,
              "oshe_checkbox7" => $oshe_checkbox7,
              "oshe_checkbox8" => $oshe_checkbox8,
              "oshe_checkbox8_text" => $oshe_checkbox8_text,
              "oshe_cadangan" => $oshe_cadangan,
              "oshe_status" => $oshe_status

    );

    if(isset($_FILES["oshe_photo1"]["name"]))
    { //echo 1;
      $hasil_upload1 = upload_files("oshe","oshe_photo1",0);
      $uploadOk .= "<br>".$hasil_upload1["uploadOk"];
      $message .= "<br>".$hasil_upload1["message"];
      $oshe_photo1 = $hasil_upload1["file_name"];
      $data += array('oshe_photo1' => $hasil_upload1["file_name"]);
    }


    if(isset($_FILES["oshe_photo2"]["name"]))
    { //echo 2;
      $hasil_upload2 = upload_files("oshe","oshe_photo2",1);
      $uploadOk .= "<br>".$hasil_upload2["uploadOk"];
      $message .= "<br>".$hasil_upload2["message"];
      $oshe_photo2 = $hasil_upload2["file_name"];
      $data += array('oshe_photo2' => $hasil_upload2["file_name"]);
    }


    if(isset($_FILES["oshe_photo3"]["name"]))
    { //echo 3;
      $hasil_upload3 = upload_files("oshe","oshe_photo3",2);
      $uploadOk .= "<br>".$hasil_upload3["uploadOk"];
      $message .= "<br>".$hasil_upload3["message"];
      $oshe_photo3 = $hasil_upload3["file_name"];
      $data += array('oshe_photo3' => $hasil_upload3["file_name"]);
    }


    if(isset($_FILES["oshe_photo4"]["name"]))
    { //echo 4;
      $hasil_upload4 = upload_files("oshe","oshe_photo4",3);
      $uploadOk .= "<br>".$hasil_upload4["uploadOk"];
      $message .= "<br>".$hasil_upload4["message"];
      $oshe_photo4 = $hasil_upload4["file_name"];
      $data += array('oshe_photo4' => $hasil_upload4["file_name"]);
    }


    if(isset($_FILES["oshe_photo5"]["name"]))
    { //echo 5;
      $hasil_upload5 = upload_files("oshe","oshe_photo5",4);
      $uploadOk .= "<br>".$hasil_upload5["uploadOk"];
      $message .= "<br>".$hasil_upload5["message"];
      $oshe_photo5 = $hasil_upload5["file_name"];
      $data += array('oshe_photo5' => $hasil_upload5["file_name"]);
    }
    if(isset($_POST['delete_oshe_photo1']))
    {
      $data += array('oshe_photo1' => null);
      $path_file = $target_dir.$filename1;
      if (file_exists($path_file)) {     unlink ( $path_file);   }

    }
    if(isset($_POST['delete_oshe_photo2']))
    {
      $data += array('oshe_photo2' => null);
      $path_file = $target_dir.$filename2;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_oshe_photo3']))
    {
      $data += array('oshe_photo3' => null);
      $path_file = $target_dir.$filename3;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_oshe_photo4']))
    {
      $data += array('oshe_photo4' => null);
      $path_file = $target_dir.$filename4;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
    if(isset($_POST['delete_oshe_photo5']))
    {
      $data += array('oshe_photo5' => null);
      $path_file = $target_dir.$filename5;
      if (file_exists($path_file)) {     unlink ( $path_file);   }
    }
      
    $hasil_eksekusi = false;
    if(isset($_POST['oshe_id']))
    {   
        if($mode == "delete" && $tipe=="ADMIN")
        {
          $db->where('oshe_id', $oshe_id);
          $hasil_eksekusi = $db->delete('oshe');
          $message = "Delete Success !!";
        }
        else
        {
          
          $data += array('oshe_modified_by' => $id_user);
          $data += array('oshe_modified_at' => $tgl);
          $data += array('oshe_is_deleted' => 0);
          
          $db->where ('oshe_id', $oshe_id);
          $hasil_eksekusi = $db->update ('oshe', $data);
          $message = "Delete Success !!";

        }
        

        
        
        if ($hasil_eksekusi)
        {   
          echo json_encode( array("status" => true,"info" => $oshe_status,"messages" => $message ) );
        }//$db->count . ' records were updated';
        else
        {   
          echo json_encode( array("status" => false,"info" => 'update failed: ' . $db->getLastError(),"messages" => $message ) );

        }
          
    }
    else
    {  

      $data += array("oshe_id" => null);
      $data += array('oshe_created_by' => $id_user);
      $data += array('oshe_created_at' => $tgl);

      if($db->insert ('oshe', $data))
      {
        echo json_encode( array("status" => true,"info" => $oshe_status,"messages" => $message ) );

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