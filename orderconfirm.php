﻿<?php 
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
								<a href="/">Home</a>
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
		if(isset($_GET['order_id'])){
			$order_id = $_GET['order_id'];
			$order_details = selectfunction('*',ORDER,'order_id='.$order_id,$connection);
			$row = mysqli_fetch_array($order_details);
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
                 	<?php
                 	if(!isset($_GET['cabin'])){
                 	?>
	                  <p class="visible-md visible-lg">
	                   Your Order delivered with on before <?php echo $row['order_delivery_date'].'  '.$row['order_delivery_time']; ?>
	                  </p><br>
	                   </div>
	                 <div class="price-box">
		                   <span class="normal-price">Your Order number is <?php echo $row['order_id']; ?></span>
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
		                   <span class="normal-price">Your Order number is <?php echo 'CAB'.$row['order_id']; ?></span>
	                 </div><br>
	                 <?php
					}
	                 ?>
                
                 <div class="short-description">
	                   <p class="visible-md visible-lg">
	                     Working day:sunday to saturday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working hours:08:00 am to 08:00 pm
	                   </p><br>
                  </div>
		</div>
		</section>
		<?php
		} 
		else if(isset($_GET['cabin_booking'])){
			
			
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
	                     Working day:sunday to saturday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working hours:08:00 am to 08:00 pm
	                   </p><br>
                  </div>
		</div>
		</section>
		<?php }?>
	</main><!--Main index : End-->
<?php include('footer.php') ?>
	
