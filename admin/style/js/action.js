jQuery(document).ready(function() {

	var required_area =["areaname"];
	var required_edit_admin_users =["username","password","phone","test"];
	var required_add_offer_zone =["offerzonetitle","offerzoneimage"];
	// var required_edit_offer_zone =["offerzonetitle","offerzoneimage"];
	var required_edit_offer_zone =["offerzonetitle"];
	var required_edit_users =["username","password","firstname","test","dob","address","phone"];
	var required_myform =["areaname"];
	var admin_login=["admin_username","admin_password"];
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
	var required_edit_order_details =["orderid","pages","colorprintpage","comments","amount"];
	var required_edit_track_order =["dateofdelivered"];
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
		var input = jQuery('#'+required_area);
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

	
	jQuery(".state_act").on('change',function () {
		// alert('success');
        selected_state = $('option:selected',this).text();
        selected_state_id = $('option:selected',this).val();
        form_data = {'states_name':selected_state,'states_id':selected_state_id};
        // alert(form_data);
        // alert(JSON.stringify(form_data));
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
               }
           });
       });

	jQuery(".city_act").on('change',function () {
		// alert('success');
        selected_city = $('option:selected',this).text();
        selected_city_id = $('option:selected',this).val();
        form_data = {'city_name':selected_city,'city_id':selected_city_id};
        // alert(form_data);
        // alert(JSON.stringify(form_data));
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
		if ((input.val() == "" || input.val() == undefined)) 
			{	
				if(input_selector == "#offerzoneimage" && $('#offerzonetitle').val()!='' &&  $('#sel_a').val()!=''){
					if($("#OfferzoneImage")[0].files[0]){
						if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
						    $("#OfferzoneImage").addClass("error_input_field");
							$('.error_extension').css('display','block');
						}
						else{
							$("#OfferzoneImage").removeClass("error_input_field");
							$('.error_image,.error_extension').css('display','none');
						}	
					}	
					else{
						$("#OfferzoneImage").addClass("error_input_field");
						$('.error_image').css('display','block');
					}
				}
				else{
					input.addClass("error_input_field");
					$('.error_test').css('display','block');
				}			
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

});
