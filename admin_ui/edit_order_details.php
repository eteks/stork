
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
						<h3 class="acc-title lg">Edit order Details Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Order details Information</h4>
							<form action="edit_order_details.php" id="edit_order_details" method="POST" name="edit-acc-info">
							
								<div class="form-group">
								    <label for="last-name">Order ID<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Order ID<">
								</div>
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper PrintType<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s5">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
											<span>Inactive</span>
										</option>
								    </select>
								    </div>
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper Side<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s6">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
											<span>Inactive</span>
										</option>
								    </select>
								    </div>
								<div class="cate-filter-content">	
								    <label for="first-name">Order Paper Size<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s7">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
											<span>Inactive</span>
										</option>
								    </select>
								</div>
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper Type<span class="required">*</span></label>
										<select class="product-type-filter form-control" id="s8">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
											<span>Inactive</span>
										</option>
								    </select>
								</div>
										
								<div class="form-group">
								    <label for="last-name">Total No.Of Pages<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name1" placeholder="Total No.Of Pages">
								</div>
								<div class="form-group">
								    <label for="last-name">Color Print Pages<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name2" placeholder="Color Print Pages">
								</div>
								<div class="form-group">
								    <label for="last-name">Comments<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name3" placeholder="Comments">
								</div>
								<div class="form-group">
								    <label for="last-name">Total Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" maxlength=10 placeholder="Total Amount">
								</div>

											<div class="cate-filter-content">	
								    <label for="first-name">Order Detail Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s9">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
											<span>Inactive</span>
										</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Save</button>
								</div>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 