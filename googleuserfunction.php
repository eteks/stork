<?php
	require 'dbconnect.php';
	session_start();
	require_once('googlesettings.php'); 
	if ($gClient->getAccessToken()) {
		$userProfile = $google_oauthV2->userinfo->get();
		//DB Insert
		//$gUser = new Users();
		//$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
		$_SESSION['google_data'] = $userProfile; 
		$check1_g = mysqli_query($connection,"select * from stork_users where social_id='".$userProfile['id']."' and user_status = '1'");
		$check = mysqli_num_rows($check1_g);
		
		if ($check == 0) { // if new user . Insert a new record		
			$query_g_n = "INSERT INTO stork_users (social_id,username,password,first_name,last_name,user_type,user_email,user_dob,line1,line2,user_mobile,user_access_type,user_status) VALUES ('".$userProfile['id']."','".$userProfile['email']."','".$userProfile['given_name']."','".$userProfile['given_name']."','".$userProfile['family_name']."','gp','".$userProfile['email']."','gp','gp','gp','gp','3','1')";
			mysqli_query($connection,$query_g_n);	
			$_SESSION['login_status'] = 1;
		} else {   // If Returned user . update the user record		
			$query_g_o = "UPDATE stork_users SET first_name='".$userProfile['given_name']."', user_email='".$userProfile['email']."' where social_id='".$userProfile['id']."'and user_status = '1'";
			mysqli_query($connection,$query_g_o);
			$_SESSION['login_status'] = 1;
		}
		
		$_SESSION['token'] = $gClient->getAccessToken();
		//header("location: index.php");
	} 
?>