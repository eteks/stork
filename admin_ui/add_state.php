
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
		$successMessage = "<div class='container error_message_mandatory'><span> Please fill out all mandatory fields </span></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_state WHERE state_name = '$state_name'");
		$row = mysql_num_rows($qr);
		if($row > 0){
		$successMessage = "<div class='container error_message_mandatory'><span> State Already Exists </span></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_state` (state_name,state_status) VALUES ('$state_name','$state_status')");
			$successMessage = "<div class='container error_message_mandatory'><span> State Inserted Successfully! </span></div>";
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
						<span> State </span>
					</li>
					<li>
						<span>Add States</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- <div class="container error_message_mandatory">
	<span> Please fill out all mandatory fields </span>
</div> -->
<?php if($successMessage) echo $successMessage; ?>
<div class="container">
 <span class="error_test"> Please fill out all mandatory fields </span>
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
							<form action="add_state.php" id="add_state" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="last-name">State Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="statename" autocomplete="off" placeholder="State Name" name="state_name">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">State Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="state_status">
								        <option value="">
											<span>Select status</span>
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