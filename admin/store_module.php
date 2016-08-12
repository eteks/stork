<?php 
	if (!isset($_SESSION)) session_start();
	include "includes/config.php";		
	$module = $_POST['module_array'];		
	$qr = mysql_query("SELECT module_name FROM stork_module");

	$module_array = array();
	while($row = mysql_fetch_array($qr)){ 
      $module_array[] = strtolower($row['module_name']);
    }
	foreach ($module as $key => $value) {
		if (!in_array(strtolower($value), $module_array)) {
	        $module_name = $value;
	        $module_codename = strtolower(str_replace(" ","_",$value));
	        mysqlQuery("INSERT INTO `stork_module` (module_name,module_codename,module_status) VALUES ('$module_name','$module_codename','1')");
	    }
	}
?>