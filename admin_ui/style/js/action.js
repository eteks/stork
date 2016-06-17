jQuery(document).ready(function() {
// 	Add_Area
	var required_myform = ["first-name","first-name1","first-name2","first-name3","first-name4","first-name5","first-name6","first-name7","phone","test","amount"];
	var edit_admin_users =["first-name","first-name1","phone","first-name4","test"];
	s5 = jQuery("#s5");
	s6 = jQuery("#s6");
	s7 = jQuery("#s7");
	s8 = jQuery("#s8");
	s9 = jQuery("#s9");
	forget_email=jQuery("#test");
	 
 test=jQuery("#test");
	errornotice = jQuery("#error");
	jQuery("#edit_admin_users").submit(function(){ 
		
		for(var i = 0 ; i<required_myform.length;i++ ){
			var input = jQuery('#'+edit_admin_users[i]);
			
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
	
jQuery("#edit_users").submit(function(){ 
		
		for(var i = 0 ; i<required_myform.length;i++ ){
			var input = jQuery('#'+required_myform[i]);
			if ((input.val() == "")) {
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			}
			else{
				input.removeClass("error_input_field");
				$('.error_test').css('display','none');
			}
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
		$('.edit_users').css('display','none');}
			if (document.getElementById('s7').selectedIndex < 1)
		{
			$('#s7').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s7').removeClass('error_input_field'); 
		$('.error_test').css('display','none');}
			if (document.getElementById('s8').selectedIndex < 1)
		{
			$('#s8').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s8').removeClass('error_input_field'); 
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

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','block');
			}
	//  select field

	if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s5').removeClass('error_input_field');
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
		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_test').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_test').css('display','block');
			}
	if (document.getElementById('s5').selectedIndex < 1)
		{
			$('#s5').addClass('error_input_field');
			$('.error_test').css('display','block');
		}
		else { $('#s5').removeClass('error_input_field');
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

jQuery("#add_college").submit(function(){ 

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

		var input = jQuery('#'+required_myform);
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
		else { $('#s5').removeClass('error_input_field');
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
		else { $('#s5').removeClass('error_input_field');
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
		else { $('#s5').removeClass('error_input_field');
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

		var input = jQuery('#'+required_myform);
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
		else { $('#s5').removeClass('error_input_field');
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

		var input = jQuery('#'+required_myform);
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
		else { $('#s5').removeClass('error_input_field');
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

	});
