
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Paper Print Type</title>
</head>
<body>
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
						<span> Paper Print type </span>
					</li>
					<li>
						<span>Add Paper Print type</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Paper Print Type Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Print Type Information</h4>
							<form action="add_paper_print_type.php" method="POST" name="edit-acc-info" id="add_paper_print_type">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php 
										if($_SERVER['REQUEST_METHOD'] == 'POST') {
											$paper_print_type = $_POST['paper_print_type'];
											$paper_print_type_status=$_POST['paper_print_type_status'];
											if($paper_print_type=="" || $paper_print_type_status=="") {
												// echo"<div class='container error_message_mandatory'><span> Please fill out all mandatory fields </span></div>";
											}
											else {
												$qr=mysql_query("SELECT * FROM stork_paper_print_type WHERE paper_print_type='$paper_print_type'");
												$row=mysql_fetch_array($qr);
												if($row > 0) {
													echo"<div class='container error_message_mandatory'><span> Paper print type already exist </span></div>";
												}
												else {
													mysqlQuery("INSERT INTO `stork_paper_print_type` (paper_print_type,paper_print_type_status) VALUES ('$paper_print_type','$paper_print_type_status')");
													echo "<div class='container error_message_mandatory'><span> Paper print type inserted successfully </span></div>";
												}
											}
										}
									
									?> 
								<div class="form-group">
								    <label for="last-name">Paper Print Type<span class="required">*</span></label>
									<input type="text" class="form-control" id="paperprinttype" autocomplete="off" name="paper_print_type" placeholder="Paper Print Type">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Paper Print Type Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" name="paper_print_type_status" id="sel_a">
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