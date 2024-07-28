<?php
include("dbconnect.php");
$path = "../gal/";
$actual_image_name="";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	include_once 'includes/getExtension.php';
	 $imagename = $_FILES['profileimg']['name'];
	$size = $_FILES['profileimg']['size'];
	$fname=ucwords($_POST['fname']); 
 $lname=ucwords($_POST['lname']);
 $u_name=$fname." ".$lname;
 $email=strtolower($_POST['email']);
  $addr=$_POST['addr'];
  $cont=$_POST['cont'];
  $expi=$_POST['expi'];
  $speci=$_POST['speci'];
  $edu=$_POST['edu'];
  $dr_date=time();
  $dr_flag=1;
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	if(strlen($imagename))
	{
		$douext=explode(".",$imagename);
		$cnt=count($douext);
		if($cnt == 2){
		$ext = strtolower(getExtension($imagename));
		if(in_array($ext,$valid_formats))
		{
			if($size<(1024*1024))
			{
				$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
				$uploadedfile = $_FILES['profileimg']['tmp_name'];
				include 'includes/compressImagewidth.php';	
											 
				//$widthArray = array(200,100,50);
				
				$filename=compressImage($ext,$uploadedfile,$path,$actual_image_name,350);
												
				if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
				{	
				  $qry=$DBcon->query("INSERT INTO dr (dr_name, dr_email, dr_cont, dr_addr, dr_expi, dr_edu, dr_flag, dr_date, sp_id) VALUES ('$u_name','$email', '$cont', '$addr', '$expi', $edu, $dr_flag, $dr_date, $sp_id)");
				 if($qry==true)
				{	
				echo "Success" ;
				}else
					echo "Fails upload ";
				}
				else
				echo "Fail upload folder with read access.";
			}
			else
			echo "Image file size max 1 MB";					
		}
		else
		echo "Invalid file format..";	
	}
		else
		echo "Invalid Double extention file format..";
	}
	else
	echo "Please select image..!";
	exit;
}
?>