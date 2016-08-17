
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit OHP Sheet Cost Estimation</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$ohpsheet_amount = $_POST["ohpsheet_amount"];
		$ohpsheet_status = $_POST["ohpsheet_status"];
		
		mysqlQuery("UPDATE `stork_cost_estimation_ohpsheet` SET `ohpsheet_amount`='$ohpsheet_amount',`ohpsheet_status`='$ohpsheet_status' WHERE `ohpsheet_id`=".$val);
	
		$successMessage = "<div class='container error_message_mandatory'><span> OHP Sheet Cost Updated Successfully! </span></div>";	
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
						<span> OHP sheet Cost Estimation </span>
					</li>
					<li>
						<span>Edit OHP sheet Cost Estimation</span>
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
						<h3 class="acc-title lg">Edit OHP sheet Cost Estimation</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">OHP sheet Cost Estimation</h4>
							<form action="edit_ohpsheet_cost_estimation.php?update=<?php echo $id; ?>" id="edit_ohpsheet" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<?php
									$match = "SELECT * FROM `stork_cost_estimation_ohpsheet` WHERE `ohpsheet_id`='$id'";
									$qry = mysqlQuery($match);
									$numRows = mysql_num_rows($qry); 
									if ($numRows > 0)
									{
										while($row = mysql_fetch_array($qry)) 
										{
								?>	
								<?php if ($row['ohpsheet_status'] == 0){ ?>
								<input type="hidden" name="change_status" class="change_status_value">
								<?php } ?>
								<div class="form-group">
								    <label for="last-name">OHP Sheet Cost<span class="required">*</span></label>
									<input type="text" class="form-control" id="ohp_sheet_cost" placeholder="OHP Sheet Cost" name="ohpsheet_amount" value="<?php echo($row['ohpsheet_amount']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">State Status<span class="required">*</span></label>
									<select class="product-type-filter form-control change_status" id="sel_a" name="ohpsheet_status">
								        <option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['ohpsheet_status'] == 1) echo "selected"; ?>>
											<span>Active</span>
										</option>
										<option value="0" <?php if ($row['ohpsheet_status'] == 0) echo "selected"; ?>>
											<span>Inactive</span>
										</option>
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