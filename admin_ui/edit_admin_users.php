
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
						<h3 class="acc-title lg">Edit Admin Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Admin Information</h4>
							<form action="edit_admin_users.php" id="edit_admin_users" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="last-name">User Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="User Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Password<span class="required">*</span></label>
									<input type="password" class="form-control" id="first-name1" placeholder="Password">
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="test" placeholder="Email Id">
								</div>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="phone" maxlength=10 placeholder="Mobile Number">
								</div>
								<div class="form-group">
								    <label for="first-name">User Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s5">
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