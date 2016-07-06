<?php 
	include('header.php');
	if(!isset($_SESSION['usertype'])&& !isset($_GET['service'])){
		// header('Location:index.php');
		die('<script type="text/javascript">window.location.href="index.php";</script>');
		exit();
	}
	$_SESSION['service']=$_GET['service'];
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

		<!-- Plain Printing Start-->
		<?php if($_SESSION['service']=='plain'){ ?>
	    <section class="pr-main" id="pr-login">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Plain Printing</h1>			
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
			        							$printtype = selectfunction('*',PRINTTYPE,'paper_print_type_status=1',$connection);
												while($row = mysqli_fetch_array($printtype)){
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
		        							$paperside = selectfunction('*',PAPERSIDE,'paper_side_status=1',$connection);
											while($row = mysqli_fetch_array($paperside)){
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
		        							$papertype = selectfunction('*',PAPERTYPE,'paper_type_status=1',$connection);
											while($row = mysqli_fetch_array($papertype)){
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
		        							$papersize = selectfunction('*',PAPERSIZE,'paper_size_status=1',$connection);
											while($row = mysqli_fetch_array($papersize)){
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
			        		<div class="input_holder row pad_15 print_page_option">
			        			<p>Print page type Required<span class="star">*</span></p>
			        			<div class="radio_holder">
			        				<input type="radio" name="page_type_option" id="page_radio_yes" value="yes"> <span> Yes </span>
  									<input type="radio" name="page_type_option" value="no" id="page_radio_no" checked> <span> No </span>
  								</div>
			        		</div> <!-- input_holder -->
			        	</div>
			        	<div class="clear_both"> </div>
			        	<div class="main_section_input_holder">
			        		<div class="input_holder row pad_15 cover_section_holder">
			        			<p> Upload Your Cover File<span class="star">*</span></p>
								<!-- <input type="text" name="" id="" class="style_range" value="Cover"/ disabled> -->
								<p class="label_text"> Cover </p>
								<input type="text" name="" id="cover_file_name" class="file_name_box style_range" value="No file selected"/ disabled>
								<input type="file" class="user dn upload_cover_File" id="upload_cover_File" name="cover_printfiles"/>
		    	   				<div class="cover_uploadbutton" id="cover_uploadTrigger">Browse</div>
   							</div>
   							<div class="clear_both"> </div>
							<p> Upload Your Files<span class="star">*</span></p>	
   							<div class="input_holder row pad_15 upload_section" data-sectionvalue="0" id="upload_section">
								<div class="upload_file_holder upload_clone_holder" id="upload_clone_holder">
									<!-- <input type="text" name="" id="page_type" class="select_margin display_page_type style_range" value="Content"/ disabled> -->
									<p class="label_text display_page_type"> Content </p>
								 	<input type="text" name="" id="file_name_box" data-filevalue="0" class="col-md-8 file_name_box style_range" value="No file selected"/ disabled>
									<input type="file" class="user dn col-md-8 uploadFile" id="file_upload" name="printfiles[]"/>
			       					<div class="uploadbutton col-md-4" id="uploadTrigger">Browse</div>
		   						</div>
		   						<div class="pos_rel" id="pos_rel">
   									<div class="del_btn remove_upload" id="remove_upload"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
   									<div class="add_btn clone_upload" id="clone_upload"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
	   							</div>
   							</div>
   							<p class="label_page_range"> Enter Color Page Range<span class="star">*</span>  (ex: 1-10, 20, 42-100 ) </p>
   							<div class="input_holder row pad_15 upload_file_holder display_paper_range" data-sectionvalue="0" id="display_paper_range">
								<!-- <p> Paper print page number<span class="star">*</span> <span class="page_number_format_hint">(If you need color print, please mention page number in below. Ex- page no. 1-10,20,30-40)</p>	 -->
								<div class="file_range_holder upload_range_section" id="file_range_holder">
								 	<!-- <input name="" class="select_margin display_range_page" id="content_file" placeholder="Filename" disabled> -->
		        				    <input type="text" class="select_margin display_normal_file style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
					        		<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/>
								</div>
   							</div>
   						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
							<div class="cb">  </div>
							<!-- <div class="input_holder row pad_15">
						 		<span class="page_range_error"> Please Enter correct format like Page no.1-13,15,18-23</span>
							</div> -->
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
						<input type="hidden" class="per_page_costing" value="" />
						<input type="hidden" class="submit_type" value="" name="submit_type" />
				</form>
				</div>
			</div>
			<div class="cb">  </div>
		</section> <!-- Plain Printing End-->

		<!-- Project Binding Start-->
		<?php } else if($_SESSION['service']=='project'){  ?>
		 <section class="pr-main project_printing_header" id="pr-login_project">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Project Printing</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12 no_pad">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div>
			<span class="error_print_booking"> Please fill out all mandatory fields </span> <!--container-->
	    </section>

		<section class="pr-main" id="project_printing_section">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 padding_form">
					<form id="" class="form-validate form-horizontal form1" method="post" action="printorder.php" enctype="multipart/form-data">	
						<div class="col-md-12 col-sm-12 col-xs-12 left no_pad">
							<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
								<div class="input_holder row pad_15">
				        			<p>Paper Size<span class="star">*</span></p>
				        			<select name="papar_size" class="print_book_paper_size" id="">
				        				<option value="" >Select Paper Size</option>
				        				<?php
		        							$papersize = selectfunction('*',PAPERSIZE,'paper_size_status=1',$connection);
											while($row = mysqli_fetch_array($papersize)){
												echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
											}
	        							?>
		        					</select>
				        		</div> <!-- input_holder -->
				        	 	<div class="input_holder row pad_15">
				        			<p>Paper Type<span class="star">*</span></p>
				        			<select name="papar_type" class="print_book_paper_type" id="">
				        				<option value="" >Select Paper Type</option>
				        				<?php
		        							$papertype = selectfunction('*',PAPERTYPE,'paper_type_status=1',$connection);
											while($row = mysqli_fetch_array($papertype)){
												echo "<option value ='".$row['paper_type_id']."'>".$row['paper_type']."</option>";
											}
	        							?>
		        				    </select>
				        		</div> <!-- input_holder -->
				        		<div class="input_holder row pad_15">
				        			<p>Binding Type<span class="star">*</span></p>
				        			<select name="binding_type" class="print_book_binding_type" id="">	 
				        				<option value="" >Select Binding Type</option>
				        				<option value="home_made_binding" >Handmade Binding</option>
				        				<option value="comb_binding" >Comb Binding</option>
		        				    </select>
				        		</div> <!-- input_holder -->
				        	</div>
			        		<div class="clear_both"> </div>
				        	<div class="main_section_input_holder">
				        		<div class="project_upload_section">
									<p class="label_page_paper_range"> Upload Your Files</p>
									<div class="input_holder row pad_15 upload_cover_section" id="">
										<p class="label_text" >Cover </p>
									 	<input type="text" name="" id="" data-filevalue="0" class="col-md-8 file_name_box style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 uploadFile" id="" name="printfiles[]"/>
				       					<div class="uploadbutton col-md-4" id="">Browse</div>
				   					</div>
		   							<div class="input_holder row pad_15 upload_index_page_section"id="">
										<p class="label_text" >Index Pages </p>
									 	<input type="text" name="" id="" data-filevalue="0" class="col-md-8 file_name_box style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 uploadFile" id="" name="printfiles[]"/>
				       					<div class="uploadbutton col-md-4" id="">Browse</div>
				   					</div>
				   					<div class="input_holder row pad_15 upload_content_section"id="">
										<p class="label_text" > Content </p>
									 	<input type="text" name="" id="" data-filevalue="0" class="col-md-8 file_name_box style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 uploadFile" id="" name="printfiles[]"/>
				       					<div class="uploadbutton col-md-4" id="">Browse</div>
				   					</div>
				   					<div class="pos_rel" id="">
		   								<div class="del_btn remove_upload" id=""><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
		   								<div class="add_btn clone_upload" id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
			   						</div>
			   						<div class="clear_both"> </div>
			   						<div class="input_holder row pad_15 upload_references_section"id="">
										<p class="label_text" > References </p>
									 	<input type="text" name="" id="" data-filevalue="0" class="col-md-8 file_name_box style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 uploadFile" id="" name="printfiles[]"/>
				       					<div class="uploadbutton col-md-4" id="">Browse</div>
				   					</div>
	   							</div>
	   							<div class="page_number_section">
	   								<p class="label_page_paper_range"> Enter Color Page Range<span class="star">*</span>  (ex: 1-10, 20, 42-100 ) </p>
	   								<div class="input_holder row pad_15 upload_file_holder">
	   									<p class="label_text" > Cover </p>     				  
						        		<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/>
						        		<input type="text" class="select_margin display_normal_file style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
									</div>
									<div class="input_holder row pad_15 upload_file_holder">
	   									<p class="label_text" > Index Pages </p>    		  
						        		<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/>
						        		<input type="text" class="select_margin display_normal_file style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
									</div>
									<div class="input_holder row pad_15 upload_file_holder">
	   									<p class="label_text" > Content </p>      			  
						        		<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/>
						        		<input type="text" class="select_margin display_normal_file style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
									</div>
									<div class="input_holder row pad_15 upload_file_holder">
	   									<p class="label_text" > References </p>        		  
						        		<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/>
						        		<input type="text" class="select_margin display_normal_file style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
									</div>
	   							</div>
	   						</div>
							<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
								<div class="cb">  </div>
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
			</div>
			<div class="cb">  </div>
		</section>
		<?php } ?>
		<!-- Project Binding End -->
	</div>	<!-- Main End -->
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
</div><!-- Main Product Detail: End -->	
<?php include('footer.php') ?>