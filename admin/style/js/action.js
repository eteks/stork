jQuery(document).ready(function() {
	required_myform = ["cat"];
	required_adminusers=["category1","category2","category3","category4"];
	required_editusers=["cat1","cat2","cat3","cat4","cat5"];
	category = jQuery("#category");
	errornotice = jQuery("#error");
	
jQuery("#myform").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_add_state').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_add_state').css('display','block');
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
			$('.error_add_state').css('display','block');
		}
		else { $('#category').removeClass('error_input_field');
		$('.error_add_state').css('display','block');

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
		var input = jQuery('#'+"state_name");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_edit_state').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_edit_state').css('display','block');
			}
	
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});

jQuery(".myform").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_add_area').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_add_area').css('display','none');
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
		}
		else { $('#category').removeClass('error_input_field'); }
		if (document.getElementById('category1').selectedIndex < 1)
		{
			$('#category1').addClass('error_input_field');
		}
		else { $('#category1').removeClass('error_input_field'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
			return true;
		}
	});




jQuery(".edit_area_form").submit(function(){ 

		var input = jQuery('#'+"edit_state");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_area').css('display','block');
			} else {
				
				input.removeClass("error_input_field");
				$('.error_area').css('display','none');
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



jQuery("#myform").submit(function(){ 

		var input = jQuery('#'+"area_id");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_add_college').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_add_college').css('display','none');
			}
	//  select field

	if (document.getElementById('category2').selectedIndex < 1)
		{
			$('#category2').addClass('error_input_field');
		}
		else { $('#category2').removeClass('error_input_field'); }
		
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
				$('.error_add_paper_size').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_add_paper_size').css('display','none');
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
			$('.error_add_paper_size').css('display','block');
		}
		else { $('#category').removeClass('error_input_field');
		$('.error_add_paper_size').css('display','none');
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
jQuery(".edit_paper_size").submit(function(){ 

		var input = jQuery('#'+"edit_paper_size_form");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_edit_paper_size').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_edit_paper_size').css('display','none');
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
jQuery("#add_paper_side").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_add_paper_side').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_add_paper_side').css('display','none');
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
			$('.error_add_paper_side').css('display','block');
		}
		else { $('#category').removeClass('error_input_field');
		$('.error_add_paper_side').css('display','none');
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

jQuery(".edit_paper_side").submit(function(){ 

		var input = jQuery('#'+"edit_paperside_form");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_edit_paper_side').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_edit_paper_side').css('display','none');
			}

//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
jQuery(".edit_paper").submit(function(){ 

		var input = jQuery('#'+"edit_papertype_form");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
			} else {
				input.removeClass("error_input_field");
			}

//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
jQuery(".add_paperprinttype").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
			} else {
				input.removeClass("error_input_field");
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
		}
		else { $('#category').removeClass('error_input_field'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success"); 
			return true;
		}
	});
jQuery(".edit_paperprinttype").submit(function(){ 

		var input = jQuery('#'+"edit_paperprintform");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
			} else {
				input.removeClass("error_input_field");
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
		}
		else { $('#category').removeClass('error_input_field'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
jQuery(".add_cost_estimation").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_add_cost_estimation').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_add_cost_estimation').css('display','none');
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
			$('.error_add_cost_estimation').css('display','block');
		}
		else { $('#category').removeClass('error_input_field');
		$('.error_add_cost_estimation').css('display','none'); }

	if (document.getElementById('category1').selectedIndex < 1)
		{
			$('#category1').addClass('error_input_field');
			$('.error_add_cost_estimation').css('display','block');
		}
		else { $('#category1').removeClass('error_input_field'); 
	$('.error_add_cost_estimation').css('display','none');}
	if (document.getElementById('category2').selectedIndex < 1)
		{
			$('#category2').addClass('error_input_field');
			$('.error_add_cost_estimation').css('display','block');
		}
		else { $('#category2').removeClass('error_input_field');
		$('.error_add_cost_estimation').css('display','none'); }
	if (document.getElementById('category3').selectedIndex < 1)
		{
			$('#category3').addClass('error_input_field');
			$('.error_add_cost_estimation').css('display','block');
		}
		else { $('#category3').removeClass('error_input_field'); 
	$('.error_add_cost_estimation').css('display','none');}
	if (document.getElementById('category4').selectedIndex < 1)
		{
			$('#category4').addClass('error_input_field');
			$('.error_add_cost_estimation').css('display','block');
		}
		else { $('#category4').removeClass('error_input_field'); 
	$('.error_add_cost_estimation').css('display','none');}		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
		    $('#cat').keypress(function (event) {
            return isNumber(event, this)
        });
		      $("#amount").keypress(function (e) {

     if (e.which != 8 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {

               return false;
    }
   });
    });
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }   
	});
jQuery(".edit_cost_estimation").submit(function(){ 

		var input = jQuery('#'+required_myform);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_edit_cost_estimation').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_edit_cost_estimation').css('display','none');
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
			$('.error_edit_cost_estimation').css('display','block');
		}
		else { $('#category').removeClass('error_input_field');
		$('.error_edit_cost_estimation').css('display','none'); }
		if (document.getElementById('category1').selectedIndex < 1)
		{
			$('#category1').addClass('error_input_field');
			$('.error_edit_cost_estimation').css('display','block');
		}
		else { $('#category1').removeClass('error_input_field'); 
		$('.error_edit_cost_estimation').css('display','none');}
		if (document.getElementById('category2').selectedIndex < 1)
		{
			$('#category2').addClass('error_input_field');
			$('.error_edit_cost_estimation').css('display','block');
		}
		else { $('#categor2y').removeClass('error_input_field');
		$('.error_edit_cost_estimation').css('display','none'); }
		if (document.getElementById('category3').selectedIndex < 1)
		{
			$('#category3').addClass('error_input_field');
			$('.error_edit_cost_estimation').css('display','block');
		}
		else { $('#category3').removeClass('error_input_field');
		$('.error_edit_cost_estimation').css('display','none'); }
		if (document.getElementById('category4').selectedIndex < 1)
		{
			$('#category4').addClass('error_input_field');
			$('.error_edit_cost_estimation').css('display','block');
		}
		else { $('#category4').removeClass('error_input_field');
		$('.error_edit_cost_estimation').css('display','none'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
jQuery("#add_offer_zone").submit(function(){ 
alert('test');
		var input = jQuery('#'+"cat11");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_add_offer_zone').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_add_offer_zone').css('display','none');
			}
	//  select field

	if (document.getElementById('category').selectedIndex < 1)
		{
			$('#category').addClass('error_input_field');
			$('.error_add_offer_zone').css('display','block');
		}
		else { $('#category').removeClass('error_input_field');
		$('.error_add_offer_zone').css('display','none');
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
jQuery(".edit_offer_zone").submit(function(){ 

		var input = jQuery('#'+"edit_papertype_form");
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
				$('.error_edit_offer_zone').css('display','block');
			} else {
				input.removeClass("error_input_field");
				$('.error_edit_offer_zone').css('display','none');
			}

//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("select_error") ) {
			return false;
		} else {
			errornotice.hide();
			
			return true;
		}
	});
