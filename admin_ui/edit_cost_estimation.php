<?php
include "includes/header.php";
$error = "";
$csrfError = false;
$csrfVariable = 'csrf_' . basename($_SERVER['PHP_SELF']);
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);

		$paper_print_type = $_POST["paper_print_type"];
		$paper_side = $_POST["paper_side"];
		$paper_size = $_POST["paper_size"];
		$paper_type = $_POST["paper_type"];
		$amount = $_POST["amount"];
		$cost_estimation_status = $_POST["cost_estimation_status"];
		$qr = mysqlQuery("SELECT * FROM `stork_cost_estimation` WHERE cost_estimation_paper_print_type_id='$paper_print_type' AND cost_estimation_paper_side_id='$paper_side' AND cost_estimation_paper_size_id='$paper_size' AND cost_estimation_paper_type_id='$paper_type' AND cost_estimation_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Already Cost Assigned</b></div>";	
		} else {
			
			mysqlQuery("UPDATE `stork_cost_estimation` SET cost_estimation_paper_print_type_id='$paper_print_type',cost_estimation_paper_side_id='$paper_side',cost_estimation_paper_size_id='$paper_size',cost_estimation_paper_type_id='$paper_type',cost_estimation_amount='$amount', cost_estimation_status='$cost_estimation_status' WHERE cost_estimation_id=".$val);

			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Cost Assigned Successfully.</b></div>";	
		}
				
	}
	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
if(isset($_POST['title']))
{
	if($_SESSION[$csrfVariable] != $_POST['csrf'])
		$csrfError = true;
	$id = $_GET['id'];
	$title = htmlspecialchars($_POST["title"]);
	$description = mysql_real_escape_string($_POST["description"]);
	$screens = $_POST["screens"];
	$cat = $_POST["category"];
	$image = $_POST["image"];
	$url = $_POST["url"];
	$demo = $_POST["demo"];
	$price = $_POST["price"];
	$tags = $_POST["tags"];
	$rating = $_POST["rating"];
	if(strlen($title)<5 || strlen($title)>50)
		$error .="o. Title Must Be Between 5 to 50 Characters<br />";
	if(!validUrl($url))
		$error .="o. Invalid Purchase URL<br />";
	if(!is_numeric($price))
		$error .="o. Price Is Not In Valid Format<br />";
	if($error=="" && !$csrfError)
	{
		updateProductDb($id,$cat,$title,$description,$screens,$image,$url,$demo,$price,$tags,$rating);
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b>  Product saved Successfully.</b></div>";
	}
}
$key = sha1(microtime());
$_SESSION[$csrfVariable] = $key;
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Edit Cost Estimation</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
	<div class="container" style="margin-top:20px;">
		<?php include 'includes/sidebar.php'; ?>
		<div class="mainy">
			<!-- Page title -->
			<div class="page-title">
				<h2><i class="fa fa-pencil-square color"></i> Edit Cost Estimation </h2> 
				<hr />
			</div>
			<!-- Page title -->
			<div class="row">
				<div class="awidget">
					<form class="form-horizontal" role="form" action="edit_cost_estimation.php?update=<?php echo $id; ?>" method="post">
					<?php 
					if($successMessage) echo $successMessage; 
					$match = "SELECT * FROM `stork_cost_estimation` WHERE `cost_estimation_id`='$id'";
					$qry = mysqlQuery($match);
					$numRows = mysql_num_rows($qry); 
					if ($numRows > 0)
					{
						while($row = mysql_fetch_array($qry)) 
						{
						?>
						<div class="form-group">
							<label class="col-lg-2 control-label">Paper Print Type</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="paper_print_type" required="">
								<option value="">Select the Paper Print Type</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_print_type");
			                        while ($rowPaperPrintType = mysql_fetch_array($query)) {
			                        if($row['cost_estimation_paper_print_type_id'] == $rowPaperPrintType['paper_print_type_id'])   
										echo "<option selected value='".$rowPaperPrintType['paper_print_type_id']."'>".$rowPaperPrintType['paper_print_type']."</option>";
									else
										echo "<option value='".$rowPaperPrintType['paper_print_type_id']."'>".$rowPaperPrintType['paper_print_type']."</option>";
			                      } ?>
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
			                        while ($rowPaperSide = mysql_fetch_array($query)) {
			                        if($row['cost_estimation_paper_side_id'] == $rowPaperSide['paper_side_id'])   
										echo "<option selected value='".$rowPaperSide['paper_side_id']."'>".$rowPaperSide['paper_side']."</option>";
									else
										echo "<option value='".$rowPaperSide['paper_side_id']."'>".$rowPaperSide['paper_side']."</option>";	
			                    } ?>
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
			                        while ($rowPaperSize = mysql_fetch_array($query)) {
				                        if($row['cost_estimation_paper_size_id'] == $rowPaperSize['paper_size_id'])   
											echo "<option selected value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";
										else
											echo "<option value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";	
			                        } ?>
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
			                        while ($rowPaperType = mysql_fetch_array($query)) {
				                        if($row['cost_estimation_paper_type_id'] == $rowPaperType['paper_type_id'])   
											echo "<option selected value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";
										else
											echo "<option value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";	
			                    	} ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Amount</label>
							<div class="col-lg-10">
								<input id="cat" class="form-control" type="text" required="" value="<?php echo($row['cost_estimation_amount']); ?>" placeholder="State Name" name="amount">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Status</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="cost_estimation_status" required="">
									<option value="1" <?php if ($row['cost_estimation_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['cost_estimation_status'] == 0) echo "selected"; ?>>InActive</option>
								</select>
							 </div>
						</div>
						<hr />
							<input type="hidden" name="csrf" value="<?php echo $key; ?>" />
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button type="submit" name="submit" class="btn btn-success" value="Add"><i class="fa fa-floppy-o"></i> Update</button> 
								
								</div>
							</div>
						<?php 
						} 
						}
						?>
						</form>
						<?php              
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div> 
</div>
<?php include 'includes/footer.php'; ?>
<script>
	$(document).ready(function () 
	{
		$('#teg').tagsInput({
		// my parameters here
		});
		$('.alert-success').delay(2000).fadeOut();
	});
</script>