

<?php
//auto
// $q_column = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='smart' AND `TABLE_NAME`='oshe'";
// $d_columns = $db->rawQuery($q_column);
//end of auto

$table = "oshe";
// $txt_field= "user_name,user_nama,user_hp,user_email,user_tipe,user_foto";
// $txt_label = "Username,Nama,HP,Email,Tipe,Foto";
$txt_field= "oshe_email
,oshe_pejabat
,oshe_majikan
,oshe_kod_majikan
,oshe_tarikh
";

$txt_label = "EMAIL
,PEJABAT
,MAJIKAN
,KOD MAJIKAN
,TARIKH
";
$q_field = explode(",",$txt_field);
$q_label = explode(",",$txt_label);
// $i=1;$q_oshe = "select ".$q_field[0] ." as " .$q_label[0];
// for($i;$i<count($q_field);$i++)
// {
//     $q_oshe .= ",".$q_field[$i] ." as " .$q_label[$i];
// }
// $q_oshe .= " from $table";
// $d_oshe = $db->rawQuery($q_oshe);

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
            <h1>DRAFT OSHE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">DRAFT OSHE</li>
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
  

