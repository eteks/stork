
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$college_area_id = $_POST["area_id"];
		$college_name = $_POST["college_name"];
		$college_status = $_POST["college_status"];
		$qr = mysqlQuery("SELECT * FROM stork_college WHERE college_area_id='$college_area_id' AND college_name='$college_name' AND college_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> College Already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_college` SET `college_name`='$college_name',`college_status`='$college_status',`college_area_id`='$college_area_id' WHERE `college_id`=".$val);
			$successMessage = "<div class='container error_message_mandatory'><span> College Updated Successfully! </span></div>";	
		}
				
	}
	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
?>
<?php include 'includes/navbar_admin.php'; ?>
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add College Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">College Information</h4>
							<form action="edit_college.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info">
								<?php 
								$match = "SELECT * FROM `stork_college` WHERE `college_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
									?>
								<div class="form-group">
								    <label for="first-name">Area<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="area_id">
								        <option>
											<span>Select State</span>
										</option>
								        <?php
						                    $query = mysql_query("select * from stork_area where area_status='1'");
					                        while ($arearow = mysql_fetch_array($query)) {
					                        if($row['college_area_id'] == $arearow['area_id'])   
					                        	echo "<option selected value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
					                        else
					                        	echo "<option value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
					                        }
					                    ?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">College Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name" name="college_name" value="<?php echo($row['college_name']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">College Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="college_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['college_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['college_status'] == 0) echo "selected"; ?>>InActive</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Save</button>
								</div>
							<?php 
							} 
							}
							?>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 