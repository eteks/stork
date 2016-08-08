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
				$amount_per_page = selectfunction('cost_estimation_multicolor_amount',MULTICOLOR,'cost_estimation_multicolor_paper_print_type_id ="'.$_POST['print_type_id'].'" and cost_estimation_multicolor_paper_side_id ="'.$_POST['print_side_id'].'" and cost_estimation_multicolor_paper_size_id ="'.$_POST['papar_size_id'].'" and cost_estimation_multicolor_paper_type_id ="'.$_POST['paper_type_id'].'" and cost_estimation_multicolor_copies_id="'.$_POST['no_of_copies'].'"  and cost_estimation_multicolor_status ="1"',$connection);
				$amount_data = mysqli_fetch_array($amount_per_page);
				if(mysqli_num_rows($amount_per_page) == 1){
					echo $amount_data['cost_estimation_multicolor_amount'];
				}
			}else{
				if($_POST['print_type_id']=='colorwithblack&white'){
					$color_id_query = selectfunction('paper_print_type_id',PRINTTYPE,'paper_print_type="Color"',$connection);
					$color_id_data = mysqli_fetch_array($color_id_query);
					$blackandwhite_id_query = selectfunction('paper_print_type_id',PRINTTYPE,'(paper_print_type="Black & White" OR paper_print_type="Black and white")',$connection);
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
			$college_list_with_area_query = "select * from stork_college inner join stork_area on stork_college.college_area_id = stork_area.area_id where stork_area.area_city_id =".$_POST['city_id']." and stork_area.area_status = '1' and stork_college.college_status = '1' ORDER BY stork_college.college_name asc;" ;
			$college_list_with_area_data = mysqli_query($connection, $college_list_with_area_query);
			while($row = mysqli_fetch_array($college_list_with_area_data)){
				echo "<option city-id ='".$row['college_area_id']."' value ='".$row['college_id']."'>".$row['college_name'].", ".$row['area_name']."</option>";
			}
		}
		
		// show all area list
		if(isset($_POST['city_data_for_area'])){
			$area_list_query = "select * from stork_area where stork_area.area_city_id =".$_POST['city_id']." and stork_area.area_status = '1' order by stork_area.area_name asc";
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
		
		// return delivery cost to check out page
		if(isset($_POST['delivery_cost_per_area'])){
			$delivery_cost_query = mysqli_query($connection, "select * from stork_area where area_name = '".$_POST['area']."'");
			$delivery_cost_data = mysqli_fetch_array($delivery_cost_query);
			if(mysqli_num_rows($delivery_cost_query) == 1 ){
				echo $delivery_cost_data['area_delivery_charge'];
			}
		}
		
		//return amount base on print type, print side, paper type, paper size for multicolor printing
		if(isset($_POST['amount_per_copy_multi'])){
			$amount_per_page = selectfunction('cost_estimation_multicolor_amount',MULTICOLOR,'cost_estimation_multicolor_paper_print_type_id ="'.$_POST['print_type'].'" and cost_estimation_multicolor_paper_side_id ="'.$_POST['print_side'].'" and cost_estimation_multicolor_paper_size_id ="'.$_POST['papar_size'].'" and cost_estimation_multicolor_paper_type_id ="'.$_POST['paper_type'].'" and cost_estimation_multicolor_copies_id="'.$_POST['noofcopies'].'" and cost_estimation_multicolor_status ="1"',$connection);
			$amount_data = mysqli_fetch_array($amount_per_page);
			if(mysqli_num_rows($amount_per_page) == 1){
				echo $amount_data['cost_estimation_multicolor_amount'];
			}
		}
		
		//retriver offer amount in checkout page
		if(isset($_POST['offer_code_check'])){
			$user_type = explode('_', $_POST['offer_user_type']);
			if($user_type[1] == 'stu'){
				$offer_user_type = 'student';
			}
			else if($user_type[1] == 'pro'){
				$offer_user_type = 'profession';
			}
			$offer_type_check_query = mysqli_query($connection, "select * from stork_offer_details where offer_code = '".$_POST['offer_code']."' and offer_status ='1' and DATE(offer_validity_end_date) > DATE(NOW())");
			$offer_details = mysqli_fetch_array($offer_type_check_query);
			if(mysqli_num_rows($offer_type_check_query) == 1){
				$offer_type = $offer_details['offer_type'];
				if($offer_type == 'general_offer'){
					if($user_type[0] =='reg'){
						if($offer_details['offer_user_type'] == 'both' || $offer_details['offer_user_type'] == $offer_user_type){
							$offer_amt = $offer_details['offer_amount'];
							$offer_id_query = mysqli_query($connection, "select * from stork_offer_provide_registered_users where offer_id = '".$offer_details['offer_id']."' and user_id ='".$_POST['offer_user_id']."' and is_limit_status = '1' and is_validity = '1' ");
							$offer_id_data = mysqli_fetch_array($offer_id_query);
							if($offer_id_data['limit_used'] < $offer_details['offer_usage_limit'] ){
								$offer_id_provided = $offer_id_data['offer_provided_id'];
								echo $offer_amt.'#'.$offer_id_provided.'#'.$offer_details['offer_eligible_amount'].'#general#'.$offer_details['offer_amount_type'];
							}
							else{
								echo "limit";	
							}
						}
						else {
							echo "swapuser";
						}
					}
					else {
						echo "guest";						
					}
					
				}
				else if($offer_type == 'customer_offer'){
					if($offer_details['offer_user_type'] == 'both' || $offer_details['offer_user_type'] == $offer_user_type){
						$offer_amt = $offer_details['offer_amount'];
						$userid = ($_POST['offer_user_id'] != 0 ? $_POST['offer_user_id'] : NULL);
						$offer_id_query = mysqli_query($connection, "select * from stork_offer_provide_all_users where offer_id = '".$offer_details['offer_id']."' and offer_provided_user_id ='".$userid."' and offer_provided_usertype ='".$_POST['offer_user_type']."' and is_limit_status = '1' and is_validity = '1' and status ='1'");
						$offer_id_data = mysqli_fetch_array($offer_id_query);
						if(mysqli_num_rows($offer_id_query) == 1){
							if($offer_id_data['limit_used'] < $offer_details['offer_usage_limit'] ){
								$offer_id_provided = $offer_id_data['offer_provided_details_id '];
								echo $offer_amt.'#'.$offer_id_provided.'#'.$offer_details['offer_eligible_amount'].'#customer#'.$offer_details['offer_amount_type'];
							}
							else{
								echo "limit";	
							}
						}
						else{
							echo "notavail";
						}
					}
					else {
						echo "swapuser";
					}
				}else{
					echo 'expired';
				}
				
			}
			else {
				echo 'invalid';
			}
			
		}
	}// end of is ajax if condition
?>
