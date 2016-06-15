<?php require_once('dbconnect.php'); 
		include('header.php');

  	if(isset($_POST['login_user'])) {
  		$username_email=$_POST['login_name'];
  		$password=$_POST['login_pass'];
  		$login_query=mysql_query("select * from stork_users where user_email='$username_email'or username='$username_email' and password='$password'") or die(mysql_error());
  		$login_count=mysql_num_rows($login_query);
  		if($login_count == 1) {
  			echo "login successful";		
  		}
  		else {
  			echo "login failed";
  		}
 	}
  	if(isset($_POST['forget_password'])) {
  		$forget_email=$_POST['forget_email'];
  		$forget_query=mysql_query("select * from stork_users where user_email='$forget_email'") or die(mysql_error());
  		$forget_array=mysql_fetch_array($forget_query);
  		$forget_email_count=mysql_num_rows($forget_query);
  		$fotget_password=$forget_array['password'];
  		if($forget_email_count == 1) {
            $message = "Your old password is";
            // $message = "Your password reset link send to your e-mail address.";
            $to=$forget_email;
            $subject="Forget Password";
            $from = 'sweetkannan05@gmail.com';
            $body='Hi, <br/> <br/>Your password is '.$fotget_password. '<br><br>Click here to reset your password http://demo.phpgang.com/login-signup-in-php/reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$body,$headers);
  			echo "mail sent";
  		}
  		else {
  			echo "not found";
  		}
  	}
  ?>
	


	
		<section class="pr-main" id="pr-login">	
			<div class="container">	
				<div class="col-md-9 col-sm-9 col-xs-12">
					<h1 class="ct-header">Login</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>Returning Customers</h4>
						<p>If you have an account with us, please log in.</p>
						<form id="login-form" class="form-validate form-horizontal" method="post">
							<p> Email or Username <span class="star">*</span></p>
							<input class="email" name="login_name" type="text" value="">
							<p>Password <span class="star">*</span></p>
							<input class="pasword" name="login_pass" type="password" value="">
							<button type="submit" name="login_user" class="login">Login</button>
						</form>
						<div class="socail">
							<h4>Connect with Facebook</h4>
							<p><span>Facebook Users</span></p>
							<p>Use your Facebook account to login or register within our store.You're just one click away.</p>
							<?php	
								require_once('fbsettings.php'); 
								if (isset($accessToken)) {
								} else {
								$loginUrl = $helper->getLoginUrl('http://localhost/stork/fbuserfunction.php', $permissions);
									echo '<a href="' . $loginUrl . '"><button type="submit" class="connectfa">Connect with facebook</button></a>';
								}
							?>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12 right">
						<h4>Forgotten Password</h4>
						<p>Fill our your email address bellow and we’ll email it to you right away!</p>
						<form id="forgotpass-form" class="form-validate form-horizontal" method="post">
							<p>Email Address <span class="star">*</span></p>
							<input class="email" name="forget_email" type="text" value="">
							
							<button type="submit" name="forget_password" class="ressetpass">Retrieve Password</button>
						</form>
						<div class="socail">
							<h4>Connect with Google Plus</h4>
							<p><span>Google Users</span></p>
							<p>Use your Google account to login or register within our store.You're just one click away.</p>
							<?php
							require_once('googlesettings.php'); 
							if(isset($authUrl)) {
						
							echo '<a href="'.$authUrl.'"><button type="submit" class="connectfa">Connect with facebook</button></a>';
							
							}
							?>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<img src="images/banner/login/banner-login.jpg" />
				</div>
				
			</div>
		</section>
	</main><!--Main index : End-->
<?php include('footer.php') ?>