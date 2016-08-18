
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Admin User</title>
</head>
<body>
<?php
if (isset($_POST['add_admin_users']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$adminuser_username = $_POST["adminuser_username"];
		$adminuser_password = $_POST["adminuser_password"];
		$adminuser_email = $_POST["adminuser_email"];
		$adminuser_mobile = $_POST["adminuser_mobile"];
		$privileges = $_POST['Privileges'];
		$adminuser_status = $_POST["adminuser_status"];
	
	$query_check = mysqlQuery("SELECT * FROM `stork_admin_users` WHERE adminuser_username='$adminuser_username' AND adminuser_email='$adminuser_email'");
	$row_check = mysql_num_rows($query_check);
	if($row_check > 0){
		$successMessage = "<div class='container error_message_mandatory'><span> Admin already exists! </span></div>";
	} else {
		mysqlQuery("INSERT INTO stork_admin_users (adminuser_username,adminuser_password,adminuser_email,adminuser_mobile,	adminuser_status) VALUES ('$adminuser_username','$adminuser_password','$adminuser_email','$adminuser_mobile','$adminuser_status')");
		$query_admin_check = mysqlQuery("SELECT * FROM `stork_admin_users` WHERE adminuser_username='$adminuser_username'");
		$row_admin_check = mysql_fetch_array($query_admin_check);
		$admin_id = $row_admin_check['adminuser_id'];
		foreach ($privileges as $value) {
			mysqlQuery("INSERT INTO stork_adminuser_permission (adminuser_id,module_id,adminuser_permission_status) VALUES ('$admin_id','$value','$adminuser_status')");
		}
		$successMessage = "<div class='container error_message_mandatory'><span> Admin added successfully! </span></div>";

	}
	// 		$successMessage = "<div class='container error_message_mandatory'><span> Admin updated successfully! </span></div>";	
	// 	}
				


		// foreach ($privileges as $value) {
		// 	echo $value;
		// 	echo "<br>";
    	
  //  		}
	}
	
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
						<span>Add Admin User</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Admin Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Admin Information</h4>
							<form action="add_admin_users.php" method="POST" name="edit-acc-info" id="">
							<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<div class="container">
 									<span class="error_email"> Please Enter Valid email address </span>
								</div>
								<div class="container">
 									<span class="error_phone"> Please Enter Valid mobile number </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="last-name">User Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="username" autocomplete="off" placeholder="User Name" name="adminuser_username">
								</div>
								<div class="form-group">
								    <label for="last-name">Password<span class="required">*</span></label>
									<input type="password" class="form-control" id="password" autocomplete="off" placeholder="Password" name="adminuser_password">
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="test" autocomplete="off" placeholder="Email" name="adminuser_email">
								</div>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="phone" maxlength="10" autocomplete="off" placeholder="Mobile" name="adminuser_mobile">
								</div>
								<!-- <div class="form-group">
								    <label for="first-name">User Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="adminuser_type">
								        <option>
											<span>Select Type</span>
										</option>
								        
								    </select>
								</div> -->
								<div class="form-group">
								    <label for="first-name"> Privileges 
								    	<span class="required">*</span> 
								    </label>
									<div class="multiple_dropdown"> 
  										<div class="select_multiple_option">
    										<a>
      											<span class="hida">Select</span>  <i class="fa fa-caret-down" aria-hidden="true"></i>  
      											<p class="multiSel"></p>  
    										</a>
    									</div>
       									<div class="mutliSelect">
           									<ul>
           									<?php 
												$query_module=mysql_query("SELECT * FROM stork_module WHERE module_status='1'");
						        				while($row_module=mysql_fetch_array($query_module)) {
						        					echo '<li> <input type="checkbox" name="Privileges[]" value="'.$row_module["module_id"].'" data-value="'.$row_module["module_codename"].'" /> <span> '.$row_module["module_name"].' </span> </li>';
						        				}
											?>
							           		</ul>
        								</div>
   									</div>
   								</div>

								<div class="cate-filter-content">	
								    <label for="first-name">Staff Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="adminuser_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1">Active</option>
										<option value="0">InActive</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" name="add_admin_users" class="gbtn btn-edit-acc-info">Save</button>
								</div>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 