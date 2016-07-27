function error_popup(message){
	$('.error_popup_msg .success-alert span').text(message);
	$('.popup_fade').show();
	$('.error_popup_msg').show();
	document.body.style.overflow = 'hidden';
}
$(document).ready(function () { 
	var total_black_white_file_project = 0;
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
	footer_forget_email=jQuery("#footer_email");
	email=jQuery("#email");
 	test=jQuery("#test");
	errornotice = jQuery("#error");
	var required_footer =["footer_name","footer_email","message"];
   	// cabin booking form - field show & Hide
    $('#time-type').on('change', function() {
 		if ( this.value == 'flexible'){
      		$("#flexi-show").show();
      	}
  		else{
	        $("#flexi-show").hide();
      	}
    });
	jQuery("#footer").submit(function(){ 
	// for empty field validation
	for(var i = 0 ; i<required_footer.length;i++ ){
		var input = jQuery('#'+required_footer[i]);
		if ((input.val() == "")) {
			input.addClass("error_input_field");
			 $('.error_test').css('display','block');		
		 }
		 else{
			 input.removeClass("error_input_field");
		 	 $('.error_test').css('display','none');
			
		 }
		}
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(footer_forget_email.val())) {
		footer_forget_email.addClass("error_input3_field_email");
			
		}
		else {
  		footer_forget_email.removeClass("error_input3_field_email");
  		}
  	
		if (jQuery(":input").hasClass("error_input_field") || jQuery("select").hasClass("error_input_field") ) {
		$('.error_test').css('display','block');
		$('.error_email3').css('display','none');
		return false;
	} else if (jQuery(":input").hasClass("error_input3_field_email")){
		 $('.error_test').css('display','none');
		 $('.error_email3').css('display','block');
		return false;
	}
	else {
		return true;
	}
		
	
	});

	//  == Validation for Page range Format Start ==

	$(document).on('keyup','.paper_range',function() {
		var page_range_code_array = [] ;
		$('.paper_range').each(function() { 
		   var code_id = $(this).attr('id');
	       page_range_code_array.push(code_id);
	    });
		for(i=0;i<page_range_code_array.length;i++) {	
			var range_path = jQuery('#'+page_range_code_array[i]);
			var inputVal=range_path.val();
		  	var num0to255Regex = new RegExp("^(\\s*\\d+\\s*\\-\\s*\\d+\\s*,?|\\s*\\d+\\s*,?)+$");
		  	if(!num0to255Regex.test(inputVal) && inputVal!=0) {
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
		  	return false;
	    }
	    else {
		  	return true;
	    }

	});
	//  == Validation for Page range Format End ==

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
		else {
			forget_email.removeClass("error_input_field");
		}
		//if any inputs on the page have the class 'error_input_field' the form will not submit
		if (jQuery(":input").hasClass("error_input_field") ) {
			return false;
		} else {
			errornotice.hide();
			return true;
		}
	});
	
	// captcha genaration
	function addition_captcha() {
	 	var n1 = Math.round(Math.random() * 100 + 1);
	    var n2 = Math.round(Math.random() * 100 + 1);
	    $("#captcha_original").val(n1 + " + " + n2);
	    $('#captcha_f_n').text(n1);
	    $('#captcha_s_n').text(n2);
	}
	addition_captcha();
	$(document).on('click','.captcha_click',function() {
		addition_captcha();
	});

	//register-validation
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
       
       var number1 = parseInt($('#captcha_f_n').text());
       var number2 = parseInt($('#captcha_s_n').text());
       var total_captcha = number1 + number2 ;
       var captcha_text= $("#captcha").val();     
       
       if(total_captcha!=captcha_text) {
       		$("#captcha").addClass("error_input_field");
       }
       else {
       		$("#captcha").removeClass("error_input_field");
       }

		// Validate the e-mail.
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
			reg_email.addClass("error_input_field");
		}
		else {
			reg_email.removeClass("error_input_field");
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
				// if($('#print_book_area_student').val() == ''){
					// $('#index_page_form #print_book_area_student').addClass('error_border');
					// return false;
				// }else
				 if($('#print_book_college').val() == ''){
					$('#index_page_form #print_book_college').addClass('error_border');
					return false;
				}
				else{
					//$('#index_page_form #print_book_area_student').removeClass('error_border');
					$('#index_page_form #print_book_college').removeClass('error_border');
					return true;
				}
			}
			else if($('#professional').is(':checked')){
				// if($('#print_book_state').val() == ''){
					// $('#index_page_form #print_book_state').addClass('error_border');
					// return false;
				// }else
				 if($('#print_book_area_professional').val() == ''){
					$('#index_page_form #print_book_area_professional').addClass('error_border');
					return false;
				}
				else{
					//$('#index_page_form #print_book_state').removeClass('error_border');
					$('#index_page_form #print_book_area_professional').removeClass('error_border');
					return true;
				}
			}
		});
		
		
	
	
	//find out cost per page for printing order using print type on multiple combination
	$(document).on('change','#print_booking_form .print_book_print_type,#print_booking_form .print_book_print_side,#print_booking_form .print_book_paper_size,#print_booking_form .print_book_paper_type,.display_paper_range .num_of_copies',function(){
	 	var print_type = ($('#print_booking_form .print_book_print_type').val()?$('#print_booking_form .print_book_print_type').val():'');
	 	var print_side = ($('#print_booking_form .print_book_print_side').val()?$('#print_booking_form .print_book_print_side').val():'');
	 	var paper_size = ($('#print_booking_form .print_book_paper_size').val()?$('#print_booking_form .print_book_paper_size').val():'');
	 	var paper_type = ($('#print_booking_form .print_book_paper_type').val()?$('#print_booking_form .print_book_paper_type').val():'');
		var no_copies  = $('#print_booking_form #display_paper_range #num_of_copies').val();
	 	//newly added by kalai for multi color printing on 08/06/16
	 	var printing_type =$('#printing_type').val();
	 	//alert(print_type+'|'+print_side+'|'+paper_size+'|'+paper_type+'|'+no_copies+'|'+printing_type);
	 	if(printing_type == "multicolor_printing"){
	 		var datas = {'print_type_id':print_type,'print_side_id':print_side,'papar_size_id':paper_size,'paper_type_id':paper_type,'cost_estimation_per_page':'true','printing_type':printing_type,'no_of_copies':no_copies};
	 		if(print_type != '' && print_side != '' && paper_size != '' && paper_type !='' && no_copies != 'select_copies'){
	 			var not_empty_value = true;
	 		}else{
	 			var not_empty_value = false;
	 		}
	 	}else{
	 		var datas = {'print_type_id':print_type,'print_side_id':print_side,'papar_size_id':paper_size,'paper_type_id':paper_type,'cost_estimation_per_page':'true','printing_type':printing_type};
	 		if(print_type != '' && print_side != '' && paper_size != '' && paper_type !=''){
	 			var not_empty_value = true;
	 		}else{
	 			var not_empty_value = false;
	 		}
	 	}
	 	if(not_empty_value){
	 		if(print_type=='colorwithblack&white'){
	 			$.ajax({
	           		type: "POST",
	           		url: "ajax_functions.php",
	           		data:datas,
	           		cache: false,
	           		success: function(data) {
	           			var per_page_amount = data;
	           			var amount_split = per_page_amount.split('#');
	           			if(amount_split){
	           				$('#print_booking_form .color_page_amount_per_page').val(parseFloat(amount_split[0]));
	           				$('#print_booking_form .blackwhite_page_amount_per_page').val(parseFloat(amount_split[1]));
	           			}
	           			else{
	           				error_popup('Printing option not available!');
	           				//newly changed by kalai for multi color printing on 08/06/16
	           				if(printing_type == "multicolor_printing")
	           					$('#print_booking_form .print_book_print_side,#print_booking_form .print_book_paper_size,#print_booking_form .print_book_paper_type').prop('selectedIndex', 0);
	           				else
	           					$('#print_booking_form .print_book_print_type,#print_booking_form .print_book_print_side,#print_booking_form .print_book_paper_size,#print_booking_form .print_book_paper_type').prop('selectedIndex', 0);
						}
	          		}
	       		});// end of ajax
	 		}else{
	 			$.ajax({
	           		type: "POST",
	           		url: "ajax_functions.php",
	           		// data:{'print_type_id':print_type,'print_side_id':print_side,'papar_size_id':paper_size,'paper_type_id':paper_type,'cost_estimation_per_page':'true'},
	           		//newly changed the above line by kalai for multi color printing on 08/06/16
	           		data:datas,
	           		cache: false,
	           		success: function(data) {
	           			var per_page_amount = parseFloat(data);
	           			if(per_page_amount){
	           				$('#print_booking_form .multiprint_total_amount').val(per_page_amount);
	           				$('#print_booking_form .per_page_costing').val(per_page_amount);
	           			}
	           			else{
	           				error_popup('Printing option not available!');
	           				//newly changed by kalai for multi color printing on 08/06/16
	           				if(printing_type == "multicolor_printing"){
	           					$('#print_booking_form .print_book_print_side,#print_booking_form .print_book_paper_size,#print_booking_form .print_book_paper_type').prop('selectedIndex', 0);
	           					$('.multiprint_total_amount').val('');
	           					location.reload();
	           				}
	           				else{
	           					$('#print_booking_form .print_book_print_type,#print_booking_form .print_book_print_side,#print_booking_form .print_book_paper_size,#print_booking_form .print_book_paper_type').prop('selectedIndex', 0);
	           				}
	           				
	           				
						}
	           			
	          		}
	       		});// end of ajax
	 		}
	 		
	 	}//end of if condition
	});// end of event
	
	$(document).on('change','.uploadFile',function() {
		var file_name_section = $(this).val();
		var this_name = $(this);

		$('.content_file_name').each(function() {
			var file_name_box = $(this).val();
			if( file_name_box == file_name_section) {
				error_popup('Filename already exists');
				this_name.val('');
				this_name.prev().val('No file selected');
				var data_value_plain = this_name.parents('.plain_clone_section').data('sectionvalue');
				$('.plain_paper_range').each(function() {
					if($(this).data('sectionvalue') == data_value_plain) {
						$(this).find('.plain_range_file_name').val('No file selected');
					}
				});
			}
			else {
				// changes
				// file_name_gallary.push(file_name_section);
			}
		});


		//newly added by kalai for multi color printing on 08/06/16
		if($(this).val()!='' && $('#printing_type').val() == "multicolor_printing") {
			$('.display_paper_range,.label_page_range').slideDown();
		}
	});


	//file upload validation in print booking page edited by siva
	$(document).on('change','#print_booking_form .uploadFile,#project_printing_form .content_upload_file',function(){
    	var file = this.files[0];
    	name = file.name;
    	size = file.size;
    	type = file.type;
    	var ext = type.split('/');
    	if($.inArray(ext[1], ['pdf','doc','docx','jpg','jpeg','msword','vnd.openxmlformats-officedocument.wordprocessingml.document','octet-stream']) == -1){
    		error_popup('Allowed pdf, doc, docx, jpg, jpeg files only!');
    		$(this).val('');
    		return false;
    	}
    	else{
    		return true;
    		total_black_white_file_project += 1;
    	}
	}); 

	// 	total cost amoutn display based on total no of pages and per page amount
	$(document).on('blur','.print_total_no_of_pages',function(){
		var bindingamout = parseFloat($('#print_booking_form .print_book_binding_amount').val()?$('#print_booking_form .print_book_binding_amount').val():'0.00');
		var total_amount = parseFloat($(this).val());
		
		if($('#print_booking_form #print_type').val()=='colorwithblack&white'){
			if(total_amount){
				var color_page_amount = parseFloat($('#print_booking_form .color_page_amount_per_page').val()?$('#print_booking_form .color_page_amount_per_page').val():'');
				var blackandwhite_page_amount = parseFloat($('#print_booking_form .blackwhite_page_amount_per_page').val()?$('#print_booking_form .blackwhite_page_amount_per_page').val():'');
				var total_no_of_color_pages = 0;
				var total_black_white_file = 0;
				var total_color_file = 0;
				$('.display_paper_range .paper_range').each(function(){
					if($(this).val() != '0-0'){
						total_color_file += 1;
						var colorpage = $(this).val();
						var colorpage_split = colorpage.split(',');
						$.each(colorpage_split,function(i){
							if(colorpage_split[i].indexOf("-")>0){
								var minus_pages = colorpage_split[i];
								minus_pages_split =  minus_pages.split('-');
								total_no_of_color_pages += parseInt((minus_pages_split[1]-minus_pages_split[0])+1);
							}
							else{
								total_no_of_color_pages += 1;
							}
						});
					}
					else{
						total_black_white_file += 1;
					}
				});
				if(total_amount > total_color_file+total_black_white_file){
					var entered_black_and_white_pages = total_amount-total_no_of_color_pages;
					if(entered_black_and_white_pages >= total_black_white_file){
						$('.print_total_amount').val(parseFloat(Math.ceil( ((color_page_amount*total_no_of_color_pages+entered_black_and_white_pages*blackandwhite_page_amount)+bindingamout) * 100 ) / 100).toFixed(2)).attr('readonly','readonly');
					}
					else{
						error_popup('Please enter correct total no of values!');
						$(this).val('');
					}
				}else{
					error_popup('Please enter correct total no of values!');
					$(this).val('');
				}
			}
		
		}else{
			var perpageamount = parseFloat($('#print_booking_form .per_page_costing').val()?$('#print_booking_form .per_page_costing').val():'');
			if(total_amount){
				if(perpageamount){
					$('.print_total_amount').val(parseFloat(Math.ceil( ((perpageamount*total_amount)+bindingamout) * 100 ) / 100).toFixed(2)).attr('readonly','readonly');
				}else{
					error_popup('Please select print type,print side,paper size,paper type!');
					$(this).val('');
				}
			}
		}
		
		
	});

	//newly added by kalai for multi color printing on 08/06/16
	// 	total cost amoutn display based on total no of pages and per page amount
	$('.mutli_print_total_no_of_pages').on('blur',function(){
		var perpageamount = parseFloat($('#print_booking_form .per_page_costing').val()?$('#print_booking_form .per_page_costing').val():'');
		var total_amount = parseFloat($(this).val());
		if(total_amount){
			if(perpageamount){
				$('.print_total_amount').val(parseFloat(Math.ceil( (perpageamount*total_amount))).toFixed(2)).attr('readonly','readonly');
			}else{
				error_popup('Please select print type,print side,paper size,paper type!');
				$(this).val('');
			}
		}
		
	});
// post from when click button and submit type edited by muthu
	$('.print_add_to_cart_btn').on('click',function(){
		$('.printbooking_main_page form .submit_type').val('add_to_cart');
		$('.printbooking_main_page form .form_submit_button').click();
	});


	// // post from when click button and submit type
	// $('.print_add_to_cart_btn').on('click',function(){
		// $('.printbooking_main_page form .submit_type').val('add_to_cart');
		// $('.printbooking_main_page form .form_submit_button').click();
	// });
// 	
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
		var amount = parseFloat($(this).parents('.review_order_checkout').find('.oredered_item_amount').val());
		var quantity = $(this).val();
		var delivery_amount = parseFloat($('.final_delivery_charge_amount').val());
		var final_amount = 0;
		$(this).parents('.review_order_checkout').find('.check_out_subtotal_amount').html('<b>&#8377; </b>'+parseFloat(Math.ceil((amount*quantity) * 100 ) / 100).toFixed(2));
		$(this).parents('.review_order_checkout').find('.check_out_total_amount').html('<b>&#8377; </b>'+parseFloat(Math.ceil((amount*quantity) * 100 ) / 100).toFixed(2));
		$(this).parents('.review_order_checkout').find('.updated_oredered_item_amount').val(parseFloat(Math.ceil((amount*quantity) * 100 ) / 100).toFixed(2));
		$('.updated_oredered_item_amount').each(function(){
			final_amount += parseInt($(this).val());
		});
		$('.final_payment_amount_checkout').val(parseFloat(Math.ceil((final_amount+delivery_amount) * 100 ) / 100).toFixed(2));
		$('.final_visible_amount_checkout_page').html('<b>&#8377; </b>'+parseFloat(Math.ceil((final_amount+delivery_amount) * 100 ) / 100).toFixed(2));
		$('.final_visible_sub_amount_checkout_page').html('<b>&#8377; </b>'+parseFloat(Math.ceil((final_amount) * 100 ) / 100).toFixed(2));
	});
	
	// post form when click check button in print booking page and submit type edited by siva
	$('.print_check_out_btn').on('click',function(){
		$('.printbooking_main_page form .submit_type').val('add_to_checkout');
		$('.printbooking_main_page form .form_submit_button').click();
	});

	

    
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
		$('#cover_file_name').val('No file selected');
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
		$('#binding_type').prop('selectedIndex',0);
		$('.display_binding_type').slideUp();
		$('#page_radio_no').prop('checked',true);
		$('.print_page_option').slideUp();
		$('#cover_file_name').val('');
		$('.cover_section_holder').slideUp();
		$('.display_page_type').css('display','none');
		$('.plain_clone_section').each(function(){
			var this_data_value = $(this).data('sectionvalue');
			if(this_data_value != 0) {
				$(this).remove();
			}
			else {
				$(this).find('.uploadFile').val('');
				$(this).find('.uploadFile').prev().val('No file selected');
				$(this).find('.clone_upload').css('display','inline');
				$(this).find('.clone_upload').css('pointer-events','none');
			}
		});
		$('.plain_paper_range').each(function(){
			var this_data_value = $(this).data('sectionvalue');
			if(this_data_value != 0) {
				$(this).remove();
			}
		});
		if( selected_type == "color with black & white" ) {
			$('.display_paper_range').css('display','block');
			$('.display_paper_range .file_range_holder').each (function() {
				$(this).children('.display_normal_file').val('No file selected');
				$(this).children('.paper_range').val('0-0');
				$('.label_page_range').css('display','block');
			});
		}

		else {
			$('.display_paper_range').css('display','none');
			$('.label_page_range').css('display','none');
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
			 	input_file.val("0-0");
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


	// customized browse button in order page End


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
			var uploaded_file_name="No file selected";
			var file_name_box_id = $(this).prev('.file_name_box').attr('id');
			var file_name_box = jQuery('#'+file_name_box_id);
			var data_file_name = file_name_box.data('filevalue');
			$(this).parents('.main_section_input_holder').find('.display_paper_range').each(function(){
				if($(this).find('.display_normal_file').data('filevalue')==data_file_name){
					$(this).find('.display_normal_file').val(uploaded_file_name);
				}
			});
			file_name_box.attr('value',uploaded_file_name);

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

	

	//newly added by kalai for supporting both plain and multi color printing on 08/06/16
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
		if($('#printing_type').val() =="multicolor_printing"){
			$('.num_of_copies').each(function() {
				if($(this,'option:selected').val() == 'select_copies') {
					$(this).addClass('error_print_booking_field');
				}
				else {
					$(this).removeClass('error_print_booking_field');
				}
			});
		}
		if($('#printing_type').val() !="multicolor_printing"){
			if (document.getElementById('print_type').selectedIndex < 1){
				$('#print_type').addClass('error_print_booking_field');
			}
			else{ 
				$('#print_type').removeClass('error_print_booking_field');
			} // print type validation
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
		}
		
		
		$('.upload_section').each(function(){
			var flie_upload_id=  $(this).find('.uploadFile');
			if(flie_upload_id.val() ==''){
				flie_upload_id.next('.uploadbutton').addClass('error_print_booking_field');
			}
			else {
				flie_upload_id.next('.uploadbutton').removeClass('error_print_booking_field');
			}
		});  
		
		// File name validation - normal file, content file

		
		if (jQuery(":input").hasClass("error_print_booking_field") || jQuery(".paper_range").hasClass("error_print_booking_code") || jQuery("select").hasClass("error_print_booking_field") || jQuery('.uploadbutton').hasClass('error_print_booking_field')) {
			// $('.error_print_booking').css('display','block');
			// $('html, body').animate({scrollTop:$('#print_booking_form').position().top}, 'slow');
			// $('#print_booking_form').animate({scrollTop:0}, 'slow');
			if($('#printing_type').val() !="multicolor_printing"){
			    $('html,body').animate({ scrollTop: $(".plain_printing_holder").offset().top},'slow');
			}
			else {
				$('html,body').animate({ scrollTop: $(".multicolor_printing_holder").offset().top},'slow');
			}

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
           		$('#print_book_college').empty().append('<option value="">Select your College/Area</option>'+data);
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
           		$('#print_book_area_professional').empty().append('<option value="">Select your Area</option>'+data);
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
	
	// check out page address data validation
	//$('.send_to_address_personal').prop('checked', true);
	$('.send_to_address_personal').on('change',function(){
		if(this.checked){
			$(this).prop("disabled", true);
			$('.send_to_address_college').prop('checked', false).prop("disabled", false);
			$('.send_to_address_college_data').hide();
			$('.send_to_address_personal_data').removeClass('dn').slideDown();
			// $('#name_a').val('');
			// $('#address1').val('');
			// $('#address2').val('');
			// $('#area_a').val('');
			// $('#city_a').val('');
			// $('#address1').val('');
			// $('#postalcode').val('');
			// $('#state_a').val('');
			// $('#phone1').val('');
			// $('#email1').val('');
		}
		
	});
	$('.send_to_address_college').on('change',function(){
		if(this.checked){
			$(this).prop("disabled", true);
			$('.send_to_address_personal').prop('checked', false).prop("disabled", false);
			$('.send_to_address_personal_data').hide();
			$('.send_to_address_college_data').removeClass('dn').slideDown();
			// $('#studentname').val('');
			// $('#idno').val('');
			// $('#yearofstudying').val('');
			// $('#department').val('');
			// $('#collegename').val('');
			// $('#area_b').val('');
			// $('#postal').val('');
			// $('#state_b').val('');
			// $('#phone2').val('');
			// $('#email2').val('');	
		}
			
	});
	//mobile validation
  //called when key is pressed in textbox


	//Validation for checkout
	var required_address_1 = ["name_a","address1","address2","postalcode","mobile","email1"];
	var required_address_2 = ["studentname","idno","yearofstudying","department","postal","phone","email2"];
	forget_email1=jQuery("#email1");
	forget_email2=jQuery("#email2");
	email=jQuery("#email");
	
 	test=jQuery("#test");
	errornotice = jQuery("#error");			
	// for empty field validation
	jQuery(".check_out_payment").on('click',function(){ 
		if(!$('.check_a:checked').length) {
    		$('.send_to_address_personal_data').removeClass('dn').slideDown();
    		$('#register').prop('checked',true);
    		$('#register').prop('disabled',true);
      	  		//stop the form from submitting
   	 			return false;
   			 }
			 				 
		if($('.send_to_address_personal_data').css('display')=='block')	 {
			for(var i = 0 ; i<required_address_1.length;i++ ){
			var input = jQuery('#'+required_address_1[i]);
			
			if ((input.val() == "")) {
				input.addClass("error_input1_field");
				 $('.error_test').css('display','block');		
			 }
			 else{
				 input.removeClass("error_input1_field");
			  $('.error_test').css('display','none');
				
			 }
			 	 var mobile=$('#phone1').val().length;
     			if(mobile<=9){
    			$('#phone1').addClass("error_input1_field_phone");
 				}
 				else {
 				$('#phone1').removeClass("error_input1_field_phone");
 				}
 				  //called when key is pressed in textbox

         
			 if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email1.val())) {
		 	forget_email1.addClass("error_input1_field_email");
	  	}else{

	  		forget_email1.removeClass("error_input1_field_email");
	  	}
	  
		}
		

		  

	//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input1_field") || jQuery("select").hasClass("error_input1_field") ) {
		$('.error_test').css('display','block');
		$('.error_email').css('display','none');
		$('.error_mobile').css('display','none');
		forget_email.removeClass("error_input_field_email");
			$('#mobile').removeClass("error_input_field_mobile");
			$('html,body').animate({ scrollTop: $(".error_test").offset().top},'slow');
			return false;
		}
		else {
			if(jQuery(":input").hasClass("error_input1_field_email"))  {
				$('.error_test').css('display','none');
				$('.error_mobile').css('display','none');
				$('.error_email').css('display','block');
				$('#mobile').removeClass("error_input_field_mobile");
				return false;
			}
			
			else {
				if(jQuery(":input").hasClass("error_input1_field_phone"))  {
				$('.error_test').css('display','none');
				$('.error_email').css('display','none');
				$('.error_mobile').css('display','block');
				$('html,body').animate({ scrollTop: $(".error_test").offset().top},'slow');
				return false;
			}
			else {
			errornotice.hide();
			$('.error_mobile').css('display','none');
			return true;
			}
			}
		}
	
	}
	});
	// special characters, numbers and alphabet restriction based on regular expression
	$('#phone2,#phone1,#postal,#postalcode').bind('keyup blur', function() { 
	    $(this).val(function(i, val) {
	        return val.replace(/[^0-9\s]/gi,''); 
	    });
	}); 			   		  
  	$('#name_a,#studentname,#footer_name').bind('keyup blur', function() { 
	    $(this).val(function(i, val) {
	        return val.replace(/[^a-z\s]/gi,''); 
	    });
	});
	$('#address1,#address2').bind('keyup blur', function() { 
	    $(this).val(function(i, val) {
	        return val.replace(/[^a-zA-Z0-9,.-\s]/gi,''); 
	    });
	});
      	

	jQuery(".check_out_payment").on('click',function(){ 	
		if($('.send_to_address_college_data').css('display')=='block')	{
			for(var i = 0 ; i<required_address_2.length;i++ ){
				var input = jQuery('#'+required_address_2[i]);
				if ((input.val() == "")) {
					input.addClass("error_input2_field");
				 	$('.error_test').css('display','block');		
			 	}
			 	else{
				 	input.removeClass("error_input2_field");
			  		$('.error_test').css('display','none');
			 	}
			 		 var mobile=$('#phone2').val().length;
     			if(mobile<=9){
    			$('#phone2').addClass("error_input2_field_phone");
 				}
 				else {
 				$('#phone2').removeClass("error_input2_field_phone");
 				}
         
		 		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email2.val())) {
		 			forget_email2.addClass("error_input2_field_email");
	  			}else{
	  				forget_email2.removeClass("error_input2_field_email");
	  			}
			}
		  
			if (jQuery(":input").hasClass("error_input2_field") || jQuery("select").hasClass("error_input2_field") ) {
				$('html,body').animate({ scrollTop: $(".error_test").offset().top},'slow');
				return false;
			} else {
				errornotice.hide();
				return true;
			}
		}
	});
	
	// Added by siva
		// Project Printing validaton Start

	// File name exist Start

	$(document).on('change','.content_upload_file',function() {
		var file_name_section = $(this).val();
		var this_name = $(this);
		$('.project_file_holder').each(function() {
			var file_name_box = $(this).val();			
			if( file_name_box == file_name_section ) {
				error_popup('Filename already exists');
				this_name.val('');
			}
			else {
				// changes
				// file_name_gallary.push(file_name_section);
			}
		});
	});

	// File name exist End

	//  Paper range validation start

	$(document).on('keypress','.project_paper_range',function (e) {
        if (e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
     	   return false;
    	}
    });

	//  Paper range validation End

	//  Paper range format validation Start
		$(document).on('keyup','.project_paper_range',function() {
			var inputVal=$(this).val();
		  	var num0to255Regex = new RegExp("^(\\s*\\d+\\s*\\-\\s*\\d+\\s*,?|\\s*\\d+\\s*,?)+$");
		  	if(!num0to255Regex.test(inputVal)) {
				$(this).addClass("error_print_booking_code");
			}
		 	else {
				$(this).removeClass("error_print_booking_code");
			} 	
	});

	// Paper range format validation End

	// Empty Validation Start

	
	jQuery(document).on('submit','#project_printing_form',function(){
		var project_input = jQuery('#'+"project_total_pages");
		if ((project_input.val() == "")) 
		{
			project_input.addClass("error_print_booking_field");
		} else {
			project_input.removeClass("error_print_booking_field");
		}
		if (document.getElementById('project_paper_size').selectedIndex < 1){
			$('#project_paper_size').addClass('error_print_booking_field');
		}
		else{ 
			$('#project_paper_size').removeClass('error_print_booking_field');
		} // paper size validation
		if (document.getElementById('project_paper_type').selectedIndex < 1){
			$('#project_paper_type').addClass('error_print_booking_field');
		}
		else{ 
			$('#project_paper_type').removeClass('error_print_booking_field');
		} // paper type validation
		if (document.getElementById('project_binding_type').selectedIndex < 1){
			$('#project_binding_type').addClass('error_print_booking_field');
		}
		else{ 
			$('#project_binding_type').removeClass('error_print_booking_field');
		} // Binding type validation

		$('.upload_content_section').each(function(){
			var flie_upload_holder=  $(this).find('.content_upload_file');
			if(flie_upload_holder.val() ==''){
				flie_upload_holder.next('.cotent_browse_button').addClass('error_print_booking_field');
			}
			else {
				flie_upload_holder.next('.cotent_browse_button').removeClass('error_print_booking_field');
			}
		}); 

		if (jQuery(":input").hasClass("error_print_booking_field") ||jQuery("select").hasClass("error_print_booking_field") || jQuery('.cotent_browse_button').hasClass('error_print_booking_field') || jQuery(".project_paper_range").hasClass("error_print_booking_code")) {
			$('html,body').animate({ scrollTop: $(".project_printing_holder").offset().top},'slow');
			return false;
		}else {
			errornotice.hide();
			return true;
		}
	});	

	//  Cover browse button

	$(document).on('click','#cover_browse_button',function(){
		$(this).prev().click();
	});

	//  Index pages browse button

	$(document).on('click','#index_browse_button',function(){
		$(this).prev().click();
	});

	//  Content browse button

	$(document).on('click','.cotent_browse_button',function(){
		$(this).prev().click();
	});

	//  References browse button

	$(document).on('click','#refer_browse_button',function(){
		$(this).prev().click();
	});

	// Display Page range section

	$('.content_upload_file').change(function() {
		// alert($(this).val());
		if($(this).val()!='') {
			$('.display_project_section').slideDown();
		}
	});

	//file upload validation in print booking page edited by siva
	$('#project_printing_form #cover_uplopadfile,#project_printing_form #index_uplopadfile,#project_printing_form #refer_uplopadfile,#print_booking_form #upload_cover_File').change(function(){
    	var file = this.files[0];
    	name = file.name;
    	size = file.size;
    	type = file.type;
    	var ext = type.split('/');
    	if($.inArray(ext[1], ['pdf','doc','docx','jpg','jpeg','msword','vnd.openxmlformats-officedocument.wordprocessingml.document','octet-stream']) == -1){
    		error_popup('Allowed pdf, doc, docx, jpg, jpeg files only!');
    		$(this).val('');
    		return false;
    	}
    	else{
    		return true;
    		total_black_white_file_project += 1;
    	}
	});

		$('.upload_cover_File').change(function() {
		var cover_browse_value = $(this).val();
		if(cover_browse_value != '') {
			$('#cover_file_name').val(cover_browse_value);
		}
		else {
			$('#cover_file_name').val("No file selected");
		}
	});


	// Cover file name
	$('#cover_uplopadfile').on('change',function() {
		var project_file_name = $(this).val();
		if(project_file_name == '') {
			$(this).prev().val('No file selected');
			$('#cover_range').next().val('No file selected');
			$('#cover_range').prop('disabled',true);
		}
		else {
			$(this).prev().val(project_file_name);
			$('#cover_range').prop('disabled',false);
			$('#cover_range').next().val(project_file_name);
		}
		
		
	});

	// Index file name

	$('#index_uplopadfile').on('change',function() {
		var project_file_name = $(this).val();
		if(project_file_name == '') {
			// $(this).prev().val('No file selected');
			// $('#index_range').next().val('No file selected');
			$('#index_range').prop('disabled',true);
		}
		else {
			$(this).prev().val(project_file_name);
			$('#index_range').prop('disabled',false);
			$('#index_range').next().val(project_file_name);
		}
	});

	// Content file name

	$('.project_uploadfile').on('change',function() {
		// var project_file_name = $(this).val();
		// $(this).prev().val(project_file_name);
		$('.content_range').prop('disabled',false);
	});

	// Reference file name

	$('#refer_uplopadfile').on('change',function() {
		var project_file_name = $(this).val();
		if(project_file_name == '') {
			// $(this).prev().val('No file selected');
			// $('#refer_range').next().val('No file selected');
			$('#refer_range').prop('disabled',true);
		}
		else {
			$(this).prev().val(project_file_name);
			$('#refer_range').prop('disabled',false);
			$('#refer_range').next().val(project_file_name);
		}
	});

	// Clone and Remove button Restriction Start

	$(document).on('click','.project_remove:last',function() {
		$(this).parents('.upload_content_section').prev().find('.project_clone').css('display','inline');
	});
	$('.project_remove').css('pointer-events','none');
	$(document).on('click','.project_remove',function() {
		var upload_content_length = $('.upload_content_section').length;
		if(upload_content_length <= 2) {
			$('.project_remove').css('pointer-events','none');
		}
		else {
			$('.project_remove').css('pointer-events','auto');
		}
	});
	$(document).on('click','.project_clone',function() {

		$('.project_clone').css('pointer-events', 'none');

	});

	// Clone and Remove button Restriction End

	//  Project Clone and Remove Start 

	var project_cloneIndex = $(".upload_content_section").length;
	function project_clone(){
			$('.project_remove').css('pointer-events','auto');
	  		var project_path_section_clone = $(this).parents('.project_upload_section');
			project_path_section_clone.find('.upload_content_section:last').clone()
	  		.val("")
	  		.insertAfter('.upload_content_section:last')
	  		.attr("id", "upload_content_section" +  project_cloneIndex)
	  		.data("projectsectionvalue",project_cloneIndex);
	  		$(this).css('display','none');

	  		var clone_project = project_path_section_clone.children('#upload_content_section' + project_cloneIndex).find('.project_clone');
	  		clone_project.attr("id","project_clone" + project_cloneIndex);
	  		clone_project.css('display','inline');

	  		var project_remove = project_path_section_clone.children('#upload_content_section' + project_cloneIndex).find('.project_remove');
	  		project_remove.attr("id","project_remove" + project_cloneIndex);

	  		var project_input_file = project_path_section_clone.children('#upload_content_section' + project_cloneIndex).find('.content_upload_file');
	  		project_input_file.val("");
	  		project_input_file.attr("id","content_upload_file" + project_cloneIndex);

  		  	var project_input_file = project_path_section_clone.children('#upload_content_section' + project_cloneIndex).find('.cotent_browse_button');
		  	project_input_file.attr("id","cotent_browse_button" + project_cloneIndex);

	  	  	var project_input_file = project_path_section_clone.children('#upload_content_section' + project_cloneIndex).find('.project_file_holder');
		  	project_input_file.val("No file selected")
	  		project_input_file.attr("id","project_file_holder" + project_cloneIndex)
	  		project_input_file.data("projectfilevalue",project_cloneIndex);


	  		//  Project paper range section

		  	var project_range_section_clone = $(this).parents('.main_project_section_input_holder').children('.page_number_section');
			project_range_section_clone.find('.project_content_range_section:last').clone()
		  	.val("")
		  	.insertAfter('.project_content_range_section:last')
		  	.attr("id", "project_content_range_section" +  project_cloneIndex)
		  	.data("projectsectionvalue",project_cloneIndex);

		  	var project_input_file = project_range_section_clone.children('#project_content_range_section'+ project_cloneIndex).find('.content_range');
		 	project_input_file.val("0-0");
		 	project_input_file.attr("id","content_range"+ project_cloneIndex);

		   	var project_input_file = project_range_section_clone.children('#project_content_range_section'+project_cloneIndex).find('.content_file_name_range');
		  	project_input_file.val("No file selected")
		  	project_input_file.attr("id","content_file_name_range"+project_cloneIndex)
		  	project_input_file.data("projectfilevalue",project_cloneIndex);
	  	project_cloneIndex++;
	}
	function project_remove(){

	 	var path_section_remove1 = $(this).parents('.upload_content_section').attr('id');
	 	var path_section_remove1_id = jQuery('#'+path_section_remove1);
		var data_value_section = path_section_remove1_id.data('projectsectionvalue');
	 	$(this).parents('.main_project_section_input_holder').children('.page_number_section').find('.project_content_range_section').each(function(){
			var cloned_file_remove = $(this).data('projectsectionvalue');
			if(cloned_file_remove==data_value_section){
				$(this).remove();
			}
		});
	path_section_remove1_id.remove();

	}
	$(document).on('click','.project_clone', project_clone);
	$(document).on('click','.project_remove', project_remove);

	//  Project Clone and Remove End

	

	// Validaion for adding restriction to clone and Store file value Start

	$('.project_clone').css('pointer-events', 'none');
	$(document).on('change','.content_upload_file',function() {
		if($(this).val()==''){
			$('.project_clone').css('pointer-events', 'none');
			$(this).prev().val('No file selected');
			var data_file_name = $(this).prev().data('projectfilevalue');
			$(this).parents('.main_project_section_input_holder').children('.page_number_section').find('.project_content_range_section').each(function(){
				if($(this).find('.content_file_name_range').data('projectfilevalue')==data_file_name){
					$(this).find('.content_file_name_range').val('No file selected');
					$(this).find('.content_file_name_range').prev('disabled',true);
				}
			});
		}
		else{
			var uploaded_file_name=$(this).val();
			var file_name_box_id = $(this).prev('.project_file_holder').attr('id');
			var file_name_box = jQuery('#'+file_name_box_id);
			var data_file_name = file_name_box.data('projectfilevalue');
			$(this).parents('.main_project_section_input_holder').children('.page_number_section').find('.project_content_range_section').each(function(){
				if($(this).find('.content_file_name_range').data('projectfilevalue')==data_file_name){
					$(this).find('.content_file_name_range').val(uploaded_file_name);
					$(this).find('.content_file_name_range').prev('disabled',false);
				}
			});
			file_name_box.attr('value',uploaded_file_name);
			$('.project_clone').css('pointer-events', 'auto');
		}
	});

	// Validaion for adding restriction to clone and Store file value End

	$(document).on('click','.project_remove',function() {
		var last_section = $('.upload_content_section:last').find('.content_upload_file');
		if(last_section.val() == '') {
			$('.project_clone').css('pointer-events', 'none');
		}
		else {
			$('.project_clone').css('pointer-events', 'auto');
		}
	});

	// Project printing validation End

	// To scroll fullwindow and particular div jquery

	// $('#checkout_details_scroll').mouseenter(function() {
	
	// 	// $(this).bind('mousewheel DOMMouseScroll', function(e) {
	// 	//     return true;
	//  //    });
	//  //    $('body').css('overflow','hidden');
	//  $('body').bind('mousewheel');
	//   $(this).unbind();
	// });
	// $('#checkout_details_scroll').mouseleave(function() {
	// 	  $('body').css('overflow','auto');
	// });

	// Ended by siva
	
	
	//find out cost per page for printing order using print type on multiple combination for project printing
	$('#project_printing_form .project_paper_size,#project_printing_form .project_paper_type').on('change',function(){
	 	var print_type = ($('#project_printing_form .project_print_type').val()?$('#project_printing_form .project_print_type').val():'');
	 	var print_side = ($('#project_printing_form .project_print_side').val()?$('#project_printing_form .project_print_side').val():'');
	 	var paper_size = ($('#project_printing_form .project_paper_size').val()?$('#project_printing_form .project_paper_size').val():'');
	 	var paper_type = ($('#project_printing_form .project_paper_type').val()?$('#project_printing_form .project_paper_type').val():'');
	 	//alert(print_type+'|'+print_side+'|'+paper_size+'|'+paper_type);
	 	if(print_type != '' && print_side != '' && paper_size != '' && paper_type !=''){
	 		$.ajax({
           		type: "POST",
           		url: "ajax_functions.php",
           		data:{'print_type_id':print_type,'print_side_id':print_side,'papar_size_id':paper_size,'paper_type_id':paper_type,'cost_estimation_per_page_for_project':'true'},
           		cache: false,
           		success: function(data) {
           			var per_page_amount = data;
           			var amount_split = per_page_amount.split('#');
           			if(amount_split){
           				$('#project_printing_form .color_page_amount_per_page').val(parseFloat(amount_split[0]));
           				$('#project_printing_form .blackwhite_page_amount_per_page').val(parseFloat(amount_split[1]));
           			}
           			else{
           				error_popup('Printing option not available!');
           				$('#project_printing_form .project_paper_size,#project_printing_form .project_paper_type').prop('selectedIndex', 0);
					}
           			
          		}
       		});// end of ajax
	 	}//end of if condition
	});// end of event
	
	
	// get binding amount based on type for project printing
	$('#project_printing_form .project_binding_type').on('change',function(){
		var print_bind_type = $(this).val();
		if(print_bind_type != ''){
			$.ajax({
           		type: "POST",
           		url: "ajax_functions.php",
           		data:{'binding_type':print_bind_type,'binding_amount_value':'true'},
           		cache: false,
           		success: function(data) {
           			if(data != 'error_bind_amt'){
           				if($('#project_printing_form #project_total_pages').val() == ''){
           					$('#project_printing_form .project_binding_amount').val(parseFloat(Math.ceil((data) * 100 ) / 100).toFixed(2));
           				}else{
           					$('#project_printing_form .project_binding_amount').val(parseFloat(Math.ceil((data) * 100 ) / 100).toFixed(2));
           					$('#project_printing_form .project_total_amount').val(parseFloat(Math.ceil(((parseFloat($('#project_printing_form .per_page_costing').val())*parseFloat($('#project_printing_form .project_total_pages').val()))+parseFloat(data)) * 100 ) / 100).toFixed(2));
           				}
           			}else{
           				error_popup('Your selected binding option not available!');
           				$('#project_binding_type').prop('selectedIndex',0);
           			}
           			
          		}
       		});// end of ajax
		}
	});
	
	// 	total cost amoutn display based on total no of pages and per page amount for project print
	$(document).on('blur','#project_printing_form .project_total_pages',function(){
		var bindingamout = parseFloat($('#project_printing_form .project_binding_amount').val()?$('#project_printing_form .project_binding_amount').val():'0.00');
		var total_amount = parseFloat($(this).val());
		if(total_amount){
				var color_page_amount = parseFloat($('#project_printing_form .color_page_amount_per_page').val()?$('#project_printing_form .color_page_amount_per_page').val():'');
				var blackandwhite_page_amount = parseFloat($('#project_printing_form .blackwhite_page_amount_per_page').val()?$('#project_printing_form .blackwhite_page_amount_per_page').val():'');
				var total_no_of_color_pages = 0;
				var total_color_file = 0;
				if($('#cover_range').val() != '0-0'){
					total_color_file += 1;
					var cover_colorpage = $('#cover_range').val();
					var cover_colorpage_split = cover_colorpage.split(',');
					$.each(cover_colorpage_split,function(i){
						if(cover_colorpage_split[i].indexOf("-") > 0){
							var cover_minus_pages = cover_colorpage_split[i];
							var cover_minus_pages_split = cover_minus_pages.split('-');
							total_no_of_color_pages += parseInt((cover_minus_pages_split[1]-cover_minus_pages_split[0])+1);
						}
						else{
							total_no_of_color_pages += 1;
						}
					});
				}
				if($('#index_range').val() != '0-0'){
					total_color_file += 1;
					var index_colorpage = $('#index_range').val();
					var index_colorpage_split = index_colorpage.split(',');
					$.each(index_colorpage_split,function(i){
						if(index_colorpage_split[i].indexOf("-") > 0){
							var index_minus_pages = index_colorpage_split[i];
							var index_minus_pages_split = index_minus_pages.split('-');
							total_no_of_color_pages += parseInt((index_minus_pages_split[1]-index_minus_pages_split[0])+1);
						}
						else{
							total_no_of_color_pages += 1;
						}
					});
				}
				if($('#refer_range').val() != '0-0'){
					total_color_file += 1;
					var refer_colorpage = $('#refer_range').val();
					var refer_colorpage_split = refer_colorpage.split(',');
					$.each(refer_colorpage_split,function(i){
						if(refer_colorpage_split[i].indexOf("-") > 0){
							var refer_minus_pages = refer_colorpage_split[i];
							var refer_minus_pages_split = refer_minus_pages.split('-');
							total_no_of_color_pages += parseInt((refer_minus_pages_split[1]-refer_minus_pages_split[0])+1);
						}
						else{
							total_no_of_color_pages += 1;
						}
					});
				}
				
				$('.project_content_range_section .project_paper_range').each(function(){
					if($(this).val() != '0-0'){
						total_color_file += 1;
						var colorpage = $(this).val();
						var colorpage_split = colorpage.split(',');
						$.each(colorpage_split,function(i){
							if(colorpage_split[i].indexOf("-")>0){
								var minus_pages = colorpage_split[i];
								minus_pages_split =  minus_pages.split('-');
								total_no_of_color_pages += parseInt((minus_pages_split[1]-minus_pages_split[0])+1);
							}
							else{
								total_no_of_color_pages += 1;
							}
						});
					}
				});
				if(total_amount > total_color_file+total_black_white_file_project){
					var entered_black_and_white_pages = total_amount-total_no_of_color_pages;
					if(entered_black_and_white_pages >= total_black_white_file_project){
						$('.project_total_amount').val(parseFloat(Math.ceil( ((color_page_amount*total_no_of_color_pages+entered_black_and_white_pages*blackandwhite_page_amount)+bindingamout) * 100 ) / 100).toFixed(2)).attr('readonly','readonly');
					}
					else{
						error_popup('Please enter correct total no of values!');
						$(this).val('');
						$('.project_total_amount').val('');
					}
				}else{
					error_popup('Please enter correct total no of values!');
					$(this).val('');
					$('.project_total_amount').val('');
				}
			}
		
	});

	//  Total no. of pages validation for project printing
	$("#project_total_pages").keypress(function (e) {
     	if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
    	}
    });
	$(document).on('keypress','#project_total_pages',function() {
		var upload_files_value =$('.content_upload_file').val();
		if(upload_files_value == '') {
			return false;
		}
		else {
			return true;
		}		
	});
	$(document).on('blur','#project_total_pages',function() {
		if($(this).val()=="0") {
			
			$(this).val('');
			$('#project_paper_size option:first-child').attr("selected", "selected");
			$('#project_paper_type option:first-child').attr("selected", "selected");
			$('#project_binding_type option:first-child').attr("selected", "selected");

		}
    });
	//  Total no. of pages validation for plain printing and multicolors printing
	$("#total_pages").keypress(function (e) {
     	if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
    	}
    });
	$(document).on('keypress','#total_pages',function() {
		var upload_files_value =$('.uploadFile').val();
		if(upload_files_value == '') {
			return false;
		}
		else {
			return true;
		}
	});
	$(document).on('blur','#total_pages',function() {
		if($(this).val()=="0") {
			
			$(this).val('');
			$('#print_side option:first-child').attr("selected", "selected");
			$('#paper_type option:first-child').attr("selected", "selected");
			$('#paper_size option:first-child').attr("selected", "selected");

		}
    });

	$('.select_city_btn a').on('click',function() {
		if (document.getElementById('initial_city_name').selectedIndex < 1){
			$('#initial_city_name').addClass('error_print_booking_field');
		}
		else {
			$('#initial_city_name').removeClass('error_print_booking_field');
		}
	});
	
	// address 2 validation field 
	$('.personal_address').on('blur',function(){
		$('#print_checkout_form #billing_address').val($(this).val());
	});
	
	$('.send_to_address_college').on('change',function(){
		if($(this).prop("checked") == true){
			$('#billing_address').val($('#collegename1').val());
		}
	});
	
	//amount calculation for multicolor
	//$(document).on('change','#print_booking_form .display_paper_range .num_of_copies,.print_book_print_side,.print_book_paper_type,.print_book_paper_size',function(){
		// var no_copies =$('#print_booking_form .display_paper_range .num_of_copies');
		// var print_type = $('.print_book_print_type').val();
		// var print_side = $('.print_book_print_side').val();
		// var paper_type = $('.print_book_paper_type').val();
		// var paper_size = $('.print_book_paper_size').val();
		// $.ajax({
			// type: "POST",
			// url: "ajax_functions.php",
			// data:{'amount_per_copy_multi':'true','print_type':paper_print_type,'print_side':print_side,'paper_type':paper_type,'paper_size':paper_size,'noofcopies':no_copies},
			// dataType: 'json',
			// success: function(data){
				// alert(data);
			// }
		// });
		
		
		// var multi_total_copies = 0;
		// var per_page_amount = parseFloat($('#print_booking_form .per_page_costing').val());
		// $('#print_booking_form .display_paper_range').each(function(){
			// if($(this).find('.num_of_copies').val() != ''){
				// multi_total_copies += parseFloat($(this).find('.num_of_copies').val());
			// }
		// });
		// $('.multiprint_total_amount').val(parseFloat(Math.ceil((multi_total_copies*per_page_amount)*100)/100).toFixed(2));
		//alert(parseFloat(Math.ceil( (multi_total_copies*per_page_amount)*100)/100).toFixed(2));
	//});
	
	// set city id to cookie
	var city_id_check = Cookies.get('city_id');
	if(!city_id_check){
		Cookies.set('city_id','0');
	}
	$('.select_city_btn').on('click',function(){
		var city_id = $('#initial_city_name').val();
		Cookies.set('city_id',city_id);
	});
	
	


	// Cabin booking form validation

	$('#cabin_book_button').on('click',function(){
		$('#cabin_booking').submit();
	});
	$("#cabin_mobile,#cabin_required_system").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
   			return false;
		}
	});
	$("#cabin_name").keypress(function (e) {
	 	if (e.which != 8 && e.which != 0 && (e.which < 97 || e.which > 122) ) {
		   return false;;
		}
	});

	jQuery(document).on('submit','#cabin_booking',function(){

	required_cabin_fields = ["cabin_name", "cabin_mobile","txtDate","cabin_required_system","phone_1_field"];
	for (i=0;i<required_cabin_fields.length;i++) {
			var input = jQuery('#'+required_cabin_fields[i]);
			if ((input.val() == "")) 
			{
				input.addClass("error_input_field");
			} else {
				input.removeClass("error_input_field");
				}
		}
		if (document.getElementById('cabin_timing_type').selectedIndex < 1){
			$('#cabin_timing_type').addClass('error_input_field');
		}
		else{ 
			$('#cabin_timing_type').removeClass('error_input_field');
		}
		var mobile=$('#cabin_mobile').val().length;
		if(mobile<=9){
			$('#cabin_mobile').addClass("error_input_field");
		}
		else {
			$('#cabin_mobile').removeClass("error_input_field");
 		}
 		//  No need now , commented by siva
		// var system=$('#cabin_required_system').val();
		// if(system>10 || system == 0){
		// 	$('#cabin_required_system').addClass("error_input_field");
		// }
		// else {
		// 	$('#cabin_required_system').removeClass("error_input_field");
 	// 	}

		if (jQuery(":input").hasClass("error_input_field") ||  jQuery("select").hasClass("error_input_field")) {
				return false;
			} else {
				errornotice.hide();
				return true;
			}
		});

		$('.slot').each(function() {
			$(this).find('i').click(function(){
				var selected_slot =$('.slot').find('.seleted_slot');
				$(this).addClass('seleted_slot');
				selected_slot.removeClass('seleted_slot');
			});
		});

		// Holiday dates data get when page loading
		function holiday_date_list(data){
			var disabledate = [];
			for(var i=0;i<data.length;i++){
				var dateAr = data[i].split('-');
				var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
				disabledate.push(newDate);
			}
			var today = new Date();
		    var dd = today.getDate();
		    var mm = today.getMonth()+1; //January is 0!
		
		    var yyyy = today.getFullYear();
		    if(dd<10){
		        dd='0'+dd;
		    } 
		    if(mm<10){
		        mm='0'+mm;;
		    } 
		    var today = dd+'-'+mm+'-'+yyyy;
		    if($.inArray(today, disabledate) == -1){
		    	var current_data = new Date();
		    }
		    else{
		    	var current_data = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
		    }
			$('#cabin_booking_date').datepicker({
		        format: "dd-mm-yyyy",
		        startDate: current_data,
		        endDate: "+30d",
		       	useCurrent: true,
		        autoclose: true,
		        todayHighlight: true,
		        datesDisabled: disabledate,
    		}) .on('changeDate', function(){
    			var date = $(this).val();
		    	var timing_type = $('#cabin_timing_type').val();
		    	var spilted_date = date.split('-');
		    	var newDate = spilted_date[2] + '-' + spilted_date[1] + '-' + spilted_date[0];
		    	$.ajax({
					type: "POST",
					url: "cabin_query.php",
					data:{'require_date':newDate,'timeing_type': timing_type.toLowerCase()},
					success: function(data){
						$('#cabin_booking_timing_slot').empty().append('<h3 class="title"><span class="icon icon-three">2</span>BOOKED TIME SLOTS</h3>'+data);
						$('.maximum_booking_system').val(0);
						$('.total_hours_cabin_booking').val(0);
					}
				});
        	});
    		$("#cabin_booking_date").datepicker("setDate", new Date());
		}
		
		if(window.location.href.indexOf("cabin_booking.php") !== -1){
			$.ajax({
				type: "POST",
				url: "ajax_functions.php",
				data:{'cabin_booking_holiday_data':'true'},
				dataType: 'json',
				success: function(data){
					holiday_date_list(data);
				}
			});
		}
	    
	    //cabin datas shows as per timing type and date
	    $(document).on('change','#cabin_timing_type',function(){
	    	var timing_type = $(this).val();
	    	var date = $('#cabin_booking_date').val();
	    	var spilted_date = date.split('-');
	    	var newDate = spilted_date[2] + '-' + spilted_date[1] + '-' + spilted_date[0];
	    	$.ajax({
				type: "POST",
				url: "cabin_query.php",
				data:{'require_date':newDate,'timeing_type': timing_type.toLowerCase()},
				success: function(data){
					$('#cabin_booking_timing_slot').empty().append('<h3 class="title"><span class="icon icon-three">2</span>BOOKED TIME SLOTS</h3>'+data);
					$('.maximum_booking_system').val(0);
					$('.total_hours_cabin_booking').val(0);
				}
			});
			if(timing_type.toLowerCase()=='flexible'){
				$('.total_hours_cabin_booking_view').removeAttr('readonly');
				$('.total_hours_cabin_booking_view,#cabin_required_system').val('');
				$('.total_hours_cabin_booking').val(0);
				$('.cabin_booking_total_amount').val(parseFloat(0.00));
			}else{
				$('.total_hours_cabin_booking_view').attr('readonly','readonly');
				$('.total_hours_cabin_booking_view,#cabin_required_system').val('');
				$('.total_hours_cabin_booking').val(0);
				$('.cabin_booking_total_amount').val(parseFloat(0.00));
			}
	    });
		
		// change cabin color when cick availabel cabin only
		$(document).on('click','#cabin_booking_timing_slot .cabin_available',function(){
			// $('#cabin_booking_timing_slot .slot .cabin_available').each(function(){
				// if($(this).hasClass('cabin_selected')){
					// $(this).removeClass('cabin_selected');
				// }
			// });
			$(this).toggleClass('cabin_selected');
		});
		
		//user must be select system when enter no of system
		$(document).on('focus','#cabin_required_system',function(){
			var atleast_one = false;
			$('#cabin_booking_timing_slot .slot .cabin_available').each(function(){
				if($(this).hasClass('cabin_selected')){
					atleast_one = true;
				}
			});
			if(atleast_one == false){
				error_popup('Select atleast one timing slot!');
			}
			
		});
		
		// count maximum user can book system and calculate total hours
		$(document).on('click','.cabin_available',function(){
			$('#cabin_required_system').val('');
			$('.cabin_booking_total_amount').val(0);
			var system_availability = parseInt($(this).parents('.slot').find('.system_availability').val());
			var amount_per_slot = parseFloat($(this).parents('.slot').find('.timeslotamount').val());
			var maximum_number_of_availability = parseInt($('#cabin_booking .maximum_booking_system').val());
			var timing_type = $('#cabin_timing_type').val();
			var total_hours_cabin_booking = parseInt($('#cabin_booking .total_hours_cabin_booking').val());
			if($(this).hasClass('cabin_selected')){
				//maximum_number_of_availability += system_availability;
				total_hours_cabin_booking += hours_per_slot;
			}
			else{
				//maximum_number_of_availability -= system_availability;
				total_hours_cabin_booking -= hours_per_slot;
			}
			//$('#cabin_booking .maximum_booking_system').val(maximum_number_of_availability);
			var system_avail = [];
			var schedule_ids = '';
			$('#cabin_booking_timing_slot .slot .cabin_available').each(function(){
				if($(this).hasClass('cabin_selected')){
					system_avail.push(parseInt($(this).parents('.slot').find('.system_availability').val()));
					schedule_ids += $(this).attr('data-id')+'#';
				}
			});
			$('.schedule_time_id').val(schedule_ids);
			if(system_avail.length > 0){   
    			$('#cabin_booking .maximum_booking_system').val(Math.min.apply(Math,system_avail));
			}else{
   				$('#cabin_booking .maximum_booking_system').val(0);
			}
			
			if(timing_type.toLowerCase()!='flexible'){
				var hours_per_slot = $(this).parents('.slot').find('.total_hours_per_slot').val();
				$hours_split = hours_per_slot.split(':');
				if($hours_split[1] > 0){
					$('#cabin_booking .total_hours_cabin_booking_view').val(parseInt(($hours_split[0]+1)*system_avail.length));
				}
				else{
					$('#cabin_booking .total_hours_cabin_booking_view').val(parseInt($hours_split[0]*system_avail.length));
				}
				$('#cabin_booking .total_hours_cabin_booking').val(hours_per_slot);
			}else{
				$('#cabin_booking .total_hours_cabin_booking_view').val(parseInt(1));
			}
			// if($('#cabin_required_system').val()){
				// $('#cabin_booking .cabin_booking_total_amount').val(parseFloat(Math.ceil(($('#cabin_required_system').val()*amount_per_slot*$('.total_hours_cabin_booking_view').val()) * 100 ) / 100).toFixed(2));
			// }
			
			
		});
		
		// check no of system from selected timing slots
		$(document).on('blur','#cabin_required_system',function(){
			if($(this).val() != ''){
				var no_of_hours = parseInt($('.total_hours_cabin_booking_view').val());
				var no_of_system = parseInt($(this).val());
				var total_amoutn = 0.00;
				$('#cabin_booking_timing_slot .slot .cabin_available').each(function(){
					if($(this).hasClass('cabin_selected')){
						total_amoutn = $(this).parents('.slot').find('.timeslotamount').val();
					}
				});
				var maximum_system = parseInt($('#cabin_booking .maximum_booking_system').val());
				if(no_of_system > maximum_system){
					error_popup('You can choose maximum '+maximum_system+' systems only!');
					$(this).val('');
				}else{
					$('.cabin_booking_total_amount').val(parseFloat(Math.ceil((total_amoutn*no_of_system*no_of_hours) * 100 ) / 100).toFixed(2));
				}
			}
		});	
		
		//amount calculation of flexible cabin booking system
		$(document).on('blur','.total_hours_cabin_booking_view',function(){
			if($(this).val() != '' && $('#cabin_required_system').val() != '' && $('#cabin_timing_type').val().toLowerCase() == 'flexible' ){
				var totolhours = parseInt($(this).val());
				var no_of_system = parseInt($('#cabin_required_system').val());
				var total_amoutn = 0.00;
				$('#cabin_booking_timing_slot .slot .cabin_available').each(function(){
					if($(this).hasClass('cabin_selected')){
						total_amoutn = $(this).parents('.slot').find('.timeslotamount').val();
					}
				});
				$('.cabin_booking_total_amount').val(parseFloat(Math.ceil((total_amoutn*no_of_system*totolhours) * 100 ) / 100).toFixed(2));
			}
		});
		
		// clear cabinbooking form
		$('#cabin_clear_button').on('click',function(){
			// $('#cabin_name,#cabin_mobile,#cabin_required_system,.total_hours_cabin_booking_view').val('');
			// $('.cabin_booking_total_amount').val(0);
			location.reload();
		});
		
		// make my default address condition for personnal
		$('.makemydefaultaddress_per').on('change',function(){
			$('.makemydefaultaddress_stu').prop('checked',false);
			if(this.checked){
				$('.paymentmakemydefaultaddress').val($(this).attr('data-code'));
			}
			else{
				$('.paymentmakemydefaultaddress').val(0);
			}
		});
		$('.makemydefaultaddress_stu').on('change',function(){
			$('.makemydefaultaddress_per').prop('checked',false);
			if(this.checked){
				$('.paymentmakemydefaultaddress').val($(this).attr('data-code'));
			}
			else{
				$('.paymentmakemydefaultaddress').val(0);
			}
		});
		
		//checkout shipping details values move to the payment values
		$('#name_a,#studentname').on('blur',function(){
			$('#print_checkout_form #billing_name').val($(this).val());
		});
		$('#address1,#department').on('blur',function(){
			$('#print_checkout_form #merchant_param1').val($(this).val());
		});
		$('#area').on('change',function(){
			$('#merchant_param4').val($(this).val());
		});
		$('#postalcode,#postal').on('blur',function(){
			$('#print_checkout_form #billing_zip').val($(this).val());
		});
		$('#phone1,#phone2').on('blur',function(){
			$('#print_checkout_form #billing_tel').val($(this).val());
		});
		$('#email1,#email2').on('blur',function(){
			$('#print_checkout_form #billing_email').val($(this).val());
		});
		$('#idno').on('blur',function(){
			$('#print_checkout_form #merchant_param2').val($(this).val());
		});
		$('#yearofstudying').on('blur',function(){
			$('#print_checkout_form #merchant_param3').val($(this).val());
		});
		
		
		//delivery cost  for in checkout page
		$('.send_to_address_personal_data #area').on('change',function(){
			var area = $(this).val().trim();
			var subtotalamount = parseFloat($('.final_hidden_sub_amount_checkout_page').val());
			$.ajax({
				type: "POST",
				url: "ajax_functions.php",
				data:{'delivery_cost_per_area':'true','area':area},
				dataType: 'json',
				success: function(data){
					var delivery_amount = parseFloat(data);
					var finalamoutn = subtotalamount+delivery_amount;
					$('#total_amount').html('<b>&#8377;</b> '+delivery_amount);
					$('.final_delivery_charge_amount').val(delivery_amount);
					$('.final_visible_amount_checkout_page').html('<b>&#8377;</b> '+finalamoutn);
					$('.final_payment_amount_checkout').val(finalamoutn);
				}
			});
		});
		
		
	// feedback form data send through ajax
		
}); // Document ready end

