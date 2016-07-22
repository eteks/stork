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
			// old code only for plain printing
			// $amount_per_page = selectfunction('cost_estimation_amount',COSTESTIMATION,'cost_estimation_paper_print_type_id ="'.$_POST['print_type_id'].'" and cost_estimation_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_status ="1"',$connection);
			// $amount_data = mysqli_fetch_array($amount_per_page);
			// if(mysqli_num_rows($amount_per_page) == 1){
			// 	echo $amount_data['cost_estimation_amount'];
			// }
			// newly changed the above code by kalai for both supporting plain and multi color printing on 07/06/16
			if($_POST['printing_type'] == "multicolor_printing"){
				$amount_per_page = selectfunction('cost_estimation_multicolor_amount',MULTICOLOR,'cost_estimation_multicolor_paper_print_type_id ="'.$_POST['print_type_id'].'" and cost_estimation_multicolor_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_multicolor_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_multicolor_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_multicolor_status ="1"',$connection);
				$amount_data = mysqli_fetch_array($amount_per_page);
				if(mysqli_num_rows($amount_per_page) == 1){
					echo $amount_data['cost_estimation_multicolor_amount'];
				}
			}else{
				if($_POST['print_type_id']=='colorwithblack&white'){
					$color_id_query = selectfunction('paper_print_type_id',PRINTTYPE,'paper_print_type="Color"',$connection);
					$color_id_data = mysqli_fetch_array($color_id_query);
					$blackandwhite_id_query = selectfunction('paper_print_type_id',PRINTTYPE,'paper_print_type="Black & White"',$connection);
					$blackandwhite_id_data = mysqli_fetch_array($blackandwhite_id_query);
					$amount_per_page_color = selectfunction('cost_estimation_amount',COSTESTIMATION,'cost_estimation_paper_print_type_id ="'.$color_id_data['paper_print_type_id'].'" and cost_estimation_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_status ="1"',$connection);
					$amount_per_page_blackandwhite = selectfunction('cost_estimation_amount',COSTESTIMATION,'cost_estimation_paper_print_type_id ="'.$blackandwhite_id_data['paper_print_type_id'].'" and cost_estimation_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_status ="1"',$connection);
					$amount_data_color = mysqli_fetch_array($amount_per_page_color);
					$amount_data_blackandwhite = mysqli_fetch_array($amount_per_page_blackandwhite);
					if(mysqli_num_rows($amount_per_page_color) == 1 && mysqli_num_rows($amount_per_page_blackandwhite) == 1){
						echo $amount_data_color['cost_estimation_amount'].'#'.$amount_data_blackandwhite['cost_estimation_amount'];
					}
				}
				else{
					$amount_per_page = selectfunction('cost_estimation_amount',COSTESTIMATION,'cost_estimation_paper_print_type_id ="'.$_POST['print_type_id'].'" and cost_estimation_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_status ="1"',$connection);
					$amount_data = mysqli_fetch_array($amount_per_page);
					if(mysqli_num_rows($amount_per_page) == 1){
						echo $amount_data['cost_estimation_amount'];
					}
				}
				
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
			//$color_id_query = selectfunction('paper_print_type_id',PRINTTYPE,'paper_print_type="Color"',$connection);
			$color_id_query = mysqli_query($connection, "select paper_print_type_id from stork_paper_print_type inner join stork_printing_type on stork_printing_type.printing_type_id = stork_paper_print_type.printing_type_id where stork_paper_print_type.paper_print_type ='Color' and stork_printing_type.printing_type = 'project_printing' ");
			$color_id_data = mysqli_fetch_array($color_id_query);
			$blackandwhite_id_query = mysqli_query($connection, "select paper_print_type_id from stork_paper_print_type inner join stork_printing_type on stork_printing_type.printing_type_id = stork_paper_print_type.printing_type_id where stork_paper_print_type.paper_print_type ='Black & White' and stork_printing_type.printing_type = 'project_printing' ");
			$blackandwhite_id_data = mysqli_fetch_array($blackandwhite_id_query);
			$amount_per_page_color = selectfunction('cost_estimation_project_printing_amount',PROJECTCOSTESTIMATION,'cost_estimation_project_printing_paper_print_type_id ="'.$color_id_data['paper_print_type_id'].'" and cost_estimation_project_printing_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_project_printing_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_project_printing_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_project_printing_status ="1"',$connection);
			$amount_per_page_blackandwhite = selectfunction('cost_estimation_project_printing_amount',PROJECTCOSTESTIMATION,'cost_estimation_project_printing_paper_print_type_id ="'.$blackandwhite_id_data['paper_print_type_id'].'" and cost_estimation_project_printing_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_project_printing_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_project_printing_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_project_printing_status ="1"',$connection);
			$amount_data_color = mysqli_fetch_array($amount_per_page_color);
			$amount_data_blackandwhite = mysqli_fetch_array($amount_per_page_blackandwhite);
			if(mysqli_num_rows($amount_per_page_color) == 1 && mysqli_num_rows($amount_per_page_blackandwhite) == 1){
				echo $amount_data_color['cost_estimation_project_printing_amount'].'#'.$amount_data_blackandwhite['cost_estimation_project_printing_amount'];
			}
		}
		
		// get holiday date list for cabin booking
		if(isset($_POST['cabin_booking_holiday_data'])){
			$holiday_date_array = array();
			$holiday_date_query = selectfunction('*',CABINHOLIDAY,'',$connection);
			while($row = mysqli_fetch_array($holiday_date_query)){
				array_push($holiday_date_array, $row['holiday_date']);
			}
			echo json_encode($holiday_date_array); 
		}
	}// end of is ajax if condition
?>