<?php
include('u_lock.php');
if($_POST)
{
$aptm=$_POST['aptm'];
$dr_id=$_POST['dr_id'];
$date= date('d-m-Y H:i:s');
$crdate=date('Y-m-d');
$tm=strtotime($crdate);
$sql_boo=$DBcon->query("INSERT INTO apbook (u_id, dr_id, ab_tm, ab_flag, ab_dt) VALUES ('$u_id', '$dr_id', '$aptm', '1', '$tm')");
if($sql_boo==true){
	echo"success";
}else{
echo"error";
	}
  } else { } ?>