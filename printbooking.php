<?php include('header.php') ?>

	<main class="main" id="product-detail">
		<div class="container">
			<div id="content">
			    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			    	<li class="active"><a href="#green" data-toggle="tab">Step 1</a></li>
			        <li><a href="#red" data-toggle="tab">Step 2</a></li>
			        <li><a href="#orange" data-toggle="tab">Step 3</a></li>
			        <li><a id="print_booking_confirmation" href="#yellow" data-toggle="tab">Step 4</a></li>
			    </ul>
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
	        					<select name="college" id="print_book_college" class="">
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
				        <div class="tab-pane" id="red">
				        	
				        	<div class="input_holder">
			        			<label>Colors to Print:</label>
			        			<input type="radio" class="print_book_print_type pbptbw" id="color-type" name="print_type" value="bw" checked/>
			        			<label>Black &amp; White</label>
				            	<input type="radio" class="print_book_print_type pbptc" id="color-type" name="print_type" value="c"/>
				            	<label>Color</label>
				            	<input type="radio" class="print_book_print_type pbptbwc" id="color-type" name="print_type" value="bwc"/>
				            	<label>Black &amp; White and Color</label>
			        		</div><!-- input_holder -->
			        		
			        		
			        		<div class="input_holder">
			        			<label>Sides to Print:</label>
			        			<input type="radio" class="print_book_print_side pbpsss" name="print_side" value="ss" checked/>
				        		<label>Single Side</label>
				            	<input type="radio" class="print_book_print_side pbpsds" name="print_side" value="ds"/>
				            	<label>Double Side</label>
			        		</div><!-- input_holder -->
				        	
			        		<div class="input_holder">
			        			<label>Paper size</label>
			        			<select name="paper_row" class="print_book_paper_size">
	        						<option value="a5">A5</option>
	        						<option value="a4">A4</option>
	        						<option value="a3">A3</option>
	        						<option value="a2">A2</option>
	        						<option value="a1">A1</option>
	        					</select>
			        		</div><!-- input_holder -->
				        		
			        		<div class="input_holder">
			        			<label>Paper type</label>
			        			<select name="papertype" class="print_book_paper_type">
	        						<option value="bsheet">Bond Sheet</option>
	        						<option value="nsheet">Normal Sheet</option>
	        					</select>
			        		</div><!-- input_holder -->
				        		
			        		<div class="input_holder only_for_color_with_bw dn paper-row">
			        			<label>Enter color print page no</label>
			        			<input type="text" name="color_page" value="" class="color_print_page_no"/>
			        			<div>
			        			  <input type="file" name="upload file" value=""/> </br>
			        			  <input class="add_more_color_page" type="button" value="+" name="add_more_color_page">
			        			 </div>
			        		</div><!-- input_holder -->
			        		
			        	    </br>
			        		
			        		<div class="input_holder only_for_color_with_bw dn paper-row">
			        			<label>Total no of page</label>
			        			<input type="text" name="total_page" value="" class="total_number_of_page"/>
			        		</div><!-- input_holder -->
			        		
			        		<div class="input_holder only_for_color_with_bw dn paper-row">
			        			<label>Total Cost</label>
			        			<input type="text" name="total_cost" value="" class="print_book_total cost"/>
			        		</div><!-- input_holder -->
			        		
			        		<div class="input_holder only_for_color_with_bw dn paper-row">
			        			<label>Upload your file</label>
			        		    </br></br>
			        			<input type="file" name="upload file" value=""/>
			        		</div><!-- input_holder -->
				            
				        </div> <!---#red---->
				  
				        
				 <div class="tab-pane" id="orange">
				 	<div>
				        	
				        	<div class="input_holder_heading">
				        		<input type="checkbox" name="registed_addres"/>
				        		<label> Send Order to registred address</label>				        		
				        	</div>
				            </br>
				            </br>
				        	
				        	<div class="input_holder">
				        		<label> Line 1</label>
				        		<input type="text" name="line1" size="60" class="addr"/>				        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label> Line 2</label>
				        		<input type="text" name="line2" size="60" class="addr" />				        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label>Area </label>
				        		<select name="area">
				           			<option value="lawspet">Lawspet</option>
				           			<option value="rajiv">Rajiv nagar</option>
				           			<option value="muthial">Muthialpet</option>
				           		</select>				        		
				        	</div>

							<div class="input_holder">
				        		<label>State</label>
				        		<select name="area">
	       							<option value="pondy">Pondicherry</option>
	       							<option value="tamil">Tamilnau</option>
	       							<option value="andra">Andrapradesh</option>
	       						</select>			        		
				        	</div>
				       </div> 	
				       
				       </br> </br>				       
				        
				        <div class="print_book_college_stu">
				        	
				        	<div class="input_holder_heading">
				        		<input type="checkbox" name="registed_addres" class="oder-college"/>	
				        		<label>Send Order to my college </label>
				        	</div>
				             </br>
				            </br>
				        	
				        	<div class="input_holder">
				        		<label>Student name </label>
				        		<input type="text" name="stu_name" size="60" class="order-college"/> 		        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label>Student name </label>
				        		<input type="text" name="stu_name" size="60" class="order-college" /> 		        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label>Student ID</label>
				        		<input type="text" name="stu_id" size="60" class="order-college" />		        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label>Year of Studing</label>
				        		<input type="text" name="stu_year" size="60" class="order-college" />		        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label>Department</label>
				        		<input type="text" name="stu_dept" size="60"  class="order-college"/>		        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label>College</label>
				        		<select name="area">
           							<option value="pondy">Manakula vinayagar</option>
           							<option value="tamil">Mailam Engineering</option>
           							<option value="andra">Pondicherry university</option>
           						</select>		        		
				        	</div>
				        	
				        	<div class="input_holder">
				        		<label>Area</label>
				        		<select name="area">
           							<option value="lawspet">Lawspet</option>
           							<option value="rajiv">Rajiv nagar</option>
           							<option value="muthial">Muthialpet</option>
           						</select>		        		
				        	</div>
			           </div>	
			         			
				</div> <!--Orange--->
				        
			  <div class="tab-pane" id="yellow">
				         <div>	
				        	<div class="input_holder_heading">
				        		<h3>Order Details </h3>
				        	</div>
				        	</br>
				        	
				        	<div class="input_holder print_book_confirm_color dn">
				        		<label>Print type: </label>
				        		<div class="print_book_confirm_print_type">  </div>
				        	</div>
				        	
				        	<div class="input_holder print_book_confirm_color dn">
				        		<label>Print side:</label>
				        		<div class="print_book_confirm_print_side">  </div>
				        	</div>
				        	
				        	<div class="input_holder print_book_confirm_color dn">
				        		<label>Print size:</label>
				        		<div class="print_book_confirm_paper_size">  </div>
				        	</div>
				        	
				        	<div class="input_holder print_book_confirm_color dn">
				        		<label>Paper Type:</label>
				        		<div class="print_book_confirm_paper_type">  </div>
				        	</div>
				        	
				        	<div class="input_holder print_book_confirm_color dn">
				        		<label>Color print page no:</label>
				        		<div class="print_book_confirm_color_pages">  </div>
				        	</div>
				            
				            <div class="input_holder print_book_confirm_color dn">
				        		<label>Total no of color pages:</label>
				        		<div class="print_book_confirm_total_color_pages">  </div>
				        	</div>
				            		
				            <div class="input_holder print_book_confirm_color dn">
				        		<label>Total no of pages:</label>
				        		<div class="print_book_confirm_total_number_pages">  </div>
				        	</div>	
				        	
				        	<div class="input_holder">
				        		<label>Total cost:</label>
				        		<div class="print_book_confirm_total_cost">  </div>
				        	</div>		
				        </div> <!---order details--->
				        </br>
				        </br>  

						<div>
							
							<div class="input_holder_heading">
				        		<h3>Shipping Details</h3>
				        	</div>
 				            </br>
				        	
				        	<div class="input_holder">
				        		<label>Line 1:</label>
				        		<div class="print_book_confirm_total_ship_lane1">  </div>
				        	</div>
				        	<div class="input_holder">
				        		<label>Line 2:</label>
				        		<div class="print_book_confirm_total_ship_lane2">  </div>
				        	</div>

						</div> <!---Shipping details--->
						</br>
				        </br>
						
				        <div class="payment-button">
				            		<input type="button" name="add to cart" value="Add to cart" class="pay-btn"/>
				            		<input type="submit" name="pay" value="Paynow" class="pay-btn"/>
				            		<input type="button" name="cancel" value="Cancel" class="pay-btn"/>
				        </div>    
				            		
		   </div> <!---#yellow---->
				       
			     </div>
		     </form>
			</div> <!--id content---->
			
		</div> <!-- container -->
	</main><!-- Main Product Detail: End -->
	
<?php include('footer.php') ?>