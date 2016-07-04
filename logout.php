<?php
	@ob_start();
	session_start();
	if(isset($_SESSION['facebook_access_token'])){
		unset($_SESSION['facebook_access_token']);
	}
	$helper = array_keys($_SESSION);
    foreach ($helper as $key){
        unset($_SESSION[$key]);
    }
	header("location:index.php");
?>