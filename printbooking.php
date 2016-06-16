<?php require_once('dbconnect.php'); ?>
<?php include('header.php') ?>
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
			</div> <!---container--->
	     </section>	
	     
	     <section class="pr-main" id="pr-register">	
			<div class="container">	
				<div class="col-md-12 col-sm-12 col-xs-12 ">		
					<div class="col-md-6 col-sm-6 col-xs-12 left no_pad">
						<form id="register-form" class="form-validate form-horizontal" method="post" action="#">
						    <div class="input_holder row pad_15">
			        			<p>Print Type<span class="star">*</span></p>
			        			<select name="paper_row" class="print_book_paper_size">
	        						<option value="b&w">Black &amp; White</option>
	        						<option value="color">Color</option>
	        						<option value="both color">Black &amp; White and Color</option>
	        				    </select>
			        		 </div><!-- input_holder -->
						   	 <div class="input_holder row pad_15">
			        			<p>Print Side<span class="star">*</span></p>
			        			<select name="paper_row" class="print_book_paper_size">
	        						<option value="1">Single Side</option>
	        						<option value="2">Double Side</option>
	        				    </select>
			        		 </div> <!-- input_holder -->
			        		 <div class="input_holder row pad_15 upload_file_holder">
								 <p> Upload files<span class="star">*</span></p>	
								 <div>
								 	<input type="text" name="filepageno[]" class="col-md-8"/>
	       							<input type="file" class="user dn col-md-8" name="option[]" id="uploadFile"/>
	       							<div class="uploadbutton col-md-4" id="uploadTrigger">Browse</div>
	   							 </div>
   							 </div>
   							 <div class=" pos_rel" >
   							 	<div class="add_btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
   							 	<div class="del_btn"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
   							 </div>
							 <div class="cb">  </div>
							 <div class="input_holder row pad_15">
							 	<p>Total No of Pages<span class="star">*</span></p>
							 	<input class="user" type="text" value=""> 
							 </div>
							 <div class="input_holder row pad_15">
							 	<p>Total Cost </p>
							 	<input class="email" type="text" value="">
							 </div>
							 <div class="input_holder row pad_15">
							 	<p>Comments</p>
							 	<input class="textarea" type="textarea" value="">
							 </div>
	  				    </form>
					</div>
				</div>
				<div class="cb">  </div>
			</div>	
		 </section>
		 
		 <section>
		   <div class="container">	
			  <div class="col-md-9 col-sm-9 col-xs-12">		
		 	     <div class="button_holder button_holder_printbooking">
		 	       <h4 class="btn_prf"><a href="#">Add to Cart</a></h4>
		 	     </div>
	 	       <div class="button_holder button_holder_printbooking">
		 	       <h4 class="order_or_button">OR</h4>
	 	      </div>
		 	   <div class="button_holder button_holder_printbooking">
	        	   <h4 class="btn_prf"><a href="printbooking.html" target="_blank">Clear</a></h4>
	        	   <h4 class="btn_prf"><a href="#">Check Out</a></h4>
	             </div>
	             
               </div>
           </div>     
		 </section>
   </div><!-- Main Product Detail: End -->	
<?php include('footer.php') ?>