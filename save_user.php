<?php include("dbconnect.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
 $fname=ucwords($_POST['fname']); 
 $lname=ucwords($_POST['lname']);
 $u_name=$fname." ".$lname;
 $email=strtolower($_POST['email']);
  $addr=$_POST['addr'];
  $cont=$_POST['cont'];
  $u_flag=1;
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $qry=$DBcon->query("INSERT INTO user (u_name, u_cont, u_pass, u_flag, u_email, u_addr) VALUES ('$u_name', '$cont', '$password', '$u_flag', '$email', '$addr')");
  if($qry==true){
	  echo"Success";
  }else{
	   echo"not";
  }
}