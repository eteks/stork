
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Cabin System Details</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$system_timing_type = $_POST["timing_type"];
		$no_of_system = $_POST["no_of_system"];
		$system_status = $_POST["system_status"];
		$qr = mysqlQuery("SELECT * FROM stork_cabin_total_number_of_system WHERE total_number_of_system_timing_type='$system_timing_type' AND total_number_of_system_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Already No. Of system entered for this timing type </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_cabin_total_number_of_system` SET `total_number_of_system_timing_type`='$system_timing_type',`total_number_of_system`='$no_of_system',`total_number_of_system_status`='$system_status' WHERE `total_number_of_system_id`=".$val);
			// //newly added code when remove edit restrict
			// if(($state_status == 0 && !$_POST['change_status'])||($state_status == 1 && $_POST['change_status'])){
			// 	mysqlQuery("UPDATE `stork_city` SET `city_status`='$state_status' WHERE `city_state_id`=".$val);
			// 	mysqlQuery("UPDATE `stork_area` SET `area_status`='$state_status' WHERE `area_state_id`=".$val);
			// }
			$successMessage = "<div class='container error_message_mandatory'><span> System Details Updated Successfully! </span></div>";	
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
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 hidden-xs dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="breadcrumb-w col-sm-9">
				<span class="">You are here:</span>
				<ul class="breadcrumb">
					<li>
						<span> Cabin System Details </span>
					</li>
					<li>
						<span>Edit Cabin System Details</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Cabin System Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cabin System Information</h4>
							<form action="edit_cabin_system_details.php?update=<?php echo $id; ?>" id="edit_cabin_system_details" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<?php
									$match = "SELECT * FROM `stork_cabin_total_number_of_system` WHERE `total_number_of_system_id`='$id'";
									$qry = mysqlQuery($match);
									$numRows = mysql_num_rows($qry); 
									if ($numRows > 0)
									{
										while($row = mysql_fetch_array($qry)) 
										{
								?>	
								<?php 
								/*if ($row['state_status'] == 0){ */?>
								<!-- <input type="hidden" name="change_status" class="change_status_value"> -->
								<?php //} ?>
								<div class="cate-filter-content">	
								    <label for="first-name">Timing Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="timing_type">
								        <option>
											<span>Select Timing Type</span>
										</option>
								        <?php
											foreach ($timing_type as $key => $value) {
												if ($key == $row['total_number_of_system_timing_type'])
													echo "<option selected value=".$key.">". $value."</option>";
												else
													echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>   
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">No. of System<span class="required">*</span></label>
									<input type="text" class="form-control" id="noofsystem" placeholder="No. of System" name="no_of_system" value="<?php echo($row['total_number_of_system']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Status<span class="required">*</span></label>
									<select class="product-type-filter form-control change_status" id="sel_b" name="system_status">
								        <option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['total_number_of_system_status'] == 1) echo "selected"; ?>>
											<span>Active</span>
										</option>
										<option value="0" <?php if ($row['total_number_of_system_status'] == 0) echo "selected"; ?>>
											<span>Inactive</span>
										</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
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