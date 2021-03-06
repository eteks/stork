
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Project Printing Cost Estimation</title>
</head>
<body>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// $cost_print_type=$_POST['cost_print_type_hidden'];
		$cost_print_type=$_POST['cost_print_type'];
		$cost_paper_side=$_POST['cost_paper_side_hidden'];
		$cost_paper_size=$_POST['cost_paper_size'];
		$cost_paper_type=$_POST['cost_paper_type'];
		$cost_amount=$_POST['cost_amount'];
		$cost_status=$_POST['cost_status'];
		
		if($_POST['cost_paper_side'] || !$_POST['cost_paper_side_hidden']){
			$successMessage = "<div class='container error_message_mandatory'><span> Something Went Wrong! </span></div>";
		}
		else if($cost_print_type== "" || $cost_paper_size=="" || $cost_paper_type == "" || $cost_amount=="" || $cost_status=="") {
			$successMessage = "<div class='container error_message_mandatory'><span> Please fill all required(*) fields </span></div>";
		}	
		else if ($cost_paper_side=="") {
			$successMessage = "<div class='container error_message_mandatory'><span> Something went Wrong! </span></div>";
		}
		else{
			$qr = mysql_query("SELECT * FROM stork_cost_estimation_project_printing WHERE cost_estimation_project_printing_paper_print_type_id = '$cost_print_type' AND cost_estimation_project_printing_paper_side_id = '$cost_paper_side' AND cost_estimation_project_printing_paper_size_id = '$cost_paper_size' AND cost_estimation_project_printing_paper_type_id = '$cost_paper_type'");
			$row = mysql_num_rows($qr);
			if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Already Exists </span></div>";
			} else {
				mysqlQuery("INSERT INTO `stork_cost_estimation_project_printing` (cost_estimation_project_printing_paper_print_type_id,cost_estimation_project_printing_paper_side_id,cost_estimation_project_printing_paper_size_id,cost_estimation_project_printing_paper_type_id,cost_estimation_project_printing_amount,cost_estimation_project_printing_status) VALUES ('$cost_print_type','$cost_paper_side','$cost_paper_size','$cost_paper_type','$cost_amount','$cost_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Project Printing Cost Inserted Successfully! </span></div>";
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
						<span> Project Printing Cost Estimation </span>
					</li>
					<li>
						<span>Add Project Printing Cost Estimation</span>
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
			<h3 class="acc-title lg">Add Project Printing Cost Estimation</h3>
			<div class="form-edit-info">
				<h4 class="acc-sub-title">Project Printing Cost Estimation</h4>
				<form action="add_project_printing_cost.php" method="POST" name="edit-acc-info" id="add_project_printing_cost">
					<div class="container">
						<span class="error_test"> Please fill all required(*) fields </span>
					</div>
					<?php if($successMessage) echo $successMessage; ?>
					<?php 
						$query_printing_type=mysql_query("SELECT * FROM stork_printing_type WHERE printing_type='project_printing'");
						$row_printing_type = mysql_fetch_array($query_printing_type);
					?>
					<div class="form-group">
					    <label for="last-name">Paper Print Type<span class="required">*</span></label>
					    <select class="product-type-filter form-control" id="sel_a" name="cost_print_type">
					        <option value="">
								<span>Select Paper Print Type</span>
							</option>
							<!-- <input type="text" class="form-control" maxlength="10" autocomplete="off" value="Color with Black & White" name='cost_print_type' disabled> -->
							<?php 
							        /*$query=mysql_query("SELECT * FROM stork_paper_print_type WHERE paper_print_type_status='1' AND printing_type_id=".$row_printing_type['printing_type_id']);
							        while($row_cost=mysql_fetch_array($query)) {						
							        	if(strtolower($row_cost['paper_print_type']) == "color with black & white"){						        	
							        		echo "<input type='hidden' name='cost_print_type_hidden' value=".$row_cost['paper_print_type_id'].">";
							        	}
							        }*/
							?>	
							<?php 
						        $query=mysql_query("SELECT * FROM stork_paper_print_type WHERE paper_print_type_status='1' AND printing_type_id=".$row_printing_type['printing_type_id']);
						        while($row_cost=mysql_fetch_array($query)) {
						        	if(strtolower($row_cost['paper_print_type']) != "color with black & white"){
						        	?>
						        <option value="<?php echo $row_cost['paper_print_type_id']; ?>"> <?php echo $row_cost['paper_print_type']; ?></option>
						    <?php }} ?>
					    </select>
					</div>
					<div class="form-group">
					    <label for="last-name">Paper Side<span class="required">*</span></label>
						<input type="text" class="form-control" maxlength="10" autocomplete="off" value="Single Side" name='cost_paper_side' disabled>
						<?php 
					        $query1=mysql_query("SELECT * FROM stork_paper_side WHERE paper_side_status='1' AND printing_type_id=".$row_printing_type['printing_type_id']);
					        while($row_cost1=mysql_fetch_array($query1)) {
					    		if(strtolower($row_cost1['paper_side']) == "single side"){
						        	echo "<input type='hidden' name='cost_paper_side_hidden' value=".$row_cost1['paper_side_id'].">";
						        }
						    }
					    ?>
					</div>
					<div class="form-group">
					    <label for="first-name">Paper Type<span class="required">*</span></label>
						<select class="product-type-filter form-control" name="cost_paper_type" id="sel_b">
					        <option value="">
								<span>Select Paper Type</span>
							</option>
					        <?php 
					        $query3=mysql_query("SELECT * FROM stork_paper_type WHERE paper_type_status='1' AND printing_type_id=".$row_printing_type['printing_type_id']);
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
					        $query2=mysql_query("SELECT * FROM stork_paper_size WHERE paper_size_status='1' AND printing_type_id=".$row_printing_type['printing_type_id']);
					        while($row_cost2=mysql_fetch_array($query2)) {
					        	?>
					        <option value="<?php echo $row_cost2['paper_size_id']; ?>"> <?php echo $row_cost2['paper_size']; ?></option>
					        <?php } ?>
					    </select>
					</div>
					<div class="form-group">
					    <label for="last-name">Amount<span class="required">*</span></label>
						<input type="text" class="form-control" id="amount" maxlength="10" autocomplete="off" name="cost_amount" placeholder="amount">
					</div>
					<div class="cate-filter-content">	
					    <label for="first-name">Project Printing Cost Estimation Status<span class="required">*</span></label>
						<select class="product-type-filter form-control" name="cost_status" id="sel_d">
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