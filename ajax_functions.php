<?php
	require_once ("dbconnect.php");
	require_once("function.php");
	
	if(IS_AJAX){ // check if request is ajax or not
	
		// college data append based on area when user select area in index page
		if(isset($_POST['area_data'])){
			$college = selectfunction('*',COLLEGE,'college_area_id ="'.$_POST['area_id'].'" and college_status ="1"',$connection);
			while($row = mysqli_fetch_array($college)){
				echo "<option value ='".$row['college_id']."'>".$row['college_name']."</option>";
			}
		}
		
		// area data append based on state when user select state in index page
		if(isset($_POST['state_data'])){
			$college = selectfunction('*',AREA,'area_state_id ="'.$_POST['state_id'].'" and area_status ="1"',$connection);
			while($row = mysqli_fetch_array($college)){
				echo "<option value ='".$row['area_id']."'>".$row['area_name']."</option>";
			}
		}
		
		
		// cost estimation for per page in print booking page
		if(isset($_POST['cost_estimation_per_page'])){
			$amount_per_page = selectfunction('cost_estimation_amount',COSTESTIMATION,'cost_estimation_paper_print_type_id ="'.$_POST['print_type_id'].'" and cost_estimation_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_status ="1"',$connection);
			$amount_data = mysqli_fetch_array($amount_per_page);
			if(mysqli_num_rows($amount_per_page) == 1){
				echo $amount_data['cost_estimation_amount'];
			}
		}
		
		
	}// end of is ajax if condition
?>