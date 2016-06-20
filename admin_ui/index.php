<?php
if (!isset($_SESSION))
session_start();
include '../config/config.php';
include '../includes/functions.php';
include 'captcha.php';
$error = false;
if(isset($_POST['username']) && isset($_POST['password'])) 
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
	if(onOffAdminCaptcha()==1) 
	{ 
		if(isset($_POST["captcha_code"]) && trim($_POST["captcha_code"])!="") 
		{ 
			if (trim($_POST["captcha_code"])!=$_SESSION['captcha']['code']) 
			{
				$error = 'Invalid Captcha';
			}
			else
			{
				if (authenticate(trim($user) , trim($pass))) 
				{
					$_SESSION['admin_eap_secure'] = 1;
				}
				else
				{
					$error .= "Invalid username and password combination.";
				}
			}	
		}
		else
		{
			$error="Captcha field must not be empty.";
		}
	}	
	else 
	{
		if (authenticate(trim($user) , trim($pass))) 
		{  
			$_SESSION['admin_eap_secure'] = 1;
		}
		else
		{
			$error .= "Invalid username and password combination";
		}
	}
}
$_SESSION['captcha'] = simple_php_captcha();
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
				<h1 class="mh-title"> My Dashboard </h1>
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
						<?php 
						// echo $error; ?>
					<!-- </div> -->
					<?php
						// }
					?>		
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>Returning Customers</h4>
						<p>If you have an account with us, please log in.</p>
						<form id="login-form" class="form-validate form-horizontal" method="post" action="index.php" accept-charset="UTF-8">
							<p>User Name <span class="star">*</span></p>
							<input class="email admin_login_field" type="text" id="username" autocomplete="off" placeholder="Username" name="username" value="<?php echo $user?>" required aria-describedby="basic-addon1">
							<p>Password <span class="star">*</span></p>
							<input class="pasword admin_login_field" id="" type="password" id="password" autocomplete="off" placeholder="Password" name="password" value="<?php echo $pass?>" required aria-describedby="basic-addon1">
							<button type="submit" class="login">Login</button>
						</form>
					    </br></br></br>
					</div>
					
				</div>
			</div>
			</br></br>
		  </section>

	<script src="style/js/jquery.1.9.1.js"></script>
	<script src="style/js/bootstrap.min.js"></script>
</body>
</html>
