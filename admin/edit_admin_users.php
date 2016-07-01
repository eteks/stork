
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
		$adminuser_type = $_POST["adminuser_type"];
		$adminuser_status = $_POST["adminuser_status"];
		$qr = mysqlQuery("SELECT * FROM `area_admin_users` WHERE '$adminuser_username'='$adminuser_username' AND `adminuser_email`='$adminuser_email' where 'adminuser_id' NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Admin already exists! </span></div>";
		} else {
			mysqlQuery("UPDATE stork_admin_users SET adminuser_username='$adminuser_username',adminuser_password='$adminuser_password',
				adminuser_email='$adminuser_email',adminuser_mobile='$adminuser_mobile',adminuser_type='$adminuser_type',
				adminuser_status='$adminuser_status' WHERE adminuser_id=".$val);
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
<div class="container">
<span class="error_test"> Please fill out all mandatory fields </span>
</div>
<div class="container">
 <span class="error_email"> Please Enter Valid email address </span>
</div>
<div class="container">
 <span class="error_phone"> Please Enter Valid mobile number </span>
</div>
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Admin Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Admin Information</h4>
							<form action="edit_admin_users.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_admin_users">
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
								    <label for="last-name">Password<span class="required">*</span></label>
									<input type="password" class="form-control" id="password" autocomplete="off" placeholder="Password" name="adminuser_password" value="<?php echo($row['adminuser_password']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="test" autocomplete="off" placeholder="Email" name="adminuser_email" value="<?php echo($row['adminuser_email']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="phone" maxlength="10" autocomplete="off" placeholder="Mobile" name="adminuser_mobile" value="<?php echo($row['adminuser_mobile']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">User Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="adminuser_type">
								        <option>
											<span>Select Type</span>
										</option>
								        <option value="1" <?php if ($row['adminuser_type'] == 1) echo "selected"; ?>>Admin</option>
								    </select>
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Admin Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="adminuser_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['adminuser_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['adminuser_status'] == 0) echo "selected"; ?>>InActive</option>
								    </select>
								</div>
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