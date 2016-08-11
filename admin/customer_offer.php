<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Customer Offer</title>
</head>
<body>
<!-- Php query for delete -->
<?php 
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) 
{
	$val = $_GET['delete'];
	mysqlQuery("DELETE FROM `stork_area` WHERE `area_id`='$val'");
	$isDeleted = true;
	$deleteProduct = true;
}
?>

<?php include 'includes/navbar_admin.php'; ?>
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-9 hidden-xs dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="col-md-3 search-w SC-w hd-pd ">
				<span class="search-icon dropdowSCIcon" title="Search">
					<i class="fa fa-search"></i>
				</span>
				<div class="search-safari" style="display:none;">
					<!-- <div class="search-form dropdowSCContent">
						<form method="POST" action="#">
							<input type="text" name="search" placeholder="Search" />
							<input type="submit" name="search" value="Search">
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
		<a href="assign_customer_offer.php"> <span> Assign Offer </span><span>[+]</span> </a>
	</div>
		<div class="form-edit-info">
			<?php 
				$sql = "SELECT * FROM `stork_offer_provide_all_users`";
				$query = mysqlQuery($sql);
				$count_rows = mysql_num_rows($query);
				if ($count_rows > 0)
				{
			?>
			<table class="cust_thwidth data-table area_table stork_admin_table" id="my-orders-table">
				<thead>
			        <tr class="">
			            <th>User Id</th>
			            <th>Username</th>
			            <th>User Email</th>
			            <th>Usertype</th>
			            <th>Order Id</th>
			            <th>Order Amount</th>
			            <th>Offer Id</th>
			            <th>Offer Filter Amount</th>
			            <th>Email Status</th>
			            <th>Offer Used Status</th>
			            <th>No. Of times Used</th>
			            <th>Limit Status</th>
			            <th>Validity Status</th>
			            <th>Offer Assigned Date</th>			          
			        </tr>
		        </thead>
		        <?php              
					$i = 0;
					while ($fetch = mysql_fetch_array($query))
					{	
			    ?>
			    <tr class="">
		            <td>
			            <?php if($fetch['offer_provided_user_id'] == 0 || $fetch['offer_provided_user_id'] == NULL)
							echo "NULL";
						else
							echo $fetch['offer_provided_user_id'];
						?>
					</td>
		            <td><span class="nobr"><?php echo $fetch['offer_provided_username'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_provided_useremail'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_provided_usertype'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_provided_order_id'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_provided_maximum_amount_in_order'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_id'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_filter_amount'] ?></span></td>
		            <td>
			            <?php if($fetch['is_email_sent'] == 1)
							echo "Sent";
						else
							echo "Not Sent";
						?>
					</td>
					<td>
			            <?php if($fetch['is_used'] == 1)
							echo "Coupon Used";
						else
							echo "Coupon Not Used";
						?>
					</td>  
		            <td><span class="nobr"><?php echo $fetch['limit_used'] ?></span></td>
		            <td>
			            <?php if($fetch['is_limit_status'] == 1)
							echo "Available";
						else
							echo "Not Available";
						?>
					</td> 
					<td>
			            <?php if($fetch['is_validity'] == 1)
							echo "Available";
						else
							echo "Expired";
						?>
					</td> 
					<?php  $createddate=strtotime($fetch['created_date']);			   
			            $date = date('d/m/Y', $createddate);
			            // echo $date; 
		            ?>       
		            <td><span class="price"><?php echo $date; ?></span></td>
			   	</tr>
				<?php } ?>
			</table>
			<?php } else {
				echo "<div class='no_result'> <span> No records found </span> </div>";
			} ?>					
	</div>
	<div class="clearfix"></div>
	<!-- Jquery for delete -->
	<script type="text/javascript" >
		$(document).on("click", ".delete", function () {
		var myId = $(this).data('id');
		$(".modal-body #vId").val( myId );
		$("#del_link").prop("href", "areas.php?delete="+myId);
		});
	</script>
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body delete_message_style">
					<input type="hidden" name="delete" id="vId" autocomplete="off" value=""/>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center>
							<h5>Are you sure you want to delete this item? </h5>
						</center>
				</div>
				<div class="modal-footer footer_model_button">
					<a name="action" id="del_link" class="btn btn-danger" href=""  value="Delete">Yes</a>						
					<button type="button" class="btn btn-info" data-dismiss="modal">No</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>