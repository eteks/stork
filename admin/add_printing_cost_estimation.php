
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Printing Cost Estimation</title>
</head>
<body>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$cost_print_type=$_POST['cost_print_type'];
$cost_paper_side=$_POST['cost_paper_side'];
$cost_paper_size=$_POST['cost_paper_size'];
$cost_paper_type=$_POST['cost_paper_type'];
$cost_amount=$_POST['cost_amount'];
$cost_status=$_POST['cost_status'];
	if($cost_print_type=="" || $cost_paper_side=="" || $cost_paper_size=="" || $cost_paper_type == "" || $cost_amount=="" || $cost_status=="") {
		// echo "<div class='container error_message_mandatory'><span> Please fill out all mandatory fields </span></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_cost_estimation WHERE cost_estimation_paper_print_type_id = '$cost_print_type' AND cost_estimation_paper_side_id = '$cost_paper_side' AND cost_estimation_paper_size_id = '$cost_paper_size' AND cost_estimation_paper_type_id = '$cost_paper_type'");
		$row = mysql_num_rows($qr);
		if($row > 0){
		$successMessage = "<div class='container error_message_mandatory'><span> Already Exists </span></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_cost_estimation` (cost_estimation_paper_print_type_id,cost_estimation_paper_side_id,cost_estimation_paper_size_id,cost_estimation_paper_type_id,cost_estimation_amount,cost_estimation_status) VALUES ('$cost_print_type','$cost_paper_side','$cost_paper_size','$cost_paper_type','$cost_amount','$cost_status')");
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
						<span> Printing Cost Estimation </span>
					</li>
					<li>
						<span>Add Printing Cost Estimation</span>
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
			<h3 class="acc-title lg">Add Printing Cost Estimation</h3>
			<div class="form-edit-info">
				<h4 class="acc-sub-title">Printing Cost Estimation</h4>
				<form action="add_printing_cost_estimation.php" method="POST" name="edit-acc-info" id="add_cost_estimation">
					<div class="container">
						<span class="error_test"> Please fill all required(*) fields </span>
					</div>
						<?php if($successMessage) echo $successMessage; ?>
					<div class="form-group">
					    <label for="first-name">Paper Print Type<span class="required">*</span></label>
						<select class="product-type-filter form-control" name="cost_print_type" id="sel_a">
					        <option value="">
								<span>Select Paper Print Type</span>
							</option>
					        <?php 
					        $query=mysql_query("SELECT * FROM stork_paper_print_type WHERE paper_print_type_status='1'");
					        while($row_cost=mysql_fetch_array($query)) {
					        	?>
					        <option value="<?php echo $row_cost['paper_print_type_id']; ?>"> <?php echo $row_cost['paper_print_type']; ?></option>
					        <?php } ?>
					        
					    </select>
					</div>
						<div class="form-group">
					    <label for="first-name">Paper Side<span class="required">*</span></label>
						<select class="product-type-filter form-control" name="cost_paper_side" id="sel_b">
					        <option value="">
								<span>Select Paper Side</span>
							</option>
					 		<?php 
					        $query1=mysql_query("SELECT * FROM stork_paper_side WHERE paper_side_status='1'");
					        while($row_cost1=mysql_fetch_array($query1)) {
					        	?>
					        <option value="<?php echo $row_cost1['paper_side_id']; ?>"> <?php echo $row_cost1['paper_side']; ?></option>
					        <?php } ?>
					    </select>
					</div>
					<div class="form-group">
					    <label for="first-name">Paper Type<span class="required">*</span></label>
						<select class="product-type-filter form-control" name="cost_paper_type" id="sel_d">
					        <option value="">
								<span>Select Paper Type</span>
							</option>
					         <?php 
					        $query3=mysql_query("SELECT * FROM stork_paper_type WHERE paper_type_status='1'");
					        while($row_cost3=mysql_fetch_array($query3)) {
					        	?>
					        <option value="<?php echo $row_cost3['paper_type_id']; ?>"> <?php echo $row_cost3['paper_type']; ?></option>
					        <?php } ?>
					    </select>
					</div>
					<div class="form-group">
					    <label for="first-name">Paper Size<span class="required">*</span></label>
						<select class="product-type-filter form-control" name="cost_paper_size" id="sel_c">
					        <option value="">
								<span>Select Paper Size</span>
							</option>
					        <?php 
					        $query2=mysql_query("SELECT * FROM stork_paper_size WHERE paper_size_status='1'");
					        while($row_cost2=mysql_fetch_array($query2)) {
					        	?>
					        <option value="<?php echo $row_cost2['paper_size_id']; ?>"> <?php echo $row_cost2['paper_size']; ?></option>
					        <?php } ?>
					    </select>
					</div>
					<div class="form-group">
					    <label for="last-name">Amount<span class="required">*</span></label>
						<input type="text" class="form-control" id="amount" maxlength="10" autocomplete="off" name="cost_amount" placeholder="Amount">
					</div>
					<div class="cate-filter-content">	
					    <label for="first-name">Printing Cost Estimation Status<span class="required">*</span></label>
						<select class="product-type-filter form-control" name="cost_status" id="sel_e">
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