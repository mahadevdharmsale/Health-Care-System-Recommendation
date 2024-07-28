<?php include("dr_lock.php"); 
$aqry= $DBcon->query("SELECT d.*,b.*,u.* FROM  dr d,apbook b,user u WHERE b.u_id=u.u_id AND b.dr_id=d.dr_id AND b.dr_id='$dr_id' ");
$apcnt=$aqry->num_rows;?>
<!doctype html>
<html class="no-js" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Drnearme</title>
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
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
			<script type="text/javascript" >
  function apro(abid){
	var x;
    if (confirm("Do You want To Approve appintment For This Time!") == true) {
		
		//alert(abid);
    $.ajax({
        url:'apprv.php',
        type: 'POST',
        data: {abid:abid},
        success: function(result){
			alert(result);
			if(result=='success'){
			location.reload();
			 }else{
				  $('#dr').html(result);
			 }
		}
	});
	}
}
</script>
			<script type="text/javascript" >
  function eject(abid){
	var x;
    if (confirm("Do You want To Reject appintment For This Time!") == true) {
		
		//alert(abid);
    $.ajax({
        url:'reject.php',
        type: 'POST',
        data: {abid:abid},
        success: function(result){
			//alert(result);
			if(result=='success'){
			location.reload();
			 }else{
				  $('#dr').html(result);
			 }
		}
	});
	}
}
</script>
</head>
<body class="tg-login">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Preloader Start
	*************************************--
	<div class="preloader-outer">
		<div class="pin"></div>
		<div class="pulse"></div>
	</div> 
	--************************************
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
				Main Start						
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-content" class="tg-content tg-dashboard">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pull-left">
							<div class="tg-widgetdashboard">
								<div class="tg-widgetprofile">
									<figure class="tg-directpostimg">
										<a href="#"><img style="width:200px; height:200px;" src="doctors/<?php echo $drRow['pro_pic']; ?>" alt="image description"></a>
										<figcaption>
											<a class="tg-usericon tg-iconvarified" href="#">
												<em class="tg-usericonholder">
													<i class="fa fa-shield"></i>
													<span>verified</span>
												</em>
											</a>
										</figcaption>
									</figure>
									<div class="tg-directposthead">
										<h3><a href="#">Dr. <?php echo $drRow['dr_name']; ?></a></h3>
										<div class="tg-subjects"><?php echo $drRow['dr_edu']; ?> - <?php echo $drRow['sp_name']; ?></div>
										<ul class="tg-metadata">
											<li><span class="tg-stars"><span></span></span></li>
											<li><a href="#"><i class="fa fa-thumbs-o-up"></i> 99% (1009 votes)</a></li>
										</ul>
									</div>
								</div>
								<nav id="tg-dashboardnav" class="tg-dashboardnav">
									<ul>
										<li>
											<a href="logout.php?logout=true">
												<i class="fa fa-sign-out"></i>
												<span>Logout</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
							<div class="tg-widgetdashboard">
								<div class="tg-dashboardnotification tg-pkgexpirey"><span><?php $wtp= $DBcon->query("SELECT d.*,b.*,u.* FROM  dr d,apbook b,user u WHERE b.u_id=u.u_id AND b.dr_id=d.dr_id AND b.dr_id='$dr_id' AND b.ab_flag=1 ");
echo $apc=$wtp->num_rows; ?> Patient</span>Waiting for approval</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 pull-right">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="tg-profilewidget tg-recommendation">
										<a class="tg-refresh fa fa-refresh" href="#"></a>
										<h3>Total Recommendation</h3>
										<span class="tg-profilewidgeticon">
											<img src="images/icons/icon-26.png" alt="image description">
										</span>
										<div class="tg-percentage">
											<span><?php echo $apcnt; ?></span>
											<span>Recommendation You Received</span>
										</div>
										<div class="tg-description">
											<p><strong>1009 People Voted For You!</strong> Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="tg-profilewidget tg-favourites">
										<a class="tg-refresh fa fa-refresh" href="#"></a>
										<h3>Total Added To Favourites</h3>
										<span class="tg-profilewidgeticon">
											<img src="images/icons/icon-27.png" alt="image description">
										</span>
										<div class="tg-followers">
											<span><?php $uct= $DBcon->query("SELECT * FROM  user ");
echo $ucst=$uct->num_rows; ?></span>
											<span>People Added You In Favourite List</span>
										</div>
										<div class="tg-description">
											<p><strong>1009 People Voted For You!</strong> Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
								</div>
								<div class="tg-dashboardinvoices tg-appointmentdetails">
										<div class="tg-tablescroll">
											<div class="tg-dashboardbox tg-appointmentdetailbox">
												<div class="tg-dashboardboxtitle">
													<h2>Appointments Of <span><?php echo date('M d ,D');?></span></h2>
												</div>
												<div class="tg-favoritlistingbox">
													<div class="tg-invoicestitle">
														<span>User Name</span>
														<span class="tg-titleamount">Time</span>
														<span class="tg-titleaction">Action</span>
													</div>
													<ul class="tg-invoices">
													<?php 
								
								while($row= $aqry->fetch_array())
									{ 
								$time=$row['ab_dt'];
								?>
														<li>
															<div class="tg-invoicesheading">
																<h3><?php echo $row['u_name']; ?></h3>
																<span><?php echo $row['u_cont']; ?></span>
															</div>
															<div class="tg-amout">
																<em><?php echo $row['ab_tm']; ?></em>
															</div>
															<div class="tg-btnaction">
															<?php if($row['ab_flag']==2){ 
																echo"approved";
															 }elseif($row['ab_flag']==3){ 
																echo"Rejected";
																}else{ ?>
															<a class="tg-btnview" onclick="apro('<?php echo $row['ab_id']; ?>')" href="#" data-toggle="modal" data-target="#tg-appointmentapprove"><i class="fa fa-check"></i></a>
															<a class="tg-btndelete" href="#" data-toggle="modal" onclick="eject('<?php echo $row['ab_id']; ?>')" data-target="#tg-appointmentreject"><i class="fa fa-minus"></i></a>
															<?php } ?>
															</div>
														</li>
									<?php } ?>
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
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-subscribe">
				<div class="container">
					<div class="row">
						<div class="tg-fcols">
							<div class="col-sm-3">
								<div class="tg-subscribetitle">
									<h3>Signup For Latest Updates and News</h3>
								</div>
							</div>
							<div class="col-sm-9">
								<form class="tg-formtheme tg-formsubscribe">
									<fieldset>
										<div class="form-group">
											<input type="text" name="username" class="form-control" placeholder="Your Name">
										</div>
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="Your Email">
										</div>
										<div class="form-group"><button class="tg-btn">Register Now</button></div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-quicklinks">
				<div class="container">
					<div class="row">
						<div class="tg-fcols">
							<div class="tg-fcol">
								<strong class="tg-logo">
									<a href="index.html"><img src="images/logo.png" alt="image description"></a>
								</strong>
								<ul class="tg-contactinfo">
									<li><a href="#"><i class="fa fa-location-arrow"></i><address>Consectetur aelit 2456, AC1255 Manchester, UK</address></a></li>
									<li><a href="#"><i class="fa fa-phone"></i><span>+4 423 5215 652 - 8</span></a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i><span>info@domain.com</span></a></li>
									<li><a href="#"><i class="fa fa-fax"></i><span>+4 551 5215 652</span></a></li>
								</ul>
								<ul class="tg-socialsharewithtext">
									<li class="tg-facebook">
										<a class="tg-roundicontext" href="#">
											<em class="tg-usericonholder">
												<i class="fa fa-facebook-f"></i>
												<span>share on facebook</span>
											</em>
										</a>
									</li>
									<li class="tg-twitter">
										<a class="tg-roundicontext" href="#">
											<em class="tg-usericonholder">
												<i class="fa fa-twitter"></i>
												<span>share on twitter</span>
											</em>
										</a>
									</li>
									<li class="tg-linkedin">
										<a class="tg-roundicontext" href="#">
											<em class="tg-usericonholder">
												<i class="fa fa-linkedin"></i>
												<span>share on linkdin</span>
											</em>
										</a>
									</li>
									<li class="tg-googleplus">
										<a class="tg-roundicontext" href="#">
											<em class="tg-usericonholder">
												<i class="fa fa-google-plus"></i>
												<span>share on googl+</span>
											</em>
										</a>
									</li>
									<li class="tg-rss">
										<a class="tg-roundicontext" href="#">
											<em class="tg-usericonholder">
												<i class="fa fa-rss"></i>
												<span>share on RSS</span>
											</em>
										</a>
									</li>
									<li class="tg-youtube">
										<a class="tg-roundicontext" href="#">
											<em class="tg-usericonholder">
												<i class="fa fa-youtube-play"></i>
												<span>share on YouTube</span>
											</em>
										</a>
									</li>
								</ul>
							</div>
							<div class="tg-fcol tg-specialities">
								<div class="tg-title">
									<h3>Top Specialities</h3>
								</div>
								<ul>
									<li><a href="#">Arnos Grove</a></li>
									<li><a href="#">Dalston</a></li>
									<li><a href="#">Balham</a></li>
									<li><a href="#">Denmark Hill</a></li>
									<li><a href="#">Barkingside</a></li>
									<li><a href="#">Derry Downs</a></li>
									<li><a href="#">Barnes Cray</a></li>
								</ul>
								<ul>
									<li><a href="#">East Bedfont</a></li>
									<li><a href="#">Camden Town</a></li>
									<li><a href="#">Eden Park</a></li>
									<li><a href="#">Canonbury</a></li>
									<li><a href="#">View All</a></li>
								</ul>
							</div>
							<div class="tg-fcol tg-latestlistings">
								<div class="tg-title">
									<h3>Latest Listings</h3>
								</div>
								<ul>
									<li>
										<figure class="tg-authordp">
											<img src="images/directpost/img-08.jpg" alt="image description">
										</figure>
										<div class="tg-directposthead">
											<h3><a href="#">Dr. Steve Northrop</a></h3>
											<div class="tg-subjects">MDS - Paedodontics &amp; Preventive Dentistry</div>
										</div>
									</li>
									<li>
										<figure class="tg-authordp">
											<img src="images/directpost/img-09.jpg" alt="image description">
										</figure>
										<div class="tg-directposthead">
											<h3><a href="#">Dr. Steve Northrop</a></h3>
											<div class="tg-subjects">MDS - Paedodontics &amp; Preventive Dentistry</div>
										</div>
									</li>
									<li>
										<figure class="tg-authordp">
											<img src="images/directpost/img-10.jpg" alt="image description">
										</figure>
										<div class="tg-directposthead">
											<h3><a href="#">Dr. Steve Northrop</a></h3>
											<div class="tg-subjects">MDS - Paedodontics &amp; Preventive Dentistry</div>
										</div>
									</li>
								</ul>
								<a class="tg-btnviewmore" href="javascript:void(0);">View All <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-footerbar">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<nav id="tg-footernav" class="tg-footernav">
								<ul>
									<li class="tg-active"><a href="">Home</a></li>
									<li><a href="">About</a></li>
									<li><a href="">How It Works?</a></li>
									<li><a href="">Categories</a></li>
								</ul>
							</nav>
							<span class="tg-copyright">2017 All Rights Reserved &copy; <a href="#">MedLink Direct</a></span>
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
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/mapclustering/data.json"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
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
	<script>
		jQuery(document).ready(function(event) {
			//function function_name() {
			init_monthsviewcharts('tg-viewpermonthchartone');
			init_monthsviewcharts('tg-viewpermonthcharttwo');
			init_monthsviewcharts('tg-viewpermonthchartthree');
			init_monthsviewcharts('tg-viewpermonthchartfour');
			init_monthsviewcharts('tg-viewpermonthchartfive');
			/*}
			function_name();
			jQuery('.tg-monthlyviewstabnav li').on('click', 'a', function(){
				function_name();
			});*/
		});
	</script>
</body>
</html>