function ConvertTimeformat(format, str) {
    var time = str.replace(/\ /g, "");
    // alert("original_value"+time);
    // alert("trim_Value"+time.replace(/\ /g, ""));
    // var hours = Number(time.match(/^(\d+)/)[1]);
    // alert(hours);
    // var minutes = Number(time.match(/:(\d+)/)[1]);
    // alert(minutes);
    // var AMPM = time.match(/\s(.*)$/)[1];
    // alert(AMPM);
    hours = time.split(':')[0];
    minutes = time.split(':')[1].substring(0,2);
    AMPM = time.split(':')[1].slice(-2);
    if (AMPM == "PM" && hours < 12) hours = Number(hours) + 12;
    if (AMPM == "AM" && hours == 12) hours = Number(hours) - 12;
    var sHours = hours.toString();
    var sMinutes = minutes.toString();
    if (hours < 10) sHours = "0" + sHours;
    // if (minutes < 10) sMinutes = "0" + sMinutes;
    // alert(sHours + ":" + sMinutes);
    return sHours + ":" + sMinutes;

}

jQuery(document).ready(function() {
	var required_area =["areaname","deliverycharge"];
	var required_edit_admin_users =["username","password","phone","test"];
	var required_add_offer_zone =["offerzonetitle","offerzoneimage"];
	// var required_edit_offer_zone =["offerzonetitle","offerzoneimage"];
	var required_edit_offer_zone =["offerzonetitle"];
	// var required_edit_users =["username","password","firstname","test","dob","address","phone"];
	// var required_myform =["areaname","deliverycharge"];
	var admin_login=["admin_username","admin_password"];
	var required_offer_new =["offertitle","offercode","offeramount","eligibleamtforoffer","no_of_limitation","startdate","enddate"];
	var required_state =["statename"];
	var required_city =["cityname"];
	var required_college =["collegename"];
	var required_papersize =["papersize"];
	var required_paperside =["paperside"];
	var required_papertype =["papertype"];
	var required_paperprinttype =["paperprinttype","amount"];
	var required_cost_estimation =["amount"];
	var required_binding_cost_estimation =["amount"];
	var required_edit_orders =["customername","studentname","shippingaddressline1","shippingcity","totalitems","test","phone"];	
	var required_edit_orders_student =["order_student","order_student_year","order_shipping_department"];
	var required_edit_order_details =["orderid","pages","colorprintpage","amount"];
	var required_edit_track_order =["dateofdelivered"];
	var required_project_printing_cost =["amount"];
	var required_multicolor_printing_cost=["amount"];
	var required_multicolor_copies =["copies"];
	var required_cabin_system_details =["noofsystem"];
	var required_cabin_schedule_time =["schedule_time_start","schedule_time_end"];
	var required_cabin_holiday_details =["holiday_date"];
	var required_cabin_cost_estimation =["amount"];
	var required_customer_offer =["filteramount"];
	var required_edit_ohpsheet =["ohp_sheet_cost"];
	var required_cabin_order_details =["customername","email","phone","dob","schedule_time_start","schedule_time_end","noofsystem_booked","totalhours_booked","amount"];
	sel_a = jQuery("#sel_a");
	sel_b = jQuery("#sel_b");
	sel_c = jQuery("#sel_c");
	sel_d = jQuery("#sel_d");
	sel_e = jQuery("#sel_e");
	forget_email=jQuery("#test");
	email=jQuery("#email");
 	test=jQuery("#test");
	errornotice = jQuery("#error");

	jQuery("#edit_admin_users").submit(function(){ 
		
		// for empty field validation
		for(var i = 0 ; i<required_edit_admin_users.length;i++ ){
			var input = jQuery('#'+required_edit_admin_users[i]);
			
			if ((input.val() == "")) {
				input.addClass("error_input_field");
				// $('.error_test').css('display','block');		
			 }
			 else{
				 input.removeClass("error_input_field");
			 // $('.error_test').css('display','none');
				
			 }
		}
		//end of empty field validation
	
			 var mobile=$('#phone').val().length;
     			if(mobile<=9){
    			$('#phone').addClass("error_input_field_phone");
 				}
 				else {
 				$('#phone').removeClass("error_input_field_phone");
 				}
         
	 	if (document.getElementById('sel_a').selectedIndex < 1){
			$('#sel_a').addClass('error_input_field');
			// $('.error_test').css('display','block');
			// $('.error_test').css('display','none');
		}
		else{ 
			$('#sel_a').removeClass('error_input_field');
			// $('.error_test').css('display','none');
		}
		
		// if (document.getElementById('sel_b').selectedIndex < 1){
			// $('#sel_b').addClass('error_input_field');
			// // $('.error_test').css('display','block');
		// }
		// else { 
			// $('#sel_b').removeClass('error_input_field'); 
			// // $('.error_test').css('display','none');
		// }
// 	
// 		
if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email.val())) {
		 	forget_email.addClass("error_input_field_email");
	  	}else{
	  		forget_email.removeClass("error_input_field_email");
	  	}
	  
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_email').css('display','none');
		$('.error_phone').css('display','none');
		forget_email.removeClass("error_input_field_email");
			$('#phone').removeClass("error_input_field_phone");
			return false;
		}
		else {
			if(jQuery(":input").hasClass("error_input_field_email"))  {
				$('.error_test').css('display','none');
				$('.error_phone').css('display','none');
				$('.error_email').css('display','block');
				$('#phone').removeClass("error_input_field_phone");
				return false;
			}
			
			else {
				if(jQuery(":input").hasClass("error_input_field_phone"))  {
				$('.error_test').css('display','none');
				$('.error_email').css('display','none');
				$('.error_phone').css('display','block');
				return false;
			}
			else {
			errornotice.hide();
			$('.error_phone').css('display','none');
			return true;
			}
			}
		}
	});		
jQuery("#edit_users").submit(function(){ 
			// for empty field validation
		for(var i = 0 ; i<required_edit_users.length;i++ ){
			var input = jQuery('#'+required_edit_users[i]);
			
			if ((input.val() == "")) {
				input.addClass("error_input_field");
				// $('.error_test').css('display','block');
			 
						
			 }
			 else{
				 input.removeClass("error_input_field");
			 // $('.error_test').css('display','none');
				
			 }
		}
		//end of empty field validation
	
			    var mobile=$('#phone').val().length;
     			if(mobile<=9){
    			$('#phone').addClass("error_input_field_phone");
 				}
 				else {
 				$('#phone').removeClass("error_input_field_phone");
 				}
	 	if (document.getElementById('sel_a').selectedIndex < 1){
			$('#sel_a').addClass('error_input_field');
			// $('.error_test').css('display','block');
			// $('.error_test').css('display','none');
		}
		else{ 
			$('#sel_a').removeClass('error_input_field');
			// $('.error_test').css('display','none');
		}
		
		if (document.getElementById('sel_b').selectedIndex < 1){
			$('#sel_b').addClass('error_input_field');
			// $('.error_test').css('display','block');
		}
		else { 
			$('#sel_b').removeClass('error_input_field'); 
			// $('.error_test').css('display','none');
		}
		
if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email.val())) {
		 	forget_email.addClass("error_input_field_email");
	  	}else{
	  		forget_email.removeClass("error_input_field_email");
	  	}
	  
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_email').css('display','none');
		$('.error_phone').css('display','none');
		forget_email.removeClass("error_input_field_email");
			$('#phone').removeClass("error_input_field_phone");
			return false;
		}
		else {
			if(jQuery(":input").hasClass("error_input_field_email"))  {
				$('.error_test').css('display','none');
				$('.error_phone').css('display','none');
				$('.error_email').css('display','block');
				$('#phone').removeClass("error_input_field_phone");
				return false;
			}
			
			else {
				if(jQuery(":input").hasClass("error_input_field_phone"))  {
				$('.error_test').css('display','none');
				$('.error_email').css('display','none');
				$('.error_phone').css('display','block');
				return false;
			}
			else {
			errornotice.hide();
			$('.error_phone').css('display','none');
			return true;
			}
			}
		}
	});		
jQuery("#add_city").submit(function(){ 

		var input = jQuery('#'+required_city);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
 	if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			return false;
		} else {
			errornotice.hide();
			// alert("success"); 
			return true;
		}
	});
	jQuery("#edit_city").submit(function(){ 
		var input = jQuery('#'+required_city);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});

	
	
jQuery("#add_state").submit(function(){ 

		var input = jQuery('#'+required_state);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#edit_state").submit(function(){ 
		var input = jQuery('#'+required_state);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
jQuery("#add_area").submit(function(){ 
		for(var i = 0 ; i<required_area.length;i++ ){
			var input = jQuery('#'+required_area[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#edit_area").submit(function(){ 
		for(var i = 0 ; i<required_area.length;i++ ){
			var input = jQuery('#'+required_area[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#add_offer").submit(function(){ 
		for(var i = 0 ; i<required_offer_new.length;i++ ){
			var input = jQuery('#'+required_offer_new[i]);
	
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }

			}
	//  select field

if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }

		//newly changed by kalai for start date and end date validation on 05/08/16
		if($('#startdate').val()!="" && $('#enddate').val()!=""){
			startdate= $('#startdate').val().split('/');
			startdate = startdate[1]+"/"+startdate[0]+"/"+startdate[2];
			enddate= $('#enddate').val().split('/');
			enddate = enddate[1]+"/"+enddate[0]+"/"+enddate[2];
			if ((Date.parse(enddate) <= Date.parse(startdate))) {
		        $('#enddate').addClass("error_input_field_date");
			    $('.error_date').css('display','block');
		    }
		    else {
				input.removeClass("error_input_field_date");					
				$('.error_date').css('display','none');
			}
		}
			
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_date').css('display','none');
			return false;
		}
		else if(jQuery('#enddate').hasClass("error_input_field_date"))  {
			
				$('.error_test').css('display','none');
				$('.error_date').css('display','block');
				return false;
			}		
			else {
			errornotice.hide();
			$('.error_date').css('display','none');
			$('.error_test').css('display','none');
			return true;
			}
	});
	jQuery("#edit_offer").submit(function(){ 
		for(var i = 0 ; i<required_offer_new.length;i++ ){
			var input = jQuery('#'+required_offer_new[i]);
	
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }

			}
	//  select field

if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		
		//newly changed by kalai for start date and end date validation on 05/08/16
		if($('#startdate').val()!="" && $('#enddate').val()!=""){
			startdate= $('#startdate').val().split('/');
			startdate = startdate[1]+"/"+startdate[0]+"/"+startdate[2];
			enddate= $('#enddate').val().split('/');
			enddate = enddate[1]+"/"+enddate[0]+"/"+enddate[2];
			if ((Date.parse(enddate) <= Date.parse(startdate))) {
		        $('#enddate').addClass("error_input_field_date");
			    $('.error_date').css('display','block');
		    }
		    else {
				input.removeClass("error_input_field_date");					
				$('.error_date').css('display','none');
			}
		}
			
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_date').css('display','none');
			return false;
		}
		else if(jQuery('#enddate').hasClass("error_input_field_date"))  {
			
				$('.error_test').css('display','none');
				$('.error_date').css('display','block');
				return false;
			}		
			else {
			errornotice.hide();
			$('.error_date').css('display','none');
			$('.error_test').css('display','none');
			return true;
			}
	});
	jQuery(".state_act").on('change',function () {
		// alert('success');
        selected_state = $.trim($('option:selected',this).text());
        selected_state_id = $('option:selected',this).val();
        form_data = {'states_name':selected_state,'states_id':selected_state_id};
        // alert(form_data);
        // alert(JSON.stringify(form_data));
        if(selected_state != 'Select State'){
        	$.ajax({
               type: "POST",
               url: "load_city.php?loadcityfromdb=true",
               data: form_data,
               cache: false,
               success: function(data) { 
               	// alert(data);             
                var obj = JSON.parse(data);
                var options = '<option value="">Select City</option>';   
                if(obj.length!=0){               
                  $.each(obj, function(i){
                    options += '<option value="'+obj[i].city_id+'">'+obj[i].city_name+'</option>';
                  });  
                }   
                else{
                    alert('No City added for '+selected_state);    
                }  
                $('.city_act').html(options); 
                $('.area_act').html('<option value="">Select Area</option>');                 
               }
           });
       }        
    });

	jQuery(".city_act").on('change',function () {
		// alert('success');
        selected_city = $.trim($('option:selected',this).text());
        selected_city_id = $('option:selected',this).val();
        form_data = {'city_name':selected_city,'city_id':selected_city_id};
        // alert(form_data);
        // alert(JSON.stringify(form_data));
        if(selected_state != 'Select City'){
	         $.ajax({
	               type: "POST",
	               url: "load_area.php?loadareafromdb=true",
	               data: form_data,
	               cache: false,
	               success: function(data) { 
	               	// alert(data);             
	                var obj = JSON.parse(data);
	                var options = '<option value="">Select Area</option>';   
	                if(obj.length!=0){               
	                  $.each(obj, function(i){
	                    options += '<option value="'+obj[i].area_id+'">'+obj[i].area_name+'</option>';
	                  });  
	                }   
	                else{
	                    alert('No Area added for '+selected_city);    
	                }  
	                $('.area_act').html(options);                  
	               }
	           });
	    }
       });


jQuery("#add_city").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#edit_city").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
jQuery("#add_college").submit(function(){ 

		var input = jQuery('#'+required_college);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
jQuery("#edit_college").submit(function(){ 

		var input = jQuery('#'+required_college);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
			if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s5').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
		if (document.getElementById('s6').selectedIndex < 1)
		{
			$('#s6').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s6').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		

//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});

	
jQuery("#add_paper_size").submit(function(){ 

		var input = jQuery('#'+required_papersize);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');
		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});

	jQuery("#edit_paper_size").submit(function(){ 

		var input = jQuery('#'+required_papersize);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');
		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#add_paper_side").submit(function(){ 

		var input = jQuery('#'+required_paperside);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');
		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
jQuery("#edit_paper_side").submit(function(){ 

		var input = jQuery('#'+required_paperside);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
			
			if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');
		 }

//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#add_paper_type").submit(function(){ 

		var input = jQuery('#'+required_papertype);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');
		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
jQuery("#edit_paper_type").submit(function(){ 

		var input = jQuery('#'+required_papertype);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
			
			if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');
		 }

//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
		
jQuery("#add_paper_print_type").submit(function(){ 

		var input = jQuery('#'+required_paperprinttype);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#edit_paper_print_type").submit(function(){ 

		var input = jQuery('#'+required_paperprinttype);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});

	jQuery("#add_cost_estimation").submit(function(){ 

		var input = jQuery('#'+required_cost_estimation);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_e').selectedIndex < 1)
		{
			$('#sel_e').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_e').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});

jQuery("#edit_cost_estimation").submit(function(){ 

		var input = jQuery('#'+required_cost_estimation);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		if (document.getElementById('sel_e').selectedIndex < 1)
		{
			$('#sel_e').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_e').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#add_project_printing_cost").submit(function(){ 

		var input = jQuery('#'+required_project_printing_cost);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			// $('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 // $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#edit_project_printing_cost").submit(function(){ 
		var input = jQuery('#'+required_project_printing_cost);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			// $('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 // $('.error_test').css('display','none');
			return true;
		}
	});
		
jQuery("#add_multicolor_copies").submit(function(){ 

		var input = jQuery('#'+required_multicolor_copies);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#edit_multicolor_copies").submit(function(){ 
		var input = jQuery('#'+required_multicolor_copies);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#add_multicolor_printing_cost").submit(function(){ 
		var input = jQuery('#'+required_multicolor_printing_cost);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_e').selectedIndex < 1)
		{
			$('#sel_e').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_e').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			 $('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			  $('.error_test').css('display','none');
			return true;
		}		
	});
	jQuery("#edit_multicolor_printing_cost").submit(function(){ 
		var input = jQuery('#'+required_multicolor_printing_cost);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_e').selectedIndex < 1)
		{
			$('#sel_e').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_e').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			 $('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#add_binding_cost_estimation").submit(function(){ 

		var input = jQuery('#'+required_binding_cost_estimation);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});

	jQuery("#edit_cost_estimation_binding").submit(function(){ 

		var input = jQuery('#'+required_binding_cost_estimation);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				// $('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				// $('.error_test').css('display','none');
			}
	//  select field

		if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			// $('.error_test').css('display','block');
		}
		else { 
			$('#sel_a').removeClass('error_input_field'); 
			// $('.error_test').css('display','none');
		}
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			// $('.error_test').css('display','block');
		}
		else { 
			$('#sel_b').removeClass('error_input_field'); 
			// $('.error_test').css('display','none');
		}
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
jQuery("#edit_orders").submit(function(){ 
		for(var i = 0 ; i<required_edit_orders.length;i++ ){
			var input = jQuery('#'+required_edit_orders[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
		//newly added by kalai on 28/07/16 for student field validation
		if($('#order_student').length){
			for(var i = 0 ; i<required_edit_orders_student.length;i++ ){
				var input_student = jQuery('#'+required_edit_orders_student[i]);		
				if ((input_student.val() == "")) 
				{
					input_student.addClass("error_input_field");
					$('.error_test').css('display','block');
				} else {
					input_student.removeClass("error_input_field");
					$('.error_test').css('display','none'); }
			}
			if (document.getElementById('order_shipping_college').selectedIndex < 1)
			{
				$('#order_shipping_college').addClass('error_input_field');
				$('.error_test').css('display','block');
			}
			else { $('#order_shipping_college').removeClass('error_input_field');
				$('.error_test').css('display','none');  
			}
		}
			
	//  select field
	 var mobile=$('#phone').val().length;
     			if(mobile<=9){
    			$('#phone').addClass("error_input_field_phone");
 				}
 				else {
 				$('#phone').removeClass("error_input_field_phone");
 				}
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email.val())) {
		 	forget_email.addClass("error_input_field_email");
	  	}else{
	  		forget_email.removeClass("error_input_field_email");
	  	}
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_email').css('display','none');
		$('.error_phone').css('display','none');
		forget_email.removeClass("error_input_field_email");
			$('#phone').removeClass("error_input_field_phone");
			return false;
		}
		else {
			if(jQuery(":input").hasClass("error_input_field_email"))  {
				$('.error_test').css('display','none');
				$('.error_phone').css('display','none');
				$('.error_email').css('display','block');
				$('#phone').removeClass("error_input_field_phone");
				return false;
			}
			
			else {
				if(jQuery(":input").hasClass("error_input_field_phone"))  {
				$('.error_test').css('display','none');
				$('.error_email').css('display','none');
				$('.error_phone').css('display','block');
				return false;
			}
			else {
			errornotice.hide();
			$('.error_phone').css('display','none');
			return true;
			}
			}
		}
	});
	
jQuery("#edit_order_details").submit(function(){ 
		for(var i = 0 ; i<required_edit_order_details.length;i++ ){
			var input = jQuery('#'+required_edit_order_details[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
				if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sd').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('sel_e').selectedIndex < 1)
		{
			$('#sel_e').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_e').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			return false;
		} else {
			errornotice.hide();
			 
			return true;
		}
	});
		jQuery("#edit_track_order").submit(function(){ 

		var input = jQuery('#'+required_edit_track_order);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	
jQuery("#add_offer_zone").submit(function(){ 
	for(var i = 0 ; i<required_add_offer_zone.length;i++ ){
		var input = jQuery('#'+required_add_offer_zone[i]);
		var input_selector ='#'+required_add_offer_zone[i];
		var ext = $("#OfferzoneImage").val().split('.').pop().toLowerCase();
		if ((input.val() != "")) 
			{
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); 
				
				//  select field
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  
			
				if($('#offerzonetitle').val()!=''){
					if($("#OfferzoneImage")[0].files[0]){
						if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
						    $("#OfferzoneImage").addClass("error_input_field");
						    $('.error_test').css('display','none');
							$('.error_extension').css('display','block');
						}
						else{
							$("#OfferzoneImage").removeClass("error_input_field");
							$('.error_test').css('display','none');
							$('.error_image,.error_extension').css('display','none');
						}	
					}	
					else{
						$("#OfferzoneImage").addClass("error_input_field");
						$('.error_test').css('display','none');
						$('.error_image').css('display','block');
					}
				}
				else{
					input.addClass("error_input_field");
					$('.error_test').css('display','none');
				}
				}			
			} else {
				input.addClass("error_input_field");
				$('.error_test').css('display','block'); 
			}
	}
			
	
		
	//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {	
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#edit_offer_zone").submit(function(){ 
		
			for(var i = 0 ; i<required_edit_offer_zone.length;i++ ){
			var input = jQuery('#'+required_add_offer_zone[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}			
	//  select field
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});	
		jQuery("#customer_offer").submit(function(){ 	
			for(var i = 0 ; i<required_customer_offer.length;i++ ){
			var input = jQuery('#'+required_customer_offer[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test_off').css('display','block');
				 $('.error_test_offer').css('display','none');
			} else {
				input.removeClass("error_input_field");
				$('.error_test_off').css('display','none'); 
				 $('.error_test_offer').css('display','none');
				}
			}		
			if($('#filterstartdate').val() !='' && $('#filterenddate').val() == ''){
				$('#filterenddate').addClass("error_input_field");
				$('.error_test_off').css('display','block');
				$('.error_test_offer').css('display','none');
			}
			else{
				$('#filterenddate').removeClass("error_input_field");
				$('.error_test_off').css('display','none'); 
				$('.error_test_offer').css('display','none');
			}
			if($('#filterenddate').val() !='' && $('#filterstartdate').val() == ''){
				$('#filterstartdate').addClass("error_input_field");
				$('.error_test_off').css('display','block');
				$('.error_test_offer').css('display','none');
			}
			else{
				$('#filterstartdate').removeClass("error_input_field");
				$('.error_test_off').css('display','none'); 
				$('.error_test_offer').css('display','none');
			}

			if($('#filterstartdate').val()!="" && $('#filterenddate').val()!=""){
				startdate= $('#filterstartdate').val().split('/');
				startdate = startdate[1]+"/"+startdate[0]+"/"+startdate[2];
				enddate= $('#filterenddate').val().split('/');
				enddate = enddate[1]+"/"+enddate[0]+"/"+enddate[2];
				if ((Date.parse(enddate) <= Date.parse(startdate))) {
			        $('#filterenddate').addClass("error_input_field_date");
				    $('.error_date').css('display','block');
			    }
			    else {
					$('#filterenddate').removeClass("error_input_field_date");					
					$('.error_date').css('display','none');
				}
			}

	//  select field
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test_off').css('display','block');
			$('.error_test_offer').css('display','none');
			$('.error_date').css('display','none');
			return false;
		} 
		else if(jQuery('#filterenddate').hasClass("error_input_field_date"))  {		
				$('.error_test_off').css('display','none');
				$('.error_test_offer').css('display','none');
				$('.error_date').css('display','block');
				return false;
		}	
		else {
			errornotice.hide();
			 $('.error_test_off').css('display','none');
			 $('.error_test_offer').css('display','none');
			 $('.error_date').css('display','none');
			return true;
		}
	});	
	jQuery(".customer_check").click(function(){ 
		if($('.offer_checkbox:checked').length ==0) {
		$('.error_test_offer').css('display','block');
		$('.error_test_off').css('display','none');
		return false;
		}else{
			errornotice.hide();
			 $('.error_test_offer').css('display','none');
			 $('.error_test_off').css('display','none');
			return true;
		}
	});
	
	jQuery("#add_cabin_system_details").submit(function(){ 
		       var input = jQuery('#'+required_cabin_system_details);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
 	if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
	 if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});	
	jQuery("#edit_cabin_system_details").submit(function(){ 

		var input = jQuery('#'+required_cabin_system_details);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
 	if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
	 if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});
	jQuery("#add_cabin_schedule_time").submit(function(){ 	    
		for(var i = 0 ; i<required_cabin_schedule_time.length;i++ ) {
			var input = jQuery('#'+required_cabin_schedule_time[i]);
			if (input.val() == "")		 
				{
					input.addClass("error_input_field");	
	
					$('.error_test').css('display','block');
				} else {
					input.removeClass("error_input_field");
					$('.error_test').css('display','none');
			}
		}			
		//  select field	
		if (document.getElementById('sel_a').selectedIndex < 1)
			{
				$('#sel_a').addClass('error_input_field');
				$('.error_test').css('display','block');
			}
			else { $('#sel_a').removeClass('error_input_field');
			$('.error_test').css('display','none');
	
			 }
	 	if (document.getElementById('sel_b').selectedIndex < 1)
			{
				$('#sel_b').addClass('error_input_field');
				$('.error_test').css('display','block');
			}
			else { $('#sel_b').removeClass('error_input_field');
			$('.error_test').css('display','none');
	
			 }
		if($('#schedule_time_start').val()!="" && $('#schedule_time_end').val()!=""){
			start_time = $('#schedule_time_start').val();
			end_time = $('#schedule_time_end').val();
			start_time_change_format = ConvertTimeformat("24", start_time); 
			end_time_change_format = ConvertTimeformat("24", end_time); 
			if(end_time_change_format < start_time_change_format || end_time_change_format == start_time_change_format){
				$('#schedule_time_end').addClass("error_input_field_time");	
					$('.error_time').css('display','block');}
					 else {
					input.removeClass("error_input_field_time");					
					$('.error_time').css('display','none');
			}
			}
		
		if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_time').css('display','none');
			return false;
		}
		else if(jQuery(":input").hasClass("error_input_field_time"))  {
			
				$('.error_test').css('display','none');
				$('.error_time').css('display','block');
				return false;
			}		
			else {
			errornotice.hide();
			$('.error_time').css('display','none');
			$('.error_test').css('display','none');
			return true;
			}
			
		
	});	
		jQuery("#edit_cabin_schedule_time").submit(function(){ 	    
		for(var i = 0 ; i<required_cabin_schedule_time.length;i++ ) {
			var input = jQuery('#'+required_cabin_schedule_time[i]);
			if (input.val() == "")		 
				{
					input.addClass("error_input_field");	
	
					$('.error_test').css('display','block');
				} else {
					input.removeClass("error_input_field");
					$('.error_test').css('display','none');
			}
		}			
		//  select field	
		if (document.getElementById('sel_a').selectedIndex < 1)
			{
				$('#sel_a').addClass('error_input_field');
				$('.error_test').css('display','block');
			}
			else { $('#sel_a').removeClass('error_input_field');
			$('.error_test').css('display','none');
	
			 }
	 	if (document.getElementById('sel_b').selectedIndex < 1)
			{
				$('#sel_b').addClass('error_input_field');
				$('.error_test').css('display','block');
			}
			else { $('#sel_b').removeClass('error_input_field');
			$('.error_test').css('display','none');
	
			 }
		if($('#schedule_time_start').val()!="" && $('#schedule_time_end').val()!=""){
			start_time = $('#schedule_time_start').val();
			end_time = $('#schedule_time_end').val();
			start_time_change_format = ConvertTimeformat("24", start_time); 
			end_time_change_format = ConvertTimeformat("24", end_time); 
			if(end_time_change_format < start_time_change_format || end_time_change_format == start_time_change_format){
				$('#schedule_time_end').addClass("error_input_field_time");	
					$('.error_time').css('display','block');}
					 else {
					input.removeClass("error_input_field_time");					
					$('.error_time').css('display','none');
			}
			}
		
		if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_time').css('display','none');
			return false;
		}
		else if(jQuery(":input").hasClass("error_input_field_time"))  {
			
				$('.error_test').css('display','none');
				$('.error_time').css('display','block');
				return false;
			}		
			else {
			errornotice.hide();
			$('.error_time').css('display','none');
			$('.error_test').css('display','none');
			return true;
			}
			
		
	});
	jQuery("#add_cabin_holiday_details").submit(function(){ 
		for(var i = 0 ; i<required_cabin_holiday_details.length;i++ ){
		var input = jQuery('#'+required_cabin_holiday_details);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});	
	jQuery("#edit_cabin_holiday_details").submit(function(){ 
		for(var i = 0 ; i<required_cabin_holiday_details.length;i++ ){
		var input = jQuery('#'+required_cabin_holiday_details);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});	
	jQuery("#add_cabin_cost_estimation").submit(function(){ 
		
		var input = jQuery('#'+required_cabin_cost_estimation);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
 	if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
	if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
 	if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});	
	jQuery("#edit_cabin_cost_estimation").submit(function(){ 
		
		var input = jQuery('#'+required_cabin_cost_estimation);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
			
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
 	if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
	if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
 	if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	
	});	
jQuery("#edit_cabin_order_details").submit(function(){ 
	var cabin_order_email = jQuery('#email');
		for(var i = 0 ; i<required_cabin_order_details.length;i++ ){
			var input = jQuery('#'+required_cabin_order_details[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
			
			
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(cabin_order_email.val())) {
		 	cabin_order_email.addClass("error_input_field_email");
	  	}else{
	  		cabin_order_email.removeClass("error_input_field_email");
	  	}
	  	 var mobile=$('#phone').val().length;
     			if(mobile<=9){
    			$('#phone').addClass("error_input_field_phone");
 				}
 				else {
 				$('#phone').removeClass("error_input_field_phone");
 				}
	//  select field
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
	  	if($('#schedule_time_start').val()!="" && $('#schedule_time_end').val()!=""){
			start_time = $('#schedule_time_start').val();
			end_time = $('#schedule_time_end').val();
			start_time_change_format = ConvertTimeformat("24", start_time); 
			end_time_change_format = ConvertTimeformat("24", end_time); 
			if(end_time_change_format < start_time_change_format || end_time_change_format == start_time_change_format){
				$('#schedule_time_end').addClass("error_input_field_time");
				}
					 else {
				$('#schedule_time_end').removeClass("error_input_field_time");					
			}
			}
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_email').css('display','none');
		$('.error_phone').css('display','none');
		$('.error_time').css('display','none');
			return false;
		}
		else if(jQuery(":input").hasClass("error_input_field_email"))  {
				$('.error_test').css('display','none');
				$('.error_phone').css('display','none');
				$('.error_email').css('display','block');
				$('.error_time').css('display','none');
				return false;
			}
		
			else if(jQuery(":input").hasClass("error_input_field_phone"))  {
				$('.error_test').css('display','none');
				$('.error_email').css('display','none');
				$('.error_phone').css('display','block');
				$('.error_time').css('display','none');
				return false;
			}
				else if(jQuery(":input").hasClass("error_input_field_time"))  {
				$('.error_test').css('display','none');
				$('.error_email').css('display','none');
				$('.error_phone').css('display','none');
				$('.error_time').css('display','block');
				return false;
			}
			else {
			errornotice.hide();
			$('.error_phone').css('display','none');
			$('.error_time').css('display','none');
			$('.error_test').css('display','none');
			$('.error_email').css('display','none');
			return true;
			}		
		
	});
	jQuery("#edit_ohpsheet").submit(function(){ 

		var input = jQuery('#'+required_edit_ohpsheet);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','none');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
			$('.error_test').css('display','block');
			return false;
		} else {
			errornotice.hide();
			 $('.error_test').css('display','none');
			return true;
		}
	});

//  =======   Admin Login form Validation   =========

jQuery("#login-form").submit(function(){ 
	for(i=0;i<admin_login.length;i++) {
		var input = jQuery('#'+admin_login[i]);
		if ((input.val() == "")) 
		{
			input.addClass("error_input_field");
		} 
		else {
			input.removeClass("error_input_field");
			$('.error_test').css('display','none');
		}
	}
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") ) {
		$('.error_admin_login').css('display','block');
		$('.admin_login_error').css('display','none');
		return false;
	}
	else 
	{
		$('.error_admin_login').css('display','none');
		errornotice.hide();
		return true;
	}

});





$(".select_multiple_option a").on('click', function() {
  $(".mutliSelect ul").slideToggle('fast');
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {
	  // var title =  $(this).data("value") + ",";
	  var title =  $(this).next('span').text();
	  if ($(this).is(':checked')) {
	    var html = '<span title="' + title + '">' + title + '</span>';
	    $('.multiSel').append(html);
	    $(".hida").hide();
	  } else {
	    $('span[title="' + title + '"]').remove();
	  }
});





});
