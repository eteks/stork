<html>
<head>
<title></title>
</head>
<body>
<center>
<?php
require 'dbconnect.php';
session_start();
if($_POST['makemydefaultaddress'] == 'reg_stu'){
	$area_id_query = "select * from stork_area where area_name = '".$_POST['merchant_param4']."'";
	$area_id = mysqli_fetch_array(mysqli_query($connection, $area_id_query));							//department											year os studing										
	$defaultaddressquery = "update stork_users set student_college_id ='".$_POST['merchant_param6']."',shipping_default_name ='".$_POST['billing_name']."',shipping_default_addr1 = '".$_POST['merchant_param1']."',shipping_default_addr2='".$_POST['merchant_param2']."',student_pass_year='".$_POST['merchant_param3']."',shipping_default_area_id ='".$area_id['area_id']."',shipping_default_postalcode='".$_POST['billing_zip']."',shipping_default_mobile='".$_POST['billing_tel']."',shipping_default_email='".$_POST['billing_email']."' where user_id =".$_SESSION['user_id']."";
	mysqli_query($connection, $defaultaddressquery);
	unset($_POST['makemydefaultaddress']);
	unset($_POST['merchant_param6']);
}
if($_POST['providedofferid'] != '' && $_POST['providedoffertype'] != ''){
	$offer_type = $_POST['providedoffertype'];
	$offer_id = $_POST['providedofferid'];
	if($_POST['providedoffertype']=='general'){
		$limitation_query = "select offer_usage_limit from stork_offer_details where offer_type ='general_offer'";
		$limitation = mysqli_fetch_array(mysqli_query($connection, $limitation_query));
		$limitation_number = (int)$limitation['offer_usage_limit'];
		$usage_query = "select limit_used from stork_offer_provide_registered_users where offer_provided_id=".$offer_id;
		$no_time_used = mysqli_fetch_array(mysqli_query($connection, $usage_query));
		$no_of_time_used = (int)$no_time_used['limit_used'] + 1;
		if($limitation_number == $no_of_time_used){
			$offerupdatequery = "update stork_offer_provide_registered_users set limit_used=limit_used+1,is_used='1',is_limit_status = '0' where offer_provided_id=".$offer_id;
		}else{
			$offerupdatequery = "update stork_offer_provide_registered_users set limit_used=limit_used+1,is_used='1' where offer_provided_id=".$offer_id;
		}
		
	}
	else {
		$limitation_query = "select offer_usage_limit from stork_offer_details where offer_type ='customer_offer'";
		$limitation = mysqli_fetch_array(mysqli_query($connection, $limitation_query));
		$limitation_number = (int)$limitation['offer_usage_limit'];
		$usage_query = "select limit_used from stork_offer_provide_all_user where offer_provided_details_id=".$offer_id;
		$no_time_used = mysqli_fetch_array(mysqli_query($connection, $usage_query));
		$no_of_time_used = (int)$no_time_used['limit_used'] + 1;
		if($limitation_number == $no_of_time_used){
			$offerupdatequery = "update stork_offer_provide_all_users set limit_used=limit_used+1,is_used='1',is_limit_status='0' where offer_provided_details_id=".$offer_id;
		}else{
			$offerupdatequery = "update stork_offer_provide_all_users set limit_used=limit_used+1,is_used='1' where offer_provided_details_id=".$offer_id;
		}
	}
	mysqli_query($connection, $offerupdatequery);
	
}
unset($_POST['providedofferid']);
unset($_POST['providedoffertype']);
?>

<?php include('Crypto.php') ?>
<?php 
	error_reporting(0);
	$merchant_data='';
	$working_key='1DD4304715928B37B1170BED9EDB13A6';//Shared by CCAVENUES
	$access_code='AVLG65DF73BH49GLHB';//Shared by CCAVENUES
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	$encrypted_data=encrypt($merchant_data,$working_key); //Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script src="js/jquery/jquery-1.11.3.min.js"></script>
<script language='javascript'>
	document.redirect.submit();
	$(document).ready(function(){
		document.redirect.submit();
	});
</script>
</body>
</html>

