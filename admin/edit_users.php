<?php
include "includes/header.php";
$error = "";
$csrfError = false;
$csrfVariable = 'csrf_' . basename($_SERVER['PHP_SELF']);
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
		// $qry   = mysqlQuery("SELECT * FROM `stork_state` WHERE `id`='$val'");
		// $fetch = mysql_fetch_array($qry);
		$qr = mysqlQuery("SELECT * FROM `stork_users` WHERE `username`='$username' AND `user_email`='$user_email' AND 'user_id' NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> User Already exists</b></div>";	
		} else {
			mysqlQuery("UPDATE stork_users SET username='$username',password='$password',first_name='$first_name',last_name='$last_name'
				,user_type='$user_type',user_email='$user_email',user_dob='$user_dob',line1='$line1',line2='$line2',
				user_area_id='$user_area_id',user_state_id='$user_state_id',user_mobile='$user_mobile',user_status='$user_status' WHERE user_id=".$val);
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> User Updated Successfully.</b></div>";	
		}
				
	}
	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
if(isset($_POST['title']))
{
	if($_SESSION[$csrfVariable] != $_POST['csrf'])
		$csrfError = true;
	$id = $_GET['id'];
	$title = htmlspecialchars($_POST["title"]);
	$description = mysql_real_escape_string($_POST["description"]);
	$screens = $_POST["screens"];
	$cat = $_POST["category"];
	$image = $_POST["image"];
	$url = $_POST["url"];
	$demo = $_POST["demo"];
	$price = $_POST["price"];
	$tags = $_POST["tags"];
	$rating = $_POST["rating"];
	if(strlen($title)<5 || strlen($title)>50)
		$error .="o. Title Must Be Between 5 to 50 Characters<br />";
	if(!validUrl($url))
		$error .="o. Invalid Purchase URL<br />";
	if(!is_numeric($price))
		$error .="o. Price Is Not In Valid Format<br />";
	if($error=="" && !$csrfError)
	{
		updateProductDb($id,$cat,$title,$description,$screens,$image,$url,$demo,$price,$tags,$rating);
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b>  Product saved Successfully.</b></div>";
	}
}
$key = sha1(microtime());
$_SESSION[$csrfVariable] = $key;
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Edit Users</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
	<div class="container" style="margin-top:20px;">
		<?php include 'includes/sidebar.php'; ?>
		<div class="mainy">
			<!-- Page title -->
			<div class="page-title">
				<h2><i class="fa fa-pencil-square color"></i> Edit User </h2> 
				<hr />
			</div>
			<!-- Page title -->
			<div class="row">
				<div class="awidget">
					<form class="form-horizontal" role="form" action="edit_users.php?update=<?php echo $id; ?>" method="post">
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
								<label class="col-lg-2 control-label">Username</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="username" value="<?php echo($row['username']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Password</label>
								<div class="col-lg-10">
									<input type="password" class="form-control" name="password" value="<?php echo($row['password']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Firstname</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="first_name" value="<?php echo($row['first_name']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Lastname</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="last_name" value="<?php echo($row['last_name']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">UserType</label>
								<div class="col-lg-10">
									<select class="form-control" name="user_type" required>
										<option value="1" <?php if ($row['user_type'] == 1) echo "selected"; ?>>Student</option>
										<option value="2" <?php if ($row['user_type'] == 2) echo "selected"; ?>>Profession</option>	
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="user_email" value="<?php echo($row['user_email']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Date Of Birth</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="user_dob" value="<?php echo($row['user_dob']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Address Line1</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="line1" value="<?php echo($row['line1']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Address Line2</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="line2" value="<?php echo($row['line2']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">State</label>
								<div class="col-lg-10">
								<select class="form-control" id= "category" name="user_state_id">
								<option value="">Select the state</option>
								<?php
			                    $query = mysql_query("select * from stork_state");
		                        while ($staterow = mysql_fetch_array($query)) {
		                        if($row['user_state_id'] == $staterow['state_id'])   
		                        	echo "<option selected value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
		                        else
		                        	echo "<option value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
		                        }
			                        ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Area</label>
								<div class="col-lg-10">
								<select class="form-control" id= "category" name="user_area_id">
								<option value="">Select the Area</option>
								<?php
			                    $query = mysql_query("select * from stork_area");
		                        while ($arearow = mysql_fetch_array($query)) {
		                        if($row['user_area_id'] == $arearow['area_id'])   
		                        	echo "<option selected value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
		                        else
		                        	echo "<option value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
		                        }
			                        ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Mobile</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="user_mobile" value="<?php echo($row['user_mobile']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">User Status</label>
								<div class="col-lg-10">
									<select class="form-control" name="user_status">
										<option value="1" <?php if ($row['user_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['user_status'] == 0) echo "selected"; ?>>InActive</option>
									</select>
								</div>
							</div>
							<hr />
							<input type="hidden" name="csrf" value="<?php echo $key; ?>" />
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button type="submit" name="submit" class="btn btn-success" value="Add"><i class="fa fa-floppy-o"></i> Update</button> 
								
								</div>
							</div>
							<?php 
						} 
						}
						?>
						</form>
						<?php              
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div> 
</div>
<?php include 'includes/footer.php'; ?>
<script>
	$(document).ready(function () 
	{
		$('#teg').tagsInput({
		// my parameters here
		});
		$('.alert-success').delay(2000).fadeOut();
	});
</script>