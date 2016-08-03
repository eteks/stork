<?php 
			if (!isset($_SESSION)) session_start();
			include "includes/config.php";		
			if(isset($_GET['loadareafromdb'])){
				$city_id=$_POST['city_id'];	
				// echo $city_id;	
				$json =array();
				$qryarea = mysql_query("SELECT * FROM stork_area WHERE area_city_id = '$city_id' order by area_name asc");	
				// echo mysql_num_rows($qrycity);						
				while ( $result = mysql_fetch_array( $qryarea )){
			    	$tmp = array(
		           'area_id' => $result['area_id'],
		           'area_name'=> $result['area_name'],	          
		           );
		    		array_push( $json, $tmp );
			    }
			    echo json_encode($json);
			} 
		
?>