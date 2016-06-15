<?php
include "includes/header.php";
$error = "";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add New Offer Zone</title>
</head>
<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$message ='';
	$offer_zone_title = $_POST["offer_zone_title"];
	$offer_zone_status = $_POST["offer_zone_status"];

	echo $offer_zone_title;
	
	echo $offer_zone_status;
	echo "image file",$_FILES["offer_zone_image"]["name"];
	if($offer_zone_title=="" || empty($_FILES['offer_zone_image']['name']) || $offer_zone_status=="") {
		// header('Location: add_state.php');
		// exit();
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Please fill all the fields.</b></div>";
	}	
	else{
		$target_dir = "style/img/zone/";
		$target_file = $target_dir . basename($_FILES["offer_zone_image"]["name"]);
		$uploadOk = 1;	
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    $message = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
		    $successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b>".$message."</b></div>";
		// if everything is ok, try to upload file
		} else {
			move_uploaded_file($_FILES["offer_zone_image"]["tmp_name"], $target_file);
			// $successMessage ="success";
			$offer_query = mysql_query("SELECT * FROM stork_state WHERE state_name = '$state_name'");
		// $row = mysql_num_rows($qr);
		// if($row > 0){
		// 	$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> State Already Exists.</b></div>";
		// } else {
		// 	mysqlQuery("INSERT INTO `stork_state` (state_name,state_status) VALUES ('$state_name','$state_status')");
		// 	$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> State Inserted Successfully.</b></div>";
		// }		
		}
	}
} ?>
<?php include 'includes/navbar_admin.php'; ?>
<div class="container error_message_mandatory">
	<span> Please fill out all mandatory fields </span>
</div>
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
							<?php if($successMessage) echo $successMessage; ?>
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