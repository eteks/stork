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
				<div class="col-md-9 col-sm-9 col-xs-12">
					<h1 class="ct-header">Print Booking</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>Please make your order here</h4>
					</div>
				</div>
			</div> <!---container--->
	     </section>	
	     
	     <section class="pr-main" id="pr-register">	
			<div class="container">	
				<div class="col-md-9 col-sm-9 col-xs-12">		
					<div class="col-md-6 col-sm-6 col-xs-12 left">
						<form id="register-form" class="form-validate form-horizontal" method="post" action="#">
						    <div class="input_holder">
			        			<p>Print Type<span class="star">*</span></p>
			        			<select name="paper_row" class="print_book_paper_size">
	        						<option value="b&w">Black &amp; White</option>
	        						<option value="color">Color</option>
	        						<option value="both color">Black &amp; White and Color</option>
	        				    </select>
			        		 </div><!-- input_holder -->
						   	 <div class="input_holder">
			        			<p>Print Side<span class="star">*</span></p>
			        			<select name="paper_row" class="print_book_paper_size">
	        						<option value="1">Single Side</option>
	        						<option value="2">Double Side</option>
	        				    </select>
			        		 </div> <!-- input_holder -->
			        		 <!--
			        		 <p>Upload files<span class="star">*</span></p>
							 <input class="user" type="text" value="" placeholder="e.g, 1-12, 15, 20-25"> 
							 <input type="file" name="img">
							 
							 	<input class="add_more_color_page btn_browse button1" type="button" value="+" name="add_more_color_page">
							 	--->
							 <p> Upload files<span class="star">*</span></p>	
							 <div class="form-group">
        						<div class="col-xs-5">
           							<input type="text" class="form-control user" name="option[]" placeholder="e.g, 1-12, 15, 20-25" />
        						</div>
        						<div class="col-xs-4">
            						<button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
        						</div>
   							 </div>
   							 <div class="form-group">
        						<div class="col-xs-5">
           							<input type="text" class="form-control user" name="option[]" placeholder="e.g, 1-12, 15, 20-25" />
        						</div>
        						<div class="col-xs-4">
            						<button type="button" class="btn btn-default addButton"><i class="fa fa-minus"></i></button>
        						</div>
   							 </div>	
							
							 <!-- The option field template containing an option field and a Remove button -->
							<div class="form-group hide" id="optionTemplate">
							    <div class="col-xs-offset-3 col-xs-5">
							        <input class="form-control" type="text" name="option[]" />
							    </div>
							    <div class="col-xs-4">
							        <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
							    </div>
							</div>
							
							
							
							  
							 
							 
							<!-- <div class="input_holder only_for_color_with_bw  paper-row fl"> 
							 	<input type="file" name="upload file" value="UPload File" class="fl"/>
							  	<input class="add_more_color_page btn_browse button1 fl" type="button" value="+" name="add_more_color_page">
							 </div><!-- input_holder -->  	
							 
							 <div class="cb">  </div>
							 <p>Total No of Pages<span class="star">*</span></p>
							 <input class="user" type="text" value=""> 
							 <p>Total Cost </p>
							 <input class="email" type="text" value="">
							 <p>Comments</p>
							 <input class="textarea" type="textarea" value="">
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
		 	       <h4 class="btn_prf"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"> </i> Add to Cart</a></h4>
	        	   <h4 class="btn_prf"><a href="#">Check Out</a></h4>
	        	   <h4 class="btn_prf"><a href="printbooking.html" target="_blank">Clear</a></h4>
	             </div>
	             
               </div>
           </div>     
		 </section>
   </div><!-- Main Product Detail: End -->	
<?php include('footer.php') ?>