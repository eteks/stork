<?php 
	include('header.php');
	$login_error = 0;
	$forgot_error = 0;
	$forgot_success = 0;
  	if(isset($_POST['login_user'])) {
  		$username_email=$_POST['login_name'];
  		$password=$_POST['login_pass'];
  		$login_query=mysqli_query($connection,"select * from stork_users where user_email='$username_email'or username='$username_email' and password='$password'") or die(mysql_error());
  		$login_count=mysqli_num_rows($login_query);
		
  		if($login_count == 1) {
  			//echo "<script> $('.login_error').css('display','none'); </script>";
			$_SESSION['login_status']=1;
  			//echo "login successful";		
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
  		$forget_query=mysqli_query($connection,"select * from stork_users where user_email='$forget_email'") or die(mysql_error());
  		$forget_array=mysqli_fetch_array($forget_query);
  		$forget_email_count=mysqli_num_rows($forget_query);
  		$fotget_password=$forget_array['password'];
		
		
  		if($forget_email_count == 1) {
            $message = "Your old password is";
            // $message = "Your password reset link send to your e-mail address.";
            $to=$forget_email;
            $subject="Forget Password";
            $from = FORGOTPASSWORDEMAILID;//from settings php file
            $body='Hi, <br/> <br/>Your password is '.$fotget_password. '<br>';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$body,$headers);
			$forgot_success = 1;
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
		   </section> <!---breadcrumb------>
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
							<input class="email" name="login_name" type="text" id="username_email" placeholder="Email or Username" value="">
							<p>Password <span class="star">*</span></p>
							<input class="pasword" id="login_password" placeholder="password" name="login_pass" type="password" value="">
							<span class="forget_email_valid" style="<?php if($login_error == 1) echo "display:block"; ?>"> Please enter valid login details </span>
							<button type="submit" class="login" name="login_user">Login</button>
						</form>
					    </br></br></br>
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
					 <div>	
					  <h4>Forgotten Password</h4>
						<p>Fill our your registered email address below and we’ll email it to you right away!</p>
						<form id="forgotpass-form" class="form-validate form-horizontal" method="post">
							<p>Email Address <span class="star">*</span></p>
							<input class="email" name="forget_email" type="text" placeholder="Email" id="forget_email" value="">
							<span class="forget_error" style="<?php if($forgot_error == 1) echo "display:block"; ?>"> Email doesn't exists </span>
							<?php if($forgot_success == 1){ ?><span style="color:red"> Password sent to your registred mail id! </span><?php } ?>
							<button type="submit" class="ressetpass">Retrieve Password</button>
					    </form>
					  </div>
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
			</br></br>
		  </section>
	  </main><!--Main index : End-->
<?php include('footer.php') ?>
