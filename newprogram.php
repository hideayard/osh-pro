
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>Add New Program</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">PROGRAM</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form id="programform" action="actionaddprogram.php"  enctype="multipart/form-data" method="post">

     <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
        <div class="col-lg-12">

            <div class="card card-info col-lg-12 ">
                <div class="card-header">
                    <h3 class="card-title">PROGRAM</h3>
                </div>
                <!-- /.card-header -->
                
                <!-- form start -->
                <form >
                    <div class="row">

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>NAMA PROGRAM IN MALAYSIA:</label>
                              <input name="program_name_ms" type="text" class="form-control" placeholder="NAMA PROGRAM IN MALAYSIA" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>NAMA PROGRAM IN ENGLISH:</label>
                              <input name="program_name_en" type="text" class="form-control" placeholder="NAMA PROGRAM IN ENGLISH" value="">
                          </div>
                        </div>
                        

                        <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>PROGRAM CODE:</label>
                              <input name="program_code" type="text" class="form-control" placeholder="Enter ..." value="">
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                              <label>REMARK:</label>
                              <textarea name="program_remark" type="text" class="form-control" placeholder="Enter ..." value=""> </textarea>
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

                <!-- <div class="col-lg-3 col-4">
                      <button type="button" onclick=" " class="btn btn-block btn-info"><span class="fa fa-save"></span> Save</button>
                </div> -->
                <!-- ./col -->

                <div class="col-lg-3 col-4">
                    <a href="home"><button type="button" class="btn btn-block btn-secondary">Back</button></a>
                </div>
                <!-- ./col -->
          </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</form>
</div>

<script>
function previewImage() {
    document.getElementById("vz_photo_preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("vz_photo").files[0]);
    
    document.getElementById("vz_photo_label").innerHTML = document.getElementById("vz_photo").files[0].name;
    
    oFReader.onload = function(oFREvent) {
      document.getElementById("vz_photo_preview").src = oFREvent.target.result;
    };
  };


  $(document).ready(function () {

    
$("#btnSubmit").click(function (event) {
    $("#btnSubmit").html('<span class="fa fa-sync fa-spin"></span> Processing');

    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#programform')[0];

    // Create an FormData object
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    // data.append("CustomField", "This is some extra data, testing");

    // disabled the submit button
    $("#btnSubmit").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "actionaddprogram.php",
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
                $("#programform")[0].reset();
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

});


</script>