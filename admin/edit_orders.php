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
		
		mysqlQuery("UPDATE stork_order SET order_customer_name='$order_customer_name',order_shipping_line1='$order_shipping_line1',order_shipping_line2='$order_shipping_line2',order_shipping_state_id='$order_shipping_state',order_shipping_city='$order_shipping_city',order_shipping_area_id='$order_shipping_area',order_shipping_email='$order_shipping_email',order_shipping_mobile='$order_shipping_mobile',order_total_items='$order_total_items',order_status='$order_status' WHERE order_id=".$val);
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Order Updated Successfully.</b></div>";			
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
					<form class="form-horizontal" role="form" action="edit_orders.php?update=<?php echo $id; ?>" method="post">
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
							
							<?php 
							if($row['order_shipping_college_id'] === NULL) {?>
								<div class="form-group">
									<label class="col-lg-2 control-label">Customer Name</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="order_customer_name" value="<?php echo($row['order_customer_name']); ?>"/>
									</div>
								</div>
							<?php } else {?>	
								<input type="hidden" name="student_details"> 
								<div class="form-group">
									<label class="col-lg-2 control-label">Student Name</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="order_customer_name" value="<?php echo($row['order_customer_name']); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Student Id</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="order_student" value="<?php echo($row['order_student_id']); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Student Year</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="order_student_year" value="<?php echo($row['order_student_year']); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Shipping Department</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="order_shipping_department" value="<?php echo($row['order_shipping_department']); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Shipping College</label>
									<div class="col-lg-10">
									<select class="form-control" id= "category" name="order_shipping_college">
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
							</div>
							<?php }?>	
							<div class="form-group">
								<label class="col-lg-2 control-label">Shipping Address Line1</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_shipping_line1" value="<?php echo($row['order_shipping_line1']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Shipping Address Line2</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_shipping_line2" value="<?php echo($row['order_shipping_line2']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Shipping State</label>
								<div class="col-lg-10">
								<select class="form-control" id= "category" name="order_shipping_state">
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
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Shipping City</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_shipping_city" value="<?php echo($row['order_shipping_city']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Area</label>
								<div class="col-lg-10">
								<select class="form-control" id= "category" name="order_shipping_area">
								<?php
			                    $query = mysql_query("select * from stork_area where area_status='1'");
		                        while ($staterow = mysql_fetch_array($query)) {
		                        if($row['order_shipping_area_id'] == $staterow['area_id'])   
		                        	echo "<option selected value='".$staterow['area_id']."'>".$staterow['area_name']."</option>";
		                        else
		                        	echo "<option value='".$staterow['area_id']."'>".$staterow['area_name']."</option>";
		                        }
			                        ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Shipping Email</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_shipping_email" value="<?php echo($row['order_shipping_email']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Shipping Mobile</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_shipping_mobile" value="<?php echo($row['order_shipping_mobile']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Total Items</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="order_total_items" value="<?php echo($row['order_total_items']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Order status</label>
								<div class="col-lg-10">
									<select class="form-control" name="order_status">
										<option value="1" <?php if ($row['area_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['area_status'] == 0) echo "selected"; ?>>InActive</option>
										
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