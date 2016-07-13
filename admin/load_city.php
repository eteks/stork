<?php 
			if (!isset($_SESSION)) session_start();
			include "includes/config.php";		
			if(isset($_GET['loadcityfromdb'])){
				$state_id=$_POST['states_id'];		
				$json =array();
				$qrycity = mysql_query("SELECT * FROM stork_city WHERE city_state_id = '$state_id'");	
				// echo mysql_num_rows($qrycity);						
				while ( $result = mysql_fetch_array( $qrycity )){
			    	$tmp = array(
		           'city_id' => $result['city_id'],
		           'city_name'=> $result['city_name'],	          
		           );
		    		array_push( $json, $tmp );
			    }
			    echo json_encode($json);
			} 
		
?>