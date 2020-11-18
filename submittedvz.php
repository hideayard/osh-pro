

<?php
$vz_id = isset($_GET['vz_id']) ? $_GET['vz_id'] : '';

$created_by = " and vz_created_by = ".$id_user;
if($tipe_user == "ADMIN")
{
    $created_by = " and vz_is_deleted = 0 ";
}
 $sql = "SELECT * FROM vz WHERE vz_id = '".$vz_id ."' $created_by "; 

//  $sql = "SELECT * FROM vz WHERE vz_id = '".$vz_id ."' and vz_created_by = '".$_SESSION['i']."' "; 
 $result = $db->rawQuery($sql);//@mysql_query($sql);
//  echo $sql;
//  var_dump($result);
if(!$result)
{
  echo '<script>alert("No Data Found.!!");window.location="vz";</script>';
}
if($result[0]['vz_status']==2)
{
    echo '<script>alert("Data Already Submitted");window.location="vz";</script>';
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
              <li class="breadcrumb-item"><a href="#">VISION ZERO</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form id="vzform" action="actionvz.php"  enctype="multipart/form-data" method="post">

     <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
        <div class="col-lg-12">

            <div class="card card-info col-lg-12 ">
                <div class="card-header">
                    <h3 class="card-title">LAPORAN AKTIVITI</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form >
                    <div class="row">

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>NAMA :</label>
                              <input disabled  name="vz_nama" type="text" class="form-control" placeholder="NAMA PENGURUS"  value="<?=$result[0]['vz_nama']?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>EMAIL ADDRESS:</label>
                              <input disabled  name="vz_email" type="text" class="form-control" placeholder="EMAIL ADDRESS"  value="<?=$result[0]['vz_email']?>" >
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
                                <input disabled  name="vz_tarikh" type="text" class="form-control float-right" id="tarikh"  value="<?=(new \DateTime($result[0]['vz_tarikh']))->format('Y-m-d')?>" >
                              </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>TEMPAT:</label>
                              <input disabled  name="vz_tempat" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_tempat']?>" >
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>NGO/AGENSI/INSTITUSI:</label>
                              <input disabled  name="vz_agency" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_agency']?>" >
                          </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                          <label>NAMA PROGRAM:</label>
                          <div class="form-group">
                          <input disabled  name="vz_program" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_program']?>" >

                            <!-- <select class="form-control FilterDB "  style="width: 100%;border-color:blue;">
                            </select> -->
                          </div>
                          <!-- <span class="select2 select2-container select2-container--bootstrap4 select2-container--below" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ixwu-container"><span class="select2-selection__rendered" id="select2-ixwu-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                        </div>
        
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>BIL. PESERTA:</label>
                              <input disabled  name="vz_bil_peserta" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_bil_peserta']?>" >
                          </div>
                        </div>

                         
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>ULASAN:</label>
                              <div class="form-group">
                              <textarea disabled name="vz_ulasan" id="" style="width: 100%;height: 100%;">
                              <?=$result[0]['vz_ulasan']?>
                                </textarea>
                              </div>
                          </div>
                        </div>


                        <div class="col-md-6"> 
                            <div class="form-group">                       
                              <label>SILA UPLOAD GAMBAR PROGRAM:</label>
                                  <div class="input-group">
                                  <?php if($result[0]['vz_photo1'] != null) {  ?>
                                  <div id="preview1" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo1'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo1']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo1']; ?>" target="_blank"  id="filename1"><?=$result[0]['vz_photo1']?></a></p>
                                      </div>

                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['vz_photo2'] != null) {  ?>
                                  <div id="preview2" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo2'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo2']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo2']; ?>" target="_blank"  id="filename2"><?=$result[0]['vz_photo2']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['vz_photo3'] != null) {  ?>
                                  <div id="preview3" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo3'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo3']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo3']; ?>" target="_blank"  id="filename3"><?=$result[0]['vz_photo3']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['vz_photo3']?>',3);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['vz_photo4'] != null) {  ?>
                                  <div id="preview4" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo4'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo4']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo4']; ?>" target="_blank"  id="filename4"><?=$result[0]['vz_photo4']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['vz_photo5'] != null) {  ?>
                                  <div id="preview5" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo5'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo5']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo5']; ?>" target="_blank"  id="filename5"><?=$result[0]['vz_photo5']?></a></p>
                                      </div>
                                     
                                      </div>
                                  </div>
                                <?php } ?>                                    
                                
                                 </div>

                            </div>
                         </div>

                    </div>
                
                        
                </form>
                </div>


            
            </div>

          

        </div>
        <!-- /.row -->

        </div>

         <!-- /.row -->
         <div class="row col-lg-12" style="text-align:center;">
              

                <div class="col-lg-3 col-4">
                    <a href="vz"><button type="button" class="btn btn-block btn-secondary">Back</button></a>
                </div>
                <!-- ./col -->
          </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</form>
</div>

