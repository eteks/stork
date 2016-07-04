<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Offer zone</title>
</head>
<body>
<?php 
if (isset($_GET['update'])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){

	$val = $_GET['update'];
	$message ='';
	$offerzone_title = $_POST["offerzone_title"];
	$offerzone_status = $_POST["offerzone_status"];
	$old_path_name = $_POST["old_path_name"];
	
	if($_FILES['offerzone_image']['name']){
		$image_status = true;
		$offerzone_image = strtolower(pathinfo($_FILES['offerzone_image']['name']));	
	}
	else{
		$image_status = false;
		$offerzone_image = $_POST["hidden_offer_image"];
	}

	$offer_query1 = mysql_query("SELECT * FROM stork_offer_zone WHERE offer_zone_title = '$offerzone_title' AND offer_zone_id NOT IN ('$val')");
	$row = mysql_num_rows($offer_query1);
	if($row > 0){
		$successMessage = "<div class='container error_message_mandatory'><span> Offerzone Already exist </span></div>";
	} 
	else {
		if($image_status){
			$target_dir = "style/img/zone/";
			$target_file = $target_dir . basename($_FILES["offerzone_image"]["name"]);
			// echo $target_file;
			$info = pathinfo($_FILES['offerzone_image']['name']);
			$uploadOk = 1;	
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
					$target_file = "style/img/zone/" . $image_name;
				} while(file_exists($target_file));
				move_uploaded_file($_FILES["offerzone_image"]["tmp_name"], $target_file);
				mysqlQuery("UPDATE `stork_offer_zone` SET `offer_zone_title`='$offerzone_title',`offer_zone_image`='$target_file',`offer_zone_status`='$offerzone_status' WHERE offer_zone_id='$val'");
			 	$successMessage ="<div class='container error_message_mandatory'><span> Offerzone Updated Successfully </span></div>";
			 	// header("Location: users.php");
			}
		}
		else{
			mysqlQuery("UPDATE `stork_offer_zone` SET `offer_zone_title`='$offerzone_title',`offer_zone_image`='$offerzone_image',`offer_zone_status`='$offerzone_status' WHERE offer_zone_id='$val'");
			$successMessage ="<div class='container error_message_mandatory'><span> Offerzone Updated Successfully </span></div>";
		}
	}
	// else {
	// 	echo "test";
	// 	// mysqlQuery("UPDATE `stork_offer_zone` SET `offer_zone_title`='$offerzone_title',`offer_zone_status`='$offerzone_status' WHERE offer_zone_id='$val'");
	// 	// $successMessage ="<div class='container error_message_mandatory'><span> Offerzone Updated Successfully </span></div>";
	// }		
}
}
?>

<?php 
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
      <span> Offerzone </span>
     </li>
     <li>
      <span>Edit Offerzone</span>
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
   <h3 class="acc-title lg">Edit Offerzone Information</h3>
   <div class="form-edit-info">
    <h4 class="acc-sub-title">Offerzone Information</h4>
    <form action="edit_offer_zone.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_offer_zone" enctype="multipart/form-data">
    	<div class="container">
		<span class="error_test"> Please fill all required(*) fields </span>
		</div>
		<?php if($successMessage) echo $successMessage; ?>
     <?php  
      $offer_query = mysqlQuery("SELECT * FROM `stork_offer_zone` WHERE `offer_zone_id`='$id'");
      $offer_array = mysql_fetch_array($offer_query);
     ?>
     <div class="form-group">
         <label for="first-name">Offerzone Title<span class="required">*</span></label>
      <input type="text" class="form-control" id="offerzonetitle" autocomplete="off" value="<?php echo $offer_array['offer_zone_title']; ?>" placeholder="Offerzone Title" name="offerzone_title">
     </div>
     <div class="form-group offer_zone_position">
         <label for="last-name">Offerzone Image<span class="required">*</span></label>
      <input type="file" class="form-control browse_style" value="<?php echo $offer_array['offer_zone_image']; ?>" id="offerzoneimage" name="offerzone_image">
      <?php
        $img_source= $offer_array['offer_zone_image']; ?>
        <a class='dispaly_hide_offer' href='<?php echo $img_source; ?>' target='_blank'> 
        <?php if($img_source != '') {?>
         <img class='edit_offer_image' src='<?php echo $img_source; ?>'/> 
        <?php } ?>
        <input type="hidden" name="hidden_offer_image" value="<?php echo $img_source; ?>">
        </a>
             
                <a class='dispaly_show_offer'> <img id='edit_offer_upload' class='edit_offer_image' src='' /> </a>
            <input type="hidden" value="<?php echo $img_source; ?>" name="old_path_name" />
     </div>
     <div class="cate-filter-content"> 
         <label for="first-name">Offerzone Status<span class="required">*</span></label>
      <select class="product-type-filter form-control" id="sel_a" name="offerzone_status">
             <option value="1" <?php if ($offer_array['offer_zone_status'] == 1) echo "selected";?>>
        <span>Active</span>
       </option>
       <option value="0" <?php if ($offer_array['offer_zone_status'] == 0 )echo "selected";?>>
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
 $('.dispaly_hide_offer').addClass('display_none');
 $('.dispaly_show_offer').addClass('display_block');
    $('#edit_offer_upload').attr('src', e.target.result);
};
</script>
</div>
</div>
<?php include 'includes/footer.php'; ?>