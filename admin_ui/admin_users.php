<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php 
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) 
{
	$val = $_GET['delete'];
	mysqlQuery("DELETE FROM `stork_admin_users` WHERE `adminuser_id`='$val'");
	$isDeleted = true;
	$deleteProduct = true;
}
?>
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
						<span> User </span>
					</li>
					<li>
						<span>Admin User</span>
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
		<h3 class="acc-title lg"> Admin Users</h3>
		<div class="form-edit-info">
			<?php
				$admin_query=mysqlQuery("SELECT * FROM `stork_admin_users`");
				$admin_rows=mysql_num_rows($admin_query);
				if($admin_rows > 0) {
			?>

			<table class="data-table admin_table" id="my-orders-table">
		        <thead>
			        <tr class="">
			            <th>User Name</th>
			            <th>User Type</th>
			            <th>Email</th>
			            <th>Mobile</th>
			            <th>Status</th>
			            <th>Created Date</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <?php 
			    	while($admin_data=mysql_fetch_array($admin_query)) {
			    ?>

			    <tr class="">
		            <td> <span> <?php echo $admin_data['adminuser_username']; ?> </span></td>
		            <td><span class="nobr"> 
		            	<?php if($admin_data['adminuser_type'] == 1) {
		            		echo "Admin";
		            		}
		            		else if($admin_data['adminuser_type'] == 2) {
		            			echo "Superusers";
		            			} ?> 
		            </span></td>
		            <td> <span class="nobr"> <?php echo $admin_data['adminuser_email']; ?> </span> </td>
		            <td><span class="nobr"> <?php echo $admin_data['adminuser_mobile']; ?> </span> </td>
		            <td><span class="price">
		            	<?php if($admin_data['adminuser_status']==1)
								echo "Active";
							  else
								echo "InActive";
						?>
						</span>
					</td>
		            <td><span class="price"> <?php echo $admin_data['adminuser_create_date']; ?> </span></td>
		            <td class="th_hidden a-center last">
		                <span class="nobr">
		                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_admin_users.php?id=<?php echo $admin_data['adminuser_id'] ?>"><i class="fa fa-pencil-square-o "></i> </a>
			                <span class="separator"></span> 
			              <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $admin_data['adminuser_id']; ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
			            </span>
			        </td>
			   	</tr>
			  	<?php } ?>
			</table>
			<?php } else {
					echo "<div class='no_result'> <span> No records found </span> </div>";
			}	?>			
		</div>
		<div class="clearfix"></div>
		<!-- Jquery for delete -->
		<script type="text/javascript" >
			$(document).on("click", ".delete", function () {
			var myId = $(this).data('id');
			$(".modal-body #vId").val( myId );
			$("#del_link").prop("href", "admin_users.php?delete="+myId);
			});
		</script>
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