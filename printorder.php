<?php
include('dbconnect.php');
require_once("function.php");
@ob_start();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//print_r($_POST);
	if($_POST['submit_type'] == 'add_to_cart' || $_POST['submit_type'] == 'add_to_checkout'){
		$print_type = $_POST['print_type'];
		// $print_type_query = mysqli_query($connection, 'select * from stork_paper_print_type where paper_print_type_id="'.$print_type.'"') ;
		// $print_type_array = mysqli_fetch_array($print_type_query, MYSQL_ASSOC);
		// $print_type_name =  $print_type_array['paper_print_type'];
		// echo $print_type_name;
		if($print_type_name == 'Black & White and Color'){}
		$print_side = $_POST['print_side'];
		$paper_type = $_POST['papar_type'];
		$paper_size = $_POST['papar_size'];
		$bindingoption = $_POST['binding_option'];
		$binding_type = 'nil';
		$print_page_type = 'nil';
		if($bindingoption == 'yes'){
			$binding_type = $_POST['binding_type'];
			$print_page_type = $_POST['upload_files_page_type'];
			$is_binding = 1;
		}else{
			$is_binding = 0;
		}
		$total_no_page = $_POST['print_totalpage'];
		$total_cost = $_POST['print_totalcost'];
		$comments = $_POST['print_comments'];
		$session_id = $_SESSION['session_id'];
		$upload_path = "upload_files/";
		chmod($upload_path, 0777);
		$additional_path = $_SESSION['session_id'].'/';
		if(!is_dir($upload_path.$additional_path)){
			@mkdir($upload_path.$additional_path, 0777, true);
		}
		$insert_data_order_details = $print_type.','.$paper_size.','.$print_side.','.$paper_type.','.$is_binding.',"'.$binding_type.'",'.$total_no_page.','.$total_cost.',"'.$comments.'","'.$session_id.'",1';
		insertfunction('order_details_paper_print_type_id,order_details_paper_size_id,order_details_paper_side_id,order_details_paper_type_id,order_details_is_binding,order_details_binding_type,order_details_total_no_of_pages,order_details_total_amount,order_details_comments,order_details_session_id,order_details_status',$insert_data_order_details,ORDERDETAILS,'',$connection);
		$order_detail_id = mysqli_insert_id($connection);
		if(isset($_FILES['printfiles'])){
			//print_r($_FILES['printfiles']);
    		$name_array = $_FILES['printfiles']['name'];
			$tmp_name_array = $_FILES['printfiles']['tmp_name'];
    		$type_array = $_FILES['printfiles']['type'];
    		$size_array = $_FILES['printfiles']['size'];
    		$error_array = $_FILES['printfiles']['error'];
		    for($i = 0; $i < count($tmp_name_array); $i++){
		    	$filename = $name_array[$i];
				$filename = str_replace('..', '', $filename);
				$filename = str_replace('/', '', $filename);
				$filename = str_replace('\\', '', $filename);
				$extesion_find = explode(".", $filename);
				$extension = end($extesion_find);
				if(in_array($extension, $ALLOWEDFILE)){
			        if(move_uploaded_file($tmp_name_array[$i], $upload_path.$additional_path.$name_array[$i])){
			        	$insert_data_upload_files = $order_detail_id.','.$is_binding.',"'.$print_page_type.'","'.$upload_path.$additional_path.$name_array[$i].'","'.$_POST['filepageno'][$i].'",1';
			            insertfunction('upload_files_order_details_id,upload_files_is_binding,upload_files_type,upload_files,upload_files_color_print_pages,upload_files_status',$insert_data_upload_files,UPLOADFILES,'',$connection);
						if($_POST['submit_type'] == 'add_to_cart'){
							header('Location:printbooking.php');
						}
						else if($_POST['submit_type'] == 'add_to_checkout'){
							header('Location:checkout.php');
						}	
						
			        } else {
						header('Location:printbooking.php?error1=true');
			        }
				}
				else{
					header('Location:printbooking.php?error2=true');
				}
		    }
		}
		else {
			header('Location:printbooking.php?error3=true');
		}
	}// end of add to cart
	
	
}

?>