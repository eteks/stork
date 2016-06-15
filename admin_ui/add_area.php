
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$state_id = $_POST["state_id"];
	$area_name = $_POST["area_name"];
	$area_status = $_POST["area_status"];
	if($state_id=="" || $area_name=="" || $area_status=="") {
		// header('Location: add_area.php');
		// exit();
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Please fill all the fields.</b></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_area WHERE area_name = '$area_name' AND area_state_id='$state_id'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Area Already Exists </span></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_area` (area_name,area_state_id,area_status) VALUES ('$area_name','$state_id','$area_status')");
			$successMessage = "<div class='container error_message_mandatory'><span> Area Inserted Sucessfully! </span></div>";
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
						<a href="/">State</a>
					</li>
					<li>
						<span>Add Area</span>
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
						<h3 class="acc-title lg">Add Area Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Area Information</h4>
							<form action="add_area.php" method="POST" name="edit-acc-info">
								<div class="form-group">
								    <label for="first-name">State<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="state_id">
								        <option>
											<span>Select State</span>
										</option>
										<?php
					                        $query = mysql_query("select * from stork_state  where state_status='1'");
					                        while ($row = mysql_fetch_array($query)) {
					                            ?>
					                        <option value="<?php echo $row['state_id']; ?>"><span><?php echo $row['state_name']; ?></span></option>
					                    <?php } ?>   
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Area Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name" name="area_name">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Area Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="area_status">
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