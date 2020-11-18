
<?php
$oshe_id = isset($_GET['oshe_id']) ? $_GET['oshe_id'] : '';
$created_by = " and oshe_created_by = ".$id_user;
if($tipe_user == "ADMIN" || $tipe_user == "HQ")
{
    $created_by = " and oshe_is_deleted = 0 ";
}
 $sql = "SELECT * FROM oshe WHERE oshe_id = '".$oshe_id ."' $created_by "; 
 $result = $db->rawQuery($sql);

if(!$result)
{
  echo '<script>alert("No Data Found.!!");window.location="oshe";</script>';
}
if($result[0]['oshe_status']==2)
{
    echo '<script>alert("Data not Submitted yet");window.location="oshe";</script>';
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>SUBMITTED OSHE</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">OSHE</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form id="osheform" action="actionoshe.php"  enctype="multipart/form-data" method="post">

     <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
        <div class="col-lg-12">

            <div class="card card-info col-lg-12 ">
                <div class="card-header">
                    <h3 class="card-title">LAPORAN PELAKSANAAN PROGRAM AVOKASI PENCEGAHAN</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="row" >

                    <div class="col-md-6">
                          <div class="form-group">
                              <label>EMAIL ADDRESS:</label>
                              <input disabled  type="text" name="oshe_email" class="form-control" placeholder="EMAIL ADDRESS" value="<?=$result[0]['oshe_email']?>" >
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>PEJABAT PERKESO :</label>
                              <input disabled  type="text"  name="oshe_pejabat" class="form-control" placeholder="NAMA PEJABAT PERKESO" value="<?=$result[0]['oshe_pejabat']?>" >
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>MAJIKAN :</label>
                              <input disabled  type="text"  name="oshe_majikan" class="form-control" placeholder="NAMA MAJIKAN" value="<?=$result[0]['oshe_majikan']?>" >
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>NO. KOD MAJIKAN :</label>
                              <input disabled  type="text"  name="oshe_kod_majikan" class="form-control" placeholder="NO. KOD MAJIKAN" value="<?=$result[0]['oshe_kod_majikan']?>" >
                          </div>
                        </div>


                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>TARIKH PROGRAM:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input disabled  type="text" name="oshe_tarikh"  class="form-control float-right" id="tarikh"  value="<?=(new \DateTime($result[0]['oshe_tarikh']))->format('Y-m-d')?>"  >
                              </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>BIL. PESERTA:</label>
                              <input disabled  type="text" name="oshe_bil_peserta"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['oshe_bil_peserta']?>" >
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>JUMLAH KEMALANGAN COMMUTING ACCIDENT (CA):</label>
                              <input disabled  type="text"  name="oshe_ca" class="form-control" placeholder="Enter ..." value="<?=$result[0]['oshe_ca']?>" >
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>JUMLAH KEMALANGAN INDUSTRIAL ACCIDENT (IA):</label>
                              <input disabled  type="text"  name="oshe_ia" class="form-control" placeholder="Enter ..." value="<?=$result[0]['oshe_ia']?>" >
                          </div>
                        </div>
                     

                       


                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>AKTIVITI - AKTIVITI YANG BERKAITAN (tick boxes):</label>
                              <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                      <input disabled   name="oshe_checkbox1" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox1'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox1">
                                      <label for="customCheckbox1" class="custom-control-label">CERAMAH PENCEGAHAN KEMALANGAN JALAN RAYA	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input disabled   name="oshe_checkbox2" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox2'] == 1 ){ echo 'checked';}else{ echo '';}?>  id="customCheckbox2" >
                                      <label for="customCheckbox2" class="custom-control-label">CERAMAH KEMALANGAN INDUSTRI/PENYAKIT PEKERJAAN	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input disabled   name="oshe_checkbox3" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox3'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox3">
                                      <label for="customCheckbox3" class="custom-control-label">CERAMAH PROMOSI KESEHATAN/HSP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input disabled   name="oshe_checkbox4" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox4'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox4" >
                                      <label for="customCheckbox4" class="custom-control-label">PEMBERIAN TOPI KELEDAR</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input disabled   name="oshe_checkbox5" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox5'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox5" >
                                      <label for="customCheckbox5" class="custom-control-label">CERAMAH OSH DARI MIROS</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input disabled  name="oshe_checkbox6"  class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox6'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox6" >
                                      <label for="customCheckbox6" class="custom-control-label">CERAMAH DARI JKJR</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input disabled  name="oshe_checkbox7"  class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox7'] == 1 ){ echo 'checked';}else{ echo '';}?>  id="customCheckbox7" >
                                      <label for="customCheckbox7" class="custom-control-label">CERAMAH DARI LAIN-LAIN AGENSI</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input disabled  name="oshe_checkbox8"  class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox8'] == 1 ){ echo 'checked';}else{ echo '';}?>  id="customCheckbox8" >
                                      <label for="customCheckbox8" class="custom-control-label">OTHER</label>
                                      <input disabled  name="oshe_checkbox8_text"  class="form-group" style="width:100%;" type="text" id="other" value="<?=isset($result[0]['oshe_checkbox8_text']) ?>" >
                                    </div>
                                    
                                  </div> <!-- end of form group -->

                                  
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>CADANGAN PENAMBAHBAIKKAN:</label>
                              <div class="form-group">
                              <textarea disabled name="oshe_cadangan" id="" style="width: 100%;height: 100%; align-content:left; overflow:auto; ">
                              <?=$result[0]['oshe_cadangan']?>
                              </textarea>
                              
                              </div>
                          </div>
                        </div>


                      
                         <div class="col-md-6"> 
                            <div class="form-group">                       
                              <label>SILA UPLOAD BUKTI PELAKSANAAN PROGRAM:</label>
                              <div class="input-group">
                              <?php if($result[0]['oshe_photo1'] != null) {  ?>
                                  <div id="preview1" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo1'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo1']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo1']; ?>" target="_blank"  id="filename1"><?=$result[0]['oshe_photo1']?></a></p>
                                      </div>

                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo2'] != null) {  ?>
                                  <div id="preview2" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo2'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo2']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo2']; ?>" target="_blank"  id="filename2"><?=$result[0]['oshe_photo2']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo3'] != null) {  ?>
                                  <div id="preview3" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo3'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo3']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo3']; ?>" target="_blank"  id="filename3"><?=$result[0]['oshe_photo3']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo4'] != null) {  ?>
                                  <div id="preview4" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo4'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo4']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo4']; ?>" target="_blank"  id="filename4"><?=$result[0]['oshe_photo4']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo5'] != null) {  ?>
                                  <div id="preview5" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo5'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo5']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo5']; ?>" target="_blank"  id="filename5"><?=$result[0]['oshe_photo5']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>                                         
                                </div>

                                  

                            </div>
                         </div>


                    </div>
                
                        
                </div>


            
            </div>

          

        </div>
        <!-- /.row -->

        </div>

          <!-- /.row -->
          <div class="row col-lg-12" style="text-align:center;">

                <div class="col-lg-3 col-4">
                    <a href="oshe"><button type="button" class="btn btn-block btn-secondary">Back</button></a>
                </div>
                <!-- ./col -->
          </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </form>

</div>
