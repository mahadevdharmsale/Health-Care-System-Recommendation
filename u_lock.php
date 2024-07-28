<?php
date_default_timezone_set('Asia/Kolkata');
include_once ('dbconnect.php');
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
$ses=$_SESSION['userSession'];
$query = $DBcon->query("select * from user WHERE u_flag=1 AND u_id='$ses'");
$userRow=$query->fetch_array();
$u_id=$userRow['u_id']; 
?>