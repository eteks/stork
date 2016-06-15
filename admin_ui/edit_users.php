
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php
	if (isset($_GET['update']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
			$val = $_GET['update'];
			$val = mres($val);
			$username = $_POST["username"];
			$password = $_POST["password"];
			$first_name = $_POST["first_name"];
			$last_name = $_POST["last_name"];
			$user_type = $_POST["user_type"];
			$user_email = $_POST["user_email"];
			$user_dob = $_POST["user_dob"];
			$line1 = $_POST["line1"];
			$line2 = $_POST["line2"];
			$user_area_id = $_POST["user_area_id"];
			$user_state_id = $_POST["user_state_id"];
			$user_mobile = $_POST["user_mobile"];
			$user_status = $_POST["user_status"];
			$qr = mysqlQuery("SELECT * FROM `stork_users` WHERE `username`='$username' AND `user_email`='$user_email' AND 'user_id' NOT IN('$val')");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> User Already exists! </span></div>";	
			} else {
				mysqlQuery("UPDATE stork_users SET username='$username',password='$password',first_name='$first_name',last_name='$last_name'
					,user_type='$user_type',user_email='$user_email',user_dob='$user_dob',line1='$line1',line2='$line2',
					user_area_id='$user_area_id',user_state_id='$user_state_id',user_mobile='$user_mobile',user_status='$user_status' WHERE user_id=".$val);
				$successMessage = "<div class='container error_message_mandatory'><span> User Updated Successfully! </span></div>";	
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
						<a href="/">User</a>
					</li>
					<li>
						<span>Edit Users</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Add Users Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">User Information</h4>
							<form action="edit_users.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info">
							<?php 
								if($successMessage) echo $successMessage; 
								$match = "SELECT * FROM stork_users WHERE user_id='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
								while($row = mysql_fetch_array($qry)) 
								{
							?>
								<div class="form-group">
								    <label for="last-name">User Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="User Name" name="username" value="<?php echo($row['username']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Password<span class="required">*</span></label>
									<input type="password" class="form-control" id="first-name" placeholder="Password" name="password" value="<?php echo($row['password']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Firstname<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Firstname" name="password" value="<?php echo($row['password']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Lastname<span class="required">*</span></label>
									<input type="text" class="form-control" id="last-name" placeholder="Firstname" name="password" value="<?php echo($row['password']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Date of Birth<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" placeholder="Area Name">
								</div>
								<div class="form-group">
								    <label for="first-name">User Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1">
								        <option>
											<span>Select Type</span>
										</option>
								        <option value="0">
											<span>Admin</span>
										</option>
										<option value="1">
											<span>Staff</span>
										</option>
								    </select>
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Admin Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel1">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="0">
											<span>Active</span>
										</option>
										<option value="1">
											<span>Inactive</span>
										</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Save</button>
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