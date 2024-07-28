<!--  HEADER Content -->
	<section id="header">
		<header class="clearfix"> 
			<!-- Branding -->
			<div class="branding"> <a class="brand" href="index.php"><span style="padding-left: 24px;
    line-height: 81px; font-size: 18px;
    ">Health Care</span></a> <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a> </div>
			<!-- Branding end --> 
			
			<!-- Left-side navigation -->
			<ul class="nav-left pull-left list-unstyled list-inline">
				<li class="leftmenu-collapse"><a role="button" tabindex="0" class="collapse-leftmenu"><i class="fa fa-arrow-circle-o-left"></i></a></li>
			</ul>
			<!-- Left-side navigation end --> 
			
			<!-- Search -->
			
			<!-- Search end --> 
			
			<!-- Right-side navigation -->
			<ul class="nav-right pull-right list-inline">
				<li class="dropdown nav-profile"> <a href class="dropdown-toggle" data-toggle="dropdown"> <img src="assets/images/dr.jpg" alt="" class="0 size-30x30"></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<div class="user-info">
								<div class="user-name"><?php echo $userRow['ad_name']; ?></div>
								<div class="user-position online">Available</div>
							</div>
						</li>
						<li><a href="logout.php?logout=true" role="button" tabindex="0"><i class="fa fa-sign-out"></i>Logout</a></li>
					</ul>
				</li>
				
			</ul>
			<!-- Right-side navigation end --> 
		</header>
	</section>
	<!--/ HEADER Content  --> 
	
	<!--  CONTROLS Content  -->
	<div id="controls"> 
		<!--SIDEBAR Content -->
		<aside id="leftmenu">
			<div id="leftmenu-wrap">
				<div class="panel-group slim-scroll" role="tablist">
					<div class="panel panel-default">						
						<div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
							<div class="panel-body"> 
								<!--  NAVIGATION Content -->
								<ul id="navigation">
									<li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
									<li><a href="add_speci.php"><i class="fa fa-dashboard"></i> <span>Add Disease</span></a></li>
									<li><a href="symptoms.php"><i class="fa fa-dashboard"></i> <span>Add Symptoms</span></a></li>
									<li><a href="users.php"><i class="fa fa-dashboard"></i> <span>View Users</span></a></li>
									<li><a href="apresult.php"><i class="fa fa-dashboard"></i> <span>View Appointments</span></a></li>
								</ul>
								<!--/ NAVIGATION Content --> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</aside>
		<!--/ SIDEBAR Content --> 
		
	
		<!--/ RIGHTBAR Content --> 
	</div>
	<!--/ CONTROLS Content --> 