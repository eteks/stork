<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add City</title>
</head>
<body> 
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$state_id = $_POST["state_id"];
		$city_name = $_POST["city_name"];
		$city_status = $_POST["city_status"];
		if($city_name=="" || $city_status=="") {
			$successMessage ="<div class='container error_message_mandatory'><span>Please fill all required(*) fields </span></div>";
		}	
		else{
			$qr = mysql_query("SELECT * FROM stork_city WHERE city_name = '$city_name' AND city_state_id	='$state_id'");
			$row = mysql_num_rows($qr);
			if($row > 0){
			$successMessage =  "<div class='container error_message_mandatory'><span> City Already Exists </span></div>";
			} else {
				mysqlQuery("INSERT INTO `stork_city` (city_name,city_state_id,city_status) VALUES ('$city_name','$state_id','$city_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> City Inserted Successfully! </span></div>";
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
						<span> City </span>
					</li>
					<li>
						<span>Add city</span>
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
						<h3 class="acc-title lg">Add City Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">City Information</h4>
							<form action="add_city.php" id="add_city" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
									<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="first-name">Select State<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="state_id">
								        <option value="">
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
								    <label for="last-name">City Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="cityname" autocomplete="off" placeholder="City Name" name="city_name">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">City Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="city_status">
								        <option value="">
											<span>Select Status</span>
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