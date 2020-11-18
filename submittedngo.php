
<?php
$ngo_id = isset($_GET['ngo_id']) ? $_GET['ngo_id'] : '';

$created_by = " and ngo_created_by = ".$id_user;
if($tipe_user == "ADMIN")
{
    $created_by = " and ngo_is_deleted = 0 ";
}
 $sql = "SELECT * FROM ngo WHERE ngo_id = '".$ngo_id ."' $created_by "; 
//  $sql = "SELECT * FROM ngo WHERE ngo_id = '".$ngo_id ."' and ngo_created_by = '".$_SESSION['i']."' "; 
 $result = $db->rawQuery($sql);//@mysql_query($sql);
//  echo $sql;
//  var_dump($result);
if(!$result)
{
  echo '<script>alert("No Data Found.!!");window.location="ngo";</script>';
}
if($result[0]['ngo_status']==2)
{
    echo '<script>alert("Data not Submitted yet");window.location="ngo";</script>';
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>SUBMITTED</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">NGO</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form id="ngoform" action="actionngo.php"  enctype="multipart/form-data" method="post">
     <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
        <div class="col-lg-12">

            <div class="card card-info col-lg-12 ">
                <div class="card-header">
                    <h3 class="card-title">LAPORAN PEMANTAUAN PELAKSANAAN PROGRAM KKP BANTUAN KEWANGAN PERKESO</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="row">

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>NAMA :</label>
                              <input readonly type="text" name="ngo_nama" class="form-control" placeholder="JAWATAN PEGAWAI PEMANTAU" value="<?=$result[0]['ngo_nama']?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>EMAIL ADDRESS:</label>
                              <input readonly type="text" name="ngo_email"  class="form-control" placeholder="EMAIL ADDRESS" value="<?=$result[0]['ngo_nama']?>">
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>TARIKH:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input readonly name="ngo_tarikh"  type="text" class="form-control float-right" id="tarikh"  value="<?=(new \DateTime($result[0]['ngo_tarikh']))->format('Y-m-d')?>" >
                              </div>
                              <!-- <input readonly type="text" class="form-control" placeholder="TARIKH" value="<?=$result[0]['ngo_tarikh']?>"> -->
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>TEMPAT:</label>
                              <input readonly type="text" name="ngo_tempat"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_tempat']?>">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>DAERAH:</label>
                              <input readonly type="text" name="ngo_daerah_name"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_daerah_name']?>">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>NEGERI:</label>
                              <input readonly type="text" name="ngo_negeri"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_negeri']?>">
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>NGO/AGENSI/INSTITUSI:</label>
                              <input readonly type="text" name="ngo_agency_name"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_agency_name']?>">
                          </div>
                        </div>

                        <?php 
                        if($result[0]['ngo_agency_name'] == "OTHERS" )
                        {
                        ?>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>OTHER NGO/AGENSI/INSTITUSI:</label>
                              <input readonly type="text" name="ngo_agency_name"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_agency_others']?>">
                          </div>
                        </div>
                        <?php 
                        }
                        ?>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>JENIS PROGRAM:</label>
                              <input readonly type="text" name="ngo_jenis_program_name"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_jenis_program_name']?>">
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>NAMA PROGRAM:</label>
                            <div class="form-group">
                            <textarea rows="4" readonly name="ngo_program_name" name="ngo_program_name" id="" style="width: 100%;height: 100%; text-align:center;"><?=$result[0]['ngo_program_name']?></textarea>
                              
                            </div>
                            <!-- <span class="select2 select2-container select2-container--bootstrap4 select2-container--below" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-readonly="false" aria-labelledby="select2-ixwu-container"><span class="select2-selection__rendered" id="select2-ixwu-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                          </div>
     
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>BIL. PESERTA:</label>
                              <input readonly name="ngo_bil_peserta" type="text" class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_bil_peserta']?>">
                          </div>
                        </div>

                        <div class="col-md-6"> 
                            <div class="form-group">                       
                              <label>SILA UPLOAD BUKTI PELAKSANAAN PROGRAM:</label>
                              <div class="input-group">
                              <?php if($result[0]['ngo_photo1'] != null) {  ?>
                                  <div id="preview1" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo1'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo1']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo1']; ?>" target="_blank"  id="filename1"><?=$result[0]['ngo_photo1']?></a></p>
                                      </div>

                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ngo_photo2'] != null) {  ?>
                                  <div id="preview2" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo2'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo2']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo2']; ?>" target="_blank"  id="filename2"><?=$result[0]['ngo_photo2']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ngo_photo3'] != null) {  ?>
                                  <div id="preview3" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo3'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo3']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo3']; ?>" target="_blank"  id="filename3"><?=$result[0]['ngo_photo3']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ngo_photo3']?>',3);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ngo_photo4'] != null) {  ?>
                                  <div id="preview4" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo4'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo4']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo4']; ?>" target="_blank"  id="filename4"><?=$result[0]['ngo_photo4']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ngo_photo5'] != null) {  ?>
                                  <div id="preview5" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo5'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo5']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo5']; ?>" target="_blank"  id="filename5"><?=$result[0]['ngo_photo5']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>                                         
                                </div>

                                  

                            </div>
                         </div>


                         <div class="col-md-6"> 
                          <div class="form-group">
                              <label>SYARAT-SYARAT PEMATUHAN (tick boxes):</label>
                              <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                      <input readonly  name="ngo_checkbox1" class="custom-control-input" type="checkbox" id="customCheckbox1" <?php if($result[0]['ngo_checkbox1'] == 1 ){ echo 'checked';}else{ echo '';}?> >
                                      <label for="customCheckbox1" class="custom-control-label">LOGO PERKESO DIPAMERKAN	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input readonly name="ngo_checkbox2" class="custom-control-input" type="checkbox" id="customCheckbox2"  <?php if($result[0]['ngo_checkbox2'] == 1 ){ echo 'checked';}else{ echo '';}?> >
                                      <label for="customCheckbox2" class="custom-control-label">PESERTA YANG TERLIBAT - PEKERJA	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input readonly name="ngo_checkbox3"  class="custom-control-input" type="checkbox" id="customCheckbox3" <?php if($result[0]['ngo_checkbox3'] == 1 ){ echo 'checked';}else{ echo '';}?> >
                                      <label for="customCheckbox3" class="custom-control-label">SAFETY OFFICER</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input readonly name="ngo_checkbox4" class="custom-control-input" type="checkbox" id="customCheckbox4" <?php if($result[0]['ngo_checkbox4'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox4" class="custom-control-label">PENGAMAL OSH</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input readonly name="ngo_checkbox5" class="custom-control-input" type="checkbox" id="customCheckbox5" <?php if($result[0]['ngo_checkbox5'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox5" class="custom-control-label">MAJIKAN / WAKIL MAJIKAN</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input readonly name="ngo_checkbox6" class="custom-control-input" type="checkbox" id="customCheckbox6" <?php if($result[0]['ngo_checkbox6'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox6" class="custom-control-label">PENCERAMAH PERKESO</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input readonly name="ngo_checkbox7" class="custom-control-input" type="checkbox" id="customCheckbox7" <?php if($result[0]['ngo_checkbox7'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox7" class="custom-control-label">PENCERAMAH YANG BERKELAYAKAN</label>
                                    </div>
                                  </div> <!-- end of form group -->
                          </div>
                        </div>
                        
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>ULASAN:</label>
                              <div class="form-group">
                              <textarea readonly name="ngo_ulasan" name="ulasan" id="" style="width: 100%;height: 100%;">
                              <?=$result[0]['ngo_ulasan']?></textarea>
                              <!-- <input readonly type="text" class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_nama']?>"> -->
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
                <!-- <div class="col-lg-3 col-4">
                    <button type="submit" id="btnSubmit" class="btn btn-block btn-primary"><span class="fa fa-paper-plane"></span> Submit</button>
                </div> -->
                <!-- ./col -->

                <!-- <div class="col-lg-3 col-4">
                      <button type="button"  id="btnSave"  onclick=" " class="btn btn-block btn-info"><span class="fa fa-save"></span> Update</button>
                </div> -->
                <!-- ./col -->

                <div class="col-lg-6 col-6">
                    <a href="ngo"><button type="button" class="btn btn-block btn-secondary">Back</button></a>
                </div>
                <!-- ./col -->
          </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</form>
</div>
