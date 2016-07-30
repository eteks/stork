<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Offers</title>
</head>
<body>
<!-- Php query for delete -->
<?php 
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) 
{
	$val = $_GET['delete'];
	mysqlQuery("DELETE FROM `stork_offer_details` WHERE `offer_id`='$val'");
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
				<span class="search-icon dropdowSCIcon">
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
		<h3 class="acc-title lg clone_heading"> Offers</h3>
		<div class="clear_both"> </div>
	</div>
	<div class="add_section">
		<a href="add_offer.php"> <span> Add </span><span>[+]</span> </a>
	</div>
		<div class="form-edit-info">
			<?php 
				$sql = "SELECT * FROM `stork_offer_details`";
				$query = mysqlQuery($sql);
				$count_rows = mysql_num_rows($query);
				if ($count_rows > 0)
				{
			?>
			<table class="data-table area_table stork_admin_table" id="my-orders-table">
				<thead>
			        <tr class="">
			            <th>Offer Type</th>
			            <th>Offer Title</th>
			            <th>Offer Code</th>
			            <th>Offer Validity Start Date</th>
			            <th>Offer Validity End Date</th>
			            <th>Offer Amount type</th>
			            <th>Offer Amount</th>
			            <th>Eligible Amount for offer</th>
			            <th>Limitation Of Offer</th>
			            <th>Status</th>
			            <th>Created Date</th>
			            <th class="table_action">Action</th>
			        </tr>
		        </thead>
		        <?php              
					$i = 0;
					while ($fetch = mysql_fetch_array($query))
					{	
			    ?>
			    <tr class="">
		            <td><?php echo $fetch['area_name'] ?></td>
		            <td><span class="nobr"><?php echo $fetch['offer_type'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_title'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_code'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_validity_start_date'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_validity_end_date'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_amount_type'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_amount'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_eligible_amount'] ?></span></td>
		            <td><span class="nobr"><?php echo $fetch['offer_usage_limit'] ?></span></td>
		            <td>
		            <?php if($fetch['offer_status'] == 1)
								echo "Active";
							  else
								echo "InActive";
					?>
					</td>
					 <?php  $createddate=strtotime($fetch['created_date']);
								   
						            $date = date('d/m/Y', $createddate);
						            // echo $date; 
						            ?>
			           
		            <td><span class="price"><?php echo $date; ?></span></td>
		            <td class="table_action th_hidden a-center last">
		            <?php 
						$check_in_college = mysqlQuery("SELECT * FROM stork_college WHERE college_area_id='".$fetch['area_id']."'"); 
						$check_in_order = mysqlQuery("SELECT * FROM stork_order WHERE order_shipping_area_id='".$fetch['area_id']."'");
						$check_in_users = mysqlQuery("SELECT * FROM stork_users WHERE user_area_id='".$fetch['area_id']."'");  
						if(mysql_num_rows($check_in_college)>0 || mysql_num_rows($check_in_order)>0 || mysql_num_rows($check_in_users)>0){
	                ?>
		                <span class="nobr">
			                <a title="Edit" class="btn  btn-primary btn-xs" href="edit_area.php?id=<?php echo $fetch['area_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
			                <span class="separator"></span> 
			                <span class="restrict">
				                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['area_id'] ?>"><i class="fa fa-trash-o">
				                	<div class="restrict_tooltip">Mapping has been already done. Edit or Delete not possible.</div>
				                </i> </a>
			                </span>
			            </span>
			        </span>
			        <?php } else{ ?>
			            <span class="nobr">
		                	<a title="Edit" class="btn  btn-primary btn-xs" href="edit_area.php?id=<?php echo $fetch['area_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
			                <span class="separator"></span> 
			                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['area_id'] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
			            </span>
			        <?php } ?>
			        </td>
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