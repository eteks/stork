
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
						<h3 class="acc-title lg">Edit order Details Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Order details Information</h4>
							<form action="edit_order_details.php" id="edit_order_details" method="POST" name="edit-acc-info">
							
								<div class="form-group">
								    <label for="last-name">Order ID<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Order ID<">
								</div>
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper PrintType<span class="required">*</span></label>
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
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper Side<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s6">
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
								<div class="cate-filter-content">	
								    <label for="first-name">Order Paper Size<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s7">
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
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper Type<span class="required">*</span></label>
										<select class="product-type-filter form-control" id="s8">
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
								    <label for="last-name">Total No.Of Pages<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name1" placeholder="Total No.Of Pages">
								</div>
								<div class="form-group">
								    <label for="last-name">Color Print Pages<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name2" placeholder="Color Print Pages">
								</div>
								<div class="form-group">
								    <label for="last-name">Comments<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name3" placeholder="Comments">
								</div>
								<div class="form-group">
								    <label for="last-name">Total Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" maxlength=10 placeholder="Total Amount">
								</div>

											<div class="cate-filter-content">	
								    <label for="first-name">Order Detail Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s9">
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