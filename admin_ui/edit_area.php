
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
			$area_state_id = $_POST["state_id"];
			$area_name = $_POST["area_name"];
			$area_status = $_POST["area_status"];
			$qr = mysqlQuery("SELECT * FROM stork_area WHERE area_state_id='$area_state_id' AND area_name='$area_name' AND area_id NOT IN('$val')");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> Area Already exists! </span></div>";
			} else {
				mysqlQuery("UPDATE `stork_area` SET `area_name`='$area_name',`area_status`='$area_status',`area_state_id`='$area_state_id' WHERE `area_id`=".$val);
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
						<a href="/">Area</a>
					</li>
					<li>
						<span>Edit Area</span>
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
						<h3 class="acc-title lg">Edit Area Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Area Information</h4>
							<form action="edit_area.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info">
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
									<select class="product-type-filter form-control" id="sel1" name="state_id">
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
								</div>
								<div class="form-group">
								    <label for="last-name">Area Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name" name="area_name" value="<?php echo($row['area_name']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Area Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1" name="area_status">
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