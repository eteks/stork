<?php 
	include('header.php');
	if(isset($_SESSION['login_status'])){
		if($_SESSION['login_status'] != 1){
		 $_SESSION['login_status'] = 0;
		}
	}
	//print_r($_SESSION);
	$_SESSION['city'] = isset($_COOKIE["city_id"])?$_COOKIE["city_id"]:'0';
?>
	<main class="main" id="product-detail">
   		<section class="header-page">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<span class="ct-header"><b>Welcome!</b></span>
					</div>
				</div>
			</div>
		</section> <!---breadcrumb------>
	    <section id="pr-login" class="pr-main" >	
			<div class="container">	
				
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>Please select your category &amp; location</h4>
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
				            	    <label for="professional">Professional/Individual</label>
				        	</div>
				        	<div class="row location">
				        		<div class="stu_area_college_holder dn">
		        					<!-- <select id="print_book_state" name="pro_state" required>
		        						<option value="" >Select your State</option>
		        						<?php
		        							//$state = selectfunction('*',STATE,'',$connection);
											//while($row = mysqli_fetch_array($state)){
												//echo "<option value ='".$row['state_id']."'>".$row['state_name']."</option>";
											//}
		        						?>
		        					</select> -->
		        					<select id="print_book_area_professional" name="pro_area">
		        						<option value="" >Select your Area</option>
		        					</select>
	        					</div>
	        					<div class="profession_state_area_holder">
		        					<!-- <select id="print_book_area_student" name="stu_area" required>
		        						<option value=""  >Select your Area</option>
		        						<?php
		        							//$area = selectfunction('*',AREA,'',$connection);
											//while($row = mysqli_fetch_array($area)){
												//echo "<option value ='".$row['area_id']."'>".$row['area_name']."</option>";
											//}
		        						?>
		        					</select> -->
		        					<select  name="stu_college" id="print_book_college">
		        						<option value="" >Select your College/Area</option>
		        					</select>
		        			             						 
		        			      <span class="no_college_found_error dn">No college or area found!</span>
	        					</div>
				        	</div>
				        </div> <!---#green---->
				        <div class="button_holder col-md-12 col-sm-12 col-xs-6">
				        	<h4 class="btn_prf"><a class="index_go_btn">Go</a></h4>
				         	<!--<h4 class="btn_prf"><a href="home.html">Reset</a></h4>-->
				        </div>
				  </div>
				  <?php
				  if($_SESSION['city'] == 0 ) {
				  ?>
				  <div class="boxes">
				    <div class="popup_index" id="popup_index">
				      <div class="container">	
				      	<div class="row col-md-12 col-sm-12 col-xs-12">
					    <div class="popup_content">
					    	<label>Select your city</label>
							<select name="print_book_city_name" id="initial_city_name" class="initial_city_name">
								<option value="" >Select your city</option>
								<?php
        							$city_query = "select * from stork_city inner join stork_state on stork_city.city_state_id = stork_state.state_id where stork_state.state_name ='puducherry' and stork_state.state_status = 1 and stork_city.city_status = 1";
									$city = mysqli_query($connection, $city_query);
									while($row = mysqli_fetch_array($city,MYSQLI_ASSOC)){
										if(strtolower($row['city_name']) == 'puducherry'){
											echo "<option selected value ='".$row['city_id']."'>".$row['city_name']."</option>";
										}
										// else{
											// echo "<option value ='".$row['city_id']."'>".$row['city_name']."</option>";
										// }
										
									}
        						?>
							</select>
					   		<div class="button_holder">
							   	<h3 class="select_city_btn"><a class="">Go</a></h3>
							</div>
					    </div>
					  </div>
					 </div>
					</div>
				    <div class="background_shadow" id="background_shadow"> </div>
				</div>
				 <?php } else {?>
		     		<input type="hidden" name="print_book_city_name" value="<?php echo $_SESSION['city']; ?>" class="initial_city_name" />
		    	 <?php } ?>
		     </form>
		    
			</div> <!--id content---->
	       </div> <!-- container -->
	     </section>  
    </main><!-- Main Product Detail: End -->
    
<?php include('footer.php') ?>