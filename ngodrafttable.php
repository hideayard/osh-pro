

<?php
//auto
// $q_column = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='smart' AND `TABLE_NAME`='ngo'";
// $d_columns = $db->rawQuery($q_column);
//end of auto

$table = "ngo";
// $txt_field= "user_name,user_nama,user_hp,user_email,user_tipe,user_foto";
// $txt_label = "Username,Nama,HP,Email,Tipe,Foto";
$txt_field= "ngo_nama
,ngo_email
,ngo_tarikh
,ngo_tempat
,ngo_agency
,program_name_ms
";

$txt_label = "NAMA
,EMAIL
,TARIKH
,TEMPAT
,NGO/AGENSI/INSTITUSI
,PROGRAM NAME
";
$q_field = explode(",",$txt_field);
$q_label = explode(",",$txt_label);
// $i=1;$q_ngo = "select ".$q_field[0] ." as " .$q_label[0];
// for($i;$i<count($q_field);$i++)
// {
//     $q_ngo .= ",".$q_field[$i] ." as " .$q_label[$i];
// }
// $q_ngo .= " from $table";
// $d_ngo = $db->rawQuery($q_ngo);

?>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->

<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DRAFT NGO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">DRAFT NGO</li>
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
              <!-- <h3 class="card-title">List Data ngo</h3> -->

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <?php
                  echo "<th>No</th>";
                    echo "<th>Action</th>";

                    foreach ($q_label as $key => $value) {
                      echo "<th>".$value."</th>";
                      // var_dump($value);
                    }
  
                  ?>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <!-- <tfoot>
                <tr> -->
                <?php
                    // foreach ($q_label as $key => $value) {
                    //   echo "<th>".$value."</th>";
                    // }
                  ?>
                <!-- </tr>
                </tfoot> -->
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
  

