<?php
include('dbconnect.php');
require_once("function.php");
@ob_start();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if($_POST['submit_type'] == 'add_to_cart' || $_POST['submit_type'] == 'add_to_checkout'){
		$printing_type = $_POST['printing_type'];
		if($printing_type == 'plain_printing'){
			$print_type = $_POST['print_type'];
			$print_type_query = mysqli_query($connection, 'select * from stork_paper_print_type where paper_print_type_id="'.$print_type.'"') ;
			$print_type_array = mysqli_fetch_array($print_type_query, MYSQL_ASSOC);
			$print_type_name =  $print_type_array['paper_print_type'];
			$print_side = $_POST['print_side'];
			$paper_type = $_POST['papar_type'];
			$paper_size = $_POST['papar_size'];
			$bindingoption = $_POST['binding_option'];
			$binding_type = 'nil';
			$print_page_type = 'nil';
			if($bindingoption == 'yes'){
				$binding_type = $_POST['binding_type'];
				if($binding_type == 'soft_binding'){
					$print_page_type = $_POST['page_type_option'];
					if($print_page_type == 'yes'){
						$isprint_page_type = 1;
					}
					else{
						$isprint_page_type = 0;
					}
				}
				else{
					$isprint_page_type = 0;
				}
				$is_binding = 1;
			}else{
				$is_binding = 0;
				$isprint_page_type = 0;
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
			$insert_data_order_details = '"'.$printing_type.'",'.$print_type.','.$paper_size.','.$print_side.','.$paper_type.','.$is_binding.',"'.$binding_type.'",'.$isprint_page_type.','.$total_no_page.','.$total_cost.',"'.$comments.'","'.$session_id.'",1';
			insertfunction('order_print_booking_type,order_details_paper_print_type_id,order_details_paper_size_id,order_details_paper_side_id,order_details_paper_type_id,order_details_is_binding,order_details_binding_type,order_details_print_page_type_required,order_details_total_no_of_pages,order_details_total_amount,order_details_comments,order_details_session_id,order_details_status',$insert_data_order_details,ORDERDETAILS,'',$connection);
			$order_detail_id = mysqli_insert_id($connection);
			if($isprint_page_type == '1'){
				if(isset($_FILES['cover_printfiles'])){
					$cover_file_name_array = $_FILES['cover_printfiles']['name'];
					$cover_file_tmp_name_array = $_FILES['cover_printfiles']['tmp_name'];
		    		$cover_file_type_array = $_FILES['cover_printfiles']['type'];
		    		$cover_file_size_array = $_FILES['cover_printfiles']['size'];
		    		$cover_file_error_array = $_FILES['cover_printfiles']['error'];
					for($i = 0; $i < count($cover_file_tmp_name_array); $i++){
				    	$coverfilename = $cover_file_name_array[$i];
						$coverfilename = str_replace('..', '', $coverfilename);
						$filename = str_replace('/', '', $coverfilename);
						$coverfilename = str_replace('\\', '', $coverfilename);
						$cover_file_extesion_find = explode(".", $coverfilename);
						$cover_file_extension = end($cover_file_extesion_find);
						if(in_array($cover_file_extension, $ALLOWEDFILE)){
							
					        if(move_uploaded_file($cover_file_tmp_name_array[$i], $upload_path.$additional_path.$cover_file_name_array[$i])){
					        	$cover_insert_data_upload_files = $order_detail_id.','.$is_binding.',"cover","'.$upload_path.$additional_path.$cover_file_name_array[$i].'","0-0",1';
					            insertfunction('upload_files_order_details_id,upload_files_is_binding,upload_files_type,upload_files,upload_files_color_print_pages,upload_files_status',$cover_insert_data_upload_files,UPLOADFILES,'',$connection);
					        } else {
								header('Location:printbooking.php?error4=true&service='.$_SESSION[service]);
					        }
						}
						else{
							header('Location:printbooking.php?error5=trueservice='.$_SESSION[service]);
						}
				    }
				}
			}
			if(isset($_FILES['printfiles'])){
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
		        			if($print_type_name == 'Color with Black & White'){
								$insert_data_upload_files = $order_detail_id.','.$is_binding.',"content","'.$upload_path.$additional_path.$name_array[$i].'","'.$_POST['filepageno'][$i].'",1';			
							}
							else{
				        		$insert_data_upload_files = $order_detail_id.','.$is_binding.',"content","'.$upload_path.$additional_path.$name_array[$i].'","0-0",1';
							}
				            insertfunction('upload_files_order_details_id,upload_files_is_binding,upload_files_type,upload_files,upload_files_color_print_pages,upload_files_status',$insert_data_upload_files,UPLOADFILES,'',$connection);
							if($_POST['submit_type'] == 'add_to_cart'){
								header('Location:printbooking.php?service='.$_SESSION[service]);
							}
							else if($_POST['submit_type'] == 'add_to_checkout'){
								header('Location:checkout.php');
							}	
							
				        } else {
							header('Location:printbooking.php?error1=true&service='.$_SESSION[service]);
				        }
					}
					else{
						header('Location:printbooking.php?error2=trueservice='.$_SESSION[service]);
					}
			    }
			}
			else {
				header('Location:printbooking.php?error3=trueservice='.$_SESSION[service]);
			}
		} // end of plain printing
		else if($printing_type == 'project_printing'){
			echo "<pre>";
			print_r($_POST);
			print_r($_FILES);
			echo "</pre>";
			$print_type = $_POST['project_print_type'];
			$print_side = $_POST['project_print_side'];
			$paper_type = $_POST['project_papar_type'];
			$paper_size = $_POST['project_papar_size'];
			$is_binding = 1;
			$bindingtype = $_POST['binding_type'];
			$isprint_page_type = 1;
			$total_no_page = $_POST['project_total_pages'];
			$total_cost = $_POST['project_total_amount'];
			$comments = $_POST['project_print_comments'];
			$session_id = $_SESSION['session_id'];
			$upload_path = "upload_files/";
			chmod($upload_path, 0777);
			$additional_path = $_SESSION['session_id'].'/';
			if(!is_dir($upload_path.$additional_path)){
				@mkdir($upload_path.$additional_path, 0777, true);
			}
			$insert_data_project_order_details = '"'.$printing_type.'",'.$print_type.','.$paper_size.','.$print_side.','.$paper_type.','.$is_binding.',"'.$bindingtype.'",'.$isprint_page_type.','.$total_no_page.','.$total_cost.',"'.$comments.'","'.$session_id.'",1';
			insertfunction('order_print_booking_type,order_details_paper_print_type_id,order_details_paper_size_id,order_details_paper_side_id,order_details_paper_type_id,order_details_is_binding,order_details_binding_type,order_details_print_page_type_required,order_details_total_no_of_pages,order_details_total_amount,order_details_comments,order_details_session_id,order_details_status',$insert_data_project_order_details,ORDERDETAILS,'',$connection);
			$order_detail_id = mysqli_insert_id($connection);
			if(isset($_FILES['cover_project_print_file'])){
				$cover_name_array = $_FILES['cover_project_print_file']['name'];
				$cover_tmp_name_array = $_FILES['cover_project_print_file']['tmp_name'];
	    		$cover_type_array = $_FILES['cover_project_print_file']['type'];
	    		$cover_size_array = $_FILES['cover_project_print_file']['size'];
	    		$cover_error_array = $_FILES['cover_project_print_file']['error'];
				$cover_filename = $cover_name_array;
				$cover_filename = str_replace('..', '', $cover_filename);
				$cover_filename = str_replace('/', '', $cover_filename);
				$cover_filename = str_replace('\\', '', $cover_filename);
				$cover_extesion_find = explode(".", $cover_filename);
				$cover_extension = end($cover_extesion_find);
				if(in_array($cover_extension, $ALLOWEDFILE)){
					 if(move_uploaded_file($cover_tmp_name_array, $upload_path.$additional_path.$cover_name_array)){
					 	$insert_cover_data_upload_files = $order_detail_id.','.$is_binding.',"cover","'.$upload_path.$additional_path.$cover_name_array.'","'.$_POST['cover_project_color_page_nos'].'",1';
						insertfunction('upload_files_order_details_id,upload_files_is_binding,upload_files_type,upload_files,upload_files_color_print_pages,upload_files_status',$insert_cover_data_upload_files,UPLOADFILES,'',$connection);
					 }
				}
			}
			if(isset($_FILES['index_project_print_file'])){
				$index_name_array = $_FILES['index_project_print_file']['name'];
				$index_tmp_name_array = $_FILES['index_project_print_file']['tmp_name'];
	    		$index_type_array = $_FILES['index_project_print_file']['type'];
	    		$index_size_array = $_FILES['index_project_print_file']['size'];
	    		$index_error_array = $_FILES['index_project_print_file']['error'];
				$index_filename = $index_name_array;
				$index_filename = str_replace('..', '', $index_filename);
				$index_filename = str_replace('/', '', $index_filename);
				$index_filename = str_replace('\\', '', $index_filename);
				$index_extesion_find = explode(".", $index_filename);
				$index_extension = end($index_extesion_find);
				if(in_array($index_extension, $ALLOWEDFILE)){
					 if(move_uploaded_file($index_tmp_name_array, $upload_path.$additional_path.$index_name_array)){
					 	$insert_index_data_upload_files = $order_detail_id.','.$is_binding.',"index","'.$upload_path.$additional_path.$index_name_array.'","'.$_POST['index_project_color_page_nos'].'",1';
						insertfunction('upload_files_order_details_id,upload_files_is_binding,upload_files_type,upload_files,upload_files_color_print_pages,upload_files_status',$insert_index_data_upload_files,UPLOADFILES,'',$connection);
					 }
				}
			}
			if(isset($_FILES['reference_project_print_file'])){
				$reference_name_array = $_FILES['reference_project_print_file']['name'];
				$reference_tmp_name_array = $_FILES['reference_project_print_file']['tmp_name'];
	    		$reference_type_array = $_FILES['reference_project_print_file']['type'];
	    		$reference_size_array = $_FILES['reference_project_print_file']['size'];
	    		$reference_error_array = $_FILES['reference_project_print_file']['error'];
				$reference_filename = $reference_name_array;
				$reference_filename = str_replace('..', '', $reference_filename);
				$reference_filename = str_replace('/', '', $reference_filename);
				$reference_filename = str_replace('\\', '', $reference_filename);
				$reference_extesion_find = explode(".", $reference_filename);
				$reference_extension = end($reference_extesion_find);
				if(in_array($reference_extension, $ALLOWEDFILE)){
					 if(move_uploaded_file($reference_tmp_name_array, $upload_path.$additional_path.$reference_name_array)){
					 	$insert_reference_data_upload_files = $order_detail_id.','.$is_binding.',"reference","'.$upload_path.$additional_path.$reference_name_array.'","'.$_POST['reference_project_color_page_nos'].'",1';
						insertfunction('upload_files_order_details_id,upload_files_is_binding,upload_files_type,upload_files,upload_files_color_print_pages,upload_files_status',$insert_reference_data_upload_files,UPLOADFILES,'',$connection);
					 }
				}
			}
		}
		if(isset($_FILES['content_print_file'])){
	    		$content_name_array = $_FILES['content_print_file']['name'];
				$content_tmp_name_array = $_FILES['content_print_file']['tmp_name'];
	    		$content_type_array = $_FILES['content_print_file']['type'];
	    		$content_size_array = $_FILES['content_print_file']['size'];
	    		$content_error_array = $_FILES['content_print_file']['error'];
			    for($i = 0; $i < count($content_tmp_name_array); $i++){
			    	$content_filename = $content_name_array[$i];
					$content_filename = str_replace('..', '', $content_filename);
					$content_filename = str_replace('/', '', $content_filename);
					$content_filename = str_replace('\\', '', $content_filename);
					$content_extesion_find = explode(".", $content_filename);
					$content_extension = end($content_extesion_find);
					if(in_array($content_extension, $ALLOWEDFILE)){
				        if(move_uploaded_file($content_tmp_name_array[$i], $upload_path.$additional_path.$content_name_array[$i])){
			        		$insert_content_data_upload_files = $order_detail_id.','.$is_binding.',"content","'.$upload_path.$additional_path.$content_name_array[$i].'","'.$_POST['content_print_file'][$i].'",1';
				            insertfunction('upload_files_order_details_id,upload_files_is_binding,upload_files_type,upload_files,upload_files_color_print_pages,upload_files_status',$insert_content_data_upload_files,UPLOADFILES,'',$connection);
							if($_POST['submit_type'] == 'add_to_cart'){
								header('Location:printbooking.php?service='.$_SESSION[service]);
							}
							else if($_POST['submit_type'] == 'add_to_checkout'){
								header('Location:checkout.php');
							}	
							
				        } else {
							header('Location:printbooking.php?error1=true&service='.$_SESSION[service]);
				        }
					}
					else{
						header('Location:printbooking.php?error2=trueservice='.$_SESSION[service]);
					}
			    }
			}
			else {
				header('Location:printbooking.php?error3=trueservice='.$_SESSION[service]);
			}
	}// end of add to cart
	
	
}

?>