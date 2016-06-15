<?php require_once('dbconnect.php'); ?>
<?php include('header.php') ?>
<?php 
  	if(isset($_POST['save_new_user'])) {
  		$firstname=$_POST['firstname'];
  		$lastname=$_POST['lastname'];
  		$username=$_POST['username'];
  		$email=$_POST['email'];
  		$password=$_POST['password'];
  		$signup_query=mysql_query("select * from stork_users where username = '$username' or user_email='$email'") or die(mysql_error());
  		$signup_count=mysql_num_rows($signup_query);

  		if($signup_count > 0) {
  			echo "<script> $('.reg_error').css('display','block'); </script>";
  			echo "already";
  		}
  		else { 
  			mysql_query("insert into stork_users (first_name,last_name,username,user_email,password,user_status) values ('$firstname','$lastname','$username','$email','$password','1')") or die(mysql_error());
?>
  			<script>
  			$('.reg_error').css('display','none');
			alert('signup successfully');
			window.location = "index.php";
			</script>
<?php
  		}
	} 
	if(isset($_POST['login_user'])) {
  		$username_email=$_POST['login_name'];
  		$password=$_POST['login_pass'];
  		$login_query=mysql_query("select * from stork_users where user_email='$username_email'or username='$username_email' and password='$password'") or die(mysql_error());
  		$login_count=mysql_num_rows($login_query);
  		if($login_count == 1) {
  			echo "<script> $('.login_error').css('display','none'); </script>";
  			echo "login successful";		
  		}
  		else {
  			echo "<script> $('.login_error').css('display','block'); </script>";
  			echo "login failed";
  		}
 	}
?>
	<!--Main index : End-->
	<main class="main">
		<section class="pr-main" id="pr-register">	
			<div class="container">	
				<div class="col-md-9 col-sm-9 col-xs-12">		
					<div class="col-md-6 col-sm-6 col-xs-12 left">
						<h1>Create an Account</h1>
						<h4>Personal Information</h4>
						<form id="register-form" class="form-validate form-horizontal" method="post">
							<span class="reg_error">Username or email already exists</span>
							<p>First Name <span class="star">*</span></p>
							<input class="firstname" id="firstname" placeholder="Firstname" name="firstname" type="text" value="">
							<p>Last Name <span class="star">*</span></p>
							<input class="lastname" placeholder="Lastname" id="lastname" name="lastname" type="text" value="">
							<p>Create a username<span class="star">*</span></p>
							<input class="user" placeholder="Username" id="username" name="username" type="text" value=""> 
							<p>Email Address <span class="star">*</span></p>
							<input class="email" placeholder="Email" id="reg_email" type="text" name="email" value="">
							<p>Create a password  <span class="star">*</span></p>
							<input class="pasword" placeholder="password" id="password" type="password" name="password" value="">
							<p>confirm a password  <span class="star">*</span></p>
							<input class="re-pasword" placeholder="Re-password" id="repassword" type="password" name="confirm_password" value=""> 
							<div>
							<!-- <input type="checkbox" value="yes" class="inputbox" name="remember" id="remember"><span class="re">Sign Up for Newsletter</span> -->
							<br/>
							<button type="submit" name="save_new_user" class="register">Register</button>
							</div>
						</form>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12 right">
						<h1>Login</h1>
						<h4>Returning Customers</h4>
						<p>If you have an account with us, please log in.</p>
						<form id="login-form" class="login-form form-validate form-horizontal" method="post">
							<span class="login_error">  Login failed </span>
							<p> Email or Username <span class="star">*</span></p>
							<input class="email" name="login_name" type="text" id="username_email" placeholder="Email or Username" value="">
							<p>Password <span class="star">*</span></p>
							<input class="pasword" id="login_password" placeholder="password" name="login_pass" type="password" value="">
							<button type="submit" name="login_user" class="login">Login</button>
						</form>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<img src="images/banner-wishlist.jpg" />
				</div>
				
			</div>
		</section>
	</main><!--Main index : End-->
<?php include('footer.php') ?>
