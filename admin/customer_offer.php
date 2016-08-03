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
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	if (isset($_POST['offer_generate'])){
		$filter_amount = $_POST["filter_amount"];
		$query_filter = mysql_query("SELECT * FROM `stork_order` where order_total_amount IN (SELECT MAX(order_total_amount) FROM `stork_order` group by order_customer_name, order_customer_email) AND order_total_amount >= '$filter_amount'");
	}
	// if (isset($_POST['offer_save'])){
	// 	$post_limit = count($_POST['checkbox_status']);
	// 	foreach ($_POST as $key => $value) {
	// 		foreach ($value as $key1 => $value1) {
	// 			// echo $key1;
	// 			echo $value1."<br>";
	// 		}
	// 	}
	// }	
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
	<form action="customer_offer.php" method="POST">
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
							    	<input type="hidden" class="checkbox_status" name="checkbox_status[]" value="">	
							    	<input type="hidden" name="offer_id[]" value="<?php echo $row['offer_id']?>">	
							    	<input type="hidden" name="user_id[]" value="<?php echo $fetch['order_user_id']?>">
							    	<input type="hidden" name="user_type[]" value="<?php echo $fetch['order_user_type']?>">
							    	<input type="hidden" name="user_name[]" value="<?php echo $fetch['order_customer_name']?>">
							    	<input type="hidden" name="user_email[]" value="<?php echo $fetch['order_customer_email']?>">
							    	<input type="hidden" name="order_id[]" value="<?php echo $fetch['order_id']?>">
							    	<input type="hidden" name="filter_amount[]" value="<?php echo $fetch['offer_id']?>">
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