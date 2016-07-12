
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Paper Type</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$paper_type = $_POST["paper_type"];
		$printing_type = $_POST['printing_type'];
		$paper_type_status = $_POST["paper_type_status"];
		// $qry   = mysqlQuery("SELECT * FROM `stork_state` WHERE `id`='$val'");
		// $fetch = mysql_fetch_array($qry);
		$qr = mysqlQuery("SELECT * FROM stork_paper_type WHERE 	paper_type='$paper_type' AND paper_type_id NOT IN('$val')  AND printing_type_id='$printing_type'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Papertype Already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_paper_type` SET `paper_type`='$paper_type',`paper_type_status`='$paper_type_status' WHERE `paper_type_id`=".$val);
			if(($paper_type_status == 0 && !$_POST['change_status'])||($paper_type_status == 1 && $_POST['change_status'])){
				mysqlQuery("UPDATE `stork_cost_estimation` SET `cost_estimation_status`='$paper_type_status' WHERE `cost_estimation_paper_type_id`=".$val);
			}
			$successMessage = "<div class='container error_message_mandatory'><span> Papertype Updated Successfully! </span></div>";
		}
				
	}
	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	$select_type = mysql_query ("SELECT * FROM stork_paper_type WHERE paper_type_id='$id'");
	$printing_type_id = mysql_fetch_array($select_type);
	$printing_type = $printing_type_id ['printing_type_id'];
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
						<a href="/">Paper type</a>
					</li>
					<li>
						<span>Edit Paper type</span>
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
						<h3 class="acc-title lg">Edit Paper Type Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Type Information</h4>
							<form action="edit_paper_type.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_paper_type">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_paper_type` WHERE `paper_type_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
							<?php if ($row['paper_type_status'] == 0){ ?>
								<input type="hidden" name="change_status" class="change_status_value">
							<?php } ?>
							<div class="form-group">
							    <label for="last-name">Paper Type<span class="required">*</span></label>
								<input type="text" class="form-control" id="papertype" placeholder="Paper Type" name="paper_type" value="<?php echo($row['paper_type']); ?>">
							</div>
							<input type="hidden" name="printing_type" value="<?php echo $printing_type ?>" >
							<div class="cate-filter-content">	
							    <label for="first-name">Paper Type Status<span class="required">*</span></label>
								<select class="product-type-filter form-control change_status" id="sel_a" name="paper_type_status">
							        <option>
										<span>Select Status</span>
									</option>
							        <option value="1" <?php if ($row['paper_type_status'] == 1) echo "selected"; ?>>Active</option>
									<option value="0" <?php if ($row['paper_type_status'] == 0) echo "selected"; ?>>InActive</option>
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