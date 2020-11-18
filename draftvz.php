

<?php
$vz_id = isset($_GET['vz_id']) ? $_GET['vz_id'] : '';
$created_by = " and vz_created_by = ".$id_user;
if($tipe_user == "ADMIN")
{
  $created_by = " and vz_is_deleted = 0 ";
}
 $sql = "SELECT * FROM vz WHERE vz_id = '".$vz_id ."' $created_by "; 
//$sql = "SELECT * FROM vz WHERE vz_id = '".$vz_id ."' and vz_created_by = '".$_SESSION['i']."' "; 
 $result = $db->rawQuery($sql);//@mysql_query($sql);
//  echo $sql;
//  var_dump($result);
if(!$result)
{
  echo '<script>alert("No Data Found.!!");window.location="vz";</script>';
}
if($result[0]['vz_status']==1)
{
    echo '<script>alert("Data Already Submitted");window.location="vz";</script>';
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
            <h1>DRAFT</h1>
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
                              <input name="vz_nama" type="text" class="form-control" placeholder="NAMA PENGURUS"  value="<?=$result[0]['vz_nama']?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>EMAIL ADDRESS:</label>
                              <input name="vz_email" type="text" class="form-control" placeholder="EMAIL ADDRESS"  value="<?=$result[0]['vz_email']?>" >
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
                                <input name="vz_tarikh" type="text" class="form-control float-right" id="tarikh"  value="<?=(new \DateTime($result[0]['vz_tarikh']))->format('Y-m-d')?>" >
                              </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>TEMPAT:</label>
                              <input name="vz_tempat" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_tempat']?>" >
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>NGO/AGENSI/INSTITUSI:</label>
                              <input name="vz_agency" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_agency']?>" >
                          </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                          <label>NAMA PROGRAM:</label>
                          <div class="form-group">
                          <input name="vz_program" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_program']?>" >

                            <!-- <select class="form-control FilterDB "  style="width: 100%;border-color:blue;">
                            </select> -->
                          </div>
                          <!-- <span class="select2 select2-container select2-container--bootstrap4 select2-container--below" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ixwu-container"><span class="select2-selection__rendered" id="select2-ixwu-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                        </div>
        
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>BIL. PESERTA:</label>
                              <input name="vz_bil_peserta" type="text" class="form-control" placeholder="Enter ..."  value="<?=$result[0]['vz_bil_peserta']?>" >
                          </div>
                        </div>

                         
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>ULASAN:</label>
                              <div class="form-group">
                              <textarea name="vz_ulasan" id="" style="width: 100%;height: 100%;">
                              <?=$result[0]['vz_ulasan']?>
                                </textarea>
                              </div>
                          </div>
                        </div>


                        <div class="col-md-6"> 
                            <div class="form-group">                       
                              <label>SILA UPLOAD GAMBAR PROGRAM:</label>
                                  <div class="input-group">
                                    
                                  <?php if($result[0]['vz_photo1'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview1" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo1'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo1']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo1']; ?>" target="_blank"  id="filename1"><?=$result[0]['vz_photo1']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['vz_photo1']?>',1);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['vz_photo2'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview2" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo2'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo2']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo2']; ?>" target="_blank"  id="filename2"><?=$result[0]['vz_photo2']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['vz_photo2']?>',2);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['vz_photo3'] != null) { $maxfile--;$filecount++; ?>
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

                                <?php if($result[0]['vz_photo4'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview4" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo4'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo4']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo4']; ?>" target="_blank"  id="filename4"><?=$result[0]['vz_photo4']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['vz_photo4']?>',4);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['vz_photo5'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview5" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['vz_photo5'])!="pdf"){ echo "uploads/vz/".$result[0]['vz_photo5']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/vz/".$result[0]['vz_photo5']; ?>" target="_blank"  id="filename5"><?=$result[0]['vz_photo5']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['vz_photo5']?>',5);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>  

                                <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>

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
                    <button type="submit" id="btnSubmit" class="btn btn-block btn-primary"><span class="fa fa-paper-plane"></span> Submit</button>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-4">
                <button type="button"  id="btnSave"  onclick=" " class="btn btn-block btn-info"><span class="fa fa-save"></span> Save</button>
                </div>
                <!-- ./col -->

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

<input type="hidden" id="maxfile" value="<?=$maxfile?>"/>
<input type="hidden" id="filecount" value="<?=$filecount?>"/>
<input type="hidden" id="filestatus1" value="1"/>
<input type="hidden" id="filestatus2" value="1"/>
<input type="hidden" id="filestatus3" value="1"/>
<input type="hidden" id="filestatus4" value="1"/>
<input type="hidden" id="filestatus5" value="1"/>

<script>
// function previewImage() {
//     document.getElementById("vz_photo_preview").style.display = "block";
//     var oFReader = new FileReader();
//      oFReader.readAsDataURL(document.getElementById("vz_photo").files[0]);
    
//     document.getElementById("vz_photo_label").innerHTML = document.getElementById("vz_photo").files[0].name;
    
//     oFReader.onload = function(oFREvent) {
//       document.getElementById("vz_photo_preview").src = oFREvent.target.result;
//     };
//   };

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
            url: "actionvz.php",
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
  
  $('#vzform').validate({
        rules: {
                  vz_email: {   required: true,  email: true, }
                  ,vz_nama: {   required: true, }         
                  ,vz_agency: {   required: true,  }
                  ,vz_tarikh: {   required: true,  }
                  ,vz_bil_peserta: {   required: true ,  number:true, }
                  ,vz_program_tipe: {   required: true ,  }
                  ,vz_program_id: {   required: true ,   }
        },
        messages: {
                  vz_email: {  required: "Input Email", }
                  ,vz_nama: {  required: "Input Nama " ,}
                  ,vz_agency: {  required: "Input NGO/AGENSI/INSTITUSI:" ,}
                  ,vz_tarikh: {  required: "Input Tarikh", }
                  ,vz_bil_peserta: {  required:  "Input Bil.Peserta", }
                  ,vz_program_tipe: {  required:  "Input Program Type:", }
                  ,vz_program_id: {  required:  "Input Program Name:", }
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
    var form = $('#vzform')[0];

    // Create an FormData object
    var data = new FormData(form);
    var maxfile = document.getElementById("maxfile").value;
      var filecount = <?=$filecount?>;
      let i=1;
      data.append("mode", "submit");
      data.append("vz_id", <?=$vz_id?>);
      for(i;i<$('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles();i++)
      {
        data.append("vz_photo"+(filecount+i), $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[i-1]);

      }
    // If you want to add an extra field for the FormData
    data.append("mode", "submit");
    data.append("vz_id", "<?=$vz_id?>");
    // disabled the submit button
    $("#btnSubmit").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "actionvz.php",
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
                  setTimeout(function(){ window.location="vz"; }, 1000);
                    $('#my-awesome-dropzone')[0].dropzone.removeAllFiles(true); 
                  $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');
                  $("#vzform")[0].reset();

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
// });


$("#btnSave").click(function (event) {
    $("#btnSave").html('<span class="fa fa-sync fa-spin"></span> Processing');

    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#vzform')[0];

    // Create an FormData object
    var data = new FormData(form);
    data.append("mode", "save");
      data.append("vz_id", <?=$vz_id?>);
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
        {console.log("append vz_photo"+i);
          data.append("vz_photo"+i, $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[j]);
          // data.append("vz_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
        }
        j++;
      }
      i=1;
      for(i;i<=5;i++)
      {
        if(document.getElementById("filestatus"+i).value==0)
        {      console.log("vz_photo"+i," is deleted");

          data.append("delete_vz_photo"+i, 1 );
          data.append("filename"+i, document.getElementById("filename"+i).innerHTML );
        }
      }
    // disabled the submit button
    $("#btnSave").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "actionvz.php",
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
                //  setTimeout(function(){ window.location="vz"; }, 1000);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
                  $("#vzform")[0].reset();
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
                //  setTimeout(function(){ window.location="vz"; }, 1000);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
                  $("#vzform")[0].reset();
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