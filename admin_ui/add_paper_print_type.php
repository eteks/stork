
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
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
						<a href="/">Paper Print type</a>
					</li>
					<li>
						<span>Add Paper Print type</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container error_message_mandatory">
	<span> Please fill out all mandatory fields </span>
</div>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Paperprinttype Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paperprinttype Information</h4>
							<form action="#" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="last-name">Paperprinttype<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Paperprinttype">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Paperprinttype Status<span class="required">*</span></label>
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