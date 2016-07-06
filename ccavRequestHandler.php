<html>
<head>
<title></title>
</head>
<body>
<center>

<?php include('Crypto.php') ?>
<?php 

	error_reporting(0);
	
	$merchant_data='';
	$working_key='1DD4304715928B37B1170BED9EDB13A6';//Shared by CCAVENUES
	$access_code='AVLG65DF73BH49GLHB';//Shared by CCAVENUES
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

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
	// document.redirect.submit();
	$(document).ready(function(){
		document.redirect.submit();
	});
</script>
</body>
</html>

