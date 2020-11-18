
<?php
$ngo_id = isset($_GET['ngo_id']) ? $_GET['ngo_id'] : '';
$created_by = " and ngo_created_by = ".$id_user;
if($tipe_user == "ADMIN")
{
  $created_by = " and ngo_is_deleted = 0 ";
}
 $sql = "SELECT * FROM ngo WHERE ngo_id = '".$ngo_id ."' $created_by "; 
// $sql = "SELECT * FROM ngo WHERE ngo_id = '".$ngo_id ."' and ngo_created_by = '".$_SESSION['i']."' ;"; 
 $result = $db->rawQuery($sql);
//  echo $sql;
//  var_dump($result);die;
if(!$result)
{
  // echo '<script>alert("No Data Found.!!'.$sql.'");window.location="ngo";</script>';
  echo '<script>alert("No Data Found.!!");window.location="ngo";</script>';
}
if($result[0]['ngo_status']==1)
{
    echo '<script>alert("Data Already Submitted");window.location="ngo";</script>';
}

//  $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status=1  order by ucux_id desc LIMIT 0,2 "; 
 $sql_pt = "SELECT pt_id, pt_name FROM program_tipe WHERE pt_status = 1   order by pt_id "; 
 $result_pt = $db->rawQuery($sql_pt);//@mysql_query($sql);

 $sql2 = "SELECT * FROM program WHERE program_status = 1 order by program_pt_id,program_id "; 
 $result2 = $db->rawQuery($sql2);//@mysql_query($sql);

 $sqlprogram = "SELECT * FROM program WHERE program_status = 1 and program_pt_id = ".$result[0]["ngo_jenis_program"]." order by program_pt_id,program_id "; 
 $resultprogram = $db->rawQuery($sqlprogram);
//  var_dump($result);
$maxfile = 5;
$filecount = 0;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Draft Data</h1>
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
                              <input type="text" name="ngo_nama" class="form-control" placeholder="JAWATAN PEGAWAI PEMANTAU" value="<?=$result[0]['ngo_nama']?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>EMAIL ADDRESS:</label>
                              <input type="text" name="ngo_email"  class="form-control" placeholder="EMAIL ADDRESS" value="<?=$result[0]['ngo_nama']?>">
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
                                <input  name="ngo_tarikh"  type="text" class="form-control float-right" id="tarikh"  value="<?=(new \DateTime($result[0]['ngo_tarikh']))->format('Y-m-d')?>" >
                              </div>
                              <!-- <input type="text" class="form-control" placeholder="TARIKH" value="<?=$result[0]['ngo_tarikh']?>"> -->
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>TEMPAT:</label>
                              <input type="text" name="ngo_tempat"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_tempat']?>">
                          </div>
                        </div>
                        <?php
                        $sqlp = "SELECT pejabat_id, pejabat_nama FROM pejabat order by pejabat_id "; 
                        $resultpejabat = $db->rawQuery($sqlp);
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="ngo_daerah_id">DAERAH :</label>
                              <select  id="ngo_daerah_id" name="ngo_daerah_id"  class="form-control select2bs4"   > 
                              <?php
                                foreach ($resultpejabat as $key => $value)
                                {
                                  if($value["pejabat_nama"]!="IBU PEJABAT")
                                  {
                                    // echo "<option value='".$value["pejabat_id"]."'>".$value["pejabat_nama"]."</option>" ;
                                    $selected = " ";
                                    if($result[0]['ngo_daerah_id'] == $value["pejabat_id"] )
                                    {
                                      $selected = 'selected="selected"';
                                    }
                                    echo "<option value='".$value["pejabat_id"]."' ".$selected ." >".$value["pejabat_nama"]."</option>" ;
                                  }
                                  
                                }
                              ?>                               
                              </select>
                          </div>
                        </div>
                        <input type="hidden" id="ngo_daerah_name"  name="ngo_daerah_name"  class="form-control" value="<?=$result[0]["ngo_daerah_name"]?>"/>
                        <div class="col-md-6">
                          <div class="form-group">
                         
                              <label for="ngo_negeri">NEGERI :</label>
                              <select  id="ngo_negeri" name="ngo_negeri"  class="form-control select2bs4"   > 
                                <?php
                                $arr_negeri = array("KEDAH","PAHANG","PERAK","PERLIS","SELANGOR","NEGERI SEMBILAN","JOHOR","KELANTAN","TERENGGANU","SARAWAK","PULAU PINANG","MELAKA","SABAH","WILAYAH PERSEKUTUAN");
                                foreach ($arr_negeri as $key => $value)
                                {
                                  $selected = " ";
                                    if($result[0]['ngo_negeri'] == $value )
                                    {
                                      $selected = 'selected="selected"';
                                    }
                                    echo "<option value='".$value."' ".$selected ." >".$value."</option>" ;
                                }
                                ?>
                              </select>
                          </div>
                        </div>
                        <!-- <div class="col-md-6"> 
                          <div class="form-group">
                              <label>NGO/AGENSI/INSTITUSI:</label>
                              <input type="text" name="ngo_agency"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_agency_name']?>">
                          </div>
                        </div> -->
                        <?php
                        $sqlp = "SELECT agency_id, agency_name, agency_singkatan FROM agency order by agency_id "; 
                        $resultagency = $db->rawQuery($sqlp);
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="ngo_agency">NGO/AGENSI/INSTITUSI :</label>
                              <select  id="ngo_agency" name="ngo_agency"  class="form-control select2bs4"   > 
                              <?php
                              $flag=0;
                              foreach ($resultagency as $key => $value)
                              { //$result[0]['ngo_agency_name']
                                $selected = " ";
                                if($result[0]['ngo_agency'] == $value["agency_id"] )
                                {$flag=1;
                                  $selected = 'selected="selected"';
                                }
                                  echo "<option value='".$value["agency_id"]."' ".$selected ." >(".$value["agency_singkatan"].") ".$value["agency_name"]."</option>" ;
                              }
                              if($flag==0){$selectedother  = 'selected="selected"';$displayotheragency="inline";}else{$selectedother  = ' ';$displayotheragency="none";}
                              echo "<option value='0'$selectedother >OTHERS</option>" ;
                              ?>                               
                              </select>
                          </div>
                        </div>
                        
                        <input type="hidden" id="ngo_agency_name"  name="ngo_agency_name"  class="form-control" value="<?=$result[0]["ngo_agency_name"]?>"/>
                        <div class="col-md-6" id="div_agency" style="display:<?=$displayotheragency?>;">
                          <div class="form-group">
                              <label for="ngo_agency_others">OTHERS NGO/AGENSI/INSTITUSI :</label>
                              <input type="text" name="ngo_agency_others"  class="form-control" placeholder="Enter ..." value="<?=$result[0]["ngo_agency_others"]?>">
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>JENIS PROGRAM:</label>
                            <div class="form-group">
                              <select  id="ngo_jenis_program" name="ngo_jenis_program"  class="form-control select2bs4"   > 
                              <?php
                              foreach ($result_pt as $key => $value)
                              {
                                $selected = " ";
                                if($result[0]['ngo_jenis_program'] == $value["pt_id"] )
                                {
                                  $selected = 'selected="selected"';
                                }
                                echo "<option value='".$value["pt_id"]."' ".$selected ." >".$value["pt_name"]."</option>" ;
                              }
                              ?>   
                              
                              ?>                               
                              </select>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" id="ngo_jenis_program_name"  name="ngo_jenis_program_name"  class="form-control" value="<?=$result[0]["ngo_jenis_program_name"]?>"/>

                        <!-- <div class="col-md-6"> 
                          <div class="form-group">
                            <label>NAMA PROGRAM:</label>
                            <div class="form-group">
                              <div id="ngo_program_div"   style="display:inline">
                                <select id="ngo_program" name="ngo_program"  class="form-control  select2bs4" ></select>
                              </div>
                              
                            <input type="text" id="ngo_program_name" name="ngo_program_name"  class="form-control" value="" style="display:none"/>                                
                            </div>
                          </div>
                        </div>
                         -->
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>NAMA PROGRAM:</label>
                            <div class="form-group">
                              <div id="ngo_program_div"   style="display:inline">
                                <select id="ngo_program" name="ngo_program"  class="form-control  select2bs4" >
                                  <?php
                                      foreach ($resultprogram as $key => $value)
                                      {
                                        $selected = " ";
                                        if($result[0]['ngo_program'] == $value["program_id"] )
                                        {
                                          $selected = 'selected="selected"';
                                        }
                                        echo "<option value='".$value["program_id"]."' ".$selected ." >".$value["program_name_ms"]."</option>" ;
                                      }
                                ?>     
                                </select>
                              </div>
                            <input type="text" id="ngo_program_name" name="ngo_program_name"  class="form-control" value="" style="display:none"/>                                
                            </div>
                          </div>
                        </div> 

                        

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>BIL. PESERTA:</label>
                              <input  name="ngo_bil_peserta" type="text" class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_bil_peserta']?>">
                          </div>
                        </div>

                        <div class="col-md-6"> 
                            <div class="form-group">                       
                              <label>SILA UPLOAD BUKTI PELAKSANAAN PROGRAM:</label>
                              <div class="input-group">
                              
                                <?php if($result[0]['ngo_photo1'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview1" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo1'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo1']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo1']; ?>" target="_blank"  id="filename1"><?=$result[0]['ngo_photo1']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ngo_photo1']?>',1);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ngo_photo2'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview2" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo2'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo2']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo2']; ?>" target="_blank"  id="filename2"><?=$result[0]['ngo_photo2']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ngo_photo2']?>',2);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ngo_photo3'] != null) { $maxfile--;$filecount++; ?>
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

                                <?php if($result[0]['ngo_photo4'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview4" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo4'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo4']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo4']; ?>" target="_blank"  id="filename4"><?=$result[0]['ngo_photo4']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ngo_photo4']?>',4);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ngo_photo5'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview5" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ngo_photo5'])!="pdf"){ echo "uploads/ngo/".$result[0]['ngo_photo5']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ngo/".$result[0]['ngo_photo5']; ?>" target="_blank"  id="filename5"><?=$result[0]['ngo_photo5']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ngo_photo5']?>',5);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>                                
                             

                                  <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>

                                  </div>

                            </div>
                         </div>


                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>SYARAT-SYARAT PEMATUHAN (tick boxes):</label>
                              <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox1" class="custom-control-input" type="checkbox" id="customCheckbox1" <?php if($result[0]['ngo_checkbox1'] == 1 ){ echo 'checked';}else{ echo '';}?> >
                                      <label for="customCheckbox1" class="custom-control-label">LOGO PERKESO DIPAMERKAN	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox2" class="custom-control-input" type="checkbox" id="customCheckbox2"  <?php if($result[0]['ngo_checkbox2'] == 1 ){ echo 'checked';}else{ echo '';}?> >
                                      <label for="customCheckbox2" class="custom-control-label">PESERTA YANG TERLIBAT - PEKERJA	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="ngo_checkbox3"  class="custom-control-input" type="checkbox" id="customCheckbox3" <?php if($result[0]['ngo_checkbox3'] == 1 ){ echo 'checked';}else{ echo '';}?> >
                                      <label for="customCheckbox3" class="custom-control-label">SAFETY OFFICER</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox4" class="custom-control-input" type="checkbox" id="customCheckbox4" <?php if($result[0]['ngo_checkbox4'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox4" class="custom-control-label">PENGAMAL OSH</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox5" class="custom-control-input" type="checkbox" id="customCheckbox5" <?php if($result[0]['ngo_checkbox5'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox5" class="custom-control-label">MAJIKAN / WAKIL MAJIKAN</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox6" class="custom-control-input" type="checkbox" id="customCheckbox6" <?php if($result[0]['ngo_checkbox6'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox6" class="custom-control-label">PENCERAMAH PERKESO</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox7" class="custom-control-input" type="checkbox" id="customCheckbox7" <?php if($result[0]['ngo_checkbox7'] == 1 ){ echo 'checked';}else{ echo '';}?>  >
                                      <label for="customCheckbox7" class="custom-control-label">PENCERAMAH YANG BERKELAYAKAN</label>
                                    </div>
                                  </div> <!-- end of form group -->
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>ULASAN:</label>
                              <div class="form-group">
                              <textarea  name="ngo_ulasan" name="ulasan" id="" style="width: 100%;height: 100%;">
                              <?=$result[0]['ngo_ulasan']?></textarea>
                              <!-- <input type="text" class="form-control" placeholder="Enter ..." value="<?=$result[0]['ngo_nama']?>"> -->
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
                    <button type="submit" id="btnSubmit" class="btn btn-block btn-primary"><span class="fa fa-paper-plane"></span> Submit</button>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-4">
                      <button type="button"  id="btnSave"  onclick=" " class="btn btn-block btn-info"><span class="fa fa-save"></span> Save</button>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-4">
                    <a href="ngo"><button type="button" class="btn btn-block btn-secondary">Back</button></a>
                </div>
                <!-- ./col -->
          </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</form>
</div>

<input type="hidden" id="maxfile" value="<?=$maxfile?>"/>
<input type="hidden" id="filecount" value="<?=$filecount?>"/>
<input type="hidden" id="filestatus1" value="1"/>
<input type="hidden" id="filestatus2" value="1"/>
<input type="hidden" id="filestatus3" value="1"/>
<input type="hidden" id="filestatus4" value="1"/>
<input type="hidden" id="filestatus5" value="1"/>
<script>



function hidden_div(filename,div_id)
{
  Swal.fire({
  title: 'Are you sure?',
  text: "Delete file ",
  html:
    '<p class="text text-danger">'+filename+'</p>',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    document.getElementById("preview"+div_id).style="display:none;";
 
 --document.getElementById("filecount").value;
 ++document.getElementById("maxfile").value;
 document.getElementById("filestatus"+div_id).value = 0;

 console.log(document.getElementById("filecount").value,document.getElementById("maxfile").value);
 //  $("div#my-awesome-dropzone").dropzone.options.maxFiles = 5;//document.getElementById("maxfile").value ;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
 
}


  Dropzone.autoDiscover = false;


$(document).ready(function () {

  $("div#my-awesome-dropzone").dropzone({
            url: "#",
           // Prevents Dropzone from uploading dropped files immediately
           autoProcessQueue: false,
           addRemoveLinks: true,
           uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: <?=$maxfile?>,
            acceptedFiles: "image/*,application/pdf",//,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",

          init: function() {
            var submitButton = document.querySelector("#btnSubmit")
                myDropzone = this; // closure

            submitButton.addEventListener("click", function() {
              myDropzone.processQueue(); // Tell Dropzone to process all queued files.
            });

            // You might want to show the submit button only when 
            // files are dropped here:
            this.on("addedfile", function(file) {
              // let str = JSON.stringify(file);

              console.log("addedfile",file);
              var ext = file.name.split('.').pop();

            if (ext == "pdf") {
                $(file.previewElement).find(".dz-image img").attr("src", "dist/img/pdf.png");
            } else if (ext.indexOf("doc") != -1) {
                $(file.previewElement).find(".dz-image img").attr("src", "dist/img/word.png");
            } else if (ext.indexOf("xls") != -1) {
                $(file.previewElement).find(".dz-image img").attr("src", "dist/img/excel.png");
            }
              // Show submit button here and/or inform user to click it.
            });
            myDropzone = this;
            myDropzone.on("maxfilesexceeded", function(file) { this.removeFile(file); });
            myDropzone.options.maxFiles = document.getElementById("maxfile").value;
  //  myDropzone.options.maxFiles = myDropzone.options.maxFiles - fileCountOnServer;
            this.on("error", function(file){if (!file.accepted) this.removeFile(file);});
          },
         
	  });

    $.validator.setDefaults({
    submitHandler: function () {
      console.log( "Form successful submitted!" );
    }
  });
  
  $('#ngoform').validate({
        rules: {
                  ngo_email: {   required: true,  email: true, }
                  ,ngo_nama: {   required: true, }         
                  ,ngo_agency: {   required: true,  }
                  ,ngo_tarikh: {   required: true,  }
                  ,ngo_bil_peserta: {   required: true ,  number:true, }
                  ,ngo_jenis_program: {   required: true ,  }
                  ,ngo_program_id: {   required: true ,   }
        },
        messages: {
                  ngo_email: {  required: "Input Email", }
                  ,ngo_nama: {  required: "Input Nama " ,}
                  ,ngo_agency: {  required: "Input NGO/AGENSI/INSTITUSI:" ,}
                  ,ngo_tarikh: {  required: "Input Tarikh", }
                  ,ngo_bil_peserta: {  required:  "Input Bil.Peserta", }
                  ,ngo_jenis_program: {  required:  "Input Program Type:", }
                  ,ngo_program_id: {  required:  "Input Program Name:", }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        },
        submitHandler: submitForm
      });

    
  // $("#btnSubmit").click(function (event) {
function submitForm()
{
      $("#btnSubmit").html('<span class="fa fa-sync fa-spin"></span> Processing');

      //stop submit the form, we will post it manually.
      event.preventDefault();

      // Get form
      var form = $('#ngoform')[0];

      // Create an FormData object
      var data = new FormData(form);

      var maxfile = document.getElementById("maxfile").value;
      var filecount = <?=$filecount?>;
      let i=1;
      data.append("mode", "submit");
      data.append("ngo_id", <?=$ngo_id?>);
      for(i;i<$('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles();i++)
      {
        data.append("ngo_photo"+(filecount+i), $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[i-1]);

      }

      // disabled the submit button
      $("#btnSubmit").prop("disabled", true);

      $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "actionngo.php",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,
          success: function (data) {
            var rv;
            try {
              rv = JSON.parse(data);
              if(isEmpty(rv))
              {
                      Swal.fire(
                      'Info!',
                      'No Data!',
                      'info'
                      );
                  console.log("NO DATA : ", data);
                  $("#btnLoadMore").html('Load More');
              }
              else
              {
                if(rv.info==1)
                {
                  Swal.fire(
                      'Success!',
                      'Success Input Data!',
                      'success'
                      );
                  console.log("SUCCESS : ", data);
                  setTimeout(function(){ window.location="ngo"; }, 1000);
                    $('#my-awesome-dropzone')[0].dropzone.removeAllFiles(true); 
                  $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');
                  $("#ngoform")[0].reset();

                }
                else 
                {
                  Swal.fire(
                      'error!',
                      'Error Input Data, '+data,
                      'error'
                      );
                  
                  console.log("ERROR : ", data);
                  $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');

                }

              }
            } catch (e) {
              //error data not json
              Swal.fire(
                      'error!',
                      'Error Input Data, '+data,
                      'error'
                      );
                  
                  console.log("ERROR : ", data);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
            } 

            
              $("#btnSubmit").prop("disabled", false);
              // $("#result").text(data);
              

          },
          error: function (e) {

              // $("#result").text(e.responseText);
              console.log("ERROR : ", e);
              $("#btnSubmit").prop("disabled", false);
              $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');

          }
      });

  // });
  }

  $("#btnSave").click(function (event) {
      $("#btnSave").html('<span class="fa fa-sync fa-spin"></span> Processing');

      //stop submit the form, we will post it manually.
      event.preventDefault();

      // Get form
      var form = $('#ngoform')[0];

      // Create an FormData object
      var data = new FormData(form);

      data.append("mode", "save");
      data.append("ngo_id", <?=$ngo_id?>);
      var maxfile = document.getElementById("maxfile").value;
      var filecount = <?=$filecount?>;
      // let i=1;
      let i=filecount+1;
      console.log("filecount",i);
      let j=0;
      for(i;i<=5;i++)
      {
        console.log("loop"+i);
        if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[j]))
        {console.log("append ngo_photo"+i);
          data.append("ngo_photo"+i, $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[j]);
          // data.append("ngo_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
        }
        j++;
      }
      i=1;
      for(i;i<=5;i++)
      {
        if(document.getElementById("filestatus"+i).value==0)
        {      console.log("ngo_photo"+i," is deleted");

          data.append("delete_ngo_photo"+i, 1 );
          data.append("filename"+i, document.getElementById("filename"+i).innerHTML );
        }
      }

      // disabled the submit button
      $("#btnSave").prop("disabled", true);

      $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "actionngo.php",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,
          success: function (data) {
            var rv;
            try {
              rv = JSON.parse(data);
              if(isEmpty(rv))
              {
                      Swal.fire(
                      'Info!',
                      'No Data!',
                      'info'
                      );
                  console.log("NO DATA : ", data);
                  $("#btnLoadMore").html('Load More');
              }
              else
              {
                if(rv.info==1)
                {
                  Swal.fire(
                      'Success!',
                      'Success Input Data!',
                      'success'
                      );
                  console.log("SUCCESS : ", data);
                //  setTimeout(function(){ window.location="ngo"; }, 1000);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
                  $("#ngoform")[0].reset();
                  //document.getElementById("myForm").reset();
                }
                else if(rv.info==2)
                {
                  Swal.fire(
                        'Success!',
                        'Success Save Data!',
                        'success'
                        );
                  console.log("SUCCESS : ", data);
                //  setTimeout(function(){ window.location="ngo"; }, 1000);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
                  $("#ngoform")[0].reset();
                }

              }
            } catch (e) {
              //error data not json
              Swal.fire(
                      'error!',
                      'Error Input Data, '+data,
                      'error'
                      );
                  
                  console.log("ERROR : ", data);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
            } 
            $("#btnSave").prop("disabled", false);

            
              

          },
          error: function (e) {

              // $("#result").text(e.responseText);
              console.log("ERROR : ", e);
              $("#btnSave").prop("disabled", false);
              $("#btnSave").html('<span class="fa fa-paper-plane"></span> Submit');

          }
      });

  });

});

//==============================


$("#ngo_daerah_id").on("change", function () {
      // console.log($(this).val());
      // console.log($("#ngo_daerah_id option:selected").text());
      document.getElementById("ngo_daerah_name").value=$("#ngo_daerah_id option:selected").text();

});

$("#ngo_agency").on("change", function () {
      console.log($(this).val());
      // console.log($("#ngo_daerah_id option:selected").text());
      document.getElementById("ngo_agency_name").value=$("#ngo_agency option:selected").text();
      var program_tipe = $(this).val();
      if(program_tipe==0)
      {//other = 6
        console.log("OTHERS AGENCY");//OTHERS
        document.getElementById("div_agency").style.display = "block";
      }
      else
      {
        var e = document.getElementById("ngo_agency");
        document.getElementById("div_agency").style.display = "none";

      }

});
document.getElementById("ngo_program_name").value=$("#ngo_program option:selected").text();
$("#ngo_program").on("change", function () {
      // console.log($(this).val());
      // console.log($("#ngo_daerah_id option:selected").text());
      document.getElementById("ngo_program_name").value=$("#ngo_program option:selected").text();

});

 
    $("#ngo_jenis_program").on("change", function () {
      // console.log($(this).val());
      document.getElementById("ngo_jenis_program_name").value=$("#ngo_jenis_program option:selected").text();
      var program_tipe = $(this).val();
      if(program_tipe==6)
      {// 6 => other
        document.getElementById("ngo_program_div").style.display = 'none';
        document.getElementById("ngo_program_name").style.display = 'inline';
        document.getElementById("ngo_program_name").value = '';

      }
      else
      {
        document.getElementById("ngo_program_div").style.display = 'inline';
        document.getElementById("ngo_program_name").style.display = 'none';
        // document.getElementById("ngo_program_name").value = '';
        var e = document.getElementById("ngo_jenis_program");
        var ee = JSON.parse(document.getElementById("hidden_obj").innerHTML);
        let result = ee.filter(ee => ee.program_pt_id == program_tipe);
        console.log(e.options[e.selectedIndex].text,e.options[e.selectedIndex].value);
        // var f = document.getElementById("second");
        // console.log(f.options[f.selectedIndex].text,f.options[f.selectedIndex].value);
        console.log(result);

        var rangeOptions = [];
        for (var i = 0; i < result.length; i++) {
          var option = new Option(result[i].program_name_ms, result[i].program_id);
          rangeOptions.push(option);
        }
        $("#ngo_program option[value]").remove();
        $("#ngo_program").append(rangeOptions).val("").trigger("change");
      }
      

});

</script>