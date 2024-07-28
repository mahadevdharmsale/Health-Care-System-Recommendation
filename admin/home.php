<?php include("lock.php");?>
<!doctype html>
<html class="no-js" lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>:: ME Project ::</title>
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
						<section class="boxs boxs-simple">
                            <div class="profile-header">
                                <div class="profile_info">
                                    <div class="profile-image">
                                        <img src="assets/images/profile-photo.png" alt="">
                                    </div>
                                   <h4 class="mb-0"><strong style= " color: black;"><?php echo $userRow['ad_name']; ?></strong></h4>
                                    <span class="text-muted"><?php echo $userRow['ad_email']; ?></span>
                                    
                                   
                                </div>
                            </div>
                            
						</section>						
					</div>
					
					<div class="col-md-12"> 
						<!-- boxs -->
						<section class="boxs boxs-simple"> 
							<!-- boxs body -->
							<div class="boxs-body p-0">
								<div role="tabpanel"> 
									<!-- Nav tabs -->
									<ul class="nav nav-tabs tabs-dark-t" role="tablist">
										<li role="presentation" class="active"><a href="#mypost" aria-controls="feedTab" role="tab" data-toggle="tab">Pending Doctors</a></li>
										<li role="presentation"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">approved Doctors</a></li>
									</ul>
									
									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="mypost">
					<section class="boxs ">
						<div class="boxs-header dvd dvd-btm">
							<h1 class="custom-font"><strong>List of Pending Doctors  </strong> </h1>
							
						</div>
						<div class="boxs-body p-0">
						<div class="table-responsive">
							<table class="table ">
								<thead>
									<tr>
										<th>#</th>
										<th>Doctors Name</th>
										<th>Doctors email</th>
										<th>Doctors contact</th>
										<th>Doctors Address</th>
										<th>Doctors Education</th>
										<th>Doctors Specialty</th>
										<th>Doctors experience</th>
										<th>applied Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$aqry= $DBcon->query("select d.*,sp.sp_name from dr d, specialist sp
								WHERE d.sp_id=sp.sp_id 
								AND dr_flag='1'");
								while($row= $aqry->fetch_array())
									{ ?>
									<tr class="active">
										<td>#</td>
										<td><?php echo $row['dr_name']; ?></td>
										<td><?php echo $row['dr_email']; ?></td>
										<td><?php echo $row['dr_cont']; ?></td>
										<td><?php echo $row['dr_addr']; ?></td>
										<td><?php echo $row['dr_edu']; ?></td>
										<td><?php echo $row['sp_name']; ?></td>
										<td><?php echo $row['dr_expi']; ?></td>
										<td><?php echo date('d-m-Y',$row['dr_date']);  ?></td>
										<td><a class="btn btn-raised btn-default bg-blush btn-sm" href="approve.php?dr_id=<?php echo $row['dr_id']; ?>">approve</a></td>
									</tr>
	<?php } ?>
									
								</tbody>
							</table>
							</div>
						</div>
					</section>                                           
										</div>
                                        <div role="tabpanel" class="tab-pane" id="timeline">
											<section class="boxs ">
						<div class="boxs-header dvd dvd-btm">
							<h1 class="custom-font"><strong>List of Approved Doctors </strong> </h1>
							
						</div>
						<div class="boxs-body p-0">
						<div class="table-responsive">
							<table class="table ">
								<thead>
									<tr>
										<th>#</th>
										<th>Doctors Name</th>
										<th>Doctors email</th>
										<th>Doctors contact</th>
										<th>Doctors Address</th>
										<th>Doctors Education</th>
										<th>Doctors Specialty</th>
										<th>Doctors experience</th>
										<th>applied Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$aqry= $DBcon->query("select d.*,sp.sp_name from dr d, specialist sp
								WHERE d.sp_id=sp.sp_id 
								AND dr_flag='2'");
								while($row= $aqry->fetch_array())
									{ ?>
									<tr class="active">
										<td>#</td>
										<td><?php echo $row['dr_name']; ?></td>
										<td><?php echo $row['dr_email']; ?></td>
										<td><?php echo $row['dr_cont']; ?></td>
										<td><?php echo $row['dr_addr']; ?></td>
										<td><?php echo $row['dr_edu']; ?></td>
										<td><?php echo $row['sp_name']; ?></td>
										<td><?php echo $row['dr_expi']; ?></td>
										<td><?php echo date('d-m-Y',$row['dr_date']);  ?></td>
										<td><a class="btn btn-raised btn-default bg-blush btn-sm" href="block.php?dr_id=<?php echo $row['dr_id']; ?>">block</a></td>
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