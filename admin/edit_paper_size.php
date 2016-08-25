
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Paper size</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$message ='';
		$paper_size = $_POST["Papersize"];
		$printing_type = $_POST['printing_type'];
		$paper_size_status = $_POST["paper_size_status"];
		$old_path_name = $_POST["old_path_name"];

		// echo "paper_size_image".$_FILES["paper_size_image"]["name"];
		if($_FILES['paper_size_image']['name']){
			// echo "paper_size_image".$_FILES["paper_size_image"]["name"];
			$image_status = true;
			$paper_size_image = strtolower(pathinfo($_FILES['paper_size_image']['name']));	
		}
		else{
			$image_status = false;
			$paper_size_image = $_POST["hidden_paper_size_image"];
		}

		$qr = mysqlQuery("SELECT * FROM stork_paper_size WHERE 	paper_size='$paper_size' AND paper_size_id NOT IN('$val') AND printing_type_id='$printing_type'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Papersize Already exists! </span></div>";	
		} else {
			if($image_status){
				$target_dir = "../images/paper_size/";
				$target_file = $target_dir . basename($_FILES["paper_size_image"]["name"]);
				// echo $target_file;
				$info = pathinfo($_FILES['paper_size_image']['name']);
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
						$target_file = "../images/paper_size/" . $image_name;
					} while(file_exists($target_file));
					move_uploaded_file($_FILES["paper_size_image"]["tmp_name"], $target_file);
					mysqlQuery("UPDATE `stork_paper_size` SET `paper_size`='$paper_size',`paper_size_image`='$target_file',`paper_size_status`='$paper_size_status' WHERE `paper_size_id`=".$val);
				 	$successMessage = "<div class='container error_message_mandatory'><span> Papertype Updated Successfully! </span></div>";
				}
			}
			else{
				mysqlQuery("UPDATE `stork_paper_size` SET `paper_size`='$paper_size',`paper_size_image`='$paper_size_image',`paper_size_status`='$paper_size_status' WHERE `paper_size_id`=".$val);
				if(($paper_size_status == 0 && !$_POST['change_status'])||($paper_size_status == 1 && $_POST['change_status'])){
					mysqlQuery("UPDATE `stork_cost_estimation` SET `cost_estimation_status`='$paper_size_status' WHERE `cost_estimation_paper_size_id`=".$val);
				}
				$successMessage = "<div class='container error_message_mandatory'><span> Papersize Updated Successfully! </span></div>";
			}		
		}				
	}	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	$select_type = mysql_query ("SELECT * FROM stork_paper_size WHERE paper_size_id='$id'");
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
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Paper Size Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Size Information</h4>
							<?php
							$papersize_query = mysqlQuery ("SELECT * FROM stork_paper_size WHERE paper_size_id='$id'");
							$papersize_array=mysql_fetch_array($papersize_query);
							?>
							<form action="edit_paper_size.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_paper_size" enctype="multipart/form-data">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
 									<span class="error_image"> Please Upload Image </span>
 									<span class="error_extension"> Sorry, only JPG, JPEG, PNG & GIF files are allowed! </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<?php if ($papersize_array['paper_size_status'] == 0){ ?>
									<input type="hidden" name="change_status" class="change_status_value">
								<?php } ?>
								<div class="form-group">
								    <label for="last-name">Paper Size<span class="required">*</span></label>
									<input type="text" class="form-control" id="papersize" name="Papersize" value="<?php echo $papersize_array['paper_size']; ?>" id="first-name" placeholder="Area Name">
								</div>
								<input type="hidden" name="printing_type" value="<?php echo $printing_type ?>" >
								<div class="form-group offer_zone_position">
								      <label for="last-name">Paper Size Image<span class="required">*</span></label>
								      <input type="file" class="form-control browse_style" value="<?php echo $papersize_array['paper_size_image']; ?>" id="paper_size_image" name="paper_size_image">
								      <?php
								        $img_source= $papersize_array['paper_size_image']; ?>
								        <a class='dispaly_hide_offer' href='<?php echo $img_source; ?>' target='_blank'> 
								        <?php if($img_source != '') {?>
								         <img class='edit_paper_size_image' src='<?php echo $img_source; ?>'/> 
								        <?php } ?>
								        <input type="hidden" name="hidden_paper_size_image" value="<?php echo $img_source; ?>">
								        </a>
								        <a class='dispaly_show_offer'> <img id='edit_offer_upload' class='edit_paper_size_image' src='' /> </a>
								        <input type="hidden" value="<?php echo $img_source; ?>" name="old_path_name" />
						     	</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Papersize Status<span class="required">*</span></label>
									<select class="product-type-filter form-control change_status" id="sel_a" name="paper_size_status">
								 <option value="">
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if($papersize_array['paper_size_status'] == 1)  echo "selected" ?> >
											<span>Active</span>
										</option>
										<option value="0" <?php if($papersize_array['paper_size_status'] == 0)  echo "selected" ?> >
										<span>Inactive</span>
										</option>
										
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
								</div>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 