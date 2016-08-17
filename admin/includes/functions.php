<?php
libxml_use_internal_errors(true);
function authenticate($username, $password) 
{
	$username = mysql_real_escape_string($username);
	$password = $password;

	// $query    = mysqlQuery("SELECT `adminuser_email` FROM `stork_admin_users` WHERE `adminuser_username`='$username' AND `adminuser_password`='$password'");

	$query    = mysqlQuery("SELECT * FROM `stork_admin_users` WHERE `adminuser_username`='$username' AND `adminuser_password`='$password'");
	if (mysql_num_rows($query) > 0){
		$fetch_data = mysql_fetch_array($query);
		$_SESSION['is_superuser'] = $fetch_data['adminuser_is_superuser'];
		$_SESSION['user_id'] = $fetch_data['adminuser_id'];
		return true;
	}
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
