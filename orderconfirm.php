<?php 
include('header.php');
?>
	<!--Main index : End-->
	<main class="main">
		<section class="header-page">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 hidden-xs">
						<h1 class="mh-title">Order Confirmation</h1>
					</div>
					<div class="breadcrumb-w col-sm-9">
						<span class="hidden-xs">You are here:</span>
						<ul class="breadcrumb">
							<li>
								<a href="index.php">Home</a>
							</li>
							<li>
								<span>Order Confirmation</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<?php
		if(isset($_GET['order_id']) && isset($_GET['print'])){
			$order_id = $_GET['order_id'];
			$order_details = selectfunction('*',ORDER,'order_id='.$order_id,$connection);
			$row = mysqli_fetch_array($order_details);
		 	$order_customer_name =$row['order_customer_name'];
			$order_id =$row['order_id'];
  			$order_shipping_email = $row["order_shipping_email"]; 
			$order_total_items =$row['order_total_items']; 
			$order_total_amount =$row['order_total_amount']; 
			$order_delivery_date =$row['order_delivery_date']; 
			$order_delivery_time =$row['order_delivery_time'];
			$order_status =$row['order_status'];  
		    $email_subject = "ORDER PLACED";
		    $from = "support@printstork.com";
		    //$to = "info@etekchnoservices.com";		
		    $headers = "From: " . $from . "\r\n";
		    $headers .= "Reply-To: ". $from . "\r\n";
		    $headers .= "MIME-Version: 1.0\r\n";
		    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = '<html><body><div style="margin: 0px auto; width: 100%;border-width: 40px 1px 1px;"><h2 style="background: #25bce9; text-align: left; color: #fff; font-weight: bold; font-size: 16px; padding: 10px 4px; margin-bottom: 0px;">Order Details </h2><div style="border: 1px solid #25bce9; background: #fff;"><table align="center" rules="all" style="border-color: #666; cellpadding="10"><tr style="background: #eee;"><td><strong>Name:</strong> </td><td>'.$order_customer_name.'</td></tr><tr style="background: #eee;"><td><strong>Order ID:</strong> </td><td>'.$order_id.'</td></tr><tr><td><strong>Email:</strong> </td><td>' . $order_shipping_email.'</td></tr><tr><td><strong>Total No: of items</strong> </td><td>' . $order_total_items .' </td></tr><tr><td><strong>Date Of Delivery</strong> </td><td>'. $order_delivery_date .' </td></tr><tr><td><strong>Order Delivery Time</strong> </td><td>'. $order_delivery_time .' </td></tr> <tr></tr> </table></div></div></body></html>';			
           if (mail($order_shipping_email,$email_subject, $message, $headers)){
				$responsemessage = '<p class="email_sent"> Mail sent successfully!  </p>';
        	}
           	else {
          		$responsemessage = '<p class="email_not_sent"> Mail not sent successfully!  </p>';
    		}
			//print_r($_SESSION);
		?>


		<section id="wishlist" class="pr-main">
			<div class="container text-center">
			   <div class="pro-name-rate clearfix">
                 <h3 class="product-name">
	                Thank You
                 </h3><br><br>
                </div>
                 <div class="short-description">
	                  <p class="visible-md visible-lg">
	                   Your order will be delivered with on or before <?php echo $row['order_delivery_date'].'  '.$row['order_delivery_time']; ?>
	                  </p><br>
	                   </div>
	                 <div class="price-box">
		                   <span class="normal-price">Your Order number(ID) is <?php echo $row['order_id']; ?></span>
	                 </div><br>
                 <div class="short-description">
	                   <p class="visible-md visible-lg">
	                     Working day : Sunday to Saturday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working hours : 06:00 AM to 11:00 PM
	                   </p><br>
                  </div>
		</div>
		</section>
		<?php
		} 
		else if(isset($_GET['cabin']) && isset($_GET['order_id'])){
			$order_id = $_GET['order_id'];
			$order_details = selectfunction('*',CABINORDER,'cabin_order_id='.$order_id,$connection);
			$row = mysqli_fetch_array($order_details);
		 	$order_customer_name =$row['cabin_order_user_name'];
			$ordered_id ='CAB'.$row['cabin_order_id'];
  			$order_email = $row["cabin_order_email"]; 
			$order_timing_type =$row['cabin_order_timing_type']; 
			$order_no_of_system =$row['cabin_order_number_of_system']; 
			$order_date =$row['cabin_order_required_date']; 
			$order_total_hours =$row['cabin_order_total_hours'];
			$order_status =$row['cabin_order_status'];
			$order_time = explode('#', $row['cabin_order_schedule_time_id']);
			$totaltimefixing = '';
			foreach ($order_time as $key => $value) {
				if($value != ''){
					$system_time = selectfunction('*',CABINSLOTTIME,'schedule_time_id='.$value,$connection);
					$system_time_row = mysqli_fetch_array($system_time);
					$totaltimefixing .= $system_time_row['schedule_time_start'].' to '.$system_time_row['schedule_time_end'].', ';
				}
			}
			
			$ordered_total_timing_slots = trim($totaltimefixing, ", ");
		    $email_subject = "ORDER PLACED";
		    $from = "support@printstork.com";
		    //$to = "info@etekchnoservices.com";		
		    $headers = "From: " . $from . "\r\n";
		    $headers .= "Reply-To: ". $from . "\r\n";
		    $headers .= "MIME-Version: 1.0\r\n";
		    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = '<html><body><div style="margin: 0px auto; width: 50%;border-width: 40px 1px 1px;"><h2 style="background: #25bce9; text-align: left; color: #fff; font-weight: bold; font-size: 16px; padding: 10px 4px; margin-bottom: 0px;">Order Details </h2><div style="border: 1px solid #25bce9; background: #fff;"><table align="center" rules="all" style="border-color: #666; cellpadding="10"><tr style="background: #eee;"><td><strong>Name:</strong> </td><td>'.$order_customer_name.'</td></tr><tr style="background: #eee;"><td><strong>Order ID:</strong> </td><td>'.$ordered_id.'</td></tr><tr><td><strong>Email:</strong> </td><td>' . $order_email.'</td></tr><tr><td><strong>Timing Type:</strong> </td><td>' . $order_timing_type .' </td></tr><tr><td><strong>Booked no of system :</strong> </td><td>'. $order_no_of_system .' </td></tr><tr><td><strong>Order Date :</strong> </td><td>'. $order_date .' </td></tr> <tr></tr><tr><td><strong>Booked Total hours :</strong> </td><td>'. $order_total_hours .' </td></tr><tr><td><strong>Booked Timing slots :</strong> </td><td>'. $ordered_total_timing_slots .' </td></tr></table></div></div></body></html>';			
           if (mail($order_email,$email_subject, $message, $headers)){
				$responsemessage = '<p class="email_sent"> Mail sent successfully!  </p>';
        	}
           	else {
          		$responsemessage = '<p class="email_not_sent"> Mail not sent successfully!  </p>';
    		}
    		// echo $message;
		?>


		<section id="wishlist" class="pr-main">
			<div class="container text-center">
			   <div class="pro-name-rate clearfix">
                 <h3 class="product-name">
	                Thank You
                 </h3><br><br>
                </div>

                 <div class="short-description">
                 	<?php
                 	if(!isset($_GET['cabin'])){
                 	?>
	                  <p class="visible-md visible-lg">
	                   Your order will be delivered with on or before <?php echo $row['order_delivery_date'].'  '.$row['order_delivery_time']; ?>
	                  </p><br>
	                   </div>
	                 <div class="price-box">
		                   <span class="normal-price">Your Order number(ID) is <?php echo $row['order_id']; ?></span>
	                 </div><br>
	                 <?php
					}
					else{
	                 ?>
	                 <p class="visible-md visible-lg">
	                   Your cabin booked successfully!
	                  </p><br>
	                   </div>
	                 <div class="price-box">
		                   <span class="normal-price">Your Order number(ID) is <?php echo 'CAB'.$_GET['order_id']; ?></span>
	                 </div><br>
	                 <?php
					}
	                 ?>
                
                 <div class="short-description">
	                   <p class="visible-md visible-lg">
	                     Working day : Sunday to Saturday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working hours : 06:00 AM to 11:00 PM
	                   </p><br>
                  </div>
		</div>
		</section>
		<?php
		}
		else if(isset($_GET['error']) && $_GET['error']=='aborted' || isset($_GET['error']) && $_GET['error']=='failure'||isset($_GET['cabin_error']) && $_GET['cabin_error']=='aborted' || isset($_GET['cabin_error']) && $_GET['cabin_error']=='failure'){
			$error_type = $_GET['error'];
		?>
		<section id="wishlist" class="pr-main">
			<div class="container text-center">
                 <div class="short-description">
	                  <p class="visible-md visible-lg">
	                  </p><br>
                 </div>
                 <div class="price-box">
	                   <span class="normal-price">Unable to process your order!</span>
                 </div><br>
                 <div class="short-description">
	                   <p class="visible-md visible-lg">
	                     Working day : Sunday to Saturday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working hours : 06:00 AM to 11:00 PM
	                   </p><br>
                  </div>
		</div>
		</section>


		<?php }?>
		
	</main><!--Main index : End-->
<?php include('footer.php');
unset($_SESSION['session_id']);
?>
	
