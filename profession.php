<?php include('header.php') ?>

	<main class="main" id="product-detail">
		<div class="container">
			<div id="content">
			   <form action="add_to_cart.php" enctype="multipart/form-data">
	    			<div id="my-tab-content" class="tab-content">
	    				<div class="tab-pane active container" id="green">
				        	<div class="row text-center">
				        		<input type="radio" class="print_book_user_type" id="student" name="user_type" value="student" checked/>
				        		   <label for="student">Student</label>
				            	<input type="radio" class="print_book_user_type" id="professional" name="user_type" value="professional"/>
				            	    <label for="professional">Professional</label>
				        	</div>
				        	<div class="row text-center location">
	        					<select name="college" id="print_book_college">
	        						<option value="mana">Manakula vinayakar</option>
	        						<option value="christ">Christ college</option>
	        					</select>
	        					<select id="print_book_state" name="state" class=" dn">
	        						<option value="pondy">Pondicherry</option>
	        						<option value="tamil">Tamilnadu</option>
	        					</select>
	        					<select name="area">
	        						<option value="laws">lawspet</option>
	        						<option value="muthial">Muthial pet</option>
	        					</select>
				        	</div>
				        </div> <!---#green---->
				         				         
				        <div class="button_holder">
				        	<h4 class="btn_prf"><a href="printbooking.php" target="_blank">Go</a></h4>
				         	<h4 class="btn_prf"><a href="profession.php">Reset</a></h4>
				        </div>
				  </div>
		     </form>
			</div> <!--id content---->
	    </div> <!-- container -->
	</main><!-- Main Product Detail: End -->
	
<?php include('footer.php') ?>