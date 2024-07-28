<?php include("dbconnect.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
  $sp_id=$_POST['sp_id'];
 $query = $DBcon->query("select d.*,sp.sp_name from dr d, specialist sp
								WHERE d.sp_id=sp.sp_id 
								AND d.sp_id='$sp_id'
								AND d.dr_flag='2'");
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
<?php } } ?>