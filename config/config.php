<?php
ini_set('mysql.connect_timeout', 60);

ini_set('default_socket_timeout', 60);

$root = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);

if (substr($root, -1) == "/")    $root = 'http://' . $_SERVER['SERVER_NAME'];

// define("database", "BBBmcmf_stork");
// define("databaseServer", "mysql1110.ixwebhosting.com");
// define("databaseUser", "BBBmcmf_stork");
// define("databasePass", "Stork_123");
// define("displayMySqlErrors",false);

define("database", "stork");
define("databaseServer", "localhost");
define("databaseUser", "root");
define("databasePass", "root");
define("displayMySqlErrors",false);

error_reporting(E_ERROR);

$link  = @mysql_connect(databaseServer, databaseUser, databasePass, true);

$check = @mysql_select_db(database, $link);

function mysqlQuery($query) {

	$link = @mysql_connect(databaseServer, databaseUser, databasePass, true);
	   
	$check = @mysql_select_db(database,$link);
		
	$error = "";
	
	$results = @mysql_query($query) or ($error = mysql_error());
	
	if($error!="" && displayMySqlErrors) {
	echo "Error: " . $error . "<br />Query : " . $query . "<br />File : " . $_SERVER['PHP_SELF'] . "<br>";
	}
	
return $results;

}
if(!$link)
echo "<br><strong>Db Not Connected</strong><br><br>";
?>