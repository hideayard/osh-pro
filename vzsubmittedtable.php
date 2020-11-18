

<?php
$table = "vz";
$txt_field= "vz_created_at
,vz_nama
,vz_email
,vz_tarikh
,vz_tempat
,vz_agency
,vz_program";

$txt_label = "SUBMITTED DATE
,NAMA
,EMAIL
,TARIKH
,TEMPAT
,AGENCY
,PROGRAM";

$q_field = array_map('trim', explode(",",$txt_field));
$q_label = array_map('trim', explode(",",$txt_label));

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
            <h1>SUBMITTED VISION ZERO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">SUBMITTED  VISION ZEROS</li>
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
              <!-- <h3 class="card-title">List Data  VISION ZEROS</h3> -->

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
                    }
  
                  ?>
                </tr>
                </thead>
                <tbody>
                
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
  

