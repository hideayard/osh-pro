

<?php
$ucux_id = isset($_GET['ucux_id']) ? $_GET['ucux_id'] : '';

 $sql = "SELECT * FROM ucux WHERE ucux_id = '".$ucux_id ."' and ucux_created_by = '".$_SESSION['i']."' "; 
 $result = $db->rawQuery($sql);//@mysql_query($sql);
//  echo $sql;
//  var_dump($result);
if(!$result)
{
  echo '<script>alert("No Data Found.!!");window.location="ucux";</script>';
}
if($result[0]['ucux_status']==1)
{
    echo '<script>alert("Data Already Submitted");window.location="ucux";</script>';
}
$maxfile = 5;
$filecount = 0;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>U.C.U.X</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">U.C.U.X</a></li>
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
                    
                                         
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div  id="newucux"  class="card card-info " style="display:block;">
                            <!-- <div class="card card-info col-lg-12 "> -->
                            <form id="ucuxform" action="actionucux.php"  enctype="multipart/form-data" method="post">
                            <div class="card-header ">
                            <h3 id="judul" class="card-title">U.C.U.X</h3>
                            <input type="hidden" id="ucux_txtform" name="ucux_txtform"  value="<?=$result[0]['ucux_txtform']?>" />
                            </div>
                            <!-- /.card-header -->
                        
                            <div class="card-body" style="text-align:center;">
                            
                                <div class="row ">
                                    
                                       <?php
                                          $sqlp = "SELECT pejabat_id, pejabat_nama FROM pejabat order by pejabat_id "; 
                                          $resultpejabat = $db->rawQuery($sqlp);
                                        ?>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="ucux_building">BUILDING :</label>
                                              <select  id="ucux_building" name="ucux_building"  class="form-control select2bs4"   > 
                                              <?php
                                                foreach ($resultpejabat as $key => $value)
                                                {
                                                 
                                                    // echo "<option value='".$value["pejabat_id"]."'>".$value["pejabat_nama"]."</option>" ;
                                                    $selected = " ";
                                                    if($result[0]['ucux_building'] == $value["pejabat_nama"] )
                                                    {
                                                      $selected = 'selected="selected"';
                                                    }
                                                    echo "<option value='".$value["pejabat_nama"]."' ".$selected ." >".$value["pejabat_nama"]."</option>" ;
                                                  
                                                  
                                                }
                                              ?>                               
                                              </select>
                                          </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FLOOR :</label>
                                                <input type="text" name="ucux_floor" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_floor']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>LOCATION :</label>
                                                <input type="text" name="ucux_location" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_location']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DESCRIPTION :</label>
                                                <input type="text" name="ucux_description" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_description']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>REMARKS :</label>
                                                <input type="text"  name="ucux_remarks" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_remarks']?>">
                                            </div>
                                        </div>
                        
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>RISK :</label>
                                                <select name="ucux_risk" class="form-control select2risk" >
                                                <?php
                                                $arr_risk = array("LOW","MEDIUM","HIGH");
                                                foreach ($arr_risk as $key => $value)
                                                {
                                                 
                                                    // echo "<option value='".$value["pejabat_id"]."'>".$value["pejabat_nama"]."</option>" ;
                                                    $selected = " ";
                                                    if($result[0]['ucux_risk'] == $value )
                                                    {
                                                      $selected = 'selected="selected"';
                                                    }
                                                    echo "<option value='".$value."' ".$selected ." >".$value."</option>" ;
                                                  
                                                }
                                              ?>   
                                                </select>

                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CONDITION :</label>
                                                <input type="text" name="ucux_condition" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_condition']?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> 
                                            <div class="form-group">                       
                                            <label>SILA UPLOAD GAMBAR :</label>
                                                <div class="input-group">
                                                <?php if($result[0]['ucux_photo1'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview1" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ucux_photo1'])!="pdf"){ echo "uploads/ucux/".$result[0]['ucux_photo1']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ucux/".$result[0]['ucux_photo1']; ?>" target="_blank"  id="filename1"><?=$result[0]['ucux_photo1']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ucux_photo1']?>',1);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ucux_photo2'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview2" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ucux_photo2'])!="pdf"){ echo "uploads/ucux/".$result[0]['ucux_photo2']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ucux/".$result[0]['ucux_photo2']; ?>" target="_blank"  id="filename2"><?=$result[0]['ucux_photo2']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ucux_photo2']?>',2);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ucux_photo3'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview3" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ucux_photo3'])!="pdf"){ echo "uploads/ucux/".$result[0]['ucux_photo3']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ucux/".$result[0]['ucux_photo3']; ?>" target="_blank"  id="filename3"><?=$result[0]['ucux_photo3']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ucux_photo3']?>',3);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ucux_photo4'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview4" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ucux_photo4'])!="pdf"){ echo "uploads/ucux/".$result[0]['ucux_photo4']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ucux/".$result[0]['ucux_photo4']; ?>" target="_blank"  id="filename4"><?=$result[0]['ucux_photo4']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ucux_photo4']?>',4);" type="button" class="btn btn-danger" >
                                      <i class="fas fa-times"> remove</i>
                                    </button>
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($result[0]['ucux_photo5'] != null) { $maxfile--;$filecount++; ?>
                                  <div id="preview5" class="col-lg-6 col-6" style="text-align:center;"> 
                                      <div class="small-box"  style="height: 100%;" onclick="">
                                      <div class="inner">
                                          <img src="<?php if(get_ext($result[0]['ucux_photo5'])!="pdf"){ echo "uploads/ucux/".$result[0]['ucux_photo5']; }else{ echo "dist/img/pdf.png"; }?>" width="100" height="100" class=" " style="">

                                          <p><a href="<?php echo "uploads/ucux/".$result[0]['ucux_photo5']; ?>" target="_blank"  id="filename5"><?=$result[0]['ucux_photo5']?></a></p>
                                      </div>
                                      <button onclick="hidden_div('<?=$result[0]['ucux_photo5']?>',5);" type="button" class="btn btn-danger" >
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
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <button type="button" id="btnSave" onclick=" " class="btn btn-block btn-info"><span class="fa fa-save"></span> Save</button>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <button type="submit" id="btnSubmit" class="btn btn-block btn-primary"><span class="fa fa-paper-plane"></span> Submit</button>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <button type="button" onclick="actionback();" class="btn btn-block btn-secondary">Cancel</button>
                                            </div>
                                        </div>


                                       
                                                
                                   
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->  
                        </form> 
                        </div>

                    </div>


                </div>

            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
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
	jQuery(document).ready(function() {

	  $("div#my-awesome-dropzone").dropzone({
            url: "actionucux.php",
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
    
    function actionucux(params)
    {
        
        document.getElementById('judul').innerHTML = params ;
        document.getElementById('ucux_txtform').value = params ;
        
        console.log(params);
        $("#menuucux").fadeOut();
        $("#btnBawah").fadeOut();
        //btnBawah
        $("#newucux").fadeIn();
    }

    function actionback()
    {
        window.location="ucux";
        console.log("back");
        $("#newucux").fadeOut();
        $("#menuucux").fadeIn();
        $("#btnBawah").fadeIn();

    }


    $(document).ready(function () {

$.validator.setDefaults({
  submitHandler: function () {
    console.log( "Form successful submitted!" );
  }
});

$('#ucuxform').validate({
      rules: {
        ucux_building: {   required: true, }
        ,ucux_location: {   required: true, }
                
      },
      messages: {
                ucux_building: {  required: "Input Building", }
                ,ucux_location: {  required: "Input Location" ,}
                
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

    //stop submit the form, we will post it manually.
    // event.preventDefault();

    // Get form
    var form = $('#ucuxform')[0];

    // Create an FormData object
    var data = new FormData(form);
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]))
    {
      data.append("ucux_photo1", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]))
    {
      data.append("ucux_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]))
    {
      data.append("ucux_photo3", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[2]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]))
    {
      data.append("ucux_photo4", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[3]);
    }
    if(!isEmpty($('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]))
    {
      data.append("ucux_photo5", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[4]);
    }
    // If you want to add an extra field for the FormData
    data.append("mode", "submit");
    data.append("ucux_id", "<?=$ucux_id?>");

    // disabled the submit button
    $("#btnSubmit").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "actionucux.php",
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
                 setTimeout(function(){ window.location="ucux"; }, 1000);
                $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');
                  $("#ucuxform")[0].reset();
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
                 setTimeout(function(){ window.location="ucux"; }, 1000);
                $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');
                  $("#ucuxform")[0].reset();
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
                  $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');
            } 
            $("#btnSubmit").prop("disabled", false);

            
              

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
var form = $('#ucuxform')[0];

// Create an FormData object
var data = new FormData(form);

data.append("mode", "save");
data.append("ucux_id", <?=$ucux_id?>);
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
  {console.log("append ucux_photo"+i);
    data.append("ucux_photo1"+i, $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[j]);
    // data.append("ucux_photo2", $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[1]);
  }
  j++;
}
i=1;
for(i;i<=5;i++)
{
  if(document.getElementById("filestatus"+i).value==0)
  {      console.log("ucux_photo1"+i," is deleted");

    data.append("delete_ucux_photo"+i, 1 );
    data.append("filename"+i, document.getElementById("filename"+i).innerHTML );
  }
}


    // disabled the submit button
    $("#btnSave").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "actionucux.php",
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
                //  setTimeout(function(){ window.location="ucux"; }, 1000);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
                  $("#ucuxform")[0].reset();
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
                //  setTimeout(function(){ window.location="ucux"; }, 1000);
                  $("#btnSave").html('<span class="fa fa-save"></span> Save');
                  $("#ucuxform")[0].reset();
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


<?php
if(isset($result[0]['ucux_photo']) )
{
    echo 'document.getElementById("ucux_photo_preview").style.display = "block";';
}
?>
</script>