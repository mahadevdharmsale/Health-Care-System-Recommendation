<?php include("u_lock.php"); ?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DRnearME  User Panel</title>
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
		<script type="text/javascript" >
  function filter(sp_id){
	  //alert(sp_id);
    $.ajax({
        url:'search.php',
        type: 'POST',
        data: {sp_id:sp_id},
        success: function(result){
			 $('#dr').html(result);
		}
    });
}
   </script>
</head>
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
					Inner Banner Start			
		*************************************-->
		
		<!--************************************
					Inner Banner End			
		*************************************-->
		<!--************************************
						Main Start				
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-twocolumns" class="tg-twocolumns">
						<div class="col-sm-12 col-xs-12">
							<div class="tg-pagehead">
								<p>25486 matches found for:  <span>Doctors lists</span></p>
							</div>
						</div>
						<div class="col-sm-4">
							<aside id="tg-sidebar" class="tg-sidebar">
								<form class="tg-themeform tg-formrefinesearch">
									<fieldset>
										<h4>Specialist Type</h4>
										<?php $splist = $DBcon->query("select * from specialist");
											while($sprow=$splist->fetch_array()){ ?>
										<span class="tg-radio">
											<a href="#" onclick="filter('<?php echo $sprow['sp_id'];?>')"><label for="instant"><?php echo $sprow['sp_name'];?></label></a>
											
										</span>
											<?php } ?>
									</fieldset>
									
									<fieldset>
										<h4>Symptoms</h4>
										<?php $splist = $DBcon->query("select * from symtoms WHERE s_flag=1 ");
											while($sprow=$splist->fetch_array()){ ?>
										<span class="tg-radio">
											<a href="#" onclick="filter('<?php echo $sprow['sp_id'];?>')"><label for="instant"><?php echo $sprow['s_name'];?></label></a>
											
										</span>
											<?php } ?>
									</fieldset>
									
								</form>
							</aside>
						</div>
						<div class="col-sm-8">
							<div id="tg-content" class="tg-content">
								<div id="dr" class="tg-directposts">
								<?php $query = $DBcon->query("select d.*,sp.sp_name from dr d, specialist sp
								WHERE d.sp_id=sp.sp_id 
								AND dr_flag=2");
while($row=$query->fetch_array()){ ?>
									<div class="tg-directpost">
										<figure class="tg-directpostimg">
											<a href="#"><img  style="width:150px; height:150pxpx;" src="doctors/<?php echo $row['pro_pic']; ?>" alt="image description"></a>
											<figcaption>
												<?php if (isset($_SESSION['userSession'])) { ?>
												<a class="tg-usericon tg-iconfeatured" href="appo.php?dr_id=<?php echo $row['dr_id']; ?>">
													<em class="tg-usericonholder">
														<i class="fa fa-bolt"></i>
														<span>Appoint</span>
													</em>
												</a>
											<?php } ?>
												<a class="tg-usericon tg-iconvarified" href="#">
													<em class="tg-usericonholder">
														<i class="fa fa-shield"></i>
														<span>verified</span>
													</em>
												</a>
											</figcaption>
										</figure>
										<div class="tg-directinfo">
											<div class="tg-directposthead">
												<h3><a href="#">Dr. <?php echo $row['dr_name']; ?></a></h3>
												<div class="tg-subjects"><?php echo $row['dr_edu']; ?> - <?php echo $row['sp_name']; ?></div>
												<ul class="tg-metadata">
													<li><i class="fa fa-phone"></i> <?php echo $row['dr_cont']; ?></li>
													<li><a href="#"><i class="fa fa-envelope  tg-like"></i>  <?php echo $row['dr_email']; ?></a></li>
													<li><a href="#"><i class="fa fa-thumbs-o-up"></i>  <?php echo $row['dr_expi']; ?> of Experience </a></li>
												</ul>
											</div>
											<div class="tg-description">
												<p>Address: <?php echo $row['dr_addr']; ?></p>
											</div>
										</div>
									</div>
<?php } ?>
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
</body>
</html>