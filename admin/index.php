<?php
session_start();
require_once('dbconnect.php');
if (isset($_SESSION['adminSession'])!="") {
	header("Location: home.php");
	exit;
}
if (isset($_POST['btn-login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $DBcon->query("SELECT * FROM admin WHERE ad_email='$username' OR ad_cont='$username'");
	$row=$query->fetch_array();
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['ad_pass']) && $count==1) {
		$_SESSION['adminSession']=$row['ad_id'];
		header("Location: home.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
<meta charset="utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>:: SMC - Admin ::</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<!-- CSS Files -->
<link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="signup-page">
<div class="wrapper">
  <div class="header header-filter" style="background-image: url('assets/images/login-bg.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
          <div class="card card-signup">
            <form class="form" method="POST" >
              <div class="header header-primary text-center">
                <h4>Admin Sign in</h4>
                <div class="social-line"> <img src="assets/images/logo.png" alt="Smiley face" >  </div>
              </div>
              <h3 class="mt-0"></h3>
              <p class="help-block"></p>
              <div class="content">
                <div class="form-group">
                  <input type="text" id="username" name="username" class="form-control underline-input" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                  <input type="password" id="password " name="password" placeholder="Password..." class="form-control underline-input">
                </div>
              </div>
              <div class="footer text-center">
              	<input type="submit" class="btn btn-primary btn-raised" name="btn-login" value="Login"> 
              </div>
             
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
      </div>
    </footer>
  </div>
</div>
</body>
<!--  Vendor JavaScripts --> 
<script src="assets/bundles/libscripts.bundle.js"></script>

<!--  Custom JavaScripts  --> 
<script src="assets/js/main.js"></script> 
<!--/ custom javascripts --> 
</html>
