<?php 
	include('header.php');
	$login_error = 0;
	$forgot_error = 0;
	$forgot_success = 0;
  	if(isset($_POST['login_user'])) {
  		$username_email=$_POST['login_name'];
  		$password=$_POST['login_pass'];
  		$login_query=mysqli_query($connection,"select * from stork_users where (user_email='$username_email' OR username='$username_email') and password='$password' and user_status='1'") or die(mysql_error());
  		$login_count=mysqli_num_rows($login_query);
		$login_user_id_data = mysqli_fetch_array($login_query);
		
  		if($login_count == 1) {
  			//echo "<script> $('.login_error').css('display','none'); </script>";
			$_SESSION['login_status']=1;
			$_SESSION['user_id'] = $login_user_id_data['user_id'];
			$_SESSION['user_login_name'] = $login_user_id_data['first_name'];
			$user_type_for_login = (isset($_SESSION['usertype'])?$_SESSION['usertype']:'stu');
  			//echo "login successful";	
  			$random = uniqid();
  			if(!isset($_SESSION['session_id'])){
		  		if($_SESSION['login_status'] == 1 && $user_type_for_login == 'stu'){
		   			$_SESSION['session_id'] = 'reg_stu_'.$random; 
		  		}
		  		else if($_SESSION['login_status'] == 1 && $user_type_for_login == 'pro'){
			   		$_SESSION['session_id'] = 'reg_pro_'.$random;
			  	}
			  	else if($_SESSION['login_status'] == 0 && $user_type_for_login == 'stu'){
		   			$_SESSION['session_id'] = 'gue_stu_'.$random;
		  		}
		  		else if($_SESSION['login_status'] == 0 && $user_type_for_login == 'pro'){
			   		$_SESSION['session_id'] = 'gue_pro_'.$random;
			  	}
		 	}
			if(isset($_SESSION['session_id'])){
	  			$session_data_check = explode("_", $_SESSION['session_id']);
	  			$changed_session_id = 'reg_'.$user_type_for_login.'_'.$session_data_check[2];
		 	 	updatefunction('order_details_session_id="'.$changed_session_id.'"',ORDERDETAILS,'order_details_session_id="'.$_SESSION['session_id'].'"',$connection);
			 	$_SESSION['session_id'] = $changed_session_id;	
			}
			$redirect_url = $_POST['redirect_url'];
			$url_split = explode('/', $redirect_url);
			if (strpos($redirect_url, "register.php")!==false){
				$url = 'index.php';
			}
			else{
				$url = $_POST['redirect_url'];
			}
  			die('<script type="text/javascript">window.location.href="'.$url.'";</script>');
			exit();
  		}
  		else {
  			$login_error = 1;
  			//echo "login failed";
  		}
 	}
	if($_SESSION['login_status'] == 1){
		die('<script type="text/javascript">window.location.href="index.php";</script>');
	}
  	if(isset($_POST['forget_password'])) {
  		$forget_email=$_POST['forget_email'];
  		$forget_query=mysqli_query($connection,"select * from stork_users where user_email='$forget_email' and user_access_type ='0' and user_status='1'") or die(mysql_error());
  		$forget_array=mysqli_fetch_array($forget_query);
  		$forget_email_count=mysqli_num_rows($forget_query);
  		if($forget_email_count == 1) {
          	$subject="Login Info";
			$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
			$message.='<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">';
			$message.='<head>';
			$message.='<meta name="viewport" content="width=device-width" />';
			$message.='<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
			$message.='<title>Alerts e.g. approaching your limit</title>';
			$message.='<style type="text/css">img {max-width: 100%;}body {-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;}body {background-color: #f6f6f6;}@media only screen and (max-width: 640px) { body { padding: 0 !important; } h1 {font-weight: 800 !important; margin: 20px 0 5px !important; } h2 { font-weight: 800 !important; margin: 20px 0 5px !important;}h3 {font-weight: 800 !important; margin: 20px 0 5px !important;}h4 {font-weight: 800 !important; margin: 20px 0 5px !important;} h1 {font-size: 22px !important;}h2 {font-size: 18px !important;} h3 {font-size: 16px !important;}.container {padding: 0 !important; width: 100% !important;}.content {padding: 0 !important;}.content-wrap {padding: 10px !important;}.invoice {width: 100% !important;}}</style>';
			$message.='</head>';
			$message.='<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">';
			$message.='<table class="body-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>';
			$message.='<td class="container" width="600" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">';
			$message.='<div class="content" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">';
			$message.='<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: rgb(0,180,255); margin: 0; padding: 20px;" align="center" bgcolor="#00B4FF" valign="top">';
			$message.='<h2>PRINT STORK</h2>';
			$message.='</td>';
			$message.='</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">';
			$message.='<table width="100%" cellpadding="0" cellspacing="0" style="font-family:,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">';
			$message.='Dear <strong style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">'.$forget_array['first_name'].'</strong>';
			$message.='</td>';
			$message.='</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">';
			$message.='Your <b>Print stork</b> application password as following,';
			$message.='</td>';
			$message.='</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">';
			$message.='<table border="1" bgcolor="#FEF1BC"><tbody><tr><td>User Name :&nbsp;<strong><font color="blue">'.$forget_array['username'].'</font></strong></td></tr><tr><td>Password :&nbsp;&nbsp;&nbsp;<strong><font color="blue">'.$forget_array['password'].'</font></strong></td></tr></tbody></table>';
			$message.='</td>';
			$message.='</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">';
			$message.='Thanks for choosing Printstork.com.';
			$message.='</td>';
			$message.='</tr></table></td>';
			$message.='</tr></table><div class="footer" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">';
			$message.='<table width="100%" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="http://www.printstork.com" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Go to website</a></td>';
			$message.='</tr></table></div></div>';
			$message.='</td>';
			$message.='<td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>';
			$message.='</tr></table></body>';
			$message.='</html>';
			$headers = "From: support@printstork.com\r\n";
			$headers .= "Reply-To: support@printstork.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$send=mail($forget_email, $subject, $message, $headers);
			if($send) {
				$forgot_success = 1;
			}
			else {
				echo "<script> alert('failed'); </script>";
			}
  		}
  		else {
  			$forgot_error = 1;
  		}
  	}
  ?>
<main class="main" id="product-detail">	
    <section class="header-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 hidden-xs">
					<h1 class="mh-title">Login</h1>
				</div>
				<div class="breadcrumb-w col-sm-9">
					<span class="hidden-xs">You are here:</span>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<span>Login</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
    </section> <!---breadcrumb-->
	<section class="pr-main" id="pr-login">	
		<div class="container">	
			<div class="col-md-9 col-sm-9 col-xs-12">
				<h1 class="ct-header">Login</h1>			
				<div class="col-md-6 col-sm-6 col-xs-12">
					<h4>Returning Customers</h4>
					<p>If you have an account with us, please log in.</p>
					<form id="login-form" class="form-validate form-horizontal" method="post">
						<span class="login_error">  Login failed </span>
						<p>User Name/Email Address <span class="star">*</span></p>
						<input class="email" name="login_name" type="text" id="username_email" placeholder="Email or Username" value="" />
						<p>Password <span class="star">*</span></p>
						<input class="pasword" id="login_password" placeholder="password" name="login_pass" type="password" value="" />
						<span class="forget_email_valid" style="<?php if($login_error == 1) echo "display:block"; ?>"> Entered invalid details. Please create a new account </span>
						<input type="hidden" name="redirect_url" value="<?php echo $_GET['redirect_url']; ?>">
						<button type="submit" class="login" name="login_user">Login</button>
					</form>
				    <br/><br/><br/>
				    <div class="socail socail_fb">
						<h4>Connect with Facebook</h4>
						<p><span>Facebook  Users</span></p>
						<p>Use your Facebook account to login or register within our store.You're just one click away.</p>
				        <?php	
							require_once('fbsettings.php'); 
							if (isset($accessToken)) {
							} else {
								$loginUrl = $helper->getLoginUrl(FACEBOOKLOGINURL, $permissions);
								echo '<a href="' . $loginUrl . '"><button type="submit" class="connectfa">Connect with facebook</button></a>';
							}
						?>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 right">
				    <h4>Forgotten Password</h4>
					<p>Fill your email address below and we’ll email it to you right away!</p>
					<form id="forgotpass-form" class="form-validate form-horizontal" method="post">
						<p>Email Address <span class="star">*</span></p>
						<input class="email" name="forget_email" type="text" placeholder="Email" id="forget_email" value="">
						<span class="forget_error" style="<?php if($forgot_error == 1) echo "display:block"; ?>"> Email doesn't exists </span>
						<?php if($forgot_success == 1){ ?><span style="color:red"> Password sent to your registred mail id! </span><?php } ?>
						<button type="submit" class="ressetpass" name="forget_password">Retrieve Password</button>
				    </form>
					<div class="socail socail_google">
						<h4>Connect with Google+</h4>
						<p><span>Google+  Users</span></p>
						<p>Use your google account to login or register within our store.You're just one click away.</p>
						<?php
							require_once('googlesettings.php'); 
							if(isset($authUrl)) {
								echo '<a href="'.$authUrl.'"><button type="submit" class="connectfa">Connect with Google+</button></a>';
							}
						?>
					</div>  
				</div>					
			</div>
		</div>
		<br/><br/>
	</section>
</main><!--Main index : End-->
<?php include('footer.php') ?>
