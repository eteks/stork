<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Customer Offer</title>
</head>
<body>
<!-- Php query for delete -->
<?php 

global $query_filter;
global $filter_amount;
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	if (isset($_POST['offer_generate'])){
		$filter_amount = $_POST["filter_amount"];
		$query_filter = mysql_query("SELECT * FROM `stork_order` where order_total_amount IN (SELECT MAX(order_total_amount) FROM `stork_order` group by order_customer_name, order_customer_email) AND order_total_amount >= '$filter_amount'");
	}
	if (isset($_POST['offer_save'])){
		$checkbox_status = $_POST['checkbox_status'];
		$offer_id = $_POST['offer_id'];
		$user_id = $_POST['user_id'];
		$user_type = $_POST['user_type'];
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$order_id = $_POST['order_id'];
		$order_amount = $_POST['order_amount'];
		$array_data = array_map(null, $checkbox_status, $offer_id, $user_id,$user_type,$user_name,$user_email,$order_id,$order_amount);

		// echo "<pre>";
		// print_r($array_data);
		// echo "</pre>";
		$offer_email_query = mysql_query("SELECT * FROM `stork_offer_details` where offer_type='customer_offer'"); 
		$offer_email_row = mysql_fetch_array($offer_email_query);
		$from_email = "support@printstork.com";
		$headers = "From: " . $from_email . "\r\n";
		$headers .= "Reply-To: ". $from_email . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$email_subject = "Offer Details";
		if($offer_email_row > 0) {
			$offer_code_value = $offer_email_row['offer_code'];
			$today_date=date('y-m-d');
	  		$offer_end_date=date('y-m-d',strtotime($offer_email_row['offer_validity_end_date']));
	  		$expire_date = date('d-M-y',strtotime($offer_end_date));
	  		$offer_amount = $offer_email_row['offer_amount'];
			$offer_eligible_amount = $offer_email_row['offer_eligible_amount'];
			$message = "<html> <body> <div style='margin: 0px auto; width: 50%;'> <h2 style='background: #25bce9; text-align: left; color: #fff; font-weight: bold; font-size: 16px; padding: 10px 4px; margin-bottom: 0px;'> Get ".$offer_amount." cashback on Utility bill payment of above ".$offer_eligible_amount." </h2> <div style='border: 1px solid #25bce9; background: #fff;'> <p style='font-size: 18px; color: grey; margin-top: 23px; text-align: center;'> You can get ".$offer_amount." cashback of Rs ".$offer_eligible_amount.". </p> <p style='margin-top: 20px; text-align: center;'> <span style='color: #25bce9; padding: 5px 10px; font-size: 14px; border: 1px solid #000; border-radius: 5%; text-align: center;'> ".$offer_code_value." </span> </p> <p style='margin-top: 20px; padding-left: 20px; color: gray; text-align: center; font-size: 12px;'> Expires on ".$expire_date." </p> <p style='padding-left: 20px; font-size: 8px; color: gray; text-align: center; font-weight: bold; margin-top: 5px;'> * condition apply </p> </div> </div> </body> </html>";
			if($today_date <= $offer_end_date) {
					$is_validity=1;
			}
			else {
		  		$offer_validity_status = 1;
		  	}
		}
		else {
			$offer_validity_status = 2;
		}
		foreach ($array_data as $key => $value) {

			if($value[0] == 1){
				$offer_id = $value[1];
				if ($value[2] == 0)
					$offer_provided_user_id = "NULL";
				else
					$offer_provided_user_id = $value[2];
				$offer_provided_username = $value[4];
				$offer_provided_useremail = $value[5];
				$offer_provided_usermobile = '';
				$offer_provided_usertype = $value[3];
				$offer_provided_order_id = $value[6];
				$offer_provided_maximum_amount_in_order = $value[7];	
				$offer_filter_start_date = "NULL";
				$offer_filter_end_date = "NULL";
				$is_used = 0;
				$limit_used = 0;
				$is_limit_status = 1;
				$is_validity = 1;
				$status = 1;
				$is_validity_status=$is_validity;
				if($is_validity_status==1) {
					if (mail($offer_provided_useremail, $email_subject, $message, $headers))
				  	{
					    $is_email_sent = 1;
					    $offer_validity_status = 3;
					}
					else {
						 $is_email_sent = 0;
						 $offer_validity_status = 4;
					}
				}
	    	  
			}
		}
		if($offer_validity_status ==1) {
			echo '<script> alert("Offer date has been expired") </script>';
		}
		else if($offer_validity_status ==2) {
			echo '<script> alert("Offer doesnot exists") </script>';
		}
		else if($offer_validity_status ==3) {
			echo '<script> alert("Mail has been sent successfully") </script>';
		}
		else {
			echo '<script> alert("Mail not sent successfully") </script>';
		}
	}
}
?>
<?php include 'includes/navbar_admin.php'; ?>
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="col-md-3 search-w SC-w hd-pd ">
				<span class="search-icon dropdowSCIcon">
					<i class="fa fa-search"></i>
				</span>
				<div class="search-safari" style="display:none;">
					<!-- <div class="search-form dropdowSCContent">
						<form method="POST" action="#">
							<input type="text" name="search" placeholder="Search" class="search"/>
							<input type="submit" value="Search">
							<i class="fa fa-search"></i>
						</form>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12">
	<div class="heading_section col-md-12">
		<h3 class="acc-title lg clone_heading"> Customer Offer</h3>
		<div class="clear_both"> </div>
	</div>
	<div class="add_section">
	<form action="customer_offer.php" id="customer_offer" method="POST">
		<span>Filter Amount</span>
		<input type="text" name="filter_amount">
		<button type="submit" class="gbtn btn-edit-acc-info" name="offer_generate">Generate</button>
	</form>
	</div>
	<?php 
		$count_rows = mysql_num_rows($query_filter);	
		if ($count_rows > 0)
		{
	?>
	<form action="customer_offer.php" method="POST" id="customer_offer_save">
			<div class="form-edit-info">
					<table class="data-table city_table stork_admin_table" id="my-orders-table">
								<thead>
							        <tr class="">
							        	<th></th>
							            <th>User Id</th>	
							            <th>Usertype</th>					            
							            <th>Username</th>
							            <th>User Email</th>
							            <th>Order Id</th>
							            <th>Order Amount</th>
							        </tr>
							    </thead>
						        <?php              
								$i = 0;
								$sql = mysql_query("SELECT * FROM `stork_offer_details` where offer_type='customer_offer'"); 
								$row = mysql_fetch_array($sql);
								while ($fetch = mysql_fetch_array($query_filter))
								{
								?>
							    <tr class="">
							    	<input type="hidden" class="checkbox_status" name="checkbox_status[]" value="0">	
							    	<input type="hidden" name="offer_id[]" value="<?php echo $row['offer_id']?>">	
							    	<input type="hidden" name="user_id[]" value="<?php echo $fetch['order_user_id']?>">
							    	<input type="hidden" name="user_type[]" value="<?php echo $fetch['order_user_type']?>">
							    	<input type="hidden" name="user_name[]" value="<?php echo $fetch['order_customer_name']?>">
							    	<input type="hidden" name="user_email[]" value="<?php echo $fetch['order_customer_email']?>">
							    	<input type="hidden" name="order_id[]" value="<?php echo $fetch['order_id']?>">
							    	<input type="hidden" name="order_amount[]" value="<?php echo $fetch['order_total_amount']?>">
							    	<td><input type="checkbox" class="offer_checkbox"></td>			
							    	<td><span class="nobr"><?php 
						            if($fetch['order_user_id'] == 0)
						            	echo "NULL";
						            else
						            	echo $fetch['order_user_id'];
						            ?></span></td>
						            <td><span class="nobr"><?php echo $fetch['order_user_type'] ?></span></td>
						            <td><span class="nobr"><?php echo $fetch['order_customer_name'] ?></span></td>
						            <td><span class="nobr"><?php echo $fetch['order_customer_email'] ?></span></td>
						            <td><span class="nobr"><?php echo $fetch['order_id'] ?></span></td>
						            <td><span class="nobr"><?php echo $fetch['order_total_amount'] ?></span></td>
							   	</tr>
							   <?php } ?>
					</table>										
		<button type="submit" class="gbtn btn-edit-acc-info" name="offer_save">Save</button>	
	</div>
	</form>
	<?php }  ?>
	<div class="clearfix"></div>
	<!-- Jquery for checkbox selection -->
	<script type="text/javascript" >
		$(document).on("change", ".offer_checkbox", function () {
			if ($(this).prop('checked') == true) {
				$(this).parents('tr').find('.checkbox_status').val(1);
			}
			else{
				$(this).parents('tr').find('.checkbox_status').val(0);
			}
		});
	</script>
</div>
</div>
<?php include 'includes/footer.php'; ?>