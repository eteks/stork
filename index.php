	<?php include('header.php') ?>
	<main class="main" id="product-detail">
   		<section class="header-page">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 hidden-xs">
						<h1 class="mh-title">Home</h1>
					</div>
					<div class="breadcrumb-w col-sm-9">
						<span class="hidden-xs">You are here:</span>
						<ul class="breadcrumb">
							<li>
								<a href="home.html">Home</a>
							</li>
							<li>
								<span>Print Stork</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section> <!---breadcrumb------>
	    <section class="pr-main" id="pr-login">	
			<div class="container">	
				<div class="col-md-9 col-sm-9 col-xs-12">
					<h1 class="ct-header">Welcome</h1>			
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>Please select your category &amp; location</h4>
					</div>
				</div>
			</div> <!---container--->
		</section>	
	     
	     
	     <section>	  			
		  <div class="container">
			<div id="content">
			   <form action="add_to_cart.php" enctype="multipart/form-data">
	    			<div id="my-tab-content" class="tab-content">
	    				<div class="tab-pane active container" id="green">
				        	<div class="row">
				        		<input type="radio" class="print_book_user_type" id="student" name="user_type" value="student" checked/>
				        		   <label for="student">Student</label>
				            	<input type="radio" class="print_book_user_type" id="professional" name="user_type" value="professional"/>
				            	    <label for="professional">Professional</label>
				        	</div>
				        	<div class="row location">
	        					<select name="college" id="print_book_college" required>
	        						<option value="" disabled selected>Select your College/University</option>
	        						<option value="mana">Manakula vinayakar</option>
	        						<option value="christ">Christ college</option>
	        					</select>
	        					<select id="print_book_state" name="state" class=" dn" required>
	        						<option value="" disabled selected>Select your State</option>
	        						<option value="pondy">Pondicherry</option>
	        						<option value="tamil">Tamilnadu</option>
	        					</select>
	        					<select id="print_book_state" name="area" placeholder="Select your area" required>
	        						<option value="" disabled selected>Select your area</option>
	        						<option value="laws">lawspet</option>
	        						<option value="muthial">Muthial pet</option>
	        					</select>
				        	</div>
				        </div> <!---#green---->
				         				         
				        <div class="button_holder">
				        	<h4 class="btn_prf"><a href="home.php">Go</a></h4>
				         	<!--<h4 class="btn_prf"><a href="home.html">Reset</a></h4>-->
				        </div>
				  </div>
		     </form>
			</div> <!--id content---->
	       </div> <!-- container -->
	     </section>  
    </main><!-- Main Product Detail: End -->
    <?php include('footer.php') ?>