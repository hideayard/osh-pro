<?php
session_start();
// error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$prefix = "/er";

require_once ('config/MysqliDb.php');
include_once ("config/db.php");
$db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);
include("config/functions.php");

// $user_tipe = $_SESSION['t'];
//set tgl
date_default_timezone_set("Asia/Jakarta");
$tgl=date('Y-m-d');
$page=isset($_GET['page']) ? $_GET['page'] : "home"; 
$mode=isset($_GET['mode']) ? $_GET['mode'] : ""; 
$d=isset($_GET['d']) ? $_GET['d'] : ""; 
// echo "page = ".$page. "<hr>mode = ".$mode;
if(!isset($_SESSION['u']))
{
  header('Location:login.php');
  exit(); //hentikan eksekusi kode di login_proses.php
}
$skrg = date("Y-m-d h:i:sa");
//$_SESSION['i']
$id_user=isset($_SESSION['i']) ? $_SESSION['i'] : ""; 
$email=isset($_SESSION['e']) ? $_SESSION['e'] : ""; 
$tipe_user=isset($_SESSION['t']) ? $_SESSION['t'] : ""; 
// echo $id_user;die;
$table = isset($_GET['t']) ? $_GET['t'] : 'inbox';
$selected=array();
$home='';
switch ($page) {
        case 'users' : {
                        $selected[8]=' class="active" ';$judul="Users";
                      }break;
        case 'home' : {
                        $selected[4]=' class="active" ';$judul="Home";$home='active';
                      }break;
        
        default : {
                    
                       $selected[4]=' class="active" ';$judul="Home";  
                      }break;

      }

      $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['i']."' "; 
      $result = $db->rawQuery($sql);//@mysql_query($sql);
      
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OSH PRO | Dashboard</title>
  <link rel="icon" href="assets/img/logo.png" type="image/png" sizes="50x50">  <!-- Tell the browser to be responsive to screen width -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style dist/js/bootstrap-datepicker.min.js -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- datepicker -->
    <!-- <link rel="stylesheet" href="dist/css/bootstrap-datepicker.min.css"> -->
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->

  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- /home/al/Downloads/select2-bootstrap.css -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
  <link rel="stylesheet" href="dist/css/jquery.datetimepicker.css">
  <!-- jquery.datetimepicker.css -->
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- toggle -->
  <link href="plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <!-- <link href="css/font-open-sans.css" rel="stylesheet"> -->
  <script src="js/iconify.min.js"></script>
    <!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <style>
  .center{text-align:center;}
  </style>
  <!-- <link rel="stylesheet" href="css/main_loader.css"> -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  
  <?php if(($page=="role") || ($page=="settings") || ($page=="users") || ($page=="program") || (strpos($page, 'table') !== false)  || (strpos($page, 'report') !== false)) {   ?>
    <!-- <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css"> -->
    <!-- <link rel="stylesheet" href="css/buttons.bootstrap4.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> -->
    <!-- 
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css">

    






  <?php } ?>

  <?php // if(($page=="ucux") || ($page=="oshe") || ($page=="ngo") || ($page=="listucux") || ($page=="historylistucux") ) {   ?>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
<!-- <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
<?php  //} ?>


<?php //if(($page=="ucux") || ($page=="oshe") || ($page=="ngo") || ($page=="listucux")  || ($page=="historylistucux") ) {   ?>
  <!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<?php //} ?>

<?php
if($page=="statistic"){
?>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<!-- <script src="dist/js/pages/dashboard3.js"></script> -->
<?php
}
?>
<style>
.photo_preview{
    /* display:none; */
    width : 200px;
    height : 200px;
}
</style>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- <script src="plugins/jquery-validation/additional-methods.min.js"></script> -->

<script src="plugins/dropzone/min/dropzone.min.js"></script> 
<link href="plugins/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
<link href="plugins/dropzone/min/basic.min.css" rel="stylesheet" type="text/css">
<style>
        .dropzone-previews {
            /* height: 100px; */
            width: 100%;
            border: dashed 1px blue;
            background-color: lightblue;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- <header class="entry-header">
  <h1 class="entry-title">OSH PRO</h1>
</header> -->

<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i><?php //echo $page."=".strpos($page, 'vz')."==".(strpos($page, 'vz') !== false); ?>
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->
<script>
Dropzone.autoDiscover = false;
</script>
<?php require_once ("sidebar.php"); ?>

  <?php
  if(!check_role($page,null) && ($page!="home") && ($page!="logout") && ($page!="login") && ( (strpos($page, 'vz') !== false) < 0 ) && ($page!="profile") )
  {
    echo "<script>Swal.fire(
                      'Info!',
                      'You are not authorized!',
                      'info'
                      );
                console.log('You Are Not Authorized');
                setTimeout(function(){ window.stop();window.location='home'; }, 1000);
                
                </script>";
      // echo json_encode( array("status" => false,"info" => "You are not authorized.!!!","messages" => "You are not authorized.!!!" ) );
    // echo "<script>alert('You are not permitted!!!');window.location='home';</script>";
  }
  else
  {
  // check_role($page,'');
            // $users = $db->get('users', 10); //contains an Array 10 users
            //print_r($users);
            if((($tipe_user=="MAINTENANCE") && (strpos($page, 'ucux') !== false) ) || ($page=="logout")  || ($page=="profile")   )
            {
              // include("error.php");
              // echo $tipe_user . "=". (strpos($page, 'ucux') !== false) ;
              if (file_exists("".$page.".php")) 
              {
                  include("".$page.".php");
              }
              else 
              {
                  include("error.php");
              }

            }
            else if( ( $tipe_user=="MAINTENANCE") &&  ($page=="home")   )
            {
                  include("ucux.php");
            }
            else if($tipe_user!="MAINTENANCE")
            {
            
            if (file_exists("".$page.".php")) 
            {
                include("".$page.".php");
            }
            else 
            {
                include("error.php");
            }
          }

        }
          ?>

  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">M4D Studio</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<script src="dist/js/jquery.datetimepicker.js"></script>
<!-- jquery.datetimepicker.css -->
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->



<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- datepicker -->
<!-- <script src="dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- date-range-picker -->
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<?php if(($page=="role") || ($page=="settings") || ($page=="users") || ($page=="program") || (strpos($page, 'table') !== false)  || (strpos($page, 'report') !== false)) {   ?>

<!-- DataTables -->
<!-- <script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script> -->

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
<!-- <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script> -->
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<!-- <script src="dist/js/buttons.flash.min.js"></script> -->
<script src="dist/js/pdfmake.min.js"></script>
<script src="dist/js/buttons.html5.min.js"></script>

<script src="dist/js/jszip.min.js"></script>
<script src="dist/js/buttons.colVis.min.js"></script>
<script src="dist/js/buttons.bootstrap4.min.js"></script>
<script src="dist/js/buttons.print.min.js"></script>
<?php } ?>

<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<?php if(($page=="statistic") || ($page=="statistic")) {   ?>

<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot-old/jquery.flot.resize.min.js"></script>
<?php } ?>

<!-- toggle -->
<script src="plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>
<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
<script>
  
  $(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		// $('h1').css('color','#222222');
	}, 1000);
	
});

$(function () {

$("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });

  
<?php $d = 1; ?>

 // Filter from database
$('.select2').select2();
     //Initialize Select2 Elements

$('.select2bs4').select2({
  theme: 'bootstrap4'
});

var options2 = new Array();
  options2.push({
			id: 0,
			text: 'LOW'
    });

$('.select2risk').select2({
    theme: 'bootstrap4'
		// data: options2,
		,escapeMarkup: function(markup) {
      console.log(markup);
      if(markup=="LOW")
      {
        return '<i class="fa fa-circle text-success"></i> LOW';
      }
      else if(markup=="MEDIUM")
      {
        return '<i class="fa fa-circle text-warning"></i> MEDIUM';
      }
      else if(markup=="HIGH")
      {
        return '<i class="fa fa-circle text-danger"></i> HIGH';
      }
			
		}
  });

	$('.FilterDB').select2({
    minimumInputLength: 2,
        placeholder: 'Select Program',
        // theme: "material",
        theme: 'bootstrap4',
        // allowClear: true,
        ajax: {
          url: 'select2program.php?filter=yes&d=<?=$d?>',//'filterDB.php',
          dataType: 'json',
          // delay: 50,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      }); 

      $('.FilterDBsesi').select2({
    minimumInputLength: 2,
        placeholder: 'Select an item',
        // theme: "material",
        theme: 'bootstrap4',
        // allowClear: true,
        ajax: {
          url: 'select2sesi.php?filter=yes',//'filterDB.php',
          dataType: 'json',
          // delay: 50,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      }); 
      //kolam
      $('.FilterDBkolam').select2({
    minimumInputLength: 2,
        placeholder: 'Select an item',
        // theme: "material",
        theme: 'bootstrap4',
        // allowClear: true,
        ajax: {
          url: 'select2kolam.php?filter=yes',//'filterDB.php',
          dataType: 'json',
          // delay: 50,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      }); 
 //Date picker
    $('#tarikh').datetimepicker({
      timepicker:false,
	format:'d-m-Y',
	formatDate:'Y/m/d',
	// minDate:'-1970/01/02', // yesterday is minimum date
  scrollMonth : false,
    scrollInput : false
    });
  // $('#tanggal').datetimepicker({
  // });
  $('#duration').datetimepicker({
      datepicker:false,
	    format:'H:i',
	    step:5
    });
    //Timepicker
    $('#start').datetimepicker({
      datepicker:false,
	    format:'H:i',
	    step:5
    });
    //Timepicker
    $('#stop').datetimepicker({
      datepicker:false,
	    format:'H:i',
	    step:5
    });
    <?php if(($page=="role") || ($page=="settings") || ($page=="users") || ($page=="program") || (strpos($page, 'table') !== false)  || (strpos($page, 'report') !== false)) {   ?>
    var tabel = $('#example2').DataTable({
      "orderCellsTop": true,
      "paging": true,
      <?php if($page != "oshesubmittedtable" && $page != "oshedrafttable" && $page != "settings") { ?>
      "processing": true,
      "serverSide": true,
      <?php } ?>
      "rowReorder": {
            "selector": 'td:nth-child(3)'
        },
        "responsive": true,
        "dom": '<<"float-left" f><"mx-auto" B><t>ilp>',
        "buttons": [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
      "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        <?php
        switch($page)
        {
          case "role" :  {echo '"ajax": "get_data_role.php?id='.$id_user.'&mode=list"';echo ',"order": [[ 1, "desc" ]],'; }break;
          case "users" :  {echo '"ajax": "get_data_users.php?id='.$id_user.'&mode=list"';echo ',"order": [[ 1, "desc" ]],'; }break;
          case "oshereport" : {echo '"ajax": "get_data_oshe_report.php"';}break;
          case "ngoreport" : {echo '"ajax": "get_data_ngo_report.php"';}break;
          case "ucuxreport" : {echo '"ajax": "get_data_table_ucux.php"';}break;
          case "vzreport" : {echo '"ajax": "get_data_vz_report.php"';}break;
          case "program" : {echo '"ajax": "get_data_program.php"';}break;
          case "ngosubmittedtable" : {echo '"ajax": "get_data_ngo.php?id='.$id_user.'&mode=submitted"';echo ',"order": [[ 1, "desc" ]],'; }break;
          case "ngodrafttable" :  {echo '"ajax": "get_data_ngo.php?id='.$id_user.'&mode=draft"';echo ',"order": [[ 1, "desc" ]],'; }break;
          case "vzsubmittedtable" : {echo '"ajax": "get_data_vz.php?id='.$id_user.'&mode=submitted"';echo ',"order": [[ 1, "desc" ]],'; }break;
          case "vzdrafttable" :  {echo '"ajax": "get_data_vz.php?id='.$id_user.'&mode=draft"';echo ',"order": [[ 1, "desc" ]],'; }break;
        }
        ?>
        
    }); //end of datatables
     <?php } ?>

    
  });

  function actiondelete(module,type,module_id)
{
 
  Swal.fire({
  title: 'Are you sure?',
  // text: "Delete Data ",
  // html: '<p class="text text-danger">'+filename+'</p>',
  // icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    var data = new FormData();
    data.append("mode", "delete");//module);
    data.append("type", type);
    data.append(module+"_id", module_id);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "action"+module+".php",
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
                    'Success Delete Data!',
                    'success'
                    );
                console.log("SUCCESS Delete: ", data);
               setTimeout(function(){ location.reload();
                //  $('#example2').DataTable().ajax.reload();
                 }, 1000);
              }
              else if(rv.info==1 || rv.info==2)
              {
                Swal.fire(
                      'Success!',
                      'Success Delete Data!',
                      'success'
                      );
                console.log("SUCCESS DELETE : ", data);
                setTimeout(function(){ location.reload();
                //  $('#example2').DataTable().ajax.reload();
                 }, 1000);              }

            }
          } catch (e) {
            //error data not json
            Swal.fire(
                    'error!',
                    'Error Delete Data, '+data,
                    'error'
                    );
                
                console.log("ERROR : ", data);
          } 
        },
        error: function (e) {
            console.log("ERROR : ", e);
        }
    });
//  console.log(document.getElementById("filecount").value,document.getElementById("maxfile").value);
 //  $("div#my-awesome-dropzone").dropzone.options.maxFiles = 5;//document.getElementById("maxfile").value ;
    
  }
})
 
}
  function get_update()
{
  $.ajax({
        url:"http://<?=$_SERVER['HTTP_HOST'].$prefix?>/actionrefresh.php",
        method:"POST", //First change type to method here
        success:function(response) {
        //  alert(response);
        // console.log(response);
        let myObj = JSON.parse(response);
        myObj.forEach(peritem);

        
        // console.log(myObj[0].txt_id_1 +"||" + myObj[0].txt_nama_1)
        // document.getElementById()
        console.log(myObj);
        // document.getElementById('txt_nama_').innerHTML = response.node_nama;
        
        // document.getElementById('jam').innerHTML = response;
       },
       error:function(e){
        // alert("error = "+e);
        console.log("error :",e);
       }

      });
      // let t = setTimeout(get_update, 5000);
}

</script>


<!-- <script type="text/javascript" src="dist/js/jquery-barcode.js"></script> -->
    <script type="text/javascript">
    
    function isEmpty(obj) {
        for(var prop in obj) {
            if(obj.hasOwnProperty(prop))
                return false;
        }
          return true;
      }
    
      function generateBarcode(){
        var value = no_ticket;//document.getElementById('ticket').value;//'0033';//$("#barcodeValue").val();
        var btype = 'code128';//$("input[name=btype]:checked").val();
        var renderer = 'css';//$("input[name=renderer]:checked").val();

        var settings = {
          output:renderer,
          bgColor: '#FFFFFF',//$("#bgColor").val(),
          color: '#000000',//$("#color").val(),
          barWidth: '5',//$("#barWidth").val(),
          barHeight: '100',//$("#barHeight").val(),
          moduleSize: '5',//$("#moduleSize").val(),
          posX: '10',//$("#posX").val(),
          posY: '20',//$("#posY").val(),
          addQuietZone: '1'//$("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000'; 
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        // generateBarcode();
        //Timepicker
        // $('#timepicker').datetimepicker({
        //   format: 'LT'
        // })
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    // var data        = [],
    //     totalPoints = 100

    // function getRandomData() {

    //   if (data.length > 0) {
    //     data = data.slice(1)
    //   }

    //   // Do a random walk
    //   while (data.length < totalPoints) {

    //     var prev = data.length > 0 ? data[data.length - 1] : 50,
    //         y    = prev + Math.random() * 10 - 5

    //     if (y < 0) {
    //       y = 0
    //     } else if (y > 100) {
    //       y = 100
    //     }

    //     data.push(y)
    //   }

    //   // Zip the generated y values with the x values
    //   var res = []
    //   for (var i = 0; i < data.length; ++i) {
    //     res.push([i, data[i]])
    //   }

    //   return res
    // }

    // var interactive_plot_voltase = $.plot('#grafik_voltase', [
    //     {
    //       data: getRandomData(),
    //     }
    //   ],
    //   {
    //     grid: {
    //       borderColor: '#f3f3f3',
    //       borderWidth: 1,
    //       tickColor: '#f3f3f3'
    //     },
    //     series: {
    //       color: '#3c8dbc',
    //       lines: {
    //         lineWidth: 2,
    //         show: true,
    //         fill: true,
    //       },
    //     },
    //     yaxis: {
    //       min: 0,
    //       max: 100,
    //       show: true
    //     },
    //     xaxis: {
    //       show: true
    //     }
    //   }
    // )
    // var interactive_plot_arus = $.plot('#grafik_arus', [
    //     {
    //       data: getRandomData(),
    //     }
    //   ],
    //   {
    //     grid: {
    //       borderColor: '#f3f3f3',
    //       borderWidth: 1,
    //       tickColor: '#f3f3f3'
    //     },
    //     series: {
    //       color: '#3c8dbc',
    //       lines: {
    //         lineWidth: 2,
    //         show: true,
    //         fill: true,
    //       },
    //     },
    //     yaxis: {
    //       min: 0,
    //       max: 100,
    //       show: true
    //     },
    //     xaxis: {
    //       show: true
    //     }
    //   }
    // )

    // var interactive_plot_daya = $.plot('#grafik_daya', [
    //     {
    //       data: getRandomData(),
    //     }
    //   ],
    //   {
    //     grid: {
    //       borderColor: '#f3f3f3',
    //       borderWidth: 1,
    //       tickColor: '#f3f3f3'
    //     },
    //     series: {
    //       color: '#3c8dbc',
    //       lines: {
    //         lineWidth: 2,
    //         show: true,
    //         fill: true,
    //       },
    //     },
    //     yaxis: {
    //       min: 0,
    //       max: 100,
    //       show: true
    //     },
    //     xaxis: {
    //       show: true
    //     }
    //   }
    // )

    // var updateInterval = 500 //Fetch data ever x milliseconds
    // var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    
    // function update() {

    //   interactive_plot_voltase.setData([getRandomData()])
    //   interactive_plot_arus.setData([getRandomData()])
    //   interactive_plot_daya.setData([getRandomData()])

    //   // Since the axes don't change, we don't need to call plot.setupGrid()
    //   interactive_plot_voltase.draw()
    //   interactive_plot_arus.draw()
    //   interactive_plot_daya.draw()
    //   if (realtime === 'on') {
    //     setTimeout(update, updateInterval)
    //   }
    // }

    //INITIALIZE REALTIME DATA FETCHING
    // if (realtime === 'on') {
    //   update()
    // }
    // //REALTIME TOGGLE
    // $('#realtime .btn').click(function () {
    //   if ($(this).data('toggle') === 'on') {
    //     realtime = 'on'
    //   }
    //   else {
    //     realtime = 'off'
    //   }
    //   update()
    // })
    /*
     * END INTERACTIVE CHART
     */


      });
  
    </script>
    <script src="dist/js/vfs_fonts.js"></script>

</body>
</html>
