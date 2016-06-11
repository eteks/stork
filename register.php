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
  			echo "already";
  		}
  		else 
		{ 
  			mysql_query("insert into stork_users (first_name,last_name,username,user_email,password,user_status) values ('$firstname','$lastname','$username','$email','$password','1')") or die(mysql_error());
?>
		<script>
		alert('signup successfully');
		window.location = "index.php";
		</script>
<?php
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
							<p>First Name <span class="star">*</span></p>
							<input class="firstname" name="firstname" type="text" value="">
							<p>Last Name <span class="star">*</span></p>
							<input class="lastname" name="lastname" type="text" value="">
							<p>Create a username<span class="star">*</span></p>
							<input class="user" name="username" type="text" value=""> 
							<p>Email Address <span class="star">*</span></p>
							<input class="email" type="text" name="email" value="">
							<p>Create a password  <span class="star">*</span></p>
							<input class="pasword" type="password" name="password" value="">
							<p>confirm a password  <span class="star">*</span></p>
							<input class="re-pasword" type="password" name="confirm_password" value=""> 
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
						<form id="login-form" class="form-validate form-horizontal" method="post" action="#">
							<p>Email or Username <span class="star">*</span></p>
							<input class="email" type="text" value="">
							<p>Password <span class="star">*</span></p>
							<input class="pasword" type="text" value="">
							<button type="submit" class="login">Login</button>
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
