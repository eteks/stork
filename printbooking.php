<?php 
	include('header.php');
	include('function.php');
?>
<?php 
	$_SESSION['service'] = 'print';
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
								<a href="home.html">Home</a>
							</li>
							<li>
								<span>Order</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section> <!---breadcrumb------>
	    <section class="pr-main" id="pr-login">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ct-header">Print Booking</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12 no_pad">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div>
			<span class="error_print_booking"> Please fill out all mandatory fields </span> <!---container--->

	     </section>	
	     <form id="print_booking_form" class="form-validate form-horizontal" method="post" action="printorder.php" enctype="multipart/form-data">
		     <section class="pr-main" id="pr-register">	
				<div class="container">	
					<div class="col-md-12 col-sm-12 col-xs-12 ">		
						<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
						    <div class="input_holder row pad_15">
			        			<p>Print Type<span class="star">*</span></p>
			        			<select name="print_type" class="print_book_print_type" id="print_type">
			        				<option value="" >Select Print Type</option>
	        						<?php
		        							$state = selectfunction('*',PRINTTYPE,'');
											while($row = mysql_fetch_array($state)){
												echo "<option value ='".$row['paper_print_type_id']."'>".$row['paper_print_type']."</option>";
											}
	        						?>
	        				    </select>
			        		 </div><!-- input_holder -->
			        	<form id="print_booking_form" class="form-validate form-horizontal form1" method="post" action="printorder.php" enctype="multipart/form-data">
						   	 <div class="input_holder row pad_15">
			        			<p>Print Side<span class="star">*</span></p>
			        			<select name="print_side" class="print_book_print_side" id="print_side">
			        				<option value="" >Select Print Side</option>
	        						<?php
		        							$state = selectfunction('*',PAPERSIDE,'');
											while($row = mysql_fetch_array($state)){
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
		        							$state = selectfunction('*',PAPERTYPE,'');
											while($row = mysql_fetch_array($state)){
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
		        							$state = selectfunction('*',PAPERSIZE,'');
											while($row = mysql_fetch_array($state)){
												echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
											}
	        						?>
	        				    </select>
			        		 </div> <!-- input_holder -->
			        	<div class="upload_range_button">
			        		 <div class="input_holder row pad_15 upload_file_holder">
								 <p> Upload files<span class="star">*</span></p>	
								 <div class="upload_file_holder upload_range_section" id="input1">
								 	<input type="text" name="filepageno[]" id="print_page_range" class="col-md-8 paper_range" placeholder="Page no.1-13,15,18-23"/>
								 	<span class="page_range_error"> Please Enter correct format like Page no.1-13,15,18-23</span>
	       							<input type="file" class="user dn col-md-8 uploadFile" id="file_upload" name="printfiles[]"/>
	       							<div class="uploadbutton col-md-4" id="uploadTrigger">Browse</div>
	   							 </div>
   							 </div>
   							 <div class="pos_rel" >
   							 	<div class="add_btn clone"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
   							 	<div class="del_btn remove"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
   							 </div>
   						</div>
							 <div class="cb">  </div>
							 <div class="input_holder row pad_15">
							 	<p>Total No of Pages<span class="star">*</span></p>
							 	<input class="user print_total_no_of_pages" id="total_pages" type="text" value="" name="print_totalpage"> 
							 </div>
							 <div class="input_holder row pad_15">
							 	<p>Total Cost </p>
							 	<input class="email print_total_amount" type="text" value="" name="print_totalcost">
							 </div>
							 <div class="input_holder row pad_15">
							 	<p>Comments</p>
							 	<textarea rows="7" cols="50" class="textarea_print" value="" name="print_comments"></textarea>
							 </div>
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
		        	   		<h4 class="btn_prf"><a href="printbooking.html" target="_blank">Clear</a></h4>
		        	   		<h4 class="btn_prf print_check_out_btn"><a href="#">Check Out</a></h4>
		             	</div>
	               	</div>
				</div>     
			 </section>
		 </form>
	</div><!-- Main Product Detail: End -->	
<?php include('footer.php') ?>