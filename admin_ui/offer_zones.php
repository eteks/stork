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
		<h3 class="acc-title lg"> Offer</h3>
			<div class="form-edit-info">
							<table class="data-table" id="my-orders-table">
						        <tr class="">
						            <th>Area Name</th>
						            <th>State</th>
						            <th class="th_hidden"><span class="nobr">Status</span></th>
						            <th>Created Date</th>
						            <th>Action</th>
						        </tr>
							    <tr class="">
						            <td>Madurai</td>
						            <td><span class="nobr">Tamilnadu</span></td>
						            <td> Active</td>
						            <td><span class="price"> 24/07/16 </span></td>
						            <td class="th_hidden a-center last">
						                <span class="nobr">
						                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_offer_zone.php"><i class="fa fa-pencil-square-o "></i> </a>
							                <span class="separator"></span> 
							               <a class="btn btn-xs btn-danger delete" title="Delete" data-id="<?php echo $fetch['area_id'] ?>" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
							            </span>
							        </td>
							   	</tr>
							   <tr class="">
						            <td>Virudhunagar</td>
						            <td><span class="nobr">Tamilnadu</span></td>
						            <td> Inactive</td>
						            <td><span class="price"> 28/07/16 </span></td>
						            <td class="th_hidden a-center last">
						                <span class="nobr">
						                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_area.php?id=4"><i class="fa fa-pencil-square-o "></i> </a>
							                <span class="separator"></span> 
							                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="5" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
							            </span>
							        </td>
							   	</tr>
							</table>					
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