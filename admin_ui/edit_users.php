
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
						<h3 class="acc-title lg">edit Users Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">User Information</h4>
							<form action="edit_users.php" id="edit_users" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="last-name">User Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="User Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Password<span class="required">*</span></label>
									<input type="password" class="form-control" id="first-name1" placeholder="Password">
								</div>
										<div class="form-group">
								    <label for="last-name">First Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name2" placeholder="First Name">
								</div>
										<div class="form-group">
								    <label for="last-name">Last Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name3" placeholder="Last Name">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">User Type<span class="required">*</span></label>
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
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name4" placeholder="Email Id">
								</div>
								<div class="form-group">
								    <label for="last-name">Date of Birth<span class="required">*</span></label>
									<input type="text" class="form-control" id="date" placeholder="Date Of Birth">
								</div>
								<div class="form-group">
								    <label for="last-name">Address Line1<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name6" placeholder="address">
								</div>
								<div class="form-group">
								    <label for="last-name">Address Line2<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name7" placeholder="address">
								</div>
							
								<div class="form-group">
								    <label for="first-name">State<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s6">
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
								    <label for="first-name">Area<span class="required">*</span></label>
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
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="phone" maxlength=10 placeholder="Mobile">
								</div>
									<div class="cate-filter-content">	
								    <label for="first-name">User Status<span class="required">*</span></label>
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