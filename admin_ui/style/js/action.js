jQuery(document).ready(function() {
// 	Add_Area
	
	var required_edit_admin_users =["username","password","phone","test"];
	var required_offer_zone =["OfferzoneTitle","OfferzoneImage"];
	var required_edit_users =["username","password","firstname","lastname","email","dob","address","mobile"];
	var required_myform =["areaname"];
	var required_state =["statename"];
	var required_college =["collegename"];
	var required_papersize =["papersize"];
	var required_paperside =["paperside"];
	var required_papertype =["papertype"];
	var required_paperprinttype =["paperprinttype"];
	var required_edit_orders =["customername","",""];
	sel_a = jQuery("#sel_a");
	sel_b = jQuery("#sel_b");
	sel_c = jQuery("#sel_c");
	sel_d = jQuery("#sel_d");
	sel_e = jQuery("#sel_e");
	forget_email=jQuery("#test");
	 
 test=jQuery("#test");
	errornotice = jQuery("#error");
	jQuery("#edit_admin_users").submit(function(){ 
		
		for(var i = 0 ; i<required_edit_admin_users.length;i++ ){
			var input = jQuery('#'+required_edit_admin_users[i]);
			
			if ((input.val() == "")) {
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			}
			else{
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
				
			}
		}
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email.val())) {
  			 	forget_email.addClass("error_input_field");
  			 	$('.error_test').css('display','block');
			 }
		
		 	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { 
			$('#sel_a').removeClass('error_input_field');
			$('.error_test').css('display','none'); 
		}
		
		if (document.getElementById('sel_b').selectedIndex < 1)
		{
			$('#sel_b').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_b').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
		
			return true;
		}
	});
	
jQuery("#edit_users").submit(function(){ 
		
		for(var i = 0 ; i<required_edit_users.length;i++ ){
			var input = jQuery('#'+required_edit_users[i]);
			if ((input.val() == "")) {
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			}
			else{
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
		}
	
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
		$('.edit_users').css('display','none');}
			if (document.getElementById('sel_c').selectedIndex < 1)
		{
			$('#sel_c').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_c').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
			if (document.getElementById('sel_d').selectedIndex < 1)
		{
			$('#sel_d').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_d').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
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
				$('.error_test').css('display','block');
			}
	//  select field

	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','block');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
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
				$('.error_test').css('display','block');
			}
	if (document.getElementById('sel_a').selectedIndex < 1)
		{
			$('#sel_a').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel_a').removeClass('error_input_field');
		$('.error_test').css('display','block');

		 }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") ) {
			return false;
		} else {
			errornotice.hide();
			
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
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
			return true;
		}
	});


jQuery("#edit_area").submit(function(){ 

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
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
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

	if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s5').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		
		if (document.getElementById('s6').selectedIndex < 1)
		{
			$('#s6').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s6').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			 
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
		
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
		
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
		
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
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
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});

	jQuery("#add_cost_estimation").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			
	//  select field

	if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s5').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('s6').selectedIndex < 1)
		{
			$('#s6').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s6').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('s7').selectedIndex < 1)
		{
			$('#s7').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s7').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		if (document.getElementById('s8').selectedIndex < 1)
		{
			$('#s8').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s8').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('s9').selectedIndex < 1)
		{
			$('#s9').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s9').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
jQuery("#edit_cost_estimation").submit(function(){ 

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

	if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#sel1').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		if (document.getElementById('s6').selectedIndex < 1)
		{
			$('#s6').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s6').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
		if (document.getElementById('s7').selectedIndex < 1)
		{
			$('#s7').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s7').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		if (document.getElementById('s8').selectedIndex < 1)
		{
			$('#s8').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s8').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		if (document.getElementById('s9').selectedIndex < 1)
		{
			$('#s9').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s9').removeClass('error_input_field');
		$('.error_test').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
jQuery("#edit_orders").submit(function(){ 
		for(var i = 0 ; i<required_myform.length;i++ ){
			var input = jQuery('#'+required_myform[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
			
	//  select field

	if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s5').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('s6').selectedIndex < 1)
		{
			$('#s6').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s6').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('s7').selectedIndex < 1)
		{
			$('#s7').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s7').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
jQuery("#edit_order_details").submit(function(){ 
		for(var i = 0 ; i<required_myform.length;i++ ){
			var input = jQuery('#'+required_myform[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
			
	//  select field

	if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s5').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('s6').selectedIndex < 1)
		{
			$('#s6').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s6').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			if (document.getElementById('s7').selectedIndex < 1)
		{
			$('#s7').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s7').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
				if (document.getElementById('s8').selectedIndex < 1)
		{
			$('#s8').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s8').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
				if (document.getElementById('s9').selectedIndex < 1)
		{
			$('#s9').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s9').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});

jQuery("#add_offer_zone").submit(function(){ 
		for(var i = 0 ; i<required_offer_zone.length;i++ ){
			var input = jQuery('#'+required_offer_zone[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
			
	//  select field

	if (document.getElementById('OfferzoneStatus').selectedIndex < 1)
		{
			$('#OfferzoneStatus').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#OfferzoneStatus').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
	jQuery("#edit_offer_zone").submit(function(){ 
		for(var i = 0 ; i<required_offer_zone.length;i++ ){
			var input = jQuery('#'+required_offer_zone[i]);
		
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','none'); }
			}
			
	//  select field

	if (document.getElementById('OfferzoneStatus').selectedIndex < 1)
		{
			$('#OfferzoneStatus').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#OfferzoneStatus').removeClass('error_input_field');
		$('.error_test').css('display','none');  }
			
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
	
	});
