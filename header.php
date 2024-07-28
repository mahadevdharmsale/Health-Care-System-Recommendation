<header id="tg-header" class="tg-header tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<span class="tg-quickadvice">Get a Quick Advice: <strong>9065254381</strong></span>
							<ul class="tg-contactinfo">
								<li><a href="#">info@heartcare.com</a></li>
								<li><address> Solapur</address></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<strong class="tg-logo">
							<a href="index.php"><img src="images/logo.png" alt="image description"></a>
						</strong>
						<div class="tg-navigationarea">
							
							<div class="tg-admin">
								<a class="tg-btn" href="#">Become A Member</a>
								<?php if(isset($_SESSION['drSession'])){  ?>
								<div class="tg-user">
									<div class="tg-dropdown">
										<figure class="tg-adminpic">
											<span class="tg-dashboardbadge">3</span>
											<a href="dashboard.php"><img src="images/icons/icon-41.png" alt="image description"></a>
										</figure>
										<a href="javascript:void(0);" class="tg-usermenu tg-btndropdown">
											<em>Welcome, Doctor !</em>
										</a>
										<div class="dropdown-menu tg-dropdownbox tg-usermenu">
											<ul>
												
												<li>
													<a href="logout.php?logout=true">
														<i class="fa fa-sign-out"></i>
														<span>Logout</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php }elseif(isset($_SESSION['userSession'])){ ?>
								<div class="tg-user">
									<div class="tg-dropdown">
										<figure class="tg-adminpic">
											
											<a href="dashboard.php"><img src="images/icons/icon-41.png" alt="image description"></a>
										</figure>
										<a href="javascript:void(0);" class="tg-usermenu tg-btndropdown">
											<em>Welcome, User !</em>
										</a>
										<div class="dropdown-menu tg-dropdownbox tg-usermenu">
											<ul>
												
												<li>
													<a href="logout.php?logout=true">
														<i class="fa fa-sign-out"></i>
														<span>Logout</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php }else { ?>
								<div class="tg-user">
									<div class="tg-dropdown">
										<a href="signup.php" class="tg-usermenu tg-btndropdown">
											<em>Login Here</em>
										</a>
										
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>