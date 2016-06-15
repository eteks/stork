<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>  
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<h3 class="acc-title lg"> Colleges</h3>
			<div class="form-edit-info">
							<?php 
								$sql = "SELECT * FROM `stork_college`";
								$query = mysqlQuery($sql);
								$count_rows = mysql_num_rows($query);
								if ($count_rows > 0)
								{
							?>	
							<table class="data-table college_table" id="my-orders-table">
								<thead>
							        <tr class="">
							            <th>College Name</th>
							            <th>Area</th>
							            <!-- <th class="th_hidden"><span class="nobr">Status</span></th> -->
							            <th>Status</th>
							            <th>Created Date</th>
							            <th>Action</th>
							        </tr>
							    </thead>
					        	<?php              
									$i = 0;
									while ($fetch = mysql_fetch_array($query))
									{	
										$qryarea = mysqlQuery("SELECT * FROM `stork_area` WHERE `area_id`=".$fetch['college_area_id']);
										$rowarea = mysql_fetch_array($qryarea);
							    ?>
							   <tr class="">
						            <td><?php echo $fetch['college_name'] ?></td>
						            <td><span class="nobr"><?php echo $rowarea['area_name'] ?></span></td>
						            <td>
						            	<?php if($fetch['college_status']==1)
												echo "Active";
											  else
												echo "InActive";
										?>
						            </td>
						            <td><span class="price"> <?php echo $fetch['create_date'] ?> </span></td>
						            <td class="th_hidden a-center last">
						                <span class="nobr">
						                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_college.php?id=<?php echo $fetch['college_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
							                <span class="separator"></span> 
							               <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch[''] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
							            </span>
							        </td>
							   	</tr>
							    <?php
								}
								?>
							</table>
							<?php } else {
								echo "<div>No College found</div>";
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
<?php include 'includes/footer.php'; ?>