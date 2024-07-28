<?php include("u_lock.php");
$drid=$_GET['dr_id'];?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Medlink Directory A Complete Learning Source :Appointment</title>
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
  function bookp(aptm){
	var x;
    if (confirm("Do You want To Book appintment For This Time!") == true) {
		var dr_id="<?php echo $drid; ?>";
		//alert(aptm);
    $.ajax({
        url:'addbook.php',
        type: 'POST',
        data: {aptm:aptm,dr_id:dr_id},
        success: function(result){
			//alert(result);
			if(result=='success'){
			 $('#success').show();
			 }else{
				  $('#dr').html(result);
			 }
		}
	});
	}
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
								<h1>Appointment</h1>
							</div>
						
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
			<div class="col-sm-12 col-xs-8 tg-columnpadding">
			<div class="tg-timeslothead">
			<div style="display:none;" id="success">Appointment booked Successfully</div>
									<h3>Select Best Time To See The Doctor</h3>
									
								</div>
								<div class="tg-dateandtimeslots">
									<div class="tg-datebox">
										<time datetime="2011-10-10"><?php echo date('M d ,D');?></time>
										<i class="fa fa-calendar-check-o"></i>
									</div>
									<div class="tg-timeslots">
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot1" name="firstavailableslot" value="09:00" >
											<label for="firstavailableslot1">09:00</label>
										</span>
										<span class="tg-radio">
											<input type="radio" id="firstavailableslot2" name="firstavailableslot" value="09:30"  onclick="bookp(this.value)">
											<label for="firstavailableslot2">09:30</label>
										</span>
										<span class="tg-radio">
											<input type="radio" id="firstavailableslot3" name="firstavailableslot" value="10:00"  onclick="bookp(this.value)">
											<label for="firstavailableslot3">10:00</label>
										</span>
										<span class="tg-radio">
											<input type="radio" id="firstavailableslot4" name="firstavailableslot" value="10:30"  onclick="bookp(this.value)">
											<label for="firstavailableslot4">10:30</label>
										</span>
										<span class="tg-radio">
											<input type="radio" id="firstavailableslot5" name="firstavailableslot"  onclick="bookp(this.value)" value="11:00">
											<label for="firstavailableslot5">11:00</label>
										</span>
										<span class="tg-radio">
											<input type="radio" id="firstavailableslot6" name="firstavailableslot"  onclick="bookp(this.value)" value="11:30">
											<label for="firstavailableslot6">11:30</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot7" name="firstavailableslot" value="12:00">
											<label for="firstavailableslot7">12:00</label>
										</span>
										<span class="tg-radio">
											<input type="radio" onclick="bookp(this.value)" id="firstavailableslot8" name="firstavailableslot" value="12:30">
											<label for="firstavailableslot8">12:30</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot9" name="firstavailableslot" value="01:00">
											<label for="firstavailableslot9">01:00</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot10" name="firstavailableslot" value="01:30">
											<label for="firstavailableslot10">01:30</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot11" name="firstavailableslot" value="02:00">
											<label for="firstavailableslot11">02:00</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot12" name="firstavailableslot" value="02:30">
											<label for="firstavailableslot12">02:30</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot13" name="firstavailableslot" value="03:00">
											<label for="firstavailableslot13">03:00</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot14" name="firstavailableslot" value="03:30">
											<label for="firstavailableslot14">03:30</label>
										</span>
										<span class="tg-radio">
											<input type="radio"  onclick="bookp(this.value)" id="firstavailableslot15" name="firstavailableslot" value="04:00">
											<label for="firstavailableslot15">04:00</label>
										</span>
										
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
</body>
</html>