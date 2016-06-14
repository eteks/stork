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

		$order_delivery_status = $_POST["order_delivery_status"];
		$order_delivery_date = $_POST["order_delivery_date"];

		mysqlQuery("UPDATE stork_order SET order_delivery_status='$order_delivery_status',order_delivery_date='$order_delivery_date' WHERE order_id=".$val);
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Order Status Updated Successfully.</b></div>";			
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
<title>Edit Orders</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
	<div class="container" style="margin-top:20px;">
		<?php include 'includes/sidebar.php'; ?>
		<div class="mainy">
			<!-- Page title -->
			<div class="page-title">
				<h2><i class="fa fa-pencil-square color"></i> Edit Orders </h2> 
				<hr />
			</div>
			<!-- Page title -->
			<div class="row">
				<div class="awidget">
					<form class="form-horizontal" role="form" action="edit_track_order.php?update=<?php echo $id; ?>" method="post">
					<?php 
					if($successMessage) echo $successMessage; 
					$match = "SELECT * FROM `stork_order` WHERE `order_id`='$id'";
					$qry = mysqlQuery($match);
					$numRows = mysql_num_rows($qry); 
					if ($numRows > 0)
					{ 
						while($row = mysql_fetch_array($qry)) 
						{
						?>
						
						<div class="form-group">
							<label class="col-lg-2 control-label">Order User ID</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="order_user_id" value="<?php echo($row['order_user_id']); ?>" disabled/>
							</div>
						</div> 
						<div class="form-group">
							<label class="col-lg-2 control-label">Order ID</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="order_id" value="<?php echo($row['order_id']); ?>" disabled/>
							</div>
						</div>	
					   
						<div class="form-group">
							<label class="col-lg-2 control-label">Order Delivery Status</label>
							<div class="col-lg-10">
							<select class="form-control" id= "category" name="order_delivery_status">
								<option value="">Select Order Status</option>
								<option value="processed" <?php if ($row['order_delivery_status'] == "processed") echo "selected"; ?>>Processed</option>
								<option value="completed" <?php if ($row['order_delivery_status'] == "completed") echo "selected"; ?>>Completed</option>
								<option value="shipped" <?php if ($row['order_delivery_status'] == "shipped") echo "selected"; ?>>Shipped</option>
								<option value="delivered" <?php if ($row['order_delivery_status'] == "delivered") echo "selected"; ?>>Delivered</option>
							</select>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-lg-2 control-label">Date of Delivered</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="order_delivery_date" value="<?php echo($row['order_delivery_date']); ?>"/>
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