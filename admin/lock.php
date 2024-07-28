<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['adminSession'])) {
	header("Location: index.php");
}
$query = $DBcon->query("SELECT * FROM admin WHERE ad_id=".$_SESSION['adminSession']);
$userRow=$query->fetch_array();
$ad_id=$userRow['ad_id']; 
?>