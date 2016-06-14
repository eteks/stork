
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$state_name = $_POST["state_name"];
	$state_status = $_POST["state_status"];
	if($state_name=="" || $state_status=="") {
		// header('Location: add_state.php');
		// exit();
		// $successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Please fill all the fields.</b></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_state WHERE state_name = '$state_name'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			// $successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> State Already Exists.</b></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_state` (state_name,state_status) VALUES ('$state_name','$state_status')");
			// $successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> State Inserted Successfully.</b></div>";
		}
		
	}
} ?>  
<?php include 'includes/navbar_admin.php'; ?>
<div class="container error_message_mandatory">
	<span> Please fill out all mandatory fields </span>
</div>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add State Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">State Information</h4>
							<form action="add_state.php" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="last-name">State Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="State Name" name="state_name">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">State Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="state_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
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