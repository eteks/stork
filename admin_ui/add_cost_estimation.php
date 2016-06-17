
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
  
<?php include 'includes/navbar_admin.php'; ?>
<div class="container error_add_cost_estimation">
	<span> Please fill out all mandatory fields </span>
</div>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Cost Estimation Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cost Estimation Information</h4>
							<form action="add_cost_estimation.php" id="add_cost_estimation" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="first-name">Paper print type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s5">
								        <option>
											<span>Select Paperprinttype</span>
										</option>
								        <option value="0">
											<span>Tamilnadu</span>
										</option>
										<option value="1">
											<span>Pondicherry</span>
										</option>
								    </select>
								</div>
									<div class="form-group">
								    <label for="first-name">Paperside<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s6">
								        <option>
											<span>Select Paperside</span>
										</option>
								        <option value="0">
											<span>Tamilnadu</span>
										</option>
										<option value="1">
											<span>Pondicherry</span>
										</option>
								    </select>
								</div>
									<div class="form-group">
								    <label for="first-name">Papersize<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s7">
								        <option>
											<span>Select Papersize</span>
										</option>
								        <option value="0">
											<span>Tamilnadu</span>
										</option>
										<option value="1">
											<span>Pondicherry</span>
										</option>
								    </select>
								</div>
									<div class="form-group">
								    <label for="first-name">Papertype<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s8">
								        <option>
											<span>Select Papertype</span>
										</option>
								        <option value="0">
											<span>Tamilnadu</span>
										</option>
										<option value="1">
											<span>Pondicherry</span>
										</option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amunt" maxlength=10 placeholder="Amount">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Cost estimation Status<span class="required">*</span></label>
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