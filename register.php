<?php 
include('header.php');
if($_SESSION['login_status'] == 1){
		header('location:index.php');
}
?>
<?php 
  	if(isset($_POST['save_new_user'])) {
  		//print_r($_POST);
  		$firstname=$_POST['firstname'];
  		$lastname=$_POST['lastname'];
  		$username=$_POST['username'];
  		$email=$_POST['email'];
  		$password=$_POST['password'];
  		// echo $_SESSION['digit'];
		// if($_SESSION['usertype']=='stu'){
			// $user_type = 1;
		// }
		// else if($_SESSION['usertype']=='pro'){
			// $user_type = 2;
		// }
		$mobilenumber=$_POST['mobile'];
		$dateofbirth=$_POST['dob_birthDay'];		
  		$signup_query=mysqli_query($connection,"select * from stork_users where username = '$username' or user_email='$email'") or die(mysql_error());
  		$signup_count=mysqli_num_rows($signup_query);
		$succes_message = 0;
  		if($signup_count > 0) {
  			$success_message = 1;
  		}
  		else { 
  			mysqli_query($connection,"insert into stork_users (first_name,last_name,username,user_email,password,user_mobile,user_dob,user_status) values ('$firstname','$lastname','$username','$email','$password','$mobilenumber','$dateofbirth','1')") or die(mysql_error());
			$success_message = 2;
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
								<a href="index.php">Home</a>
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
				<div class="col-md-12 col-lg-12 text-center">
				<?php
					if(isset($_POST['save_new_user'])){
							if($success_message==2){
				?>
					<span class="reg_error_message_s text-center"><b>Successfully registred!</b></span>
				<?php
							}
							else if($success_message==1){
				?>
					<span class="reg_error_message_e text-center">Username or email already exists!</span>
				<?php
							}
					}
				?>
				</div>
			</div>
			<div class="container">	
				<div class="col-md-9 col-sm-9 col-xs-12">		
					<div class="col-md-6 col-sm-6 col-xs-12 left">
						<h1>Create an Account</h1>
						<h4>Personal Information</h4>
						<form id="register-form" class="form-validate form-horizontal" method="post">
							<p>First Name <span class="star">*</span></p>
							<input class="firstname" id="firstname" placeholder="Firstname" name="firstname" type="text" maxlength="50" value="">
							<p>Last Name <span class="star">*</span></p>
							<input class="lastname" placeholder="Lastname" id="lastname" name="lastname" type="text" maxlength="50" value="">
							<p class="reg_fields">Create a Username<span class="star">*</span></p>
							<input class="user" placeholder="Username" id="username" name="username" type="text" maxlength="20" value=""> 
							<p class="reg_fields">Create a Password  <span class="star">*</span></p>
							<input class="pasword" placeholder="password" id="password" type="password" name="password" maxlength="15" value="">
							<p class="reg_fields">Confirm a Password  <span class="star">*</span></p>
							<input class="re-pasword" placeholder="Re-password" id="repassword" type="password" name="confirm_password" maxlength="15" value=""> 
							<p>Email Address <span class="star">*</span></p>
							<input class="email" placeholder="Email ID" id="email" name="email" type="text" value="">
							<p>Mobile Number<span class="star">*</span></p>
							<input class="email mobileno" placeholder="Mobile number" id="mobile" name="mobile" type="text" maxlength="10" value="">
							<p>Date Of Birth <span class="star">*</span></p>
							<div id="dob"></div>
							<!-- <input class="email dob" placeholder="dd/mm/yy" id="dob" name="dob" type="text" value=""> -->
							<!-- <p> Enter the code as shown below <span class="star"> *</span></p>
							<input id="captcha_original" type="hidden" value="">
							<input class="email captcha" placeholder="captcha" id="captcha" name="captcha" type="text" value="">
							<div id="imgdiv">
								<img id="img" src="captcha.php" /></div>
								<img id="reload" src="images/reload.png" />
							<div> -->
							<p>How much is : <span id="captcha_f_n"></span> + <span id="captcha_s_n"></span><span class="star"> *</span> <span class="captcha_click"> <i class="fa fa-refresh" aria-hidden="true"></i> </span> </p> 
							<input id="captcha_original" type="hidden" value="">
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
