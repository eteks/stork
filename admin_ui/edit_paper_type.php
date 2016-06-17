
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$paper_type = $_POST["paper_type"];
		$paper_type_status = $_POST["paper_type_status"];
		// $qry   = mysqlQuery("SELECT * FROM `stork_state` WHERE `id`='$val'");
		// $fetch = mysql_fetch_array($qry);
		$qr = mysqlQuery("SELECT * FROM stork_paper_type WHERE 	paper_type='$paper_type' AND paper_type_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Papertype Already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_paper_type` SET `paper_type`='$paper_type',`paper_type_status`='$paper_type_status' WHERE `paper_type_id`=".$val);
			$successMessage = "<div class='container error_message_mandatory'><span> Papertype Updated Successfully! </span></div>";
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
						<h3 class="acc-title lg">Edit PaperType Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">PaperType Information</h4>
							<form action="edit_paper_type.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_paper_type">
							<?php 
								$match = "SELECT * FROM `stork_paper_type` WHERE `paper_type_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
							<div class="form-group">
							    <label for="last-name">Paper Type<span class="required">*</span></label>
								<input type="text" class="form-control" id="first-name" placeholder="PaperType" name="paper_type" value="<?php echo($row['paper_type']); ?>">
							</div>
							<div class="cate-filter-content">	
							    <label for="first-name">PaperType Status<span class="required">*</span></label>
								<select class="product-type-filter form-control" id="s5" name="paper_type_status">
							        <option>
										<span>Select status</span>
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