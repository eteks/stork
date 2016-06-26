<?php
include('dbconnect.php');
require_once("function.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//print_r($_POST);
	if($_POST['submit_type'] == 'add_to_cart' || $_POST['submit_type'] == 'add_to_checkout'){
		$print_type = $_POST['print_type'];
		$print_side = $_POST['print_side'];
		$paper_type = $_POST['papar_type'];
		$paper_size = $_POST['papar_size'];
		$total_no_page = $_POST['print_totalpage'];
		$total_cost = $_POST['print_totalcost'];
		$comments = $_POST['print_comments'];
		$session_id = $_SESSION['session_id'];
		$upload_path = "upload_files/";
		$additional_path = $_SESSION['session_id'].'/';
		if(!is_dir($upload_path.$additional_path)){
			@mkdir($upload_path.$additional_path, 0666, true);
		}
		$insert_data_order_details = $print_type.','.$paper_size.','.$print_side.','.$paper_type.','.$total_no_page.','.$total_cost.',"'.$comments.'","'.$session_id.'",1';
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
			        	insertfunction('order_details_paper_print_type_id,order_details_paper_size_id,order_details_paper_side_id,order_details_paper_type_id,order_details_total_no_of_pages,order_details_total_amount,order_details_comments,order_details_session_id,order_details_status',$insert_data_order_details,ORDERDETAILS,'',$connection);
						$order_detail_id = mysqli_insert_id();
			        	$insert_data_upload_files = $order_detail_id.',"'.$upload_path.$additional_path.$name_array[$i].'",1';
			            insertfunction('upload_files_order_details_id,upload_files,upload_files_status',$insert_data_upload_files,UPLOADFILES,'',$connection);
						if($_POST['submit_type'] == 'add_to_cart'){
							header('Location:printbooking.php');
						}
						else if($_POST['submit_type'] == 'add_to_checkout'){
							header('Location:checkout.php');
						}
						
			        } else {
			            echo "file uploading file";
						//header('Location:printbooking.php?error1=true');
			        }
				}
				else{
					echo 'invalid file format';
					//header('Location:printbooking.php?error2=true');
				}
		    }
		}
		else {
			//header('Location:printbooking.php?error3=true');
		}
	}// end of add to cart
	
	
}

?>