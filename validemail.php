<?php 
include("dbconnect.php");
$email = $_POST['email'];
$qry=$DBcon->query("select u_email from user where u_email='$email'");
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

