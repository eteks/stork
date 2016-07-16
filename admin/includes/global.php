<?php 
	$query_plain_printing_type=mysql_query("SELECT * FROM stork_printing_type WHERE printing_type='plain_printing'");
	$row_plain_printing_type = mysql_fetch_array($query_plain_printing_type);

	$query_project_printing_type=mysql_query("SELECT * FROM stork_printing_type WHERE printing_type='project_printing'");
	$row_project_printing_type = mysql_fetch_array($query_project_printing_type);

	$query_multi_printing_type=mysql_query("SELECT * FROM stork_printing_type WHERE printing_type='multicolor_printing'");
	$row_multi_printing_type = mysql_fetch_array($query_multi_printing_type);

	// Array for decalring timing type to be used throughout the application for cabin booking
	$timing_type = array('fixed' => 'Fixed','flexible' => 'Flexible');

?>