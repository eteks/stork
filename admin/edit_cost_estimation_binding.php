
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Cost Estimation Binding</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$cost_estimation_binding_type = $_POST["cost_estimation_binding_type"];
		$cost_estimation_binding_amount = $_POST["cost_estimation_binding_amount"];
		$cost_estimation_binding_status = $_POST["cost_estimation_binding_status"];
		$qr = mysqlQuery("SELECT * FROM `stork_cost_estimation_binding` WHERE cost_estimation_binding_type='$cost_estimation_binding_type' AND cost_estimation_binding_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Already Binding Cost Assigned! </span></div>";
		} else {	
			mysqlQuery("UPDATE `stork_cost_estimation_binding` SET cost_estimation_binding_type='$cost_estimation_binding_type',cost_estimation_binding_amount='$cost_estimation_binding_amount', cost_estimation_binding_status='$cost_estimation_binding_status' WHERE cost_estimation_binding_id=".$val);
			$successMessage = "<div class='container error_message_mandatory'><span> Binding Cost Updated Successfully! </span></div>";
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
						<a href="/">Binding Cost Estimation</a>
					</li>
					<li>
						<span>Edit Binding Cost Estimation</span>
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
						<h3 class="acc-title lg">Edit Binding Cost Estimation Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Binding Cost Estimation Information</h4>
							<form action="edit_cost_estimation_binding.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_cost_estimation_binding">
							<?php 
								$match = "SELECT * FROM `stork_cost_estimation_binding` WHERE `cost_estimation_binding_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
								<div class="form-group">
								    <label for="first-name">Binding Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="cost_estimation_binding_type">
								        <option>
											<span>Select Binding Type</span>
										</option>
										<option value="soft_binding" <?php if ($row['cost_estimation_binding_type'] == "soft_binding") echo "selected"; ?>><span>Soft Binding</span></option>
										<option value="spiral_binding" <?php if ($row['cost_estimation_binding_type'] == "spiral_binding") echo "selected"; ?>><span>Sprial Binding</span></option>
										<option value="wireo_binding" <?php if ($row['cost_estimation_binding_type'] == "wireo_binding") echo "selected"; ?>><span>Wireo Binding</span></option>
										<option value="comb_binding" <?php if ($row['cost_estimation_binding_type'] == "comb_binding") echo "selected"; ?>><span>Comb Binding</span></option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" maxlength="10" autocomplete="off" placeholder="Amount" name="cost_estimation_binding_amount" value="<?php echo($row['cost_estimation_binding_amount']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="cost_estimation_binding_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['cost_estimation_binding_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['cost_estimation_binding_status'] == 0) echo "selected"; ?>>InActive</option>
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