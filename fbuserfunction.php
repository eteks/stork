<?php
require 'dbconnect.php';
session_start();
require_once('fbsettings.php'); 
if (isset($accessToken)) {
			if (isset($_SESSION['facebook_access_token'])) {
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				// getting short-lived access token
				$_SESSION['facebook_access_token'] = (string) $accessToken;
			  	// OAuth 2.0 client handler
				$oAuth2Client = $fb->getOAuth2Client();
				// Exchanges a short-lived access token for a long-lived one
				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
				$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
				// setting default access token to be used in script
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}
			// redirect the user back to the same page if it has "code" GET variable
			// if (isset($_GET['code'])) {
				// header('Location: ./');
			// }
			// getting basic info about user
			try {
				$profile_request = $fb->get('/me?fields=name,first_name,last_name,email,age_range');
				$profile = $profile_request->getGraphNode()->asArray();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				echo 'Graph returned an error: ' . $e->getMessage();
				session_destroy();
				// redirecting user back to app login page
				header("Location: ./");
				exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			$check1 = mysqli_query($connection,"select * from stork_users where social_id='".$profile['id']."' and user_status = '1'");
			$check = mysqli_num_rows($check1);
			if ($check == 0) { // if new user . Insert a new record		
			
				$query = "INSERT INTO stork_users (social_id,username,password,first_name,last_name,user_type,user_email,user_dob,line1,line2,user_mobile,user_access_type,user_status) VALUES ('".$profile['id']."','".$profile['email']."','".$profile['first_name']."','".$profile['first_name']."','".$profile['last_name']."','fb','".$profile['email']."','fb','fb','fb','fb','2','1')";
				
				mysqli_query($connection,$query);
				$_SESSION['login_status'] = 1;
			} else {   // If Returned user . update the user record		
				$query = "UPDATE stork_users SET first_name='$ffname', user_email='$femail' where Fuid='$fuid'";
				mysqli_query($connection,$query);
				$_SESSION['login_status'] = 1;
			}
			// printing $profile array on the screen which holds the basic info about user
			header("Location: index.php");
		  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
}
?>
