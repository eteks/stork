<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Cities</title>
</head>
<body>
<!-- Php query for delete -->
<?php 
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) 
{
	$val = $_GET['delete'];
	mysqlQuery("DELETE FROM `stork_city` WHERE `city_id`='$val'");
	$isDeleted = true;
	$deleteProduct = true;
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
		<h3 class="acc-title lg clone_heading"> Cities</h3>
		<div class="clear_both"> </div>
	</div>
			<div class="form-edit-info">
							<?php $sql = "SELECT * FROM `stork_city`"; 
								$query = mysqlQuery($sql);
								$count_rows = mysql_num_rows($query);	
								if ($count_rows > 0)
								{
							?>
							<table class="data-table city_table" id="my-orders-table">
								<thead>
							        <tr class="">
							            <th>City Name</th>	
							            <th>State</th>					            
							            <th>Status</th>
							            <th>Created Date</th>
							            <th class="table_action">Action</th>
							        </tr>
							    </thead>
						        <?php              
								$i = 0;
								while ($fetch = mysql_fetch_array($query))
								{
								$qrystate = mysqlQuery("SELECT * FROM `stork_state` WHERE `state_id`=".$fetch['city_state_id']);
								$rowstate = mysql_fetch_array($qrystate);
								?>
							    <tr class="">						            
						            <td><span class="nobr"><?php echo $fetch['city_name'] ?></span></td>
						            <td><span class="nobr"><?php echo $rowstate['state_name'] ?></span></td>
						            <td>
						            	<span class="price">
						            	<?php if($fetch['city_status']==1)
												echo "Active";
											  else
												echo "InActive";
										?>
						            	</span>
						            </td>
						             <?php  $createddate=strtotime($fetch['create_date']);
								   
						            $date = date('d/m/Y', $createddate);
						             // echo $date; 
						            ?>
						            <td><span class="nobr"><?php echo $date; ?></span></td>
						            <td class="table_action th_hidden a-center last">     
						                <?php 
											$check_in_area = mysqlQuery("SELECT * FROM stork_area WHERE area_city_id='".$fetch['city_id']."'"); 
											$check_in_order = mysqlQuery("SELECT * FROM stork_order WHERE order_shipping_city_id='".$fetch['city_id']."'");
											$check_in_users = mysqlQuery("SELECT * FROM stork_users WHERE user_city_id='".$fetch['city_id']."'");  
											if(mysql_num_rows($check_in_area)>0 || mysql_num_rows($check_in_order)>0 || mysql_num_rows($check_in_users)>0){
						                ?>
							                <span class="nobr">
								                <span class="restrict">
								                	<a title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o ">
								                		<div class="restrict_tooltip">Mapping has been already done. Edit or Delete not possible.</div>
								                	</i> </a>
									            </span>
									            <span class="separator"></span> 
									            <span class="restrict">      
									             	<a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['city_id'] ?>"><i class="fa fa-trash-o">
									             		<div class="restrict_tooltip">Mapping has been already done. Edit or Delete not possible.</div>
									             	</i> </a>
									            </span>
									        </span>
									        <?php } else{ ?>
									        <span class="nobr">
							                	<a title="Edit" class="btn btn-primary btn-xs" href="edit_city.php?id=<?php echo $fetch['city_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
								                <span class="separator"></span> 
								             	<a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['city_id'] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
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
		$("#del_link").prop("href", "city.php?delete="+myId);
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
							<h5>Are you sure you want to delete this Product? </h5>
						</center>
				</div>
				<div class="modal-footer footer_model_button">
					<a name="action" id="del_link" class="btn btn-danger" href=""  value="Delete">Yes</a>						
					<button type="button" class="btn btn-info" data-dismiss="modal">No</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- Delete popup End -->
</div>
</div>
<?php include 'includes/footer.php'; ?>