<?php
libxml_use_internal_errors(true);
function authenticate($username, $password) 
{
	$username = mysql_real_escape_string($username);
	$password = $password;
    // echo "username",$username;
	// echo "password",$password;
	$query    = mysqlQuery("SELECT `adminuser_email` FROM `stork_admin_users` WHERE `adminuser_username`='$username' AND `adminuser_password`='$password'");
	if (mysql_num_rows($query) > 0)
		return true;
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
