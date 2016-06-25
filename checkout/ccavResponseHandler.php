<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='1DD4304715928B37B1170BED9EDB13A6';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);

	$Merchant_Id='';
	$Order_Id='';
	$Amount='';
	$Currency='';
	$TxnType='';
	$actionID='';
	$User_Id='';
	$billing_cust_name='';
	$delivery_cust_name='';
	$billing_cust_notes='';
	$billing_cust_name='';
	$billing_cust_notes='';
	$Merchant_Param='';
	$Auth_Status='';
	$transaction_status=$order_status;
	
	function store_transaction(){
		mysqlQuery("INSERT INTO stork_ccavenue_transaction (Merchant_Id,Order_Id,Amount,Currency,TxnType,actionID,
			User_Id,billing_cust_name,delivery_cust_name,billing_cust_notes,Merchant_Param,Auth_Status,
			transaction_status) VALUES ('$Merchant_Id','$Order_Id','$Amount','$Currency','$TxnType','$actionID','$User_Id','$billing_cust_name'
			,'$delivery_cust_name','$billing_cust_notes','$Merchant_Param','$Auth_Status','$transaction_status')");
	}
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{	
		store_transaction();
		echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		
	}
	else if($order_status==="Aborted")
	{	
		store_transaction();
		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{	
		store_transaction();
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>
