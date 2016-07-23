<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Order Details</title>
</head>
<body>  
<?php 
$printbooking_type = array('plain_printing' => 'Plain Printing','project_printing' => 'Project Printing','multicolor_printing' => 'Mutlticolor Printing');
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
				<!-- 	<div class="search-form dropdowSCContent">
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
		<h3 class="acc-title lg clone_heading"> Order details</h3>
		<div class="clear_both"> </div>
	</div>
			<div class="form-edit-info width_order_details">
				<?php
					$qryorder_details = mysqlQuery("SELECT * FROM stork_order_details as od INNER JOIN stork_paper_print_type as ppt ON ppt.paper_print_type_id=od.order_details_paper_print_type_id INNER JOIN stork_paper_size as psize ON psize.paper_size_id=od.order_details_paper_size_id INNER JOIN stork_paper_side as pside ON pside.paper_side_id=od.order_details_paper_side_id INNER JOIN stork_paper_type as pt ON pt.paper_type_id=od.order_details_paper_type_id");
						$count_rows = mysql_num_rows($qryorder_details);
					if ($count_rows > 0)
					{
				?>	
				<table class="data-table user_table width_order_details_table stork_admin_table" id="my-orders-table" style="width:2400px;">
				  <thead>
			        <tr class="">
			        	<th>Order Id</th>
			        	<th>Order Print Booking Type</th>
						<th>Paper Print Type</th>
						<th>Paper Size</th>
						<th>Paper Side</th>
						<th>Paper Type</th>
						<th>Is Binding</th>
						<th>Binding Type</th>
						<th>Total No. Of pages</th>
						<!--<th>Color Print Pages</th> -->
						<th>Comments</th>
						<th>Total Amount</th>
						<th>Uploaded Files</th>
						<!-- <th>Created Date</th>
						<th>Order Detail Status</th> -->
						<th class='table_action'>Action</th>
			        </tr>
			      </thead>
			       <?php              
						while ($fetch = mysql_fetch_array($qryorder_details))
						{	
						$qryupload = mysqlQuery("SELECT * from stork_upload_files where upload_files_order_details_id=".$fetch[order_details_id]);		
				   ?>
				    <tr class="">
			            <td><?php echo $fetch['order_id'] ?></td>
			            <td>
				            <?php 
				            	foreach($printbooking_type as $key => $value){
				            		if($key == $fetch['order_print_booking_type'])
				            			echo $value;
				            	}
				            ?> 	
			            </td>
			            <td><?php echo $fetch['paper_print_type'] ?></td>
			            <td><?php echo $fetch['paper_size'] ?></td>
			            <td><?php echo $fetch['paper_side'] ?></td>
			            <td><?php echo $fetch['paper_type'] ?></td>
			            <?php if($fetch['order_details_is_binding'] == 1){ ?>
				            <td>Yes</td>
				            <td><?php echo $fetch['order_details_binding_type'] ?></td>
				        <?php } else{ ?>
				        	<td>No</td>
				        	<td>-</td>
				        <?php } ?>
			            <td><?php echo $fetch['order_details_total_no_of_pages'] ?></td>
			            <!-- <td><?php echo $fetch['order_details_color_print_pages'] ?></td> -->
			            <td><?php echo $fetch['order_details_comments'] ?></td>
			            <td><?php echo $fetch['order_details_total_amount'] ?></td>
			            <td id="pad_uploadfile">
		            	<?php 
		            		if (mysql_num_rows($qryupload) > 0) {
			            		echo "<table><tr><th>File</th><th>File Type</th><th>Color Print Pages</th></tr>";
				            	while ($rowupload = mysql_fetch_array($qryupload)) {
				            	echo "<tr><td><a href='../".$rowupload['upload_files']."' download>".$rowupload['upload_files']."</a></td><td>".$rowupload['upload_files_type']."</td><td>".$rowupload['upload_files_color_print_pages']."</td></tr>";
								// echo "<a href='../".$rowupload['upload_files']."' download>".$rowupload['upload_files']."</a><br>";
								}
								echo "</table>";
							}
							else{
								echo "-";
							}
						?>
						</td>
			            <td class="table_action th_hidden a-center last">
			                <span class="nobr">
			                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_order_details.php?id=<?php echo $fetch['order_details_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
				                <span class="separator"></span> 
				                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['user_id'] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
				            </span>
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
</div>
<?php include 'includes/footer.php'; ?>