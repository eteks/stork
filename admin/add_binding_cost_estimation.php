<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Binding Cost Estimation</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$cost_estimation_binding_type = $_POST["cost_estimation_binding_type"];
	$cost_estimation_binding_amount = $_POST["cost_estimation_binding_amount"];
	$cost_estimation_binding_status = $_POST["cost_estimation_binding_status"];
	$binding_type_image = $_FILES["binding_type_image"]["name"];

	echo $_FILES["binding_type_image"]["name"];

	if($cost_estimation_binding_type=="" || $cost_estimation_binding_amount=="" || $cost_estimation_binding_status=="" || empty($_FILES['binding_type_image']['name'])) {	
		$successMessage = "<div class='container error_message_mandatory'><span> Please fill all required(*) fields </span></div>";
	}
	else{
		$target_dir = "../images/bind_type/";
		$target_file = $target_dir . basename($_FILES["binding_type_image"]["name"]);
		// echo $target_file;
		$info = pathinfo($_FILES['binding_type_image']['name']);
		$uploadOk = 1;	
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    $message = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
		    $successMessage =  "<div class='container error_message_mandatory'><span> " .$message. " </span></div>";
		// if everything is ok, try to upload file
		} 
		else {
			$qr = mysql_query("SELECT * FROM stork_cost_estimation_binding WHERE cost_estimation_binding_type = '$cost_estimation_binding_type'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage =  "<div class='container error_message_mandatory'><span> Binding Cost Estimation Already Exists </span></div>";
			} else {		
				$i = 0;
				do {
				    $image_name = $info['filename'] . ($i ? "_($i)" : "") . "." . $info['extension'];
				    $i++;
				    $target_file = "../images/bind_type/" . $image_name;
				} while(file_exists($target_file));
				move_uploaded_file($_FILES["binding_type_image"]["tmp_name"], $target_file);
				mysqlQuery("INSERT INTO `stork_cost_estimation_binding` (cost_estimation_binding_type,cost_estimation_binding_amount,binding_type_image,cost_estimation_binding_status) VALUES ('$cost_estimation_binding_type','$cost_estimation_binding_amount','$target_file','$cost_estimation_binding_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Binding Cost Assigned Sucessfully! </span></div>";
			}		
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
						<span> Binding Cost Estimation</span>
					</li>
					<li>
						<span>Add Binding Cost Estimation</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Binding Cost Estimation</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Binding Cost Estimation</h4>
							<form action="add_binding_cost_estimation.php" id="add_binding_cost_estimation" method="POST" name="edit-acc-info" enctype="multipart/form-data">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
 									<span class="error_image"> Please Upload Image </span>
 									<span class="error_extension"> Sorry, only JPG, JPEG, PNG & GIF files are allowed! </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="first-name">Select Binding Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="cost_estimation_binding_type">
								       		<option value=""><span>Select Binding Type</span></option>											
											<option value="soft_binding"><span>Soft Binding</span></option>
											<option value="spiral_binding"><span>Sprial Binding</span></option>
											<option value="wireo_binding"><span>Wireo Binding</span></option>
											<option value="comb_binding"><span>Comb Binding</span></option>
											<option value="handmade_binding"><span>Handmade Binding</span></option>
											<option value="case_binding"><span>Case Binding</span></option>
								    </select>
								</div>
								<div class="form-group offer_zone_position">
								    <label for="last-name">Binding Type Image<span class="required">*</span></label>
									<input type="file" class="form-control browse_style" id="binding_type_image" name="binding_type_image">
										<!-- <a class='dispaly_show_add_offer'> <img id='edit_offer_upload' class='edit_offer_image' src='' /> </a> -->
								</div>
								<div class="form-group">
								    <label for="last-name">Binding Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" autocomplete="off" placeholder="Binding Amount" name="cost_estimation_binding_amount">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Binding Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="cost_estimation_binding_status">
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