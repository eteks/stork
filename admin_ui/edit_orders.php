
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

		$order_customer_name = $_POST["order_customer_name"];
		$order_shipping_line1 = $_POST["order_shipping_line1"];
		$order_shipping_line2 = $_POST["order_shipping_line2"];
		$order_shipping_state = $_POST["order_shipping_state"];
		$order_shipping_city = $_POST["order_shipping_city"];
		$order_shipping_area = $_POST["order_shipping_area"];
		$order_shipping_email = $_POST["order_shipping_email"];
		$order_shipping_mobile = $_POST["order_shipping_mobile"];
		$order_total_items = $_POST["order_total_items"];
		$order_status = $_POST["order_status"];

		if(isset($_POST['student_details'])){
			$order_student = $_POST["order_student"];
			$order_student_year = $_POST["order_student_year"];
			$order_shipping_department = $_POST["order_shipping_department"];
			$order_shipping_college = $_POST["order_shipping_college"];
		}
		else{
			$order_student = NULL;
			$order_student_year = '';
			$order_shipping_department = '';
			$order_shipping_college = NULL;
		}
		mysqlQuery("UPDATE stork_order SET order_customer_name='$order_customer_name',order_student_id='$order_student',order_student_year='$order_student_year',	order_shipping_department='$order_shipping_department',order_shipping_college_id='$order_shipping_college',order_shipping_line1='$order_shipping_line1',order_shipping_line2='$order_shipping_line2',order_shipping_state_id='$order_shipping_state',order_shipping_city='$order_shipping_city',order_shipping_area_id='$order_shipping_area',order_shipping_email='$order_shipping_email',order_shipping_mobile='$order_shipping_mobile',order_total_items='$order_total_items',order_status='$order_status' WHERE order_id=".$val);	
		$successMessage = "<div class='container error_message_mandatory'><span> Order Updated Successfully! </span></div>";	
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
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Order Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Order Information</h4>
							<form action="edit_orders.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_orders">
							<?php 
								$match = "SELECT * FROM `stork_order` WHERE `order_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
							<?php 
							if($row['order_shipping_college_id'] === NULL) {?>
								<div class="form-group">
								    <label for="last-name">Customer Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name1" placeholder="Customer Name" name="order_customer_name" value="<?php echo($row['order_customer_name']); ?>">
								</div>
							<?php } else {?>	
								<input type="hidden" name="student_details"> 
								<div class="form-group">
								    <label for="last-name">Student Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Student Name" name="order_customer_name" value="<?php echo($row['order_customer_name']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Student Id<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Student Id" name="order_student" value="<?php echo($row['order_student_id']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Student Year<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Student Year" name="order_student_year" value="<?php echo($row['order_student_year']); ?>"/>
								</div>
								<div class="form-group">
								    <label for="first-name">Shipping Department<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Firstname" name="order_shipping_department" value="<?php echo($row['order_shipping_department']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Shipping College<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="order_shipping_college">
								        <option>
											<span>Select College</span>
										</option>
								        <?php
						                    $query = mysql_query("select * from stork_college where college_status='1'");
					                        while ($staterow = mysql_fetch_array($query)) {
					                        if($row['order_shipping_college_id'] == $staterow['college_id'])echo "<option selected value='".$staterow['college_id']."'>".$staterow['college_name']."</option>";
					                        else
					                        	echo "<option value='".$staterow['college_id']."'>".$staterow['college_name']."</option>";
					                        }
				                        ?>
								    </select>
								</div>
								<?php } ?>
								<div class="form-group">
								    <label for="last-name">Shipping Address Line1<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name2" placeholder="Shipping Address Line1" name="order_shipping_line1" value="<?php echo($row['order_shipping_line1']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Shipping Address Line2<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name3" placeholder="Shipping Address Line2" name="order_shipping_line2" value="<?php echo($row['order_shipping_line2']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Shipping State<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s5" name="order_shipping_state">
								        <option>
											<span>Select State</span>
										</option>
								        <?php
						                    $query = mysql_query("select * from stork_state where state_status='1'");
					                        while ($staterow = mysql_fetch_array($query)) {
					                        if($row['order_shipping_state_id'] == $staterow['state_id'])echo "<option selected value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
					                        else
					                        	echo "<option value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
					                        }
			                        ?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Shipping City<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name4" placeholder="Shipping City" name="order_shipping_city" value="<?php echo($row['order_shipping_city']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Area<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s6" name="order_shipping_area">
								        <option>
											<span>Select Area</span>
										</option>
								        <?php
					                    $query = mysql_query("select * from stork_area where area_status='1'");
				                        while ($staterow = mysql_fetch_array($query)) {
				                        if($row['order_shipping_area_id'] == $staterow['area_id'])   
				                        	echo "<option selected value='".$staterow['area_id']."'>".$staterow['area_name']."</option>";
				                        else
				                        	echo "<option value='".$staterow['area_id']."'>".$staterow['area_name']."</option>";
				                        }
					                        ?>
			                        ?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Shipping Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name5" placeholder="Shipping Email" name="order_shipping_email" value="<?php echo($row['order_shipping_email']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Shipping Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name6" placeholder="Shipping Mobile" name="order_shipping_mobile" value="<?php echo($row['order_shipping_mobile']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Total Items<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Total Items" name="order_total_items" value="<?php echo($row['order_total_items']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Order status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s7" name="order_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['order_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['order_status'] == 0) echo "selected"; ?>>InActive</option>
								    </select>
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