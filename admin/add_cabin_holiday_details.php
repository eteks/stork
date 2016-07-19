<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Cabin Holiday Details</title>
</head>
<body>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		
		$holiday_day = $_POST["holiday_day"];
		$holiday_date = explode('/',$_POST["holiday_date"]);
		$holiday_date = $holiday_date[2].'-'.$holiday_date[1].'-'.$holiday_date[0];
		$holiday_status = $_POST["holiday_status"];
		if($holiday_day=="" && $holiday_date=="" && $holiday_status=="") {
			$successMessage =  "<div class='container error_message_mandatory'><span> Please fill all required(*) fields</span></div>";
		}	
		else{
			$qr = mysql_query("SELECT * FROM stork_cabin_holiday WHERE holiday_date = '$holiday_date'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> Holiday Already Exists </span></div>";
			} else {
				mysqlQuery("INSERT INTO `stork_cabin_holiday` (holiday_day,holiday_date,holiday_status) VALUES ('$holiday_day','$holiday_date','$holiday_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Holiday Inserted Successfully! </span></div>";
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
						<span> Cabin Holiday Details </span>
					</li>
					<li>
						<span>Add Cabin Holiday Details</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Cabin Holiday Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cabin Holiday Information</h4>							
							<form action="add_cabin_holiday_details.php" id="add_cabin_holiday_details" method="POST" name="edit-acc-info">
									<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
									 <?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="last-name">Holiday Date<span class="required"></span></label>
								   
									<input type="text" class="form-control" id="holiday_date" autocomplete="off" placeholder="Date" name="holiday_date">
								</div>
								<div class="form-group">
								    <label for="last-name">Holiday Day<span class="required"></span></label>
								   
									<input type="text" class="form-control" autocomplete="off" placeholder="Day" name="holiday_day" id="holiday_day" readonly="">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="holiday_status">
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