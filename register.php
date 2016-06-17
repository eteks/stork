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
?>

	<div class="main" id="product-detail">	
   	    <section class="header-page">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 hidden-xs">
						<h1 class="mh-title">Register</h1>
					</div>
					<div class="breadcrumb-w col-sm-9">
						<span class="hidden-xs">You are here:</span>
						<ul class="breadcrumb">
							<li>
								<a href="home.html">Home</a>
							</li>
							<li>
								<span>Register</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section> <!---breadcrumb------>
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
							<p>Create a password  <span class="star">*</span></p>
							<input class="pasword" placeholder="password" id="password" type="password" name="password" value="">
							<p>Confirm a password  <span class="star">*</span></p>
							<input class="re-pasword" placeholder="Re-password" id="repassword" type="password" name="confirm_password" value=""> 
							<p>Email Address <span class="star">*</span></p>
							<input class="email" placeholder="Email ID" id="email" name="email" type="text" value="">
							<p>Phone Number<span class="star">*</span></p>
							<input class="email mobileno" placeholder="Mobile number" id="mobile" name="mobile" type="text" value="">
							<p>Date Of Birth <span class="star">*</span></p>
							<input class="email dob" placeholder="dd/mm/yy" id="dob" name="dob" type="text" value="">
							<p>Please enter the captcha shown<span class="star">*</span></p>
							<input class="email captcha" placeholder="captcha" id="captcha" name="captcha" type="text" value="">
							<div>
								<br/>
								<button type="submit" name="save_new_user" class="register">Register</button>
							</div>
						 </form>
					</div>
				 </div>
			  </div>
		</section>
	</div><!--Main index : End-->
	<br/><br/>
<?php include('footer.php') ?>
