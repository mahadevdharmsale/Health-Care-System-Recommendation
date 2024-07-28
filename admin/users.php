<?php include("lock.php");?>
<!doctype html>
<html class="no-js" lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>:: Drnearme ::</title>
<link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/vendor/animsition.min.css">
<link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/js/vendor/chosen/chosen.css">
<link rel="stylesheet" href="assets/css/main.css">
</head>
<body id="oakleaf" class="main_Wrapper">

<!--Application Content -->
<div id="wrap" class="animsition"> 
	
	<?php require_once("header.php"); ?>
	
	<!--CONTENT  -->
	<section id="content">
		<div class="page profile-page">
					
			<!-- page content -->
			<div class="pagecontent"> 
				
				<!-- row -->
				<div class="row">
					<div class="col-md-12"> 
						<!-- boxs -->
						<section class="boxs boxs-simple"> 
							<!-- boxs body -->
							<div class="boxs-body p-0">
								<div role="tabpanel"> 
									<!-- Nav tabs -->
									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="mypost">
					<section class="boxs ">
						<div class="boxs-header dvd dvd-btm">
							<h1 class="custom-font"><strong>List of Users  </strong> </h1>
							
						</div>
						<div class="boxs-body p-0">
						<div class="table-responsive">
							<table class="table ">
								<thead>
									<tr>
										<th>#</th>
										<th>User Name</th>
										<th>User email</th>
										<th>User contact</th>
										<th>User Address</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$aqry= $DBcon->query("SELECT * FROM  user WHERE  u_flag =1");
								while($row=$aqry->fetch_array())
									{ ?>
									<tr class="active">
										<td>#</td>
										<td><?php echo $row['u_name']; ?></td>
										<td><?php echo $row['u_email']; ?></td>
										<td><?php echo $row['u_cont']; ?></td>
										<td><?php echo $row['u_addr']; ?></td>
									</tr>
	<?php } ?>
									
								</tbody>
							</table>
							</div>
						</div>
					</section>                                           
										</div>
									</div>
								</div>
							</div>
							<!-- /boxs body --> 
						</section>
						<!-- /boxs --> 
					</div>
					<!-- /col --> 					
				</div>
				<!-- /row --> 
			</div>
			<!-- /page content --> 
		</div>
	</section>
	<!--/ CONTENT --> 
</div>
<!--/ Application Content --> 

<!-- Vendor JavaScripts  -->
<script src="assets/bundles/libscripts.bundle.js"></script>

<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script> 
<script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script> 
<!--/ vendor javascripts --> 

<!--  Custom JavaScripts  --> 
<script src="assets/js/main.js"></script> 
<!--/ custom javascripts --> 
</body>
</html>