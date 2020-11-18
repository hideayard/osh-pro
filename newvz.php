
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Add New Vision Zero</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">VISION ZERO</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      



    </section>

    <form role="form"  id="vzform" action="actionvz.php"  enctype="multipart/form-data" method="post">

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
                    <div class="row">

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label for="vz_nama">NAMA PENGURUS :</label>
                              <input name="vz_nama" id="vz_nama" type="text" class="form-control" placeholder="NAMA PENGURUS" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="vz_email">EMAIL ADDRESS:</label>
                              <input name="vz_email" id="vz_email" type="text" class="form-control" placeholder="EMAIL ADDRESS" value="">
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="tarikh">TARIKH:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input name="vz_tarikh" type="text" class="form-control float-right" id="tarikh">
                              </div>
                              <!-- <input name="testing" type="text" class="form-control" placeholder="TARIKH" value=""> -->
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label for="vz_tempat">TEMPAT:</label>
                              <input name="vz_tempat"  id="vz_tempat" type="text" class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="vz_agency">VISION ZERO COMPANY/PARTNER NAME:</label>
                              <input id="vz_agency" name="vz_agency" type="text" class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                          <label for="vz_program">NAMA PROGRAM:</label>
                          <div class="form-group">
                          <input id="vz_program" name="vz_program" type="text" class="form-control" placeholder="Enter ..." value="">

                            <!-- <select class="form-control FilterDB "  style="width: 100%;border-color:blue;">
                            </select> -->
                          </div>
                          <!-- <span class="select2 select2-container select2-container--bootstrap4 select2-container--below" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ixwu-container"><span class="select2-selection__rendered" id="select2-ixwu-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                        </div>
        
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="vz_bil_peserta">BIL. PESERTA:</label>
                              <input id="vz_bil_peserta" name="vz_bil_peserta" type="text" class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>

                         
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label for="vz_ulasan">ULASAN:</label>
                              <div class="form-group">
                              <textarea  id="vz_ulasan" name="vz_ulasan" id="" style="width: 100%;height: 100%;"></textarea>
                              <!-- <input name="testing" type="text" class="form-control" placeholder="Enter ..." value=""> -->
                              </div>
                          </div>
                        </div>


                        <div class="col-md-6"> 
                            <div class="form-group">                       
                            <label>SILA UPLOAD GAMBAR PROGRAM (max size 5MB):</label>
                                  <div class="input-group">
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

<script>

Dropzone.autoDiscover = false;
	jQuery(document).ready(function() {

	  $("div#my-awesome-dropzone").dropzone({
            url: "#",
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

// function previewImage() {
//     document.getElementById("vz_photo_preview").style.display = "block";
//     var oFReader = new FileReader();
//      oFReader.readAsDataURL(document.getElementById("vz_photo").files[0]);
    
//     document.getElementById("vz_photo_label").innerHTML = document.getElementById("vz_photo").files[0].name;
    
//     oFReader.onload = function(oFREvent) {
//       document.getElementById("vz_photo_preview").src = oFREvent.target.result;
//     };
//   };


  $(document).ready(function () {

    $.validator.setDefaults({
    submitHandler: function () {
      console.log( "Form successful submitted!" );
    }
  });

    $('#vzform').validate({
        rules: {
                  vz_nama: {   required: true,  }
                  ,vz_email: {   required: true, email: true, }         
                  ,vz_tarikh: {   required: true  }
                  ,vz_tempat: {   required: true,  }
                  ,vz_agency: {   required: true,  }
                  ,vz_program: {   required: true,  }
                  ,vz_bil_peserta: {   required: true ,  number:true, }
        },
        messages: {
                  vz_nama: {  required: "Enter Name First", }
                  ,vz_email: {  required: "Enter Email First" ,}
                  ,vz_tarikh: {  required: "Enter Tarikh First", }
                  ,vz_tempat: {  required: "Enter Place First" ,}
                  ,vz_agency: {  required: "Enter Agency First", }
                  ,vz_program: {  required: "Enter Program First", }
                  ,vz_bil_peserta: {  required: "Enter Participant First",}
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
    var form = $('#vzform')[0];
    // Create an FormData object
    var data = new FormData(form);
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
      {
        data.append("vz_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
      {
        data.append("vz_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
      {
        data.append("vz_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
      {
        data.append("vz_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
      {
        data.append("vz_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
      }
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
                // setTimeout(function(){ window.location="vz"; }, 1000);
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
        }); //end of ajax
}



$("#btnSave").click(function (event) {
    $("#btnSave").html('<span class="fa fa-sync fa-spin"></span> Processing');

    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#vzform')[0];

    // Create an FormData object
    var data = new FormData(form);

    data.append("mode", "save");
    // data.append("vz_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
    {
      data.append("vz_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
    {
      data.append("vz_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
    {
      data.append("vz_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
    {
      data.append("vz_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
    {
      data.append("vz_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
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
               setTimeout(function(){ window.location="vz"; }, 1000);
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
               setTimeout(function(){ window.location="vz"; }, 1000);
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