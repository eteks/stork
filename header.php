<?php
// if($_SERVER['REMOTE_ADDR']!= '103.213.192.5'){
	// header('location:underconstruction.html');
// }
include('dbconnect.php');
include('function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Print stork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=no"/>
	<meta name="description" content="Printing template">
	<meta name="author" content="Netbase">
	<meta name="google-signin-client_id" content="917333063130-v76t7dmqcvvbtq4cum8h9kej9dlql8jb.apps.googleusercontent.com ">
	<!--Add css lib--> 
	<link rel="stylesheet" type="text/css" href="css/style-main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">   
  	<link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Arimo:500,300,700,400' rel='stylesheet' type='text/css'>
  	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:500,300,700,400' rel='stylesheet' type='text/css'>
<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
.cont{
  margin: 0 auto;
  padding: 0;
  position: relative;
  width: 576px;
}
#progress-bar{
  color: #000;
  height: 6px;
  margin: 34px auto;
  width: 576px;
  background-color: transparent;
}
.cont span {
  background: #25bce9 none repeat scroll 0 0;
  border: 3px solid #25bce9;
  border-radius: 100%;
  cursor: pointer;
  height: 50px;
  left: 0;
  position: absolute;
  top: 12px;
  transition: all 0.4s ease-in-out 0s;
  width: 50px;
}

.second{
  left: 192px !important;
}
.third{
  left: 384px !important;
}
.fourth{
  left: 576px !important;
}
/*#progress-bar::-webkit-progress-value{  Changes line color 
  background: #25bce9 ;
  transition: all 0.4s ease-in-out;
}*/
/*#progress-bar::-webkit-progress-bar{  Changes background color 
  background: red ;
}*/
.border-change{
  border-color:#fff;
  transition: all 0.4s ease-in-out;
}
#progress-bar::-webkit-progress-value{ /* Changes line color */
  background: #25bce9;
  transition: all 0.4s ease-in-out;
}
progress::-moz-progress-bar { 
  background: #25bce9;
  transition: all 0.4s ease-in-out;
}

</style>
</head>
<body>
<header>
		<!--Top Header: Begin-->
		<section id="top-header" class="clearfix">
			<div class="container">
				<div class="row">
					<div class="top-links col-lg-7 col-md-6 col-sm-5 col-xs-6">
						<ul>
							<li class="hidden-xs">
								<a href="https://www.facebook.com/Print-Stork-145625759197915/?ref=aymt_homepage_panel" title="Facebook">
									<i class="fa fa-facebook"></i>
									<!-- Connect with facebook -->
								</a>
							</li>
							<li class="hidden-xs">
								<a href="https://twitter.com/printstork" title="Twitter">
									<i class="fa fa-twitter"></i> 
								</a>
							</li>
							<li class="hidden-xs">
								<a href="https://plus.google.com/u/0/" title="Google Plus">
									<i class="fa fa-google-plus" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="top-header-right f-right col-lg-5 col-md-6 col-sm-7 col-xs-6">
						<div class="w-header-right" title="Enquiry Phone No.">
							<div class="th-hotline">
								<i class="fa fa-phone"></i>
								<span>+91-74488 60005</span>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</section><!--Top Header: End-->
		<!--Main Header: Begin-->
		<section class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 w-logo">
						<div class="logo hd-pd ">
							<a href="index.php">
								<img src="images/printstork_logo.png"  alt="printshop logo" title="Home">
							</a>
						</div>	
					</div>
					<div class="col-lg-7 col-md-8 visible-md visible-lg">
					</div>
					
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-3 headerCS">
						<div class="fr navmenu_icons_header">
							<?php 
							
							
							if(isset($_SESSION['login_status'])){
								if($_SESSION['login_status'] != 1){
									$_SESSION['login_status'] = 0;
								}
							}
							else{
								$_SESSION['login_status'] = 0;
							}
							
							// print_r($_SESSION);
							if(isset($_SESSION['facebook_access_token'])||$_SESSION['login_status'] == 1){
								
							?>
							<div class="cart-w SC-w hd-pd ">
								<span class="mcart-icon dropdowSCIcon">

									<a href="logout.php" title="Logout">
									
										<?php echo $_SESSION['user_login_name'] ?>
										<i class="fa fa-sign-out"></i>
										<!-- Sign Up -->
									</a>
								</span>
							</div>
							<?php
							}else{
							?>
							<div class="cart-w SC-w hd-pd">
								<span class="mcart-icon dropdowSCIcon" title="User Login">
									<a href="login.php?redirect_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">
										<i class="fa fa-user"></i>
									</a>
								</span>	
							</div>
							<!-- Added by siva -->
							<div class="cart-w SC-w hd-pd ">
								<span class="mcart-icon dropdowSCIcon" title="Create New Account">
									<a href="register.php">
										<i class="fa fa-pencil"></i>
										<!-- Sign Up -->
									</a>
								</span>
							</div>
							<?php
							}
							?>
							
							<?php
							if(isset($_SESSION['session_id'])){
								$add_to_cart_quantity = selectfunction('*',ORDERDETAILS,'order_details_session_id="'.$_SESSION['session_id'].'" and order_id IS NULL',$connection);
								$add_to_cart_count = mysqli_num_rows($add_to_cart_quantity);
								if(mysqli_num_rows($add_to_cart_quantity)>0){
							?>
							<div class="cart-w SC-w hd-pd" title="Shopping Cart">
								<span class="mcart-icon dropdowSCIcon">
									<i class="fa fa-shopping-cart"></i>
									<span class="mcart-dd-qty"><?php echo $add_to_cart_count; ?></span>
								</span>
								<div class="mcart-dd-content dropdowSCContent clearfix" id="checkout_details_scroll">
								<?php
									$total_amount = 0; 
									$cart_details = mysqli_query($connection,"SELECT * FROM stork_order_details
										        INNER JOIN stork_paper_print_type ON stork_paper_print_type.paper_print_type_id=stork_order_details.order_details_paper_print_type_id
										        INNER JOIN stork_paper_side ON stork_paper_side.paper_side_id=stork_order_details.order_details_paper_side_id
										        INNER JOIN stork_paper_size ON stork_paper_size.paper_size_id=stork_order_details.order_details_paper_size_id
										        INNER JOIN stork_paper_type ON stork_paper_type.paper_type_id=stork_order_details.order_details_paper_type_id
										        where stork_order_details.order_id IS NULL and stork_order_details.order_details_session_id='".$_SESSION['session_id']."'");
									while($cart_data = mysqli_fetch_array($cart_details, MYSQLI_ASSOC)){
											$total_amount += $cart_data['order_details_total_amount'];
								?>
								
									<div class="mcart-item-w clearfix">
										<ul>
											<li class="mcart-item">
												<div class="mcart-info ordered_item">
													<input type="hidden" value="<?php echo $cart_data['order_details_session_id']; ?>" class="ordered_item_session_id" />
													<input type="hidden" value="<?php echo $cart_data['order_details_id']; ?>" class="ordered_item_oreder_detail_id" />
													<a class="mcart-name"><b>Print type</b> : <?php echo $cart_data['paper_print_type']; ?> </a>
													<a class="mcart-name"><b>Print side</b> : <?php echo $cart_data['paper_side']; ?></a>
													<a class="mcart-name"><b>Paper type</b> : <?php echo $cart_data['paper_type']; ?></a>
													<a class="mcart-name"><b>Paper size</b> : <?php echo $cart_data['paper_size']; ?></a>
													<?php
													if($cart_data['order_details_is_binding'] == '1'){
													?>
													<a class="mcart-name"><b>Binding type</b> : <?php echo $cart_data['order_details_binding_type']; ?></a>
													<?php	
													}
													?>
													<span class="mcart-price"><b>&#8377;</b> <?php echo $cart_data['order_details_total_amount']; ?></span>
													<span class="mcart-remove-item cart_remove_item">
														<i class="fa fa-times-circle"></i>
													</span>
												</div>
											</li>
										</ul>
									</div>
									<?php
									}//while contidioin
									?>
									<div class="mcart-total clearfix">
										<table>
											<tr>
												<td>Sub-Total</td>
												<td><b>&#8377;</b><?php echo $total_amount ; ?></td>
											</tr>
											<!-- <tr>
												<td>Eco Tax (-2.00)</td>
												<td>$ 2.00</td>
											</tr>
											<tr>
												<td>VAT (20%)</td>
												<td>$ 2.018</td>
											</tr> -->
											<tr class="total">
												<td>Total</td>
												<td><b>&#8377;</b><?php echo $total_amount; ?></td>
											</tr>
										</table>
									</div>
									<div class="mcart-links buttons-set clearfix">
										<a href="checkout.php" class="gbtn mcart-link-checkout">Checkout</a>
									</div>
								</div>
							</div>
							<?php
							}
							}
							?>
							
							<div class="search-w SC-w hd-pd ">
								<span class="search-icon dropdowSCIcon" title="Track Order">
									<i class="fa fa-search"></i>
								</span>
								<div class="search-safari">
									<div class="search-form dropdowSCContent">
										<form method="POST" action="trackorderstatus.php">
											<input type="text" name="track_order_search" placeholder="Track Your Order" autocomplete="off" required />
											<input type="submit" name="search" value="Search">
											<i class="fa fa-search"></i>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--Main Header: End-->
	</header><!--Header: End-->