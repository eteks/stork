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
		<h3 class="acc-title lg"> Cost Estimation</h3>
			<div class="form-edit-info">
							<table class="data-table" id="my-orders-table">
						        <tr class="">
						            <th>Paper Print Type </th>
						            <th>Paper Side</th>
						            
						            <th>Paper Type</th>
						            <th>Amount</th>
						            <th>Status</th>
						            <th>Created Date</th>
						            <th>Actions</th>

						        </tr>
							    <tr class="">
						            <td>plain</td>
						            <td><span class="nobr">plain side</span></td>
						            
						            <td><span class="price"> A4 </span></td>
						            <td>100</td>
						            <td>Active</td>
						            <td>12/07/2016</td>
						            
						           
						            <td class="th_hidden a-center last">
						                <span class="nobr">
						                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_cost_estimation.php"><i class="fa fa-pencil-square-o "></i> </a>
							                <span class="separator"></span> 
							                <a class="btn btn-xs btn-danger delete" title="Delete" data-id="5" href="#myModal1" data-toggle="modal" id="delete"><i class="fa fa-trash-o"></i> </a>
							            </span>
							        </td>
							   	</tr>
							   
							</table>					
	</div>
	<div class="clearfix"></div>
</div>
</div>
<?php include 'includes/footer.php'; ?>