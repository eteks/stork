<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Printing Type</title>
</head>
<body>
<!-- Php query for delete -->
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
		<h3 class="acc-title lg clone_heading"> Printing Types</h3>
		<div class="clear_both"> </div>
	</div>
			<div class="form-edit-info">
							<?php 
								$printbooking_type = array('plain_printing' => 'Plain Printing','project_printing' => 'Project Printing','multicolor_printing' => 'Mutlticolor Printing');
								$sql = "SELECT * FROM `stork_printing_type`"; 
								$query = mysqlQuery($sql);
								$count_rows = mysql_num_rows($query);	
								if ($count_rows > 0)
								{
							?>
							<table class="data-table state_table stork_admin_table" id="my-orders-table">
								<thead>
							        <tr class="">
							            <th>Printing Type</th>						            
							            <th>Status</th>
							            <th>Created Date</th>
							            <th class="table_action sorting">Action</th>
							        </tr>
							    </thead>
						        <?php              
								$i = 0;
								while ($fetch = mysql_fetch_array($query))
								{
								?>
							    <tr class="">						            
						            <td><span class="nobr">
						            <?php 
						            foreach($printbooking_type as $key=>$value){
						            	if($key == $fetch['printing_type'])
						            		echo $value;   	
						            }
						            ?>
						            </span></td>
						            <td>
						            	<span class="price">
						            	<?php if($fetch['printing_type_status']==1)
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
						                	<span class="restrict">      
							                	<a title="Edit" class="btn  btn-primary btn-xs"><i class="fa fa-pencil-square-o ">
							                		<div class="restrict_tooltip">Static data.No rights to edit.</div>
							                	</i> </a>
											</span>
							                <span class="separator"></span> 
							                  <span class="restrict">      
												   	<a class="btn btn-xs btn-danger delete" title="Delete"><i class="fa fa-trash-o">
												  	<div class="restrict_tooltip">Static data.No rights to delete.</div>
												   	</i> </a>
												</span>
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