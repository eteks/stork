
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Paper Print Type</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$paper_print_type = $_POST["paper_print_type"];
		$paper_print_type_status = $_POST["paper_print_type_status"];
		$qr = mysqlQuery("SELECT * FROM stork_paper_print_type WHERE paper_print_type='$paper_print_type' AND paper_print_type_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Paperprinttype Already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_paper_print_type` SET `paper_print_type`='$paper_print_type',`paper_print_type_status`='$paper_print_type_status' WHERE `paper_print_type_id`=".$val);
			$successMessage = "<div class='container error_message_mandatory'><span> Paperprinttype Updated Successfully! </span></div>";	
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
						<a href="/">Paper Print type</a>
					</li>
					<li>
						<span>Edit Paper Print type</span>
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
						<h3 class="acc-title lg">Edit Paper Print Type Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Print Type Information</h4>
							<form action="edit_paper_print_type.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_paper_print_type">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php  
								$match = "SELECT * FROM `stork_paper_print_type` WHERE `paper_print_type_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>	
								<div class="form-group">
								    <label for="last-name">Paper Print Type<span class="required">*</span></label>
									<input type="text" class="form-control" id="paperprinttype" placeholder="Paper Print Type" name="paper_print_type" value="<?php echo($row['paper_print_type']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Paper Print Type Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="paper_print_type_status">
								        <option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['paper_print_type_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['paper_print_type_status'] == 0) echo "selected"; ?>>InActive</option>
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