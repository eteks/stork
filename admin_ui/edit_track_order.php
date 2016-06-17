
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
  
<?php include 'includes/navbar_admin.php'; ?>
<div class="container">
 <span class="error_test"> Please fill out all mandatory fields </span>
</div>


<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit TrackOrder Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">TrackOrder Information</h4>
							<form action="edit_track_order.php" id="edit_track_order" method="POST" name="edit-acc-info">
							
								<div class="form-group">
								    <label for="last-name">Order User ID<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="">
								</div>
								<div class="form-group">
								    <label for="last-name">Order ID<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name1" placeholder="">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Order Delivery Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s5">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
											<span>Inactive</span>
										</option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Date Of Delivered<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name3" placeholder="">
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