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
		$check1 = mysql_query("select * from stork_users where facebook_uid='".$userProfile['id']."' and user_status = '1'");
		$check = mysql_num_rows($check1);
		if ($check == 0) { // if new user . Insert a new record		
		
			$query = "INSERT INTO stork_users (facebook_uid,username,password,first_name,last_name,user_type,user_email,user_dob,line1,line2,user_area_id,user_state_id,user_mobile,user_access_type,user_status) VALUES ('".$userProfile['id']."','".$userProfile['email']."','".$userProfile['given_name']."','".$userProfile['given_name']."','".$userProfile['family_name']."','gp','".$userProfile['email']."','gp','gp','gp','1','1','gp','3','1')";
			mysql_query($query);	
		} else {   // If Returned user . update the user record		
			$query = "UPDATE stork_users SET first_name='".$userProfile['given_name']."', user_email='".$userProfile['email']."' where Fuid='".$userProfile['id']."'and user_status = '1'";
			mysql_query($query);
		}
		
		$_SESSION['token'] = $gClient->getAccessToken();
		header("location: index.php");
	} 
?>