<?php
include "includes/header.php";
if(!isset($_GET['type'])){
  die('<script type="text/javascript">window.location.href="index.php";</script>');
  exit();
 }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Paper Sides</title>
</head>
<body>
<!-- Php query for delete -->
<?php 
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) 
{
	$val = $_GET['delete'];
	mysqlQuery("DELETE FROM `stork_paper_side` WHERE `paper_side_id`='$val'");
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
				<span class="search-icon dropdowSCIcon" title="Search">
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
		<h3 class="acc-title lg clone_heading"> Paper Sides</h3>
		<div class="clear_both"> </div>
	</div>
	<?php
		$type = $_GET['type'];
	?>
	<?php if($type != "project") { ?>
	<div class="add_section">
		<a href="add_paper_side.php?type=<?php echo $type; ?>"> <span> Add </span> <span>[+]</span></a>
	</div>
	<?php } ?>
			<div class="form-edit-info">
				<?php 
					$type_array=array("plain"=>"plain_printing","project"=>"project_printing","multi"=>"multicolor_printing");
	  				$type_name = $type_array[$type];
					$select_type = mysql_query ("SELECT * FROM stork_printing_type WHERE printing_type='$type_name'");
					$printing_type_id = mysql_fetch_array($select_type);
					$printing_type = $printing_type_id ['printing_type_id'];

					$papersides = mysqlQuery("SELECT * FROM `stork_paper_side` WHERE printing_type_id='$printing_type'");
					$papersides_rows = mysql_num_rows($papersides);
					if ($papersides_rows > 0 ) {
				?>
				<table class="data-table paperside_table stork_admin_table" id="my-orders-table">
			        <thead>
				        <tr class="">
				            <th>Paper Side</th>
				            <th>Status</th>
				            <th>Created Date</th>
				            <th class="table_action">Action</th>
				        </tr>
				    </thead>
				    <?php while ($papersides_array = mysql_fetch_array($papersides)) {
				    ?>
				    <tr class="">
			            <td> <span> <?php echo $papersides_array['paper_side'] ?> </span></td>
			            
			            <td> <span> <?php 
			            if ($papersides_array['paper_side_status'] == 1) {
			             	echo "Active" ;
			            }
			            else {
			            	echo "InActive";
			            	}?> </span> 
			            </td>
			            <?php  $createddate=strtotime($papersides_array['created_date']);
								   
						            $date = date('d/m/Y', $createddate);
						            // echo $date; 
						            ?>
						            <td><span class="price"> <?php echo $date; ?> </span></td>
			            <td class="table_action th_hidden a-center last">
			            <?php 
							$check_in_cost_estimation = mysqlQuery("SELECT * FROM stork_cost_estimation WHERE cost_estimation_paper_side_id ='".$papersides_array['paper_side_id']."'"); 
							$check_in_order = mysqlQuery("SELECT * FROM stork_order_details WHERE order_details_paper_size_id='".$papersides_array['paper_side_id']."'"); 
							if(mysql_num_rows($check_in_cost_estimation)>0 || mysql_num_rows($check_in_order)>0){
		                ?>
			                <span class="nobr">
				                <a title="Edit" class="btn  btn-primary btn-xs" href="edit_paper_side.php?id=<?php echo $papersides_array['paper_side_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a> 
					            <span class="separator"></span> 
					            <span class="restrict">
					                <a class="btn btn-xs btn-danger delete" title="Delete"><i class="fa fa-trash-o">
					                	<div class="restrict_tooltip">Mapping has been already done. Edit or Delete not possible.</div>
					                </i> </a>
					            </span>
				            </span>
				        <?php } else{ ?>   
				            <span class="nobr">
				            <?php if($type != 'project') { ?>
			                	<a title="Edit" class="btn  btn-primary btn-xs" href="edit_paper_side.php?type=<?php echo $type; ?>&id=<?php echo $papersides_array['paper_side_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
			                <?php } else { ?>
			                	<span class="restrict">   
			                		<a title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o ">
			                		<div class="restrict_tooltip">Static data.No rights to edit.</div>
				                	</i> </a>
								</span>
			                <?php } ?>
				                <span class="separator"></span> 
				                 <?php if($type != 'project') { ?>
				                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $papersides_array['paper_side_id'] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
				              <?php } else { ?>
				                  <span class="restrict">      
									   	<a class="btn btn-xs btn-danger delete" title="Delete"><i class="fa fa-trash-o">
									  	<div class="restrict_tooltip">Static data.No rights to delete.</div>
									   	</i> </a>
									</span>
								<?php } ?>


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
		$("#del_link").prop("href", "papersides.php?delete="+myId);
		});
	</script>
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