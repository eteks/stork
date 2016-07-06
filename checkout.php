<?php 
include('header.php');
// if(!isset($_SESSION['session_id'])){
// 	die('<script type="text/javascript">window.location.href="printbooking.php";</script>');
// 	exit();
// }

$review_details = mysqli_query($connection,"SELECT * FROM stork_order_details
									        INNER JOIN stork_paper_print_type ON stork_paper_print_type.paper_print_type_id=stork_order_details.order_details_paper_print_type_id
									        INNER JOIN stork_paper_side ON stork_paper_side.paper_side_id=stork_order_details.order_details_paper_side_id
									        INNER JOIN stork_paper_size ON stork_paper_size.paper_size_id=stork_order_details.order_details_paper_size_id
									        INNER JOIN stork_paper_type ON stork_paper_type.paper_type_id=stork_order_details.order_details_paper_type_id
									        INNER JOIN stork_upload_files ON stork_upload_files.upload_files_order_details_id=stork_order_details.order_details_id
									        where stork_order_details.order_id IS NULL and stork_order_details.order_details_session_id='".$_SESSION['session_id']."' group by stork_order_details.order_details_id");
if(mysqli_num_rows($review_details)>0){
?>

<main class="main" ng-app="" id="checkout">
	<section class="header-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 hidden-xs">
					<h1 class="mh-title">Checkout</h1>
				</div>
				<div class="breadcrumb-w col-sm-9">
					<span class="hidden-xs">You are here:</span>
					<ul class="breadcrumb">
						<li>
							<a href="home.php">Home</a>
						</li>
						<li>
							<span>Checkout</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section> <!---breadcrumb------><!---section3--->
  	<div class="">	
		<section id="checkout" class="pr-main">
	 		<div class="container">
	  			<div class="onepage">	
	  				<div class="cart-view-top">
						 <div class="col-md-6 col-sm-6 col-xs-12">
							<h1>Review Your Order here..</h1>
						 </div>
						 <div class="col-md-6 col-sm-6 col-xs-12 right">
						    <h1><a href="printbooking.php">Continue Shopping</a></h1>
						 </div>
       				</div>
  				<br>	
	  			<div class="order-box">
	  				<?php
	  				$review_count = 1;
	  				$checkout_total_amount = 0;
	  				while($review_data = mysqli_fetch_array($review_details, MYSQLI_ASSOC)){
	  					
	  				?>
	   				<!---order detail 1 starts--->			
	   				<div id="checkfull" class="col-md-8 col-sm-12 col-xs-12">
	     				<div  class="col-md-12 col-sm-12 col-xs-12" >
	      					<!-- render layout -->
	      					<fieldset class="round-box" id="cart-contents">
	      						<h3 class="title"><span class="icon fa fa-check"></span>REVIEW ORDER <?php echo $review_count; ?></h3>
	  							<table cellspacing="0" cellpadding="0" border="0" class="cart-summary no-border review_order_checkout">
									<tbody>
									    <tr clas="top-header">
											<th width="10%" align="left" class="th-price">Print Type</th>
											<th width="10%" class="th-price">Print side</th>
											<th width="10%" class="th-tax"><span class="priceColor2">Paper Size</span></th>
											<th width="15%"  class="th-quanlity">Paper Type</th>
											<!-- <th width="15%"  class="th-quanlity">Color pages no.</th> -->
											<th width="15%"  class="th-quanlity">Total no. of pages</th>
											<th width="15%" class="th-discount"><span class="priceColor2">Quantity</span></th>
											<th width="15%" class="th-discount"><span class="priceColor2">Comments</span></th>
											<th width="15%" class="th-discount"><span class="priceColor2">Total Cost</span></th>
											<th width="15%" align="left" class="th-total th-last">SubTotal</th>
									    </tr>
            							<tr valign="top" id="product_row_0" class="product-detail-row product-detail-last-row sectiontableentry1">
											<td align="left" class="base-price">
												<div class="PricebasePrice vm-display vm-price-value">
													<span class="vm-price-desc"></span>
													<span class="PricebasePrice"><?php echo $review_data['paper_print_type']; ?></span>
												</div> 	 
											</td>
			  								<td align="left" class="base-price">
												<div class="PricebasePrice vm-display vm-price-value">
													<span class="vm-price-desc"></span>
													<span class="PricebasePrice"><?php echo $review_data['paper_side']; ?></span>
												</div>			
			  								</td>
			  								<td align="right" class="pro_tax">
			  									<span class="priceColor2">
			  	 									<div class="PricetaxAmount vm-display vm-price-value">
			  											<span class="vm-price-desc"></span>
			  											<span class="PricetaxAmount"><?php echo $review_data['paper_size']; ?></span>
			  	  									</div>
			  	 								</span>
			  								</td>
			  								<td align="right" class="pro_tax">
			  									<span class="priceColor2">
			  	 									<div class="PricetaxAmount vm-display vm-price-value">
												  		<span class="vm-price-desc"></span>
												  		<span class="PricetaxAmount"><?php echo $review_data['paper_type']; ?></span>
			  	  									</div>
			  	 								</span>
			  								</td>
			  								<!-- <td align="right" class="pro_tax">
			  									<span class="priceColor2">
			  	 									<div class="PricetaxAmount vm-display vm-price-value">
												  		<span class="vm-price-desc"></span>
												  		<span class="PricetaxAmount">
												  			<?php //if($review_data['upload_files_color_print_pages'] != ''){
												  				//echo $review_data['upload_files_color_print_pages'];
												  			//}
															//else {
																//echo "NIL";
															//} 
												  			?>
												  		</span>
			  	  									</div>
			  	 								</span>
			  								</td> -->
			  								<td align="right" class="pro_tax">
			  									<span class="priceColor2">
			  	 									<div class="PricetaxAmount vm-display vm-price-value">
			  											<span class="vm-price-desc"></span>
			  											<span class="PricetaxAmount"><?php echo $review_data['order_details_total_no_of_pages']; ?>	</span>
			  	  									</div>
			  	 								</span>
			  								</td>
			  								<td align="left" class="product-quanlity">
			    								<input type="text" id="quantity_0" value="1" maxlength="3" size="3" name="quantity[0]" class="quantity-input js-recalculate ordered_item_quantity" title="Update Quantity In Cart">
		  									</td>
		  									<td>
		  										<span class="priceColor2">
			  	 									<div class="PricetaxAmount vm-display vm-price-value">
												  		<span class="vm-price-desc"></span>
												  		<span class="PricetaxAmount"><?php echo $review_data['order_details_comments']; ?></span>
			  	  									</div>
			  	 								</span>
			  								</td>
			  								<td align="left" class="base-price">
												<div class="PricebasePrice vm-display vm-price-value">
													<span class="vm-price-desc"></span>
													<span class="PricebasePrice check_out_subtotal_amount"><b>&#8377;</b> <?php echo $review_data['order_details_total_amount']; ?></span>
													<input type="hidden" value="<?php echo $review_data['order_details_total_amount']; ?>"  class="updated_oredered_item_amount"/>
													<input type="hidden" value="<?php echo $review_data['order_details_total_amount']; ?>"  class="oredered_item_amount"/>
												</div>			
			  								</td>
              								<td align="right" id="subtotal_with_tax_0" colspan="0" class="sub-total td-last">
              									<span class="line-through check_out_total_amount"><b>&#8377;</b> <?php echo $review_data['order_details_total_amount']; ?></span>
              								</td>
		    							</tr>
		   							</tbody>
	      						</table>
        					</fieldset>
      					</div>
	     			</div> <!---order 1--->  
	    			<!-- end of order details -->
	    			<?php
	    			$checkout_total_amount += $review_data['order_details_total_amount'];
	    			$review_count++;
	    			}
	    			?>
	    			
	    			
	   			</div><!---Order-box---> 
	   			<div class="clearfix"> </div>
	   
	   
	   
	   
	   
	   <br> 
	   <?php
	   if(isset($_SESSION['usertype'])){
	   	$usertype_name = $_SESSION['usertype'];
		if($usertype_name == 'stu'){
			$city_query1 = "select * from stork_college inner join stork_area on stork_college.college_area_id = stork_area.area_id inner join stork_city on stork_area.area_city_id = stork_city.city_id inner join stork_state on stork_state.state_id = stork_city.city_state_id  where stork_college.college_id =".$_SESSION['college_id'];
			$city1 = mysqli_fetch_array(mysqli_query($connection, $city_query1));
			$college_name = $city1['college_name'];
			$area_name = $city1['area_name'];
			$city_name = $city1['city_name'];
			$state_name = $city1['state_name'];
			$delivery_amount = $city1['area_delivery_charge'];
			
		}
		elseif ($usertype_name == 'pro') {
			$city_query2 = "select * from stork_area inner join stork_city on stork_area.area_city_id = stork_city.city_id inner join stork_state on stork_state.state_id = stork_city.city_state_id  where stork_area.area_id =".$_SESSION['area_id'];
			$city2 = mysqli_fetch_array(mysqli_query($connection, $city_query2));
			$area_name = $city2['area_name'];
			$city_name = $city2['city_name'];
			$state_name = $city2['state_name'];
			$delivery_amount = $city1['area_delivery_charge'];
		}
		  
	   ?>
	   
	   <div class="cart-view-top">
		 <div class="col-md-6 col-sm-6 col-xs-12">
			<h1>Shopping Cart</h1>
		 </div>
		 <div id="login-pane" class="col-md-12 col-sm-12 col-xs-12">
             <p>Please fill in the fields below to complete your order.</p>
        </div>
	   </div>
	   </hr>	
       <div class=""> <!---Shipping details----> 
       	 <!---shipping detail1 starts--->
  		 <div  class="col-md-6 col-sm-6 col-xs-12">
		   <div id="div_billto" class="checkout_address">
			 <div class="pane round-box no_pad">
			   <input type="checkbox" id="register" class="send_to_address_personal"><label class="registers">Send to Personnel Address</label>	
			   <h3 class="title"><span class="icon fa fa-check"></span>Shipping Detail </h3>
				<div class="pane-inner send_to_address_personal_data">
				 <br>	
				  <ul id="table_billto" class="adminform user-details no-border">
				  	<li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Name<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="name"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Address 1<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="address1"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Address 2<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="address2"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Area<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="<?php echo $area_name; ?>" size="30" name="address_1" id="address_1_field" readonly=""> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">City<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="<?php echo $city_name; ?>" size="30" name="address_1" id="address_1_field" readonly> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Postal Code<em>*</em></label>
						<br>
						<input type="text" maxlength="32" class="required" value="" size="30" name="zip" id="address_1_field" ng-model="zipcode"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">State<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="<?php echo $state_name; ?>" size="30" name="address_1" id="address_1_field" readonly> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Mobile<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="mobilenumber"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="email_field" class="address_1">E-Mail<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="email"> 
					   </div>
					 </li>
				  </ul>
				  <br>
				  <?php
				  $user_access_type = explode('_', $_SESSION['session_id']);
				   if($user_access_type[0]=='reg'){
				   	?>
				  <input type="checkbox" id="register"><label class="registers">Make this as my default shipping address</label>
				 
				 <?php
				 }
				 ?>
				</div>
	 		</div>
		   </div>  <!-- billto -->
         </div>
         <?php
		$user_access_type = explode('_', $_SESSION['session_id']);
		
		if($user_access_type[0] == 'gue' && $user_access_type[1] == 'stu'||	$user_access_type[0] == 'reg' && $user_access_type[1] == 'stu'){
		?>
		
         
         <!---shipping detail2 starts--->
         <div  class="col-md-6 col-sm-6 col-xs-12 fl">
		   <div id="div_billto" class="checkout_address">
			 <div class="pane round-box no_pad">
			  <input type="checkbox" id="register" class="send_to_address_college"><label class="registers">Send to College Address</label>	
			   <h3 class="title"><span class="icon fa fa-check"></span>Shipping Detail </h3>
				<div class="pane-inner send_to_address_college_data">
				 <br>	
				  <ul id="table_billto" class="adminform user-details no-border">
				  	<li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Student Name<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="name"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">ID No.<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="studentid"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Year of Studying<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="yearofstuding"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Department<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" readonly> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">College Name<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="<?php if($usertype_name == 'stu') echo $college_name; ?>" size="30" name="address_1" id="address_1_field" readonly> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">City<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="<?php echo $city_name; ?>" size="30" name="address_1" id="address_1_field" readonly> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Postal Code<em>*</em></label>
						<br>
						<input type="text" maxlength="32" class="required" value="" size="30" name="zip" id="address_1_field" ng-model="zipcode"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">State<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="<?php echo $state_name; ?>" size="30" name="address_1" id="address_1_field" readonly> 
					   </div>
					 </li>
  					  <li class="long">
					  <div class="field-wrapper">
						<label for="address_1_field" class="address_1">Mobile number<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="mobilenumber"> 
					   </div>
					 </li>
					 <li class="long">
					  <div class="field-wrapper">
						<label for="email_field" class="address_1">E-Mail<em>*</em></label>
						<br>
						<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="address_1_field" ng-model="email"> 
					   </div>
					 </li>
				  </ul>
				</div>
	 		</div>
		   </div>  <!-- billto -->
         </div>
         <?php	
		}
       	?>
      </div> <!---shipping details --->
      <?php
	   }
	   ?>
      <div class="clearfix"> </div>
      <!--cost details---->
      <div class="cart-view-top">
		 <div class="col-md-6 col-sm-6 col-xs-12">
			<h1>Costing Details</h1>
		 </div>
		 <div id="login-pane" class="col-md-12 col-sm-12 col-xs-12">
             <p>Please check your total costs here.</p>
         </div>
         <div id="checkfull" class="col-md-8 col-sm-12 col-xs-12">
          <div  class="col-md-12 col-sm-12 col-xs-12" >
           <!-- render layout -->
           <fieldset class="round-box" id="cart-contents">
           <h3 class="title"><span class="icon fa fa-check"></span>Estimated Cost</h3>
	       <table cellspacing="0" cellpadding="0" border="0" class="cart-summary no-border">
		     <tbody>
               <tr class="pr-total">
		          <td colspan="6">
			       <table>                             
					 <tbody>
						<tr class="first">
							<td>SubTotal:</td>
							<td class="pr-right"><div class="PricesalesPrice vm-display vm-price-value"><span class="vm-price-desc"></span><span class="PricesalesPrice final_visible_sub_amount_checkout_page"><b>&#8377;</b> <?php echo $total_amount ; ?></span></div></td>
						</tr>
						<tr>
							<td>Delivery Charge:</td>
							<td class="pr-right">
							  <span id="total_amount" class="priceColor2"><b>&#8377;</b>  <?php echo $delivery_amount;?></span>
							  <input type="hidden" class="final_delivery_charge_amount" value="<?php echo $delivery_amount;?>">
							</td>
						</tr>
						<tr style="display:none;">
							<td>Tax:</td>
							<td class="pr-right"><span id="total_tax" class="priceColor2">Rs11.17</span></td>
						</tr>
						<tr style="display:none;">
							<td>Shipment:</td>
							<td class="pr-right"><span id="shipment" class="priceColor2">0</span></td>
						</tr>
						<tr class="last">
							<td>Total:</td>
							<td class="pr-right"><strong id="bill_total" class="final_visible_amount_checkout_page"><b>&#8377;</b> <?php echo $total_amount + $delivery_amount; ?></strong></td>
						</tr>
					  </tbody>
			        </table>
			       </td>
		          </tr>
		        </tbody>
		      </table>
		      </fieldset> 
		    </div>
		  </div>   
	   </div> <!---Cost details---->
	   <!---button holder------>
	   <?php
	   if($user_access_type[0]=='gue'){
	   	?>
	   <div class="button_holder">
			<h4 class="btn_prf"><a href="register.php">Sign up</a></h4>
			<!--<h4 class="btn_prf"><a href="home.html">Reset</a></h4>-->
			<h4 class="btn_prf"><a href="login.php">Sign in</a></h4>
			<?php	
				require_once('fbsettings.php'); 
				if (isset($accessToken)) {
				} else {
					$loginUrl = $helper->getLoginUrl(FACEBOOKLOGINURL, $permissions);
					echo '<h4 class="btn_prf"><a href="' . $loginUrl . '">Login with Facebooko</a></h4>';
				}
			?>
			<?php
				require_once('googlesettings.php'); 
				if(isset($authUrl)) {
					echo '<h4 class="btn_prf"><a href="'.$authUrl.'">Login with Google+</a></h4><br>';
				}
			?>
			
			
	   </div>
	   <?php
	   }
	   ?>
	   <div class="clearfix">  </div>
	   <div class="button_holder btn_pay" >
	   		<form method="post" name="customerData" action="ccavRequestHandler.php" id="print_checkout_form">
		   		<input type="hidden" name="tid" id="txnid" readonly />
		   		<input type="hidden" name="merchant_id" value="<?php echo MERCHANTID; ?>"/>
		   		<input type="hidden" name="order_id" value="<?php echo $_SESSION['session_id']; ?>"/>
		   		<input type="hidden" class="final_payment_amount_checkout" name="amount" value="<?php echo $checkout_total_amount; ?>"/>
		   		<input type="hidden" name="currency" value="INR"/>
		   		<input type="hidden" name="redirect_url" value="<?php echo CCAVENUEREDIRECTURL; ?>"/>
		   		<input type="hidden" name="cancel_url" value="<?php echo CCAVENUECANCELURL; ?>"/>
		   		<input type="hidden" name="language" value="EN"/>
		   		<input type="hidden" name="billing_name" value="{{name}} "/>
		   		<input type="hidden" name="merchant_param2" value="{{studentid}}"/>
		   		<input type="hidden" name="merchant_param3" value="{{yearofstuding}}"/>
		   		<input type="hidden" name="merchant_param1" value="{{address1}}"/>
		   		<input type="hidden" name="billing_address" value="{{address2}}<?php if($usertype_name == 'stu') echo $college_name; ?>"/>
		   		<input type="hidden" name="merchant_param4" value="<?php echo $area_name; ?>"/>
		   		<input type="hidden" name="billing_city" value="<?php echo $city_name; ?>"/>
		   		<input type="hidden" name="billing_state" value="<?php echo $state_name; ?>"/>
		   		<input type="hidden" name="billing_zip" value="{{zipcode}}"/>
		   		<input type="hidden" name="billing_country" value="India"/>
		   		<input type="hidden" name="billing_tel" value="{{mobilenumber}}"/>
		   		<input type="hidden" name="billing_email" value="{{email}}"/>
		   		<h4 class="btn_prf check_out_payment"><a>Pay Now</a></h4>
				<h4 class="btn_prf check_out_clear_btn"><a>Clear</a></h4>
			</form>
	   </div>		
  </div> <!--onepage--->
  </div> <!--container---->
 </section>
</div>

</main><!--Main index : End-->

<?php
}
// else{
	// die('<script type="text/javascript">window.location.href="printbooking.php";</script>');
	// exit();
// } 
include('footer.php'); 
?>
<script>
	$(window).load(function(){
		var d = new Date().getTime();
		$('#txnid').val(d);
	});
</script>