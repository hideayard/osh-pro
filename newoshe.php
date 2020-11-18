

<?php
$db->where ("settings_name", "newoshe");
$settings = $db->getOne ("settings");


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Add New OSHE</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">OSHE</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form role="form"  id="osheform" action="actionoshe.php"  enctype="multipart/form-data" method="post">

     <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
        <div class="col-lg-12">

            <div class="card card-info col-lg-12 ">
                <div class="card-header">
                    <h3 class="card-title">LAPORAN PELAKSANAAN PROGRAM AVDOKASI PENCEGAHAN</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="row" >

                    <!-- <div class="col-md-6"> -->
                          <!-- <div class="form-group"> -->
                              <!-- <label for="oshe_email">EMAIL ADDRESS:</label> -->
                              <input type="hidden" id="oshe_email" name="oshe_email" class="form-control" placeholder="EMAIL ADDRESS" value="<?=$email?>">
                          <!-- </div> -->
                        <!-- </div> -->
                        <?php
                        $sql = "SELECT pejabat_id, pejabat_nama FROM pejabat order by pejabat_id "; 
                        $result = $db->rawQuery($sql);
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="oshe_pejabat">PEJABAT PERKESO :</label>
                              <select  id="oshe_pejabat" name="oshe_pejabat"  class="form-control select2bs4"   > 
                              <?php
                              foreach ($result as $key => $value)
                              {
                                echo "<option value='".$value["pejabat_nama"]."'>".$value["pejabat_nama"]."</option>" ;
                              }
                              ?>                               
                              </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="oshe_majikan">MAJIKAN :</label>
                              <input type="text"  id="oshe_majikan"  name="oshe_majikan" class="form-control" placeholder="NAMA MAJIKAN" value="">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="oshe_kod_majikan">NO. KOD MAJIKAN :</label>
                              <input type="text"  id="oshe_kod_majikan"  name="oshe_kod_majikan" class="form-control" placeholder="NO. KOD MAJIKAN" value="">
                          </div>
                        </div>


                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="tarikh">TARIKH PROGRAM:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input type="text" name="oshe_tarikh"  class="form-control float-right" id="tarikh">
                              </div>
                              <!-- <input type="text" class="form-control" placeholder="TARIKH" value=""> -->
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label for="oshe_bil_peserta">BIL. PESERTA:</label>
                              <input type="text" id="oshe_bil_peserta" name="oshe_bil_peserta"  class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="oshe_ca">JUMLAH KEMALANGAN COMMUTING ACCIDENT (CA):</label>
                              <input type="text"  id="oshe_ca" name="oshe_ca" class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="oshe_ia">JUMLAH KEMALANGAN INDUSTRIAL ACCIDENT (IA):</label>
                              <input type="text"  id="oshe_ia"  name="oshe_ia" class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>
                     

                       


                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label >AKTIVITI - AKTIVITI YANG BERKAITAN (tick boxes):</label>
                              <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox1" class="custom-control-input" type="checkbox" id="customCheckbox1">
                                      <label for="customCheckbox1" class="custom-control-label">CERAMAH PENCEGAHAN KEMALANGAN JALAN RAYA	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox2" class="custom-control-input" type="checkbox" id="customCheckbox2" >
                                      <label for="customCheckbox2" class="custom-control-label">CERAMAH KEMALANGAN INDUSTRI/PENYAKIT PEKERJAAN	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox3" class="custom-control-input" type="checkbox" id="customCheckbox3">
                                      <label for="customCheckbox3" class="custom-control-label">CERAMAH PROMOSI KESEHATAN/HSP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox4" class="custom-control-input" type="checkbox" id="customCheckbox4" >
                                      <label for="customCheckbox4" class="custom-control-label">PEMBERIAN TOPI KELEDAR</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="oshe_checkbox5" class="custom-control-input" type="checkbox" id="customCheckbox5" >
                                      <label for="customCheckbox5" class="custom-control-label">CERAMAH OSH DARI MIROS</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="oshe_checkbox6"  class="custom-control-input" type="checkbox" id="customCheckbox6" >
                                      <label for="customCheckbox6" class="custom-control-label">CERAMAH DARI JKJR</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="oshe_checkbox7"  class="custom-control-input" type="checkbox" id="customCheckbox7" >
                                      <label for="customCheckbox7" class="custom-control-label">CERAMAH DARI LAIN-LAIN AGENSI</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="oshe_checkbox8"  class="custom-control-input" type="checkbox" id="customCheckbox8" >
                                      <label for="customCheckbox8" class="custom-control-label">OTHER</label>
                                      <input name="oshe_checkbox8_text"  class="form-group" style="width:100%;" type="text" id="other" >
                                    </div>
                                    
                                  </div> <!-- end of form group -->

                                  
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="oshe_cadangan">CADANGAN PENAMBAHBAIKKAN:</label>
                              <div class="form-group">
                              <textarea name="oshe_cadangan" id="oshe_cadangan" style="width: 100%;height: 100%;"></textarea>
                              <!-- <input name="oshe_email"  type="text" class="form-control" placeholder="Enter ..." value=""> -->
                              </div>
                          </div>
                        </div>


                      
                         <div class="col-md-6"> 
                            <div class="form-group">                       
                            <label>SILA UPLOAD GAMBAR PROGRAM (max size 5MB):</label>
                                  <div class="input-group">
                                      <!-- <img id="oshe_photo_preview" class="photo_preview" alt="image preview"/> -->
                                  </div>

                                  <div class="input-group">
                                  <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>

                                    <!-- <div class="custom-file">
                                      <input name="oshe_photo1"  name="oshe_photo1"  type="file" class="custom-file-input" id="oshe_photo1"  onchange="previewImage();">
                                      <label id="oshe_photo_label" class="custom-file-label" for="oshe_photo1">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                    </div> -->
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
                    <a href="oshe"><button type="button" class="btn btn-block btn-secondary">Back</button></a>
                </div>
                <!-- ./col -->
          </div>

          


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </form>

   
</div>
<input id="token" type="hidden" value="<?=$_SESSION['token']?>" />
<script>
// function previewImage() {
//     document.getElementById("oshe_photo_preview").style.display = "block";
//     var oFReader = new FileReader();
//      oFReader.readAsDataURL(document.getElementById("oshe_photo1").files[0]);
    
//     document.getElementById("oshe_photo_label").innerHTML = document.getElementById("oshe_photo1").files[0].name;
    
//     oFReader.onload = function(oFREvent) {
//       document.getElementById("oshe_photo_preview").src = oFREvent.target.result;
//     };
//   };

	jQuery(document).ready(function() {

	  $("div#my-awesome-dropzone").dropzone({
            url: "actionoshe.php",
           // Prevents Dropzone from uploading dropped files immediately
           autoProcessQueue: false,
           addRemoveLinks: true,
           uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 5,
            maxFilesize: 5,
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
            this.on("error", function(file){if (!file.accepted) this.removeFile(file);});
          }
	  });

  });


$(document).ready(function () {

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
    let token = document.getElementById("token").value;
    // Get form
    var form = $('#osheform')[0];
    // Create an FormData object
    var data = new FormData(form);
    // If you want to add an extra field for the FormData
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
    {
      data.append("oshe_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
    {
      data.append("oshe_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
    {
      data.append("oshe_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
    {
      data.append("oshe_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
    {
      data.append("oshe_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
    }    
    //add token
    data.append("token",token) ;
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
                <?php
                if($settings['settings_status']==1)
                {
                  echo 'setTimeout(function(){ window.location="'.$settings['settings_value'].'"; }, 1000);'; 
                }
                 ?>
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
    
    let token = document.getElementById("token").value;

    // Get form
    var form = $('#osheform')[0];

    // Create an FormData object
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    data.append("mode", "save");
    // data.append("oshe_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
    {
      data.append("oshe_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
    {
      data.append("oshe_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
    {
      data.append("oshe_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
    {
      data.append("oshe_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
    {
      data.append("oshe_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
    }
    //add token
    data.append("token",token) ;
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
               setTimeout(function(){ window.location="oshe"; }, 1000);
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
               setTimeout(function(){ window.location="oshe"; }, 1000);
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