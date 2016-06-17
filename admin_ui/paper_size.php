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
						<a href="/">Paper size</a>
					</li>
					<li>
						<span>All Paper size</span>
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
		<h3 class="acc-title lg"> Papersize</h3>
		<div class="form-edit-info">
		<?php 
		$papersize_query = mysqlQuery("SELECT * FROM `stork_paper_size`");
		$papersize_rows = mysql_num_rows($papersize_query);
		if ($papersize_rows > 0 ) {
		?>
		
			<table class="data-table papersize_table" id="my-orders-table">
		        <thead>
			        <tr class="">
			            <th>Paper Size</th>
			            <th>Status</th>
			            <th>Created Date</th>
			            <th>Action</th>
			        </tr>
			      </thead>
		        <?php while($papersize_array=mysql_fetch_array($papersize_query)) {
		        ?>
			    <tr class="">
		            <td> <span> <?php echo $papersize_array['paper_size']; ?></td>
		           	<td> <span> <?php 
		           		if($papersize_array['paper_size_status'] == 1 ) {
		           			echo "Active";
		           		}
		           		else {
		           			echo "InActive";
		           			
		           		} ?> </td>
		            <td><span class="price"> <?php echo $papersize_array['created_date']; ?> </span></td>
		            <td class="th_hidden a-center last">
		                <span class="nobr">
		                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_paper_size.php?id=<?php echo $papersize_array['paper_size_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
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