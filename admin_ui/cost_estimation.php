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
			<div class="col-sm-3 hidden-xs dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="breadcrumb-w col-sm-9">
				<span class="">You are here:</span>
				<ul class="breadcrumb">
					<li>
						<span> Cost Estimation </span>
					</li>
					<li>
						<span> All Cost Estimation </span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<h3 class="acc-title lg"> Cost Estimation</h3>
			<div class="form-edit-info">
				<?php 
					$cost_query = mysqlQuery("SELECT * FROM stork_cost_estimation 
									INNER JOIN stork_paper_print_type ON stork_paper_print_type.paper_print_type_id= stork_cost_estimation.cost_estimation_paper_print_type_id 
									INNER JOIN stork_paper_side ON stork_paper_side.paper_side_id=stork_cost_estimation.cost_estimation_paper_side_id 
									INNER JOIN stork_paper_size ON stork_paper_size.paper_size_id=stork_cost_estimation.cost_estimation_paper_size_id 
									INNER JOIN stork_paper_type ON stork_paper_type.paper_type_id=stork_cost_estimation.cost_estimation_paper_type_id
 									");
					$cost_rows = mysql_num_rows($cost_query);
					if ($cost_rows > 0)
					{
				?>
				<table class="data-table cost_table" id="my-orders-table">
			        <tr class="">
			            <th>Paper Print Type </th>
			            <th>Paper Side</th>
			            <th>Paper Size</th>
			            <th>Paper Type</th>
			            <th>Amount</th>
			            <th>Status</th>
			            <th>Created Date</th>
			            <th>Actions</th>
			        </tr>
			        <?php 
			        while ($cost_array = mysql_fetch_array($cost_query)) {
					?>
				    <tr class="">
			            <td><span class="nobr"><?php echo $cost_array['paper_print_type'] ?></span></td>
			            <td><span class="nobr"><?php echo $cost_array['paper_side'] ?></span></td>
			            <td><span class="nobr"><?php echo $cost_array['paper_size'] ?></span></td>
			            <td><span class="price"><?php echo $cost_array['paper_type'] ?></span></td>
			            <td><span class="price"><?php echo $cost_array['cost_estimation_amount'] ?></span></td>
			            <td><span class="price">
			            	<?php if($cost_array['cost_estimation_status']==1)
									echo "Active";
								  else
									echo "InActive";
							?> </span>
						</td>
			            <td><span class="nobr"><?php echo $cost_array['created_date'] ?></span></td>			           
			            <td class="th_hidden a-center last">
			                <span class="nobr">
			                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_cost_estimation.php?id=<?php echo $cost_array['cost_estimation_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
				                <span class="separator"></span> 
				                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch[''] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
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