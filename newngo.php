
<?php
//  $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status=1  order by ucux_id desc LIMIT 0,2 "; 
 $sql = "SELECT pt_id, pt_name FROM program_tipe WHERE pt_status = 1   order by pt_id "; 
 $result = $db->rawQuery($sql);//@mysql_query($sql);

 $sql2 = "SELECT * FROM program WHERE program_status = 1 order by program_pt_id,program_id "; 
 $result2 = $db->rawQuery($sql2);//@mysql_query($sql);
//  var_dump($result);
$nama=isset($_SESSION['nama']) ? $_SESSION['nama'] : ""; 
$email=isset($_SESSION['e']) ? $_SESSION['e'] : ""; 

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Add New NGO</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">ngo</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form id="ngoform" action="#"  enctype="multipart/form-data" method="post">
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
                              <input type="text" name="ngo_nama" class="form-control" placeholder="JAWATAN PEGAWAI PEMANTAU" value="<?=$nama?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>EMAIL ADDRESS:</label>
                              <input type="text" name="ngo_email"  class="form-control" placeholder="EMAIL ADDRESS" value="<?=$email?>">
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
                                <input  name="ngo_tarikh"  type="text" class="form-control float-right" id="tarikh">
                              </div>
                              <!-- <input type="text" class="form-control" placeholder="TARIKH" value=""> -->
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>TEMPAT PROGRAM:</label>
                              <input type="text" name="ngo_tempat"  class="form-control" placeholder="Enter ..." value="">
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
                                    echo "<option value='".$value["pejabat_id"]."'>".$value["pejabat_nama"]."</option>" ;
                                  }
                                }
                              ?>                               
                              </select>
                          </div>
                        </div>
                        <input type="hidden" id="ngo_daerah_name"  name="ngo_daerah_name"  class="form-control" value="<?=$resultpejabat[1]["pejabat_nama"]?>"/>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="ngo_negeri">NEGERI :</label>
                              <select  id="ngo_negeri" name="ngo_negeri"  class="form-control select2bs4"   > 
                                <option value='KEDAH'>KEDAH</option>
                                <option value='PAHANG'>PAHANG</option>
                                <option value='PERAK'>PERAK</option>
                                <option value='PERLIS'>PERLIS</option>
                                <option value='SELANGOR'>SELANGOR</option>
                                <option value='NEGERI SEMBILAN'>NEGERI SEMBILAN</option>
                                <option value='JOHOR'>JOHOR</option>
                                <option value='KELANTAN'>KELANTAN</option>
                                <option value='TERENGGANU'>TERENGGANU</option>
                                <option value='SARAWAK'>SARAWAK</option>
                                <option value='PULAU PINANG'>PULAU PINANG</option>
                                <option value='MELAKA'>MELAKA</option>
                                <option value='SABAH'>SABAH</option>
                                <option value='WILAYAH PERSEKUTUAN'>WILAYAH PERSEKUTUAN</option>
                              </select>
                          </div>
                        </div>

                        <!-- <div class="col-md-6"> 
                          <div class="form-group">
                              <label>NGO/AGENSI/INSTITUSI:</label>
                              <input type="text" name="ngo_agency"  class="form-control" placeholder="Enter ..." value="">
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
                              foreach ($resultagency as $key => $value)
                              {
                                  echo "<option value='".$value["agency_id"]."'>(".$value["agency_singkatan"].") ".$value["agency_name"]."</option>" ;
                              }
                              echo "<option value='0'>OTHERS</option>" ;

                              ?>                               
                              </select>
                          </div>
                        </div>
                        <input type="hidden" id="ngo_agency_name"  name="ngo_agency_name"  class="form-control" value="<?=$resultagency[0]["agency_name"]?>"/>

                        <div class="col-md-6" id="div_agency" style="display:none;">
                          <div class="form-group">
                              <label for="ngo_agency_others">OTHERS NGO/AGENSI/INSTITUSI :</label>
                              <input type="text" name="ngo_agency_others"  class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>JENIS PROGRAM:</label>
                            <div class="form-group">
                              <select  id="ngo_jenis_program" name="ngo_jenis_program"  class="form-control select2bs4"   > 
                              <?php
                              foreach ($result as $key => $value)
                              {
                                echo "<option value='".$value["pt_id"]."'>".$value["pt_name"]."</option>" ;
                              }
                              ?>                               
                              </select>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" id="ngo_jenis_program_name"  name="ngo_jenis_program_name"  class="form-control" value="<?=$result[0]["pt_name"]?>"/>

                        <div class="col-md-6"> 
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
                        
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>BIL. PESERTA:</label>
                              <input  name="ngo_bil_peserta" type="text" class="form-control" placeholder="Enter ..." value="">
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


                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>SYARAT-SYARAT PEMATUHAN (tick boxes):</label>
                              <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                      <input name="ngo_checkbox1" class="custom-control-input" type="checkbox" id="customCheckbox1">
                                      <label for="customCheckbox1" class="custom-control-label">LOGO PERKESO DIPAMERKAN	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox2" class="custom-control-input" type="checkbox" id="customCheckbox2" >
                                      <label for="customCheckbox2" class="custom-control-label">PESERTA YANG TERLIBAT - PEKERJA	</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input name="ngo_checkbox3"  class="custom-control-input" type="checkbox" id="customCheckbox3">
                                      <label for="customCheckbox3" class="custom-control-label">SAFETY OFFICER</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox4" class="custom-control-input" type="checkbox" id="customCheckbox4" >
                                      <label for="customCheckbox4" class="custom-control-label">PENGAMAL OSH</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox5" class="custom-control-input" type="checkbox" id="customCheckbox5" >
                                      <label for="customCheckbox5" class="custom-control-label">MAJIKAN / WAKIL MAJIKAN</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox6" class="custom-control-input" type="checkbox" id="customCheckbox6" >
                                      <label for="customCheckbox6" class="custom-control-label">PENCERAMAH PERKESO</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                      <input  name="ngo_checkbox7" class="custom-control-input" type="checkbox" id="customCheckbox7" >
                                      <label for="customCheckbox7" class="custom-control-label">PENCERAMAH YANG BERKELAYAKAN</label>
                                    </div>
                                  </div> <!-- end of form group -->
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>ULASAN:</label>
                              <div class="form-group">
                              <textarea  name="ngo_ulasan" name="ulasan" id="" style="width: 100%;height: 100%;"></textarea>
                              <!-- <input type="text" class="form-control" placeholder="Enter ..." value=""> -->
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
<textarea id="hidden_obj" style="display:none;">
<?php echo json_encode($result2); ?>
</textarea>
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


$(document).ready(function () {


  $.validator.setDefaults({
    submitHandler: function () {
      console.log( "Form successful submitted!" );
    }
  });

  
  $('#ngoform').validate({
        rules: {
          ngo_nama: {   required: true,   }
                  ,ngo_email: {   required: true,email: true, }         
                  ,ngo_tarikh: {   required: true  }
                  ,ngo_tempat: {   required: true,  }
                  ,ngo_agency: {   required: true,  }
                  ,ngo_program: {   required: true ,   }
                  ,ngo_jenis_program: {   required: true ,  }
                  ,ngo_bil_peserta: {   required: true ,  number:true, }
        },
        messages: {
          ngo_nama: {  required: "Input Nama", }
                  ,ngo_email: {  required: "Input Valid Email" ,}
                  ,ngo_tarikh: {  required: "Input Tarikh", }
                  ,ngo_tempat: {  required: "Input Nama Tempat" ,}
                  ,ngo_agency: {  required: "Input Agency", }
                  ,ngo_program: {  required:  "Input Program Name", }
                  ,ngo_jenis_program: {  required:  "Input Program Type", }
                  ,ngo_bil_peserta: {  required:  "Input Bil.Peserta", }
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
      var form = $('#ngoform')[0];

      // Create an FormData object
      var data = new FormData(form);

      // If you want to add an extra field for the FormData
      // data.append("CustomField", "This is some extra data, testing");
      // data.append("mode", "submit");
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
      {
        data.append("ngo_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
      {
        data.append("ngo_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
      {
        data.append("ngo_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
      {
        data.append("ngo_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
      }
      if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
      {
        data.append("ngo_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
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
              if(rv.status==true)
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
    // data.append("ngo_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
    {
      data.append("ngo_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
    {
      data.append("ngo_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
    {
      data.append("ngo_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
    {
      data.append("ngo_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
    {
      data.append("ngo_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
    }
    // console.log(data);

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
               setTimeout(function(){ window.location="ngo"; }, 1000);
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
               setTimeout(function(){ window.location="ngo"; }, 1000);
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
function starting()
{
  var e = document.getElementById("ngo_jenis_program");
  var ee = JSON.parse(document.getElementById("hidden_obj").innerHTML);
  console.log(ee);
  var rangeOptions = [];
  var result = ee.filter(ee => ee.program_pt_id == 1);
  for (var i = 0; i < result.length; i++) {
    var option = new Option(result[i].program_name_ms, result[i].program_id);
    rangeOptions.push(option);
  }
  $("#ngo_program option[value]").remove();
  console.log("second option remove and add = ",rangeOptions);
  $("#ngo_program").append(rangeOptions);
}

starting();

$("#ngo_daerah_id").on("change", function () {
      // console.log($(this).val());
      // console.log($("#ngo_daerah_id option:selected").text());
      document.getElementById("ngo_daerah_name").value=$("#ngo_daerah_id option:selected").text();

});

$("#ngo_agency").on("change", function () {
      // console.log($(this).val());
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
