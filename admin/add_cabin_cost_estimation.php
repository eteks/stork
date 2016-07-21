<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Cabin Schedule</title>
</head>
<body> 
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$cabin_cost_timing_type = $_POST["cabin_cost_timing_type"];
		$cabin_cost_duration_hour = $_POST["cabin_cost_duration_hour"];
		$cabin_cost_duration_minutes = $_POST["cabin_cost_duration_minutes"];
		$cabin_cost_duration = $cabin_cost_duration_hour.":".$cabin_cost_duration_minutes.":00";
		$cabin_cost_amount = $_POST["cabin_cost_amount"];
		$cabin_cost_status = $_POST["cabin_cost_status"];
		if($cabin_cost_timing_type=="" || $cabin_cost_duration=="" || cabin_cost_amount == "" || $cabin_cost_status=="") {
			$successMessage ="<div class='container error_message_mandatory'><span>Please fill all required(*) fields </span></div>";
		}	
		else{
			$qr = mysql_query("SELECT * FROM stork_cabin_cost_estimation WHERE cabin_cost_estimation_timing_type = '$cabin_cost_timing_type' AND cabin_cost_estimation_duration ='$cabin_cost_duration'");
			$row = mysql_num_rows($qr);
			if($row > 0){
			$successMessage =  "<div class='container error_message_mandatory'><span> Already exists</span></div>";
			} else {
				mysqlQuery("INSERT INTO `stork_cabin_cost_estimation` (cabin_cost_estimation_timing_type,cabin_cost_estimation_duration,cabin_cost_estimation_amount,cabin_cost_estimation_status) VALUES ('$cabin_cost_timing_type','$cabin_cost_duration','$cabin_cost_amount','$cabin_cost_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Cost Inserted Successfully! </span></div>";
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
						<span> Cabin Cost Estimation </span>
					</li>
					<li>
						<span>Add Cabin Cost Estimation</span>
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
						<h3 class="acc-title lg">Add Cabin Cost Estimation Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cabin Cost Estimation </h4>
							<form action="add_cabin_cost_estimation.php" id="add_cabin_cost_estimation" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
									<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="first-name">Timing Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="cabin_cost_timing_type">
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
								<div class="form-group duration_block">
								    <label for="last-name">Duration<span class="required">*</span></label>
									<!-- <input type="text" class="form-control timepicker" autocomplete="off" placeholder="Duration" name="schedule_time_start"> -->
									<select class="product-type-filter form-control" id="sel_b" name="cabin_cost_duration_hour">
								        <option value="">
											<span>Select Hours</span>
										</option>
										<?php
									       for ($i=1; $i<=12; $i++){
									         echo "<option value='".$i."'>" . $i ."</option>";
									       }
									    ?>
								        
								    </select>
								    <select class="product-type-filter form-control" id="sel_c" name="cabin_cost_duration_minutes">
								        <option value="">
											<span>Select Minutes</span>
										</option>
								        <?php
									       for ($i=1; $i<=60; $i++){
									         echo "<option value='".$i."'>" . $i ."</option>";
									       }
									    ?>
								    </select>
								    <div class="clear_both"></div>
								</div>
								<div class="form-group">
								    <label for="last-name">Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" autocomplete="off" placeholder="Amount" name="cabin_cost_amount">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name"> Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_d" name="cabin_cost_status">
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