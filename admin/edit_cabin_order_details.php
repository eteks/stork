
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Cabin Order Details</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);

		$order_customer_name = $_POST["order_customer_name"];
		$order_shipping_line1 = $_POST["order_shipping_line1"];
		$order_shipping_line2 = $_POST["order_shipping_line2"];
		
		$order_shipping_state = $_POST["order_shipping_state"];
		$state = mysql_fetch_array(mysql_query("SELECT * FROM stork_state WHERE state_id = '$order_shipping_state'"));
		$order_shipping_state = $state['state_name'];
		
		$order_shipping_city = $_POST["order_shipping_city"];
		$city = mysql_fetch_array(mysql_query("SELECT * FROM stork_city WHERE city_id = '$order_shipping_city'"));
		$order_shipping_city = $city['city_name'];

		$order_shipping_area = $_POST["order_shipping_area"];
		$area = mysql_fetch_array(mysql_query("SELECT * FROM stork_area WHERE area_id = '$order_shipping_area'"));
		$order_shipping_area = $area['area_name'];

		$order_shipping_email = $_POST["order_shipping_email"];
		$order_shipping_mobile = $_POST["order_shipping_mobile"];
		$order_total_items = $_POST["order_total_items"];
		$order_status = $_POST["order_status"];

		if(isset($_POST['student_details'])){
			$order_student = $_POST["order_student"];
			$order_student_year = $_POST["order_student_year"];
			$order_shipping_department = $_POST["order_shipping_department"];
			$order_shipping_college = $_POST["order_shipping_college"];
			$college = mysql_fetch_array(mysql_query("SELECT * FROM stork_college WHERE college_id = '$order_shipping_college'"));
			$order_shipping_college = $college['college_name'];
		}
		else{
			$order_student = NULL;
			$order_student_year = '';
			$order_shipping_department = '';
			$order_shipping_college = NULL;
		}

		mysqlQuery("UPDATE stork_order SET order_customer_name='$order_customer_name',order_student_id='$order_student',order_student_year='$order_student_year',order_shipping_department='$order_shipping_department',order_shipping_college='$order_shipping_college',order_shipping_line1='$order_shipping_line1',order_shipping_line2='$order_shipping_line2',order_shipping_state='$order_shipping_state',order_shipping_city='$order_shipping_city',order_shipping_area='$order_shipping_area',order_shipping_email='$order_shipping_email',order_shipping_mobile='$order_shipping_mobile',order_total_items='$order_total_items',order_status='$order_status' WHERE order_id=".$val);	
		$successMessage = "<div class='container error_message_mandatory'><span> Order Updated Successfully! </span></div>";	
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
						<a href="/">Cabin Order Details</a>
					</li>
					<li>
						<span>Edit Cabin Order Details</span>
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
						<h3 class="acc-title lg">Edit Cabin Order Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cabin Order Information</h4>
							<form action="edit_cabin_order_details.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_cabin_order_details">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span> 									
								</div>
								<div class="container">
 									<span class="error_email"> Please Enter Valid email address </span>
								</div>
								<div class="container">
 									<span class="error_phone"> Please Enter Valid mobile number </span>
								</div>
								<div class="container">
 									<span class="error_time"> End time must be greater than Start time </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_cabin_order` WHERE `cabin_order_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
									$qryschedule = mysqlQuery("SELECT * FROM `stork_cabin_schedule_time` WHERE `schedule_time_id`=".$row['cabin_order_schedule_time_id']);
									$rowschedule = mysql_fetch_array($qryschedule);
							?>
								<div class="form-group">
								    <label for="last-name">Customer Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="customername" autocomplete="off" placeholder="Customer Name" name="cabin_order_user_name" value="<?php echo($row['cabin_order_user_name']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="email" autocomplete="off" placeholder="Email" name="cabin_order_email" value="<?php echo($row['cabin_order_email']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="phone" autocomplete="off" maxlength="10" placeholder="Mobile" name="cabin_order_mobile" value="<?php echo($row['cabin_order_mobile']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Timing Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="cabin_order_timing_type">
								        <option>
											<span>Select Timing Type</span>
										</option>
								        <?php
											foreach ($timing_type as $key => $value) {
												if ($key == $row['cabin_order_timing_type'])
													echo "<option selected value=".$key.">". $value."</option>";
												else
													echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>   
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Booked Date<span class="required">*</span></label>
									<input type="text" class="form-control" id="dob" autocomplete="off" placeholder="Cabin Booked Date" name="cabin_order_required_date" value="<?php $requireddate=strtotime($row['cabin_order_required_date']); $requireddate = date('d/m/Y', $requireddate); echo $requireddate; ?>">
								</div>
								<div class="form-group schedule_block">
								    <label for="last-name">Booked Time<span class="required">*</span></label>
									<input type="text" class="form-control timepicker" id="schedule_time_start" autocomplete="off" placeholder="Start time" name="schedule_time_start" value="<?php echo($rowschedule['schedule_time_start']); ?>">
									<input type="text" class="form-control timepicker" id="schedule_time_end" autocomplete="off" placeholder="End time" name="schedule_time_end" value="<?php echo($rowschedule['schedule_time_end']); ?>">
									<div class="clear_both"></div>
								</div>
								<div class="form-group">
								    <label for="last-name">No. Of System Booked<span class="required">*</span></label>
									<input type="text" class="form-control system_booked_act" id="noofsystem_booked" autocomplete="off" placeholder="No. Of System Booked" name="cabin_order_number_of_system" value="<?php echo($row['cabin_order_number_of_system']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Total Hours Booked<span class="required">*</span></label>
									<input type="text" class="form-control" id="totalhours_booked" autocomplete="off" placeholder="No. Of System Booked" name="cabin_order_number_of_system" value="<?php echo($row['cabin_order_number_of_system']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" autocomplete="off" placeholder="Amount" name="cabin_order_total_amount" value="<?php echo($row['cabin_order_total_amount']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Order status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="cabin_order_status">
								        <option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['cabin_order_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['cabin_order_status'] == 0) echo "selected"; ?>>InActive</option>
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