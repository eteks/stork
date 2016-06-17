<?php
		require_once __DIR__ . '/Facebook/autoload.php';
		$fb = new Facebook\Facebook([
		  	'app_id' => '800444590056438',
		  	'app_secret' => 'd422bcf132c700ed89d03865cdff884a',
		  	'default_graph_version' => 'v2.5',
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		try {
			if (isset($_SESSION['facebook_access_token'])) {
				$accessToken = $_SESSION['facebook_access_token'];
			} else {
		  		$accessToken = $helper->getAccessToken();
			}
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		 	// When Graph returns an error
		 	echo 'Graph returned an error: ' . $e->getMessage();
		  	exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		 	// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  	exit;
	 	}
?>