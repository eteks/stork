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
		<h3 class="acc-title lg"> States</h3>
			<div class="form-edit-info">
							<?php $sql = "SELECT * FROM `stork_state`"; 
								$query = mysqlQuery($sql);
								$count_rows = mysql_num_rows($query);	
								if ($count_rows > 0)
								{
							?>
							<table class="data-table" id="my-orders-table">
						        <tr class="">
						            <th>State Name</th>						            
						            <th>Status</th>
						            <th>Created Date</th>
						            <th>Action</th>
						        </tr>
						        <?php              
								$i = 0;
								while ($fetch = mysql_fetch_array($query))
								{
								$qryCategory = mysqlQuery("SELECT * FROM `categories` WHERE `id`=".$fetch['cid']);
								$rowCategory = mysql_fetch_array($qryCategory);
								?>
							    <tr class="">						            
						            <td><span class="nobr"><?php echo $fetch['state_name'] ?></span></td>
						            <td>
						            	<span class="price">
						            	<?php if($fetch['state_status']==1)
												echo "Active";
											  else
												echo "InActive";
										?>
						            	</span>
						            </td>
						            <td><span class="nobr"><?php echo $fetch['created_date'] ?></span></td>
						            <td class="th_hidden a-center last">
						                <span class="nobr">
						                	<a title="Edit" class="btn  btn-primary btn-xs" href="edit_state.php?id=<?php echo $fetch['state_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
							                <span class="separator"></span> 
							                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['state_id'] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
							            </span>
							        </td>
							   	</tr>
							   <?php } ?>
							</table>
							<?php } else {
								echo "<div>No states found</div>";
							} ?>
										
	</div>
	<div class="clearfix"></div>
</div>
</div>
<?php include 'includes/footer.php'; ?>