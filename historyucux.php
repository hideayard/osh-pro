

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
                            <input disabled type="hidden" id="ucux_txtform" name="ucux_txtform"  value="<?=$result[0]['ucux_txtform']?>" />
                            </div>
                            <!-- /.card-header -->
                        
                            <div class="card-body" style="text-align:center;">
                            
                                <div class="row ">
                                    
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>BUILDING :</label>
                                                <input disabled type="text" name="ucux_building" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_building']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FLOOR :</label>
                                                <input disabled type="text" name="ucux_floor" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_floor']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>LOCATION :</label>
                                                <input disabled type="text" name="ucux_location" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_location']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DESCRIPTION :</label>
                                                <input disabled type="text" name="ucux_description" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_description']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>REMARKS :</label>
                                                <input disabled type="text"  name="ucux_remarks" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_remarks']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>RISK :</label>
                                                <input disabled type="text" name="ucux_risk" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_risk']?>">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CONDITION :</label>
                                                <input disabled type="text" name="ucux_condition" class="form-control" placeholder=" "  value="<?=$result[0]['ucux_condition']?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> 
                                            <div class="form-group">                       
                                            <label>SILA UPLOAD GAMBAR :</label>
                                                <div class="input-group">
                                                <img id="ucux_photo_preview" class="photo_preview" alt="image preview"  src="dist/img/<?=$result[0]['ucux_photo']?>"/>
                                                </div>

                                                <div class="input-group">
                                                    <div class="custom-file">
                                                    <input disabled name="ucux_photo1"  type="file" class="custom-file-input" id="ucux_photo1"  onchange="previewImage();">
                                                    <label id="ucux_photo_label" class="custom-file-label" for="ucux_photo1"> <?=isset($result[0]['ucux_photo'])?$result[0]['ucux_photo']:'Choose File'?> </label>
                                                    </div>
                                                    <div class="input-group-append">
                                                    <!-- <span class="input-group-text" id="">Upload</span> -->
                                                    </div>
                                                </div>

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

<script>
    function previewImage() {
        document.getElementById("ucux_photo_preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("ucux_photo1").files[0]);
        
        document.getElementById("ucux_photo_label").innerHTML = document.getElementById("ucux_photo1").files[0].name;
        
        oFReader.onload = function(oFREvent) {
        document.getElementById("ucux_photo_preview").src = oFREvent.target.result;
        };
    };
    
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


</script>

<script>

$(document).ready(function () {

    
$("#btnSubmit").click(function (event) {
    $("#btnSubmit").html('<span class="fa fa-sync fa-spin"></span> Processing');

    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#ucuxform')[0];

    // Create an FormData object
    var data = new FormData(form);

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
            if(data==1||data=='1')
            {
                    Swal.fire(
                    'Success!',
                    'Success Input Data!',
                    'success'
                    );
                console.log("SUCCESS : ", data);
                $("#btnSubmit").html('<span class="fa fa-paper-plane"></span> Submit');
                $("#ucuxform")[0].reset();
                document.getElementById("ucux_photo_label").innerHTML = "";
                document.getElementById("ucux_photo_preview").style.display = "none";
                document.getElementById("ucux_photo_preview").src = "";
                //document.getElementById("myForm").reset();
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

});


    
$("#btnSave").click(function (event) {
    $("#btnSave").html('<span class="fa fa-sync fa-spin"></span> Processing');

    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#ucuxform')[0];

    // Create an FormData object
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    data.append("mode", "save");
    data.append("ucux_id", "<?=$ucux_id?>");

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
            if(data==1||data=='1')
            {
                    Swal.fire(
                    'Success!',
                    'Success Input Data!',
                    'success'
                    );
                console.log("SUCCESS : ", data);
                setTimeout(function(){ window.location="ucux"; }, 1000);

                $("#btnSave").html('<span class="fa fa-save"></span> Save');
                $("#ucuxform")[0].reset();
                document.getElementById("ucux_photo_label").innerHTML = "";
                document.getElementById("ucux_photo_preview").style.display = "none";
                document.getElementById("ucux_photo_preview").src = "";
                //document.getElementById("myForm").reset();
            }
            else if(data==2||data=='2')
            {
              Swal.fire(
                    'Success!',
                    'Success Save Data!',
                    'success'
                    );
                console.log("SUCCESS : ", data);
                setTimeout(function(){ window.location="ucux"; }, 1000);

                $("#btnSave").html('<span class="fa fa-save"></span> Save');
                $("#ucuxform")[0].reset();
                document.getElementById("ucux_photo_label").innerHTML = "";
                document.getElementById("ucux_photo_preview").style.display = "none";
                document.getElementById("ucux_photo_preview").src = "";

            }
            else
            {
                Swal.fire(
                    'error!',
                    'Error Input Data, '+data,
                    'error'
                    );
                
                console.log("ERROR : ", data);
                $("#btnSave").html('<span class="fa fa-save"></span> Save');
            }
            $("#btnSave").prop("disabled", false);
            // $("#result").text(data);
            

        },
        error: function (e) {

            // $("#result").text(e.responseText);
            console.log("ERROR : ", e);
            $("#btnSave").prop("disabled", false);
            $("#btnSave").html('<span class="fa fa-save"></span> Save');

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