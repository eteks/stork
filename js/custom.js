function error_popup(message){
	$('.error_popup_msg .success-alert span').text(message);
	$('.popup_fade').show();
	$('.error_popup_msg').show();
	document.body.style.overflow = 'hidden';
}




$(document).ready(function () { 
	required_login = ["username_email", "login_password"];
	required_forget = ["forget_email"];
	required_signup=["firstname","lastname","username","password","repassword","email","mobile","dob"];
	reg_email=jQuery("#email");
	forget_email=jQuery("#forget_email");
	print_type=jQuery("#print_type");
	print_side=jQuery("#print_side");
	paper_type=jQuery("#paper_type");
	paper_size=jQuery("#paper_size");
	errornotice = jQuery("#error");

		//  == Validation for Page range Format Start ==
  	// $('.clone').css('pointer-events', 'none');
	$(document).on('keyup','.paper_range',function() {
		// var path_range=$(this).attr('id');


		var page_range_code_array = [] ;
			$('.paper_range').each(function() { 
			   var code_id = $(this).attr('id');
		       page_range_code_array.push(code_id);
		    });
		// // alert(page_range_array);
		// for(i=0;i<page_range_array.length;i++) {

		for(i=0;i<page_range_code_array.length;i++) {	
			var range_path = jQuery('#'+page_range_code_array[i]);
			var inputVal=range_path.val();
		  	var num0to255Regex = new RegExp("^(\\s*\\d+\\s*\\-\\s*\\d+\\s*,?|\\s*\\d+\\s*,?)+$");
		  	if(!num0to255Regex.test(inputVal) && inputVal!=0) {
		  		// $('.page_range_error').css('display','block');
		  		// alert("page_range_error");
				$('.uploadbutton').css('pointer-events', 'none');
				$('.clone').css('pointer-events', 'none');
				$(range_path).addClass("error_print_booking_code");

			}
		 	else {
				$('.uploadbutton').css('pointer-events', 'auto');
				$(range_path).removeClass("error_print_booking_code");
				$('.uploadFile').each(function() {
					if($(this).val() <= 1) {
						$('.clone').css('pointer-events', 'none');
	   				}
	   				else {
						$('.clone').css('pointer-events', 'auto');
					}
				});
			} 	
	    }
	    if (jQuery(".paper_range").hasClass("error_print_booking_code")) {
		  	$('.page_range_error').css('display','block');
		  	return false;
	    }
	    else {
	    	$('.page_range_error').css('display','none');
		  	return true;
	    }

	});







	

	//  == Validation for Page range Keycode Start ==

	//  == Add and Remove Button Start ==

	// $('.remove').css('display','none');
	// $(document).on('click','.clone, .remove',function() {
	// 	var input_length=$('.paper_range').length;
	// 	if(input_length <= 1) {
	// 		$('.remove').css('display','none');
	// 		$('.uploadbutton').css('pointer-events', 'auto');
	//     	$('.page_range_error').css('display','none');
	// 		$('.clone').css('pointer-events', 'auto');
	// 	}
	// 	else {
	// 		$('.remove').css('display','block');
	// 	}
	// });
	// $(document).on('click','.clone',function() {
	// 	$('.uploadFile').each(function() {
	// 		if($(this).val() <= 1) {
	// 		$('.clone').css('pointer-events', 'none');
	//    		}
	// 	   	else {
	// 			$('.clone').css('pointer-events', 'auto');
	// 		}
	// 	});
	// });
	// $(document).on('click','.remove',function() {
	// 	$('.clone').css('pointer-events', 'auto');
	// });

	//if the letter is not digit then display error and don't type anything
   $(document).on('keypress','.paper_range',function (e) {
     
     if (e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
   });

	//  == Validation for Page range Keycode End ==

	// $(document).on('change','.uploadFile',function() {
	// 	var file_name= $(this).attr('id');
	// 	var file_path = jQuery('#'+file_name);
	//     var file_name_extension = file_path.val();
	//     // alert(file_name_extension);
	// 	 $(file_path).next().next().html( "<strong>"+file_name_extension+"</strong>" );
	// });

	jQuery("#login-form").submit(function(){ 
		for (i=0;i<required_login.length;i++) {
			var input = jQuery('#'+required_login[i]);
			if ((input.val() == "")) 
				{
					input.addClass("error_input_field");
				} else {
					input.removeClass("error_input_field");
				}
			}
	
			//if any inputs on the page have the class 'error_input_field' the form will not submit
			if (jQuery(":input").hasClass("error_input_field")  ) {
				return false;
			} else {
				errornotice.hide();
				return true;
			}
		});

	jQuery("#forgotpass-form").submit(function(){
		var input = jQuery('#'+required_forget);
		if ((input.val() == "")) 
		{
			input.addClass("error_input_field");
		} else {
			input.removeClass("error_input_field");
		}
		// Validate the e-mail.
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email.val())) {
			forget_email.addClass("error_input_field");
		}
		//if any inputs on the page have the class 'error_input_field' the form will not submit
		if (jQuery(":input").hasClass("error_input_field") ) {
			$('.forget_email_valid').css('display','block');
			return false;
		} else {
			errornotice.hide();
			$('.forget_email_valid').css('display','none');
			alert("success");
			return true;
		}
	});
		
	jQuery("#register-form").submit(function(){
		for(i=0;i<required_signup.length;i++) {
		var input = jQuery('#'+required_signup[i]);
		if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
			} else {
				input.removeClass("error_input_field");
			}
		}
		if($('.birthDay').val() == ''){
			$('#dob').addClass("error_input_field");
		}
		else{
			$('#dob').removeClass("error_input_field");
		}
		
		if($('#password').val() != ''){
			if($('#password').val() != $('#repassword').val()) {
				$('#repassword').addClass("error_input_field");
	        }
	        else {
				$('#repassword').removeClass("error_input_field");
	        }
       }

		// Validate the e-mail.
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
			reg_email.addClass("error_input_field");
		}
		
		var mobile=$('#mobile').val().length;
		
    	if(mobile<10) {
        	$('#mobile').addClass("error_input_field_phone");
     	}
  		else {
           	$('#mobile').removeClass("error_input_field_phone"); 
      	}
      	
      	// if(eval($("#captcha_original").val()) == $("#captcha").val()){
      	// 	$('#captcha').removeClass("error_input_field");
      	// }
      	// else{
      	// 	$('#captcha').addClass("error_input_field");
      	// }
      	
		//if any inputs on the page have the class 'error_input_field' the form will not submit
		if (jQuery(":input").hasClass("error_input_field") || $('#dob').hasClass("error_input_field") || $('#mobile').hasClass("error_input_field_phone")) {

			return false;
		}else {
			errornotice.hide();
			
			return true;
		}
	});
	

	// error popup message center alignment
	var height=$('.error_popup_msg').height();
    var width=$('.error_popup_msg').width();
    $('.error_popup_msg').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
	

		
	
	// upload file holder add button
	$('#register-form .add_btn').on('click',function(){
		var clone_content = $('#register-form .upload_file_holder:last').clone();
		clone_content.insertAfter($('#register-form .upload_file_holder:last'));
	});
	// upload file holder del button
	$('#register-form .del_btn').on('click',function(){
		if($('.upload_file_holder').length!=1){
			$('#register-form .upload_file_holder:last').remove();	
		}
		
	});
	// upload file holder add button
	// $(document).on('click','#print_booking_form .add_btn',function(){
	// 	if($('#print_booking_form .upload_file_holder:last .print_book_color_page_no').val() && $('#print_booking_form .upload_file_holder:last .uploadFile').val() != ''){
	// 		var clone_content = $('#print_booking_form .upload_file_holder:last').clone();
	// 		clone_content.find('.print_book_color_page_no').val('');
	// 		clone_content.insertAfter($('#print_booking_form .upload_file_holder:last'));
			
	// 	}
		
	// });
	// upload file holder del button
	// $('#print_booking_form .del_btn').on('click',function(){
	// 	alert($('.upload_file_holder').length);
	// 	if($('.upload_file_holder').length!=1){
	// 		$('#print_booking_form .upload_file_holder:last').remove();	
	// 	}
		
	// });
	
	//homepage option selection 
	$('#product-detail .print_book_user_type').click(function(){
		
		if($(this).val().trim() == 'stu'){
			$('.stu_area_college_holder').addClass('dn');
			$('.profession_state_area_holder').removeClass('dn');
		}
		
		else if($(this).val().trim() == 'pro'){
			$('.profession_state_area_holder').addClass('dn');
			$('.stu_area_college_holder').removeClass('dn');
		}
		
	});
	
	// close error popup when click ok button or popupfade
	$(document).on('click','.alert_btn,.cancel_btn',function(){
	  	$('.error_popup_msg').hide();
	  	$('.popup_fade').hide();
	  	document.body.style.overflow = 'auto';
	});
	
	// ajax function for college list
	$('.profession_state_area_holder #print_book_area_student').on('change',function(){
	 	var area_id = $(this).val();
		$.ajax({
           type: "POST",
           url: "ajax_functions.php",
           data:{'area_id':area_id,'area_data':'true'},
           cache: false,
           success: function(data) {
           	if(data){
           		$('#print_book_college').empty().append(data);
           		if($('#index_page_form #print_book_area_student').hasClass('error_border')){
           			$('#index_page_form #print_book_area_student').removeClass('error_border');
           		}
           	}else{
           		error_popup('No college found!');
           		$('#print_book_college').empty();
           	}
                
          }
       });
	});
	
	// ajax function for college list
	$('.stu_area_college_holder #print_book_state').on('change',function(){
	 	var state_id = $(this).val();
		$.ajax({
           type: "POST",
           url: "ajax_functions.php",
           data:{'state_id':state_id,'state_data':'true'},
           cache: false,
           success: function(data) {
           	if(data){
           		$('#print_book_area_professional').empty().append(data);
           	}else{
           		error_popup('No area found!');
           		$('#print_book_area_professional').empty();
           	}
                
          }
       });
	});
	
	
	// commented by muthu for future purpose
	// // ajax function for show college and area list
	// $('#index_page_form .popup_index .initial_city_name').on('change',function(){
	 	// var city_id = $(this).val();
		// $.ajax({
           // type: "POST",
           // url: "ajax_functions.php",
           // data:{'city_id':city_id,'city_data_for_college':'true'},
           // cache: false,
           // success: function(data) {
           	// if(data != ''){
           		// $('#index_page_form .no_college_found_error').addClass('dn');
           		// $('#print_book_college').empty().append('<option>Select your College/Area</option>'+data);
           	// }else{
           		// $('#index_page_form .no_college_found_error').removeClass('dn');
           		// $('#print_book_college').attr('disabled','disabled');
           	// }
//                 
          // }
       // });
       // $.ajax({
           // type: "POST",
           // url: "ajax_functions.php",
           // data:{'city_id':city_id,'city_data_for_area':'true'},
           // cache: false,
           // success: function(data) {
           	// if(data != ''){
           		// $('#index_page_form .popup_index .no_college_found_error').addClass('dn');
           		// $('#print_book_area_professional').empty().append('<option>Select your Area</option>'+data);
           	// }else{
           		// $('#index_page_form .no_college_found_error').removeClass('dn');
           		// $('#print_book_area_professional').attr('disabled','disabled');
           	// }
//                 
          // }
       // });
	// });
	
	// form submit when user is go button in index page
	$('.index_go_btn').on('click',function(){
		$('#index_page_form').submit();
	});
	
	
	//index page form validation
	$('#index_page_form').submit(function(){
			if($('#student').is(':checked')){
				if($('#print_book_area_student').val() == ''){
					$('#index_page_form #print_book_area_student').addClass('error_border');
					return false;
				}
				else if($('#print_book_college').val() == ''){
					$('#index_page_form #print_book_college').addClass('error_border');
					return false;
				}
				else{
					$('#index_page_form #print_book_area_student').removeClass('error_border');
					$('#index_page_form #print_book_college').removeClass('error_border');
					return true;
				}
			}
			else if($('#professional').is(':checked')){
				if($('#print_book_state').val() == ''){
					$('#index_page_form #print_book_state').addClass('error_border');
					return false;
				}
				else if($('#print_book_area_professional').val() == ''){
					$('#index_page_form #print_book_area_professional').addClass('error_border');
					return false;
				}
				else{
					$('#index_page_form #print_book_state').removeClass('error_border');
					$('#index_page_form #print_book_area_professional').removeClass('error_border');
					return true;
				}
			}
		});
		
		
	
	
	//find out cost per page for printing order using print type on multiple combination
	$('#print_booking_form .print_book_print_type,#print_booking_form .print_book_print_side,#print_booking_form .print_book_paper_size,#print_booking_form .print_book_paper_type').on('change',function(){
	 	var print_type = ($('#print_booking_form .print_book_print_type').val()?$('#print_booking_form .print_book_print_type').val():'');
	 	var print_side = ($('#print_booking_form .print_book_print_side').val()?$('#print_booking_form .print_book_print_side').val():'');
	 	var paper_size = ($('#print_booking_form .print_book_paper_size').val()?$('#print_booking_form .print_book_paper_size').val():'');
	 	var paper_type = ($('#print_booking_form .print_book_paper_type').val()?$('#print_booking_form .print_book_paper_type').val():'');
	 	//alert(print_type+'|'+print_side+'|'+paper_size+'|'+paper_type);
	 	if(print_type != '' && print_side != '' && paper_size != '' && paper_type !=''){
	 		$.ajax({
           		type: "POST",
           		url: "ajax_functions.php",
           		data:{'print_type_id':print_type,'print_side_id':print_side,'papar_size_id':paper_size,'paper_type_id':paper_type,'cost_estimation_per_page':'true'},
           		cache: false,
           		success: function(data) {
           			var per_page_amount = parseFloat(data);
           			if(per_page_amount){
           				$('#print_booking_form .per_page_costing').val(per_page_amount);
           			}
           			else{
           				error_popup('Printing option not available!');
           				$('#print_booking_form .print_book_print_type,#print_booking_form .print_book_print_side,#print_booking_form .print_book_paper_size,#print_booking_form .print_book_paper_type').prop('selectedIndex', 0);
					}
           			
          		}
       		});// end of ajax
	 	}//end of if condition
	});// end of event
	
	
	//file upload validation in print booking page
	$('#print_booking_form .uploadFile').change(function(){
    	var file = this.files[0];
    	name = file.name;
    	size = file.size;
    	type = file.type;
    	var ext = type.split('/');
    	if($.inArray(ext[1], ['pdf','doc','docx','msword','vnd.openxmlformats-officedocument.wordprocessingml.document']) == -1){
    		error_popup('Allowed pdf, doc, docx files only!');
    		return false;
    	}
    	else{
    		return true;
    	}
	});

	$(document).on('change','.uploadFile',function() {
		var file_name_section = $(this).val();
		var this_name = $(this);
		$('.file_name_box').each(function() {
			var file_name_box = $(this).val();
			
			if( file_name_box == file_name_section ) {
				alert("filename already exists");
				this_name.val('');
			}
			else {
				// changes
				// file_name_gallary.push(file_name_section);
			}
		});
	});




	// 	total cost amoutn display based on total no of pages and per page amount
	$('.print_total_no_of_pages').on('blur',function(){
		var perpageamount = parseFloat($('#print_booking_form .per_page_costing').val()?$('#print_booking_form .per_page_costing').val():'');
		var bindingamout = parseFloat($('#print_booking_form .print_book_binding_amount').val()?$('#print_booking_form .print_book_binding_amount').val():'0.00');
		var total_amount = parseFloat($(this).val());
		if(total_amount){
			if(perpageamount){
				$('.print_total_amount').val(parseFloat(Math.ceil( ((perpageamount*total_amount)+bindingamout) * 100 ) / 100).toFixed(2)).attr('readonly','readonly');
			}else{
				error_popup('Please select print type,print side,paper size,paper type!');
				$(this).val('');
			}
		}
		
	});
	
	// post from when click button and submit type
	$('.print_add_to_cart_btn').on('click',function(){
		$('#print_booking_form .submit_type').val('add_to_cart');
		$('#print_booking_form').submit();
	});
	
	// clear print booking form when clear button
	$('.print_add_to_cart_clear_btn').on('click',function(){
		$('#print_booking_form').find("input[type=text], textarea").val("");
		$('#print_booking_form').find("select").prop('selectedIndex', 0);
		if($('#print_booking_form').find("input[type=text], textarea,select,.uploadbutton").hasClass('error_print_booking_field')){
			$('#print_booking_form').find("input[type=text], textarea,select,.uploadbutton").removeClass('error_print_booking_field');
		}
		$('.error_print_booking').hide();
	});
	
	// form post when paynow button in check out page
	$(document).on('click','.check_out_payment',function(){
		$('#print_checkout_form').submit();
	});
	
	// remove item from cart 
	$(document).on('click','.ordered_item .cart_remove_item',function(){
		var session_id = $(this).parents('.ordered_item').find('.ordered_item_session_id').val();
		var order_details_id = $(this).parents('.ordered_item').find('.ordered_item_oreder_detail_id').val();
		if(session_id != '' && order_details_id != ''){
			$.ajax({
           		type: "POST",
           		url: "ajax_functions.php",
           		data:{'session_id':session_id,'order_details_id':order_details_id,'remove_order':'true'},
           		cache: false,
           		success: function(data) {
           			if(data == 'remove_success'){
           				location.reload();
           			}
          		}
       		});// end of ajax
		}
	});
	
	// address form clear when clear button in check out page
	$(document).on('click','.check_out_clear_btn',function(){
		$('.checkout_address').find("input[type=text], textarea").val("");
	});
	
	
	// update amount details based on quantity in check out page
	$(document).on('keyup','.ordered_item_quantity',function(){
		var amount = $(this).parents('.review_order_checkout').find('.oredered_item_amount').val();
		var quantity = $(this).val();
		var final_amount = 0;
		$(this).parents('.review_order_checkout').find('.check_out_subtotal_amount').html('<b>&#8377; </b>'+amount*quantity);
		$(this).parents('.review_order_checkout').find('.check_out_total_amount').html('<b>&#8377; </b>'+amount*quantity);
		$(this).parents('.review_order_checkout').find('.updated_oredered_item_amount').val(amount*quantity);
		$('.updated_oredered_item_amount').each(function(){
			final_amount += parseInt($(this).val());
		});
		$('.final_payment_amount_checkout').val(final_amount);
		$('.final_visible_amount_checkout_page').html('<b>&#8377; </b>'+final_amount);
		$('.final_visible_sub_amount_checkout_page').html('<b>&#8377; </b>'+final_amount);
	});
	
	// post form when click check button in print booking page and submit type
	$('.print_check_out_btn').on('click',function(){
		$('#print_booking_form .submit_type').val('add_to_checkout');
		$('#print_booking_form').submit();
	});
	
	// captcha genaration
 	var n1 = Math.round(Math.random() * 100 + 1);
    var n2 = Math.round(Math.random() * 100 + 1);
    $("#captcha_original").val(n1 + " + " + n2);
    $('#captcha_f_n').text(n1);
    $('#captcha_s_n').text(n2);
    
    //allowed numbers only at registration form
	$("#mobile").keypress(function (e) {
		if (e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
	
	//allowed charaters only at registration form
	$("#firstname,#lastname").keypress(function (e) {
		if(e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 97 /* a */ || e.which > 122 /* z */)&& (e.which < 65 /* a */ || e.which > 90 /* z */)) {
        	e.preventDefault();
    	}
	});
	
	//disable cut,copy,paste
	$(document).bind('copy paste cut', function (e) {
        e.preventDefault(); 
        return false;
    });

	var id = '#popup_index';
	var maskHeight = $(document).height();
	$('#background_shadow').css({'height':maskHeight});
	$('#background_shadow').fadeTo("slow",0.6);	
	var winH = $(window).height();
	var winW = $(window).width();
	$(id).css('top',  winH/2-$(id).height()/2);
	$(id).css('left', winW/2-$(id).width()/2);
	$(id).fadeIn(500); 	

	//  To display binding type dropdown

	$('#radio_yes').click(function() {
	    $('#binding_type').prop('selectedIndex',0);
		$('.display_binding_type').slideDown();
	});
	$('#radio_no').click(function() {
		$('#binding_type').prop('selectedIndex',0);
		$('.display_binding_type').slideUp();
		$('.display_page_type').css('display','none');
		$('.cover_section_holder').slideUp();
		$('.print_page_option').slideUp();
		$('#page_radio_no').prop('checked',true);
		$('.upload_section').css('width','76%');

	});

	//  To display cover option

	$('#page_radio_yes').click(function() {
		$('.cover_section_holder').slideDown();
		$('.upload_section').css('width','100%');
		$('#cover_file_name').val('');
	});
	$('#page_radio_no').click(function() {
		$('.cover_section_holder').slideUp();
		$('.upload_section').css('width','100%');
	});
	
	$('.upload_section').css('width','76%');

	//  To display upload fileds based on binding type

	$('#binding_type').change(function() {
		if ($('#binding_type').val() == 'soft_binding'){
			// alert("test");
			// $('.display_upload').addClass('active_upload');
			$('.display_page_type').fadeIn('fast');
			// $('.display_normal_file').css('display','none');
			$('.upload_section').css('width','100%');
			$('.print_page_option').slideDown();
			$('#page_radio_no').prop('checked',true);
		}
		else{ 
			$('.display_page_type').fadeOut('fast');
			// $('.display_normal_file').css('display','block');
			$('.upload_section').css('width','76%');
			$('.print_page_option').slideUp();
			$('.cover_section_holder').slideUp();
			$('#page_radio_no').prop('checked',true);	
		}
	});

	//  == Add input box when selected white & black and color Start ==

	$('#print_type').on('change',function() {
		var selected_type = $('#print_type option:selected').text().toLowerCase();
		$('#radio_no').prop('checked',true);
		$('#binding_type').slideUp();
		$('#page_radio_no').prop('checked',true);
		$('#page_radio_no').slideUp();
		$('#cover_file_name').val('');
		
		$('.cover_section_holder').slideUp();
		if( selected_type == "color with black & white" ) {
			$('.display_paper_range').css('display','block');
			$('.display_paper_range .file_range_holder').each (function() {
				$(this).children('.display_normal_file').val('');
				$(this).children('.paper_range').val('');
			});
		}

		else {
			$('.display_paper_range').css('display','none');
		}
	});
	//  == Add input box when selected white & black and color End ==

	$(document).on('click','.remove_upload:last',function() {
		$(this).parents('.upload_section').prev().find('.clone_upload').css('display','inline');
	});
	$('.remove_upload').css('pointer-events','none');

	$(document).on('click','.remove_upload',function() {
		var upload_section_length = $('.upload_section').length;
		if(upload_section_length <= 2) {
			$('.remove_upload').css('pointer-events','none');
		}
		else {
			$('.remove_upload').css('pointer-events','auto');
		}

	});

	//  ==  Clone and Remove Start ==

	var cloneIndex = $(".upload_clone_holder").length;
	function clone(){
			
			$(this).css('display','none');
			$('.remove_upload').css('pointer-events','auto');
	  		var path_section_clone = $(this).parents('.main_section_input_holder');
			path_section_clone.find('.upload_section:last').clone()
	  		.val("")
	  		.insertAfter('.upload_section:last')
	  		.attr("id", "upload_section" +  cloneIndex)
	  		.data("sectionvalue",cloneIndex);
	  		// path_section_clone.children('.upload_section').find('.clone_upload').css('display','inline');
	  		var clone_button = path_section_clone.children('#upload_section'+cloneIndex).find('.clone_upload');
	  		clone_button.attr("id","clone_upload"+cloneIndex);
	  		clone_button.css('display','inline');
	  		var remove_button = path_section_clone.children('#upload_section'+cloneIndex).find('.remove_upload');
	  		remove_button.attr("id","remove_upload"+cloneIndex);
	  		var input_file = path_section_clone.children('#upload_section'+cloneIndex).find('.uploadFile');
	  		input_file.val("");
	  		input_file.attr("id","file_upload"+cloneIndex);
  		  	var input_file = path_section_clone.children('#upload_section'+cloneIndex).find('.uploadbutton');
		  	input_file.attr("id","uploadTrigger"+cloneIndex);
	  	  	var input_file = path_section_clone.children('#upload_section'+cloneIndex).find('.file_name_box');
		  	input_file.val("No file selected")
	  		input_file.attr("id","file_name_box"+cloneIndex)
	  		input_file.data("filevalue",cloneIndex);

	  		//  Paper_range field clon section
	    	if($('.display_paper_range').css('display')=='block') {
			  	var path_file_section_clone = $(this).parents('.main_section_input_holder');
				path_file_section_clone.find('.display_paper_range:last').clone()
			  	.val("")
			  	.insertAfter('.display_paper_range:last')
			  	.attr("id", "display_paper_range" +  cloneIndex)
			  	.data("sectionvalue",cloneIndex);
			  	var input_file = path_file_section_clone.children('#display_paper_range'+ cloneIndex).find('.paper_range');
			 	input_file.val("");
			   	input_file.attr("id","print_page_range"+ cloneIndex);
			   	var input_file = path_file_section_clone.children('#display_paper_range'+cloneIndex).find('.display_normal_file');
			  	input_file.val("No file selected")
			  	input_file.attr("id","normal_file"+cloneIndex)
			  	input_file.data("filevalue",cloneIndex);
	  		}
	  	cloneIndex++;
	}
	function remove(){
	 	var path_section_remove1 = $(this).parents('.upload_section').attr('id');
	 	var path_section_remove1_id = jQuery('#'+path_section_remove1);
		var data_value_section = path_section_remove1_id.data('sectionvalue');
		if($('.display_paper_range').css('display')=='block') {
		 	$(this).parents('.main_section_input_holder').find('.display_paper_range').each(function(){
				var cloned_file_remove = $(this).data('sectionvalue');
				if(cloned_file_remove==data_value_section){
					$(this).remove();
				}
			});
		}
		path_section_remove1_id.remove();

	}
	$(document).on('click','.clone_upload', clone);
	$(document).on('click','.remove_upload', remove);

	//  ==   Clone and Remove End ==

	
	// customized browse button in order page Start

	$(document).on('click','.uploadbutton',function(){
		var path_file=$(this).attr('id');
		// path_file.click();
		// var path_id = path_file.attr('id');
		var file_path = jQuery('#'+path_file);
		file_path.prev().click();
		// file_path.click();
	});


	$(document).on('click','.cover_uploadbutton',function(){
		$(this).prev().click();
	});
	$(document).on('change','.upload_cover_File',function() {
		var cover_browse_value = $(this).val();
		$('#cover_file_name').val(cover_browse_value);
	});

	// customized browse button in order page End

	// customized browse button in order page End


	$(document).on('change','.uploadFile',function(e) { 
		var select = document.getElementById("normal_file");
		var filename= [];
		$('.uploadFile').each(function() {
			var file_name_holder = $(this).val();
			filename.push(file_name_holder);
		});
		$("#normal_file option[class='new']").remove();
		for(var i = 0; i < filename.length; i++) {
		    var opt = filename[i];
		    var el = document.createElement("option");
		    el.className = "new";
		    el.textContent = opt;
		    el.value = opt;
		    select.add(el);
		}
	});


	$(document).on('change','.uploadFile',function(e) { 
		var select1 = document.getElementById("content_file");
		var content_filename = [];
		$('.uploadFile').each(function() {
			var file_name_content = $(this).attr('id');
			var content_file_id = jQuery('#'+file_name_content);
			var content_file = content_file_id.parents('.upload_clone_holder').find('.display_page_type option:selected').text();
			if(content_file=='Content') {
				file_content_holder=$(this).val();
				content_filename.push(file_content_holder);
			}
			else {
				
			}
		});
		$("#content_file option[class='new_content']").remove();
		for(var i = 0; i < content_filename.length; i++) {
		    var opt1 = content_filename[i];
		    var el1 = document.createElement("option");
		    el1.className = "new_content";
		    el1.textContent = opt1;
		    el1.value = opt1;
		    select1.add(el1);
		}
	});

	$('.display_page_type').on('change',function () {
		var change_clear = $(this).parents('.upload_clone_holder').find('.uploadFile');
		var change_clear_input = $(this).parents('.upload_clone_holder').find('.file_name_box');
		if(change_clear.val() == '') {
			$('.clone_upload').css('pointer-events', 'auto');
	 	}
	 	else {
	 		var change_value_name=change_clear.val();
	 		if($(this).text() != 'Content') {
				if($("#content_file option[class='new_content']").text() == change_value_name) {
					$('#content_file option[class="new_content"]').remove();
				}
				else {

				}
			}
			else {
				change_clear.val('');
	 			change_clear_input.val('No file selected');
				$('.clone_upload').css('pointer-events', 'none');
			}
			change_clear.val('');
	 		change_clear_input.val('No file selected');
			$('.clone_upload').css('pointer-events', 'none');
	 	}


	});

	//  == Add and Remove Button Start ==

	$('.remove_upload').css('display','none');
	$(document).on('click','.clone_upload, .remove_upload',function() {
		var input_length=$('.uploadbutton').length;
		if(input_length <= 1) {
			$('.remove_upload').css('display','none');
			// $('.uploadbutton').css('pointer-events', 'auto');
		}
		else {
			$('.remove_upload').css('display','block');
		}
	});


	//  == Add and Remove Button End ==


	//  == Print Booking Empty Validation Start ==

	$(document).on('click','.clone_upload',function() {
		$('.clone_upload').css('pointer-events', 'none');

	});


	$(document).on('click','.remove_upload',function() {
		var last_section = $('.upload_section:last').find('.uploadFile');
		if(last_section.val() == '') {
			$('.clone_upload').css('pointer-events', 'none');
		}
		else {
			$('.clone_upload').css('pointer-events', 'auto');
		}
	});

	// Validaion for adding restriction to clone Start

	$('.clone_upload').css('pointer-events', 'none');
	$(document).on('change','.uploadFile',function() {
		if($(this).val()==''){
			$('.clone_upload').css('pointer-events', 'none');
		}
		else{
			var uploaded_file_name=$(this).val();
			var file_name_box_id = $(this).prev('.file_name_box').attr('id');
			var file_name_box = jQuery('#'+file_name_box_id);
			var data_file_name = file_name_box.data('filevalue');
			$(this).parents('.main_section_input_holder').find('.display_paper_range').each(function(){
				if($(this).find('.display_normal_file').data('filevalue')==data_file_name){
					$(this).find('.display_normal_file').val(uploaded_file_name);
				}
			});
			file_name_box.attr('value',uploaded_file_name);
			$('.clone_upload').css('pointer-events', 'auto');
		}
	});

	// Validaion for adding restriction to clone End

	


	jQuery(document).on('submit','#print_booking_form',function(){
	// jQuery('#print_booking_form').submit(function(){
		
		var input = jQuery('#'+"total_pages");
		if ((input.val() == "")) 
		{
			input.addClass("error_print_booking_field");
		} else {
			input.removeClass("error_print_booking_field");
		} // Total pages validation

		if($('.display_paper_range').css('display') == 'block') {
			$('.paper_range').each(function() { 
				if ($(this).val() == "") 
				{
					$(this).addClass("error_print_booking_field");
				} else {
					$(this).removeClass("error_print_booking_field");
				}
			});
		}
		else {
			$('.paper_range').removeClass("error_print_booking_field");
		} // page range validation
	
		if (document.getElementById('print_type').selectedIndex < 1){
			$('#print_type').addClass('error_print_booking_field');
		}
		else{ 
			$('#print_type').removeClass('error_print_booking_field');
		} // print type validation
		if (document.getElementById('print_side').selectedIndex < 1){
			$('#print_side').addClass('error_print_booking_field');
		}
		else{ 
			$('#print_side').removeClass('error_print_booking_field');
		} // paper side validation
		if (document.getElementById('paper_type').selectedIndex < 1){
			$('#paper_type').addClass('error_print_booking_field');
		}
		else{ 
			$('#paper_type').removeClass('error_print_booking_field');
		} // paper type validation
		if (document.getElementById('paper_size').selectedIndex < 1){
			$('#paper_size').addClass('error_print_booking_field');
		}
		else{ 
			$('#paper_size').removeClass('error_print_booking_field');
		} // paper size validation
		if($('.display_binding_type').css('display') == 'block') {
			if (document.getElementById('binding_type').selectedIndex < 1){
				$('#binding_type').addClass('error_print_booking_field');
			}
			else{ 
				$('#binding_type').removeClass('error_print_booking_field');
			}
		} 
		else {
			$('#binding_type').removeClass('error_print_booking_field');
		} // Binding type validation
		
		$('.upload_section').each(function(){
			var flie_upload_id=  $(this).find('.uploadFile');
			if(flie_upload_id.val() =='' || file_name_box == 'No file selected'){
				flie_upload_id.next('.uploadbutton').addClass('error_print_booking_field');
			}
			else {
				flie_upload_id.next('.uploadbutton').removeClass('error_print_booking_field');
			}
		});  
		if($('.cover_section_holder').css('display') == 'block') {
			if($('#upload_cover_File').val() == '') {
				$('#cover_uploadTrigger').addClass('error_print_booking_field');
			}
		 	else {
		 		$('#cover_uploadTrigger').removeClass('error_print_booking_field');
		 	}
		 }
		 else {
		 	$('#cover_uploadTrigger').removeClass('error_print_booking_field');
		 }


		if($('.display_paper_range').css('display') == 'block') {
			if($('.').css('display') == 'none') {
				$('.display_range_page').each(function() {
					if($(this).val() == '') {
						$(this).addClass('error_print_booking_field');
					}
					else {
						$(this).removeClass('error_print_booking_field');
					}
					
				});
			}
			else {
				$('.display_range_page').each(function() {
					if($(this).val() == '') {
						$(this).addClass('error_print_booking_field');
					}
					else {
						$(this).removeClass('error_print_booking_field');
					}
					
				});
			}
		}
		else {
			$('.display_normal_file').removeClass('error_print_booking_field');
			$('.display_range_page').removeClass('error_print_booking_field');
		} // File name validation - normal file, content file

		if($('.display_page_type').css('display') == 'block') {
			$('.display_page_type').each(function() {
				var id_page_type = $('option:selected',$(this)).index(); 
				if (id_page_type == '0'){
					$(this).addClass('error_print_booking_field');
				}
				else {
					$(this).removeClass('error_print_booking_field');	
				}
			});
		}
		else {
			$('.display_page_type').removeClass('error_print_booking_field');
		} // Page type validation

				
		if (jQuery(":input").hasClass("error_print_booking_field") || jQuery(".paper_range").hasClass("error_print_booking_code") || jQuery("select").hasClass("error_print_booking_field") || jQuery('.uploadbutton').hasClass('error_print_booking_field')) {
			// $('.error_print_booking').css('display','block');
			return false;
		}else {
			// $('.error_print_booking').css('display','none');
			errornotice.hide();
			return true;
		}
	});
	
	//  == Print Booking Empty Validation End ==
	
	// close city popup in index page
	$('.select_city_btn').on('click',function(){
		if($('#popup_index .initial_city_name').val() != ''){
			$('#background_shadow').hide();
			$('.popup_index').hide();
			document.body.style.overflow = "visible";
		} 
	});
	
	
		// ajax function for show college and area list when page loaded
	 	var city_id = $('#index_page_form .initial_city_name').val();
		$.ajax({
           type: "POST",
           url: "ajax_functions.php",
           data:{'city_id':city_id,'city_data_for_college':'true'},
           cache: false,
           success: function(data) {
           	if(data != ''){
           		$('#index_page_form .no_college_found_error').addClass('dn');
           		$('#print_book_college').empty().append('<option>Select your College/Area</option>'+data);
           	}else{
           		$('#index_page_form .no_college_found_error').removeClass('dn');
           		$('#print_book_college').attr('disabled','disabled');
           	}
                
          }
       });
       $.ajax({
           type: "POST",
           url: "ajax_functions.php",
           data:{'city_id':city_id,'city_data_for_area':'true'},
           cache: false,
           success: function(data) {
           	if(data != ''){
           		$('#index_page_form .popup_index .no_college_found_error').addClass('dn');
           		$('#print_book_area_professional').empty().append('<option>Select your Area</option>'+data);
           	}else{
           		$('#index_page_form .no_college_found_error').removeClass('dn');
           		$('#print_book_area_professional').attr('disabled','disabled');
           	}
                
          }
       });

	// get binding amount based on type
	$('#print_booking_form .print_book_binding_type').on('change',function(){
		var print_bind_type = $(this).val();
		if(print_bind_type != ''){
			$.ajax({
           		type: "POST",
           		url: "ajax_functions.php",
           		data:{'binding_type':print_bind_type,'binding_amount_value':'true'},
           		cache: false,
           		success: function(data) {
           			if(data != 'error_bind_amt'){
           				if($('#print_booking_form .print_total_no_of_pages').val() == ''){
           					$('#print_booking_form .print_book_binding_amount').val(parseFloat(Math.ceil((data) * 100 ) / 100).toFixed(2));
           				}else{
           					$('#print_booking_form .print_book_binding_amount').val(parseFloat(Math.ceil((data) * 100 ) / 100).toFixed(2));
           					$('#print_booking_form .print_total_amount').val(parseFloat(Math.ceil(((parseFloat($('#print_booking_form .per_page_costing').val())*parseFloat($('#print_booking_form .print_total_no_of_pages').val()))+parseFloat(data)) * 100 ) / 100).toFixed(2));
           				}
           			}else{
           				error_popup('Your selected binding option not available!');
           				$('#binding_type').prop('selectedIndex',0);
           			}
           			
          		}
       		});// end of ajax
		}
	});
	
	// user select binding option no after selecting yes with binding data
	$('#print_booking_form .print_booking_binding_required').on('change',function(){
		var binding_required = $(this).val();
		if(binding_required=='no'){
			var binding_amount = parseFloat($('#print_booking_form .print_book_binding_amount').val());
			var total_amount = parseFloat($('#print_booking_form .print_total_amount').val());
			$('#binding_type').prop('selectedIndex',0);
			$('.display_page_type').prop('selectedIndex',0).fadeOut('fast');
			$('.display_normal_file').css('display','block');
			$('.display_range_page').css('display','none');
			$('.upload_section').css('width','76%');
			if($('#print_booking_form .print_total_no_of_pages').val() == ''){
				$('#print_booking_form .print_book_binding_amount').val('0.00');
			}
			else{
				$('#print_booking_form .print_book_binding_amount').val('0.00');
				$('#print_booking_form .print_total_amount').val(parseFloat(Math.ceil((total_amount-binding_amount) * 100 ) / 100).toFixed(2));
			}
		}
	});
});  
