<?php
include 'includes/functions.php';
include '../config/config.php';
if((isset($_POST['email']) && $_POST['email']!="") || (isset($_POST['username']) && $_POST['username']!=""))
{
	$email = "";
	$username="";
	if($_POST["email"]!="")
	{
		$email = $_POST["email"];
		$username=$_POST["username"]; 
		$qry = mysqlQuery("SELECT `username` FROM `settings`");
		$numRows = mysql_num_rows($qry); 
		if ($numRows > 0)
		{
			while($row = mysql_fetch_array($qry)) 
			{
				$username = $row['username'];
			}
		}
		if(!checkEmail($email))
		{
			$error .="Invalid Email Address<br />";
		}
		else if(!emailExists($email))
		{
			$error .="Email Doesn't Exists<br />";
		}
	}
	else if($_POST["username"]!="")
	{
		$username=$_POST["username"];
		$match = "SELECT `email` FROM `settings`"; 
		$qry = mysqlQuery($match);
		$numRows = mysql_num_rows($qry); 
		if ($numRows > 0)
		{
			while($row = mysql_fetch_array($qry)) 
			{
				$email = $row['email'];
			}
		}
		else
		{
			$error .="Username Doesn't Exists<br/>";
		}
	}
	if(emailExists($email,0) && $error=="")
	{
		sendEmail(getAdminEmail(),$email,"Password reset request",$username . " Please click on the link below to reset your password<br/>" . rootpath() . "/admin/reset.php?rid=" . sencrypt($email));
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style/css/bootstrap.min.css" rel="stylesheet">	
	<link href="style/css/font-awesome.min.css" rel="stylesheet">
	<link href="style/css/style.css" rel="stylesheet">
	<link href="style/css/theme-default.css" rel="stylesheet">
	<title>Reset Password: <?php echo(getTitle()) ?></title>
</head>
<body> 
	<?php require_once('navbar.php') ?>
	<?php require_once('headermenu.php') ?>

	<div class="container">
		<h1 class="admin_login_header">Reset Password</h1>			
		<div class="col-md-5 col-sm-5 col-xs-12 admin_form_section">
			<form id="login-form" class="form-validate form-horizontal" method="post">
				<p>User Name<span class="star">*</span></p>
				<input class="email admin_login_field" name="login_name" type="text" id="username_email" placeholder="User Name" value="">
				<h2> OR </h2>
				<p>Email <span class="star">*</span></p>
				<input class="pasword admin_login_field" id="login_password" placeholder="Email" name="login_pass" type="password" value="">
				<div class="admin_button_section">
					<button type="" name="submit" class="gbtn btn-edit-acc-info admin_button_style">Reset</button>
					<!-- <a href="reset.php" class="btn btn-info admin_button_style">Reset</a> -->
				</div>
			</form>
		</div>
	</div>
	<script src="style/js/jquery.1.9.1.js"></script>
	<script src="style/js/bootstrap.min.js"></script>
</body>
</html>
