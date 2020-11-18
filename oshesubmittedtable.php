

<?php


$table = "oshe";

$txt_field= "
oshe_id
,oshe_kod_majikan
,oshe_pejabat
,oshe_majikan
,oshe_bil_peserta
,oshe_tarikh
,oshe_created_at
,oshe_ca
,oshe_ia
,oshe_email
,oshe_checkbox1
,oshe_checkbox2
,oshe_checkbox3
,oshe_checkbox4
,oshe_checkbox5
,oshe_checkbox6
,oshe_checkbox7
,oshe_checkbox8
,oshe_checkbox8_text
,oshe_cadangan
,oshe_photo1";


$txt_label = "
ACTION
,KOD MAJIKAN
,PEJABAT
,MAJIKAN
,BIL.PESERTA
,TARIKH PROGRAM
,TARIKH LAPOR
,JUMLAH CA
,JUMLAH IA
,EMAIL
,CERAMAH PENCEGAHAN KEMALANGAN JALAN RAYA
,CERAMAH KEMALANGAN INDUSTRI/PENYAKIT PEKERJAAN
,CERAMAH PROMOSI KESEHATAN/HSP
,PEMBERIAN TOPI KELEDAR
,CERAMAH OSH DARI MIROS
,CERAMAH DARI JKJR
,CERAMAH DARI LAIN-LAIN AGENSI
,OTHER
,OTHER TEXT
,CADANGAN PENAMBAHBAIKKAN
,PHOTO";

$q_field = explode(",",$txt_field);
$q_label = explode(",",$txt_label);

?>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SUBMITTED OSHE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">SUBMITTED OSHE</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">List Data oshe</h3> -->

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2"  class="table table-bordered table-hover table-striped table-bordered nowrap" style="width:100%">
                <thead>
                <tr>
                  <?php
                  echo "<th>No</th>";

                    foreach ($q_label as $key => $value) {
                      echo "<th>".$value."</th>";
                    }
  
                  ?>
                </tr>
                </thead>
                <tbody>
                <?php
                $mode = isset($_GET['mode']) ? $_GET['mode'] : "draft"; 
                $created_by = " oshe_created_by = ".$id_user;
                $wheremode = "AND oshe_status = 2 AND oshe_email <> ''";
                if($tipe_user == "ADMIN"||$tipe_user == "HQ")
                {
                    $created_by = " oshe_is_deleted = 0 ";
                }
                if($mode=="submitted")
                {
                    $wheremode = "AND oshe_status = 1 AND oshe_email <> ''";
                }
                
$sql = "SELECT $txt_field FROM $table where  oshe_tarikh >= 19970505  and $created_by $wheremode"; 
//echo "$sql;";
$data = $db->rawQuery($sql);
$jml = count($data);

if($jml>0)
{
  $fields = explode(",",$txt_field);
  array_shift($fields);
  foreach($data as $key => $value)
    {
      echo "<tr>";
      echo "<td>".($key+1)."</td>";
      echo "<td>";
      switch($mode)
                {
                    case "draft" : {
                        echo '<a href="index.php?page=draftoshe&oshe_id='.$value["oshe_id"].'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'oshe\',\'draft\','.$value["oshe_id"].')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;

                    }break;
                    case "submitted" : {
                        if($tipe_user == "ADMIN")
                        {
                          echo '<a href="index.php?page=submittedoshe&oshe_id='.$value["oshe_id"].'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> | <a onclick="actiondelete(\'oshe\',\'submitted\','.$value["oshe_id"].')" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>' ;
                        }
                        else
                        {
                          echo '<a href="index.php?page=submittedoshe&oshe_id='.$value["oshe_id"].'" class="btn btn-primary"><span><i class="fa fa-eye"></i></span></a> ';
                        }
                    }break;
                    
                }
      echo "</td>";
      
      foreach($fields as $key2 => $value2)
      {
        echo "<td>";
        if(trim($value2)=="oshe_photo1")
        { 
          if($value[trim($value2)])
          {
              echo '<img onclick="popup(`'.$value[trim($value2)].'`,`uploads/oshe/'.$value[trim($value2)].'`);" src="uploads/oshe/'.$value[trim($value2)].'"  class="direct-chat-img" alt="User Image">';
          }
          else
          {
              echo '<img src="uploads/oshe/avatar5.png" class="direct-chat-img" alt="User Image">';
          }
        }
        else
        {
          echo $value[trim($value2)];
        }
        echo "</td>";
      }
      echo "</tr>";
    }
}
else
{

}
                ?>
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
  <script>
  function popup(img,url){
    document.getElementById("myModal").style.display = "block";
    document.getElementById("img01").src = url;
    document.getElementById("caption").innerHTML = img;
    
  }


// // Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// // When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  document.getElementById("myModal").style.display = "none";
}
</script>
