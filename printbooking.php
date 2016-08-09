<?php 
	include('header.php');
	if(!isset($_SESSION['usertype']) || !isset($_GET['service'])){
		//header('Location:index.php');
		die('<script type="text/javascript">window.location.href="index.php";</script>');
		exit();
	}
	$_SESSION['service']=$_GET['service'];
 	$random = uniqid();
 	$uploaderror = FALSE;
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
 	
 	if(isset($_SESSION['session_id'])){
 		$session_data_check = explode("_", $_SESSION['session_id']);
	 	if($_SESSION['usertype'] != $session_data_check[1]){
		 	$changed_session_id = $session_data_check[0].'_'.$_SESSION['usertype'].'_'.$session_data_check[2];
 	 		updatefunction('order_details_session_id="'.$changed_session_id.'"',ORDERDETAILS,'order_details_session_id="'.$_SESSION['session_id'].'"',$connection);
	 		$_SESSION['session_id'] = $changed_session_id;
	 	}
 	}
	if(isset($_GET['uploaderror'])){
		$orderid = $_GET['uploaderror'];
		deletefunction('stork_order_details','order_details_id ="'.$orderid.'"',$connection);
		$uploaderror = TRUE;
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
	    <section class="pr-main plain_printing_holder" id="pr-login">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Plain Printing</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12 no_pad">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div>
			<?php
			if($uploaderror){
			?>
				<span class="upload_error_print_booking"> Unknown error. Please upload again! </span>
			<?php
			}
			?>
			<span class="error_print_booking"> Please fill out all mandatory fields </span> <!--container-->
	    </section>	
	    <section class="pr-main" id="pr-register">	
	     <div class="container" id="fl_width">
	       <div class="fl form_left">	
	     	<div class="col-md-12 col-sm-12 col-xs-12 padding_form">
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
	        								$printtype_query = mysqli_query($connection, "select * from ".PRINTTYPE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PRINTTYPE.".printing_type_id where ".PRINTTYPE.".paper_print_type_status ='1' and ".PRINTINGTYPE.".printing_type = 'plain_printing'");
		        							//$printtype = selectfunction('*',PRINTTYPE,'paper_print_type_status=1',$connection);
											while($row = mysqli_fetch_array($printtype_query)){
												if(preg_replace('/\s+/', '',strtolower($row['paper_print_type']))=='colorwithblack&white'){
													echo "<option value ='".preg_replace('/\s+/', '',strtolower($row['paper_print_type']))."'>".$row['paper_print_type']."</option>";
												}
												else {
													echo "<option value ='".$row['paper_print_type_id']."'>".$row['paper_print_type']."</option>";	
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
        								$printside_query = mysqli_query($connection, "select * from ".PAPERSIDE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERSIDE.".printing_type_id where ".PAPERSIDE.".paper_side_status ='1' and ".PRINTINGTYPE.".printing_type = 'plain_printing'");
	        							//$paperside = selectfunction('*',PAPERSIDE,'paper_side_status=1',$connection);
										while($row = mysqli_fetch_array($printside_query)){
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
        								$paper_type_query = mysqli_query($connection, "select * from ".PAPERTYPE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERTYPE.".printing_type_id where ".PAPERTYPE.".paper_type_status ='1' and ".PRINTINGTYPE.".printing_type = 'plain_printing'");
	        							//$papertype = selectfunction('*',PAPERTYPE,'paper_type_status=1',$connection);
										while($row = mysqli_fetch_array($paper_type_query)){
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
        								$paper_size_query = mysqli_query($connection, "select * from ".PAPERSIZE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERSIZE.".printing_type_id where ".PAPERSIZE.".paper_size_status ='1' and ".PRINTINGTYPE.".printing_type = 'plain_printing'");
	        							//$papersize = selectfunction('*',PAPERSIZE,'paper_size_status=1',$connection);
										while($row = mysqli_fetch_array($paper_size_query)){
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
								<div id="cover_only" class="input_holder row pad_15">
									   <p> Cover </p>
									   <input type="text" name="" id="cover_file_name" class="file_name_box style_range" value="No file selected"/ disabled>
										<input type="file" class="user upload_cover_File" id="upload_cover_File" name="cover_printfiles[]"/>
		    	   				    	<div class="cover_uploadbutton" id="cover_uploadTrigger">Browse</div> 
								</div>	
							</div>
   							<div class="clear_both"> </div>
							<p> Upload Your Files<span class="star">&nbsp;*</span></p>	
   							<div class="input_holder row pad_15 plain_clone_section upload_section" data-sectionvalue="0" id="upload_section">
								<div class="upload_file_holder upload_clone_holder" id="upload_clone_holder">
									<!-- <input type="text" name="" id="page_type" class="select_margin display_page_type style_range" value="Content"/ disabled> -->
									<div id="plain_file_name_box" class="input_holder row pad_15">
										<p class="display_page_type"> Content </p>
							 			<input type="text" name="" id="file_name_box" data-filevalue="0" class="col-md-8 file_name_box content_file_name style_range " value="No file selected"/ disabled>
								 			<input type="file" class="user dn col-md-8 uploadFile" id="file_upload" name="printfiles[]"/>
				       						<div class="uploadbutton col-md-4 fl" id="uploadTrigger">Browse
				       						</div>
				       						<div class="pos_rel fl" id="pos_rel">
	   											<div class="del_btn remove_upload" id="remove_upload"><i class="fa fa-minus-circle" aria-hidden="true"></i>
	   											</div>
	   											<div class="add_btn clone_upload" id="clone_upload"><i class="fa fa-plus-circle" aria-hidden="true"></i>
	   											</div>
		   								    </div>
		   								<div class="cb"> </div>   
			       					</div>
			       					<div>
				       						
	   								</div>
	   								<div class="cb"> </div>
		   						</div>
		   					</div>
   							<p class="label_page_range"> Enter Color Page Range<span class="star">&nbsp;*</span>  (ex: 1-10, 20, 42-100 ) </p>
   							<div class="input_holder row pad_15 upload_file_holder display_paper_range plain_paper_range" data-sectionvalue="0" id="display_paper_range ">
								<!-- <p> Paper print page number<span class="star">*</span> <span class="page_number_format_hint">(If you need color print, please mention page number in below. Ex- page no. 1-10,20,30-40)</p>	 -->
								<div class="file_range_holder upload_range_section" id="file_range_holder">
								 	<!-- <input name="" class="select_margin display_range_page" id="content_file" placeholder="Filename" disabled> -->
		        				    <input type="text" class="select_margin display_normal_file plain_range_file_name style_range max_style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
					        		<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 print_page_range paper_range style_range max_style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/>
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
							 	<input class="user print_total_no_of_pages" id="total_pages" type="text" value="" name="print_totalpage" autocomplete="off"> 
							</div>
							<div class="input_holder row pad_15">
							 	<p>Total Cost </p>
							 	<input class="email print_total_amount" type="text" value="" name="print_totalcost" readonly>
							</div>
							<div class="input_holder row pad_15">
							 	<p>Comments</p>
							 	<textarea rows="7" cols="50" class="textarea_print" value="" name="print_comments" maxlength="150"></textarea>
							</div>
							</div>
							<input type="hidden" class="per_page_costing" value="" />
							<input type="hidden" class="print_book_binding_amount" value="0.00" name="print_book_binding_amount">
							<input type="hidden" class="submit_type" value="" name="submit_type" />
							<input type="hidden" class="color_page_amount_per_page" value="0.00"/>
							<input type="hidden" class="blackwhite_page_amount_per_page" value="0.00"/>
							<input type="submit" class="plain_printing_submit dn form_submit_button" />
						</div>
				  </form>
				</div>
			 </div>	<!--left column-->
			 <!---images holder for displaying images--->
			  	<div class="fr image_right">
					<div class="option-image" id="thumbs">
					  <div id="test0" style="display:none;"><img src="images/paper_type/no-img.jpg" width="350px" height="auto" alt="no_image" /></div>	
					  <!--paper-type-->	
				      <div id="test1" style="display:none;"><img src="images/paper_type/100gsm-bond.jpg" width="350px" height="auto" alt="Executive_bond_100gsm" /></div>
				 	  <div id="test2" style="display:none;"><img src="images/paper_type/.jpg" width="350px" height="auto" alt="Executive_bond_70gsm" /></div>
				 	  <div id="test3" style="display:none;"><img  src="images/paper_type/85gsm-bond.jpg" width="350px" height="auto" alt="Executive_bond_85gsm" /></div>
					  <div id="test4" style="display:none;"><img  src="images/paper_type/70gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_70gsm" /></div>
					  <div id="test5" style="display:none;"><img src="images/paper_type/75gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_75gsm" /></div>
					  <div id="test6" style="display:none;"><img src="images/paper_type/80gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_80gsm" /></div>
					  <div id="test7" style="display:none;"><img src="images/paper_type/100gsm-plain thick paper.jpg" width="350px" height="auto" alt="plain_thick_paper" /></div>
					  <!--Paper-size--->			  
					  <div id="test8" style="display:none;"><img  src="images/paper_type/paper_a3.jpg" width="350px" height="auto" alt="Paper_A3" /></div>
					  <div id="test9" style="display:none;"><img  src="images/paper_type/paper_a4.jpg" width="350px" height="auto" alt="Paper_A3" /></div>
					  <div id="test10" style="display:none;"><img src="images/paper_type/legal_paper.jpg" width="350px" height="auto" alt="legal_paper" /></div>
					  <!--binding-type-->
					  <div id="test11" style="display:none;margin-top:350px;"><img src="images/bind_type/soft-binding.jpg" width="350px" height="auto" alt="PlainPrint_images" /></div>	
				      <div id="test12" style="display:none;margin-top:350px;"><img src="images/bind_type/comb-binding.jpg" width="350px" height="auto" alt="Executive_bond_100gsm" /></div>
				 	  <div id="test13" style="display:none;margin-top:350px;"><img src="images/bind_type/weiro-binding.jpg" width="350px" height="auto" alt="Executive_bond_70gsm" /></div>
				 	  <div id="test14" style="display:none;margin-top:350px;"><img  src="images/bind_type/spiral-binding.jpg" width="350px" height="auto" alt="Executive_bond_85gsm" /></div>
				   </div>
				</div> <!--right column--> 
			 <div class="cb">  </div>	
		  </div> <!--container--->			  
		</section> <!-- Plain Printing End-->

		<!-- Project Binding Start-->
		<?php } else if($_SESSION['service']=='project'){  ?>
			
			
		 <section class="pr-main project_printing_header project_printing_holder" id="pr-login_project">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Project Printing</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12 no_pad">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div>
			<?php
			if($uploaderror){
			?>
				<span class="upload_error_print_booking"> Unknown error. Please upload again! </span>
			<?php
			}
			?>
			<span class="error_print_booking"> Please fill out all mandatory fields </span> <!--container-->
	    </section>

		<section class="pr-main" id="project_printing_section">	
			<div class="container" id="fl_width">	
			  <div class="fl form_left">	
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
										 $printtype_query = mysqli_query($connection, "select * from ".PRINTTYPE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PRINTTYPE.".printing_type_id where ".PRINTTYPE.".paper_print_type_status ='1' and ".PRINTINGTYPE.".printing_type = 'project_printing' and paper_print_type='Color with Black & White'");
										 //$printtype = selectfunction('*',PRINTTYPE,'paper_print_type="Color with Black & White" and paper_print_type_status=1',$connection);
										 $printtypedata = mysqli_fetch_array($printtype_query);
										 echo '<input name="project_print_type" type="hidden" class="project_print_type" value="'.preg_replace('/\s+/', '',strtolower($printtypedata['paper_print_type_id'])).'" />';
										 $printside_query = mysqli_query($connection, "select * from ".PAPERSIDE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERSIDE.".printing_type_id where ".PAPERSIDE.".paper_side_status ='1' and ".PRINTINGTYPE.".printing_type = 'project_printing' and paper_side='Single Side'");
										// $printside = selectfunction('*',PAPERSIDE,'paper_side="Single Side" and paper_side_status=1',$connection);
										 $printsidedata = mysqli_fetch_array($printside_query);
										 echo '<input name="project_print_side" type="hidden" class="project_print_side" value="'.$printsidedata['paper_side_id'].'" />';
									?>
				        			<p>Paper Size<span class="star">&nbsp;*</span></p>
				        			<select name="project_papar_size" class="project_paper_size" id="project_paper_size">
				        				<option value="" >Select Paper Size</option>
				        				<?php
			        						$paper_size_query = mysqli_query($connection, "select * from ".PAPERSIZE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERSIZE.".printing_type_id where ".PAPERSIZE.".paper_size_status ='1' and ".PRINTINGTYPE.".printing_type = 'project_printing'");
		        							//$papersize = selectfunction('*',PAPERSIZE,'paper_size_status=1',$connection);
											while($row = mysqli_fetch_array($paper_size_query)){
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
			        						$paper_type_query = mysqli_query($connection, "select * from ".PAPERTYPE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERTYPE.".printing_type_id where ".PAPERTYPE.".paper_type_status ='1' and ".PRINTINGTYPE.".printing_type = 'project_printing'");
		        							//$papertype = selectfunction('*',PAPERTYPE,'paper_type_status=1',$connection);
											while($row = mysqli_fetch_array($paper_type_query)){
												echo "<option value ='".$row['paper_type_id']."'>".$row['paper_type']."</option>";
											}
	        							?>
		        				    </select>
				        		</div> <!-- input_holder -->
				        		<div class="input_holder row pad_15">
				        			<p>Binding Type<span class="star">&nbsp;*</span></p>
				        			<select name="binding_type" class="project_binding_type" id="project_binding_type">	 
				        				<option value="" >Select Binding Type</option>
				        				<!-- <option value="hand_made_binding" >Handmade Binding</option>
				        				<option value="case_binding" >Case Binding</option> -->
				        				<?php
			        						$binding_cost_query = mysqli_query($connection, "select * from stork_cost_estimation_binding where cost_estimation_binding_type in ('case_binding','handmade_binding') and cost_estimation_binding_status='1'");
		        							//$papertype = selectfunction('*',PAPERTYPE,'paper_type_status=1',$connection);
											while($row = mysqli_fetch_array($binding_cost_query)){
												if($row['cost_estimation_binding_type'] === 'case_binding'){
													echo "<option value ='".$row['cost_estimation_binding_type']."'>Case Binding</option>";
												}else if($row['cost_estimation_binding_type'] === 'handmade_binding'){
													echo "<option value ='".$row['cost_estimation_binding_type']."'>Handmade Binding</option>";
												}
													
											}
	        							?>
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
										<input type="file" class="user col-md-8 project_uploadfile" id="cover_uplopadfile" name="cover_project_print_file"/>
				       					<div class="browse_button col-md-4" id="cover_browse_button">Browse</div>
				       					<div class="clear_both"> </div>
				   					</div>
		   							<div class="input_holder row pad_15 upload_index_page_section"id="">
										<p class="label_text" >Index Pages </p>
									 	<input type="text" name="" id="" class="project_file_name_margin style_range" value="No file selected"/ disabled>
										<input type="file" class="user col-md-8 project_uploadfile" id="index_uplopadfile" name="index_project_print_file"/>
				       					<div class="browse_button col-md-4" id="index_browse_button">Browse</div>
				       					<div class="clear_both"> </div>
				   					</div>
				   					<div class="input_holder row pad_15 upload_content_section" id="upload_content_section" data-projectsectionvalue="0">
										<p class="label_text" > Content <span class="star">&nbsp;*</span> </p>
									 	<input type="text" name="" id="project_file_holder" class="project_file_name_margin style_range project_file_holder" value="No file selected" data-projectfilevalue="0" disabled />
										<input type="file" class="user col-md-8 project_uploadfile content_upload_file" id="content_upload_file" name="content_print_file[]"/>
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
										<input type="file" class="user col-md-8 project_uploadfile" id="refer_uplopadfile" name="reference_project_print_file"/>
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
								 	<textarea rows="7" cols="50" class="" value="" name="project_print_comments" maxlength="150"></textarea>
								</div>
							</div>
							<input type="hidden" class="per_page_costing" value="" />
							<input type="hidden" class="project_binding_amount" value="0.00" name="project_binding_amount">
							<input type="hidden" class="color_page_amount_per_page" value="0.00"/>
							<input type="hidden" class="blackwhite_page_amount_per_page" value="0.00"/>
							<input type="hidden" class="submit_type" value="" name="submit_type" />
							<input type="submit" class="project_printing_submit dn form_submit_button" />
						</div>
					</form>
				</div>
			  </div><!--left column-->	
			<!---images holder for displaying images--->
			  <div class="fr image_right">
				<div class="option-image" id="thumbs">
				  <div id="test0" style="display:none;"><img src="images/paper_type/no-img.jpg" width="350px" height="auto" alt="no_image" /></div>	
				  <!--paper-type-->	
			      <div id="test1" style="display:none;"><img src="images/paper_type/100gsm-bond.jpg" width="350px" height="500px" alt="Executive_bond_100gsm" /></div>
			 	  <div id="test2" style="display:none;"><img src="images/paper_type/70gsm-bond.jpg" width="350px" height="500px" alt="Executive_bond_70gsm" /></div>
			 	  <div id="test3" style="display:none;"><img  src="images/paper_type/85gsm-bond.jpg" width="350px" height="500px" alt="Executive_bond_85gsm" /></div>
				  <div id="test4" style="display:none;"><img  src="images/paper_type/70gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_70gsm" /></div>
				  <div id="test5" style="display:none;"><img src="images/paper_type/75gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_75gsm" /></div>
				  <div id="test6" style="display:none;"><img src="images/paper_type/80gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_80gsm" /></div>
				  <div id="test7" style="display:none;"><img src="images/paper_type/100gsm-plain thick paper.jpg" width="350px" height="auto" alt="plain_thick_paper" /></div>
				  <!--paper-size-->
				  <div id="test8" style="display:none;"><img  src="images/paper_type/paper_a3.jpg" width="350px" height="auto" alt="Paper_A3" /></div>
				  <div id="test9" style="display:none;"><img  src="images/paper_type/paper_a4.jpg" width="350px" height="auto" alt="Paper_A3" /></div>
				  <div id="test10" style="display:none;"><img src="images/paper_type/legal_paper.jpg" width="350px" height="auto" alt="legal_paper" /></div>
				  <!--bind-type-->
				  <div id="test15" style="display:none;margin-top:100px;"><img src="images/bind_type/case-binding.jpg" width="350px" height="auto" alt="PlainPrint_images" /></div>	
			      <div id="test16" style="display:none;margin-top:100px;"><img src="images/bind_type/handmade-binding.jpg" width="350px" height="auto" alt="Executive_bond_100gsm" /></div>
				</div>
              </div>  <!--right column-->
			  <div class="cb">  </div>
	       </div>
		</section>  <!-- Project Binding End --> 
	<?php } else if($_SESSION['service']=='multi'){  ?>
		
		<!-- Multicolors Printing Start-->

	    <section class="pr-main multicolor_printing_holder" id="multicolors_header">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Multicolors Printing</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12 no_pad">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div>
			<?php
			if($uploaderror){
			?>
				<span class="upload_error_print_booking"> Unknown error. Please upload again! </span>
			<?php
			}
			?>
			<span class="error_print_booking"> Please fill out all mandatory fields </span>
	    </section>	
	 <section class="pr-main" id="pr-register">	
			<div class="container" id="fl_width">	
			  <div class="fl form_left">	
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
			        							$printtype_query = mysqli_query($connection, "select * from ".PRINTTYPE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PRINTTYPE.".printing_type_id where ".PRINTTYPE.".paper_print_type_status ='1' and ".PRINTINGTYPE.".printing_type = 'multicolor_printing'");
												while($row = mysqli_fetch_array($printtype_query)){
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
		        							$printside_query = mysqli_query($connection, "select * from ".PAPERSIDE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERSIDE.".printing_type_id where ".PAPERSIDE.".paper_side_status ='1' and ".PRINTINGTYPE.".printing_type = 'multicolor_printing'");
											while($row = mysqli_fetch_array($printside_query)){
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
		        							$paper_type_query = mysqli_query($connection, "select * from ".PAPERTYPE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERTYPE.".printing_type_id where ".PAPERTYPE.".paper_type_status ='1' and ".PRINTINGTYPE.".printing_type = 'multicolor_printing'");
											while($row = mysqli_fetch_array($paper_type_query)){
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
		        							$paper_size_query = mysqli_query($connection, "select * from ".PAPERSIZE." inner join ".PRINTINGTYPE." on ".PRINTINGTYPE.".printing_type_id=".PAPERSIZE.".printing_type_id where ".PAPERSIZE.".paper_size_status ='1' and ".PRINTINGTYPE.".printing_type = 'multicolor_printing'");
											while($row = mysqli_fetch_array($paper_size_query)){
												echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
											}
	        						?>
	        				    </select>
			        		</div> <!-- input_holder -->
			        	</div>
			        	<div class="clear_both"> </div>
			        	<div class="main_section_input_holder">
							<p> Upload Your Files<span class="star">&nbsp;*</span></p>	
   							<div class="input_holder row pad_15 upload_section" data-sectionvalue="0" id="upload_section">
								<div class="upload_file_holder upload_clone_holder" id="upload_clone_holder">
									<!-- <input type="text" name="" id="page_type" class="select_margin display_page_type style_range" value="Content"/ disabled> -->
									<p class="label_text display_page_type"> Content </p>
								 	<input type="text" name="" id="file_name_box" data-filevalue="0" class="col-md-8 file_name_box style_range" value="No file selected"/ disabled>
									<input type="file" class="user col-md-8 uploadFile" id="file_upload" name="printfiles[]"/>
			       					<div class="uploadbutton col-md-4" id="uploadTrigger">Browse</div>
		   						</div>
		   						<!-- <div class="pos_rel" id="pos_rel">
   									<div class="del_btn remove_upload" id="remove_upload"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
   									<div class="add_btn clone_upload" id="clone_upload"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
	   							</div> -->
   							</div>
   							<p class="label_page_range">Number of copies <span class="star">&nbsp;*</span> </p>
   							<div class="input_holder row pad_15 upload_file_holder display_paper_range" data-sectionvalue="0" id="display_paper_range">
								<!-- <p> Paper print page number<span class="star">*</span> <span class="page_number_format_hint">(If you need color print, please mention page number in below. Ex- page no. 1-10,20,30-40)</p>	 -->
								<div class="file_range_holder upload_range_section" id="file_range_holder">
								 	<!-- <input name="" class="select_margin display_range_page" id="content_file" placeholder="Filename" disabled> -->
		        				    <input type="text" class="select_margin display_normal_file style_range" id="normal_file" value="No file selected" data-filevalue="0" disabled>
					        		<!-- <input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range style_range" value="0-0" placeholder="Page no.1-13,15,18-23"/> -->
									<div>
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
							 	<input class="email print_total_amount multiprint_total_amount" type="text" value="" name="print_totalcost" readonly>
							</div>
							<div class="input_holder row pad_15">
							 	<p>Comments</p>
							 	<textarea rows="7" cols="50" class="textarea_print" value="" name="print_comments" maxlength="150"></textarea>
							</div>
							</div>
							<input type="hidden" class="per_page_costing" value="0.00" />
							<input type="hidden" class="print_book_binding_amount" value="0.00" name="print_book_binding_amount">
							<input type="hidden" class="submit_type" value="" name="submit_type" />
							<input type="submit" class="multi_printing_submit dn form_submit_button" />
						</div>
					</form>
				</div>
			 </div> <!--left column--->
			  <!---images holder for displaying images--->
			  <div class="fr image_right">
				<div class="option-image" id="thumbs">
				  <!-- div id="test0" style="display:none;"><img src="images/paper_type/no-img.jpg" width="350px" height="auto" alt="PlainPrint_images" /></div>	
			      <div id="test1" style="display:none;"><img src="images/paper_type/100gsm-bond.jpg" width="350px" height="500px" alt="Executive_bond_100gsm" /></div>
			 	  <div id="test2" style="display:none;"><img src="images/paper_type/70gsm-bond.jpg" width="350px" height="500px" alt="Executive_bond_70gsm" /></div>
			 	  <div id="test3" style="display:none;"><img  src="images/paper_type/85gsm-bond.jpg" width="350px" height="500px" alt="Executive_bond_85gsm" /></div>
				  <div id="test4" style="display:none;"><img  src="images/paper_type/70gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_70gsm" /></div>
				  <div id="test5" style="display:none;"><img src="images/paper_type/75gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_75gsm" /></div>
				  <div id="test6" style="display:none;"><img src="images/paper_type/80gsm-normal.jpg" width="350px" height="auto" alt="Normal_paper_80gsm" /></div>
				  <div id="test7" style="display:none;"><img src="images/paper_type/100gsm-plain thick paper.jpg" width="350px" height="auto" alt="plain_thick_paper" /></div> -->
				  <!--paper-size-->
				  <div id="test8" style="display:none;"><img  src="images/paper_type/paper_a3.jpg" width="350px" height="auto" alt="Paper_A3" /></div>
				  <div id="test9" style="display:none;"><img  src="images/paper_type/paper_a4.jpg" width="350px" height="auto" alt="Paper_A3" /></div>
				  <div id="test17" style="display:none;"><img src="images/paper_type/paper_a5.jpg" width="350px" height="auto" alt="legal_paper" /></div>
				</div>
              </div>  <!--right column-->
			<div class="cb">  </div>  	
			</div>
	     </section> <!-- Plain Printing End-->
		<?php } ?>
		<!-- Project Binding End -->
	</div>	<!-- Main End -->
	<section id="btn_responsive">
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