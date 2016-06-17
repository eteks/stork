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
		<h3 class="acc-title lg"> PaperType</h3>
			<div class="form-edit-info">
							<table class="data-table" id="my-orders-table">
						        <tr class="">
						          <th>Order Id</th>						            
							            <th>User Id</th>
							            <th>UserType</th>
							            <th>User</th>
							            <th>Customer Name</th>
							            <th>Total Items</th>
							            <th>Email</th>
							            <th>Mobile</th>
							            <th>Address</th>
							            <th>State</th>
							            <th>Area</th>
							            
							            <th>Created Date</th>
							            <th>Status</th>
							            <th>Action</th>
						        </tr>
							    <tr class="">
						             <td>15</td>
						            						            
						      		<td> None</td>
						           <td>Student</td>
						           <td>guest User</td>
						           <td></td>
						           <td>2</td>
						           <td>abc@gmail.com</td>
						           <td>9876543210</td>
						           <td></td>
						           <td>bbbb</td>
						           <td>area2</td>
						           <td>7/7/2016</td>
						           <td>Inactive</td>
						            <td class="th_hidden a-center last">
						                <span class="nobr">
						                	<a title="Edit " class="btn  btn-primary btn-xs" href="edit_order_details.php"><i class="fa fa-pencil-square-o "></i> </a>
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