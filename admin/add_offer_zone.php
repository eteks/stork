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
			$successMessage ="success";
		}
		// $qr = mysql_query("SELECT * FROM stork_state WHERE state_name = '$state_name'");
		// $row = mysql_num_rows($qr);
		// if($row > 0){
		// 	$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> State Already Exists.</b></div>";
		// } else {
		// 	mysqlQuery("INSERT INTO `stork_state` (state_name,state_status) VALUES ('$state_name','$state_status')");
		// 	$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> State Inserted Successfully.</b></div>";
		// }		
	}
} ?>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy">
		<div class="page-title">
			<h2><i class="fa fa-plus-circle color"></i> Add New Offer Zone </h2> 
			<hr />
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="awidget">  
					<script>
						$(document).ready(function () 
						{
							$('.alert-success').delay(2000).fadeOut();
							$('.wobblebar').hide();
							$( document ).ajaxStop(function() 
							{
								$('.wobblebar').hide();
							});
							// $('#submit').click(function(e)
							// {  
							// 	$('.wobblebar').show();
							// 	$(".result").html("");
							// 	e.preventDefault();
							// 	var cid = $('#category').val();
							// 	alert($('#urls').val());
							// 	var urls = $('#urls').val().split(/\n/);
							// 	$.each(urls, function(index,url)   
							// 	{
							// 		$.ajaxq("myQueue", 
							// 		{
							// 			type:"POST",
							// 			url:"productAdd.php",   
							// 			data:{URL:url,CID:cid},
							// 			success:function(result)
							// 			{   
							// 				var results = result.split("_");
							// 				$(".result").append(results[0]); 
							// 				$('#allProducts').text(" All Products ("+results[1]+")");
							// 			}
							// 		});
							// 	});
							// });
						});
					</script>
					<form class="form-horizontal" id="myform" role="form" action="add_offer_zone.php" method="post" enctype="multipart/form-data">
						<?php if($successMessage) echo $successMessage; ?>
						<div class="form-group">
							<label class="col-lg-2 control-label">Offer Zone Title</label>
							<div class="col-lg-10">
								<input id="cat" class="form-control" type="text" required="" value="" placeholder="Offer Zone Title" name="offer_zone_title">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Offer Zone Image</label>
							<div class="col-lg-10">
								<input type="file" name="offer_zone_image" id="offer_zone_image">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Status</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="offer_zone_status" required="">
									<option value="">Status</option>
									<option value="1">Active</option>
									<option value="0">InActive</option>
								</select>
							 </div>
						</div>
						<hr />
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success" id="submit"><i class="fa fa-floppy-o"></i> Save</button>
							</div>
						</div>
					 </form>
				</div><!-- Awidget -->
			</div><!-- col-md-12 -->
		</div><!-- row -->
	</div><!-- mainy -->
	<div class="clearfix"></div> 
</div><!-- container -->
<?php include 'includes/footer.php'; ?> 