
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Cabin Schedule Time</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$cabin_cost_timing_type = $_POST["cabin_cost_timing_type"];
		$cabin_cost_duration_hour = $_POST["cabin_cost_duration_hour"];
		$cabin_cost_duration_minutes = $_POST["cabin_cost_duration_minutes"];
		$cabin_cost_duration = $cabin_cost_duration_hour.":".$cabin_cost_duration_minutes.":00";
		$cabin_cost_amount = $_POST["cabin_cost_amount"];
		$cabin_cost_status = $_POST["cabin_cost_status"];
		$qr = mysql_query("SELECT * FROM stork_cabin_cost_estimation WHERE cabin_cost_estimation_timing_type = '$cabin_cost_timing_type' AND cabin_cost_estimation_duration ='$cabin_cost_duration'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Already exists </span></div>";
		} else {
			mysqlQuery("UPDATE stork_cabin_cost_estimation SET cabin_cost_estimation_timing_type='$cabin_cost_timing_type',cabin_cost_estimation_duration='$cabin_cost_duration',cabin_cost_estimation_amount=$cabin_cost_amount,cabin_cost_estimation_status='$cabin_cost_status' WHERE cabin_cost_estimation_id=".$val);
			// //newly added code when remove edit restrict
			// if(($state_status == 0 && !$_POST['change_status'])||($state_status == 1 && $_POST['change_status'])){
			// 	mysqlQuery("UPDATE `stork_city` SET `city_status`='$state_status' WHERE `city_state_id`=".$val);
			// 	mysqlQuery("UPDATE `stork_area` SET `area_status`='$state_status' WHERE `area_state_id`=".$val);
			// }
			$successMessage = "<div class='container error_message_mandatory'><span> Cost Updated Successfully! </span></div>";	
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
						<span> Cabin Cost Estimation </span>
					</li>
					<li>
						<span>Edit Cabin Cost Estimation</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Cabin Cost Estimation Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cabin Cost Estimation Information</h4>
							<form action="edit_cabin_cost_estimation.php?update=<?php echo $id; ?>" id="edit_cabin_cost_estimation" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<?php
									$match = "SELECT * FROM `stork_cabin_cost_estimation` WHERE `cabin_cost_estimation_id`='$id'";
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
									<select class="product-type-filter form-control" id="sel_a" name="cabin_cost_timing_type">
								        <option>
											<span>Select Timing Type</span>
										</option>
								        <?php
											foreach ($timing_type as $key => $value) {
												if ($key == $row['cabin_cost_estimation_timing_type'])
													echo "<option selected value=".$key.">". $value."</option>";
												else
													echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>   
								    </select>
								</div>
								<div class="form-group duration_block">
								    <label for="last-name">Duration<span class="required">*</span></label>
									<!-- <input type="text" class="form-control timepicker" autocomplete="off" placeholder="Duration" name="schedule_time_start"> -->
									<select class="product-type-filter form-control" id="sel_b" name="cabin_cost_duration_hour">
								        <option value="">
											<span>Select Hours</span>
										</option>
										<?php
										$cost_duration = explode(':',$row['cabin_cost_estimation_duration']);
									       for ($i=1; $i<=12; $i++){
									       	if($i == $cost_duration[0])
									         	echo "<option value='".$i."' selected>" . $i ."</option>";
									        else
									        	echo "<option value='".$i."'>" . $i ."</option>";
									       }
									    ?>
								    </select>
								    <select class="product-type-filter form-control" id="sel_c" name="cabin_cost_duration_minutes">
								        <option value="">
											<span>Select Minutes</span>
										</option>
								       <?php
								       	   echo "minute time".explode(':',$row['cabin_cost_estimation_duration'][1]);
									       for ($i=1; $i<=60; $i++){
									       	if($i == $cost_duration[1])
									         	echo "<option value='".$i."' selected>" . $i ."</option>";
									        else
									        	echo "<option value='".$i."'>" . $i ."</option>";
									       }
									    ?>
								    </select>
								    <div class="clear_both"></div>
								</div>
								<div class="form-group">
								    <label for="last-name">Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" maxlength="10" autocomplete="off" placeholder="Amount" name="cabin_cost_amount" value="<?php echo($row['cabin_cost_estimation_amount']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Status<span class="required">*</span></label>
									<select class="product-type-filter form-control change_status" id="sel_d" name="cabin_cost_status">
								        <option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['cabin_cost_estimation_status'] == 1) echo "selected"; ?>>
											<span>Active</span>
										</option>
										<option value="0" <?php if ($row['cabin_cost_estimation_status'] == 0) echo "selected"; ?>>
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