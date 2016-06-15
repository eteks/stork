<?php
include "includes/header.php";
$error = "";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add New State</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$area_id = $_POST["area_id"];
	$college_name = $_POST["college_name"];
	$college_status = $_POST["college_status"];
	if($area_id=="" || $college_name=="" || $college_status=="") {
		// header('Location: add_area.php');
		// exit();
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Please fill all the fields.</b></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_college WHERE college_name = '$college_name' AND college_area_id='$area_id'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> College Already Exists.</b></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_college` (college_name,college_area_id,college_status) VALUES ('$college_name','$area_id','$college_status')");
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> College Inserted Successfully.</b></div>";
		}		
	}
} ?>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy">
		<div class="page-title">
			<h2><i class="fa fa-plus-circle color"></i> Add New College </h2> 
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
					<form class="form-horizontal" id="myform" role="form" action="add_college.php" method="post">
					<span class="error_add_college"> Please fill out required fields </span>
						<?php if($successMessage) echo $successMessage; ?>
						<div class="form-group">
							<label class="col-lg-2 control-label">College</label><span>*</span>
							<div class="col-lg-10">
								<select class="form-control" id= "category2" name="area_id">
									<option value="">Select the Area</option>
									<?php
			                        $query = mysql_query("select * from stork_area where area_status='1'");
			                        while ($row = mysql_fetch_array($query)) {
			                        ?>
			                        <option value="<?php echo $row['area_id']; ?>"><?php echo $row['area_name']; ?></option>
			                    <?php } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">College Name</label><span>*</span>
							<div class="col-lg-10">
								<input id="cat" class="form-control" type="text" value="" placeholder="College Name" name="college_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Status</label><span>*</span>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="college_status">
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