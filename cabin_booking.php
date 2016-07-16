<?php 
	include('header.php');

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
 	 		updatefunction('order_details_session_id="'.$changed_session_id.'"',ORDERDETAILS,'order_details_session_id="'.$_SESSION['session_id'].'"',$connection);
	 		$_SESSION['session_id'] = $changed_session_id;
	 	}
 	}
?>
	
  	<link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400' rel='stylesheet' type='text/css'>
  	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
  	<!--Add JS lib--> 	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
 
	<script>
	function getSlot(val) {
		$.ajax({
			type: "POST",
			url: "cabin_query.php",
			data:{ requiredate : val },
			success: function(data){
				alert(data);
				$("#required_date").val(val);
			}
		});
	}
	</script>

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
					   <div class="pane round-box">
						 <h3 class="title"><span class="icon icon-one">1</span>Book Your Cabin Now</h3>
						 <form id="cabin_booking" class="cabin_booking" name="cabin_booking" method="post" action="">
						  <div class="pane-inner">
							 <ul id="table_billto" class="adminform user-details no-border">
				  				<li class="long">
					  			  <div class="field-wrapper">
									<label for="address_1_field" class="address_1">Name<em>*</em></label>
									<br> 
									<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="cabin_name"> 
					   			  </div>
					            </li> 
					            <li class="long">
					  			  <div class="field-wrapper">
     					             <label for="phone_2_field" class="phone_2">Mobile phone<em>*</em></label>
						             <br>
						             <input type="text" maxlength="10" value="" size="30" name="phone_2" id="cabin_mobile"> 
					              </div>
					            </li> 
					            <li class="long">
					  				<div class="field-wrapper">
										<label for="address_1_field" class="address_1">Timing Type<em>*</em></label>
										<br>
										<select class="select_time" id="cabin_timing_type" onChange="getSlot(this.value);">
											<option val=""> Select Timing Type </option>
										<?php
											foreach($timing_type as $key => $value) { 
										?>
												<option val="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
											}
										?>
										</select>
					  				</div>
					 			</li>
					 			<li class="long">
			                      <div class="field-wrapper">
									<label for="txtDate" class="phone_1">Required Date</label>
									<br>
									<input type="text" maxlength="32" value="" size="30" name="require_date" id="txtDate" onChange="getSlot(this.value);"> 
									<input type="hidden" id="required_date" name="required_date">
								  </div>
					 			</li>
					 			<li class="long num_of_system_restiction">
								  <div class="field-wrapper">
									<label for="address_1_field" class="address_1">No. of System<em>*</em></label>
									<br>
									<input type="text" maxlength="2" class="required" value="" size="30" name="zip" id="cabin_required_system"> 
								   </div>
					 			</li>
					    		<li class="long">
			                      <div class="field-wrapper">
									<label for="phone_1_field" class="phone_1">Total Hours<em>*</em></label>
									<br>
									<input type="text" maxlength="32" value="" size="30" name="phone_1" id="phone_1_field" readonly> 
								  </div>
					 			</li>
   					            <li class="long">
								  <div class="field-wrapper">
									<label for="email_field" class="address_1">Total Cost</label>
									<br>
									<input type="text" maxlength="64" class="required" value="" size="30" name="address_1" id="" readonly> 
								   </div>
					 			</li>
					 			<span class="details-button">
									<input id="cabin_book_button" class="details-button" type="button" title="Book" value="Book">
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
					   <div class="pane round-box">
						 	<h3 class="title"><span class="icon icon-three">2</span>BOOKED TIME SLOTS</h3> 
						 	<?php 
						 		require_once('cabin_query.php');
					 		?>
	                	    
	                	</div>
					  </div>
				     </div>
	    		  </div>
                </div>
          </div> <!---onepage--->
        </div> <!---container---->
          <!-- <button>Booked</button>
          <button>Selected</button>
          <button>Available</button>  -->
        <div class="align">
         <span class="details-button">
			<input id="coupon_booked_button" class="details-button" type="button" title="Booked" value="Booked">
			<input id="coupon_selected_button" class="details-button" type="button" title="Selected" value="Selected">
			<input id="coupon_available_button" class="details-button" type="button" title="Available" value="Available">
		  </span> 
		</div>
		<br>
		<div class="align">
			<h3>Working Hours - 05:00 to 23:00 hrs from Sunday to Saturday (All Days)</h3>
		</div>   
    </section>

<?php 
	include('footer.php');
?>
