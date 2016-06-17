
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php if(isset($_GET["id"]))
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
						<span> Paper size </span>
					</li>
					<li>
						<span>Edit Paper size</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Papersize Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Papersize Information</h4>
							
							<?php
							$papersize_query = mysqlQuery ("SELECT * FROM stork_paper_size WHERE paper_size_id='$id'");
							$papersize_array=mysql_fetch_array($papersize_query);
							?>
							<form action="edit_paper_size.php" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="last-name">Paper Size<span class="required">*</span></label>
									<input type="text" class="form-control" value="<?php echo $papersize_array['paper_size']; ?>" id="first-name" placeholder="Area Name">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Papersize Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1">
								    	
								    	
								        <option value="1" <?php if($papersize_array['paper_size_status'] == 1)  echo "selected" ?> >
											<span>Active</span>
										</option>
										<option value="0" <?php if($papersize_array['paper_size_status'] == 0)  echo "selected" ?> >
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