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
		<h3 class="acc-title lg clone_heading"> Track order</h3>
		<div class="clear_both"> </div>
	</div>
			<div class="form-edit-info">
				<?php 
					$sql = "SELECT * FROM `stork_order`";
					$query = mysqlQuery($sql);
					$count_rows = mysql_num_rows($query);
					if ($count_rows > 0)
					{
						?>	
					<table class="data-table track_table" id="my-orders-table">
						<thead>
					        <tr class="">		            
					            <th>Order Id</th>
					            <th>UserId</th>
					            <th>Date Of Ordered</th>
					            <th>Order Delivery status</th>
					            <th>Date Of delivered</th>  
					            <th class="table_action">Action</th>
					        </tr>
					    </thead>
					    <?php 
						    while ($fetch = mysql_fetch_array($query))
							{	
						?>
					    <tr class="">
					       <td><?php echo $fetch['order_id'] ?></td>
					       <td>
						       <?php 
							       if ($fetch['order_user_id'] === NULL)
										echo "None";
								   else
										echo $fetch['order_user_id'];
							   ?>
						   </td>				           
				              <?php  $createddate=strtotime($fetch['order_delivery_date']);
								   
						            $date = date('d/m/Y', $createddate);
						            // echo $date; 
						            ?>
						            <td><span class="nobr"><?php echo $date; ?></span></td>
				           <td><?php echo $fetch['order_delivery_status'] ?></td>
				           <td><?php echo $fetch['order_delivery_date'] ?></td>
				           <td class="table_action th_hidden a-center last">
			                <span class="nobr">
			                	<a title="Edit" class="btn  btn-primary btn-xs" href="edit_track_order.php?id=<?php echo $fetch['order_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
				                <span class="separator"></span> 
				                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="5" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
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
</div>
</div>
<?php include 'includes/footer.php'; ?>