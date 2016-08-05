
<?php
include "includes/header.php";;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Offer</title>
</head>
<body>
<?php 	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
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
		$offer_user_type_value = $_POST["offer_Person_type"];

		if($offer_type_value=="" || $offer_title=="" || $offer_code=="" || $offer_start_validity=="" || $offer_end_validity=="" || $offer_amount_type_value=="" || $offer_amount=="" || $offer_limitation=="" || $offer_limitation=="" || $offer_status=="" || $offer_user_type_value =="") {
			$successMessage ="<div class='container error_message_mandatory'><span> Please fill all required(*) fields</span></div>";
		}	
		else{
			$qr = mysql_query("SELECT * FROM stork_offer_details WHERE offer_code = '$offer_code' OR offer_title='$offer_title'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> Offer Already Exists </span></div>";
			} else {
				mysqlQuery("INSERT INTO `stork_offer_details` (offer_type,offer_title,offer_code,offer_user_type,offer_validity_start_date,offer_validity_end_date,offer_amount_type,offer_amount,offer_eligible_amount,offer_usage_limit,offer_status) VALUES ('$offer_type_value','$offer_title','$offer_code','$offer_user_type_value','$offer_start_validity','$offer_end_validity','$offer_amount_type_value','$offer_amount','$offer_eligible_amount','$offer_limitation','$offer_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Offer Inserted Sucessfully! </span></div>";
			}		
		}
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
						<span> Offers </span>
					</li>
					<li>
						<span>Add Offer</span>
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
						<h3 class="acc-title lg">Add Offer Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Offer Information</h4>
							<form action="add_offer.php" id="add_offer" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
 									<span class="error_date"> End date should be greater than Start date </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="first-name">Select Offer Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="offer_type">
								        <option value="">
											<span>Select Offer Type</span>
										</option>
										<?php
											foreach ($offer_type as $key => $value) {
												echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>     
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Offer Title<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Offer Title" id="offertitle" name="offer_title">
								</div>
								<div class="form-group">
								    <label for="last-name">Offer Code<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Offer Code Ex:GEN123" id="offercode" name="offer_code">
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
									<input type="text" class="form-control date_picker" autocomplete="off" placeholder="Start Date" id="startdate" name="offer_start_validity">
									<input type="text" class="form-control date_picker" autocomplete="off" placeholder="End Date" id="enddate" name="offer_end_validity">		
									<div class="clear_both"></div>		
								</div>
								<div class="form-group">
								    <label for="first-name">Select Offer Amount Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_c" name="offer_amount_type">
								        <option value="">
											<span>Select Offer Amount Type</span>
										</option>
										<?php
											foreach ($offer_amount_type as $key => $value) {
												echo "<option value=".$key.">". $value."</option>";
											}
					                    ?>     
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name" id="showoption">Offer cost</label><span class="required">*</span>
									<input type="text" class="form-control" autocomplete="off" placeholder="Offer Amount" id="offeramount" name="offer_amount">
								</div>
								<div class="form-group">
								    <label for="last-name">Eligible Amt for Offer<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="Eligible Amt for Offer" id="eligibleamtforoffer" name="offer_eligible_amount">
								</div>
								<div class="form-group">
								    <label for="last-name">No. Of Limitation used the Offer<span class="required">*</span></label>
									<input type="text" class="form-control" autocomplete="off" placeholder="No. Of Limitation" id="no_of_limitation" name="offer_limitation">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Offer Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_d" name="offer_status">
								        <option value="">
								        	<span>Select Status</span>
										</option>
								        <option value="1">
											<span>Active</span>
										</option>
										<option value="0">
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