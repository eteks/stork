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
		
		
		// remove item from cart detail
		if(isset($_POST['remove_order'])){
			$remove_cart_data = deletefunction('stork_order_details','order_details_session_id="'.$_POST['session_id'].'" and order_details_id ="'.$_POST['order_details_id'].'"',$connection);
			if($remove_cart_data){
				echo "remove_success";
			}
			else{
				echo "remove_error";
			}
		}
		
		
		// show all college and area list
		if(isset($_POST['city_data_for_college'])){
			$college_list_with_area_query = "select * from stork_college inner join stork_area on stork_college.college_area_id = stork_area.area_id where stork_area.area_city_id =".$_POST['city_id'];
			$college_list_with_area_data = mysqli_query($connection, $college_list_with_area_query);
			while($row = mysqli_fetch_array($college_list_with_area_data)){
				echo "<option value ='".$row['college_id']."'>".$row['college_name'].", ".$row['area_name']."</option>";
			}
		}
		
		// show all area list
		if(isset($_POST['city_data_for_area'])){
			$area_list_query = "select * from stork_area where stork_area.area_city_id =".$_POST['city_id'];
			$area_list_data = mysqli_query($connection, $area_list_query);
			while($row = mysqli_fetch_array($area_list_data)){
				echo "<option value ='".$row['area_id']."'>".$row['area_name']."</option>";
			}
		}
		
		// retrive binding amount based on type
		if(isset($_POST['binding_amount_value'])){
			$binding_amount_query = selectfunction('*',BINDINGAMOUNT,'cost_estimation_binding_type ="'.$_POST['binding_type'].'" and cost_estimation_binding_status ="1"',$connection);
			$row = mysqli_fetch_array($binding_amount_query);
			if($row['cost_estimation_binding_amount']){
				echo $row['cost_estimation_binding_amount'];
			}
			else{
				echo "error_bind_amt";
			}
		}
		
		// cost estimation for per page in project print booking page
		if(isset($_POST['cost_estimation_per_page_for_project'])){
			$amount_per_page = selectfunction('cost_estimation_project_printing_amount',PROJECTCOSTESTIMATION,'cost_estimation_project_printing_paper_print_type_id ="'.$_POST['print_type_id'].'" and cost_estimation_project_printing_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_project_printing_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_project_printing_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_project_printing_status ="1"',$connection);
			$amount_data = mysqli_fetch_array($amount_per_page);
			if(mysqli_num_rows($amount_per_page) == 1){
				echo $amount_data['cost_estimation_project_printing_amount'];
			}
		}
		
		
	}// end of is ajax if condition
?>