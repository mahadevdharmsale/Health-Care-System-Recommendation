<?php include("dbconnect.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
  $sym=$_POST['sym'];
 $query = $DBcon->query("SELECT sp.* FROM symtoms s,specialist sp WHERE s.sp_id= sp.sp_id AND s_name LIKE '%$sym%' GROUP BY sp.sp_id");
while($row=$query->fetch_array()){ ?>
											<span  class="tg-checkbox tg-subcategorycheckbox" style="    width: 31%;
    float: left;
    padding: 10px;
    margin-right: 49px;">
												<input type="checkbox" id="dentist" name="subcategory" value="Dentist">
												<label for="dentist">
													<span onclick="filtersp('<?php echo $row['sp_id']; ?>')"><img src="images/icons/<?php echo $row['sp_icon']; ?>" alt="image description"></span>
													<span><?php echo $row['sp_name']; ?></span>
												</label>
											</span>
<?php } } ?>