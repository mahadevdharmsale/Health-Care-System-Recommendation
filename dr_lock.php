<?php
date_default_timezone_set('Asia/Kolkata');
include_once ('dbconnect.php');
if (!isset($_SESSION['drSession'])) {
	header("Location: index.php");
}
$ses=$_SESSION['drSession'];
$query = $DBcon->query("select d.*,sp.sp_name from dr d, specialist sp
								WHERE d.sp_id=sp.sp_id 
								AND dr_flag=2 AND d.dr_id='$ses'");
$drRow=$query->fetch_array();
$dr_id=$drRow['dr_id']; 
?>