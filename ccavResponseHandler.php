<?php 
include('Crypto.php');
require 'dbconnect.php';
?>
<?php
	
	error_reporting(0);
	date_default_timezone_set("Asia/Kolkata");
	$business_hour_start = '08:00 AM';
	$business_hour_end = '08:00 PM';
	$business_day_start = 'Mon';
	$business_day_end = 'Sat';
	$delivery_hours = strtotime("+12 hour");
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

	if($order_status==="Success")
	{	
		$trans_success_query = "INSERT INTO stork_ccavenue_transaction (order_id,tracking_id,bank_referrence_number,payment_mode,card_name,currency,student_id,delivery_name,delivery_address,delivery_city,delivery_state,delivery_zip,delivery_country,delivery_email,delivery_mobile,year_of_studying,delivery_area_name,offer_type,offer_code,discount_value,amount,status_code,status_message,merchant_amount,eci_value) VALUES ('".$order_id."','".$tracking_id."','".$bank_ref_no."','".$payment_mode."','".$card_name."','".$currency."','".$merchant_param2."','".$billing_name."','".$merchant_param1.",".$billing_address."','".$billing_city."','".$billing_state."','".$billing_zip."','".$billing_country."','".$billing_email."',".$billing_tel.",'".$merchant_param3."','".$merchant_param4."','".$offer_type."','".$offer_code."',".$discount_value.",".$amount.",'".$status_code."','".$status_message."',".$mer_amount.",".$eci_value.")";
		mysqli_query($connection,$trans_success_query);
		$transactionid = mysqli_insert_id($connection);
		$total_items_query = "select * from stork_order_details where order_details_session_id='".$order_id."'";
		$total_item_count = mysqli_num_rows(mysqli_query($connection,$total_items_query));
		$user_type_split = explode('_', $order_id);
		$user_type = $user_type_split[0].'_'.$user_type_split[1];
		
	}
	else if($order_status==="Aborted")
	{	
		$trans_abort_query = "INSERT INTO stork_ccavenue_transaction (order_id,tracking_id,bank_referrence_number,payment_mode,card_name,currency,student_id,delivery_name,delivery_address,delivery_city,delivery_state,delivery_zip,delivery_country,delivery_email,delivery_mobile,year_of_studying,delivery_area_name,offer_type,offer_code,discount_value,amount,status_code,status_message,merchant_amount,eci_value) VALUES ('".$order_id."','".$tracking_id."','".$bank_ref_no."','".$payment_mode."','".$card_name."','".$currency."','".$merchant_param2."','".$billing_name."','".$merchant_param1.",".$billing_address."','".$billing_city."','".$billing_state."','".$billing_zip."','".$billing_country."','".$billing_email."',".$billing_tel.",'".$merchant_param3."','".$merchant_param4."','".$offer_type."','".$offer_code."',".$discount_value.",".$amount.",'".$status_code."','".$status_message."',".$mer_amount.",".$eci_value.")";
		mysqli_query($connection,$trans_abort_query);
		$transactionid = mysqli_insert_id($connection);
	
	}
	else if($order_status==="Failure")
	{	
		$trans_failure_query = "INSERT INTO stork_ccavenue_transaction (order_id,tracking_id,bank_referrence_number,payment_mode,card_name,currency,student_id,delivery_name,delivery_address,delivery_city,delivery_state,delivery_zip,delivery_country,delivery_email,delivery_mobile,year_of_studying,delivery_area_name,offer_type,offer_code,discount_value,amount,status_code,status_message,merchant_amount,eci_value) VALUES ('".$order_id."','".$tracking_id."','".$bank_ref_no."','".$payment_mode."','".$card_name."','".$currency."','".$merchant_param2."','".$billing_name."','".$merchant_param1.",".$billing_address."','".$billing_city."','".$billing_state."','".$billing_zip."','".$billing_country."','".$billing_email."',".$billing_tel.",'".$merchant_param3."','".$merchant_param4."','".$offer_type."','".$offer_code."',".$discount_value.",".$amount.",'".$status_code."','".$status_message."',".$mer_amount.",".$eci_value.")";
		mysqli_query($connection,$trans_failure_query);
		$transactionid = mysqli_insert_id($connection);
	
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}


	//for($i = 0; $i < $dataSize; $i++) 
	//{
		//$information=explode('=',$decryptValues[$i]);
	    	//echo $information[0].'='.$information[1].'<br>';
	//}

?>
