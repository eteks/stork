<?php include('header.php') ?>

	<main class="main" id="product-detail">
		<div class="container">
			<div id="content">
			    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			        <li class="active"><a href="#red" data-toggle="tab">Red</a></li>
			        <li><a href="#orange" data-toggle="tab">Orange</a></li>
			        <li><a href="#yellow" data-toggle="tab">Yellow</a></li>
			        <li><a href="#green" data-toggle="tab">Green</a></li>
			        <li><a href="#blue" data-toggle="tab">Blue</a></li>
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
			        				<td>Total no of page</td>
			        				<td><input type="text" name="total_page" value=""/></td>
			        			</tr>
			        			<tr>
			        				<td>Total Cost</td>
			        				<td><input type="text" name="total_cost" value=""/></td>
			        			</tr>
			        		</table>
			        	</div>
			            
			        </div>
			        <div class="tab-pane" id="orange">
			            <h1>Orange</h1>
			            <p>orange orange orange orange orange</p>
			        </div>
			        <div class="tab-pane" id="yellow">
			            <h1>Yellow</h1>
			            <p>yellow yellow yellow yellow yellow</p>
			        </div>
			        <div class="tab-pane" id="green">
			            <h1>Green</h1>
			            <p>green green green green green</p>
			        </div>
			        <div class="tab-pane" id="blue">
			            <h1>Blue</h1>
			            <p>blue blue blue blue blue</p>
			        </div>
				</div>
			</div>
			<script type="text/javascript">
			    jQuery(document).ready(function ($) {
			        $('#tabs').tab();
			    });
			</script>    
		</div> <!-- container -->
	</main><!-- Main Product Detail: End -->
	
<?php include('footer.php') ?>