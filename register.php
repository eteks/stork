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

  			// offer details
  			$offer_user_query = mysqli_query($connection,"select * from stork_users where username='$username' and user_status='1'") or die(mysql_error('User select query error'));
  			$offer_user_array = mysqli_fetch_array($offer_user_query);
  			$user_id=$offer_user_array['user_id'];
  			$offer_query = mysqli_query($connection,"select * from stork_offer_details where offer_type='general_offer' and offer_status='1' and DATE(offer_validity_end_date) > DATE(NOW())") or die(mysql_error('offer select query error'));
  			$offer_array=mysqli_fetch_array($offer_query);
  			if($offer_array > 0) {
  				$today_date=date('y-m-d');
  				$offer_end_date=date('y-m-d',strtotime($offer_array['offer_validity_end_date']));
				$expire_date = date('d-M-y',strtotime($offer_end_date));
  				if($today_date <= $offer_end_date) {
  					$offer_code = $offer_array['offer_code'];
  					$offer_id = $offer_array['offer_id'];
	  				$offer_start_date = date('y-m-d',strtotime($offer_array['offer_validity_start_date']));
	  				$offer_limit = $offer_array['offer_usage_limit'];
	  				$offer_amount = $offer_array['offer_amount'];
	  				$offer_eligible_amount = $offer_array['offer_eligible_amount'];
					$email_subject = "Offer Details";
	  				$to = $email;
	  				$from_email = "support@printstork.com";
					$headers = "From: " . $from_email . "\r\n";
	  				$headers .= "Reply-To: ". $from_email . "\r\n";
	  				$headers .= "MIME-Version: 1.0\r\n";
	  				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	  				$message = "<html><body><div style='margin: 0px auto; width: 15%;'><img style='float: left;margin-right: 10px' width='48' height='29' src='http://printstork.com/printstork_logo_only.png'><h2 style='float: left; margin: 0px'><span style='olor:#333333'> Print </span><span style='color:#25bce9'>Stork</span></h2></div><div style='clear: both'></div><div style='margin: 0px auto; width: 50%;'><h2 style='background: #25bce9; text-align: left; color: #fff; font-weight: bold; font-size: 16px; padding: 10px 4px; margin-bottom: 0px;'> Welcome to Print stork ! </h2><div style='border: 1px solid #25bce9; background: #fff;'><p style='font-size: 18px; color: grey; margin-top: 23px; text-align: center;'>Thanks for signing up - exclusive email offers and crocs product news is heading your way.</p><p style='font-size: 18px; color: grey; margin-top: 23px; text-align: center;'>Get ".$offer_amount." cashback on Utility bill payment of+".$offer_eligible_amount."</p><p style='margin-top: 20px; text-align: center;'><span style='color: #25bce9; padding: 5px 10px; font-size: 14px; border: 1px solid #000; border-radius: 5%; text-align: center;'> ".$offer_code." </span></p><p style='margin-top: 20px; padding-left: 20px; color: gray; text-align: center; font-size: 12px;'>Expires on ".$expire_date."</p><p style='padding-left: 20px; font-size: 8px; color: gray; text-align: center; font-weight: bold; margin-top: 5px;'>* condition apply</p></div></div></body></html>";

  					if (mail($to, $email_subject, $message, $headers))
		  	  		{
			      		$mail_status=1;
			      		$success_message = 3;

		  	  		}
	  	  			else {
	     				$mail_status=0;
	     				$success_message = 2;
	  	  			}
	  	  			mysqli_query($connection,"insert into stork_offer_provide_registered_users (offer_id,user_id,is_email_sent,is_validity,is_limit_status) values ('$offer_id','$user_id','$mail_status','1','1')") or die(mysql_error('registered insert query error'));		
				}
				else 
				{ 
					$success_message = 2;
				}
			}
		    else 
		    {
		  		$success_message = 2;
		  	}
		  		
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
		</section> <!---breadcrumb-->
		<section class="pr-main" id="pr-register">	
			<div class="container">	
				<div class="col-md-12 col-lg-12 text-center">
				<?php
					if(isset($_POST['save_new_user'])){
							if($success_message==2 ){
				?>
					<span class="reg_error_message_s text-center"><b>Successfully registred!</b></span>
				<?php
							}
							else if($success_message==3){
				?>
					<span class="reg_error_message_s text-center"><b>Successfully registred! Check offer in your mail</b></span>
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
						<h1 class="create_account">Create an Account</h1>
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




