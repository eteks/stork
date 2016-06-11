<?php
include "includes/header.php";
$error = "";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add New Papersize</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$paper_size = $_POST["paper_size"];
	$papersize_status = $_POST["papersize_status"];
	if($paper_size=="" || $papersize_status=="") {
		// header('Location: add_state.php');
		// exit();
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Please fill all the fields.</b></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_paper_size WHERE paper_size = '$paper_size'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Papersize Already Exists.</b></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_paper_size` (paper_size,paper_size_status) VALUES ('$paper_size','$papersize_status')");
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Papersize Inserted Successfully.</b></div>";
		}
		
	}
} ?>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy">
		<div class="page-title">
			<h2><i class="fa fa-plus-circle color"></i> Add New Papersize </h2> 
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
					<form class="form-horizontal" id="myform" role="form" action="add_paper_size.php" method="post">
						<?php if($successMessage) echo $successMessage; ?>
						<div class="form-group">
							<label class="col-lg-2 control-label">paper size</label>
							<div class="col-lg-10">
								<input id="cat" class="form-control" type="text" value="" placeholder="Paper Size" name="paper_size">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Status</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="papersize_status">
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