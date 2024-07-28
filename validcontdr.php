<?php 
include("dbconnect.php");
$cont = $_POST['cont'];
$qry=$DBcon->query("select dr_cont from dr where dr_cont='$cont'");
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
