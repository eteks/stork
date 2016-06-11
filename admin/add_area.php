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
	$state_id = $_POST["state_id"];
	$area_name = $_POST["area_name"];
	$area_status = $_POST["area_status"];
	if($state_id=="" || $area_name=="" || $area_status=="") {
		// header('Location: add_area.php');
		// exit();
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Please fill all the fields.</b></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_area WHERE area_name = '$area_name' AND area_state_id='$state_id'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Area Already Exists.</b></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_area` (area_name,area_state_id,area_status) VALUES ('$area_name','$state_id','$area_status')");
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Area Inserted Successfully.</b></div>";
		}		
	}
} ?>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy">
		<div class="page-title">
			<h2><i class="fa fa-plus-circle color"></i> Add New Area </h2> 
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
					<form class="form-horizontal" id="myform" role="form" action="add_area.php" method="post">
						<?php if($successMessage) echo $successMessage; ?>
						<div class="form-group">
							<label class="col-lg-2 control-label">State</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="state_id" required="">
								<option value="">Select the state</option>
								<?php
			                        $query = mysql_query("select * from stork_state  where state_status='1'");
			                        while ($row = mysql_fetch_array($query)) {
			                            ?>
			                        <option value="<?php echo $row['state_id']; ?>"><?php echo $row['state_name']; ?></option>
			                    <?php } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Area Name</label>
							<div class="col-lg-10">
								<input id="cat" class="form-control" type="text" required="" value="" placeholder="State Name" name="area_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Status</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="area_status">
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