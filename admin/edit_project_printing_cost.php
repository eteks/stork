
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Project Printing Cost Estimation</title>
</head>
<body>
<?php
$paper_print_type = '';
$val = '';
$successMessage = '';
function edit_project_printing_cost(){
if($_POST['paper_print_type'] || !$_POST['paper_print_type_hidden'] || $_POST['paper_side'] || !$_POST['paper_side_hidden']){
			$successMessage = "<div class='container error_message_mandatory'><span> Something Went Wrong! </span></div>";
		}
			$paper_print_type_status = $_POST["paper_print_type_status"];	
	$qr = mysqlQuery("SELECT * FROM stork_paper_print_type WHERE paper_print_type='$paper_print_type' AND paper_print_type_id NOT IN('$val')");
	$row = mysql_num_rows($qr);
	if($row > 0){
		$successMessage = "<div class='container error_message_mandatory'><span>  Already exists! </span></div>";
	} else {
		global $paper_print_type,$val,$successMessage;
		mysqlQuery("UPDATE `stork_paper_print_type` SET `paper_print_type`='$paper_print_type',`paper_print_type_status`='$paper_print_type_status' WHERE `paper_print_type_id`=".$val);
		if(($paper_print_type_status == 0 && !$_POST['change_status'])||($paper_print_type_status == 1 && $_POST['change_status'])){
			mysqlQuery("UPDATE `stork_cost_estimation` SET `cost_estimation_status`='$paper_print_type_status' WHERE `cost_estimation_paper_print_type_id`=".$val);
		}
		$successMessage = "<div class='container error_message_mandatory'><span> Project Printing Cost Inserted Successfully! </span></div>";	
	}	

		}
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		if($_POST["paper_print_type_hidden"]){
			$paper_print_type = $_POST["paper_print_type_hidden"];
			if($_POST['paper_print_type'] && $_POST['paper_print_type'] != "color with black & white"){				
				$successMessage = "<div class='container error_message_mandatory'><span> Something Went Wrong</span></div>";			
			}
			else{
				edit_project_printing_cost();
			}
		}
		else{
			$paper_print_type = $_POST["paper_print_type"];		
			edit_project_printing_cost();	
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
						<a href="/">Project Printing Cost Estimation</a>
					</li>
					<li>
						<span>Edit Project Printing Cost Estimation</span>
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
						<h3 class="acc-title lg">Edit Project Printing Cost Estimation </h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Project Printing Cost Estimation Information</h4>
							<form action="edit_project_printing_cost.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_project_printing_cost">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_cost_estimation_project_printing` WHERE `cost_estimation_project_printing_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
								<div class="form-group">
								    <label for="last-name">Paper Print Type<span class="required">*</span></label>
									<input type="text" class="form-control" maxlength="10" name="paper_print_type" autocomplete="off" value="Color with Black & White" disabled>
									<?php 
									        $query=mysql_query("SELECT * FROM stork_paper_print_type WHERE paper_print_type_status='1'");
									        while($row_cost=mysql_fetch_array($query)) {
									        	if(strtolower($row_cost['paper_print_type']) == "color with black & white"){
									        		echo "<input type='hidden' name='paper_print_type_hidden' value=".$row_cost['paper_print_type_id'].">";
									        	}
									        }
									?>	
								</div>
								<div class="form-group">
								    <label for="last-name">Paper Side<span class="required">*</span></label>
									<input type="text" class="form-control" maxlength="10" name="paper_side" autocomplete="off" value="Single Side" disabled>
									<?php 
								        $query1=mysql_query("SELECT * FROM stork_paper_side WHERE paper_side_status='1'");
								        while($row_cost1=mysql_fetch_array($query1)) {
								    		if(strtolower($row_cost1['paper_side']) == "single side"){
									        	echo "<input type='hidden' name='paper_side_hidden' value=".$row_cost1['paper_side_id'].">";
									        }
									    }
								    ?>
								</div>
								<div class="form-group">
								    <label for="first-name">Paper Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="paper_type">
								        <option>
											<span>Select Paper Type</span>
										</option>
								        <?php
				                        $query = mysql_query("select * from stork_paper_type");
				                        while ($rowPaperType = mysql_fetch_array($query)) {
					                        if($row['cost_estimation_project_printing_paper_type_id'] == $rowPaperType['paper_type_id'])   
												echo "<option selected value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";
											else
												echo "<option value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";	
				                    	} ?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="first-name">Paper Size<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="paper_size">
								        <option>
											<span>Select State</span>
										</option>
								        <?php
				                        $query = mysql_query("select * from stork_paper_size");
				                        while ($rowPaperSize = mysql_fetch_array($query)) {
					                        if($row['cost_estimation_project_printing_paper_size_id'] == $rowPaperSize['paper_size_id'])   
												echo "<option selected value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";
											else
												echo "<option value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";	
				                        } ?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" maxlength="10" autocomplete="off" placeholder="Amount" name="amount" value="<?php echo($row['cost_estimation_project_printing_amount']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_c" name="cost_estimation_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['cost_estimation_project_printing_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['cost_estimation_project_printing_status'] == 0) echo "selected"; ?>>InActive</option>
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