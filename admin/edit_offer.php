
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Offer</title>
</head>
<body>
<?php
	if (isset($_GET['update']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
			$val = $_GET['update'];
			$val = mres($val);

			$offer_type_value = $_POST["offer_type"];
			$offer_title = $_POST["offer_title"];
			$offer_code = $_POST["offer_code"];

			$offer_start_validity =  explode('/',$_POST["offer_start_validity"]);
			$offer_start_validity = $offer_start_validity[2].'-'.$offer_start_validity[1].'-'.$offer_start_validity[0];

			$offer_end_validity =  explode('/',$_POST["offer_end_validity"]);
			$offer_end_validity = $offer_end_validity[2].'-'.$offer_end_validity[1].'-'.$offer_end_validity[0];

			$offer_amount_type_value = $_POST["offer_amount_type"];
			$offer_amount = $_POST["offer_amount"];
			$offer_eligible_amount = $_POST["offer_eligible_amount"];
			$offer_limitation = $_POST["offer_limitation"];
			$offer_status = $_POST["offer_status"];
	
			$qr = mysqlQuery("SELECT * FROM stork_offer_details WHERE offer_id NOT IN('$val') AND (offer_code='$offer_code' OR offer_title='$offer_title')");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> Offer Already exists! </span></div>";
			} else {
				mysqlQuery("UPDATE `stork_offer_details` SET offer_type='$offer_type_value',offer_title='$offer_title',offer_code='$offer_code',offer_validity_start_date= '$offer_start_validity',offer_validity_end_date='$offer_end_validity',offer_amount_type='$offer_amount_type_value',offer_amount='$offer_amount',offer_eligible_amount='$offer_eligible_amount',offer_usage_limit='$offer_limitation',offer_status='$offer_status' WHERE `offer_id`=".$val);
				// if(($area_status == 0 && !$_POST['change_status'])||($area_status == 1 && $_POST['change_status'])){
				// 	mysqlQuery("UPDATE `stork_college` SET `college_status`='$area_status' WHERE `college_area_id`=".$val);
				// }
				$successMessage = "<div class='container error_message_mandatory'><span> Offer Updated Successfully! </span></div>";
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
						<span> Offer </span>
					</li>
					<li>
						<span>Edit Offer</span>
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
						<h3 class="acc-title lg">Edit Offer Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Offer Information</h4>
							<form action="edit_offer.php?update=<?php echo $id; ?>" id="edit_offer" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>								
								<?php  
									$match = "SELECT * FROM `stork_offer_details` WHERE `offer_id`='$id'";
									$qry = mysqlQuery($match);
									$numRows = mysql_num_rows($qry); 
									if ($numRows > 0)
									{
										while($row = mysql_fetch_array($qry)) 
										{
								?>
								<?php if ($row['offer_status'] == 0){ ?>
									<input type="hidden" name="change_status" class="change_status_value" value="">
								<?php } ?>
								<div class="form-group">
								    <label for="first-name">Select Offer Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="offer_type">
								        <option value="">
											<span>Select Offer Type</span>
										</option>
										<?php
											foreach ($offer_type as $key => $value) {
												if($row['offer_type'] == $key )
													echo "<option value=".$key." selected>". $value."</option>";
												else
													echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>     
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Offer Title<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Offer Title" id="offertitle" name="offer_title" value="<?php echo $row['offer_title']?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Offer Code<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Offer Code Ex:GEN123" id="offercode" name="offer_code" value="<?php echo $row['offer_code']?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Select Offer For student/Profession/Both<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="offer_Person_type">
								        <option value="">
											<span>Select Offer For student/Profession/Both</span>
										</option>
										<?php
											foreach ($offer_user_type as $key => $value) {
												echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>     
								    </select>
								</div>
								<div class="form-group schedule_block">
								    <label for="last-name">Offer Validity<span class="required">*</span></label>
									<input type="text" class="form-control date_picker" autocomplete="off" placeholder="Start Date" id="startdate" name="offer_start_validity" value="<?php $startdate=strtotime($row['offer_validity_start_date']); $startdate = date('d/m/Y', $startdate); echo $startdate;?>">
									<input type="text" class="form-control date_picker" autocomplete="off" placeholder="End Date" id="enddate" name="offer_end_validity" value="<?php $enddate=strtotime($row['offer_validity_end_date']); $enddate = date('d/m/Y', $enddate); echo $enddate;?>">
									<div class="clear_both"></div>		
								</div>
								<div class="form-group">
								    <label for="first-name">Select Offer Amount Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_c"  name="offer_amount_type">
								        <option value="">
											<span>Select Offer Amount Type</span>
										</option>
										<?php
											foreach ($offer_amount_type as $key => $value) {
												if($row['offer_amount_type'] == $key )
													echo "<option value=".$key." selected>". $value."</option>";
												else
													echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>     
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Offer Amount<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Offer Amount" id="offeramount" name="offer_amount" value="<?php echo $row['offer_amount']?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Eligible Amt for Offer<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Eligible Amt for Offer" id="eligibleamtforoffer" name="offer_eligible_amount" value="<?php echo $row['offer_eligible_amount']?>">
								</div>
								<div class="form-group">
								    <label for="last-name">No. Of Limitation used the Offer<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="No. Of Limitation" id="no_of_limitation" name="offer_limitation" value="<?php echo $row['offer_usage_limit']?>">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Offer Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_d"name="offer_status">
								        <option value="">
								        	<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['offer_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['offer_status'] == 0) echo "selected"; ?>>InActive</option>
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