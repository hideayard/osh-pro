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
    $target_dir = "uploads/ngo/";
    $mode = isset($_POST['mode']) ? $_POST['mode'] : ""; 
    $type = isset($_POST['type']) ? $_POST['type'] : ""; 
        
      switch($mode)
      {
        case "submit" : {$ngo_status = 1;}break;
        case "save" : {$ngo_status = 2;}break;
        // case "delete" : {$ngo_status = 3;}break;
        default : {$ngo_status = 1;}break;
      }
      // var_dump($_POST);die;
          $ngo_id = isset($_POST['ngo_id']) ? $_POST['ngo_id'] : ""; 
          $ngo_nama = isset($_POST['ngo_nama']) ? $_POST['ngo_nama'] : ""; 
          $ngo_email = isset($_POST['ngo_email']) ? $_POST['ngo_email'] : ""; 
          $ngo_tarikh = isset($_POST['ngo_tarikh']) ? (new \DateTime($_POST['ngo_tarikh']))->format('Y-m-d') ." " . (new \DateTime())->format('H:i:s') : (new \DateTime())->format('Y-m-d H:i:s'); 

          $ngo_tempat = isset($_POST['ngo_tempat']) ? $_POST['ngo_tempat'] : ""; 
          $ngo_daerah_id = isset($_POST['ngo_daerah_id']) ? $_POST['ngo_daerah_id'] : ""; 
          $ngo_daerah_name = isset($_POST['ngo_daerah_name']) ? $_POST['ngo_daerah_name'] : ""; 
          $ngo_negeri = isset($_POST['ngo_negeri']) ? $_POST['ngo_negeri'] : ""; 
          $ngo_agency = isset($_POST['ngo_agency']) ? $_POST['ngo_agency'] : ""; 
          $ngo_agency_name = isset($_POST['ngo_agency_name']) ? $_POST['ngo_agency_name'] : ""; 
          $ngo_agency_others = isset($_POST['ngo_agency_others']) ? $_POST['ngo_agency_others'] : ""; 
          $ngo_jenis_program = isset($_POST['ngo_jenis_program']) ? $_POST['ngo_jenis_program'] : ""; 
          $ngo_jenis_program_name = isset($_POST['ngo_jenis_program_name']) ? $_POST['ngo_jenis_program_name'] : ""; 
          $ngo_program_name = isset($_POST['ngo_program_name']) ? $_POST['ngo_program_name'] : ""; 
          $ngo_program = isset($_POST['ngo_program']) ? $_POST['ngo_program'] : ""; 
          $ngo_bil_peserta = isset($_POST['ngo_bil_peserta']) ? $_POST['ngo_bil_peserta'] : ""; 
          //checkbox
          $ngo_checkbox1 = isset($_POST['ngo_checkbox1']) ? $_POST['ngo_checkbox1'] : ""; 
          $ngo_checkbox2 = isset($_POST['ngo_checkbox2']) ? $_POST['ngo_checkbox2'] : ""; 
          $ngo_checkbox3 = isset($_POST['ngo_checkbox3']) ? $_POST['ngo_checkbox3'] : ""; 
          $ngo_checkbox4 = isset($_POST['ngo_checkbox4']) ? $_POST['ngo_checkbox4'] : ""; 
          $ngo_checkbox5 = isset($_POST['ngo_checkbox5']) ? $_POST['ngo_checkbox5'] : ""; 
          $ngo_checkbox6 = isset($_POST['ngo_checkbox6']) ? $_POST['ngo_checkbox6'] : ""; 
          $ngo_checkbox7 = isset($_POST['ngo_checkbox7']) ? $_POST['ngo_checkbox7'] : ""; 
          
          // $mode = isset($_POST['mode']) ? $_POST['mode'] : ""; 
          // switch($mode)
          // {
          //   case "submit" : {$ngo_status = 1;}break;
          //   case "save" : {$ngo_status = 2;}break;
          //   default : {$ngo_status = 1;}break;
          // }

          $ngo_checkbox1 = ($ngo_checkbox1=="on") ? true : false; 
          $ngo_checkbox2 = ($ngo_checkbox2=="on") ? true : false; 
          $ngo_checkbox3 = ($ngo_checkbox3=="on") ? true : false; 
          $ngo_checkbox4 = ($ngo_checkbox4=="on") ? true : false; 
          $ngo_checkbox5 = ($ngo_checkbox5=="on") ? true : false; 
          $ngo_checkbox6 = ($ngo_checkbox6=="on") ? true : false; 
          $ngo_checkbox7 = ($ngo_checkbox7=="on") ? true : false; 

          $ngo_photo1 = isset($_POST['ngo_photo1']) ? $_POST['ngo_photo1'] : ""; 
          $ngo_photo2 = isset($_POST['ngo_photo2']) ? $_POST['ngo_photo2'] : ""; 
          $ngo_photo3 = isset($_POST['ngo_photo3']) ? $_POST['ngo_photo3'] : ""; 
          $ngo_photo4 = isset($_POST['ngo_photo4']) ? $_POST['ngo_photo4'] : ""; 
          $ngo_photo5 = isset($_POST['ngo_photo5']) ? $_POST['ngo_photo5'] : ""; 

          $delete_ngo_photo1 = isset($_POST['delete_ngo_photo1']) ? $_POST['delete_ngo_photo1'] : ""; 
          $delete_ngo_photo2 = isset($_POST['delete_ngo_photo2']) ? $_POST['delete_ngo_photo2'] : ""; 
          $delete_ngo_photo3 = isset($_POST['delete_ngo_photo3']) ? $_POST['delete_ngo_photo3'] : ""; 
          $delete_ngo_photo4 = isset($_POST['delete_ngo_photo4']) ? $_POST['delete_ngo_photo4'] : ""; 
          $delete_ngo_photo5 = isset($_POST['delete_ngo_photo5']) ? $_POST['delete_ngo_photo5'] : ""; 

          $ngo_ulasan = isset($_POST['ngo_ulasan']) ? $_POST['ngo_ulasan'] : "";           
          $ngo_photo = isset($_POST['ngo_photo']) ? $_POST['ngo_photo'] : ""; 
          $ngo_photo = isset($_FILES["ngo_photo"]["name"]) ? $_FILES["ngo_photo"]["name"] : ""; 

          
          
          $message = "Insert Sukses!!";
          $tgl = (new \DateTime())->format('Y-m-d H:i:s');
          $hasil_upload1 = $hasil_upload2 = $hasil_upload3 = $hasil_upload4 = $hasil_upload5 = null;

          $uploadOk =1 ;
          
          $data = Array (
            "ngo_nama" => $ngo_nama,
            "ngo_email" => $ngo_email,
            "ngo_tarikh" => $ngo_tarikh,
            "ngo_tempat" => $ngo_tempat,
            "ngo_daerah_id" => $ngo_daerah_id,
            "ngo_daerah_name" => $ngo_daerah_name,
            "ngo_negeri" => $ngo_negeri,
            "ngo_agency" => $ngo_agency,
            "ngo_agency_name" => $ngo_agency_name,
            "ngo_agency_others" => $ngo_agency_others,
            "ngo_jenis_program" => $ngo_jenis_program,
            "ngo_jenis_program_name" => $ngo_jenis_program_name,
            "ngo_program_name" => $ngo_program_name,
            "ngo_program" => $ngo_program,
            "ngo_bil_peserta" => $ngo_bil_peserta,
            "ngo_checkbox1" => $ngo_checkbox1,
            "ngo_checkbox2" => $ngo_checkbox2,
            "ngo_checkbox3" => $ngo_checkbox3,
            "ngo_checkbox4" => $ngo_checkbox4,
            "ngo_checkbox5" => $ngo_checkbox5,
            "ngo_checkbox6" => $ngo_checkbox6,
            "ngo_checkbox7" => $ngo_checkbox7,
            "ngo_ulasan" => $ngo_ulasan,
            "ngo_status" => $ngo_status
      );
      if(isset($_FILES["ngo_photo1"]["name"]))
      { //echo 1;
        $hasil_upload1 = upload_files("ngo","ngo_photo1",0);
        $uploadOk .= "<br>".$hasil_upload1["uploadOk"];
        $message .= "<br>".$hasil_upload1["message"];
        $ngo_photo1 = $hasil_upload1["file_name"];
        $data += array('ngo_photo1' => $hasil_upload1["file_name"]);
      }


      if(isset($_FILES["ngo_photo2"]["name"]))
      { //echo 2;
        $hasil_upload2 = upload_files("ngo","ngo_photo2",1);
        $uploadOk .= "<br>".$hasil_upload2["uploadOk"];
        $message .= "<br>".$hasil_upload2["message"];
        $ngo_photo2 = $hasil_upload2["file_name"];
        $data += array('ngo_photo2' => $hasil_upload2["file_name"]);
      }


      if(isset($_FILES["ngo_photo3"]["name"]))
      { //echo 3;
        $hasil_upload3 = upload_files("ngo","ngo_photo3",2);
        $uploadOk .= "<br>".$hasil_upload3["uploadOk"];
        $message .= "<br>".$hasil_upload3["message"];
        $ngo_photo3 = $hasil_upload3["file_name"];
        $data += array('ngo_photo3' => $hasil_upload3["file_name"]);
      }


      if(isset($_FILES["ngo_photo4"]["name"]))
      { //echo 4;
        $hasil_upload4 = upload_files("ngo","ngo_photo4",3);
        $uploadOk .= "<br>".$hasil_upload4["uploadOk"];
        $message .= "<br>".$hasil_upload4["message"];
        $ngo_photo4 = $hasil_upload4["file_name"];
        $data += array('ngo_photo4' => $hasil_upload4["file_name"]);
      }


      if(isset($_FILES["ngo_photo5"]["name"]))
      { //echo 5;
        $hasil_upload5 = upload_files("ngo","ngo_photo5",4);
        $uploadOk .= "<br>".$hasil_upload5["uploadOk"];
        $message .= "<br>".$hasil_upload5["message"];
        $ngo_photo5 = $hasil_upload5["file_name"];
        $data += array('ngo_photo5' => $hasil_upload5["file_name"]);
      }
      if(isset($_POST['delete_ngo_photo1']))
      {
        $data += array('ngo_photo1' => null);
        $path_file = $target_dir.$filename1;
        if (file_exists($path_file)) {     unlink ( $path_file);   }

      }
      if(isset($_POST['delete_ngo_photo2']))
      {
        $data += array('ngo_photo2' => null);
        $path_file = $target_dir.$filename2;
        if (file_exists($path_file)) {     unlink ( $path_file);   }
      }
      if(isset($_POST['delete_ngo_photo3']))
      {
        $data += array('ngo_photo3' => null);
        $path_file = $target_dir.$filename3;
        if (file_exists($path_file)) {     unlink ( $path_file);   }
      }
      if(isset($_POST['delete_ngo_photo4']))
      {
        $data += array('ngo_photo4' => null);
        $path_file = $target_dir.$filename4;
        if (file_exists($path_file)) {     unlink ( $path_file);   }
      }
      if(isset($_POST['delete_ngo_photo5']))
      {
        $data += array('ngo_photo5' => null);
        $path_file = $target_dir.$filename5;
        if (file_exists($path_file)) {     unlink ( $path_file);   }
      }
        


        $hasil_eksekusi = false;

      if(isset($_POST['ngo_id']))
      {    
        if($mode == "delete" && $tipe=="ADMIN")
          {
            $db->where('ngo_id', $ngo_id);
            $hasil_eksekusi = $db->delete('ngo');
            $message = "Delete Success !!";
          }
          else
          {
            
            $data += array('ngo_modified_by' => $id_user);
            $data += array('ngo_modified_at' => $tgl);
            $data += array('ngo_is_deleted' => 0);

            $db->where ('ngo_id', $ngo_id);
            $hasil_eksekusi = $db->update ('ngo', $data);
            $message = "Update Success !!";

          }
          
          if ($hasil_eksekusi)
          {   
            echo json_encode( array("status" => true,"info" => $ngo_status,"messages" => $message ) );
          }//$db->count . ' records were updated';
          else
          {   
            echo json_encode( array("status" => false,"info" => 'update failed: ' . $db->getLastError(),"messages" => $message ) );

          }

        }
        else
        {  
          $data += array("ngo_id" => null);
          $data += array('ngo_created_by' => $id_user);
          $data += array('ngo_created_at' => $tgl);
          if($db->insert ('ngo', $data))
          {
            echo json_encode( array("status" => true,"info" => $ngo_status,"messages" => $message ) );
        
            // $message = 1;//"Insert berhasil!";
          }
          else
          {
            // echo 0;
            echo json_encode( array("status" => false,"info" => $db->getLastError(),"messages" => $message ) );
        
        
          }
        }
          // $data = Array (
          //         "ngo_nama" => $ngo_nama,
          //         "ngo_email" => $ngo_email,
          //         "ngo_tarikh" => $ngo_tarikh,
          //         "ngo_tempat" => $ngo_tempat,
          //         "ngo_agency" => $ngo_agency,//$sesi_tgl->format('Y-m-d'),
          //         "ngo_program" => $ngo_program,
          //         "ngo_jenis_program" => $ngo_jenis_program,
          //         "ngo_program_name" => $ngo_program_name,
          //         "ngo_bil_peserta" => $ngo_bil_peserta,
          //         "ngo_checkbox1" => $ngo_checkbox1,
          //         "ngo_checkbox2" => $ngo_checkbox2,
          //         "ngo_checkbox3" => $ngo_checkbox3,
          //         "ngo_checkbox4" => $ngo_checkbox4,
          //         "ngo_checkbox5" => $ngo_checkbox5,
          //         "ngo_checkbox6" => $ngo_checkbox6,
          //         "ngo_checkbox7" => $ngo_checkbox7,
          //         "ngo_ulasan" => $ngo_ulasan,
          //         "ngo_photo" => $ngo_photo,
          //         "ngo_status" => $ngo_status,
          //         "ngo_created_by" => $id_user,
          //         "ngo_created_at" => $tgl,
          //         "ngo_modified_by" => $id_user,
          //         "ngo_modified_at" => $tgl,
          //         "ngo_is_deleted" => 0
          //       );
      //     $db->where ('ngo_id', $ngo_id);
      //     if ($db->update ('ngo', $data))
      //     {   echo $ngo_status; }//$db->count . ' records were updated';
      //     else
      //     {   echo 'update failed: ' . $db->getLastError();   } 
      // }
      // else
      // {  
      //   $hasil = $db->insert ('ngo', $data);
      //   if($hasil)
      //   {
      //       echo $ngo_status;
      //     // $info = 1;//"Insert berhasil!";
      //   }
      //   else
      //   {
      //     // echo 0;
      //     echo $db->getLastError();

      //   }
      // }
              
        
        // $hasil = $db->rawQuery($sql);// or die(mysql_error());
        // echo "<script>alert('$hasil');</script>";
        // var_dump($hasil);
        
}
?>