<?php
		include_once("Google/Google_Client.php");
		include_once("Google/contrib/Google_Oauth2Service.php");
		######### edit details ##########
		$clientId = '917333063130-v76t7dmqcvvbtq4cum8h9kej9dlql8jb.apps.googleusercontent.com'; 
		$clientSecret = 'tKRvzUInxty26p19oMli58V9'; 
		$redirectUrl = 'http://localhost/stork/googleuserfunction.php'; 
		$homeUrl = 'http://localhost/stork/index.php'; 
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login to localhost');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectUrl);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		if(isset($_REQUEST['code'])){
			$gClient->authenticate();
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
		}
		if (isset($_SESSION['token'])) {
			$gClient->setAccessToken($_SESSION['token']);
		}
		if ($gClient->getAccessToken()) {
		} else {
			$authUrl = $gClient->createAuthUrl();
		}
?>