
<?php

// $file = basename($_SERVER['PHP_SELF']);
// $filename = (explode(".",$file))[0];

// if(!check_role($file,null))
// {
//   echo json_encode( array("status" => false,"info" => "You are not authorized.!!!","messages" => "You are not authorized.!!!" ) );
// }
// else
// {
/*
select 
  (SELECT count(oshe_id) FROM `oshe` WHERE YEAR(oshe_created_at) = YEAR(NOW()) ) as year
  , (SELECT count(oshe_id) FROM `oshe` WHERE YEAR(oshe_created_at) = YEAR(NOW()) and MONTH(oshe_created_at) = MONTH(NOW()) ) as month
  , (SELECT count(oshe_id) FROM `oshe` WHERE YEAR(oshe_created_at) = YEAR(NOW()) and MONTH(oshe_created_at) = MONTH(NOW())  and  YEARWEEK(oshe_created_at)=YEARWEEK(NOW()) ) as week
  , (SELECT count(oshe_id) FROM `oshe` WHERE date(oshe_created_at) = curdate() ) as today
  */

  //  $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status<>0  order by ucux_id desc LIMIT 0,6 "; 
  $sql = "SELECT 
  (SELECT count(oshe_id) FROM `oshe` WHERE YEAR(oshe_created_at) = YEAR(NOW()) ) as oshe_year
  , (SELECT count(oshe_id) FROM `oshe` WHERE YEAR(oshe_created_at) = YEAR(NOW()) and MONTH(oshe_created_at) = MONTH(NOW()) ) as oshe_month
  , (SELECT count(oshe_id) FROM `oshe` WHERE YEAR(oshe_created_at) = YEAR(NOW()) and MONTH(oshe_created_at) = MONTH(NOW())  and  YEARWEEK(oshe_created_at)=YEARWEEK(NOW()) ) as oshe_week
  , (SELECT count(oshe_id) FROM `oshe` WHERE date(oshe_created_at) = curdate() ) as oshe_today

  , (SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW()) ) as ngo_year
  , (SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW()) and MONTH(ngo_created_at) = MONTH(NOW()) ) as ngo_month
  , (SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW()) and MONTH(ngo_created_at) = MONTH(NOW())  and  YEARWEEK(ngo_created_at)=YEARWEEK(NOW()) ) as ngo_week
  , (SELECT count(ngo_id) FROM `ngo` WHERE date(ngo_created_at) = curdate() ) as ngo_today

  , (SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW()) ) as ucux_year
  , (SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW()) and MONTH(ucux_created_at) = MONTH(NOW()) ) as ucux_month
  , (SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW()) and MONTH(ucux_created_at) = MONTH(NOW())  and  YEARWEEK(ucux_created_at)=YEARWEEK(NOW()) ) as ucux_week
  , (SELECT count(ucux_id) FROM `ucux` WHERE date(ucux_created_at) = curdate() ) as ucux_today

  , (SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW()) ) as vz_year
  , (SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW()) and MONTH(vz_created_at) = MONTH(NOW()) ) as vz_month
  , (SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW()) and MONTH(vz_created_at) = MONTH(NOW())  and  YEARWEEK(vz_created_at)=YEARWEEK(NOW()) ) as vz_week
  , (SELECT count(vz_id) FROM `vz` WHERE date(vz_created_at) = curdate() ) as vz_today" ;
  $result = $db->rawQuery($sql);//@mysql_query($sql);
  //  var_dump($result);
  // require_once ("jwt_token.php");
  // var_dump(verify_token($_SESSION['token'],'B15m1ll4#');
  ?>
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Home</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                  <div class="col-lg-12">
                  
  <?php

  if($_SESSION['t']=="ADMIN")
  {
  ?>   
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">SUMMARY OF SUBMITTED REPORT</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
                                  </ol>
                                  <div class="carousel-inner">
                                  <div class="carousel-item active">
                                          <div class="info-box bg-gradient-info " >
                                            <div class="col-lg-12" style="text-align:center;">
                                              <table style="width:100%;">
                                                  <tr>
                                                      <td colspan="2">OSHE Implementation (Pelaksanaan)</td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>Today : <?=$result[0]['oshe_today']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <!-- <tr>
                                                      <td>This week : <?=$result[0]['oshe_week']?></td>
                                                      <td></td>
                                                  </tr> -->
                                                  <tr>
                                                      <td>This month : <?=$result[0]['oshe_month']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>This year : <?=$result[0]['oshe_year']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td><br></td>
                                                      <td></td>
                                                  </tr>
                                              </table>
                                              
                                            </div>

                                          </div>



                                          <!-- <img class="d-block w-100" src="https://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide"> -->
                                      </div>

                                      <div class="carousel-item">
                                          <div class="info-box bg-gradient-success " >
                                            <div class="col-lg-12" style="text-align:center;">
                                              <table style="width:100%;">
                                                  <tr>
                                                      <td colspan="2">NGO Observation (Pemantauan)</td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>Today : <?=$result[0]['ngo_today']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <!-- <tr>
                                                      <td>This week : <?=$result[0]['ngo_week']?></td>
                                                      <td></td>
                                                  </tr> -->
                                                  <tr>
                                                      <td>This month : <?=$result[0]['ngo_month']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>This year : <?=$result[0]['ngo_year']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td><br></td>
                                                      <td></td>
                                                  </tr>
                                              </table>
                                              
                                            </div>

                                          </div>

                                      </div>

                                      <div class="carousel-item">
                                          <div class="info-box bg-gradient-warning " >
                                            <div class="col-lg-12" style="text-align:center;">
                                              <table style="width:100%;">
                                                  <tr>
                                                      <td colspan="2">U.C.U.X REPORT</td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>Today : <?=$result[0]['ucux_today']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <!-- <tr>
                                                      <td>This week : <?=$result[0]['ucux_week']?></td>
                                                      <td></td>
                                                  </tr> -->
                                                  <tr>
                                                      <td>This month : <?=$result[0]['ucux_month']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>This year : <?=$result[0]['ucux_year']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td><br></td>
                                                      <td></td>
                                                  </tr>
                                              </table>
                                              
                                            </div>

                                          </div>

                                      </div>

                                      
                                      <div class="carousel-item">
                                          <div class="info-box bg-gradient-danger " >
                                            <div class="col-lg-12" style="text-align:center;">
                                              <table style="width:100%;">
                                                  <tr>
                                                      <td colspan="2">Vision Zero Activity</td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>Today : <?=$result[0]['vz_today']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <!-- <tr>
                                                      <td>This week : <?=$result[0]['vz_week']?></td>
                                                      <td></td>
                                                  </tr> -->
                                                  <tr>
                                                      <td>This month : <?=$result[0]['vz_month']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>This year : <?=$result[0]['vz_year']?></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td><br></td>
                                                      <td></td>
                                                  </tr>
                                              </table>
                                              
                                            </div>

                                          </div>

                                      </div>
                                      <!-- <div class="carousel-item ">
                                          <img class="d-block w-100"
                                              src="https://placehold.it/900x500/3c8dbc/ffffff&amp;text=next"
                                              alt="Second slide">
                                      </div>
                                      <div class="carousel-item">
                                          <img class="d-block w-100"
                                              src="https://placehold.it/900x500/f39c12/ffffff&amp;text=next_again"
                                              alt="Third slide">
                                      </div> -->
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                      data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                      data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>


                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  <?php } // else { ?>
                  <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <a href="oshe">
              <div class="small-box bg-info center">
                <div class="inner">
                  <h3>OSHE</h3>

                  <!-- <p>New Orders</p> -->
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-shopping-cart"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                SOCSO staff reporting  
                <!-- <i class="fas fa-arrow-circle-right"></i> -->
                </a>
              </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <a href="ngo">
              <div class="small-box bg-success center">
                <div class="inner">
                <h3>NGO</h3>

                  <!-- <p>Bounce Rate</p> -->
                </div>
                <div class="icon">
                  <!-- <i class="ion ion-stats-bars"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                Program reporting
                  <!-- <i class="fas fa-arrow-circle-right"></i> -->
                </a>
              </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <a href="ucux">
              <div class="small-box bg-warning center">
                <div class="inner">
                  <h3>U.C.U.X</h3>

                  <!-- <p>User Registrations</p> -->
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-user-plus"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Safety act reporting
                  <!-- <i class="fas fa-arrow-circle-right"></i> -->
                </a>
              </div></a>
            </div>
            <!-- ./col -->
            <?php 
            // if($tipe_user=="VZ" || $tipe_user=="ADMIN") { 
              ?>
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <a href="vz"><div class="small-box bg-danger center">
                  <div class="inner">
                      <h3>Vision Zero</h3>
                      <!-- <p>Unique Visitors</p> -->
                  </div>
                <div class="icon">
                  <!-- <i class="fas fa-chart-pie"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                Partner activities
                  <!-- <i class="fas fa-arrow-circle-right"></i> -->
                </a>
              </div>
              </a>
            </div>
            <!-- ./col -->
            <?php // } ?>

          </div>
  <?php //} ?>
                  </div>

              </div>
  <?php
  if($_SESSION['t']=="ADMIN")
  {
  ?>   
  <div class="row">
  <!-- ./col -->
  <div class="col-lg-3 col-6">
              <!-- small card -->
              <a href="statistic">
              <div class="small-box bg-purple center">
                <div class="inner">
                  <h3>Statistics</h3>

                  <!-- <p>User Registrations</p> -->
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-user-plus"></i> -->
                </div>
                <a href="statistic" class="small-box-footer">
                <i class="nav-icon fas fa-chart-bar"></i> Statistics
                  <!-- <i class="fas fa-arrow-circle-right"></i> -->
                </a>
              </div></a>
            </div>

              <!-- /.row -->
              <!-- <div class="row col-lg-12" style="text-align:center;">
                  <div class="col-lg-3 col-6">
                      <a href="statistic"><button type="button" class="btn btn-block btn-primary">Statistic</button></a>
                  </div> -->
                  <!-- ./col -->
                  <!-- <div class="col-lg-3 col-6">
                      <a href="report"><button type="button" class="btn btn-block btn-primary">Report</button></a>
                  </div> -->
                  <!-- ./col -->

                  <!-- <div class="col-lg-3 col-6">
                          <div class="btn btn-primary">
                              Report 
                              <button  type="button" class="btn dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                              <span class="sr-only">Toggle Dropdown</span>
                              <div class="dropdown-menu" role="menu" style="">
                                  <a  class="dropdown-item" onclick="goto('oshereport');">OSHE</a>
                                  <a  class="dropdown-item" onclick="goto('ngoreport');">NGO</a>
                                  <a  class="dropdown-item" onclick="goto('ucuxreport');">U.C.U.X</a>
                                  <a  class="dropdown-item" onclick="goto('vzreport');">Vision Zero</a>
                              </div>
                              </button>
                          </div>
                  </div> -->

              </div>
  <?php } ?>

          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

  </div>

  <script>
  function goto(link)
  {
      window.location=link;
  }
  </script>
<?php
// }
?>