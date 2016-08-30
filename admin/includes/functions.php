<?php
libxml_use_internal_errors(true);
function authenticate($username, $password) 
{
	$username = mysql_real_escape_string($username);
	$password = $password;

	// $query    = mysqlQuery("SELECT `adminuser_email` FROM `stork_admin_users` WHERE `adminuser_username`='$username' AND `adminuser_password`='$password'");

	$query    = mysqlQuery("SELECT * FROM `stork_admin_users` WHERE `adminuser_username`='$username' AND `adminuser_password`='$password'");
	if (mysql_num_rows($query) == 1){
		$fetch_data = mysql_fetch_array($query);
		$_SESSION['is_superuser'] = $fetch_data['adminuser_is_superuser'];
		$_SESSION['user_id'] = $fetch_data['adminuser_id'];
		$_SESSION['user_name'] = $fetch_data['adminuser_username'];
		if($fetch_data['adminuser_status'] == 0){
			$_SESSION['adminuser_status'] = $fetch_data['adminuser_username'];
			return false;
		}
		return true;
	}
	unset($_SESSION['adminuser_status']);
	return false;
}
function mres($var) 
{
    if (get_magic_quotes_gpc()) 
	{
        $var = stripslashes(trim($var));	
    }
	return mysql_real_escape_string(trim($var));
}
?>
