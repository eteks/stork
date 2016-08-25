<?php 
	include('header.php');
	$random = uniqid();
	if(!isset($_SESSION['session_id'])){
  		if($_SESSION['login_status'] == 1 && $_SESSION['usertype'] == 'stu'){
   			$_SESSION['session_id'] = 'reg_stu_'.$random; 
  		}
  		else if($_SESSION['login_status'] == 1 && $_SESSION['usertype'] == 'pro'){
	   		$_SESSION['session_id'] = 'reg_pro_'.$random;
	  	}
	  	else if($_SESSION['login_status'] == 0 && $_SESSION['usertype'] == 'stu'){
   			$_SESSION['session_id'] = 'gue_stu_'.$random;
  		}
  		else if($_SESSION['login_status'] == 0 && $_SESSION['usertype'] == 'pro'){
	   		$_SESSION['session_id'] = 'gue_pro_'.$random;
	  	}
 	}
 	
 	if(isset($_SESSION['session_id'])){
 		$session_data_check = explode("_", $_SESSION['session_id']);
	 	if($_SESSION['usertype'] != $session_data_check[1]){
		 	$changed_session_id = $session_data_check[0].'_'.$_SESSION['usertype'].'_'.$session_data_check[2];
 	 		//updatefunction('order_details_session_id="'.$changed_session_id.'"',ORDERDETAILS,'order_details_session_id="'.$_SESSION['session_id'].'"',$connection);
	 		$_SESSION['session_id'] = $changed_session_id;
	 	}
 	}
?>
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
						<a href="home.php">Home</a>
					  </li>
					  <li>
						<span>Order</span>
					  </li>
					</ul>
			   </div>
			</div>
        </div>
	  </section> <!---breadcrumb-->
	
      <section id="checkout" class="pr-main">
			<div class="container">	
			  <div class="cart-view-top">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<h1>Cabin Booking</h1>
				</div>
			  </div>
              <div class="onepage">
				 <div  class="col-md-4 col-sm-6 col-xs-12">
				 <div id="div_billto">
					   <div class="round-box">
						 <h3 class="title"><span class="icon icon-one">1</span>Book Your Cabin Now</h3>
						 <form id="cabin_booking" class="cabin_booking" name="cabin_booking" method="post" action="ccavRequestHandler.php"><!--"-->
						 	<input type="hidden" name="tid" id="txnid" readonly />
		   					<input type="hidden" name="merchant_id" value="<?php echo MERCHANTID; ?>"/>
		   					<input type="hidden" name="order_id" value="<?php echo 'cab_'.$_SESSION['session_id']; ?>"/>
		   					<input type="hidden" name="currency" value="INR"/>
					   		<input type="hidden" name="redirect_url" value="<?php echo CCAVENUEREDIRECTURL; ?>"/>
					   		<input type="hidden" name="cancel_url" value="<?php echo CCAVENUECANCELURL; ?>"/>
					   		<input type="hidden" name="language" value="EN"/>
					   		<input type="hidden" name="billing_country" value="India"/>
					   		<input type="hidden" name="delivery_address" value="<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>" >
						  <div class="pane-inner">
							 <ul id="table_billto" class="adminform user-details no-border">
				  				<li class="long">
					  			  <div class="field-wrapper">
									<label for="address_1_field" class="address_1">Name<em>*</em></label>
									<br> 
									<input type="text" maxlength="64" class="required" value="" size="30" name="billing_name" id="cabin_name"> 
					   			  </div>
					            </li> 
					            <li class="long">
					  			  <div class="field-wrapper">
     					             <label for="phone_2_field" class="phone_2">Mobile phone<em>*</em></label>
						             <br>
						             <input type="text" maxlength="10" value="" size="30" name="billing_tel" id="cabin_mobile"> 
					              </div>
					            </li> 
					            <li class="long">
					  				<div class="field-wrapper">
										<label for="address_1_field" class="address_1">Timing Type<em>*</em></label>
										<br>
										<select class="select_time" id="cabin_timing_type" name="merchant_param1">
											<option val=""> Select Timing Type </option>
										<?php
											$system_query = "select * from stork_cabin_total_number_of_system where total_number_of_system_status = '1'";
											$system_query_data = mysqli_query($connection, $system_query);
											while($row = mysqli_fetch_array($system_query_data)){
												if($row['total_number_of_system_timing_type']=='fixed'){
													echo "<option value ='".$row['total_number_of_system_timing_type']."' selected>".ucfirst($row['total_number_of_system_timing_type'])."</option>";
												}else{
													echo "<option value ='".$row['total_number_of_system_timing_type']."'>".ucfirst($row['total_number_of_system_timing_type'])."</option>";
												}
												
											}
										?>
										</select>
					  				</div>
					 			</li>
					 			<li class="long">
			                      <div class="field-wrapper">
									<label for="txtDate" class="phone_1">Required Date</label>
									<br>
									<input type="text" id="cabin_booking_date" maxlength="32" value="" size="30" name="merchant_param2" id="txtDate"> 
								  </div>
					 			</li>
					 			<li class="long num_of_system_restiction">
								  <div class="field-wrapper">
									<label for="address_1_field" class="address_1">No. of System<em>*</em></label>
									<br>
									<input type="text" maxlength="2" class="required" value="" size="30" name="merchant_param3" id="cabin_required_system">
									<input type="hidden" class="maximum_booking_system" value="0">
								   </div>
					 			</li>
					    		<li class="long">
			                      <div class="field-wrapper">
									<label for="phone_1_field" class="phone_1">Total Hours<em>*</em></label>
									<br>
									<input type="text" maxlength="32" value="" size="30" name="merchant_param4" id="phone_1_field" class="total_hours_cabin_booking_view"  readonly>
									<input type="hidden" class="total_hours_cabin_booking" value="0"> 
								  </div>
					 			</li>
   					            <li class="long">
								  <div class="field-wrapper">
									<label for="email_field" class="address_1">Total Cost</label>
									<br>
									<input type="text" maxlength="64" class="required cabin_booking_total_amount" value="0" size="30" name="amount" id="" readonly> 
								   </div>
					 			</li>
					 			<span class="details-button" id="cabin-button">
					 				<input type="hidden" name="merchant_param5" class="schedule_time_id" value="">
									<input id="cabin_book_button" class="details-button" type="submit" title="Book" value="Book">
									<input id="cabin_clear_button" class="details-button" type="button" title="Clear" value="Clear">
							    </span> 
							    
				 			   	<div> 
				 			   		</br>
				 			   	</div> 
				 			 </ul>
							
						  </div>
						  </form>
					   </div>
				  </div>
				  </div> 
				     
			      <div class="col-md-8 col-sm-6 col-xs-12">
				      <div id="right-pane-top" class="col-md-12 col-sm-12 col-xs-12">
				      <div id="shipping_method" class="col-md-12 col-sm-12 col-xs-12">
					  <div class="shipment-pane">
					   <div class="round-box" id="cabin_booking_timing_slot">
	                	    
	                	</div>
					  </div>
				     </div>
	    		  </div>
                </div>
          </div> <!---onepage--->
        </div> <!---container---->
        <h3 class="align"><span class="book-status st_booked">Booked</span><span class="book-status st_selected">Selected</span><span class="book-status st_available">Available</span></h3>
		 <br>
		<div class="align">
			<h3>Working Hours - 06:00 AM to 11:00 PM from Sunday to Saturday (All Days)</h3>
		</div>   
    </section>

<?php 
	include('footer.php');
?>
<script>
	$(window).load(function(){
		var d = new Date().getTime();
		$('#txnid').val(d);
	});
</script>
