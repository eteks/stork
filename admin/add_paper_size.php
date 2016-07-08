
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Paper Size</title>
</head>
<body>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$paper_size = $_POST['paper_size'];
	$paper_size_status=$_POST['paper_size_status'];
	if($paper_size=="" || $paper_size_status=="") {
		$successMessage = "<div class='container error_message_mandatory'><span> Please fill all required(*) fields</span></div>";
	}
	else {
		$qr=mysql_query("SELECT * FROM stork_paper_size WHERE paper_size='$paper_size'");
		$row=mysql_fetch_array($qr);
		if($row > 0) {
			$successMessage = "<div class='container error_message_mandatory'><span> Paper size already exist </span></div>";
		}
		else {
			mysqlQuery("INSERT INTO `stork_paper_size` (paper_size,paper_size_status) VALUES ('$paper_size','$paper_size_status')");
			$successMessage ="<div class='container error_message_mandatory'><span> Paper size inserted successfully </span></div>";
		}
	}
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
						<span> Paper Size </span>
					</li>
					<li>
						<span>Add Paper Size</span>
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
						<h3 class="acc-title lg">Add Paper Size Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Size Information</h4>
							<form action="add_paper_size.php" method="POST" name="edit-acc-info" id="add_paper_size">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="last-name">Paper Size<span class="required">*</span></label>
									<input type="text" class="form-control" id="papersize" autocomplete="off" name="paper_size" placeholder="Paper Size">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Paper Size Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" name="paper_size_status" id="sel_a">
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