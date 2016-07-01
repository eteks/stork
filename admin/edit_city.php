<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit City</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$state_id = $_POST['state_id'];
		$city_name = $_POST["city_name"];
		$city_status = $_POST["city_status"];
		$qr = mysqlQuery("SELECT * FROM stork_city WHERE city_name='$city_name' AND city_state_id='$state_id' AND city_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> City Already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_city` SET `city_name`='$city_name',`city_status`='$city_status' WHERE `city_id`=".$val);
			$successMessage = "<div class='container error_message_mandatory'><span> City Updated Successfully! </span></div>";	
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
						<span> City </span>
					</li>
					<li>
						<span>Edit Cities</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php if($successMessage) echo $successMessage; ?>
<div class="container">
 <span class="error_test"> Please fill out all mandatory fields </span>
</div>

<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit City Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">City Information</h4>
							<form action="edit_city.php?update=<?php echo $id; ?>" id="edit_city" method="POST" name="edit-acc-info">
								<?php
									$match = "SELECT * FROM `stork_city` WHERE `city_id`='$id'";
									$qry = mysqlQuery($match);
									$numRows = mysql_num_rows($qry); 
									if ($numRows > 0)
									{
										while($row = mysql_fetch_array($qry)) 
										{
								?>
								<div class="form-group">
								    <label for="first-name">Select State<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="" name="state_id" disabled="true">
								        <option>
											<span>Select State</span>
										</option>
										<?php
					                    $query = mysql_query("select * from stork_state where state_status='1'");
				                        while ($staterow = mysql_fetch_array($query)) {
								        
								        if($row['city_state_id'] == $staterow['state_id'])   
				                        	echo "<option selected value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
				                        else
				                        	echo "<option value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
				                        }
				                        ?>
								    </select>
								    <input type="hidden" name="state_id" value="<?php echo $row['city_state_id'] ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">City Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="cityname" placeholder="City Name" name="city_name" value="<?php echo($row['city_name']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">City Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="city_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['city_status'] == 1) echo "selected"; ?>>
											<span>Active</span>
										</option>
										<option value="0" <?php if ($row['city_status'] == 0) echo "selected"; ?>>
											<span>Inactive</span>
										</option>
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