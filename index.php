<?php 
	include('header.php');
	if(isset($_SESSION['login_status'])){
		if($_SESSION['login_status'] != 1){
		 $_SESSION['login_status'] = 0;
		}
	}
	//print_r($_SESSION);
?>
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
								<a>Home</a>
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
			   <form action="home.php" enctype="multipart/form-data" method="post" id="index_page_form">
	    			<div id="my-tab-content" class="tab-content">
	    				<div class="tab-pane active container" id="green">
				        	<div class="row">
				        		<input type="radio" class="print_book_user_type" id="student" name="user_type" value="stu" checked/>
				        		   <label for="student">Student</label>
				            	<input type="radio" class="print_book_user_type" id="professional" name="user_type" value="pro"/>
				            	    <label for="professional">Professional</label>
				        	</div>
				        	<div class="row location">
				        		<div class="stu_area_college_holder dn">
		        					<select id="print_book_state" name="pro_state" required>
		        						<option value="" >Select your State</option>
		        						<?php
		        							$state = selectfunction('*',STATE,'',$connection);
											while($row = mysqli_fetch_array($state)){
												echo "<option value ='".$row['state_id']."'>".$row['state_name']."</option>";
											}
		        						?>
		        					</select>
		        					<select id="print_book_area_professional" name="pro_area" required>
		        						<option value="" >Select your Area</option>
		        					</select>
	        					</div>
	        					<div class="profession_state_area_holder">
		        					<select id="print_book_area_student" name="stu_area" required>
		        						<option value=""  >Select your Area</option>
		        						<?php
		        							$area = selectfunction('*',AREA,'',$connection);
											while($row = mysqli_fetch_array($area)){
												echo "<option value ='".$row['area_id']."'>".$row['area_name']."</option>";
											}
		        						?>
		        					</select>
		        					<select name="stu_college" id="print_book_college" required>
		        						<option value="" >Select your College/University</option>
		        					</select>
	        					</div>
				        	</div>
				        </div> <!---#green---->
				         				         
				        <div class="button_holder">
				        	<h4 class="btn_prf"><a class="index_go_btn">Go</a></h4>
				         	<!--<h4 class="btn_prf"><a href="home.html">Reset</a></h4>-->
				        </div>
				  </div>
		     </form>
			</div> <!--id content---->
	       </div> <!-- container -->
	     </section>  
    </main><!-- Main Product Detail: End -->
    <div class="boxes">
	    <div class="popup_index" id="popup_index">
		    <div class="popup_content">
		    	<label>Select your city</label>
				<select name="" class="" id="">
					<option value="" >Select your city</option>
					<option value="" >Tamilnadu</option>
					<option value="" >Pudhucherry</option>
					<!-- <?php
						$state = selectfunction('*',PAPERSIZE,'',$connection);
						while($row = mysqli_fetch_array($state)){
							echo "<option value ='".$row['paper_size_id']."'>".$row['paper_size']."</option>";
						}
					?> -->
				</select>
		   		<div class="button_holder">
				   	<h3><a class="" href="#">Go</a></h3>
				</div>
		    </div>
		</div>
	    <div class="background_shadow" id="background_shadow"> </div>
	</div>
<?php include('footer.php') ?>