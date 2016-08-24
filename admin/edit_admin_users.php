
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Admin User</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$adminuser_username = $_POST["adminuser_username"];
		$adminuser_password = $_POST["adminuser_password"];
		$adminuser_email = $_POST["adminuser_email"];
		$adminuser_mobile = $_POST["adminuser_mobile"];
		// $adminuser_type = $_POST["adminuser_type"];

		$check_superuser = mysql_fetch_array(mysqlQuery("SELECT * FROM `stork_admin_users` WHERE adminuser_id=".$val));
		if($_SESSION['is_superuser'] == 1 && $check_superuser['adminuser_is_superuser']!=1){
			$privileges = $_POST['Privileges'];
			$adminuser_status = $_POST["adminuser_status"];
		}

		$query_check_username = mysqlQuery("SELECT * FROM `stork_admin_users` WHERE adminuser_username='$adminuser_username' AND adminuser_id NOT IN('$val')");
		$query_check_email = mysqlQuery("SELECT * FROM `stork_admin_users` WHERE adminuser_email='$adminuser_email' AND adminuser_id NOT IN('$val')");
		$row_check_username = mysql_num_rows($query_check_username);
		$row_check_email = mysql_num_rows($query_check_email);

		if($row_check_username > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Username already exists! </span></div>";
		}else if($row_check_email > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Email already exists! </span></div>";
		}else {
			if($_SESSION['is_superuser'] == 1 && $check_superuser['adminuser_is_superuser']!=1){
				mysqlQuery("UPDATE stork_admin_users SET adminuser_username='$adminuser_username',adminuser_password='$adminuser_password',
				adminuser_email='$adminuser_email',adminuser_mobile='$adminuser_mobile',adminuser_status='$adminuser_status' WHERE adminuser_id=".$val);
				mysqlQuery("DELETE FROM stork_adminuser_permission WHERE adminuser_id=".$val);
				foreach ($privileges as $value) {
					mysqlQuery("INSERT INTO stork_adminuser_permission (adminuser_id,module_id,adminuser_permission_status) VALUES ('$val','$value',1)");
				}
			}
			else{
				mysqlQuery("UPDATE stork_admin_users SET adminuser_username='$adminuser_username',adminuser_password='$adminuser_password',
				adminuser_email='$adminuser_email',adminuser_mobile='$adminuser_mobile' WHERE adminuser_id=".$val);
			}
			$successMessage = "<div class='container error_message_mandatory'><span> Admin updated successfully! </span></div>";	
		}				
	}
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
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
						<span>Edit Admin User</span>
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
						<h3 class="acc-title lg">Edit Admin Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Admin Information</h4>
							<form action="edit_admin_users.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_admin_users">
							<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<div class="container">
 									<span class="error_test_admin_check"> Please Select alteast one Privileges </span>
								</div>
								<div class="container">
 									<span class="error_email"> Please Enter Valid email address </span>
								</div>
								<div class="container">
 									<span class="error_phone"> Please Enter Valid mobile number </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_admin_users` WHERE `adminuser_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
								<div class="form-group">
								    <label for="last-name">User Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="username" autocomplete="off" placeholder="User Name" name="adminuser_username" value="<?php echo($row['adminuser_username']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name" class="password_restriction_width">Password<span class="required">*</span> <span class="password_restiction_details"> <i aria-hidden="true" class="fa fa-info-circle"></i> </span> </label>
								    <div id="error_pass_rest" class="password_criteria">
										<p> Your password should have </p>
										<ul>
											<li> 1. At least 3 characters and not more than 6 characters </li>
											<li> 2. At least one alphabet (a-z) </li>
											<li> 3. At least one number (0-9) </li>
											<li> 4. At least one special character out of these ( !, @, #, $, &amp;, *, ?, ), %, (, = ) or space </li>
										</ul>
									</div>
									<input type="password" class="form-control" maxlength="6" id="password" autocomplete="off" placeholder="Password" name="adminuser_password" value="<?php echo($row['adminuser_password']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="test" autocomplete="off" placeholder="Email" name="adminuser_email" value="<?php echo($row['adminuser_email']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="phone" maxlength="10" autocomplete="off" placeholder="Mobile" name="adminuser_mobile" value="<?php echo($row['adminuser_mobile']); ?>">
								</div>
								<?php 
									if($row['adminuser_is_superuser']!=1) {
										$permission_module = array();
										$match_permission = "SELECT * FROM `stork_adminuser_permission` WHERE adminuser_id='$id'";
										$qry_permission = mysqlQuery($match_permission); 
										while($qry_permission_row = mysql_fetch_array($qry_permission)) {
											$permission_module[] = $qry_permission_row['module_id'];
										}
								?>
								<?php if($_SESSION['is_superuser'] == 1 ){ ?>
									<div class="form-group">
									    <label for="first-name"> Privileges 
									    	<span class="required">*</span> 
									    </label>
										<div class="multiple_dropdown"> 
	  										<div class="select_multiple_option">
	    										<a id="admin_check">
	      											<i class="fa fa-caret-down" aria-hidden="true"></i>  
	      											<p class="multiSel">
	      												<?php 
	      												$query_module=mysql_query("SELECT * FROM stork_module WHERE module_status='1'");
	      												$i=0;
	      												$count = mysql_num_rows($query_module);
	      												while($row_module=mysql_fetch_array($query_module)) {
															if (in_array($row_module['module_id'],$permission_module)){
																if( $i == $count-1)
																	echo '<span title=" '.$row_module["module_name"].' "> '.$row_module["module_name"].' </span>';	
																else
																	echo '<span title=" '.$row_module["module_name"].' "> '.$row_module["module_name"].' ,</span>'; 
																	
															}
														$i++;
														}
														?>
	      											</p>  
	    										</a>
	    									</div>
	       									<div class="mutliSelect">
	           									<ul>
	           									<?php 
													
												$query_module=mysql_query("SELECT * FROM stork_module WHERE module_status='1'");

												while($row_module=mysql_fetch_array($query_module)) {

													if (in_array($row_module['module_id'],$permission_module)){						

														echo '<li> <input type="checkbox" class="admin_users_checkbox" name="Privileges[]" value="'.$row_module["module_id"].'" data-value="'.$row_module["module_codename"].'" checked /> <span> '.$row_module["module_name"].' </span> </li>';
							        				}
							        				else {
							        					echo '<li> <input type="checkbox" class="admin_users_checkbox" name="Privileges[]" value="'.$row_module["module_id"].'" data-value="'.$row_module["module_codename"].'" /> <span> '.$row_module["module_name"].' </span> </li>';
							        				}
							        			}
												?>
								           		</ul>
	        								</div>
	   									</div>
	   								</div>


	   								<div class="cate-filter-content">	
									    <label for="first-name">Staff Status<span class="required">*</span></label>
										<select class="product-type-filter form-control" id="sel_a" name="adminuser_status">
									        <option>
												<span>Select status</span>
											</option>
											<option value="1" <?php if ($row['adminuser_status'] == 1) echo "selected"; ?>>
												<span>Active</span>
											</option>
											<option value="0" <?php if ($row['adminuser_status'] == 0) echo "selected"; ?>>
												<span>Inactive</span>
											</option>
									    </select>
									</div> 
								<?php } ?>

   								<?php 
   								}
   								?>




								
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
								</div>
							<?php 
							} 
							}
							?>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 