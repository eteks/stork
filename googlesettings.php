<?php
		include_once("Google/Google_Client.php");
		include_once("Google/contrib/Google_Oauth2Service.php");
		include_once("settings.php");
		######### edit details ##########
		$clientId = GOOGLECLIENTID; //check with setting.php
		$clientSecret = GOOGLECLIENTSECRET; //check with setting.php
		$redirectUrl = GOOGLEREDIRECTURL; //check with setting.php
		$homeUrl = GOOGLEHOMEURL; //check with setting.php
		$gClient = new Google_Client();
		$gClient->setApplicationName(GOOGLEAPPNAME);
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