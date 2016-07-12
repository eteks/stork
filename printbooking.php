<?php 
	include('header.php');
 if(!isset($_SESSION['usertype']) || !isset($_GET['service'])){
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
 

?>
	<div class="main printbooking_main_page" id="product-detail">	
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
					<?php
						$printingtype = selectfunction('*',PRINTINGTYPE,'printing_type="plain_printing"',$connection);
						$printing_type_id = mysqli_fetch_array($printingtype);
						$printing_type = $printing_type_id ['printing_type_id'];

					?>
					<form id="print_booking_form" class="form-validate form-horizontal form1" method="post" action="printorder.php" enctype="multipart/form-data">	
						<div class="col-md-12 col-sm-12 col-xs-12 left no_pad">
						<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
							<div class="input_holder row pad_15">
								<input type="hidden" name="printing_type" value="plain_printing" id="printing_type" />
				        		<p>Print Type<span class="star">&nbsp;*</span></p>
				        		<select name="print_type" class="print_book_print_type" id="print_type">
				        				<option value="" >Select Print Type</option>
		        						<?php
			        							$printtype = selectfunction('*',PRINTTYPE,"paper_print_type_status=1 AND printing_type_id='$printing_type'",$connection);
												while($row = mysqli_fetch_array($printtype)){
													echo "<option value ='".$row['paper_print_type_id']."'>".$row['paper_print_type']."</option>";
												}
		        						?>
		        				</select>
			        		</div> <!-- input holder -->
			        	
						   	<div class="input_holder row pad_15">
			        			<p>Print Side<span class="star">&nbsp;*</span></p>
			        			<select name="print_side" class="print_book_print_side" id="print_side">
			        				<option value="" >Select Print Side</option>
	        						<?php
		        							$paperside = selectfunction('*',PAPERSIDE,"paper_side_status=1 AND printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($paperside)){
												echo "<option value ='".$row['paper_side_id']."'>".$row['paper_side']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15">
			        			<p>Paper Type<span class="star">&nbsp;*</span></p>
			        			<select name="papar_type" class="print_book_paper_type" id="paper_type">
			        				<option value="" >Select Paper Type</option>
	        						<?php
		        							$papertype = selectfunction('*',PAPERTYPE,"paper_type_status=1 AND printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($papertype)){
												echo "<option value ='".$row['paper_type_id']."'>".$row['paper_type']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15">
			        			<p>Paper Size<span class="star">&nbsp;*</span></p>
			        			<select name="papar_size" class="print_book_paper_size" id="paper_size">
			        				<option value="" >Select Paper Size</option>
	        						<?php
		        							$papersize = selectfunction('*',PAPERSIZE,"paper_size_status=1 AND printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($papersize)){
												echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15 binding_option">
			        			<p>Binding Required<span class="star">&nbsp;*</span></p>
			        			<div class="radio_holder">
			        				<input type="radio" class="print_booking_binding_required" name="binding_option" id="radio_yes" value="yes"> <span> Yes </span>
  									<input type="radio" class="print_booking_binding_required" name="binding_option" value="no" id="radio_no" checked> <span> No </span>
  								</div>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15 display_binding_type">
			        			<p>Type of Binding<span class="star">&nbsp;*</span></p>
			        			<select name="binding_type" class="print_book_binding_type" id="binding_type">
			        				<option value="" >Select Binding Type</option>
			        				<option value="soft_binding" >Soft Binding</option>
			        				<option value="comb_binding" >Comb Binding</option>
			        				<option value="wireo_binding" >Wireo Binding</option>
			        				<option value="spiral_binding" >Spiral Binding</option>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15 print_page_option">
			        			<p>Print page type Required<span class="star">&nbsp;*</span></p>
			        			<div class="radio_holder">
			        				<input type="radio" name="page_type_option" id="page_radio_yes" value="yes"> <span> Yes </span>
  									<input type="radio" name="page_type_option" value="no" id="page_radio_no" checked> <span> No </span>
  								</div>
			        		</div> <!-- input_holder -->
			        	</div>
			        	<div class="clear_both"> </div>
			        	<div class="main_section_input_holder">
			        		<div class="input_holder row pad_15 cover_section_holder">
			        			<p> Upload Your Cover File<span class="star">&nbsp;*</span></p>
								<!-- <input type="text" name="" id="" class="style_range" value="Cover"/ disabled> -->
								<p class="label_text"> Cover </p>
								<input type="text" name="" id="cover_file_name" class="file_name_box style_range" value="No file selected"/ disabled>
								<input type="file" class="user dn upload_cover_File" id="upload_cover_File" name="cover_printfiles[]"/>
		    	   				<div class="cover_uploadbutton" id="cover_uploadTrigger">Browse</div>
   							</div>
   							<div class="clear_both"> </div>
							<p> Upload Your Files<span class="star">&nbsp;*</span></p>	
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
   							<p class="label_page_range"> Enter Color Page Range<span class="star">&nbsp;*</span>  (ex: 1-10, 20, 42-100 ) </p>
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
							 	<p>Total No of Pages<span class="star">&nbsp;*</span></p>
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
							<input type="submit" class="plain_printing_submit dn form_submit_button" />
						</div>
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
				<?php
					$printingtype = selectfunction('*',PRINTINGTYPE,'printing_type="project_printing"',$connection);
					$printing_type_id = mysqli_fetch_array($printingtype);
					$printing_type = $printing_type_id ['printing_type_id'];

				?>
					<form id="project_printing_form" class="form-validate form-horizontal form1" method="post" action="printorder.php" enctype="multipart/form-data">	
						<div class="col-md-12 col-sm-12 col-xs-12 left no_pad">
							<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
								<div class="input_holder row pad_15">
									<input type="hidden" name="printing_type" value="project_printing" />
									<?php
										 $printtype = selectfunction('*',PRINTTYPE,"paper_print_type='Color with Black & White' and paper_print_type_status=1 and printing_type_id='$printing_type'",$connection);
										 $printtypedata = mysqli_fetch_array($printtype);
										 echo '<input name="project_print_type" type="hidden" class="project_print_type" value="'.$printtypedata['paper_print_type_id'].'" />';
										 $printside = selectfunction('*',PAPERSIDE,"paper_side='Single Side' and paper_side_status=1 and printing_type_id='$printing_type'",$connection);
										 $printsidedata = mysqli_fetch_array($printside);
										 echo '<input name="project_print_side" type="hidden" class="project_print_side" value="'.$printsidedata['paper_side_id'].'" />';
									?>
				        			<p>Paper Size<span class="star">&nbsp;*</span></p>
				        			<select name="project_papar_size" class="project_paper_size" id="project_paper_size">
				        				<option value="" >Select Paper Size</option>
				        				<?php
		        							$papersize = selectfunction('*',PAPERSIZE,"paper_size_status=1 and printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($papersize)){
												echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
											}
	        							?>
		        					</select>
				        		</div> <!-- input_holder -->
				        	 	<div class="input_holder row pad_15">
				        			<p>Paper Type<span class="star">&nbsp;*</span></p>
				        			<select name="project_papar_type" class="project_paper_type" id="project_paper_type">
				        				<option value="" >Select Paper Type</option>
				        				<?php
		        							$papertype = selectfunction('*',PAPERTYPE,"paper_type_status=1 and printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($papertype)){
												echo "<option value ='".$row['paper_type_id']."'>".$row['paper_type']."</option>";
											}
	        							?>
		        				    </select>
				        		</div> <!-- input_holder -->
				        		<div class="input_holder row pad_15">
				        			<p>Binding Type<span class="star">&nbsp;*</span></p>
				        			<select name="binding_type" class="project_binding_type" id="project_binding_type">	 
				        				<option value="" >Select Binding Type</option>
				        				<option value="hand_made_binding" >Handmade Binding</option>
				        				<option value="case_binding" >Case Binding</option>
		        				    </select>
				        		</div> <!-- input_holder -->
				        	</div>
			        		<div class="clear_both"> </div>
				        	<div class="main_project_section_input_holder">
				        		<div class="project_upload_section">
									<p class="label_page_paper_range"> Upload Your Files</p>
									<div class="input_holder row pad_15 upload_cover_section" id="">
										<p class="label_text" >Cover </p>
									 	<input type="text" name="" id="" class="project_file_name_margin style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 project_uploadfile" id="cover_uplopadfile" name="cover_project_print_file"/>
				       					<div class="browse_button col-md-4" id="cover_browse_button">Browse</div>
				       					<div class="clear_both"> </div>
				   					</div>
		   							<div class="input_holder row pad_15 upload_index_page_section"id="">
										<p class="label_text" >Index Pages </p>
									 	<input type="text" name="" id="" class="project_file_name_margin style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 project_uploadfile" id="index_uplopadfile" name="index_project_print_file"/>
				       					<div class="browse_button col-md-4" id="index_browse_button">Browse</div>
				       					<div class="clear_both"> </div>
				   					</div>
				   					<div class="input_holder row pad_15 upload_content_section" id="upload_content_section" data-projectsectionvalue="0">
										<p class="label_text" > Content <span class="star">&nbsp;*</span> </p>
									 	<input type="text" name="" id="project_file_holder" class="project_file_name_margin style_range project_file_holder" value="No file selected" data-projectfilevalue="0" disabled />
										<input type="file" class="user dn col-md-8 project_uploadfile content_upload_file" id="content_upload_file" name="content_print_file[]"/>
				       					<div class="browse_button cotent_browse_button col-md-4" id="cotent_browse_button">Browse</div>
				       					<div class="project_clone_remove" id="">
			   								<div class="del_btn project_remove" id="project_remove"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
			   								<div class="add_btn project_clone" id="project_clone"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
			   							</div>
				   					</div>				   					
			   						<div class="clear_both"> </div>
			   						<div class="input_holder row pad_15 upload_references_section"id="">
										<p class="label_text" > References </p>
									 	<input type="text" name="" class="col-md-8 project_file_name_margin style_range" value="No file selected"/ disabled>
										<input type="file" class="user dn col-md-8 project_uploadfile" id="refer_uplopadfile" name="reference_project_print_file"/>
				       					<div class="browse_button col-md-4" id="refer_browse_button">Browse</div>
				       					<div class="clear_both"> </div>
				   					</div>
	   							</div>
	   							<div class="page_number_section display_project_section">
	   								<p class="label_page_paper_range"> Enter Color Page Range (ex: 1-10, 20, 42-100 ) </p>
	   								<div class="input_holder row pad_15 project_range_section">
	   									<p class="label_text" > Cover </p>     				  
						        		<input type="text" name="cover_project_color_page_nos" id="cover_range" class="col-md-8 style_range project_paper_range" value="0-0" placeholder="Page no.1-13,15,18-23" disabled />
						        		<input type="text" class="project_file_name style_range" id="" value="No file selected" disabled>
									</div>
									<div class="clear_both"> </div>
									<div class="input_holder row pad_15 project_range_section">
	   									<p class="label_text" > Index Pages </p>    		  
						        		<input type="text" name="index_project_color_page_nos" id="index_range" class="col-md-8 style_range project_paper_range" value="0-0" placeholder="Page no.1-13,15,18-23" disabled />
						        		<input type="text" class="project_file_name style_range" id="" value="No file selected" disabled>
									</div>
									<div class="clear_both"> </div>
									<div class="input_holder row pad_15 project_range_section project_content_range_section" data-projectsectionvalue ="0">
	   									<p class="label_text" > Content </p>      			  
						        		<input type="text" name="content_project_color_page_nos[]" id="content_range" class="style_range content_range project_paper_range" value="0-0" placeholder="Page no.1-13,15,18-23" disabled />
						        		<input type="text" class="project_file_name content_file_name_range style_range project_file_holder" id="content_file_name_range" value="No file selected" data-projectfilevalue="0" disabled>
									</div>
									<div class="clear_both"> </div>
									<div class="input_holder row pad_15 project_range_section">
	   									<p class="label_text" > References </p>        		  
						        		<input type="text" name="reference_project_color_page_nos" id="refer_range" class="col-md-8 style_range project_paper_range" value="0-0" placeholder="Page no.1-13,15,18-23" disabled / >
						        		<input type="text" class="project_file_name style_range" id="" value="No file selected" disabled>
									</div>
									<div class="clear_both"> </div>
	   							</div>
	   						</div>
							<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
								<div class="cb">  </div>
								<div class="input_holder row pad_15">
								 	<p>Total No of Pages<span class="star">&nbsp;*</span></p>
								 	<input class="user project_total_pages" id="project_total_pages" type="text" value="" name="project_total_pages"> 
								</div>
								<div class="input_holder row pad_15">
								 	<p>Total Cost </p>
								 	<input class="email project_total_amount" type="text" value="" name="project_total_amount" readonly>
								</div>
								<div class="input_holder row pad_15">
								 	<p>Comments</p>
								 	<textarea rows="7" cols="50" class="" value="" name="project_print_comments"></textarea>
								</div>
							</div>
							<input type="hidden" class="per_page_costing" value="" />
							<input type="hidden" class="project_binding_amount" value="0.00" name="project_binding_amount">
							<input type="hidden" class="submit_type" value="" name="submit_type" />
							<input type="submit" class="plain_printing_submit dn form_submit_button" />
						</div>
					</form>
				</div>
			</div>
			<div class="cb">  </div>
		</section>  <!-- Project Binding End --> 
	<?php } else if($_SESSION['service']=='multi'){  ?>
		<!-- Multicolors Printing Start-->

	    <section class="pr-main" id="multicolors_header">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Multicolors Printing</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12 no_pad">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div>
			<span class="error_print_booking"> Please fill out all mandatory fields </span>
	    </section>	
	 <section class="pr-main" id="pr-register">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 padding_form">
				<?php
					$printingtype = selectfunction('*',PRINTINGTYPE,'printing_type="multicolor_printing"',$connection);
					$printing_type_id = mysqli_fetch_array($printingtype);
					$printing_type = $printing_type_id ['printing_type_id'];
				?>
					<form id="print_booking_form" class="form-validate form-horizontal form1" method="post" action="printorder.php" enctype="multipart/form-data">	
					<input type="hidden" name="printing_type" value="multicolor_printing" id="printing_type"/>
						<div class="col-md-12 col-sm-12 col-xs-12 left no_pad">
						<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
						<input type="hidden" name="printing_type" value="multicolor_printing" id="printing_type"/>						
							<div class="input_holder row pad_15" style="display:none;">
				        		<p>Print Type<span class="star">&nbsp;*</span></p>
				        		<select name="print_type" class="print_book_print_type" id="print_type" >
				        				<option value="" >Select Print Type</option>
		        						<?php
			        							$printtype = selectfunction('*',PRINTTYPE,"paper_print_type_status=1 and printing_type_id='$printing_type'",$connection);
												while($row = mysqli_fetch_array($printtype)){
													if(strtolower($row['paper_print_type']) == "color with black & white"){
													echo "<option value ='".$row['paper_print_type_id']."' selected>".$row['paper_print_type']."</option>";
													}
												}
		        						?>
		        				</select>
			        		</div> <!-- input holder -->
			        	
						   	<div class="input_holder row pad_15">
			        			<p>Print Side<span class="star">&nbsp;*</span></p>
			        			<select name="print_side" class="print_book_print_side" id="print_side">
			        				<option value="" >Select Print Side</option>
	        						<?php
		        							$paperside = selectfunction('*',PAPERSIDE,"paper_side_status=1 and printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($paperside)){
												echo "<option value ='".$row['paper_side_id']."'>".$row['paper_side']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15">
			        			<p>Paper Type<span class="star">&nbsp;*</span></p>
			        			<select name="papar_type" class="print_book_paper_type" id="paper_type">
			        				<option value="" >Select Paper Type</option>
	        						<?php
		        							$papertype = selectfunction('*',PAPERTYPE,"paper_type_status=1 and printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($papertype)){
												echo "<option value ='".$row['paper_type_id']."'>".$row['paper_type']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        		<div class="input_holder row pad_15">
			        			<p>Paper Size<span class="star">&nbsp;*</span></p>
			        			<select name="papar_size" class="print_book_paper_size" id="paper_size">
			        				<option value="" >Select Paper Size</option>
	        						<?php
		        							$papersize = selectfunction('*',PAPERSIZE,"paper_size_status=1 and printing_type_id='$printing_type'",$connection);
											while($row = mysqli_fetch_array($papersize)){
												echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        	</div>
			        	<div class="clear_both"> </div>
			        	<div class="main_section_input_holder">
			        		<div class="input_holder row pad_15 cover_section_holder">
			        			<p> Upload Your Cover File<span class="star">&nbsp;*</span></p>
								<!-- <input type="text" name="" id="" class="style_range" value="Cover"/ disabled> -->
								<p class="label_text"> Cover </p>
								<input type="text" name="" id="cover_file_name" class="file_name_box style_range" value="No file selected"/ disabled>
								<input type="file" class="user dn upload_cover_File" id="upload_cover_File" name="cover_printfiles"/>
		    	   				<div class="cover_uploadbutton" id="cover_uploadTrigger">Browse</div>
   							</div>
   							<div class="clear_both"> </div>
							<p> Upload Your Files<span class="star">&nbsp;*</span></p>	
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
   							<p class="label_page_range"> Enter Color Page Range<span class="star">&nbsp;*</span>  (ex: 1-10, 20, 42-100 ) </p>
   							<div class="input_holder row pad_15 upload_file_holder display_paper_range" data-sectionvalue="0" id="display_paper_range">
								<!-- <p> Paper print page number<span class="star">*</span> <span class="page_number_format_hint">(If you need color print, please mention page number in below. Ex- page no. 1-10,20,30-40)</p>	 -->
								<div class="file_range_holder upload_range_section" id="file_range_holder">
								 	<!-- <input name="" class="select_margin display_range_page" id="content_file" placeholder="Filename" disabled> -->
		        				    <input type="text" class="select_margin display_normal_file style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
					        		<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/>
									<select name="num_of_copies" class="num_of_copies" id="num_of_copies">
				        				<option value="select_copies" >Select Number of copies</option>
		        						<?php 
			        							$numofcopies = selectfunction('*',NUMBEROFCOPIES,'multicolor_copies_status=1',$connection);
												while($row = mysqli_fetch_array($numofcopies)){
													echo "<option value ='".$row['multicolor_copies_id']."'>".$row['multicolor_copies']."</option>";
												}
		        						?>
		        				    </select>
	        				    </div>
   							</div>
   						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
							<div class="cb">  </div>
							<!-- <div class="input_holder row pad_15">
						 		<span class="page_range_error"> Please Enter correct format like Page no.1-13,15,18-23</span>
							</div> -->
							<!-- <div class="input_holder row pad_15">
							 	<p>Total No of Pages<span class="star">&nbsp;*</span></p>
							 	<input class="user mutli_print_total_no_of_pages" id="total_pages" type="text" value="" name="print_totalpage"> 
							</div> -->
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
		</section> <!-- Plain Printing End-->
		<?php } ?>
		<!-- Project Binding End -->
	</div>	<!-- Main End -->
	<section>
		<div class="container" style="padding-left:0px;">	
	  		<div class="col-md-9 col-sm-9 col-xs-12" style="padding-left:0px;">		
				<div class="button_holder button_holder_printbooking">
	 	       		<h4 class="btn_prf print_add_to_cart_btn" data-submit="print_add_to_cart_btn"><a>Add to cart</a></h4>
	 	     	</div>
				<div class="button_holder button_holder_printbooking">
					<h4 class="order_or_button">OR</h4>
	      		</div>
	 	   		<div class="button_holder button_holder_printbooking">
	       	   		<h4 class="btn_prf print_check_out_btn"><a>Check Out</a></h4>
	       	   		<h4 class="btn_prf"><a href="printbooking.php?service=<?php echo $_GET['service']; ?>">Clear</a></h4>
	           	</div>
           	</div>
		</div>     
	</section>
</div><!-- Main Product Detail: End -->	
<?php include('footer.php') ?>