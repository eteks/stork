<?php
if (!isset($_SESSION))
session_start();
include 'includes/config.php';
include 'includes/functions.php';
$error = false;
if(isset($_POST['username']) && isset($_POST['password'])) 
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
		if (authenticate(trim($user) , trim($pass))) 
		{  
			$_SESSION['admin_eap_secure'] = 1;
		}
		else
		{
			$error = "Invalid Username or Password";
		}
}
if (isset($_SESSION['admin_eap_secure']) && !$error)
{
	header('Location: ./users.php');
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
	<title>Print Stork Admin</title>
</head>
<body>
	<?php require_once('navbar.php') ?>
	<?php require_once('headermenu.php') ?>
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 hidden-xs dashboard_header">
				<h1 class="mh-title"> Login </h1>
			</div>
			<div class="breadcrumb-w col-sm-9">
				<span class="">You are here:</span>
				<ul class="breadcrumb">
					<li>
						<span> Home </span>
					</li>
					<li>
						<span> Login</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
	
   	   <section class="pr-main" id="pr-login">	
			<div class="container padding_style">	
				<div class="col-md-9 col-sm-9 col-xs-12 padding_style">
					<h1 class="ct-header">Login</h1>
					<?php
						// if ($error) 
						// {
					?>
					<!-- <div class="admin_login_error"> -->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>Returning Administration</h4>
						<p>If you have an account with us, please log in.</p>
						<div class="admin_login_error_section">
								<span class="admin_login_error"> <?php 
								echo $error; ?> </span>
							<!-- </div> -->
							<?php
								// }
							?>	
							<!-- <span class="error_admin_login"> Please fill out all mandatory fields </span> -->
								<span class="error_test error_admin_login"> Please fill all required(*) fields </span>	
						</div>
						<form id="login-form" class="form-validate form-horizontal" method="post" action="index.php" accept-charset="UTF-8">
							<p>User Name <span class="star">*</span></p>
							<input class="email admin_login_field" type="text" id="admin_username" autocomplete="off" placeholder="Username" name="username" value="<?php echo $user?>" aria-describedby="basic-addon1">
							<p>Password <span class="star">*</span></p>
							<input class="pasword admin_login_field" type="password" id="admin_password" autocomplete="off" placeholder="Password" name="password" value="<?php echo $pass?>" aria-describedby="basic-addon1">
							<button type="submit" class="login">Login</button>
						</form>
					</div>
				</div>
		  </section>

	<script src="style/js/jquery.1.9.1.js"></script>
	<script src="style/js/bootstrap.min.js"></script>
	<script src="style/js/action.js"></script>
</body>
</html>
