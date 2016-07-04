<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Offer Zone</title>
</head>
<body>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$message ='';
		$offerzone_title = $_POST["offerzone_title"];
		$offerzone_status = $_POST["offerzone_status"];
	
		// echo $_FILES["offerzone_image"]["name"];
		if($offerzone_title =="" || empty($_FILES['offerzone_image']['name']) || $offerzone_status=="") {
			// $successMessage = "<div class='container error_message_mandatory'><span> Please fill out all mandatory fields </span></div>";
		}	
		else{
			$target_dir = "style/img/zone/";
			$target_file = $target_dir . basename($_FILES["offerzone_image"]["name"]);
			// echo $target_file;
			$info = pathinfo($_FILES['offerzone_image']['name']);
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
				$offer_query = mysql_query("SELECT * FROM stork_offer_zone WHERE offer_zone_title = '$offerzone_title'");
			 	$row = mysql_num_rows($offer_query);
				if($row > 0){
			 	$successMessage = "<div class='container error_message_mandatory'><span> Offerzone Already exist </span></div>";
			  	} else {
			  	$i = 0;
				do {
				    $image_name = $info['filename'] . ($i ? "_($i)" : "") . "." . $info['extension'];
				    $i++;
				    $target_file = "style/img/zone/" . $image_name;
				} while(file_exists($target_file));
				move_uploaded_file($_FILES["offerzone_image"]["tmp_name"], $target_file);
				mysqlQuery("INSERT INTO `stork_offer_zone` (offer_zone_title,offer_zone_image,offer_zone_status) VALUES ('$offerzone_title','$target_file','$offerzone_status')");
			 	$successMessage = "<div class='container error_message_mandatory'><span> Offerzone Inserted Successfully </span></div>";
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
						<span> Offer Zone </span>
					</li>
					<li>
						<span>Add Offer Zone</span>
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
						<h3 class="acc-title lg">Add Offer Zone Information</h3>						
						<div class="form-edit-info">							
							<h4 class="acc-sub-title">Offer Zone Information</h4>
							<form action="add_offer_zone.php" method="POST" id="add_offer_zone" name="edit-acc-info" enctype="multipart/form-data">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<div class="container">
 									<span class="error_image"> Please Upload Image </span>
								</div>
								<div class="container">
 									<span class="error_extension"> Sorry, only JPG, JPEG, PNG & GIF files are allowed! </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>	
								<div class="form-group">
								    <label for="first-name">Offer Zone Title<span class="required">*</span></label>
									<input type="text" class="form-control" id="offerzonetitle" autocomplete="off" placeholder="Offer Zone Title" name="offerzone_title">
								</div>
								<div class="form-group offer_zone_position">
								    <label for="last-name">Offer Zone Image<span class="required">*</span></label>

							<input type="file" class="form-control browse_style" id="OfferzoneImage" name="offerzone_image">
									<!-- <a class='dispaly_show_add_offer'> <img id='edit_offer_upload' class='edit_offer_image' src='' /> </a> -->

								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Offer Zone Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="offerzone_status">
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
<script>
	$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
	$('.dispaly_show_add_offer').addClass('display_block');
    $('#edit_offer_upload').attr('src', e.target.result);
};
</script>
</div>
</div>
<?php include 'includes/footer.php'; ?> 