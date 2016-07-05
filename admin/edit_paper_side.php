
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Paper Side</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$paper_side = $_POST["paper_side"];
		$paper_side_status = $_POST["paper_side_status"];
		$qr = mysqlQuery("SELECT * FROM stork_paper_side WHERE 	paper_side='$paper_side' AND paper_side_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span>  Paperside Already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_paper_side` SET `paper_side`='$paper_side',`paper_side_status`='$paper_side_status' WHERE `paper_side_id`=".$val);
			if(($paper_side_status == 0 && !$_POST['change_status'])||($paper_side_status == 1 && $_POST['change_status'])){
				mysqlQuery("UPDATE `stork_cost_estimation` SET `cost_estimation_status`='$paper_side_status' WHERE `cost_estimation_paper_side_id`=".$val);
			}
			$successMessage = "<div class='container error_message_mandatory'><span>  Paperside Updated Successfully! </span></div>";	
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
						<a href="/">Paper side</a>
					</li>
					<li>
						<span>Edit Paper side</span>
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
						<h3 class="acc-title lg">Edit Paper Side Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Side Information</h4>
							<form action="edit_paper_side.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_paper_side">	
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_paper_side` WHERE `paper_side_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
							<?php if ($row['paper_side_status'] == 0){ ?>
								<input type="hidden" name="change_status" class="change_status_value">
							<?php } ?>
							<div class="form-group">
							    <label for="last-name">Paper Side<span class="required">*</span></label>
								<input type="text" class="form-control" id="paperside" placeholder="Paper Side" name="paper_side" value="<?php echo($row['paper_side']); ?>">
							</div>
							<div class="cate-filter-content">	
							    <label for="first-name">Paper Side Status<span class="required">*</span></label>
								<select class="product-type-filter form-control change_status" id="sel_a" name="paper_side_status">
							        <option>
										<span>Select status</span>
									</option>
							        <option value="1" <?php if ($row['paper_side_status'] == 1) echo "selected"; ?>>Active</option>
									<option value="0" <?php if ($row['paper_side_status'] == 0) echo "selected"; ?>>InActive</option>
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