jQuery(document).ready(function() {
	required_login = ["username_email", "login_password"];
	required_forget = ["forget_email"];
	required_signup=["firstname","lastname","username","reg_email","password","repassword"];
	// If using an ID other than #email or #error then replace it here
	// email = jQuery("#email");
	// state = jQuery("#state");
	reg_email=jQuery("#reg_email");
	forget_email=jQuery("#forget_email");
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
	// Validate the e-mail.
		// if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
		// 	email.addClass("error_input_field");
		// 	$('#information_bar').addClass('error_h');
			//email.val(emailerror);
		// }
	//  select field

	// if (document.getElementById('state').selectedIndex < 1)
	// 	{
	// 		$('#state').addClass('select_error');
	// 	}
	// 	else { $('#state').removeClass('select_error'); }
		
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field")  ) {
			return false;
		} else {
			errornotice.hide();
			alert("success");
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

		if($('#password').val() != $('#repassword').val()) {
			$('#repassword').addClass("error_input_field");
        }
        else {
			$('#repassword').removeClass("error_input_field");
        }

	// Validate the e-mail.
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
			reg_email.addClass("error_input_field");
		}
//if any inputs on the page have the class 'error_input_field' the form will not submit
	if (jQuery(":input").hasClass("error_input_field") ) {
			return false;
		} else {
			errornotice.hide();
			alert("success");
			return true;
		}
	});

});

