<?php include("dbconnect.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
 $s_name=$_POST['s_name']; 
 $s_desc=$_POST['s_desc'];
 $sp_id=$_POST['sp_id'];
 $s_flag=1;
  $qry=$DBcon->query("INSERT INTO `symtoms` (s_desc, s_flag, sp_id, s_name) VALUES ('$s_desc', '$s_flag', '$sp_id', '$s_name')");
  if($qry==true)
  {
	 	header("location:symptoms.php");
  }else{
	   echo"not";
  }
}