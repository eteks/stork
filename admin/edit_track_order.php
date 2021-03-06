<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Track Order</title>
</head>
<body>
<div style="opacity: 0">
<?php 
if (isset($_GET['update']))
{
 if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
  $val = $_GET['update'];
  $val = mres($val);

  $order_delivery_status = $_POST["order_delivery_status"];
  $order_delivery_date = explode('/',$_POST["order_delivery_date"]);
  $order_delivery_date = $order_delivery_date[2].'-'.$order_delivery_date[1].'-'.$order_delivery_date[0];
  $qr = mysql_fetch_array(mysqlQuery("SELECT * FROM stork_order WHERE order_id=".$val));
 $to = $qr['order_shipping_email'];
 $from_email = "support@printstork.com";
 $headers = "From: " . $from_email . "\r\n";
 $headers .= "Reply-To: ". $from_email . "\r\n";
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 if( $order_delivery_status == "completed"){
  $email_subject = "Order Details";
  $message = file_get_contents('order_completed.php'); 
	$smsurl = 'http://api.unicel.in/SendSMS/sendmsg.php';
	$fields = array(
	    'uname'=> SMSUSER,
	    'pass'=> SMSPASS,
	    'send'=> SMSSENDID,
	    'dest'=> $qr['order_shipping_mobile'],
	    'msg'=>"Your order ".$qr['order_id']." is completed for shipping by http://printstork.com."
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $smsurl);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
	curl_exec($ch);
	curl_close($ch);
 }
 else if( $order_delivery_status == "shipped"){
  $email_subject = "Order Details";
  $message = file_get_contents('order_shipped.php'); 
  $smsurl = 'http://api.unicel.in/SendSMS/sendmsg.php';
	$fields = array(
	    'uname'=> SMSUSER,
	    'pass'=> SMSPASS,
	    'send'=> SMSSENDID,
	    'dest'=> $qr['order_shipping_mobile'],
	    'msg'=>"Your order ".$qr['order_id']." is packed by print stork and ready to be shipped. You will get tracking details once we ship it. http://printstork.com."
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $smsurl);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
	curl_exec($ch);
	curl_close($ch);
 }
 else if( $order_delivery_status == "delivered"){
  $email_subject = "Order Details";
  $message = file_get_contents('order_delivered.php');
  $smsurl = 'http://api.unicel.in/SendSMS/sendmsg.php';
	$fields = array(
	    'uname'=> SMSUSER,
	    'pass'=> SMSPASS,
	    'send'=> SMSSENDID,
	    'dest'=> $qr['order_shipping_mobile'],
	    'msg'=>"Your order ".$qr['order_id']." has been successfully delivered. We are extremely glad to serve you. http://printstork.com."
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $smsurl);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
	curl_exec($ch);
	curl_close($ch); 
 }
 if (mail($to, $email_subject, $message, $headers))
 {
 $mail_status=1;
 mysqlQuery("UPDATE stork_order SET order_delivery_status='$order_delivery_status',order_delivery_date='$order_delivery_date' WHERE order_id=".$val);
 $successMessage = "<div class='container error_message_mandatory'><span> Order Status Updated and mail sent Successfully! </span></div>"; 
 }
 else {
 $mail_status=0;
 $successMessage = "<div class='container error_message_mandatory'><span> Server Problem!! Mail not sent Successfully! </span></div>"; 
 } 
 }
}
$id=$val;
if(isset($_GET["id"]))
{
 $id = $_GET["id"];
}
?>
</div>
<?php include 'includes/navbar_admin.php'; ?>
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 hidden-xs dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="breadcrumb-w col-sm-9">
				<span class="">You are here:</span>
				<ul class="breadcrumb">
					<li>
						<a href="/">Order</a>
					</li>
					<li>
						<span>Edit Orders</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Track Order Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Track Order Information</h4>
							<form action="edit_track_order.php?update=<?php echo $id; ?>" id="edit_track_order" method="POST" name="edit-acc-info">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM `stork_order` WHERE `order_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{ 
									while($row = mysql_fetch_array($qry)) 
									{
							?>
								<div class="form-group">
								    <label for="last-name">Order User ID<span class="required"></span></label>
									<input type="text" class="form-control" id="orderuserid" placeholder="Order User ID" name="order_user_id" value="<?php if ($row['order_user_id'] === NULL) echo "None"; else echo($row['order_user_id']); ?>" disabled>
								</div>
								<div class="form-group">
								    <label for="last-name">Order ID<span class="required"></span></label>
									<input type="text" class="form-control" id="orderid" placeholder="Order ID" name="order_id" value="<?php echo($row['order_id']); ?>" disabled/>
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Order Delivery Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="order_delivery_status">
								        <option>
											<span>Select Order Status</span>
										</option>
								        <option value="processing" <?php if ($row['order_delivery_status'] == "processing") echo "selected"; ?>>Processing</option>
										<option value="completed" <?php if ($row['order_delivery_status'] == "completed") echo "selected"; ?>>Completed</option>
										<option value="shipped" <?php if ($row['order_delivery_status'] == "shipped") echo "selected"; ?>>Shipped</option>
										<option value="delivered" <?php if ($row['order_delivery_status'] == "delivered") echo "selected"; ?>>Delivered</option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Date Of Delivered<span class="required"></span></label>
									<input type="text" class="form-control" id="dateofdelivered" placeholder="Date Of Delivered" autocomplete="off" name="order_delivery_date" value="<?php $deliverydate=strtotime($row['order_delivery_date']); $delivery = date('d/m/Y', $deliverydate); echo $delivery; ?>">
								</div>
								<div class="account-bottom-action">
									<button type="submit" name="edit_update" class="gbtn btn-edit-acc-info">Update</button>
								</div>
								<?php 
								} 
								}
								?>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 
