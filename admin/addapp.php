<?php
include("lock.php");
 $path = "../images/icons/";
$actual_image_name="";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	include_once 'includes/getExtension.php';
	 $imagename = $_FILES['upimg']['name'];
	$size = $_FILES['upimg']['size'];
	$sp_name=$_POST["sp_name"];
  $txt="sp";
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
				$uploadedfile = $_FILES['upimg']['tmp_name'];
				include 'includes/compressImagewidth.php';	
											 
				//$widthArray = array(200,100,50);
				
				$filename=compressImage($ext,$uploadedfile,$path,$actual_image_name,350);
												
				if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
				{	
                     $qry=$DBcon->query("INSERT INTO specialist (sp_name, sp_icon, so_flag) VALUES ('$sp_name','$actual_image_name', '1')");
				 if($qry==true)
				{
					header("location:add_speci.php");
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