<?php 
include("dbconnect.php");
$email = $_POST['email'];
$qry=$DBcon->query("select dr_email from dr where dr_email='$email'");
$count=$qry->num_rows;
if($count>=1)
{
	echo "false";
}
else
{
	echo "true";
}       
?>

