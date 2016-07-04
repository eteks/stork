
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Area</title>
</head>
<body>
<?php
	if (isset($_GET['update']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
			$val = $_GET['update'];
			$val = mres($val);
			$area_state_id = $_POST["area_state_id"];
			$area_city_id = $_POST["area_city_id"];
			$area_name = $_POST["area_name"];
			$area_status = $_POST["area_status"];
			$area_delivery_charge = $_POST["area_delivery_charge"];
			$qr = mysqlQuery("SELECT * FROM stork_area WHERE area_city_id='$area_city_id' AND area_name='$area_name' AND area_id NOT IN('$val')");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> Area Already exists! </span></div>";
			} else {
				mysqlQuery("UPDATE `stork_area` SET area_name='$area_name',area_state_id='$area_state_id',area_city_id='$area_city_id',area_delivery_charge= '$area_delivery_charge',area_status='$area_status' WHERE `area_id`=".$val);
				$successMessage = "<div class='container error_message_mandatory'><span> Area Updated Successfully! </span></div>";
			}
					
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
						<span> Area </span>
					</li>
					<li>
						<span>Edit Area</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Area Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Area Information</h4>
							<form action="edit_area.php?update=<?php echo $id; ?>" id="edit_area" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>								
								<?php  
									$match = "SELECT * FROM `stork_area` WHERE `area_id`='$id'";
									$qry = mysqlQuery($match);
									$numRows = mysql_num_rows($qry); 
									if ($numRows > 0)
									{
										while($row = mysql_fetch_array($qry)) 
										{
								?>
								<div class="form-group">
								    <label for="first-name">State<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="" name="state_id" disabled="true">
								        <option>
											<span>Select State</span>
										</option>
										<?php
					                    $query = mysql_query("select * from stork_state where state_status='1'");
				                        while ($staterow = mysql_fetch_array($query)) {
								        
								        if($row['area_state_id'] == $staterow['state_id'])   
				                        	echo "<option selected value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
				                        else
				                        	echo "<option value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
				                        }
				                        ?>
								    </select>
								    <input type="hidden" name="area_state_id" value="<?php echo $row['area_state_id']?>">
								</div>
								<div class="form-group">
								    <label for="first-name">City<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="" name="city_id" disabled="true">
								        <option>
											<span>Select City</span>
										</option>
										<?php
					                    $query = mysql_query("select * from stork_city where city_status='1'");
				                        while ($cityrow = mysql_fetch_array($query)) {
								        
								        if($row['area_city_id'] == $cityrow['city_id'])   
				                        	echo "<option selected value='".$cityrow['city_id']."'>".$cityrow['city_name']."</option>";
				                        else
				                        	echo "<option value='".$cityrow['city_id']."'>".$cityrow['city_name']."</option>";
				                        }
				                        ?>
								    </select>
								    <input type="hidden" name="area_city_id" value="<?php echo $row['area_city_id']?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Area Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="areaname" autocomplete="off" placeholder="Area Name" name="area_name" value="<?php echo($row['area_name']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Delivery Charge</label>
									<input type="text" class="form-control" id="areaname" autocomplete="off" placeholder="Delivery Charge Ex.:100.50" name="area_delivery_charge" value="<?php echo($row['area_delivery_charge']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Area Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="area_status">
										<option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['area_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['area_status'] == 0) echo "selected"; ?>>InActive</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Save</button>
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