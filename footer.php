<footer>
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-12 about-us footer-col">
						<h2>About Us</h2>
						<div class="footer-content">
							<a href="index.php" title="printstork logo footer" class="logo-footer">
								<img src="images/printstork_footer_logo.png" width="90%"  height="auto" alt="logo footer">
							</a>
							<ul class="info">
								<li>
									<i class="fa fa-home"></i>
									<span><a>Door no: 2A,</a><span>
								</li>
								<li>
									<span><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karuvadikuppam Main road,</a></span>
								</li>
								<li>
									<span><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kaniya garden, Muthialpet-3.</a></span>
								</li>
								<li>
									<i class="fa fa-phone"></i>
									<span style=" padding-left: 4px !important;"><a> 9655707844, 8428380001</a></span>
								</li>
								<li class="footer_icon">
									<i class="fa fa-envelope-o"></i>
									<span><a id="testfooter" href="mailto:support@printstork.com" title="send mail to Printstork">support@printstork.com</a></span>

								</li>
								<li class="footer_icon">
									<i class="fa fa-envelope-o"></i>
									<span><a id="testfooter" href="mailto:info@printstork.com" title="send mail to Printstork">info@printstork.com</a></span>

								</li>
								<li class="footer_icon">
									<i class="fa fa-envelope-o"></i>
									<span><a id="testfooter" href="mailto:admin@printstork.com" title="send mail to Printstork">admin@printstork.com</a></span>

								</li>
							</ul>
							<ul class="footer-social">
								<li>
									<a href="https://www.facebook.com/Print-Stork-145625759197915/?ref=aymt_homepage_panel" title="Facebook">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/printstork" title="Twiter">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a href="https://plus.google.com/u/0/" title="Google plus">
										<i class="fa fa-google-plus"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12 corporate footer-col">
						<h2>Services</h2>
						<div class="footer-content">
							<ul class="services-link">
								<li>
									<a title="Plain Printing" href="printbooking.php?service=plain">Plain Printing</a>
								</li>
								<li>
									<a title="Project Printing" href="printbooking.php?service=project">Project Printing</a>
								</li>
								<li>
									<a title="Cabin Booking" href="cabin_booking.php">Cabin Booking</a>
								</li>
								<li>
									<a  title="Multicolors" href="printbooking.php?service=multi">Multicolors</a>
								</li>
								<li>
									<a  title="Personalized Products">Personalized Products</a>
								</li>
								<li>
									<a  title="Design Template">Design Template</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12 support footer-col">
						<h2>Feedback</h2>
						  <div class="footer-content">
							<form id="footer" method="post">
									<div class="">
	 									<span class="error_footer"> Please fill all required(*) fields </span>
									</div>
									<div class="">
	 									<span class="error_email3"> Please Enter Valid email address </span>
									</div>
									<div class="">
										<ul>
											<li>
												<a  title="My Name">Name</a><span class="required">*</span></label>
												<input type="text" autocomplete="off" id="footer_name" name="feedback_name" value="">
											</li>
											<li>
												<a  title="My Email Id">Your Email Id</a><span class="required">*</span></label>
												<input type="text" class="forget_email3" id="footer_email" autocomplete="off" name="feedback_email" value="">
											</li>
											<li>
												<a  title="My Message">Message</a><span class="required">*</span></label>
												<textarea cols="27" id="message" autocomplete="off" rows="3" style="resize: none" name="feedback_msg" maxlength="150"></textarea>
												<input type="hidden" name="redirect_url" value="<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" />
											</li>
											<li>
												<button type="submit"class="gbtn footer_btn">Submit</button>
											</li>
										</ul>
									</div>
						      </form>
						  </div>    
					   </div>					
					<div class="col-md-3 col-xs-12 other-info footer-col hidden-sm">
						<h2>Other Info</h2>
						<div class="footer-content">
							<p>
								Printstork provides fast online printing for both homes and businesses. We  provide high quality business cards, postcards, flyers, brochures, stationery and  other premium online print products.
							</p>
							<img src="images/footer-payment.png" alt="Payment method">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<p class="copy-right">Copyrights @ 2016. All rights Reserved by PrintStork.</p>
					</div>
					<div class="partner_footer col-md-6 col-sm-12 col-xs-12">
						<p class="dev_partner" style="text-align: right;">Development Partner<a href="http://www.atomicka.com" target="_blank"> Infom Atomicka (Tech) Pvt Ltd.</a></p>
						<a href="#" id="back-to-top">
							<i class="fa fa-chevron-up"></i>
							Top
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div id="sitebodyoverlay"></div>
	<!---   Pop up error msg--->
	<div class="popup_fade cancel_btn"></div> 
 	<div class="error_popup_msg">
	 	<div class="success-alert">
	 		<span></span>
	 	</div><!--- --->
	 	<input type="submit" class="btn btn-primary alert_btn" value="OK">
 	</div><!--success_msg-->
	<!--Add js lib-->
	<script type="text/javascript" src="js/jquery/jquery-1.11.3.min.js"></script> 
	<script type="text/javascript" src="js/jquery/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/Chart.js"></script> 
    <script type="text/javascript" src="js/doughnutit.js"></script> 
	<script type="text/javascript" src="js/slideshow/jquery.themepunch.revolution.js"></script>   
	<script type="text/javascript" src="js/slideshow/jquery.themepunch.plugins.min.js"></script>  
    <script type="text/javascript" src="js/theme-home.js"></script>
 	<script type="text/javascript" src="js/theme.js"></script>
 	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="js/dateofbirth.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/cookie.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript">
    	$("#dob").birthdayPicker();
	</script>
<?php
if(isset($_POST['feedback_name'])) {
		$to				= $feed_back_to_mail_address;
  		$feedback_name	= $_POST['feedback_name'];
		$feedback_email	= $_POST['feedback_email'];
		$feedback_msg 	= $_POST['feedback_msg'];
		$redirect_url   = $_POST['redirect_url'];
      	$subject 		= "Feed back";
		$message		= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$message	   .= '<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Answer Connect</title></head>';
		$message       .= '<body bgcolor="#f5f6f7" style="padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">';
		$message	   .= '<table width="600px" cellpadding="0" cellspacing="0" border="0" style="margin:19px auto 16px auto; border:1px solid #d6d6d6; border-width:0px 1px 1px; border-radius:0px 0px 6px 6px;  background:#fff;">';
		$message   	   .= '<tr style="font-family:Helvetica,Arial,sans-serif;font-size:14px;margin:0;color:#fff;"><td valign="top" bgcolor="#00B4FF" align="center" colspan="2"><h2>Feedback</h2></td></tr>';
		$message	   .= '<tr height="25px"><td width="142" style="padding:0px 0px 0px 20px; line-height:18px; color:#4c4c4c;"><b>Name:</b></td><td style="color:#4c4c4c;">'.$_POST['feedback_name'].'</td></tr>';
		$message	   .= '<tr height="25px"><td style="padding:0px 10px 0px 20px; color:#4c4c4c; line-height:18px;"><b>Email address:</b></td><td style="color:#4c4c4c;">'.$_POST['feedback_email'].'</td></tr>';
		$message 	   .= '<tr><td valign="top" style="padding:4px 10px 0px 20px; color:#4c4c4c;"><b>Message:</b></td><td valign="top"><p style="line-height:22px; padding:2px 20px 0px 0px; margin:0px; color:#4c4c4c;">'.$_POST['feedback_msg'].'</p></td></tr>';
		$message	   .= '<tr><td colspan="2" style=" border-bottom:1px solid #d6d6d6;" height="1px">&nbsp;</td></tr>';
		$message	   .= '</table>';
		$message	   .= '</body>';
		$message	   .= '</html>';
		
		$headers 		= "From: ".$_POST['feedback_email']."\r\n";
		$headers 	   .= "Reply-To: ".$_POST['feedback_email']."\r\n";
		$headers 	   .= "MIME-Version: 1.0\r\n";
		$headers 	   .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$send=mail($to, $subject, $message, $headers);
		
		if($send) {
?>
		<script type="text/javascript">
			error_popup('Thanks for your valuable feedback!');
		</script>
<?php
		}
		else {
?>
		<script type="text/javascript">
			error_popup('Feedback was not received to us. Please feed again!');
		</script>
<?php
		}
  	}
?>
</body>
</html>