
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Paper Type</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$message ='';
		$paper_type = $_POST["paper_type"];
		$printing_type = $_POST['printing_type'];
		$paper_type_status = $_POST["paper_type_status"];
		$old_path_name = $_POST["old_path_name"];

		// $qry   = mysqlQuery("SELECT * FROM `stork_state` WHERE `id`='$val'");
		// $fetch = mysql_fetch_array($qry);
		if($_FILES['paper_type_image']['name']){
			// echo "paper_type_image".$_FILES["paper_type_image"]["name"];
			$image_status = true;
			$paper_type_image = strtolower(pathinfo($_FILES['paper_type_image']['name']));	
		}
		else{
			$image_status = false;
			$paper_type_image = $_POST["hidden_paper_type_image"];
		}

		$qr = mysqlQuery("SELECT * FROM stork_paper_type WHERE 	paper_type='$paper_type' AND paper_type_id NOT IN('$val')  AND printing_type_id='$printing_type'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Papertype Already exists! </span></div>";
		} else {
			if($image_status){
				$target_dir = "../images/paper_type/";
				$target_file = $target_dir . basename($_FILES["paper_type_image"]["name"]);
				// echo $target_file;
				$info = pathinfo($_FILES['paper_type_image']['name']);
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
						$target_file = "../images/paper_type/" . $image_name;
					} while(file_exists($target_file));
					move_uploaded_file($_FILES["paper_type_image"]["tmp_name"], $target_file);
					mysqlQuery("UPDATE `stork_paper_type` SET `paper_type`='$paper_type',`paper_type_image`='$target_file',`paper_type_status`='$paper_type_status' WHERE `paper_type_id`=".$val);
				 	$successMessage = "<div class='container error_message_mandatory'><span> Papertype Updated Successfully! </span></div>";
				}
			}
			else{
				mysqlQuery("UPDATE `stork_paper_type` SET `paper_type`='$paper_type',`paper_type_image`='$paper_type_image',`paper_type_status`='$paper_type_status' WHERE `paper_type_id`=".$val);
				if(($paper_type_status == 0 && !$_POST['change_status'])||($paper_type_status == 1 && $_POST['change_status'])){
					mysqlQuery("UPDATE `stork_cost_estimation` SET `cost_estimation_status`='$paper_type_status' WHERE `cost_estimation_paper_type_id`=".$val);
				}
				$successMessage = "<div class='container error_message_mandatory'><span> Papertype Updated Successfully! </span></div>";
			}
		}			
	}	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	$select_type = mysql_query ("SELECT * FROM stork_paper_type WHERE paper_type_id='$id'");
	$printing_type_id = mysql_fetch_array($select_type);
	$printing_type = $printing_type_id ['printing_type_id'];
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
						<a href="/">Paper type</a>
					</li>
					<li>
						<span>Edit Paper type</span>
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
						<h3 class="acc-title lg">Edit Paper Type Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Type Information</h4>
							<form action="edit_paper_type.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_paper_type" enctype="multipart/form-data">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
 									<span class="error_image"> Please Upload Image </span>
 									<span class="error_extension"> Sorry, only JPG, JPEG, PNG & GIF files are allowed! </span>
									<span class="error_dimension"> Width and Height must not exceed 350px * 300px </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_paper_type` WHERE `paper_type_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
							<?php if ($row['paper_type_status'] == 0){ ?>
								<input type="hidden" name="change_status" class="change_status_value">
							<?php } ?>
							<div class="form-group">
							    <label for="last-name">Paper Type<span class="required">*</span></label>
								<input type="text" class="form-control" id="papertype" placeholder="Paper Type" name="paper_type" value="<?php echo($row['paper_type']); ?>">
							</div>
							<input type="hidden" name="printing_type" value="<?php echo $printing_type ?>" >
							<div class="form-group offer_zone_position">
							      <label for="last-name">Paper Type Image<span class="required">*</span><span class="upload_limit">(Max Upload dimensions 350px * 300px)</span></label>
							      <input type="file" class="form-control browse_style image_act " value="<?php echo $row['paper_type_image']; ?>" id="paper_type_image" name="paper_type_image">
							      <?php
							        $img_source= $row['paper_type_image']; ?>
							        <a class='dispaly_hide_offer' href='<?php echo $img_source; ?>' target='_blank'> 
							        <?php if($img_source != '') {?>
							         <img class='edit_paper_type_image' src='<?php echo $img_source; ?>'/> 
							        <?php } ?>
							        <input type="hidden" name="hidden_paper_type_image" value="<?php echo $img_source; ?>">
							        </a>
							        <a class='dispaly_show_offer'> <img id='edit_offer_upload' class='edit_paper_type_image' src='' /> </a>
							        <input type="hidden" value="<?php echo $img_source; ?>" name="old_path_name" />
						     </div>
						     <input type="hidden" name="image_height" id="image_height">
							 <input type="hidden" name="image_width" id="image_width">
							<div class="cate-filter-content">	
							    <label for="first-name">Paper Type Status<span class="required">*</span></label>
								<select class="product-type-filter form-control change_status" id="sel_a" name="paper_type_status">
							        <option>
										<span>Select Status</span>
									</option>
							        <option value="1" <?php if ($row['paper_type_status'] == 1) echo "selected"; ?>>Active</option>
									<option value="0" <?php if ($row['paper_type_status'] == 0) echo "selected"; ?>>InActive</option>
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