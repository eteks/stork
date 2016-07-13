<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add State</title>
</head>
<body>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		
		$number_of_copies = $_POST["number_of_copies"];
		$number_of_copies_status = $_POST["number_of_copies_status"];
		if($number_of_copies=="" && $number_of_copies_status=="") {
			$successMessage =  "<div class='container error_message_mandatory'><span> Please fill all required(*) fields</span></div>";
		}	
		else{
			$qr = mysql_query("SELECT * FROM stork_multicolor_copies WHERE multicolor_copies = '$number_of_copies'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> Copies Already Exists </span></div>";
			} else {
				mysqlQuery("INSERT INTO `stork_multicolor_copies` (multicolor_copies,multicolor_copies_status) VALUES ('$number_of_copies','$number_of_copies_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Copies Inserted Successfully! </span></div>";
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
						<span> Copies </span>
					</li>
					<li>
						<span>Add No. Of Copies</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Multicolor Copies Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Multicolor Copies Information</h4>							
							<form action="add_multicolor_copies.php" id="add_multicolor_copies" method="POST" name="edit-acc-info">
									<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
									 <?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="last-name">No. Of Copies<span class="required">*</span></label>
									<input type="text" class="form-control" id="copies" autocomplete="off" placeholder="No. Of Copies" name="number_of_copies">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Copies Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="number_of_copies_status">
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