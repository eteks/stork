
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
  
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Users Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">User Information</h4>
							<form action="#" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="last-name">User Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Password<span class="required">*</span></label>
									<input type="password" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Date of Birth<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="first-name">User Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1">
								        <option>
											<span>Select Type</span>
										</option>
								        <option value="0">
											<span>Admin</span>
										</option>
										<option value="1">
											<span>Staff</span>
										</option>
								    </select>
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Admin Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1">
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