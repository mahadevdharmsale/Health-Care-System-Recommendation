<?php
require_once('lock.php');
	if($_SERVER['REQUEST_METHOD'] == "GET")
		{
	$time=time();
	    $dr_flag="2";
		 $dr_id=$_GET["dr_id"];
		 $upzadd=$DBcon->query("UPDATE dr SET dr_flag ='$dr_flag' WHERE dr_id ='$dr_id'");
		 if($upzadd==true){ 
		 header("location:home.php");
		 }else{
			echo "not"; 
		 }
	   }
	
?>