<?php
require_once('dbconnect.php');
if(isset($_SESSION['drSession']) && !isset($_SESSION['userSession'])) {
	header("Location: drpanel.php");
	exit;
}elseif(isset($_SESSION['userSession'])!="" && !isset($_SESSION['drSession'])){
	header("Location: userpanel.php");
	exit;
}else
{}
if(isset($_POST['btn-login']) && $_POST["type"]=="1"){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $DBcon->query("SELECT * FROM dr WHERE dr_flag=2 AND dr_email='$username' OR dr_cont='$username'");
	$row=$query->fetch_array();
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['dr_pass']) && $count==1 && $row['dr_flag']==2) {
		$_SESSION['drSession']=$row['dr_id'];
		header("Location: drpanel.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
}elseif(isset($_POST['btn-login']) && $_POST["type"]=="2"){
$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $DBcon->query("SELECT * FROM user WHERE u_email='$username' OR u_cont='$username'
	AND u_flag=1");
	$row=$query->fetch_array();
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['u_pass']) && $count==1 & $row['u_flag']==1) {
		$_SESSION['userSession']=$row['u_id'];
		header("Location: userpanel.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}	
}
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Medlink Directory A Complete Learning Source : Signin / Singup</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.countdown.css">
	<link rel="stylesheet" href="css/customScrollbar.css">
	<link rel="stylesheet" href="css/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="css/fullcalendar.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
//form validation rules
$(document).ready(function(){
	 $("#loginForm").validate({
                rules:{
                 fname: "required",
		         lname: "required",
		         addr:"required",
				 email: {
                               required: true,
                               email:true,
				remote:{
			url: 'validemail.php',
			type: "POST"
       			}
                           },
				cont: {
                               required: true,
							   minlength:10,
                               number:true,
				remote:{
			url: 'validcont.php',
			type: "POST"
       			}
                           },	   
			password:{
                        required:true,
			    		minlength:5
                    } 
                },
                messages: {
				fname: "required",
		         lname: "required",
		         addr:"required",
				 email: {
                               required: "required",
                               email:"Enter valid email",
								remote:"Already Exsist"
                           },
				cont: {
                        required: "required",
						minlength:"Enter valid 10 Digit Number ",
                        number:"Enter valid Number",
						remote:"Already Exsist"
                           },	   
			password:{
                        required:"required",
			    		minlength:"Atleast enter 5 digit Password"
                    } 
                },
                	submitHandler: function(form) {
		    	      logindata();
                }
            });
        });
</script>
<script type="text/javascript" >
  function logindata(){
	  alert("ok");
	var form = $("#loginForm");
	 $('#loginForm').attr('id', 'aaa');
    $.ajax({
        url: 'save_user.php',
        type: 'POST',
        data: form.serialize(),
        success: function(data){
			alert(data);
		if(data == "Success")
		{ 
		 $('#aaa').attr('id', 'loginForm');
		  $('#loginForm')[0].reset();
			$('#sucess').text(" Successfully Registered");
			$('.toast-top-right').show();
			$('.toast-top-right').focus();
			$('.toast-top-right').fadeOut(5000);
		}
		else
		{ 
		 $('#aaa').attr('id', 'loginForm');
		 $('#error').html(data);
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			$('.toast-top-center').fadeOut(5000);
			$('#loginForm')[0].reset();
		  }
        }
    });
}
   </script>
</head>
   <style>
.error{ 
color:red;
}
</style>
<body class="tg-login">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Preloader Start
	*************************************-->
	
	<!--************************************
			Wrapper Start					
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start					
		*************************************-->
		<?php include("header.php"); ?>
		<!--************************************
				Header End						
		*************************************-->
		<!--************************************
				Home Banner Start				
		*************************************-->
		<div class="tg-pageinnerbanner tg-haslayout tg-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/banner/img-02.jpg">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="tg-pageheadcontent">
							<div class="tg-pagetitle">
								<h1>Login / Register</h1>
							</div>
							<ol class="tg-breadcrumb">
								<li><a href="#">Home</a></li>
								<li class="tg-active">Become A Member</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Home Banner End					
		*************************************-->
		<!--************************************
				Main Start						
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-twocolumns" class="tg-twocolumns">
						<div class="col-md-4 col-sm-5 col-xs-12">
							<aside id="tg-sidebar" class="tg-sidebar">
								<div class="tg-widget tg-widgetlogin">
									<div class="tg-widgetcontent">
										<div class="tg-widgettitle">
											<h3>Login Now</h3>
										</div>
										<form class="tg-themeform tg-formsignin"  method="POST">
											<fieldset>
												<div class="form-group tg-formgroup">
													<input type="text" name="username" class="form-control" placeholder="Username">
												</div>
												<div class="form-group tg-formgroup">
													<input type="password" name="password" class="form-control" placeholder="Password">
												</div>
												<div class="form-group tg-formgroup">
													<select id="type" name="type" class="form-control">
													<option value="" > login As Doctor / User</option>
													<option value="1" > As Doctor </option>
													<option value="2" > As User</option>
													</select>
												</div>
												<button class="tg-btn tg-btn-lg" id="btn-login"  name="btn-login" type="submit">Login Now</button>
											</fieldset>
										</form>
									</div>
									<a href="#" class="tg-btnforgotpassword">Forgot your password?</a>
								</div>
							</aside>
						</div>
						<div class="col-md-8 col-sm-7 col-xs-12">
							<div id="tg-content" class="tg-content">
								<div class="tg-signinsignup">
									<div class="tg-title">
										<h2>Register Now As</h2>
									</div>
									<div class="tg-dashboardtabs">
										<ul class="tg-dashboardtabnav" role="tablist">
											<li role="presentation" class="active">
												<a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">User </a>
											</li>
											<li role="presentation">
												<a href="#services" aria-controls="services" role="tab" data-toggle="tab">Doctors </a>
											</li>
										</ul>
										<div class="tab-content tg-dashboardtabcontent">
											<div role="tabpanel" class="tab-pane active" id="overview">
												<div class="tg-searchbulder">
													
													<div id="tg-subcategories" class="tg-subcategories">
														<div id="doctorscategory" class="tg-tabcontent tg-active">
<form class="tg-formtheme tg-formsigninsignup" id="loginForm" action='javascript:;' name="loginForm" onsubmit="" Method="POST">
																<fieldset>
								<div class="row tg-rowmargin">
								<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
								<div class="form-group tg-formgroup">
			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
				</div>
			</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
		<input type="text" name="cont" id="cont" class="form-control" placeholder="contact">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
	<input type="text" name="email" id="email" class="form-control" placeholder="email">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
	<input type="password" name="password"  id="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
			<input type="text" name="addr"  id="addr" class="form-control" placeholder=" address">
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
	</form>
															
														</div>
														<div id="hospitalscategory" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>doctor
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="spascategory" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot2" name="notrobot" value="human">
																						<label for="notrobot2">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob3" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob3"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="pharmaciescategory" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot3" name="notrobot" value="human">
																						<label for="notrobot3">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob4" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob4"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="labscategory" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot4" name="notrobot" value="human">
																						<label for="notrobot4">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob5" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob5"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="fitnesscategory" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot5" name="notrobot" value="human">
																						<label for="notrobot5">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob6" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob6"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="bloodbankcategory" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot6" name="notrobot" value="human">
																						<label for="notrobot6">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob7" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob7"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="clinicscategory" class="tg-tabcontent">
										<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot7" name="notrobot" value="human">
																						<label for="notrobot7">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob8" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob8"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane" id="services">
												<div class="tg-searchbulder">
													<div id="tg-subcategories-one" class="tg-subcategories">
														<div id="doctorscategory1" class="tg-tabcontent tg-active">
	<form class="tg-formtheme tg-formsigninsignup" id="rform" name="rform" action="javascript:;"  onsubmit="" Method="POST" enctype="multipart/form-data">
																<fieldset>
								<div class="row tg-rowmargin">
								<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
								<div class="form-group tg-formgroup">
			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
				</div>
			</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
		<input type="text" name="cont" id="cont" class="form-control" placeholder="contact">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
	<input type="text" name="email" id="email" class="form-control" placeholder="email">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
	<input type="password" name="password"  id="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
				<div class="form-group tg-formgroup">
			<input type="text" name="addr"  id="addr" class="form-control" placeholder=" address">
																			</div>
																		</div>
							<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
							<div class="form-group tg-formgroup">
						<span class="tg-select">
						<select id="speci" name="speci">
							<option value="">Select Specialization</option>
								<?php $sql=$DBcon->query("SELECT * FROM  specialist");
										while($row=$sql->fetch_array()){
										?>
											<option value="<?php echo $row['sp_id']; ?>"><?php echo $row['sp_name']; ?></option>
										<?php } ?>
						</select>
					</span>
					</div>
					</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
			<input type="text" name="edu"  id="edu" class="form-control" placeholder=" Education">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
			<input type="text" name="expi"  id="expi" class="form-control" placeholder=" Experience">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
			<input type="file" name="profileimg"  id="profileimg"  class="form-control">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-6 col-xs-12 tg-columnpadding">
							<div class="form-group tg-formgroup">
						<span class="tg-select">
						<select id="city_id" name="city_id">
							<option value="">Select city</option>
								<?php $sql=$DBcon->query("SELECT * FROM  city_master");
										while($row=$sql->fetch_array()){
										?>
											<option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
										<?php } ?>
						</select>
					</span>
					</div>
					</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
			<button type="submit" class="tg-btn">Register As Doctor</button>
																		</div>
																	</div>
																</fieldset>
	</form>
															
														</div>
														<div id="hospitalscategory1" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot9" name="notrobot" value="human">
																						<label for="notrobot9">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob11" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob11"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="spascategory1" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot10" name="notrobot" value="human">
																						<label for="notrobot10">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob12" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob12"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="pharmaciescategory1" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot11" name="notrobot" value="human">
																						<label for="notrobot11">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob13" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob13"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="labscategory1" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot12" name="notrobot" value="human">
																						<label for="notrobot12">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob14" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob14"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="fitnesscategory1" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot13" name="notrobot" value="human">
																						<label for="notrobot13">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob15" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob15"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="bloodbankcategory1" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot14" name="notrobot" value="human">
																						<label for="notrobot14">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob17" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob17"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 col-xs-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
														<div id="clinicscategory1" class="tg-tabcontent">
															<form class="tg-formtheme tg-formsigninsignup">
																<fieldset>
																	<div class="row tg-rowmargin">
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<span class="tg-select">
																					<select>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																						<option>Title</option>
																					</select>
																				</span>
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="firstname" class="form-control" placeholder="First Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="lasttname" class="form-control" placeholder="Last Name">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="text" name="username" class="form-control" placeholder="Username">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="password" class="form-control" placeholder="Password">
																			</div>
																		</div>
																		<div class="col-md-4 col-sm-6 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<input type="password" name="re-typepassword" class="form-control" placeholder="Re-type Password">
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12 tg-columnpadding">
																			<div class="form-group tg-formgroup">
																				<div class="tg-checkboxbox">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="notrobot15" name="notrobot" value="human">
																						<label for="notrobot15">I am not a robot</label>
																					</span>
																					<a class="tg-refreshcaptcha" href="#"><img src="images/icons/icon-35.jpg" alt="image description"></a>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<div class="form-group tg-formgroup">
																				<div class="tg-termscondition">
																					<span class="tg-checkbox">
																						<input type="checkbox" id="currentjob18" name="currentjob" value="I’m doing this currently.">
																						<label for="currentjob18"> I have read and agree with the <em>terms and conditions</em>.</label>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-12 tg-columnpadding">
																			<button type="submit" class="tg-btn">Register Now</button>
																		</div>
																	</div>
																</fieldset>
															</form>
															<div class="tg-registervia">
																<div class="tg-title">
																	<h2>Or Register Via</h2>
																</div>
																<ul class="tg-socialiconslarge">
																	<li class="tg-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
																	<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
																	<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
																	<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li class="tg-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
		
			
			<div class="tg-footerbar">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<span class="tg-copyright">2018 All Rights Reserved &copy; <a href="#">DrNearMe</a></span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/mapclustering/markerclusterer.min.js"></script>
	<script src="js/mapclustering/infobox.js"></script>
	<script src="js/bootstrap-timepicker.min.js"></script>
	<script src="js/customScrollbar.min.js"></script>
	<script src="js/mapclustering/map.js"></script>
	<script src="js/jquery.countdown.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/isotope.pkgd.js"></script>
	<script src="js/packery-mode.js"></script>
	<script src="js/svg-injector.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/readmore.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/loader.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
//form validation rules
$(document).ready(function(){
	 $("#rform").validate({
                rules:{
                 fname: "required",
		         lname: "required",
		         addr:"required",
				 email: {
                               required: true,
                               email:true,
				remote:{
			url: 'validemaildr.php',
			type: "POST"
       			}
                           },
				cont: {
                               required: true,
							   minlength:10,
                               number:true,
				remote:{
			url: 'validcontdr.php',
			type: "POST"
       			}
                           },	   
			password:{
                        required:true,
			    		minlength:5
                    },
					speci:"required",
					edu:"required",
					expi:"required",
					profileimg:"required",
					city_id:"required"
                },
                messages:{
				fname: "required",
		         lname: "required",
		         addr:"required",
				 email: {
                               required: "required",
                               email:"Enter valid email",
								remote:"Already Exsist"
                           },
				cont: {
                        required: "required",
						minlength:"Enter valid 10 Digit Number ",
                        number:"Enter valid Number",
						remote:"Already Exsist"
                           },	   
			password:{
                        required:"required",
			    		minlength:"Atleast enter 5 digit Password"
                    },
					speci:"required",
					edu:"required",
					expi:"required",
					profileimg:"required",
					city_id:"required"
                },
                	submitHandler: function(form) {
		    	      docter();
                }
            });
        });
</script>
<script type="text/javascript" >
  function docter(){
		alert("aaa");
	var formData = new FormData($('#rform')[0]);
    $.ajax({
        url: 'save_dr.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function(data) {
			alert(data);
		if(data == "Success")
		{ 
		
		  $('#rform')[0].reset();
			$('#sucess').text("Gallery Added successfully");
			$('.toast-top-right').show();
			$('.toast-top-right').focus();
			$('.toast-top-right').fadeOut(5000);
		}
		else
		{ 
		//alert(data);
		 $('#error').html(data);
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			$('.toast-top-center').fadeOut(5000);
			$('#rform')[0].reset();
		}
        },
        cache: false,
        contentType: false,
        processData: false
    });
	
}
   </script>
</body>
</html>