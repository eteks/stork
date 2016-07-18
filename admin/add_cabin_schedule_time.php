<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Cabin Schedule</title>
</head>
<body> 
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$system_timing_type = $_POST["timing_type"];
		$schedule_time_start = $_POST["schedule_time_start"];
		$schedule_time_end = $_POST["schedule_time_end"];
		$schedule_time_status = $_POST["schedule_time_status"];
		if($system_timing_type=="" || $schedule_time_start=="" || $schedule_time_end=="" || $schedule_time_status == "") {
			$successMessage ="<div class='container error_message_mandatory'><span>Please fill all required(*) fields </span></div>";
		}	
		else{
			$qr = mysql_query("SELECT * FROM stork_cabin_schedule_time WHERE schedule_time_timing_type = '$system_timing_type' AND replace(schedule_time_start,' ','') ='".str_replace(" ", "", $schedule_time_start)."' AND replace(schedule_time_end,' ','') ='".str_replace(" ", "", $schedule_time_end)."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
			$successMessage =  "<div class='container error_message_mandatory'><span> Schedule Already exists</span></div>";
			} else {
				mysqlQuery("INSERT INTO `stork_cabin_schedule_time` (schedule_time_timing_type,schedule_time_start,schedule_time_end,schedule_time_status) VALUES ('$system_timing_type','$schedule_time_start','$schedule_time_end','$schedule_time_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Schedule  Inserted Successfully! </span></div>";
			}		
		}
	} ?> 
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
						<span> Cabin Schedule </span>
					</li>
					<li>
						<span>Add Cabin Schedule</span>
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
						<h3 class="acc-title lg">Add Cabin Schedule Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cabin Schedule Information</h4>
							<form action="add_cabin_schedule_time.php" id="add_cabin_schedule_time" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
									<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="first-name">Timing Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="timing_type">
								        <option value="">
											<span>Select Timing Type</span>
										</option>
										<?php
											foreach ($timing_type as $key => $value) {
												echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>   
								    </select>
								</div>
								<div class="form-group schedule_block">
								    <label for="last-name">Schedule Time<span class="required">*</span></label>
									<input type="text" class="form-control timepicker" id="starttime" autocomplete="off" placeholder="Start time" name="schedule_time_start">
									<input type="text" class="form-control timepicker" id="endtime" autocomplete="off" placeholder="End time" name="schedule_time_end">
									<div class="clear_both"></div>
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name"> Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="schedule_time_status">
								        <option value="">
											<span>Select Status</span>
										</option>
								        <option value="1">
											<span>Active</span>
										</option>
										<option value="0">
											<span>Inactive</span>
										</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Save</button>
								</div>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 