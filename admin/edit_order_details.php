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

	$order_details_paper_print_type = $_POST["order_details_paper_print_type"];
	$order_details_paper_side = $_POST["order_details_paper_side"]; 
	$order_details_paper_size = $_POST["order_details_paper_size"];
	$order_details_paper_type = $_POST["order_details_paper_type"];
	$order_details_total_no_of_pages = $_POST["order_details_total_no_of_pages"];
	$order_details_color_print_pages = $_POST["order_details_color_print_pages"];
	$order_details_comments = $_POST["order_details_comments"];
	$order_details_total_amount = $_POST["order_details_total_amount"];
	$order_details_status = $_POST["order_details_status"];

	
	mysqlQuery("UPDATE stork_order_details SET order_details_paper_print_type_id='$order_details_paper_print_type',order_details_paper_side_id='$order_details_paper_side',order_details_paper_size_id='$order_details_paper_size',order_details_paper_type_id='$order_details_paper_type',order_details_total_no_of_pages='$order_details_total_no_of_pages',order_details_color_print_pages='$order_details_color_print_pages',order_details_comments='$order_details_comments',order_details_total_amount='$order_details_total_amount',order_details_status='$order_details_status' WHERE order_details_id=".$val);
	$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Order Details Updated Successfully.</b></div>";			
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
<title>Edit Order Details</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
	<div class="container" style="margin-top:20px;">
		<?php include 'includes/sidebar.php'; ?>
		<div class="mainy">
			<!-- Page title -->
			<div class="page-title">
				<h2><i class="fa fa-pencil-square color"></i> Edit Order Details </h2> 
				<hr />
			</div>
			<!-- Page title -->
			<div class="row">
				<div class="awidget">
					<form class="form-horizontal" role="form" action="edit_order_details.php?update=<?php echo $id; ?>" method="post">
					<?php 
					if($successMessage) echo $successMessage; 
					$match = "SELECT * FROM `stork_order_details` WHERE `order_details_id`='$id'";
					$qry = mysqlQuery($match);
					$numRows = mysql_num_rows($qry); 
					if ($numRows > 0)
					{
						while($row = mysql_fetch_array($qry)) 
						{
						?>
						<div class="form-group">
							<label class="col-lg-2 control-label">Order ID</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="order_id" value="<?php echo($row['order_id']); ?>" disabled/>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-lg-2 control-label">Order Paper Print Type</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="order_details_paper_print_type" required="">
								<option value="">Select the Paper Print Type</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_print_type");
			                        while ($rowPaperPrintType = mysql_fetch_array($query)) {
			                        if($row['order_details_paper_print_type_id'] == $rowPaperPrintType['paper_print_type_id'])   
										echo "<option selected value='".$rowPaperPrintType['paper_print_type_id']."'>".$rowPaperPrintType['paper_print_type']."</option>";
									else
										echo "<option value='".$rowPaperPrintType['paper_print_type_id']."'>".$rowPaperPrintType['paper_print_type']."</option>";
			                      } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Order Paper Side</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="order_details_paper_side" required="">
								<option value="">Select the Paper Side</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_side");
			                        while ($rowPaperSide = mysql_fetch_array($query)) {
			                        if($row['order_details_paper_side_id'] == $rowPaperSide['paper_side_id'])   
										echo "<option selected value='".$rowPaperSide['paper_side_id']."'>".$rowPaperSide['paper_side']."</option>";
									else
										echo "<option value='".$rowPaperSide['paper_side_id']."'>".$rowPaperSide['paper_side']."</option>";	
			                    } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Order Paper Size</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="order_details_paper_size" required="">
								<option value="">Select the Paper Size</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_size");
			                        while ($rowPaperSize = mysql_fetch_array($query)) {
				                        if($row['order_details_paper_size_id'] == $rowPaperSize['paper_size_id'])   
											echo "<option selected value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";
										else
											echo "<option value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";	
			                        } ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Order Paper Type</label>
							<div class="col-lg-10">
								<select class="form-control" id= "category" name="order_details_paper_type" required="">
								<option value="">Select the Paper Type</option>
								<?php
			                        $query = mysql_query("select * from stork_paper_type");
			                        while ($rowPaperType = mysql_fetch_array($query)) {
				                        if($row['order_details_paper_type_id'] == $rowPaperType['paper_type_id'])   
											echo "<option selected value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";
										else
											echo "<option value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";	
			                    	} ?>
								</select>
							 </div>	
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Total No. Of pages</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="order_details_total_no_of_pages" value="<?php echo($row['order_details_total_no_of_pages']); ?>"/>
							</div>
						</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Color Print Pages</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_details_color_print_pages" value="<?php echo($row['order_details_color_print_pages']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Comments</label>
								<div class="col-lg-10">
									<textarea name="order_details_comments" class="form-control"><?php echo($row['order_details_comments']); ?></textarea>	
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Total Amount</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_details_total_amount" value="<?php echo($row['order_details_total_amount']); ?>"/>	
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-2 control-label">Order Detail status</label>
								<div class="col-lg-10">
									<select class="form-control" name="order_details_status">
										<option value="1" <?php if ($row['order_details_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['order_details_status'] == 0) echo "selected"; ?>>InActive</option>
										
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