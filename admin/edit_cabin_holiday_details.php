
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit State</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		
		$holiday_day = $_POST["holiday_day"];
		$holiday_date = explode('/',$_POST["holiday_date"]);
		$holiday_date = $holiday_date[2].'-'.$holiday_date[1].'-'.$holiday_date[0];
		$holiday_status = $_POST["holiday_status"];

		$qr = mysqlQuery("SELECT * FROM stork_cabin_holiday WHERE holiday_date='$holiday_date' AND holiday_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Holiday Already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE `stork_cabin_holiday` SET `holiday_day`='$holiday_day',`holiday_date`='$holiday_date',`holiday_status`='$holiday_status' WHERE `holiday_id`=".$val);
			//newly added code when remove edit restrict
			// if(($state_status == 0 && !$_POST['change_status'])||($state_status == 1 && $_POST['change_status'])){
			// 	mysqlQuery("UPDATE `stork_city` SET `city_status`='$state_status' WHERE `city_state_id`=".$val);
			// 	mysqlQuery("UPDATE `stork_area` SET `area_status`='$state_status' WHERE `area_state_id`=".$val);
			// }
			$successMessage = "<div class='container error_message_mandatory'><span> Holiday Updated Successfully! </span></div>";	
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
						<span> Cabin Holiday Details </span>
					</li>
					<li>
						<span>Edit Cabin Holiday Details</span>
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
						<h3 class="acc-title lg">Edit Cabin Holiday Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Cabin Holiday Information</h4>
							<form action="edit_cabin_holiday_details.php?update=<?php echo $id; ?>" id="edit_state" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<?php
									$match = "SELECT * FROM `stork_cabin_holiday` WHERE `holiday_id`='$id'";
									$qry = mysqlQuery($match);
									$numRows = mysql_num_rows($qry); 
									if ($numRows > 0)
									{
										while($row = mysql_fetch_array($qry)) 
										{
								?>	
								<?php if ($row['holiday_status'] == 0){ ?>
								<input type="hidden" name="change_status" class="change_status_value">
								<?php } ?>
								<div class="form-group">
									<?php  $holiday_date=strtotime($row['holiday_date']);
								   
						            $holiday_date = date('d/m/Y', $holiday_date);
						            // echo $date; 
						            ?>
								    <label for="last-name">Holiday Date<span class="required"></span></label>
								   
									<input type="text" class="form-control" autocomplete="off" placeholder="Date" name="holiday_date" id="holiday_date" value="<?php echo $holiday_date; ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Holiday Day<span class="required"></span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Day" name="holiday_day" id="holiday_day" readonly="" value="<?php echo($row['holiday_day']); ?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Status<span class="required">*</span></label>
									<select class="product-type-filter form-control change_status" id="sel_a" name="holiday_status">
								        <option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['holiday_status'] == 1) echo "selected"; ?>>
											<span>Active</span>
										</option>
										<option value="0" <?php if ($row['holiday_status'] == 0) echo "selected"; ?>>
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