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
	// 	== Add input box when selected white & black and color Start ==
	// $('#print_type').change(function() {
	// 	var selected_type = $('#print_type option:selected').text();
	// 	// alert("test");
	// 	if( selected_type == "white & black and color" ) {
	// 		$('#print_page_range').css('display','block');
	// 		$('.pos_rel').css('display','block');
	// 	}
	// 	else {
	// 		$('#print_page_range').css('display','none');
	// 		$('.pos_rel').css('display','none');
	// 	}
	// });
	// 	== Add input box when selected white & black and color End ==
	//  == Print Booking Validation Start ==

	// Validaion for adding restriction to browse and page range textbox 

	// $('.uploadFile').each(function(){
	// 	if($(this).val()==''){
	// 		$('.clone').css('pointer-events', 'none');
	// 	}
	// 	else{
	// 		$('.clone').css('pointer-events', 'auto');
	// 	}
	// });
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

	//  == Validation for Page range Format End ==

		$('.clone').css('pointer-events', 'none');
		$(document).on('change','.uploadFile',function() {
		if($(this).val()==''){
			$('.clone').css('pointer-events', 'none');
		}
		else{
			$('.clone').css('pointer-events', 'auto');
		}
	});





	

	//  == Add and Remove Button Start ==

	$('.remove').css('display','none');
	$(document).on('click','.clone, .remove',function() {
		var input_length=$('.paper_range').length;
		if(input_length <= 1) {
			$('.remove').css('display','none');
			$('.uploadbutton').css('pointer-events', 'auto');
	    	$('.page_range_error').css('display','none');
			$('.clone').css('pointer-events', 'auto');
		}
		else {
			$('.remove').css('display','block');
		}
	});
	$(document).on('click','.clone',function() {
		$('.uploadFile').each(function() {
			if($(this).val() <= 1) {
			$('.clone').css('pointer-events', 'none');
	   		}
		   	else {
				$('.clone').css('pointer-events', 'auto');
			}
		});
	});
	$(document).on('click','.remove',function() {
		$('.clone').css('pointer-events', 'auto');
	});

	//  == Add and Remove Button End ==

	//  == Validation for Page range Keycode Start ==

   $(document).on('keypress','.paper_range',function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
   });

	//  == Validation for Page range Keycode End ==

$(document).on('change','.uploadFile',function() {
		var file_name= $(this).attr('id');
		var file_path = jQuery('#'+file_name);
	    var file_name_extension = file_path.val();
	    // alert(file_name_extension);
		 $(file_path).next().next().html( "<strong>"+file_name_extension+"</strong>" );
	});
}); //  == Ended by siva ==

jQuery(document).ready(function() {
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
	
	// Refresh captcha image
	// $("#reload").click(function() {
	//     $("img#img").remove();
	// 	var id = Math.random();
 //        $('<img id="img" src="captcha.php?id='+id+'"/>').appendTo("#imgdiv");
	// 	 id ='';
 //    });

	// error popup message center alignment
	var height=$('.error_popup_msg').height();
    var width=$('.error_popup_msg').width();
    $('.error_popup_msg').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
	
	
	// customized browse button in order page
	$(document).on('click','.uploadbutton',function(){
		var path_file=$(this).attr('id');
		// path_file.click();
		// var path_id = path_file.attr('id');
		var file_path = jQuery('#'+path_file);
		file_path.prev().click();
		// file_path.click();
		// var filename[]=file_path.val();
	});
		
	
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
           			var per_page_amount = parseInt(data);
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
    	if($.inArray(ext[1], ['pdf','doc','docx']) == -1){
    		error_popup('Allowed pdf, doc, docx files only!');
    		return false;
    	}
    	else{
    		return true;
    	}
	});
	
	// 	total cost amoutn display based on total no of pages and per page amount
	// $('.print_total_no_of_pages').on('blur',function(){

	// 	var perpageamount = ($('#print_booking_form .per_page_costing').val()?$('#print_booking_form .per_page_costing').val():'');
	// 	var total_amount = $(this).val();
	// 	if(perpageamount){
	// 		$('.print_total_amount').val(perpageamount*total_amount).attr('readonly','readonly');
	// 	}else{
	// 		error_popup('Please select print type,print side,paper size,paper type!');
	// 		$(this).val('');
	// 	}
		
	// });
	
	// post from when click button and submit type
	$('.print_add_to_cart_btn').on('click',function(){
		$('#print_booking_form .submit_type').val('add_to_cart');
		$('#print_booking_form').submit();
	});
	
});

//  == Added by siva ==

// Popup box

$(document).ready(function() {	

		var id = '#popup_index';
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		// var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#background_shadow').css({'height':maskHeight});
		
		//transition effect		
		
		$('#background_shadow').fadeTo("slow",0.6);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(500); 	
		// document.body.style.overflow = "hidden";
		//if mask is clicked
	$('#background_shadow').click(function () {
		$(this).hide();
		$('.popup_index').hide();
		document.body.style.overflow = "visible";
	});
});


//  Printbooking form validation


$(document).ready(function() {
	//  To display Binding type dropdown
	$('#radio_yes').click(function() {
		$('.display_binding_type').slideDown();
	});
	$('#radio_no').click(function() {
		$('.display_binding_type').slideUp();
	});
			$('.upload_section').css('width','80%');

	//  To display upload fileds
	$('#binding_type').change(function() {
		if ($('#binding_type').val() == 'soft'){
			// alert("test");
			// $('.display_upload').addClass('active_upload');
			$('.display_page_type').fadeIn('fast');
			$('.display_range_page').css('display','block');
			$('.display_normal_file').css('display','none');
			$('.upload_section').css('width','100%');
		}
		else{ 
			$('.display_page_type').fadeOut('fast');
			// $('.display_upload').removeClass('active_upload');
			$('.display_normal_file').css('display','block');
			$('.display_range_page').css('display','none');
			$('.upload_section').css('width','80%');
		}
	});

	//  == Add input box when selected white & black and color Start ==
	$('#print_type').change(function() {
		var selected_type = $('#print_type option:selected').text();
		// alert("test");
		if( selected_type == "white & black with color" ) {
			$('.display_paper_range').css('display','block');
		}
		else {
			$('.display_paper_range').css('display','none');
		}
	});
	//  == Add input box when selected white & black and color End ==

	//  ==  Clone and Remove Start ==

	var cloneIndex = $(".upload_clone_holder").length;
	function clone(){
	   	var path_section_clone = $(this).parents('.upload_section');
		path_section_clone.find('#upload_clone_holder').clone()
	  	.val("")
	  	.insertAfter('.upload_clone_holder:last')
	  	.attr("id", "upload_clone_holder" +  cloneIndex);
	  	// var input_file = path_section_clone.children('#upload_clone_holder'+cloneIndex).find('.uploadFile');
	  	// input_file.attr("id","file_upload"+cloneIndex);

	  	// path_section_clone.find('#file_upload').clone()
	  	// .val("")
	  	// .appendTo('.upload_range_section')
	  	// .attr("id", "file_upload" +  cloneIndex);
	  	// cloneIndex++;
	  	// path_section_clone.find('#uploadTrigger').clone()
	  	// .val("")
	  	// .appendTo('.upload_range_section')
	  	// .attr("id", "uploadTrigger" +  cloneIndex);
	  	// path_section_clone.find('#file_name_extension').clone()
	  	// .text("")
	  	// .appendTo('.upload_range_section')
	  	// .attr("id", "file_name_extension" +  cloneIndex);
	  	cloneIndex++;
	}
	function remove(){
	 	var path_section_remove1=$('.upload_clone_holder:last').attr('id');
	 	// var path_section_remove2=$('.uploadbutton:last').attr('id');
	 	// var path_section_remove3=$('.file_name_extension:last').attr('id');
		var path_section_remove=jQuery('#'+path_section_remove1);
		// var path_section_remove_browse=jQuery('#'+path_section_remove2);
		// var path_section_remove_file_name=jQuery('#'+path_section_remove3);
	 	path_section_remove.remove();
	 	// path_section_remove_browse.remove();
	 	// path_section_remove_file_name.remove();
	}
	$('.clone_upload').on("click", clone);
	$('.remove').on("click", remove);

	//  ==   Clone and Remove End ==

	//  == Print Booking Empty Validation Start ==

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
		} // Binding type validation
		else {
			$('#binding_type').removeClass('error_print_booking_field');
		}
		
		if($('.display_paper_range').css('display') == 'block') {
			if($('.display_range_page').css('display') == 'none') {
				$('.display_normal_file').each(function() {
					var id_normal_file = $(this).attr('id');
					var file_id = jQuery('#'+id_normal_file);
					if (document.getElementById(id_normal_file).selectedIndex < 1){
						file_id.addClass('error_print_booking_field');
					}
					else {
						file_id.removeClass('error_print_booking_field');	
					}
				});
			}
			else {
				$('.display_normal_file').removeClass('error_print_booking_field');
				$('.display_range_page').each(function() {
					var id_content_file = $(this).attr('id');
					var content_file_id = jQuery('#'+id_content_file);
					if (document.getElementById(id_content_file).selectedIndex < 1){
						content_file_id.addClass('error_print_booking_field');
					}
					else {
						content_file_id.removeClass('error_print_booking_field');	
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

		if (jQuery(":input").hasClass("error_print_booking_field") || jQuery("select").hasClass("error_print_booking_field")) {
			// $('.error_print_booking').css('display','block');
			return false;
		}else {
			// $('.error_print_booking').css('display','none');
			errornotice.hide();
			return true;
		}
	});
	
	//  == Print Booking Empty Validation End ==


});  