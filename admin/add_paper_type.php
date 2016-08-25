<?php
include "includes/header.php";
if(!isset($_GET['type'])){
  die('<script type="text/javascript">window.location.href="index.php";</script>');
  exit();
 }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Paper Type</title>
</head>
<body>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$message ='';
		$paper_type = $_POST['paper_type'];
		$paper_type_status=$_POST['paper_type_status'];
		$paper_type_image = $_FILES["paper_type_image"]["name"];

		$type = $_POST['type_name'];
		$type_array=array("plain"=>"plain_printing","project"=>"project_printing","multi"=>"multicolor_printing");
  		$type_name = $type_array[$type];
		$select_type = mysql_query ("SELECT * FROM stork_printing_type WHERE printing_type='$type_name'");
		$printing_type_id = mysql_fetch_array($select_type);
		$printing_type = $printing_type_id ['printing_type_id'];

		if($paper_type=="" || $paper_type_status=="" || empty($_FILES['paper_type_image']['name'])) {
			$successMessage ="<div class='container error_message_mandatory'><span> Please fill all required(*) fields </span></div>";
		}
		else {
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
			    $successMessage =  "<div class='container error_message_mandatory'><span> " .$message. " </span></div>";
			// if everything is ok, try to upload file
			} 
			else {
				$qr=mysql_query("SELECT * FROM stork_paper_type WHERE paper_type='$paper_type' AND printing_type_id = '$printing_type'");
				$row=mysql_fetch_array($qr);
				if($row > 0) {
					$successMessage = "<div class='container error_message_mandatory'><span> Paper type already exist </span></div>";
				}
				else {
					$i = 0;
					do {
					    $image_name = $info['filename'] . ($i ? "_($i)" : "") . "." . $info['extension'];
					    $i++;
					    $target_file = "../images/paper_type/" . $image_name;
					} while(file_exists($target_file));
					move_uploaded_file($_FILES["paper_type_image"]["tmp_name"], $target_file);

					mysqlQuery("INSERT INTO `stork_paper_type` (paper_type,paper_type_image,	paper_type_status,printing_type_id) VALUES ('$paper_type','$target_file','$paper_type_status','$printing_type')");
					$successMessage = "<div class='container error_message_mandatory'><span> Paper type inserted successfully </span></div>";
				}
			}
		}
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
						<span> Paper Type </span>
					</li>
					<li>
						<span>Add Paper Type</span>
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
						<h3 class="acc-title lg">Add Paper Type Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Type Information</h4>
							<?php 	$type_name = $_GET['type']; ?>
							<form action="add_paper_type.php?type=<?php echo $type_name; ?>" method="POST" name="edit-acc-info" id="add_paper_type" enctype="multipart/form-data">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
 									<span class="error_image"> Please Upload Image </span>
 									<span class="error_extension"> Sorry, only JPG, JPEG, PNG & GIF files are allowed! </span>
								</div>
								 <?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="last-name">Paper Type<span class="required">*</span></label>
									<input type="text" class="form-control" name="paper_type" id="papertype" autocomplete="off" placeholder="Paper Type">
								</div>
								<input type="hidden" name="type_name" value="<?php echo $type_name; ?>">
								<div class="form-group offer_zone_position">
								    <label for="last-name">Paper type Image<span class="required">*</span></label>
									<input type="file" class="form-control browse_style" id="paper_type_image" name="paper_type_image">
										<!-- <a class='dispaly_show_add_offer'> <img id='edit_offer_upload' class='edit_offer_image' src='' /> </a> -->
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Paper Type Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" name="paper_type_status" id="sel_a">
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