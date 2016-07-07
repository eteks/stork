<?php
date_default_timezone_set("Asia/Kolkata");
$business_hour_start = date("h:i", strtotime("08:00"));
$business_hour_end = date("h:i", strtotime("08:00"));
$business_day_start = 'Mon';
$business_day_end = 'Sat';
$delivery_hours = strtotime("+12 hour");

//$current = date("d-m-Y h:i A D");
$current = date("d-m-Y h:i A D", strtotime("06-07-2016 06:00 PM Wed"));
$current_split = explode(' ', $current);
$current_date = date("d-m-Y", strtotime($current_split[0]));
$current_hour = date("h:i", strtotime($current_split[1]));
$current_meridian = date("A", strtotime($current_split[2]));
$current_day = date("D", strtotime($current_split[3]));
$current_hour_meridian = date("h:i A", strtotime($current_split[1].' '.$current_split[2]));

//$delivery = date("d-m-Y h:i A D",$delivery_hours);
$delivery = date("d-m-Y h:i A D", strtotime("07-07-2016 10:00 AM Thu"));
$delivery_split = explode(' ', $delivery);
$delivery_date = date("d-m-Y", strtotime($delivery_split[0]));
$delivery_hour = date("h:i", strtotime($delivery_split[1]));
$delivery_meridian = date("A", strtotime($delivery_split[2]));
$delivery_day = date("D", strtotime($delivery_split[3]));
$delivery_hour_meridian = date("h:i A", strtotime($delivery_split[1].' '.$delivery_split[2]));
if($delivery_day != 'Sun'){
	if($delivery_meridian == 'AM'){
		if($delivery_hour >= $business_hour_start){
			echo "string";
		}
		else{
			echo "string11";
		}
	}
	else if($delivery_meridian == 'PM'){
		
	}
}
else{
	//add 24 hours
	$delivery_date = date($delivery_date,strtotime("+24 hour"));
}	
?>