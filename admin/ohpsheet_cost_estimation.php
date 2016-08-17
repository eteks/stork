<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OHP Sheet Cost Estimation</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="col-md-3 search-w SC-w hd-pd ">
				<span class="search-icon dropdowSCIcon" title="Search">
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
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12">
	<div class="heading_section col-md-12">
		<h3 class="acc-title lg clone_heading"> OHP Sheet Cost Estimation</h3>
		<div class="clear_both"> </div>
	</div>
			<div class="form-edit-info">
							<?php 
								$sql = "SELECT * FROM `stork_cost_estimation_ohpsheet` ORDER BY created_date DESC"; 
								$query = mysqlQuery($sql);
								$count_rows = mysql_num_rows($query);	
								if ($count_rows > 0)
								{
							?>
							<table class="data-table state_table stork_admin_table" id="my-orders-table">
								<thead>
							        <tr class="">
							            <th>OHP Sheet Cost</th>						            
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
						            <td><span class="nobr"><?php echo $fetch['ohpsheet_amount'] ?></span></td>
						            <td>
						            	<span class="price">
						            	<?php if($fetch['ohpsheet_status']==1)
												echo "Active";
											  else
												echo "InActive";
										?>
						            	</span>
						            </td>
						             <?php  $createddate=strtotime($fetch['created_date']);
								   
						            $date = date('d/m/Y', $createddate);
						            // echo $date; 
						            ?>
						            <td><span class="nobr"><?php echo $date; ?></span></td>
						            <td class="table_action th_hidden a-center last">     
								        <span class="nobr">
						                	<a title="Edit" class="btn btn-primary btn-xs" href="edit_ohpsheet_cost_estimation.php?id=<?php echo $fetch['ohpsheet_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
							            </span>
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
		$("#del_link").prop("href", "states.php?delete="+myId);
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
	<!-- Delete popup End -->
</div>
</div>
<?php include 'includes/footer.php'; ?>