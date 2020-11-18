<?php
$id = $_SESSION['i'];
 $sql = "SELECT * FROM ucux WHERE ucux_is_deleted=0 and ucux_status='DRAFT'  and ucux_created_by=".$id."  order by ucux_id desc LIMIT 0,6 "; 
 $result = $db->rawQuery($sql);//@mysql_query($sql);
//  var_dump($result);
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

<!-- Default box -->
 <div class="card card-solid">
    <div class="card-body pb-0">
      <div id="content_ucux" class="row d-flex align-items-stretch">

<?php 
$count=0;
foreach ($result as $key => $value)
{ 
  $count++;
?>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
               <?= (new \DateTime($value["ucux_created_at"]))->format('d/m/Y (H:i:s)') ?>
               
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b><?=$value["ucux_txtform"]?> </b></h2>
                  <p class="text-muted text-sm"><b>Description: </b><?=$value["ucux_description"]?> </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>Building: </b><?=$value["ucux_building"]?>        </li>
                    <li class="small"><span class="fa-li"><i class="fas fa-cubes"></i></span> <b>Floor: </b><?=$value["ucux_floor"]?>              </li>
                    <li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span> <b>Location: </b><?=$value["ucux_location"]?>        </li>
                    <!-- <li class="small"><span class="fa-li"><i class="fas fa-info"></i></span> <b>Description: </b><?=$value["ucux_description"]?>  </li> -->
                    <li class="small"><span class="fa-li"><i class="fas fa-comment"></i></span> <b>Remarks: </b><?=$value["ucux_remarks"]?>          </li>
                    <li class="small"><span class="fa-li"><i class="fa fa-exclamation-triangle"></i></span> <b>Risk: </b><?=$value["ucux_risk"]?>                </li>
                    <li class="small"><span class="fa-li"><i class="fa fa-info-circle"></i></span> <b>Condition: </b><?=$value["ucux_condition"]?>  </li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                <?php
                $img_div ='<div class="col-5 text-center">
                <img src="uploads/ucux/defaultucux.png" alt="" class="img-circle img-fluid">
              </div>';
                if(isset($value["ucux_photo1"]) && ($value["ucux_photo1"] != '') )
                { $col = "col-7";
                  $img_div = '<div class="col-5 text-center">
                                <img src="uploads/ucux/'.$value["ucux_photo1"].'" alt="" class="img-circle img-fluid">
                              </div>';
                }
                else if(isset($value["ucux_photo2"]) && ($value["ucux_photo2"] != '') )
                { $col = "col-7";
                  $img_div = '<div class="col-5 text-center">
                                <img src="uploads/ucux/'.$value["ucux_photo2"].'" alt="" class="img-circle img-fluid">
                              </div>';
                }
                else if(isset($value["ucux_photo3"]) && ($value["ucux_photo3"] != '') )
                { $col = "col-7";
                  $img_div = '<div class="col-5 text-center">
                                <img src="uploads/ucux/'.$value["ucux_photo3"].'" alt="" class="img-circle img-fluid">
                              </div>';
                }
                else if(isset($value["ucux_photo4"]) && ($value["ucux_photo4"] != '') )
                { $col = "col-7";
                  $img_div = '<div class="col-5 text-center">
                                <img src="uploads/ucux/'.$value["ucux_photo4"].'" alt="" class="img-circle img-fluid">
                              </div>';
                }
                else if(isset($value["ucux_photo5"]) && ($value["ucux_photo5"] != '') )
                { $col = "col-7";
                  $img_div = '<div class="col-5 text-center">
                                <img src="uploads/ucux/'.$value["ucux_photo5"].'" alt="" class="img-circle img-fluid">
                              </div>';
                }
                ?>
                  <?=$img_div?>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <!-- <a href="#" class="btn btn-sm bg-teal">
                  <i class="fas fa-comments"></i>
                </a> -->
                <!-- <a href="#" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> Action
                </a> -->
                <div class="btn-group">
                <!-- <label>Status : </label> -->
                <a href="index.php?page=draftucux&ucux_id=<?=$value["ucux_id"]?>" ><button type="button" class="btn btn-info"> <i class="fa fa-edit"></i> OPEN</button></a>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="#">On Process</a>
                        <a class="dropdown-item" href="#">Finish</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Cancel</a>
                      </div>
                    </button>
                  </div>

              </div>
            </div>
          </div>
        </div>

<?php } ?>
<!-- <p id="paragrap"> ini paragrap</p> -->
       
        

      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <nav aria-label="Contacts Page Navigation">
      <form action="listucux" type="POST">
      <button id="btnLoadMore" type="submit" class="btn btn-block btn-primary">Load More</button>
      <input type="hidden" id="counter" name="counter" value="<?=$count?>" />
      </form>

      </nav>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->


                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- content_ucux -->


<script>

$(document).ready(function () {

  

    
$("#btnLoadMore").click(function (event) {
    $("#btnLoadMore").html('<span class="fa fa-sync fa-spin"></span> Processing');

    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#ucuxform')[0];

    // Create an FormData object
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    data.append("counter", document.getElementById("counter").value );
    data.append("mode", 'draft' );

    // disabled the submit button
    $("#btnLoadMore").prop("disabled", true);

    $.ajax({
        type: "POST",
        // enctype: 'multipart/form-data',
        url: "get_data_ucux.php",
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
                    'No New Data!',
                    'info'
                    );
                console.log("NO DATA : ", data);
                $("#btnLoadMore").html('Load More');
            }
            else
            {
                Swal.fire(
                    'Success!',
                    'Success Getting Data!',
                    'success'
                    );
                
                console.log("SUCCESS : ");//, data);
                $("#btnLoadMore").html('Load More');
                  // let newcount=0;
                for (let [key, value] of Object.entries(rv)) {
                  // console.log(`${key}: ${value}`);
                  let obj_perrow = value;
                  let ucux_id = obj_perrow['ucux_id'];
                  let ucux_txtform = obj_perrow['ucux_txtform'];
                  let ucux_building = obj_perrow['ucux_building'];
                  let ucux_floor = obj_perrow['ucux_floor'];
                  let ucux_location = obj_perrow['ucux_location'];
                  let ucux_description = obj_perrow['ucux_description'];
                  let ucux_remarks = obj_perrow['ucux_remarks'];
                  let ucux_risk = obj_perrow['ucux_risk'];
                  let ucux_condition = obj_perrow['ucux_condition'];
                  let ucux_photo = obj_perrow['ucux_photo'];

                  let ucux_created_at_raw = obj_perrow['ucux_created_at'];
                  let m = new Date(ucux_created_at_raw);
                  let ucux_created_at = m.getUTCDate() +"/"+ (m.getMonth()+1) +"/"+ m.getUTCFullYear() + " " + m.getUTCHours() + ":" + m.getUTCMinutes() + ":" + m.getUTCSeconds();

                  $("#content_ucux").append( '<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch"> \
                       <div class="card bg-light">\
                         <div class="card-header text-muted border-bottom-0">\
                         '+ucux_created_at+'</div>\
                         <div class="card-body pt-0">\
                           <div class="row">\
                             <div class="col-7">\
                               <h2 class="lead"><b>'+ucux_txtform+' </b></h2>\
                               <p class="text-muted text-sm"><b>Description: </b>'+ucux_description+' </p>\
                               <ul class="ml-4 mb-0 fa-ul text-muted">\
                                 <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>Building: </b>'+ucux_building+'</li>\
                                 <li class="small"><span class="fa-li"><i class="fas fa-cubes"></i></span> <b>Floor: </b>'+ucux_floor+'</li>\
                                 <li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span> <b>Location: </b>'+ucux_location+'</li>\
                                 <li class="small"><span class="fa-li"><i class="fas fa-comment"></i></span> <b>Remarks: </b>'+ucux_remarks+'</li>\
                                 <li class="small"><span class="fa-li"><i class="fa fa-exclamation-triangle"></i></span> <b>Risk: </b>'+ucux_risk+'</li>\
                                 <li class="small"><span class="fa-li"><i class="fa fa-info-circle"></i></span> <b>Condition: </b>'+ucux_condition+'</li>\
                               </ul>\
                             </div>\
                             <div class="col-5 text-center">\
                               <img src="uploads/ucux/'+ucux_photo+'" alt="" class="img-circle img-fluid">\
                             </div>\
                           </div>\
                         </div>\
                         <div class="card-footer">\
                             <div class="btn-group">\
                                 <a href="index.php?page=draftucux&ucux_id='+ucux_id+'" ><button type="button" class="btn btn-info"><i class="fa fa-edit"></i> OPEN</button></a>\
                                 <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">\
                                   <span class="sr-only">Toggle Dropdown</span>\
                                   <div class="dropdown-menu" role="menu" style="">\
                                     <a class="dropdown-item" href="#">On Process</a>\
                                     <a class="dropdown-item" href="#">Finish</a>\
                                     <a class="dropdown-item" href="#">Error</a>\
                                     <div class="dropdown-divider"></div>\
                                     <a class="dropdown-item" href="#">Cancel</a>\
                                   </div>\
                                 </button>\
                               </div>\
                           </div>\
                         </div>\
                       </div>\
                     </div>'); 
                    // newcount++;
                    ++document.getElementById("counter").value;
                  // console.log(obj_perrow['ucux_txtform']);
                }

            }
            $("#btnLoadMore").prop("disabled", false);

          } catch (e) {
            //error data not json
              Swal.fire(
                      'error!',
                      'Error Input Data, '+e,
                      'error'
                      );
                  
                  console.log("ERROR : ", e);
                  $("#btnLoadMore").html('Load More');
          }
         
          // console.log(rv);
              

        },
        error: function (e) {

            // $("#result").text(e.responseText);
            console.log("ERROR : ", e);
            $("#btnLoadMore").prop("disabled", false);
            $("#btnLoadMore").html('Load More');
            Swal.fire(
                      'error!',
                      'Error , '+e,
                      'error'
                      );

        }
    });

});

});


</script>