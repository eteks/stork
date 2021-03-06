
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Cost Estimation Binding</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$message ='';
		$cost_estimation_binding_type = $_POST["cost_estimation_binding_type"];
		$cost_estimation_binding_amount = $_POST["cost_estimation_binding_amount"];
		$cost_estimation_binding_status = $_POST["cost_estimation_binding_status"];
		$old_path_name = $_POST["old_path_name"];

		// echo "binding_type_image".$_FILES["binding_type_image"]["name"];
		if($_FILES['binding_type_image']['name']){
			// echo "binding_type_image".$_FILES["binding_type_image"]["name"];
			$image_status = true;
			$binding_type_image = strtolower(pathinfo($_FILES['binding_type_image']['name']));	
		}
		else{
			$image_status = false;
			$binding_type_image = $_POST["hidden_binding_type_image"];
		}

		$qr = mysqlQuery("SELECT * FROM `stork_cost_estimation_binding` WHERE cost_estimation_binding_type='$cost_estimation_binding_type' AND cost_estimation_binding_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Already Binding Cost Assigned! </span></div>";
		} else {
			if($image_status){
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
					$successMessage = "<div class='container error_message_mandatory'><span> " .$message. " </span></div>";
					// if everything is ok, try to upload file
				} 
				else {
					unlink($old_path_name);
					$i = 0;
					do {
						$image_name = $info['filename'] . ($i ? "_($i)" : "") . "." . $info['extension'];
						$i++;
						$target_file = "../images/bind_type/" . $image_name;
					} while(file_exists($target_file));
					move_uploaded_file($_FILES["binding_type_image"]["tmp_name"], $target_file);
					mysqlQuery("UPDATE `stork_cost_estimation_binding` SET cost_estimation_binding_type='$cost_estimation_binding_type',cost_estimation_binding_amount='$cost_estimation_binding_amount', binding_type_image='$target_file',cost_estimation_binding_status='$cost_estimation_binding_status' WHERE cost_estimation_binding_id=".$val);
					$successMessage = "<div class='container error_message_mandatory'><span> Binding Cost Updated Successfully! </span></div>";
				}
			}	
			else{
				mysqlQuery("UPDATE `stork_cost_estimation_binding` SET cost_estimation_binding_type='$cost_estimation_binding_type',cost_estimation_binding_amount='$cost_estimation_binding_amount', binding_type_image='$binding_type_image',cost_estimation_binding_status='$cost_estimation_binding_status' WHERE cost_estimation_binding_id=".$val);
				$successMessage = "<div class='container error_message_mandatory'><span> Binding Cost Updated Successfully! </span></div>";
			}
		}
				
	}
	
}
$id=$val;
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
						<a href="/">Binding Cost Estimation</a>
					</li>
					<li>
						<span>Edit Binding Cost Estimation</span>
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
						<h3 class="acc-title lg">Edit Binding Cost Estimation</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Binding Cost Estimation Information</h4>
							<form action="edit_cost_estimation_binding.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_cost_estimation_binding" enctype="multipart/form-data">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
 									<span class="error_image"> Please Upload Image </span>
 									<span class="error_extension"> Sorry, only JPG, JPEG, PNG & GIF files are allowed! </span>
									<span class="error_dimension"> Width and Height must not exceed 350px * 300px </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_cost_estimation_binding` WHERE `cost_estimation_binding_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
								<div class="form-group">
								    <label for="first-name">Binding Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="cost_estimation_binding_type">
								        <option>
											<span>Select Binding Type</span>
										</option>
										<option value="soft_binding" <?php if ($row['cost_estimation_binding_type'] == "soft_binding") echo "selected"; ?>><span>Soft Binding</span></option>
										<option value="spiral_binding" <?php if ($row['cost_estimation_binding_type'] == "spiral_binding") echo "selected"; ?>><span>Sprial Binding</span></option>
										<option value="wireo_binding" <?php if ($row['cost_estimation_binding_type'] == "wireo_binding") echo "selected"; ?>><span>Wireo Binding</span></option>
										<option value="comb_binding" <?php if ($row['cost_estimation_binding_type'] == "comb_binding") echo "selected"; ?>><span>Comb Binding</span></option>
										<option value="handmade_binding" <?php if ($row['cost_estimation_binding_type'] == "handmade_binding") echo "selected"; ?>><span>Handmade Binding</span></option>
										<option value="case_binding" <?php if ($row['cost_estimation_binding_type'] == "case_binding") echo "selected"; ?>><span>Case Binding</span></option>
								    </select>
								</div>
								<div class="form-group offer_zone_position">
								      <label for="last-name">Binding Type Image<span class="required">*</span><span class="upload_limit">(Max Upload dimensions 350px * 300px)</span></label>
								      <input type="file" class="form-control browse_style image_act" value="<?php echo $row['binding_type_image']; ?>" id="binding_type_image" name="binding_type_image">
								      <?php
								        $img_source= $row['binding_type_image']; ?>
								        <a class='dispaly_hide_offer' href='<?php echo $img_source; ?>' target='_blank'> 
								        <?php if($img_source != '') {?>
								         <img class='edit_binding_type_image' src='<?php echo $img_source; ?>'/> 
								        <?php } ?>
								        <input type="hidden" name="hidden_binding_type_image" value="<?php echo $img_source; ?>">
								        </a>
								        <a class='dispaly_show_offer'> <img id='edit_offer_upload' class='edit_binding_type_image' src='' /> </a>
								        <input type="hidden" value="<?php echo $img_source; ?>" name="old_path_name" />
						     	</div>
								<div class="form-group">
								    <label for="last-name">Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" maxlength="10" autocomplete="off" placeholder="Amount" name="cost_estimation_binding_amount" value="<?php echo($row['cost_estimation_binding_amount']); ?>">
								</div>
								<input type="hidden" name="image_height" id="image_height">
								<input type="hidden" name="image_width" id="image_width">
								<div class="cate-filter-content">	
								    <label for="first-name">Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="cost_estimation_binding_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['cost_estimation_binding_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['cost_estimation_binding_status'] == 0) echo "selected"; ?>>InActive</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
								</div> 
							<?php 
							} 
							}
							?>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 