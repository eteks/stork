<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Offerzone</title>
</head>
<body>
<?php 
if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
	}
?>
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
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
		<section class="account-main col-md-9 col-sm-8 col-xs-12">
			<h3 class="acc-title lg">Edit Offerzone Information</h3>
			<div class="form-edit-info">
				<h4 class="acc-sub-title">Offerzone Information</h4>
				<form action="add_offer_zone.php" method="POST" name="edit-acc-info" enctype="multipart/form-data">
					<?php  
						$offer_query = mysqlQuery("SELECT * FROM `stork_offer_zone` WHERE `offer_zone_id`='$id'");
						$offer_array = mysql_fetch_array($offer_query);
					?>
					<div class="form-group">
					    <label for="first-name">Offerzone Title<span class="required">*</span></label>
						<input type="text" class="form-control" id="first-name" value="<?php echo $offer_array['offer_zone_title']; ?>" placeholder="Offerzone Title" name="offerzone_title">
					</div>
					<div class="form-group">
					    <label for="last-name">Offerzone Image<span class="required">*</span></label>
						<input type="file" class="form-control browse_style" value="<?php echo $offer_array['offer_zone_image']; ?>" id="first-name" name="offerzone_image">
						<?php 
			 				$img_source=$offer_array['offer_zone_image'];	
			            	echo "<a href='$img_source'> <img class='show_offer_image' src='$img_source' /> </a>"; 
				        ?> 
					</div>
					<div class="cate-filter-content">	
					    <label for="first-name">Offerzone Status<span class="required">*</span></label>
						<select class="product-type-filter form-control" id="sel1" name="offerzone_status">
					        <option value="1" <?php if ($offer_array['offer_zone_status'] == 1) echo "selected";?>>
								<span>Active</span>
							</option>
							<option value="0" <?php if ($offer_array['offer_zone_status'] == 0 )echo "selected";?>>
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