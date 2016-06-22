<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);

		$order_delivery_status = $_POST["order_delivery_status"];
		$order_delivery_date = $_POST["order_delivery_date"];

		mysqlQuery("UPDATE stork_order SET order_delivery_status='$order_delivery_status',order_delivery_date='$order_delivery_date' WHERE order_id=".$val);
		$successMessage = "<div class='container error_message_mandatory'><span> Order Status Updated Successfully! </span></div>";	
	}
}
$id=$val;
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
						<a href="/">Order</a>
					</li>
					<li>
						<span>Edit Orders</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
 <span class="error_test"> Please fill out all mandatory fields </span>
</div>
<?php if($successMessage) echo $successMessage; ?>

<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Track Order Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Track Order Information</h4>
							<form action="edit_track_order.php?update=<?php echo $id; ?>" id="edit_track_order" method="POST" name="edit-acc-info">
							<?php 
								$match = "SELECT * FROM `stork_order` WHERE `order_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{ 
									while($row = mysql_fetch_array($qry)) 
									{
							?>
								<div class="form-group">
								    <label for="last-name">Order User ID<span class="required">*</span></label>
									<input type="text" class="form-control" id="orderuserid" placeholder="Order User ID" name="order_user_id" value="<?php if ($row['order_user_id'] === NULL) echo "None"; else echo($row['order_user_id']); ?>" disabled>
								</div>
								<div class="form-group">
								    <label for="last-name">Order ID<span class="required">*</span></label>
									<input type="text" class="form-control" id="orderid" placeholder="Order ID" name="order_id" value="<?php echo($row['order_id']); ?>" disabled/>
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Order Delivery Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="order_delivery_status">
								        <option>
											<span>Select Order Status</span>
										</option>
								        <option value="processed" <?php if ($row['order_delivery_status'] == "confirmed") echo "selected"; ?>>Confirmed</option>
										<option value="completed" <?php if ($row['order_delivery_status'] == "completed") echo "selected"; ?>>Completed</option>
										<option value="shipped" <?php if ($row['order_delivery_status'] == "shipped") echo "selected"; ?>>Shipped</option>
										<option value="delivered" <?php if ($row['order_delivery_status'] == "delivered") echo "selected"; ?>>Delivered</option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Date Of Delivered<span class="required">*</span></label>
									<input type="text" class="form-control" id="dateofdelivered" placeholder="Date Of Delivered" autocomplete="off" name="order_delivery_date" value="<?php echo($row['order_delivery_date']); ?>">
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
								</div>
								<?php 
								} 
								}
								?>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 
