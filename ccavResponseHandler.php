<?php 
include('Crypto.php');
require 'dbconnect.php';
?>
<?php
	error_reporting(0);
	date_default_timezone_set("Asia/Kolkata");
	$business_hour_start = date("H:i", strtotime("06:00"));
	$business_hour_start_str = strtotime($business_hour_start);
	$business_hour_end = date("H:i", strtotime("23:00"));
	$business_hour_end_str = strtotime($business_hour_end);
	$business_day_start = 'Sun';
	$business_day_end = 'Sat';
	$delivery_hours = strtotime("+24 hour");
	$delivery_hours_extented = strtotime("+31 hour");
	$workingKey='1DD4304715928B37B1170BED9EDB13A6';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==0)	$order_id=$information[1];
		if($i==1)	$tracking_id=$information[1];
		if($i==2)	$bank_ref_no=$information[1];
		if($i==3)	$order_status=$information[1];
		if($i==4)	$failure_message=$information[1];
		if($i==5)	$payment_mode=$information[1];
		if($i==6)	$card_name=$information[1];
		if($i==7)	$status_code=$information[1];
		if($i==8)	$status_message=$information[1];
		if($i==9)	$currency=$information[1];
		if($i==10)	$amount=$information[1];
		if($i==11)	$billing_name=$information[1];
		if($i==12)	$billing_address=$information[1];
		if($i==13)	$billing_city=$information[1];
		if($i==14)	$billing_state=$information[1];
		if($i==15)	$billing_zip=$information[1];
		if($i==16)	$billing_country=$information[1];
		if($i==17)	$billing_tel=$information[1];
		if($i==18)	$billing_email=$information[1];
		if($i==19)	$delivery_name=$information[1];
		if($i==20)	$delivery_address=$information[1];
		if($i==21)	$delivery_city=$information[1];
		if($i==22)	$delivery_state=$information[1];
		if($i==23)	$delivery_zip=$information[1];
		if($i==24)	$delivery_country=$information[1];
		if($i==25)	$delivery_tel=$information[1];
		if($i==26)	$merchant_param1=$information[1];// address 1
		if($i==27)	$merchant_param2=$information[1];// student id
		if($i==28)	$merchant_param3=$information[1];// year of studying
		if($i==29)	$merchant_param4=$information[1];//area_name
		if($i==30)	$merchant_param5=$information[1];
		if($i==31)	$vault=$information[1];
		if($i==32)	$offer_type=$information[1];
		if($i==33)	$offer_code=$information[1];
		if($i==34)	$discount_value=$information[1];
		if($i==35)	$mer_amount=$information[1];
		if($i==36)	$eci_value=$information[1];
		if($i==37)	$retry=$information[1];
		if($i==38)	$response_code=$information[1];
		
	}

	if($merchant_param5!='') {
		$user_id_order_email_query = mysqli_query($connection,"select * from stork_users where user_id='".$merchant_param5."'");
		$user_id_order_email_array = mysqli_fetch_array($user_id_order_email_query);
		$user_email_offer = $user_id_order_email_array['user_email'];
	}
	else {
		$user_email_offer = $billing_email;
	}

	if($order_status==="Success")
	{
		$order_id_split = explode('_', $order_id);
		if(strtolower($order_id_split[0]) =='cab'){
			$cabin_ccave_booking_query = "INSERT INTO stork_cabin_ccavenue_transaction (cabin_order_id,cabin_user_id,tracking_id,bank_referrence_number,order_status,	payment_mode,card_name,currency,amount,status_code,status_message,merchant_amount,eci_value) VALUES ('".$order_id."','".$delivery_name."','".$tracking_id."','".$bank_ref_no."','".$order_status."','".$payment_mode."','".$card_name."','".$currency."',".$amount.",'".$status_code."','".$status_message."',".$mer_amount.",".$eci_value.")";
			mysqli_query($connection,$cabin_ccave_booking_query);
			$ccavenue_trans_id = mysqli_insert_id($connection);
			$user_type = $order_id_split[1].'_'.$order_id_split[2];
			$required_date_spilt = explode('-', $merchant_param2);
			$required_date = $required_date_spilt[2].'-'.$required_date_spilt[1].'-'.$required_date_spilt[0];
			$order_success_query = "insert into stork_cabin_order (cabin_order_user_id,cabin_order_user_type,cabin_order_user_name,cabin_order_email,cabin_order_mobile,cabin_order_timing_type,cabin_order_schedule_time_id,cabin_order_number_of_system,cabin_order_required_date,cabin_order_total_hours,cabin_order_total_amount,cabin_order_status) values ('".$delivery_name."','".$user_type."','".$billing_name."','admin@printstork.com','".$billing_tel."','".$merchant_param1."','".$merchant_param5."','".$merchant_param3."','".$required_date."','".$merchant_param4."','".$amount."','1')";
			mysqli_query($connection,$order_success_query);
			$order_details_orderid = mysqli_insert_id($connection);
			header('location:orderconfirm.php?cabin=trur&order_id='.$order_details_orderid);
			
		}else{
			$trans_success_query = "INSERT INTO stork_ccavenue_transaction (order_id,user_id,tracking_id,bank_referrence_number,order_status,payment_mode,card_name,currency,student_id,delivery_name,delivery_address,delivery_city,delivery_state,delivery_zip,delivery_country,delivery_email,delivery_mobile,year_of_studying,delivery_area_name,offer_type,offer_code,discount_value,amount,status_code,status_message,merchant_amount,eci_value) VALUES ('".$order_id."','".$merchant_param5."','".$tracking_id."','".$bank_ref_no."','".$order_status."','".$payment_mode."','".$card_name."','".$currency."','".$merchant_param2."','".$billing_name."','".$merchant_param1.",".$billing_address."','".$billing_city."','".$billing_state."','".$billing_zip."','".$billing_country."','".$billing_email."',".$billing_tel.",'".$merchant_param3."','".$merchant_param4."','".$offer_type."','".$offer_code."',".$discount_value.",".$amount.",'".$status_code."','".$status_message."',".$mer_amount.",".$eci_value.")";
			mysqli_query($connection,$trans_success_query);
			$transactionid = mysqli_insert_id($connection);
			$total_items_query = "select * from stork_order_details where order_details_session_id='".$order_id."'";
			$total_item_count = mysqli_num_rows(mysqli_query($connection,$total_items_query));
			$user_type_split = explode('_', $order_id);
			$user_type = $user_type_split[0].'_'.$user_type_split[1];
			$current = date("d-m-Y H:i A D");
			$current_split = explode(" ", $current);
			$currentstr = strtotime($current_split[0].' '.$current_split[1]);
			$currentday = $current_split[3];
			$currentdaystr = strtotime($currentday); 
			$currenttime = date("H:i", strtotime($current_split[1]));
			$currenttimestr = strtotime($currenttime); 
			$delivery = date("d-m-Y H:i A D",$delivery_hours);
			$delivery_split = explode(" ", $delivery);
			$deliverystr = strtotime($delivery_split[0].' '.$delivery_split[1]);
			$deliveryday = $delivery_split[3];
			$deliverydaystr = strtotime($deliveryday);
			$deliverytime = date("H:i", strtotime($delivery_split[1]));
			$deliverytimestr = strtotime($deliverytime); 
			$final_delivery_date = $final_delivery_time ='';
			if($currentstr<$deliverystr){
				if($currentdaystr == $deliverydaystr){ 	//check current day(sunday) equal to delivery day (sunday)
					if($business_hour_start_str < $deliverytimestr && $business_hour_end_str > $deliverytimestr && $business_hour_start_str < $currenttimestr && $business_hour_end_str > $currenttimestr){
						$final_delivery_date = date("Y-m-d",strtotime($delivery_split[0]));
						$final_delivery_time = date("h:i A",strtotime($delivery_split[1]));
					}
					else{
						$final_delivery_date = date("Y-m-d",strtotime('+1 day'));
						$final_delivery_time = date("h:i A",$delivery_hours_extented);
					}
				}
				else{									//here current day not equal to delivery day 
					if($business_hour_start_str < $deliverytimestr && $business_hour_end_str > $deliverytimestr && $business_hour_start_str < $currenttimestr && $business_hour_end_str > $currenttimestr){
						$final_delivery_date = date("Y-m-d",strtotime($delivery_split[0]));
						$final_delivery_time = date("h:i A",strtotime($delivery_split[1]));
					}
					else{
						$final_delivery_date = date("Y-m-d",strtotime('+1 day'));
						$final_delivery_time = date("h:i A",$delivery_hours_extented);
					}
				}
			}	
			
			if($user_type == 'reg_pro' || $user_type='gue_pro'){
				$shipping_department = null;
				$shipping_college = null;
			}else{
				$shipping_department = $merchant_param1;
				$shipping_college = $billing_address;
			}
			$order_success_query = "insert into stork_order (order_user_id,order_total_items,order_user_type,order_customer_name,order_student_id,order_student_year,order_shipping_department,order_shipping_college,order_shipping_line1,order_shipping_line2,order_shipping_area,order_shipping_state,order_shipping_city,order_shipping_email,order_shipping_mobile,order_delivery_status,order_delivery_date,order_delivery_time,order_customer_email,order_total_amount,order_status) 
															values ('".$merchant_param5."',".$total_item_count.",'".$user_type."','".$billing_name."','".$merchant_param2."','".$merchant_param3."','".$shipping_department."','".$shipping_college."','".$merchant_param1."','".$billing_address."','".$merchant_param4."','".$billing_state."','".$billing_city."','".$billing_email."',".$billing_tel.",'processing','".$final_delivery_date."','".$final_delivery_time."','".$user_email_offer."','".$amount."','1')";
			mysqli_query($connection,$order_success_query);
			$order_details_orderid = mysqli_insert_id($connection);
			mysqli_query($connection,"update stork_order_details set order_id ='".$order_details_orderid."' where order_details_session_id='".$order_id."'");
			header('location:orderconfirm.php?order_id='.$order_details_orderid);
		}
	}
	else if($order_status==="Aborted")
	{
		$order_id_split = explode('_', $order_id);
		if(strtolower($order_id_split[0]) !='cab'){	
			$trans_abort_query = "insert into stork_order (order_user_id,order_total_items,order_user_type,order_customer_name,order_student_id,order_student_year,order_shipping_department,order_shipping_college,order_shipping_line1,order_shipping_line2,order_shipping_area,order_shipping_state,order_shipping_city,order_shipping_email,order_shipping_mobile,order_delivery_status,order_delivery_date,order_status) 
															values ('".$merchant_param5."','".$total_item_count."','".$user_type."','".$billing_name."','".$merchant_param2."','".$merchant_param3."','".$merchant_param1."','".$billing_address."','".$merchant_param1."','".$billing_address."','".$merchant_param4."','".$billing_state."','".$billing_city."','".$billing_email."',".$billing_tel.",'aborted','".$final_delivery_date."','1')";
			mysqli_query($connection,$trans_abort_query);
			$transactionid = mysqli_insert_id($connection);
			header('location:orderconfirm.php?error=aborted');
		}
		else {
			header('location:orderconfirm.php?cabin_error=aborted');
		}
	
	}
	else if($order_status==="Failure")
	{
		$order_id_split = explode('_', $order_id);
		if(strtolower($order_id_split[0]) !='cab'){		
			$trans_failure_query = "insert into stork_order (order_user_id,order_total_items,order_user_type,order_customer_name,order_student_id,order_student_year,order_shipping_department,order_shipping_college,order_shipping_line1,order_shipping_line2,order_shipping_area,order_shipping_state,order_shipping_city,order_shipping_email,order_shipping_mobile,order_delivery_status,order_delivery_date,order_status) 
														values ('".$merchant_param5."','".$total_item_count."','".$user_type."','".$billing_name."','".$merchant_param2."','".$merchant_param3."','".$merchant_param1."','".$billing_address."','".$merchant_param1."','".$billing_address."','".$merchant_param4."','".$billing_state."','".$billing_city."','".$billing_email."',".$billing_tel.",'failure','".$final_delivery_date."','1')";
			mysqli_query($connection,$trans_failure_query);
			header('location:orderconfirm.php?error=failure');
		}
		else {
			header('location:orderconfirm.php?cabin_error=failure');
		}
	
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	}


	// for($i = 0; $i < $dataSize; $i++) 
	// {
		// $information=explode('=',$decryptValues[$i]);
	    	// echo $information[0].'='.$information[1].'<br>';
	// }

?>
