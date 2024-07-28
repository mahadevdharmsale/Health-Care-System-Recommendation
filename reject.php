<?php
include('dr_lock.php');
if($_POST)
{
$abid=$_POST['abid'];
$sql_boo=$DBcon->query("UPDATE apbook SET  ab_flag =  '3' WHERE ab_id ='$abid'");
if($sql_boo==true){
	echo"success";
}else{
echo"error";
	}
  } else { } ?>