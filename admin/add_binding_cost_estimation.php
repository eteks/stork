
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Binding Cost Estimation</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$cost_estimation_binding_type = $_POST["cost_estimation_binding_type"];
	$cost_estimation_binding_amount = $_POST["cost_estimation_binding_amount"];
	$cost_estimation_binding_status = $_POST["cost_estimation_binding_status"];
	if($cost_estimation_binding_type=="" || $cost_estimation_binding_amount=="" || $cost_estimation_binding_status=="") {	
		$successMessage = "<div class='container error_message_mandatory'><span> Please fill out all mandatory fields </span></div>";
	}
	else{
		$qr = mysql_query("SELECT * FROM stork_cost_estimation_binding WHERE cost_estimation_binding_type = '$cost_estimation_binding_type'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Binding Cost Estimation Already Exists </span></div>";
		} else {
			
			mysqlQuery("INSERT INTO `stork_cost_estimation_binding` (cost_estimation_binding_type,cost_estimation_binding_amount,cost_estimation_binding_status) VALUES ('$cost_estimation_binding_type','$cost_estimation_binding_amount','$cost_estimation_binding_status')");
			$successMessage = "<div class='container error_message_mandatory'><span> Binding Cost Assigned Sucessfully! </span></div>";
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
						<span> Binding Cost Estimation</span>
					</li>
					<li>
						<span>Add Binding Cost Estimation</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
 <span class="error_test"> Please fill out all mandatory fields </span>
</div>
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Binding Cost Estimation</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Binding Cost Estimation</h4>
							<form action="add_binding_cost_estimation.php" id="add_binding_cost_estimation" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="first-name">Select Binding Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="cost_estimation_binding_type">
								       		<option value=""><span>Select Binding Type</span></option>											
											<option value="soft_binding"><span>Soft Binding</span></option>
											<option value="spiral_binding"><span>Sprial Binding</span></option>
											<option value="wireo_binding"><span>Wireo Binding</span></option>
											<option value="comb_binding"><span>Comb Binding</span></option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Binding Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" autocomplete="off" placeholder="Binding Amount" name="cost_estimation_binding_amount">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Binding Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="cost_estimation_binding_status">
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