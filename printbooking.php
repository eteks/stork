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
				        		<input type="radio" class="print_book_user_type" name="user_type" value="student" checked/>Student
				            	<input type="radio" class="print_book_user_type" name="user_type" value="professional"/>Professional
				        	</div>
				        	<div class="row text-center">
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
				            
				        </div>
				        <div class="tab-pane" id="red">
				        	<div class="row">
				        		<input type="radio" class="print_book_print_type pbptbw" name="print_type" value="bw" checked/>Black &amp; White
				            	<input type="radio" class="print_book_print_type pbptc" name="print_type" value="c"/>Color
				            	<input type="radio" class="print_book_print_type pbptbwc" name="print_type" value="bwc"/>Black &amp; White and Color
				        	</div>
				        	<div class="row">
				        		<input type="radio" class="print_book_print_side pbpsss" name="print_side" value="ss" checked/>Single Side
				            	<input type="radio" class="print_book_print_side pbpsds" name="print_side" value="ds"/>Double Side
				        	</div>
				        	<div class="row">
				        		<table>
				        			<tr>
				        				<td>Paper size</td>
				        				<td>
				        					<select name="paper_size" class="print_book_paper_size">
				        						<option value="a5">A5</option>
				        						<option value="a4">A4</option>
				        						<option value="a3">A3</option>
				        						<option value="a2">A2</option>
				        						<option value="a1">A1</option>
				        					</select>
				        				</td>
				        			</tr>
				        			<tr>
				        				<td>Paper type</td>
				        				<td>
				        					<select name="papertype" class="print_book_paper_type">
				        						<option value="bsheet">Bond Sheet</option>
				        						<option value="nsheet">Normal Sheet</option>
				        					</select>
				        				</td>
				        			</tr>
				        			<tr class="only_for_color_with_bw dn">
				        				<td>Enter color print page no</td>
				        				<td><input type="text" name="color_page" value="" class="color_print_page_no"/></td>
				        			</tr>
				        			<tr>
				        				<td>Total no of page</td>
				        				<td><input type="text" name="total_page" value="" class="total_number_of_page"/></td>
				        			</tr>
				        			<tr>
				        				<td>Total Cost</td>
				        				<td><input type="text" name="total_cost" value="" class="print_book_total cost"/></td>
				        			</tr>
				        			<tr>
				        				<td>Upload your file</td>
				        				<td><input type="file" name="upload file" value=""/></td>
				        			</tr>
				        		</table>
				        	</div>
				            
				        </div>
				        <div class="tab-pane" id="orange">
				           <div class="row">
				           		<div class="col-md-6">
				           			<table>
				           				<tr>
				           					<td colspan="2"> <input type="checkbox" name="registed_addres"/> Send Order to registred address </td>
				           				</tr>
				           				<tr>
				           					<td>Line 1</td>
				           					<td><input type="text" name="line1" /> </td>
				           				</tr>
				           				<tr>
				           					<td>Line 2</td>
				           					<td><input type="text" name="line2" /> </td>
				           				</tr>
				           				<tr>
				           					<td>Area</td>
				           					<td>
				           						<select name="area">
				           							<option value="lawspet">Lawspet</option>
				           							<option value="rajiv">Rajiv nagar</option>
				           							<option value="muthial">Muthialpet</option>
				           						</select>
				           					</td>
				           				</tr>
				           				<tr>
				           					<td>State</td>
				           					<td>
				           						<select name="area">
				           							<option value="pondy">Pondicherry</option>
				           							<option value="tamil">Tamilnau</option>
				           							<option value="andra">Andrapradesh</option>
				           						</select>
				           					</td>
				           				</tr>
				           			</table>
				           		</div>
				           		<div class="col-md-6">
				           			<table class="print_book_college_stu">
				           				<tr>
				           					<td colspan="2"> <input type="checkbox" name="registed_addres"/>Send Order to my college </td>
				           				</tr>
				           				<tr>
				           					<td>Student name</td>
				           					<td><input type="text" name="stu_name" /> </td>
				           				</tr>
				           				<tr>
				           					<td>Student ID</td>
				           					<td><input type="text" name="stu_id" /> </td>
				           				</tr>
				           				<tr>
				           					<td>Year of Studing</td>
				           					<td><input type="text" name="stu_year" /> </td>
				           				</tr>
				           				<tr>
				           					<td>Department</td>
				           					<td><input type="text" name="stu_dept" /> </td>
				           				</tr>
				           				<tr>
				           					<td>College</td>
				           					<td>
				           						<select name="area">
				           							<option value="pondy">Manakula vinayagar</option>
				           							<option value="tamil">Mailam Engineering</option>
				           							<option value="andra">Pondicherry university</option>
				           						</select>
				           					</td>
				           				</tr>
				           				<tr>
				           					<td>Area</td>
				           					<td>
				           						<select name="area">
				           							<option value="lawspet">Lawspet</option>
				           							<option value="rajiv">Rajiv nagar</option>
				           							<option value="muthial">Muthialpet</option>
				           						</select>
				           					</td>
				           				</tr>
				           				
				           			</table>
				           		</div>
				           </div>
				        </div>
				        <div class="tab-pane" id="yellow">
				            <div class="row">
				            	<table>
				            		<tr>
				            			<th colspan="2">
				            				order details
				            			</th>		
				            		</tr>
				            		<tr>
				            			<td>Print type:</td>
				            			<td class="print_book_confirm_print_type"></td>
				            		</tr>
				            		<tr>
				            			<td>Print side:</td>
				            			<td class="print_book_confirm_print_side"></td>
				            		</tr>
				            		<tr>
				            			<td>Print size:</td>
				            			<td class="print_book_confirm_paper_size"></td>
				            		</tr>
				            		<tr>
				            			<td>Paper Type:</td>
				            			<td class="print_book_confirm_paper_type"></td>
				            		</tr>
				            		<tr class="print_book_confirm_color dn">
				            			<td>Color print page no:</td>
				            			<td class="print_book_confirm_color_pages"></td>
				            		</tr>
				            		<tr class="print_book_confirm_color dn">
				            			<td>Total no of color pages:</td>
				            			<td class="print_book_confirm_total_color_pages"></td>
				            		</tr>
				            		<tr>
				            			<td>Total no of pages:</td>
				            			<td class="print_book_confirm_total_number_pages"></td>
				            		</tr>
				            		<tr>
				            			<td>Total cost:</td>
				            			<td class="print_book_confirm_total_cost"></td>
				            		</tr>
				            	</table>
				            	<table>
				            		<tr>
				            			<th colspan="2">Shipping details</th>
				            		</tr>
				            		<tr>
				            			<td>Line 1:</td>
				            			<td class="print_book_confirm_total_ship_lane1"></td>
				            		</tr>
				            		<tr>
				            			<td>Line 2:</td>
				            			<td class="print_book_confirm_total_ship_lane2"></td>
				            		</tr>
				            	</table>
				            	<div class="row">
				            		<input type="button" name="add to cart" value="Add to cart"/>
				            		<input type="submit" name="pay" value="Paynow"/>
				            		<input type="button" name="cancel" value="Cancel"/>
				            	</div>
				            </div>
				        </div>
					</div>
				</form>
			</div>
			
		</div> <!-- container -->
	</main><!-- Main Product Detail: End -->
	
<?php include('footer.php') ?>