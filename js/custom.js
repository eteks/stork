function error_popup(message){
	$('.error_popup_msg .success-alert span').text(message);
	$('.popup_fade').show();
	$('.error_popup_msg').show();
	document.body.style.overflow = 'hidden';
}

//  == Added by siva ==

//  ==  Clone and Remove Start ==

	var cloneIndex = $(".paper_range").length;
	function clone(){
		// alert("test");
    	var path_section_clone = $(this).parents('.upload_range_button').children('.upload_file_holder');
    	 path_section_clone.find('#print_page_range').clone()
      	 .val("")
      	 .appendTo('.upload_range_section')
      	 .attr("id", "print_page_range" +  cloneIndex);
      	 cloneIndex++;
		}
		function remove(){
		 	var path_section_remove1=$('.paper_range:last').attr('id');
      		var path_section_remove=jQuery('#'+path_section_remove1);
		 	path_section_remove.remove();
		}
		$('.clone').on("click", clone);
		$('.remove').on("click", remove);

//  ==   Clone and Remove End ==


$(document).ready(function () { 
// 	== Add input box when selected white & black and color Start ==
	$('#print_type').change(function() {
		var selected_type = $('#print_type option:selected').text();
		// alert("test");
		if( selected_type == "white & black and color" ) {
			$('#print_page_range').css('display','block');
			$('.pos_rel').css('display','block');
		}
		else {
			$('#print_page_range').css('display','none');
			$('.pos_rel').css('display','none');
		}
	});
// 	== Add input box when selected white & black and color End ==


//  == Print Booking Validation Start ==

	$('#print_booking_form').submit(function(){
		for(i=0;i<required_print_booking.length;i++) {
			var input = jQuery('#'+required_print_booking[i]);
			if ((input.val() == "")) 
			{
				input.addClass("error_print_booking_field");
			} else {
				input.removeClass("error_print_booking_field");
			}
		}
		if($('#print_page_range').css('display') == 'block') {
			var input1 = jQuery('#'+"print_page_range");
			if ((input1.val() == "")) 
			{
				input1.addClass("error_print_booking_field");
			} else {
				input1.removeClass("error_print_booking_field");
			}
		}
	 	if (document.getElementById('print_type').selectedIndex < 1){
			$('#print_type').addClass('error_print_booking_field');
		}
		else{ 
			$('#print_type').removeClass('error_print_booking_field');
		}
		if (document.getElementById('print_side').selectedIndex < 1){
			$('#print_side').addClass('error_print_booking_field');
		}
		else{ 
			$('#print_side').removeClass('error_print_booking_field');
		}
		if (document.getElementById('paper_type').selectedIndex < 1){
			$('#paper_type').addClass('error_print_booking_field');
		}
		else{ 
			$('#paper_type').removeClass('error_print_booking_field');
		}
		if (document.getElementById('paper_size').selectedIndex < 1){
			$('#paper_size').addClass('error_print_booking_field');
		}
		else{ 
			$('#paper_size').removeClass('error_print_booking_field');
		}
		if (jQuery(":input").hasClass("error_print_booking_field") || jQuery("select").hasClass("error_print_booking_field")) {
			$('.error_print_booking').css('display','block');
			return false;
		}else {
			$('.error_print_booking').css('display','none');
			errornotice.hide();
			return true;
		}
	});
	
//  == Print Booking Validation End ==

//  == Add and Remove Button Start ==

	$('.remove').css('display','none');
	$('.clone, .remove').on('click',function() {
		var input_length=$('.paper_range').length;
		if(input_length <= 1) {
		$('.remove').css('display','none');
		}
		else {
			$('.remove').css('display','block');
		}
	});

//  == Add and Remove Button End ==

//  == Validation for Page range Keycode Start ==

   $("#print_page_range").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
   });

//  == Validation for Page range Keycode End ==

//  == Validation for Page range Format Start ==

	$('#print_page_range').keyup(function() {
		var inputVal=$('#print_page_range').val();
	  	var num0to255Regex = new RegExp("^(\\s*\\d+\\s*\\-\\s*\\d+\\s*,?|\\s*\\d+\\s*,?)+$");
	  	if(!num0to255Regex.test(inputVal) && inputVal!=0) {
	  		$('.page_range_error').css('display','block');
	  	}
	 	else {
	  		$('.page_range_error').css('display','none');
	  	}
	});

//  == Validation for Page range Format End ==

//  == Ended by siva ==

	required_login = ["username_email", "login_password"];
	required_forget = ["forget_email"];
	required_signup=["firstname","lastname","username","password","repassword","email","mobile","dob","captcha"];
	required_print_booking=["total_pages"];
	reg_email=jQuery("#email");
	forget_email=jQuery("#forget_email");
	print_type=jQuery("#print_type");
	print_side=jQuery("#print_side");
	paper_type=jQuery("#paper_type");
	paper_size=jQuery("#paper_size");
	errornotice = jQuery("#error");
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
		//if any inputs on the page have the class 'error_input_field' the form will not submit
		if (jQuery(":input").hasClass("error_input_field") ) {
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
	
	
	// customized browse button in order page
	$(document).on('click',"#print_booking_form .uploadbutton",function(){
		$(this).parents('.upload_file_holder').find('.uploadFile').click();
	});
	
	// upload file holder add button
	$(document).on('click','#print_booking_form .add_btn',function(){
		if($('#print_booking_form .upload_file_holder:last .print_book_color_page_no').val() && $('#print_booking_form .upload_file_holder:last .uploadFile').val() != ''){
			var clone_content = $('#print_booking_form .upload_file_holder:last').clone();
			clone_content.find('.print_book_color_page_no').val('');
			clone_content.insertAfter($('#print_booking_form .upload_file_holder:last'));
			
		}
		
	});
	// upload file holder del button
	$('#print_booking_form .del_btn').on('click',function(){
		alert($('.upload_file_holder').length);
		if($('.upload_file_holder').length!=1){
			$('#print_booking_form .upload_file_holder:last').remove();	
		}
		
	});
	
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
	
	//total cost amoutn display based on total no of pages and per page amount
	$('.print_total_no_of_pages').on('blur',function(){

		var perpageamount = ($('#print_booking_form .per_page_costing').val()?$('#print_booking_form .per_page_costing').val():'');
		var total_amount = $(this).val();
		if(perpageamount){
			$('.print_total_amount').val(perpageamount*total_amount).attr('readonly','readonly');
		}else{
			error_popup('Please select print type,print side,paper size,paper type!');
			$(this).val('');
		}
		
	});
	
	// post from when click button and submit type
	$('.print_add_to_cart_btn').on('click',function(){
		$('#print_booking_form .submit_type').val('add_to_cart');
		$('#print_booking_form').submit();
	});
	
	// post form when click check button in print booking page and submit type
	$('.print_check_out_btn').on('click',function(){
		$('#print_booking_form .submit_type').val('add_to_checkout');
		$('#print_booking_form').submit();
	});
	
	// allowed only number , subtract and 
	$(document).on('keypress','#print_booking_form .print_book_color_page_no',function(e){
		 if (e.which != 8 &&  e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 44 && e.which !=45) {
		 	  return false;
		 }
	});
	
	// restrict page range validation
	var page_range_validation = /^([1-9][0-9]{0,2}|[1-9][0-9]{0,2}-[1-9][0-9]{0,2})(,([1-9][0-9]{0,2}|[1-9][0-9]{0,2}-[1-9][0-9]{0,2}))*$/g;
	// $(document).on('blur','#print_booking_form .print_book_color_page_no',function(){
		// if($(this).val() != ''){
			// var valid = page_range_validation.test($(this).val());
			// if(!valid){
 				// error_popup('Invalid page range format!');
 				// return false;
 			// }
		// }
	// });
	
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
	
	// form post when click paynow button
	$('.check_out_payment').click(function(){
		$('#print_checkout_form').submit();
	});
	
});

