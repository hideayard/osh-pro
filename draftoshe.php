
<?php
$oshe_id = isset($_GET['oshe_id']) ? $_GET['oshe_id'] : '';
$created_by = " and oshe_created_by = ".$id_user;
if($tipe_user == "ADMIN")
{
  $created_by = " and oshe_is_deleted = 0 ";
}
 $sql = "SELECT * FROM oshe WHERE oshe_id = '".$oshe_id ."' $created_by "; 
// $sql = "SELECT * FROM oshe WHERE oshe_id = '".$oshe_id ."' and oshe_created_by = '".$_SESSION['i']."' "; 
 $result = $db->rawQuery($sql);//@mysql_query($sql);
//  echo $sql;
//  var_dump($result);
if(!$result)
{
  echo '<script>alert("No Data Found.!!");window.location="oshe";</script>';
}
if($result[0]['oshe_status']==1)
{
    echo '<script>alert("Data Already Submitted");window.location="oshe";</script>';
}
$maxfile = 5;
$filecount = 0;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>DRAFT OSHE</h1>
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
                              <input type="text" name="oshe_email" class="form-control" placeholder="EMAIL ADDRESS" value="<?=$result[0]['oshe_email']?>" >
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>PEJABAT PERKESO :</label>
                              <input type="text"  name="oshe_pejabat" class="form-control" placeholder="NAMA PEJABAT PERKESO" value="<?=$result[0]['oshe_pejabat']?>" >
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>MAJIKAN :</label>
                              <input type="text"  name="oshe_majikan" class="form-control" placeholder="NAMA MAJIKAN" value="<?=$result[0]['oshe_majikan']?>" >
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>NO. KOD MAJIKAN :</label>
                              <input type="text"  name="oshe_kod_majikan" class="form-control" placeholder="NO. KOD MAJIKAN" value="<?=$result[0]['oshe_kod_majikan']?>" >
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
                                <input type="text" name="oshe_tarikh"  class="form-control float-right" id="tarikh"  value="<?=(new \DateTime($result[0]['oshe_tarikh']))->format('Y-m-d')?>"  >
                              </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>BIL. PESERTA:</label>
                              <input type="text" name="oshe_bil_peserta"  class="form-control" placeholder="Enter ..." value="<?=$result[0]['oshe_bil_peserta']?>" >
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>JUMLAH KEMALANGAN COMMUTING ACCIDENT (CA):</label>
                              <input type="text"  name="oshe_ca" class="form-control" placeholder="Enter ..." value="<?=$result[0]['oshe_ca']?>" >
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>JUMLAH KEMALANGAN INDUSTRIAL ACCIDENT (IA):</label>
                              <input type="text"  name="oshe_ia" class="form-control" placeholder="Enter ..." value="<?=$result[0]['oshe_ia']?>" >
                          </div>
                        </div>
                     

                       


                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>AKTIVITI - AKTIVITI YANG BERKAITAN (tick boxes):</label>
                              <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox1" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox1'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox1">
                                      <label for="customCheckbox1" class="custom-control-label">CERAMAH PENCEGAHAN KEMALANGAN JALAN RAYA	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox2" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox2'] == 1 ){ echo 'checked';}else{ echo '';}?>  id="customCheckbox2" >
                                      <label for="customCheckbox2" class="custom-control-label">CERAMAH KEMALANGAN INDUSTRI/PENYAKIT PEKERJAAN	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox3" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox3'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox3">
                                      <label for="customCheckbox3" class="custom-control-label">CERAMAH PROMOSI KESEHATAN/HSP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox4" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox4'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox4" >
                                      <label for="customCheckbox4" class="custom-control-label">PEMBERIAN TOPI KELEDAR</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox5" class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox5'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox5" >
                                      <label for="customCheckbox5" class="custom-control-label">CERAMAH OSH DARI MIROS</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="oshe_checkbox6"  class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox6'] == 1 ){ echo 'checked';}else{ echo '';}?> id="customCheckbox6" >
                                      <label for="customCheckbox6" class="custom-control-label">CERAMAH DARI JKJR</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="oshe_checkbox7"  class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox7'] == 1 ){ echo 'checked';}else{ echo '';}?>  id="customCheckbox7" >
                                      <label for="customCheckbox7" class="custom-control-label">CERAMAH DARI LAIN-LAIN AGENSI</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="oshe_checkbox8"  class="custom-control-input" type="checkbox"  <?php if($result[0]['oshe_checkbox8'] == 1 ){ echo 'checked';}else{ echo '';}?>  id="customCheckbox8" >
                                      <label for="customCheckbox8" class="custom-control-label">OTHER</label>
                                      <input name="oshe_checkbox8_text"  class="form-group" style="width:100%;" type="text" id="other" value="<?=isset($result[0]['oshe_checkbox8_text']) ?>" >
                                    </div>
                                    
                                  </div> <!-- end of form group -->

                                  
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>CADANGAN PENAMBAHBAIKKAN:</label>
                              <div class="form-group">
                              <textarea name="oshe_cadangan" id="" style="width: 100%;height: 100%;">
                              <?=$result[0]['oshe_cadangan']?>
                              </textarea>
                              
                              </div>
                          </div>
                        </div>


                      
                         <div class="col-md-6"> 
                            <div class="form-group">                       
                              <label>SILA UPLOAD BUKTI PELAKSANAAN PROGRAM:</label>
                              <div class="input-group">
                              
                                <?php if($result[0]['oshe_photo1'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview1" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo1'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo1']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo1']; ?>" target="_blank"  id="filename1"><?=$result[0]['oshe_photo1']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['oshe_photo1']?>',1);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo2'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview2" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo2'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo2']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo2']; ?>" target="_blank"  id="filename2"><?=$result[0]['oshe_photo2']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['oshe_photo2']?>',2);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo3'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview3" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo3'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo3']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo3']; ?>" target="_blank"  id="filename3"><?=$result[0]['oshe_photo3']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['oshe_photo3']?>',3);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo4'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview4" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo4'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo4']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo4']; ?>" target="_blank"  id="filename4"><?=$result[0]['oshe_photo4']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['oshe_photo4']?>',4);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['oshe_photo5'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview5" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['oshe_photo5'])!="pdf"){ echo "uploads/oshe/".$result[0]['oshe_photo5']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/oshe/".$result[0]['oshe_photo5']; ?>" target="_blank"  id="filename5"><?=$result[0]['oshe_photo5']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['oshe_photo5']?>',5);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>                                
                             

                                  <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>

                                  </div>

                                  <!-- <div class="input-group">
                                    <div class="custom-file">
                                      <input name="oshe_photo1"  name="oshe_photo1"  type="file" class="custom-file-input" id="oshe_photo1"  onchange="previewImage();">
                                      <label id="oshe_photo_label" class="custom-file-label" for="oshe_photo1"> <?=isset($result[0]['oshe_photo1'])?$result[0]['oshe_photo1']:'Choose File'?> </label>
                                    </div>
                                    <div class="input-group-append">
                                    </div>
                                  </div> -->

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
                      <button type="button" id="btnSave"  onclick=" " class="btn btn-block btn-info"><span class="fa fa-save"></span> Save</button>
                </div>
                <!-- ./col -->

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
  
  $('#osheform').validate({
        rules: {
                  oshe_email: {   required: true,  email: true, }
                  ,oshe_pejabat: {   required: true, }         
                  ,oshe_majikan: {   required: true  }
                  ,oshe_kod_majikan: {   required: true,  }
                  ,oshe_tarikh: {   required: true,  }
                  ,oshe_bil_peserta: {   required: true ,  number:true, }
                  ,oshe_ca: {   required: true ,  number:true, }
                  ,oshe_ia: {   required: true ,  number:true, }
        },
        messages: {
                  oshe_email: {  required: "Input Email", }
                  ,oshe_pejabat: {  required: "Input Nama Pejabat" ,}
                  ,oshe_majikan: {  required: "Input Nama Majikan", }
                  ,oshe_kod_majikan: {  required: "Input Kod Majikan" ,}
                  ,oshe_tarikh: {  required: "Input Tarikh", }
                  ,oshe_bil_peserta: {  required:  "Input Bil.Peserta", }
                  ,oshe_ca: {  required:  "Input Jumlah Kemalangan COMMUTING ACCIDENT (CA):", }
                  ,oshe_ia: {  required:  "Input Jumlah Kemalangan INDUSTRIAL ACCIDENT (IA):", }
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



function submitForm()
{
    $("#btnSubmit").html('<span class="fa fa-sync fa-spin"></span> Processing');
    // Get form
    var form = $('#osheform')[0];
    // Create an FormData object
    var data = new FormData(form);
    // If you want to add an extra field for the FormData
    var maxfile = document.getElementById("maxfile").value;
    var filecount = <?=$filecount?>;
    let i=1;
    data.append("mode", "submit");
    data.append("oshe_id", <?=$oshe_id?>);
    for(i;i<$('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles();i++)
    {
      data.append("oshe_photo"+(filecount+i), $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[i-1]);

    }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
    // {
    //   data.append("oshe_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    // }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
    // {
    //   data.append("oshe_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
    // }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
    // {
    //   data.append("oshe_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
    // }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
    // {
    //   data.append("oshe_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
    // }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
    // {
    //   data.append("oshe_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
    // }
    
    // disabled the submit button
    $("#btnSubmit").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "actionoshe.php",
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
                setTimeout(function(){ window.location="oshe"; }, 1000);
                  $('#my-awesome-dropzone')[0].dropzone.removeAllFiles(true); 
                $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');
                $("#osheform")[0].reset();

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
}
    

$("#btnSave").click(function (event) {
    $("#btnSave").html('<span class="fa fa-sync fa-spin"></span> Processing');

    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#osheform')[0];

    // Create an FormData object
    var data = new FormData(form);
// console.log("dropzone=",$('#my-awesome-dropzone')[0].dropzone);
// // To access only accepted files count (answer of question)
// console.log("getAcceptedFiles",$('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles().length);
// // To access all files count
// console.log("files",$('#my-awesome-dropzone')[0].dropzone.files.length);
// // To access all rejected files count
// console.log("getRejectedFiles",$('#my-awesome-dropzone')[0].dropzone.getRejectedFiles().length);

// // To access all queued files count
// console.log("getQueuedFiles",$('#my-awesome-dropzone')[0].dropzone.getQueuedFiles().length);

// // To access all uploading files count
// console.log("getUploadingFiles",$('#my-awesome-dropzone')[0].dropzone.getUploadingFiles().length);

    // If you want to add an extra field for the FormData
    data.append("mode", "save");
    data.append("oshe_id", <?=$oshe_id?>);
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
      {console.log("append oshe_photo"+i);
        data.append("oshe_photo"+i, $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[j]);
        // data.append("oshe_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
      }
      j++;
    }
    i=1;
    for(i;i<=5;i++)
    {
      if(document.getElementById("filestatus"+i).value==0)
      {      console.log("oshe_photo"+i," is deleted");

        data.append("delete_oshe_photo"+i, 1 );
        data.append("filename"+i, document.getElementById("filename"+i).innerHTML );
      }
    }
    // data.append("oshe_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
   
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
    // {
    //   data.append("oshe_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
    // }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
    // {
    //   data.append("oshe_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
    // }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
    // {
    //   data.append("oshe_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
    // }
    // if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
    // {
    //   data.append("oshe_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
    // }
    //addedfile
    
    // disabled the submit button
    $("#btnSave").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "actionoshe.php",
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
              //  setTimeout(function(){ window.location="oshe"; }, 1000);
                $("#btnSave").html('<span class="fa fa-save"></span> Save');
                $("#osheform")[0].reset();
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
              //  setTimeout(function(){ window.location="oshe"; }, 1000);
                $("#btnSave").html('<span class="fa fa-save"></span> Save');
                $("#osheform")[0].reset();
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





</script>