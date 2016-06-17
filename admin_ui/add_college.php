
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$area_id = $_POST["area_id"];
	$college_name = $_POST["college_name"];
	$college_status = $_POST["college_status"];
	if($area_id=="" || $college_name=="" || $college_status=="") {
		$successMessage = "<div class='container error_message_mandatory'><span> Please fill out all mandatory fields </span></div>";
	}
	else{
		$qr = mysql_query("SELECT * FROM stork_college WHERE college_name = '$college_name' AND college_area_id='$area_id'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> College Already Exists </span></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_college` (college_name,college_area_id,college_status) VALUES ('$college_name','$area_id','$college_status')");
			$successMessage = "<div class='container error_message_mandatory'><span> College Inserted Sucessfully! </span></div>";
		}		
	}
} ?> 
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
						<span> College </span>
					</li>
					<li>
						<span>Add College</span>
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
						<h3 class="acc-title lg">Add College Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">College Information</h4>
							<form action="add_college.php" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="first-name">Area<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="area_id">
								        <option value="">
											<span>Select Area</span>
										</option>
										<?php
					                        $query = mysql_query("select * from stork_area where area_status='1'");
					                        while ($row = mysql_fetch_array($query)) {
					                        ?>
					                        <option value="<?php echo $row['area_id']; ?>"><span><?php echo $row['area_name']; ?></span></option>
					                    <?php } ?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">College Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="College Name" name="college_name">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">College Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="college_status">
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