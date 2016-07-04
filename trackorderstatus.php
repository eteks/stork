<?php 
	include('header.php');
	if(!empty($_POST)){
	$track_order_search=$_POST['track_order_search'];
	//echo $track_order_search;
	// echo $track_order_search;
	$track_status = mysqli_query($connection,"SELECT * FROM stork_order_details
								INNER JOIN stork_order ON stork_order.order_id=stork_order_details.order_id
								INNER JOIN stork_paper_print_type ON stork_paper_print_type.paper_print_type_id=stork_order_details.order_details_paper_print_type_id
								INNER JOIN stork_paper_side ON stork_paper_side.paper_side_id=stork_order_details.order_details_paper_side_id
								INNER JOIN stork_paper_size ON stork_paper_size.paper_size_id=stork_order_details.order_details_paper_size_id
								INNER JOIN stork_paper_type ON stork_paper_type.paper_type_id=stork_order_details.order_details_paper_type_id
								where stork_order.order_id='$track_order_search' and stork_order.order_status='1'");
	$track_status_array=mysqli_fetch_array($track_status);
	$order_delivery_status = $track_status_array['order_delivery_status'];
	?>
	<div class="main" id="product-detail">	
   	    <section class="header-page">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 hidden-xs">
						<h1 class="mh-title">Order</h1>  
					</div>       
					<div class="breadcrumb-w col-sm-9">
						<span class="hidden-xs">You are here:</span>
						<ul class="breadcrumb">
							<li>
								<a href="index.php">Home</a>
							</li>
							<li>
								<span>Order- Status</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section> 
	
	<?php
		if($track_status_array > 0) {
	?>
	<!-- Track Order Details -->
	<section class="container track_order_details">
	<!-- Process Start  -->
	<?php 
		if($order_delivery_status == "processed") {
	?>
	<section class="container track_order_status_process active_status">
			<h1> Your order is in process </h1>
			<div class="cont">
				<progress id="progress-bar" min="1" max="100" value="0"></progress>
				<span class="first border-change"> <i class="fa fa-check" aria-hidden="true"></i> </span>
				<span class="second"></span>
				<span class="third"></span>
				<span class="fourth"></span>
				<p class="percent">0% Complete</p>
			</div>
			<table class="process_status_datails">
  				<tbody>
  					<tr>
    					<td class="bucket">
      						<div class="content">
								<ul class="process_list">
									<li><b>Order id :</b> <?php echo $track_status_array['order_id']; ?> </li>
									<hr/>
									<li><b>Customer name :</b> <?php echo $track_status_array['order_customer_name']; ?>  </li>
									<hr/>
									<li><b>Print type :</b> <?php echo $track_status_array['paper_print_type']; ?>  </li>
									<li><b>Print side :</b> <?php echo $track_status_array['paper_side']; ?>  </li>
									<li><b>Paper type :</b> <?php echo $track_status_array['paper_type']; ?>  </li>                                                                      
								    <li><b> Paper size : </b> <?php echo $track_status_array['paper_size']; ?>  </li>
								    <li><b> Total no of pages : </b> <?php echo $track_status_array['order_details_total_no_of_pages']; ?>  </li>
								    <li><b> Total amount : </b> <?php echo $track_status_array['order_details_total_amount']; ?>  </li>
								</ul>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
	</section>
	<!-- Process End  -->

	<!-- Completed Start  -->
	<?php } 
	else if ($order_delivery_status == "completed") {
	?>
	<section class="container track_order_status_completed">
			<h1> Your order is Completed </h1>
			<div class="cont">
				<progress value="34" max="100" min="1" id="progress-bar" class="border-change"></progress>
				<span class="first border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="second border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="third"></span>
				<span class="fourth"></span>
				<p class="percent">33% Complete</p>
			</div>
			<table class="process_status_datails">
  				<tbody>
  					<tr>
    					<td class="bucket">
      						<div class="content">
								<ul class="process_list">
									<li><b> Your order is ready for shipping </b>  </li>
									<hr/>
									<li><b>Order id :</b> <?php echo $track_status_array['order_id']; ?> </li>
									<hr/>
									<li><b>Customer name :</b> <?php echo $track_status_array['order_customer_name']; ?> </li>
								</ul>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
	</section>
	<!-- Completed End  -->

	<!-- Shipping Start  -->
	<?php }
	else if ($order_delivery_status == "shipped") {
	?>
	<section class="container track_order_status_shipping">
			<h1> Your order is Shipped </h1>
			<div class="cont">
				<progress value="67" max="100" min="1" id="progress-bar" class="border-change"></progress>
				<span class="first border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="second border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="third border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="fourth"></span>
				<p class="percent">66% Complete</p>
			</div>
			<table class="process_status_datails">
  				<tbody>
  					<tr>
    					<td class="bucket">
      						<div class="content">
								<ul class="process_list">
									<li><b> Your order is shipped </b>  </li>
									<hr/>
									<li><b> Shipping address : </b> <?php echo $track_status_array['order_shipping_line1']; ?> <?php echo $track_status_array['order_shipping_line2']; ?> </li>
									<li><b> Mobile number : </b> <?php echo $track_status_array['order_shipping_mobile']; ?> </li>
									<li><b> Delivery date : </b> <?php echo $track_status_array['order_delivery_date']; ?> </li>                                                                      
								    <li><b> Delivery time : </b> <?php echo $track_status_array['order_delivery_time']; ?> </li>
								    <hr>
								    <li><b> Order id : </b> <?php echo $track_status_array['order_id']; ?> </li>
								    <hr>
								    <li><b> Customer name :</b> <?php echo $track_status_array['order_customer_name']; ?> </li>
								</ul>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
	</section>
	<!-- Shipping End  -->

	<!-- Delivery Start  -->
	<?php }
	else {
	?>
	<section class="container track_order_status_delivery">
			<h1> Your order is Delivered </h1>
			<div class="cont">
				<progress value="100" max="100" min="1" id="progress-bar" class="border-change"></progress>
				<span class="first border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="second border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="third border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<span class="fourth border-change"> <i aria-hidden="true" class="fa fa-check"></i> </span>
				<p class="percent">100% Complete</p>
			</div>
			<table class="process_status_datails">
  				<tbody>
  					<tr>
    					<td class="bucket">
      						<div class="content">
								<ul class="process_list">
									<li><b> Your shipment is delivered successfully </b>  </li>
									<hr/>
									<li><b> Shipping address : </b> <?php echo $track_status_array['order_shipping_line1']; ?> <?php echo $track_status_array['order_shipping_line2']; ?> </li>
									<li><b> Mobile number : </b> <?php echo $track_status_array['order_shipping_mobile']; ?> </li>
									<li><b> Delivery date : </b> <?php echo $track_status_array['order_delivery_date']; ?> </li>                                                                      
								    <li><b> Delivery time : </b> <?php echo $track_status_array['order_delivery_time']; ?> </li>
								    <hr>
								    <li><b> Order id : </b> <?php echo $track_status_array['order_id']; ?> </li>
								    <hr>
								    <li><b> Customer name :</b> <?php echo $track_status_array['order_customer_name']; ?> </li>
								    <hr>
								    <li><b>Print type :</b> <?php echo $track_status_array['paper_print_type']; ?> </li>
									<li><b>Print side :</b> <?php echo $track_status_array['paper_side']; ?> </li>
									<li><b>Paper type :</b> <?php echo $track_status_array['paper_type']; ?> </li>                                                                      
								    <li><b> Paper size : </b> <?php echo $track_status_array['paper_size']; ?> </li>
								    <li><b> Total no of pages : </b> <?php echo $track_status_array['order_details_total_no_of_pages']; ?> </li>
								    <li><b> Total amount : </b> <?php echo $track_status_array['order_details_total_amount']; ?> </li>

								</ul>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
	</section>
	<!-- Delivery End  -->

	<?php }
	?>
	</section>
	<?php } else {
	?>
	<section class="container orderid_notfound">
		<div class="orderid_not_match">
			<h1> Please check your order ID  </h1>
		</div>
	</section>
	<?php } 
	}
else{
	die('<script type="text/javascript">window.location.href="index.php";</script>');
	exit();
}
	?>	
	</div><!-- Main Product Detail: End -->	
<?php include('footer.php') ?>