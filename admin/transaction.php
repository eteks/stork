<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Transaction Details</title>
</head>
<body>  
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
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<div class="heading_section col-md-12">
		<h3 class="acc-title lg clone_heading"> Transaction Details</h3>
		<div class="clear_both"> </div>
	</div>
			<div class="form-edit-info width_order_details">
				<?php
					$sql = "SELECT * FROM stork_ccavenue_transaction ORDER BY create_date DESC";
					$query = mysqlQuery($sql);
					$count_rows = mysql_num_rows($query);
					if ($count_rows > 0)
					{
				?>	
				<table class="data-table transaction_table width_order_details_table stork_admin_table" id="my-orders-table">
				  <thead>
			        <tr class="">
			        	<th>Order No.</th>
			        	<th>User Id</th>
						<th>Tracking Id</th>
						<th>Bank Reference Number</th>
						<th>Payment Mode</th>
						<th>Card Name</th>			
						<th>Amount</th>
						<th>Currency</th>
						<th>Status Code</th>
						<th>Status Message</th>
						<th>Created Date</th>
			        </tr>
			      </thead>
			       <?php              
					$i = 0;
					while ($fetch = mysql_fetch_array($query))
					{		
				   ?>
				    <tr class="">
			            <td><?php echo $fetch['order_id'] ?></td>
			            <td>
			            <?php if ($fetch['user_id'] === NULL)
							echo "None";
						else
							echo $fetch['user_id'];
						?>
						</td>
						<td><?php echo $fetch['tracking_id'] ?></td>	
						<td><?php echo $fetch['bank_referrence_number'] ?></td>
						<td><?php echo $fetch['payment_mode'] ?></td>
						<td><?php echo $fetch['card_name'] ?></td>
						<td><?php echo $fetch['amount'] ?></td>
			            <td><?php echo $fetch['currency'] ?></td>
			            <td><?php echo $fetch['status_code'] ?></td>
			            <td><?php echo $fetch['status_message'] ?></td>
			            <?php  $createddate=strtotime($fetch['create_date']);
								   
						            $date = date('d/m/Y', $createddate);
						            // echo $date; 
						            ?>
		            	<td><span class="price"><?php echo $date; ?></span></td>
				   	</tr>
				   <?php
					}
					?>
				</table>
			<?php
			}
			else
			{
				echo "<div class='no_result'> <span> No records found </span> </div>";
			} ?>					
	</div>
	<div class="clearfix"></div>
	<!-- Jquery for delete -->
	<script type="text/javascript" >
		$(document).on("click", ".delete", function () {
		var myId = $(this).data('id');
		$(".modal-body #vId").val( myId );
		$("#del_link").prop("href", "orders.php?delete="+myId);
		});
	</script>
	<!-- Delete popup Start -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body delete_message_style">
					<input type="hidden" name="delete" id="vId" value=""/>
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