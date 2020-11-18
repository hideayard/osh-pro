<?php 

require_once ('config/MysqliDb.php');
include_once ("config/db.php");
$db = new MysqliDb ('localhost', $dbuser, $dbpass, $dbname);
include("config/functions.php");
$d=isset($_GET['d']) ? $_GET['d'] : ""; 

if(isset($_GET['filter']) && $_GET['filter'] == 'yes') {

    $q = isset($_GET['q'])?$_GET['q'] : '';
    $query = "select program_id as id,concat(program_name_ms,'(',program_code,'-)') as text from program where program_name_ms like '%".$q."%' and program_status='".$d."' limit 6";
    //return $query;
    $data = $db->rawQuery($query);

	echo  json_encode($data);
} else {

	echo json_encode("");
}

?>