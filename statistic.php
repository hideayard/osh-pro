
<?php
if(!check_role($page,'*'))
{
  echo "<script>alert('You are not permitted!!!');window.location='home';</script>";
}

$sql = "SELECT ( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 1 ) as oshe1
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 2 ) as oshe2
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 3 ) as oshe3
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 4 ) as oshe4
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 5 ) as oshe5
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 6 ) as oshe6
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 7 ) as oshe7
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 8 ) as oshe8
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 9 ) as oshe9
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 10 ) as oshe10
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 11 ) as oshe11
,( SELECT count(oshe_id) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 12 ) as oshe12

,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1 ) as ngo1
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2 ) as ngo2
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3 ) as ngo3
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4 ) as ngo4
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5 ) as ngo5
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6 ) as ngo6
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7 ) as ngo7
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8 ) as ngo8
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9 ) as ngo9
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10 ) as ngo10
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11 ) as ngo11
,( SELECT count(ngo_id) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12 ) as ngo12

,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 1 ) as ucux1
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 2 ) as ucux2
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 3 ) as ucux3
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 4 ) as ucux4
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 5 ) as ucux5
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 6 ) as ucux6
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 7 ) as ucux7
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 8 ) as ucux8
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 9 ) as ucux9
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 10 ) as ucux10
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 11 ) as ucux11
,( SELECT count(ucux_id) FROM `ucux` WHERE YEAR(ucux_created_at) = YEAR(NOW())  AND ucux_txtform <> ''  and MONTH(ucux_created_at) = 12 ) as ucux12

,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 1 ) as vz1
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 2 ) as vz2
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 3 ) as vz3
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 4 ) as vz4
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 5 ) as vz5
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 6 ) as vz6
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 7 ) as vz7
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 8 ) as vz8
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 9 ) as vz9
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 10 ) as vz10
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 11 ) as vz11
,( SELECT count(vz_id) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 12 ) as vz12

,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 1 ) as sumvz1
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 2 ) as sumvz2
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 3 ) as sumvz3
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 4 ) as sumvz4
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 5 ) as sumvz5
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 6 ) as sumvz6
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 7 ) as sumvz7
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 8 ) as sumvz8
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 9 ) as sumvz9
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 10 ) as sumvz10
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 11 ) as sumvz11
,( SELECT ifnull(sum(vz_bil_peserta),0) FROM `vz` WHERE YEAR(vz_created_at) = YEAR(NOW())  AND vz_nama <> ''  and MONTH(vz_created_at) = 12 ) as sumvz12

,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1 ) as sumngo1
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2 ) as sumngo2
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3 ) as sumngo3
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4 ) as sumngo4
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5 ) as sumngo5
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6 ) as sumngo6
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7 ) as sumngo7
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8 ) as sumngo8
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9 ) as sumngo9
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10 ) as sumngo10
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11 ) as sumngo11
,( SELECT ifnull(sum(ngo_bil_peserta),0) FROM `ngo` WHERE YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12 ) as sumngo12

,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 1 ) as sumoshe1
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 2 ) as sumoshe2
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 3 ) as sumoshe3
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 4 ) as sumoshe4
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 5 ) as sumoshe5
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 6 ) as sumoshe6
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 7 ) as sumoshe7
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 8 ) as sumoshe8
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 9 ) as sumoshe9
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 10 ) as sumoshe10
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 11 ) as sumoshe11
,( SELECT ifnull(sum(oshe_bil_peserta),0) FROM `oshe` WHERE  YEAR(oshe_created_at) = YEAR(NOW()) AND oshe_email <> ''  and MONTH(oshe_created_at) = 12 ) as sumoshe12

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1) as ngoa1
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1) as ngob1
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1) as ngoc1
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1) as ngod1
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1) as ngoe1
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 1) as ngof1

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2) as ngoa2
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2) as ngob2
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2) as ngoc2
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2) as ngod2
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2) as ngoe2
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 2) as ngof2

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3) as ngoa3
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3) as ngob3
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3) as ngoc3
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3) as ngod3
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3) as ngoe3
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 3) as ngof3

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4) as ngoa4
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4) as ngob4
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4) as ngoc4
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4) as ngod4
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4) as ngoe4
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 4) as ngof4

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5) as ngoa5
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5) as ngob5
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5) as ngoc5
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5) as ngod5
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5) as ngoe5
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 5) as ngof5

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6) as ngoa6
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6) as ngob6
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6) as ngoc6
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6) as ngod6
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6) as ngoe6
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 6) as ngof6

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7) as ngoa7
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7) as ngob7
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7) as ngoc7
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7) as ngod7
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7) as ngoe7
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 7) as ngof7

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8) as ngoa8
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8) as ngob8
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8) as ngoc8
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8) as ngod8
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8) as ngoe8
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 8) as ngof8

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9) as ngoa9
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9) as ngob9
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9) as ngoc9
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9) as ngod9
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9) as ngoe9
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 9) as ngof9

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10) as ngoa10
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10) as ngob10
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10) as ngoc10
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10) as ngod10
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10) as ngoe10
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 10) as ngof10

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11) as ngoa11
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11) as ngob11
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11) as ngoc11
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11) as ngod11
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11) as ngoe11
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 11) as ngof11

,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'SEMINAR' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12) as ngoa12
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'IKLAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12) as ngob12
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'RUNDING CARA' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12) as ngoc12
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'VIDEO' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12) as ngod12
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'KAJIAN DAN PENDIDIKAN' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12) as ngoe12
,(SELECT count(ngo_id) FROM `ngo` WHERE ngo_jenis_program_name= 'OTHER' and YEAR(ngo_created_at) = YEAR(NOW())  AND ngo_nama <> '' and MONTH(ngo_created_at) = 12) as ngof12
" ;

$result = $db->rawQuery($sql);//@mysql_query($sql);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Statistic Overview</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Statistic</a></li>
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
                
                
                <div class="col-md-6">
                  <div class="card card-info">
                      <div class="card-header">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                          OSHE Report
                          </a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse show ">
                        <div class="card-body">
                              <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                  <canvas id="oshe-report" height="400" style="display: block; height: 200px; width: 311px;" width="622" class="chartjs-render-monitor"></canvas>
                              </div>

                              <div class="d-flex flex-row justify-content-end">
                                  <span class="mr-2">
                                      <i class="fas fa-square text-primary"></i> OSHE
                                  </span>
                              </div>
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="col-md-6">

                    <div class="card card-success">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            NGO Report
                            </a>
                          </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse  show ">
                          <div class="card-body">
                            
                                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="ngo-report" height="400" style="display: block; height: 200px; width: 311px;" width="622" class="chartjs-render-monitor"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-success"></i> NGO
                                    </span>
                                </div>
                            
                          </div>
                        </div>
                      </div>

                </div>

                <div class="col-md-6">

                    <div class="card card-warning">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              UCUX Report
                            </a>
                          </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse show ">
                          <div class="card-body">
                            
                                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="ucux-report" height="400" style="display: block; height: 200px; width: 311px;" width="622" class="chartjs-render-monitor"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-warning"></i> UCUX
                                    </span>
                                </div>

                          </div>
                        </div>
                      </div>

                </div>

                <div class="col-md-6">

                    <div class="card card-danger">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                              Vision Zero Report
                            </a>
                          </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse show ">
                          <div class="card-body">
                            
                                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="visionzero-report" height="400" style="display: block; height: 200px; width: 311px;" width="622" class="chartjs-render-monitor"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                        <i class="fas fa-square text-danger"></i> Vision Zero
                                    </span>
                                </div>

                          </div>
                        </div>
                      </div>

                </div>

                <div class="col-md-6">

                  <div class="card card-secondary">
                      <div class="card-header">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                            Participant Report
                          </a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse show ">
                        <div class="card-body">
                          
                              <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                  <canvas id="participant-report" height="400" style="display: block; height: 200px; width: 311px;" width="622" class="chartjs-render-monitor"></canvas>
                              </div>

                              <div class="d-flex flex-row justify-content-end">
                                  <span class="mr-2">
                                      <i class="fas fa-square text-primary"></i> OSHE    
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-square text-success"></i> NGO    
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-square text-danger"></i> Vision Zero    
                                  </span>

                              </div>

                        </div>
                      </div>
                    </div>

                </div>


                <div class="col-md-6">

                  <div class="card card-purple">
                      <div class="card-header">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                          Jumlah Perlaksanaan Program
                          </a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse show ">
                        <div class="card-body">
                          
                              <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                  <canvas id="ngo-by-program-report" height="400" style="display: block; height: 200px; width: 311px;" width="622" class="chartjs-render-monitor"></canvas>
                              </div>

                              <div class="d-flex flex-row justify-content-end">
                                  <span class="mr-2">
                                      <i class="fas fa-square text-primary"></i> SEMINAR    
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-square text-success"></i> IKLAN    
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-square text-info"></i> RUNDING CARA    
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-square text-warning"></i> VIDEO    
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-square text-danger"></i> KAJIAN DAN PENDIDIKAN    
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-square text-secondary"></i> OTHER    
                                  </span>

                              </div>

                        </div>
                      </div>
                    </div>

                </div>



                <!-- <div class="col-md-6">
                </div>
                <div class="col-md-6">
                </div> -->



            </div>

            <!-- /.row -->
            <div class="row col-lg-12" style="text-align:center;">
                <div class="col-lg-3 col-6">
                    <a href="home"><button type="button" class="btn btn-block btn-primary">Back</button></a>
                </div>
                <!-- ./col -->
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $osheChart = $('#oshe-report')
  var osheChart  = new Chart($osheChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [<?=$result[0]['oshe1']?>, <?=$result[0]['oshe2']?>, <?=$result[0]['oshe3']?>, <?=$result[0]['oshe4']?>, <?=$result[0]['oshe5']?>, <?=$result[0]['oshe6']?>, <?=$result[0]['oshe7']?>, <?=$result[0]['oshe8']?>, <?=$result[0]['oshe9']?>, <?=$result[0]['oshe10']?>, <?=$result[0]['oshe11']?>, <?=$result[0]['oshe12']?>]
        }
        
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          stacked:true,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .6)',
            zeroLineColor: 'transparent'
          }
          // ,ticks    : $.extend({
          //   beginAtZero: true,

          //   // Include a dollar sign in the ticks
          //   callback: function (value, index, values) {
          //     if (value >= 1000) {
          //       value /= 1000
          //       value += 'k'
          //     }
          //     // return 'MYR' + value
          //     return  value
          //   }
          // }, ticksStyle)
        }],
        xAxes: [{
          stacked:true,
          display  : true,
          gridLines: {
            display: false
          }
          // ,ticks    : ticksStyle
        }]
      }
    }
  });

  var $ngoChart = $('#ngo-report');
  var ngoChart  = new Chart($ngoChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#5CB85C',
          borderColor    : '#5CB85C',
          data           : [<?=$result[0]['ngo1']?>, <?=$result[0]['ngo2']?>, <?=$result[0]['ngo3']?>, <?=$result[0]['ngo4']?>, <?=$result[0]['ngo5']?>, <?=$result[0]['ngo6']?>, <?=$result[0]['ngo7']?>, <?=$result[0]['ngo8']?>, <?=$result[0]['ngo9']?>, <?=$result[0]['ngo10']?>, <?=$result[0]['ngo11']?>, <?=$result[0]['ngo12']?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .6)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              // return 'MYR' + value
              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  });


  var $programChart = $('#ucux-report');
  var programChart  = new Chart($programChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#f0ad4e',
          borderColor    : '#f0ad4e',
          data           : [<?=$result[0]['ucux1']?>, <?=$result[0]['ucux2']?>, <?=$result[0]['ucux3']?>, <?=$result[0]['ucux4']?>, <?=$result[0]['ucux5']?>, <?=$result[0]['ucux6']?>, <?=$result[0]['ucux7']?>, <?=$result[0]['ucux8']?>, <?=$result[0]['ucux9']?>, <?=$result[0]['ucux10']?>, <?=$result[0]['ucux11']?>, <?=$result[0]['ucux12']?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .6)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              // return 'MYR' + value
              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  });

  //ngo-by-program-report
  var $participantChart = $('#participant-report');
  var participantChart  = new Chart($participantChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
            backgroundColor: '#0275d8',
            borderColor    : '#0275d8',
            data           : [<?=$result[0]['sumoshe1']?>, <?=$result[0]['sumoshe2']?>, <?=$result[0]['sumoshe3']?>, <?=$result[0]['sumoshe4']?>, <?=$result[0]['sumoshe5']?>, <?=$result[0]['sumoshe6']?>, <?=$result[0]['sumoshe7']?>, <?=$result[0]['sumoshe8']?>, <?=$result[0]['sumoshe9']?>, <?=$result[0]['sumoshe10']?>, <?=$result[0]['sumoshe11']?>, <?=$result[0]['sumoshe12']?>]
        }
        ,{
            backgroundColor: '#5CB85C',
            borderColor    : '#5CB85C',
            data           : [<?=$result[0]['sumngo1']?>, <?=$result[0]['sumngo2']?>, <?=$result[0]['sumngo3']?>, <?=$result[0]['sumngo4']?>, <?=$result[0]['sumngo5']?>, <?=$result[0]['sumngo6']?>, <?=$result[0]['sumngo7']?>, <?=$result[0]['sumngo8']?>, <?=$result[0]['sumngo9']?>, <?=$result[0]['sumngo10']?>, <?=$result[0]['sumngo11']?>, <?=$result[0]['sumngo12']?>]
        }
        ,{
            backgroundColor: '#d9534f',
            borderColor    : '#d9534f',
            data           : [<?=$result[0]['sumvz1']?>, <?=$result[0]['sumvz2']?>, <?=$result[0]['sumvz3']?>, <?=$result[0]['sumvz4']?>, <?=$result[0]['sumvz5']?>, <?=$result[0]['sumvz6']?>, <?=$result[0]['sumvz7']?>, <?=$result[0]['sumvz8']?>, <?=$result[0]['sumvz9']?>, <?=$result[0]['sumvz10']?>, <?=$result[0]['sumvz11']?>, <?=$result[0]['sumvz12']?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          stacked: true,
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .6)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              // return 'MYR' + value
              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          stacked: true,
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  });

//ngo-by-program-report
  var $ngobyprogramChart = $('#ngo-by-program-report');
  var ngobyprogramChart  = new Chart($ngobyprogramChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
            backgroundColor: '#0275d8',
            borderColor    : '#0275d8',
            data           : [<?=$result[0]['ngoa1']?>, <?=$result[0]['ngoa2']?>, <?=$result[0]['ngoa3']?>, <?=$result[0]['ngoa4']?>, <?=$result[0]['ngoa5']?>, <?=$result[0]['ngoa6']?>, <?=$result[0]['ngoa7']?>, <?=$result[0]['ngoa8']?>, <?=$result[0]['ngoa9']?>, <?=$result[0]['ngoa10']?>, <?=$result[0]['ngoa11']?>, <?=$result[0]['ngoa12']?>]
        }
        ,{
            backgroundColor: '#5CB85C',
            borderColor    : '#5CB85C',
            data           : [<?=$result[0]['ngob1']?>, <?=$result[0]['ngob2']?>, <?=$result[0]['ngob3']?>, <?=$result[0]['ngob4']?>, <?=$result[0]['ngob5']?>, <?=$result[0]['ngob6']?>, <?=$result[0]['ngob7']?>, <?=$result[0]['ngob8']?>, <?=$result[0]['ngob9']?>, <?=$result[0]['ngob10']?>, <?=$result[0]['ngob11']?>, <?=$result[0]['ngob12']?>]
        }
        ,{
            backgroundColor: '#5bc0de',
            borderColor    : '#5bc0de',
            data           : [<?=$result[0]['ngoc1']?>, <?=$result[0]['ngoc2']?>, <?=$result[0]['ngoc3']?>, <?=$result[0]['ngoc4']?>, <?=$result[0]['ngoc5']?>, <?=$result[0]['ngoc6']?>, <?=$result[0]['ngoc7']?>, <?=$result[0]['ngoc8']?>, <?=$result[0]['ngoc9']?>, <?=$result[0]['ngoc10']?>, <?=$result[0]['ngoc11']?>, <?=$result[0]['ngoc12']?>]
        }
        ,{
            backgroundColor: '#f0ad4e',
            borderColor    : '#f0ad4e',
            data           : [<?=$result[0]['ngod1']?>, <?=$result[0]['ngod2']?>, <?=$result[0]['ngod3']?>, <?=$result[0]['ngod4']?>, <?=$result[0]['ngod5']?>, <?=$result[0]['ngod6']?>, <?=$result[0]['ngod7']?>, <?=$result[0]['ngod8']?>, <?=$result[0]['ngod9']?>, <?=$result[0]['ngod10']?>, <?=$result[0]['ngod11']?>, <?=$result[0]['ngod12']?>]
        }
        ,{
            backgroundColor: '#d9534f',
            borderColor    : '#d9534f',
            data           : [<?=$result[0]['ngoe1']?>, <?=$result[0]['ngoe2']?>, <?=$result[0]['ngoe3']?>, <?=$result[0]['ngoe4']?>, <?=$result[0]['ngoe5']?>, <?=$result[0]['ngoe6']?>, <?=$result[0]['ngoe7']?>, <?=$result[0]['ngoe8']?>, <?=$result[0]['ngoe9']?>, <?=$result[0]['ngoe10']?>, <?=$result[0]['ngoe11']?>, <?=$result[0]['ngoe12']?>]
        }
        ,{
            backgroundColor: '#292b2c',
            borderColor    : '#292b2c',
            data           : [<?=$result[0]['ngof1']?>, <?=$result[0]['ngof2']?>, <?=$result[0]['ngof3']?>, <?=$result[0]['ngof4']?>, <?=$result[0]['ngof5']?>, <?=$result[0]['ngof6']?>, <?=$result[0]['ngof7']?>, <?=$result[0]['ngof8']?>, <?=$result[0]['ngof9']?>, <?=$result[0]['ngof10']?>, <?=$result[0]['ngof11']?>, <?=$result[0]['ngof12']?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          stacked: true,
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .6)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              // return 'MYR' + value
              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          stacked: true,
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  });


  var $visionzeroChart = $('#visionzero-report');
  var visionzeroChart  = new Chart($visionzeroChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#d9534f',
          borderColor    : '#d9534f',
          data           : [<?=$result[0]['vz1']?>, <?=$result[0]['vz2']?>, <?=$result[0]['vz3']?>, <?=$result[0]['vz4']?>, <?=$result[0]['vz5']?>, <?=$result[0]['vz6']?>, <?=$result[0]['vz7']?>, <?=$result[0]['vz8']?>, <?=$result[0]['vz9']?>, <?=$result[0]['vz10']?>, <?=$result[0]['vz11']?>, <?=$result[0]['vz12']?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .6)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              // return 'MYR' + value
              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  });

});

</script>