<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Orders</title>
</head>
<body>  
<!-- Php query for delete -->
<?php 
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) 
{
	$val = $_GET['delete'];
	mysqlQuery("DELETE FROM `stork_cabin_order` WHERE `cabin_order_id`='$val'");
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
		<h3 class="acc-title lg clone_heading"> Cabin Order Details</h3>
		<div class="clear_both"> </div>
	</div>
			<div class="form-edit-info width_order_details">
				<?php
					$sql = "SELECT * FROM `stork_cabin_order`";
					$query = mysqlQuery($sql);
					$count_rows = mysql_num_rows($query);
					if ($count_rows > 0)
					{
				?>	
				<table class="data-table user_table width_order_details_table stork_admin_table" id="my-orders-table" style="width:2000px;">
				  <thead>
			        <tr class="">
			        	<th>Cabin Order Id</th>
						<th>User Id</th>
						<th>UserType</th>
						<th>User</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Timing Type</th>
						<th>Schedule Time Start (HH:MM)</th>
						<th>Schedule Time End (HH:MM)</th>
						<th>Number of System</th>
						<th>Booked Date</th>
						<th>Total Hours</th>
						<th>Amount</th>
						<th>Created Date</th>
						<th>Status</th>
						<th>Action</th>
			        </tr>
			      </thead>
			       <?php              
					$i = 0;
					while ($fetch = mysql_fetch_array($query))
					{		
						// $qryschedule = mysqlQuery("SELECT * FROM `stork_cabin_schedule_time` WHERE `schedule_time_id`=".$fetch['cabin_order_schedule_time_id']);
						// $rowschedule = mysql_fetch_array($qryschedule);
						if (strpos($fetch['cabin_order_schedule_time_id'], '#') !== false)
							$schedule_id= implode(',', array_map('intval', explode('#', $fetch['cabin_order_schedule_time_id'])));
    					else
							$schedule_id = $fetch['cabin_order_schedule_time_id'];
						$qryschedule_start = mysqlQuery("SELECT * FROM `stork_cabin_schedule_time` WHERE schedule_time_id IN ($schedule_id)");
						$qryschedule_end = mysqlQuery("SELECT * FROM `stork_cabin_schedule_time` WHERE schedule_time_id IN ($schedule_id)");
				   ?>
				    <tr class="">
			            <td><?php echo $fetch['cabin_order_id'] ?></td>
			            <td>
			            <?php if($fetch['order_user_id'] == 0 || $fetch['order_user_id'] == NULL)
							echo "NULL";
						else
							echo $fetch['order_user_id'];
						?>
						</td>
			            <td>
				            <?php 
				            echo $fetch['cabin_order_user_type'];
				            /*if($fetch['order_user_type']==1)
								echo "Student";
							else if($fetch['order_user_type']==2)
								echo "Profession"; */
							?>
						</td>
						<td>
						<?php
							if($fetch['order_user_id'] == 0 || $fetch['order_user_id'] == NULL)
								echo "Guest User";
							else
								echo "Registered User";
						?>
						</td>
						<td><?php echo $fetch['cabin_order_user_name'] ?></td>
						<td><?php echo $fetch['cabin_order_email'] ?></td>
						<td><?php echo $fetch['cabin_order_mobile'] ?></td>
						<td><?php 
						foreach ($timing_type as $key => $value) {
			            	if($key == $fetch['cabin_order_timing_type'])
			            		echo $value;
			            }
			            ?></td>
						<td><?php 
						while ($fetch_start = mysql_fetch_array($qryschedule_start)){
							echo $fetch_start['schedule_time_start']."<br>";
						}
						?></td>
			            <td>
			            <?php 
			            while ($fetch_end = mysql_fetch_array($qryschedule_end)){
							echo $fetch_end['schedule_time_end']."<br>";
						} ?></td>
			            <td><?php echo $fetch['cabin_order_number_of_system'] ?></td>
			            <?php  $requireddate=strtotime($fetch['cabin_order_required_date']);
								   
						            $requireddate = date('d/m/Y', $requireddate);
						            // echo $date; 
						            ?>
			            <td><?php echo $requireddate ?></td>
			            <td><?php echo $fetch['cabin_order_total_hours'] ?></td>
			            <td><?php echo $fetch['cabin_order_total_amount'] ?></td>
			             <?php  $createddate=strtotime($fetch['created_date']);
								   
						            $date = date('d/m/Y', $createddate);
						            // echo $date; 
						            ?>
		            	<td><span class="price"> <?php echo $date; ?> </span></td>
			            <td>
				            <?php 
				            if($fetch['order_status']==1)
								echo "Active";
							else
								echo "InActive";
							?>
						</td>
						 <td class="table_action th_hidden a-center last">     
						                <?php 
											$check_in_area = mysqlQuery("SELECT * FROM stork_area WHERE area_state_id='".$fetch['state_id']."'"); 
											$check_in_city = mysqlQuery("SELECT * FROM stork_city WHERE city_state_id='".$fetch['state_id']."'"); 
											$check_in_order = mysqlQuery("SELECT * FROM stork_order WHERE order_shipping_state_id='".$fetch['state_id']."'");
											$check_in_users = mysqlQuery("SELECT * FROM stork_users WHERE user_state_id='".$fetch['state_id']."'");  
											if(mysql_num_rows($check_in_area)>0 || mysql_num_rows($check_in_city)>0 || mysql_num_rows($check_in_order)>0 || mysql_num_rows($check_in_users)>0){
						                ?>
							                <span class="nobr">
								                	<a title="Edit" class="btn btn-primary btn-xs" href="edit_cabin_order_details.php?id=<?php echo $fetch['cabin_order_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>    
									            <span class="separator"></span> 
									            <span class="restrict">      
									             	<a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['cabin_order_id'] ?>"><i class="fa fa-trash-o">
									             		<div class="restrict_tooltip">Mapping has been already done. Edit or Delete not possible.</div>
									             	</i> </a>
									            </span>
									        </span>
									        <?php } else{ ?>
									        <span class="nobr">
							                	<a title="Edit" class="btn btn-primary btn-xs" href="edit_cabin_order_details.php?id=<?php echo $fetch['cabin_order_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
								                <span class="separator"></span> 
								             	<a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['cabin_order_id'] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
								            </span>
							            <?php } ?>
							        </td>
			            
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
		$("#del_link").prop("href", "cabin_order_details.php?delete="+myId);
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