<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
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
					$sql = "SELECT * FROM `stork_order_details`";
					$query = mysqlQuery($sql);
					$count_rows = mysql_num_rows($query);
					if ($count_rows > 0)
					{
				?>	
				<table class="data-table user_table width_order_details_table" id="my-orders-table">
				  <thead>
			        <tr class="">
			        	<th>Order Id</th>
						<th>Paper Print Type</th>
						<th>Paper Size</th>
						<th>Paper Side</th>
						<th>Paper Type</th>
						<th>Total No. Of pages</th>
						<th>Color Print Pages</th>
						<th>Comments</th>
						<th>Total Amount</th>
						<th>Uploaded Files</th>
						<th>Created Date</th>
						<th>Order Detail Status</th>
						<th class='table_action'>Action</th>
			        </tr>
			      </thead>
			       <?php              
					$i = 0;
						while ($fetch = mysql_fetch_array($query))
						{		
						$qryorder_details = mysqlQuery("SELECT * FROM stork_order_details as od INNER JOIN stork_paper_print_type as ppt ON ppt.paper_print_type_id=od.order_details_paper_print_type_id INNER JOIN stork_paper_size as psize ON psize.paper_size_id=od.order_details_paper_size_id INNER JOIN stork_paper_side as pside ON pside.paper_side_id=od.order_details_paper_side_id INNER JOIN stork_paper_type as pt ON pt.paper_type_id=od.order_details_paper_type_id");
						$roworder_details = mysql_fetch_array($qryorder_details);
						$qryupload = mysqlQuery("SELECT * from stork_upload_files where upload_files_order_details_id=".$fetch[order_details_id]);
				   ?>
				    <tr class="">
			            <td><?php echo $roworder_details['order_id'] ?></td>
			            <td><?php echo $roworder_details['paper_print_type'] ?></td>
			            <td><?php echo $roworder_details['paper_size'] ?></td>
			            <td><?php echo $roworder_details['paper_side'] ?></td>
			            <td><?php echo $roworder_details['paper_type'] ?></td>
			            <td><?php echo $roworder_details['order_details_total_no_of_pages'] ?></td>
			            <td><?php echo $roworder_details['order_details_color_print_pages'] ?></td>
			            <td><?php echo $roworder_details['order_details_comments'] ?></td>
			            <td><?php echo $roworder_details['order_details_total_amount'] ?></td>
			            <td>
		            	<?php 
			            	while ($rowupload = mysql_fetch_array($qryupload)) {
							echo "<a href='../".$rowupload['upload_files']."' download>".$rowupload['upload_files']."</a><br>";
							}
						?>
						</td>
						<td>
		            		<span class="price"> 
			            		<?php  $createddate=strtotime($fetch['created_date']);
									   $date = date('d/m/Y', $createddate);
							            echo $date; 
							    ?>
						    </span>
						</td>
			            <td>
				            <?php 
				            if($roworder_details['order_details_status']==1)
								echo "Active";
							else
								echo "InActive";
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
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>