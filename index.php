<?php include("dbconnect.php"); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>heart care : Index</title>
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
  function filter(){
	  var sym = $("#sym").val();
	  //alert(sym);
    $.ajax({
        url:'search.php',
        type: 'POST',
        data: {sym:sym},
        success: function(result){
			//alert(result);
			 $('#doctorscategory').html(result);
		}
    });
}
   </script>
   		<script type="text/javascript" >
  function filtersp(sp_id){
	  //alert(sp_id);
    $.ajax({
        url:'searchsp.php',
        type: 'POST',
        data: {sp_id:sp_id},
        success: function(result){
			//alert(result);
			 $('#drsp').html(result);
		}
    });
}
   </script>
   <script type="text/javascript" >
  function filteradd(){
	  var addr = $("#addr").val();
	  //alert(q);
    $.ajax({
        url:'searchadd.php',
        type: 'POST',
        data: {addr:addr},
        success: function(result){
			 $('#drsp').html(result);
		}
	});
}
   </script>

</head>
<body class="tg-home tg-login">
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
		<div id="tg-homebanner" class="tg-homebanner tg-haslayout">
			<figure class="tg-bannerbg">
				<img src="images/banner/img-01.jpg" alt="image description">
			</figure>
			<div class="tg-bannercontent">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<form class="tg-formtheme tg-formsearch" id="" name="" >
								<div class="tg-sectionhead">
									<div class="tg-sectiontitle">
										<h1>Find a Medical Help!</h1>
										<img class="tg-svginject" src="images/sectionline.svg" alt="image description">
									</div>
								</div>
								<fieldset>
									<div class="tg-select">
									
									<input list="Refrences"  name="sym" id="sym" value="" onchange="filter(this.value)" onkeypress="filter(this.value)" style="float: left;
    border: 0;
    height: 30px;
    line-height: 30px;
    padding: 0 0px 0 11px;
	inline-size: 762px;" placeholder="Enter Symtoms">
									
											 <datalist id="Refrences">
											<?php $sql=$DBcon->query("SELECT * FROM  symtoms");
										while($row=$sql->fetch_array()){
										?>
												<option value="<?php echo $row['s_name']; ?>"> </option>
										<?php } ?>
										</datalist>
									</div>
									<!--<input type="text" onkeyup="filteradd()" id="addr" name="addr" class="form-control" placeholder="Search by location, Landmark, Pincode, city">-->
									<button type="submit" class="tg-btnformsearch"><i class="fa fa-search"></i></button>
								</fieldset>
								<div class="tg-searchbulder">
									
									<div id="tg-subcategories" class="tg-subcategories">
										<div id="doctorscategory" class="tg-tabcontent tg-active">
										
										<?php $sql=$DBcon->query("SELECT * FROM specialist");
										while($row=$sql->fetch_array()){
										?>
											<span  class="tg-checkbox tg-subcategorycheckbox" >
												<input type="checkbox" id="dentist" name="subcategory" value="Dentist">
												<label for="dentist">
													<span onclick="filtersp('<?php echo $row['sp_id']; ?>')"><img src="images/icons/<?php echo $row['sp_icon']; ?>" alt="image description"></span>
													<span><?php echo $row['sp_name']; ?></span>
												</label>
											</span>
										<?php } ?>
										</div>
									</div>
								</div>
							</form>
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
		<!--************************************
					Featured DiretPost Start		
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="tg-sectionhead">
								<div class="tg-sectiontitle">
									<h2>Specialist Doctors</h2>
									<img class="tg-svginject" src="images/sectionline.svg" alt="image description">
								</div>
							</div>
							<div id="filter-masonry" class="tg-featureddirectposts tg-searchresult tg-filtermasonry">
							<div id="drsp">
								<?php $query = $DBcon->query("select d.*,sp.sp_name from dr d, specialist sp
								WHERE d.sp_id=sp.sp_id 
								AND dr_flag=2");
while($row=$query->fetch_array()){ ?>
									<div class="tg-directpost">
										<figure class="tg-directpostimg">
											<a href="#"><img  style="width:150px; height:150px;" src="doctors/<?php echo $row['pro_pic']; ?>" alt="image description"></a>
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
														<span>Verified</span>
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
			</section>
			<!--************************************
					Features Start
			*************************************-->
			<section class="tg-main-section tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="tg-sectionhead">
								<div class="tg-sectiontitle">
									<h2>A Complete Medical Portal</h2>
									<img class="tg-svginject" src="images/sectionline.svg" alt="image description">
								</div>
							</div>
						</div>
						<div class="tg-features">
							<div class="col-sm-4 col-xs-12">
								<div class="tg-feature">
									<figure class="tg-featureicon"><img src="images/icons/icon-02.png" alt="image description"></figure>
									<h3><a href="#">Find Medical Help</a></h3>
									<div class="tg-description">
										<p>Consectetur adipisicing elit eiusmod tempor incididunt ut labore dolore magna aliqua minim veniam quis nostrud exercitation ullamco laboris.</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="tg-feature">
									<figure class="tg-featureicon"><img src="images/icons/icon-03.png" alt="image description"></figure>
									<h3><a href="#">Make Appointment</a></h3>
									<div class="tg-description">
										<p>Consectetur adipisicing elit eiusmod tempor incididunt ut labore dolore magna aliqua minim veniam quis nostrud exercitation ullamco laboris.</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="tg-feature">
									<figure class="tg-featureicon"><img src="images/icons/icon-04.png" alt="image description"></figure>
									<h3><a href="#">Get Facilitate</a></h3>
									<div class="tg-description">
										<p>Consectetur adipisicing elit eiusmod tempor incididunt ut labore dolore magna aliqua minim veniam quis nostrud exercitation ullamco laboris.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Features End					
			*************************************-->
			<!--************************************
					Statistics Start				
			*************************************-->
			<section class="tg-main-section tg-haslayout tg-parallaximg tg-imgoverlap" data-bleed="-17" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-02.jpg">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<div class="tg-statisticscounters">
								<div class="row">
									<div class="tg-counter">
										<figure><img src="images/icons/icon-05.png" alt="image description"></figure>
										<h2><span data-from="0" data-to="322" data-speed="8000" data-refresh-interval="50">322</span></h2>
										<h3>Happy Customers</h3>
									</div>
									<div class="tg-counter">
										<figure><img src="images/icons/icon-06.png" alt="image description"></figure>
										<h2><span data-from="0" data-to="34" data-speed="8000" data-refresh-interval="50">34</span></h2>
										<h3>Active Members</h3>
									</div>
									<div class="tg-counter">
										<figure><img src="images/icons/icon-07.png" alt="image description"></figure>
										<h2><span data-from="0" data-to="212" data-speed="8000" data-refresh-interval="50">212</span></h2>
										<h3>New Members</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 hidden-xs">
							<figure class="tg-sectionimg"><img src="images/img-04.png" alt="image description"></figure>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Statistics End					
			*************************************-->
			<!--************************************
					Register Start			
			*************************************-->
			<!--************************************
					News Start						
			*************************************-->
			
			<!--************************************
					News & Trusted End				
			*************************************-->
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
							<span class="tg-copyright" All Rights Reserved &copy; <a href="#">DrNearMe</a></span>
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
	<!--************************************
				Light Box Start				
	*************************************-->
	
	<!--************************************
				Light Box End				
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
</body>
</html>