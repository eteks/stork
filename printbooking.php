<?php 
	include('header.php');
	if(!isset($_SESSION['usertype'])){
		//header('Location:index.php');
		die('<script type="text/javascript">window.location.href="index.php";</script>');
		exit();
	}
	$_SESSION['service'] = 'print';
	$random = uniqid();
	if(!isset($_SESSION['session_id'])){
		if($_SESSION['login_status'] == 1 && $_SESSION['usertype'] == 'stu'){
			$_SESSION['session_id'] = 'reg_stu_'.$random; 
		}
		else if($_SESSION['login_status'] == 1 && $_SESSION['usertype'] == 'pro'){
			$_SESSION['session_id'] = 'reg_pro_'.$random;
		}
		else if($_SESSION['login_status'] == 0 && $_SESSION['usertype'] == 'stu'){
			$_SESSION['session_id'] = 'gue_stu_'.$random;
		}
		else if($_SESSION['login_status'] == 0 && $_SESSION['usertype'] == 'pro'){
			$_SESSION['session_id'] = 'gue_pro_'.$random;
		}
	}
	//print_r($_SESSION);
?>
	<div class="main" id="product-detail">	
   	    <section class="header-page">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 hidden-xs">
						<h1 class="mh-title">Order</h1>
					</div>
					<div class="breadcrumb-w col-sm-9">
						<span class="hidden-xs">You are here:</span>
						<ul class="breadcrumb">
							<li>
								<a href="home.php">Home</a>
							</li>
							<li>
								<span>Order</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section> <!---breadcrumb-->
	    <section class="pr-main" id="pr-login">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Print Booking</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12 no_pad">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div>
			<span class="error_print_booking"> Please fill out all mandatory fields </span> <!--container-->
	    </section>	
	    <section class="pr-main" id="pr-register">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 padding_form">
					<form id="print_booking_form" class="form-validate form-horizontal form1" method="post" action="printorder.php" enctype="multipart/form-data">	
						<div class="col-md-12 col-sm-12 col-xs-12 left no_pad">
						<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
							<div class="input_holder row pad_15">
				        		<p>Print Type<span class="star">*</span></p>
				        		<select name="print_type" class="print_book_print_type" id="print_type">
				        				<option value="" >Select Print Type</option>
		        						<?php
			        							$state = selectfunction('*',PRINTTYPE,'',$connection);
												while($row = mysqli_fetch_array($state)){
													echo "<option value ='".$row['paper_print_type_id']."'>".$row['paper_print_type']."</option>";
												}
		        						?>
		        				</select>
			        		</div> <!-- input holder -->
			        	
						   	<div class="input_holder row pad_15">
			        			<p>Print Side<span class="star">*</span></p>
			        			<select name="print_side" class="print_book_print_side" id="print_side">
			        				<option value="" >Select Print Side</option>
	        						<?php
		        							$state = selectfunction('*',PAPERSIDE,'',$connection);
											while($row = mysqli_fetch_array($state)){
												echo "<option value ='".$row['paper_side_id']."'>".$row['paper_side']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15">
			        			<p>Paper Type<span class="star">*</span></p>
			        			<select name="papar_type" class="print_book_paper_type" id="paper_type">
			        				<option value="" >Select Paper Type</option>
	        						<?php
		        							$state = selectfunction('*',PAPERTYPE,'',$connection);
											while($row = mysqli_fetch_array($state)){
												echo "<option value ='".$row['paper_type_id']."'>".$row['paper_type']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15">
			        			<p>Paper Size<span class="star">*</span></p>
			        			<select name="papar_size" class="print_book_paper_size" id="paper_size">
			        				<option value="" >Select Paper Size</option>
	        						<?php
		        							$state = selectfunction('*',PAPERSIZE,'',$connection);
											while($row = mysqli_fetch_array($state)){
												echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15 binding_option">
			        			<p>Binding Required<span class="star">*</span></p>
			        			<div class="radio_holder">
			        				<input type="radio" class="print_booking_binding_required" name="binding_option" id="radio_yes" value="yes"> <span> Yes </span>
  									<input type="radio" class="print_booking_binding_required" name="binding_option" value="no" id="radio_no" checked> <span> No </span>
  								</div>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15 display_binding_type">
			        			<p>Type of Binding<span class="star">*</span></p>
			        			<select name="binding_type" class="print_book_binding_type" id="binding_type">
			        				<option value="" >Select Binding Type</option>
			        				<option value="soft_binding" >Soft Binding</option>
			        				<option value="comb_binding" >Comb Binding</option>
			        				<option value="wireo_binding" >Wireo Binding</option>
			        				<option value="spiral_binding" >Spiral Binding</option>
	        				    </select>
			        		</div> <!-- input_holder -->
			        	</div>
		        			<div class="input_holder row pad_15 upload_section">
									<p> Upload Your Files<span class="star">*</span></p>	
									<div class="upload_file_holder upload_clone_holder" id="upload_clone_holder">
										<select name="upload_files_page_type" class="select_margin display_page_type" id="page_type">
					        				<option value="" >Select Page Type</option>
					        				<option value="cover" >Cover</option>
					        				<option value="content" >Content</option>
		        				   		</select>
									 	<input type="text" name="" id="file_name_box" class="col-md-8 file_name_box style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 uploadFile" id="file_upload" name="printfiles[]"/>
		       							<div class="uploadbutton col-md-4" id="uploadTrigger">Browse</div>
		       							<!-- <div class="clear_both"> </div> -->
		       							<!-- <div class="file_name_extension" id="file_name_extension"> </div> -->
		   							</div>
		   							<div class="pos_rel" >
	   							 		<div class="add_btn clone_upload"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
	   							 		<div class="del_btn remove_upload"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
	   							 	</div>
   								</div>
   								<div class="input_holder row pad_15 upload_file_holder display_paper_range">
									<p> Paper print page number<span class="star">*</span></p>	
									<div class="file_range_holder upload_range_section" id="file_range_holder">
									 	<select name="" class="select_margin display_range_page" id="content_file">
					        				<option value="" >Select Content File Name</option>
		        				   	    </select>
		        				   	    <select name="" class="select_margin display_normal_file" id="normal_file">
					        				<option value="select_file_name" >Select File Name</option>
		        				   	    </select>
									 	<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" placeholder="Page no.1-13,15,18-23"/>
									</div>
									<div class="pos_rel" >
	   							 		<div class="add_btn clone_paper_range"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
	   							 		<div class="del_btn remove_paper_range"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>	
	   							 	</div>
   								</div>
							<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
							<div class="cb">  </div>
								<div class="input_holder row pad_15">
							 		<span class="page_range_error"> Please Enter correct format like Page no.1-13,15,18-23</span>
								</div>
							<div class="input_holder row pad_15">
							 	<p>Total No of Pages<span class="star">*</span></p>
							 	<input class="user print_total_no_of_pages" id="total_pages" type="text" value="" name="print_totalpage"> 
							</div>
							<div class="input_holder row pad_15">
							 	<p>Total Cost </p>
							 	<input class="email print_total_amount" type="text" value="" name="print_totalcost" readonly>
							</div>
							<div class="input_holder row pad_15">
							 	<p>Comments</p>
							 	<textarea rows="7" cols="50" class="textarea_print" value="" name="print_comments"></textarea>
							</div>
							</div>
							<input type="hidden" class="per_page_costing" value="" />
							<input type="hidden" class="print_book_binding_amount" value="0.00" name="print_book_binding_amount">
							<input type="hidden" class="submit_type" value="" name="submit_type" />
						</div>
					</form>
				</div>
				<div class="cb">  </div>
			</div>	
		</section>
		<section>
			<div class="container">	
		  		<div class="col-md-9 col-sm-9 col-xs-12">		
					<div class="button_holder button_holder_printbooking">
		 	       		<h4 class="btn_prf print_add_to_cart_btn" data-submit="print_add_to_cart_btn"><a>Add to cart</a></h4>
		 	     	</div>
					<div class="button_holder button_holder_printbooking">
						<h4 class="order_or_button">OR</h4>
	 	      		</div>
		 	   		<div class="button_holder button_holder_printbooking">
	        	   		<h4 class="btn_prf"><a href="printbooking.php">Clear</a></h4>
	        	   		<h4 class="btn_prf print_check_out_btn"><a>Check Out</a></h4>
	             	</div>
               	</div>
			</div>     
		</section>
		 

							<!--  </div>
							 <input type="hidden" class="per_page_costing" value="" />
							 <input type="hidden" class="submit_type" value="" name="submit_type" />						</div>
					        </div>
					<div class="cb">  </div>
				</div>	
			 </section>
			 <section>
				<div class="container">	
			  		<div class="col-md-9 col-sm-9 col-xs-12">		
						<div class="button_holder button_holder_printbooking">
			 	       		<h4 class="btn_prf print_add_to_cart_btn" data-submit="print_add_to_cart_btn"><a>Add to cart</a></h4>
			 	     	</div>
						<div class="button_holder button_holder_printbooking">
							<h4 class="order_or_button">OR</h4>
		 	      		</div>
			 	   		<div class="button_holder button_holder_printbooking">
		        	   		<h4 class="btn_prf print_add_to_cart_clear_btn"><a>Clear</a></h4>
		        	   		<h4 class="btn_prf print_check_out_btn"><a>Check Out</a></h4>
		             	</div>
	               	</div>
				</div>     
			 </section>
		 </form> -->
	</div><!-- Main Product Detail: End -->	
<?php include('footer.php') ?>