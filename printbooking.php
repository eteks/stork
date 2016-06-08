<?php include('header.php') ?>

	<main class="main" id="product-detail">
		<div class="container">
			<div id="content">
			    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			        <li class="active"><a href="#red" data-toggle="tab">Step 1</a></li>
			        <li><a href="#orange" data-toggle="tab">Step 2</a></li>
			        <li><a href="#yellow" data-toggle="tab">Step 3</a></li>
			    </ul>
    			<div id="my-tab-content" class="tab-content">
			        <div class="tab-pane active" id="red">
			        	<div class="row">
			        		<input type="radio" name="print_type" value="bw" checked/>Black &amp; White
			            	<input type="radio" name="print_type" value="c"/>Color
			            	<input type="radio" name="print_type" value="bwc"/>Black &amp; White and Color
			        	</div>
			        	<div class="row">
			        		<input type="radio" name="print_side" value="ss"/>Single Side
			            	<input type="radio" name="print_side" value="ds"/>Double Side
			        	</div>
			        	<div class="row">
			        		<table>
			        			<tr>
			        				<td>Paper size</td>
			        				<td>
			        					<select name="paper_size">
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
			        					<select name="papertype">
			        						<option value="bsheet">Bond Sheet</option>
			        						<option value="nsheet">Normal Sheet</option>
			        					</select>
			        				</td>
			        			</tr>
			        			<tr>
			        				<td>Enter color print page no</td>
			        				<td><input type="text" name="color_page" value=""/></td>
			        			</tr>
			        			<tr>
			        				<td>Total no of page</td>
			        				<td><input type="text" name="total_page" value=""/></td>
			        			</tr>
			        			<tr>
			        				<td>Total Cost</td>
			        				<td><input type="text" name="total_cost" value=""/></td>
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
			           			<table>
			           				<tr>
			           					<td colspan="2"> <input type="checkbox" name="registed_addres"/> Send Order to my college </td>
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
			            	Test
			            </div>
			        </div>
				</div>
			</div>
			
		</div> <!-- container -->
	</main><!-- Main Product Detail: End -->
	
<?php include('footer.php') ?>