<?php
include "includes/header.php";
$error = "";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add New Cost Estimation</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$paper_print_type = $_POST["paper_print_type"];
	$paper_side = $_POST["paper_side"];
	$paper_size = $_POST["paper_size"];
	$paper_type = $_POST["paper_type"];
	$amount = $_POST["amount"];
	$cost_estimation_status = $_POST["cost_estimation_status"];
	
	if($paper_print_type=="" || $paper_side=="" || $paper_size=="" || $paper_type=="" || $amount=="" || $cost_estimation_status=="") {
		// header('Location: add_state.php');
		// exit();
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Please fill all the fields.</b></div>";
	}	
	else{
		$qr = mysql_query("SELECT * FROM stork_cost_estimation WHERE cost_estimation_paper_print_type_id = '$paper_print_type' AND cost_estimation_paper_side_id = '$paper_side' AND 	cost_estimation_paper_size_id ='$paper_size' AND cost_estimation_paper_type_id = '$paper_type'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Already Cost Assigned</b></div>";
		} else {
			mysqlQuery("INSERT INTO `stork_cost_estimation` (cost_estimation_paper_print_type_id,cost_estimation_paper_side_id,cost_estimation_paper_size_id,cost_estimation_paper_type_id,cost_estimation_amount,cost_estimation_status) VALUES ('$paper_print_type','$paper_side','$paper_size','$paper_type','$amount','$cost_estimation_status')");
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Cost Assigned Successfully.</b></div>";
		}
		
	}
} ?>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy">
		<div class="page-title">
			<h2><i class="fa fa-plus-circle color"></i> Add New State </h2> 
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
					<form class="form-horizontal" id="myform" role="form" action="add_cost_estimation.php" method="post">
						<?php if($successMessage) echo $successMessage; ?>
						<div class="form-group">
							<label class="col-lg-2 control-label">Paper Print Type</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="paper_print_type" required="">
								<option value="">Select the Paper Print Type</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_print_type");
			                        while ($row = mysql_fetch_array($query)) {
			                            ?>
			                        <option value="<?php echo $row['paper_print_type_id']; ?>"><?php echo $row['paper_print_type']; ?></option>
			                    <?php } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Paper Side</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="paper_side" required="">
								<option value="">Select the Paper Side</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_side");
			                        while ($row = mysql_fetch_array($query)) {
			                            ?>
			                        <option value="<?php echo $row['paper_side_id']; ?>"><?php echo $row['paper_side']; ?></option>
			                    <?php } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Paper Size</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="paper_size" required="">
								<option value="">Select the Paper Size</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_size");
			                        while ($row = mysql_fetch_array($query)) {
			                            ?>
			                        <option value="<?php echo $row['paper_size_id']; ?>"><?php echo $row['paper_size']; ?></option>
			                    <?php } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Paper Type</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="paper_type" required="">
								<option value="">Select the Paper Type</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_type");
			                        while ($row = mysql_fetch_array($query)) {
			                            ?>
			                        <option value="<?php echo $row['paper_type_id']; ?>"><?php echo $row['paper_type']; ?></option>
			                    <?php } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Amount</label>
							<div class="col-lg-10">
								<input id="cat" class="form-control" type="text" required="" value="" placeholder="State Name" name="amount">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Status</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="cost_estimation_status" required="">
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
