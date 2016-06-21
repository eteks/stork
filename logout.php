<?php
	session_start();
	if(isset($_SESSION['facebook_access_token'])){
		unset($_SESSION['facebook_access_token']);
	}
	header("location:index.php");
?>