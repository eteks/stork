<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Offerzone</title>
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
						<span> Offerzone </span>
					</li>
					<li>
						<span>Edit Offerzone</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
 <span class="error_test"> Please fill out all mandatory fields </span>
</div>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
		<section class="account-main col-md-9 col-sm-8 col-xs-12">
			<h3 class="acc-title lg">Edit Offerzone Information</h3>
			<div class="form-edit-info">
				<h4 class="acc-sub-title">Offerzone Information</h4>
				<form action="add_offer_zone.php" method="POST" id="add_offer_zone" name="edit-acc-info" enctype="multipart/form-data">
					<div class="form-group">
					    <label for="first-name">Offerzone Title<span class="required">*</span></label>
						<input type="text" class="form-control" id="OfferzoneTitle" autocomplete="off" placeholder="Offerzone Title" name="offerzone_title">
					</div>
					<div class="form-group">
					    <label for="last-name">Offerzone Image<span class="required">*</span></label>
						<input type="file" class="form-control browse_style" autocomplete="off" id="OfferzoneImage" name="offerzone_image">
					</div>
					<div class="cate-filter-content">	
					    <label for="first-name">Offerzone Status<span class="required">*</span></label>
						<select class="product-type-filter form-control" id="Offerzone Status" name="offerzone_status">
					        <option value="">
								<span>Select status</span>
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