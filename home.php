
<?php 
	include('header.php'); 
	if(!isset($_SESSION['usertype'])){
		if($_POST){
			$usertype = $_POST['user_type'];
			if(trim($usertype) == 'stu'){
				$_SESSION['usertype'] = 'stu';
				$_SESSION['college_id'] =trim($_POST['stu_college']);
				$_SESSION['city'] = (isset($_POST['print_book_city_name'])?$_POST['print_book_city_name']:$_SESSION['print_book_city_name']);
				$_SESSION['area_id'] =trim($_COOKIE['area_id']);
				//unset($_SESSION['area_id']);
				
			}
			
			if(trim($usertype) == 'pro'){
				$_SESSION['usertype'] = 'pro';
				$_SESSION['city'] = (isset($_POST['print_book_city_name'])?$_POST['print_book_city_name']:$_SESSION['print_book_city_name']);
				// $_SESSION['state_id'] =trim($_POST['pro_state']);
				$_SESSION['area_id'] =trim($_COOKIE['area_id']);
				unset($_SESSION['college_id']);
			}
		}
	}
	else if(isset($_SESSION['usertype'])){
		if($_POST){
			if($_SESSION['usertype'] != $_POST['user_type']){
				if(trim($_POST['user_type']) == 'stu'){
					$_SESSION['usertype'] = 'stu';
					$_SESSION['college_id'] =trim($_POST['stu_college']);
					$_SESSION['city'] = (isset($_POST['print_book_city_name'])?$_POST['print_book_city_name']:$_SESSION['print_book_city_name']);
					$_SESSION['area_id'] =trim($_COOKIE['area_id']);
					//unset($_SESSION['area_id']);
				}
				if(trim($_POST['user_type']) == 'pro'){
					$_SESSION['usertype'] = 'pro';
					$_SESSION['city'] = (isset($_POST['print_book_city_name'])?$_POST['print_book_city_name']:$_SESSION['print_book_city_name']);
					//$_SESSION['state_id'] =trim($_POST['pro_state']);
					$_SESSION['area_id'] =trim($_COOKIE['area_id']);
					unset($_SESSION['college_id']);
				}
			}
		}
	}
	//print_r($_SESSION);
	$offerquery = "select * from stork_offer_details where offer_type = 'customer_offer' and  offer_status = '1' and DATE(offer_validity_end_date) > DATE(NOW())";
	$offerdata = mysqli_query($connection, $offerquery);
	$amount_dataarrya = mysqli_fetch_array($offerdata);
?>

	<main class="main index">
		<!--Home slider : Begin-->
		<section class="home-slidershow">
			<div class="slide-show">
				<div class="vt-slideshow">
					<ul>
						<li class="slide1" data-transition="random" ><img src="images/slider/home/Print2.jpg" alt="project_binding" width="1920px" height="598px"/>
							<div class="tp-caption lfr" data-x="left"  data-hoffset="" data-y="170" data-start="800" data-speed="2000" data-endspeed="300"><span class="slide_style1">PLAIN PRINTING</span></div> 
							<div class="tp-caption lfb" data-x="left"  data-hoffset="" data-y="225" data-start="800" data-speed="2000" data-endspeed="300">
								<span class="slide_style2">
									Print Black & white and colour pages in A3, A4 and Legal size online <br> and get delivered within 8 working hours.
								</span>
							</div>
							<!-- <div class="tp-caption lfb" data-x="left" data-y="367" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><a class="btn-sn" href="#">buy now </a></div> -->
							<?php
							// if(mysqli_num_rows($offerdata)){
							?>
							<!-- <div class="tp-caption lfr offer-zone1" style="width:100%;padding: 20px;" data-x="left" data-y="367" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><span>Offer Code: <?php echo $amount_dataarrya['offer_code']; ?> <em>Vaild till <?php echo date("d M Y", strtotime($amount_dataarrya['offer_validity_end_date'])); ?>.</em></span></div> -->
							<?php
							// }
							?>																																																																			
						</li>
						<li class="slide2" data-transition="random" ><img src="images/slider/home/print3.jpg" alt="cabin_booking" width="1920px" height="598px" />
							<div class="tp-caption lfr" data-x="left"  data-hoffset="" data-y="170" data-start="800" data-speed="2000" data-endspeed="300"><span class="slide_style1">CABIN BOOKING</span></div> 
							<div class="tp-caption lfb" data-x="left"  data-hoffset="" data-y="225" data-start="800" data-speed="2000" data-endspeed="300">
								<span class="slide_style2">
									Book your private cabin online with 3 Mbps speed,<br/> Headset and Webcam facilities and feel the ultimate <br/>printing.
								</span>
							</div>
							<?php
							// if(mysqli_num_rows($offerdata)>0){
							?>
							<!-- <div class="tp-caption lfr" data-x="left" data-y="367" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><a class="btn-sn" href="#">buy now</a></div>  -->
							<!-- <div class="tp-caption lfr offer-zone2" style="width:100%;padding: 20px;" data-x="left" data-y="367" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><span>Offer Code: <?php echo $amount_dataarrya['offer_code']; ?> <em>Vaild till <?php echo date("d M Y", strtotime($amount_dataarrya['offer_validity_end_date'])); ?>.</em></span></div> -->
							<?php
							// }
							?>	
						</li>
						<li class="slide3" data-transition="random" ><img src="images/slider/home/bg_slider_3.jpg" alt="" />
							<div class="tp-caption lft" data-x="left"  data-hoffset="" data-y="170" data-start="800" data-speed="2000" data-endspeed="300"><span class="style1">MULTICOLORS</span></div> 
							<div class="tp-caption lfb" data-x="left"  data-hoffset="" data-y="225" data-start="800" data-speed="2000" data-endspeed="300">
								<span class="style2">
									Experience the taste of new colour on cheap price <br> <br>
									Print flyers, Pamphlets, Brochures, Multi-colour notice <br> and lot more online.   
								
								</span>
							</div>
							<?php
							// if(mysqli_num_rows($offerdata)>0){
							?>
							<!-- <div class="tp-caption lfl" data-x="left" data-hoffset="" data-y="365" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><a class="btn-sn" href="#">buy now</a></div>  -->
							<!-- <div class="tp-caption lfr offer-zone3" style="width:100%;padding: 20px;" data-x="left" data-y="367" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><span>Offer Code: <?php echo $amount_dataarrya['offer_code']; ?> <em>Vaild till <?php echo date("d M Y", strtotime($amount_dataarrya['offer_validity_end_date'])); ?>.</em></span></div> -->
							<?php
							// }
							?>	
						</li>
						<li class="slide4" data-transition="random" ><img src="images/slider/home/bg_slider_4.jpg" alt="" />
							<!-- <div class="tp-caption lft" data-x="left"  data-hoffset="" data-y="170" data-start="800" data-speed="2000" data-endspeed="300"><span class="style1">MULTICOLORS</span></div> 
							<div class="tp-caption lfb" data-x="left"  data-hoffset="" data-y="225" data-start="800" data-speed="2000" data-endspeed="300">
								<span class="style2">
									Our A5 flyers and leaflets are our bestselling size.<br> 
									This is because they're perfect for potential prospects<br>  
									to carry around and are extremely cost effective. We<br> 
									currently have an offer of 1000 flyers and leaflets<br> 
									for only &pound; 24!
								</span>
							</div>
							<div class="tp-caption lfl" data-x="left" data-hoffset="" data-y="365" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><a class="btn-sn" href="#">buy now</a></div>  -->
							<?php
							// if(mysqli_num_rows($offerdata)>0){
							?>
							<!-- <div class="tp-caption lfr offer-zone4" style="width:100%;padding: 20px;" data-x="left" data-y="367" data-start="1300" data-speed="2000" data-easing="easeInOutQuint" data-endspeed="300"><span>Offer Code: <?php echo $amount_dataarrya['offer_code']; ?> <em>Vaild till <?php echo date("d M Y", strtotime($amount_dataarrya['offer_validity_end_date'])); ?>.</em></span></div> -->
							<?php
							// }
							?>
						</li>
					</ul> 
				</div>
			</div>
		</section>
		
		<!--Home Trust : Begin-->
		<section class="trust-w hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 block-trust trust-col-quantity">
						<a href="printbooking.php?service=plain" id="home_plain_printing"><div class="tr-icon"><i class="fa fa-file-text-o"></i></div></a>
						<div class="tr-text">
							<h3>Plain Printing</h3>
							<span class="tr-line"></span>
							<p style="display:none;">Bright inks. Thick Paper. Precise cuts. We believe that quality printing matters.  That quality printing matters.</p>
							<a style="display:none;" href="#" class="btn-readmore" title="Quality Printing">Read more</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 block-trust trust-col-time-delivery">
						<a href="printbooking.php?service=project" id="home_project_printing"><div class="tr-icon"><i class="fa fa-book"></i></div></a>
						<div class="tr-text">
							<h3>Project Printing</h3>
							<span class="tr-line"></span>
							<p style="display:none;">No printer is faster. Order today by 8:00pm EST and you can even get it tomorrow.</p>
							<a style="display:none;" href="#" class="btn-readmore" title="Timely Delivery">Read more</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 block-trust trust-col-eco-minded">
						<a href="cabin_booking.php">
							<div class="tr-icon"><i class="fa fa-life-buoy"></i></div>
							<div class="tr-text">
								<h3>Cabin Booking</h3>
								<span class="tr-line"></span>
								<p style="display:none;">
									Overnight Prints is the greenest online printer in the world. See our Waterless technology. 
								</p>
								<a style="display:none;" href="#" class="btn-readmore" title="Eco-Minded">Read more</a>
							</div>
						</a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 col-sm-6 block-trust trust-col-eco-money">
						<a href="printbooking.php?service=multi" id="home_multi_printing"><div class="tr-icon"><i class="fa fa-paint-brush"></i></div></a>
						<div class="tr-text">
							<h3>Multicolors</h3>
							<span class="tr-line"></span>
							<p style="display:none;">
								Most sellers work with buyers to quickly resolve issues, but if a solution isn't reached, we can help.
							</p>
							<a style="display:none;" href="#" class="btn-readmore" title="Eco-Minded">Read more</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 block-trust trust-col-eco-money">
						<div class="tr-icon testcolor"><i class="fa fa-heart-o"></i></div>
						<div class="tr-text">
							<h3>Personalized Products</h3>
							<span class="tr-line"></span>
							<p style="display:none;">
								Most sellers work with buyers to quickly resolve issues, but if a solution isn't reached, we can help.
							</p>
							<a style="display:none;" href="#" class="btn-readmore" title="Eco-Minded">Read more</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 block-trust trust-col-eco-money">
						<div class="tr-icon testcolor hover_a"><i class="fa fa-map-o"></i></div>
						<div class="tr-text">
							<h3>Design Template</h3>
							<span class="tr-line"></span>
							<p style="display:none;">
								Most sellers work with buyers to quickly resolve issues, but if a solution isn't reached, we can help.
							</p>
							<a style="display:none;" href="#" class="btn-readmore" title="Eco-Minded">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</section><!--Home Trust : End-->
		<!--Home out recent : Begin -->
		<section class="home-out-recent">
			<div class="container">
				<div class="row">
					<div class="block-title-w">
						<h2 class="block-title">Popular Products</h2> 
						<span class="icon-title">
							<span></span>
							<i class="fa fa-star"></i>
						</span>
						<ul>
							<li class="active"><a data-toggle="tab" href="#tab11">All projects</a></li>
							<li><a data-toggle="tab" href="#tab21">Leaflets & Flyers</a></li>
							<li><a data-toggle="tab" href="#tab31" class="last">visiting card</a></li>
							<li><a data-toggle="tab" href="#tab41" class="last">Personalized gift</a></li>
							<li><a data-toggle="tab" href="#tab51" class="last">3d product</a></li>
							<!-- <li><a data-toggle="tab" href="#tab61" class="last">Presentation</a></li> -->
							<li><a data-toggle="tab" href="#tab71" class="last">Design Template</a></li>
							<li><a data-toggle="tab" href="#tab81" class="last">Multicolor</a></li>
							<li><a data-toggle="tab" href="#tab91" class="last">Project binding</a></li>
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="tab11">	
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/5.png" alt="service-05"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/6.png" alt="service-06"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/7.png" alt="service-07"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/8.png" alt="service-08"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/9.png" alt="service-09"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/11.png" alt="service-10" />
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/12.png" alt="service-10"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>							
						</div> 
						<div class="tab-pane" id="tab21">	
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<img src="images/our_service/7.png" alt="service-05"/>
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<!-- <img src="images/our_service/7.png" alt="service-06"/> -->
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<!-- <img src="images/our_service/7.png" alt="service-08"/> -->
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div>							
							</div> 
						<div class="tab-pane" id="tab31">	 
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<img src="images/our_service/12.png" alt="service-06"/>
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div> 
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<!-- <img src="images/our_service/12.png" alt="service-08"/> -->
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<!-- <img src="images/our_service/12.png" alt="service-05"/> -->
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div>							
							</div> 
						<div class="tab-pane" id="tab41">	 
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<img src="images/our_service/9.png" alt="service-06"/>
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<!-- <img src="images/our_service/9.png" alt="service-07"/> -->
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
									<!-- <div class="w-block-recent"> -->
										<div class="image-recent">
											<a href="#">
												<!-- <img src="images/our_service/9.png" alt="service-08"/> -->
											</a>
										</div>
										<!-- <div class="info-recent">
											<h2 class="title">eSliproser Postcards</h2>
											<div class="text-recent">
												<p>
													Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
												</p>
											</div>
											<a href="#" class="read-more">read more</a>
										</div> -->
									<!-- </div> -->
								</div> 							
							</div> 
						<div class="tab-pane" id="tab51">	 
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/5.png" alt="service-06"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/5.png" alt="service-07"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div> 
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/5.png" alt="service-05"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>							
						</div> 
						<div class="tab-pane" id="tab61">	 
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/10.png" alt="service-06"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/10.png" alt="service-07"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/10.png" alt="service-08"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>				
						</div> 
						<div class="tab-pane" id="tab71">	
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/6.png" alt="service-10"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/6.png" alt="service-05"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div> 
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/6.png" alt="service-07"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>							
						</div> 
						<div class="tab-pane" id="tab81">	
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/8.png" alt="service-05"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/8.png" alt="service-06"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/8.png" alt="service-07"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>						
						</div> 
						<div class="tab-pane" id="tab91">	
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<img src="images/our_service/11.png" alt="service-05"/>
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<!-- <div class="w-block-recent"> -->
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/11.png" alt="service-06"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 block-recent">
								<div class="w-block-recent">
									<div class="image-recent">
										<a href="#">
											<!-- <img src="images/our_service/11.png" alt="service-07"/> -->
										</a>
									</div>
								<!-- <div class="info-recent">
										<h2 class="title">eSliproser Postcards</h2>
										<div class="text-recent">
											<p>
												Celebrate 2016 in style with our beloved Mini Photo Wall Calendar. Printed on eggshell paper, make your own calendar in minutes with 12 special photos.
											</p>
										</div>
										<a href="#" class="read-more">read more</a>
									</div> -->
								<!-- </div> -->
							</div>						
						</div> 
					</div>
				</div>
			</div>
		</section>
	</main>  
<?php include('footer.php') ?>
<?php
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>