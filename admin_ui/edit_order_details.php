
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php
if (isset($_GET['update']))
{
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$val = $_GET['update'];
	$val = mres($val);

	$order_details_paper_print_type = $_POST["order_details_paper_print_type"];
	$order_details_paper_side = $_POST["order_details_paper_side"]; 
	$order_details_paper_size = $_POST["order_details_paper_size"];
	$order_details_paper_type = $_POST["order_details_paper_type"];
	$order_details_total_no_of_pages = $_POST["order_details_total_no_of_pages"];
	$order_details_color_print_pages = $_POST["order_details_color_print_pages"];
	$order_details_comments = $_POST["order_details_comments"];
	$order_details_total_amount = $_POST["order_details_total_amount"];
	$order_details_status = $_POST["order_details_status"];
	
	mysqlQuery("UPDATE stork_order_details SET order_details_paper_print_type_id='$order_details_paper_print_type',order_details_paper_side_id='$order_details_paper_side',order_details_paper_size_id='$order_details_paper_size',order_details_paper_type_id='$order_details_paper_type',order_details_total_no_of_pages='$order_details_total_no_of_pages',order_details_color_print_pages='$order_details_color_print_pages',order_details_comments='$order_details_comments',order_details_total_amount='$order_details_total_amount',order_details_status='$order_details_status' WHERE order_details_id=".$val);	
	$successMessage = "<div class='container error_message_mandatory'><span> Order Details Updated Successfully! </span></div>";	
}	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
?> 
<?php include 'includes/navbar_admin.php'; ?>
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 hidden-xs dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="breadcrumb-w col-sm-9">
				<span class="">You are here:</span>
				<ul class="breadcrumb">
					<li>
					<span> Order </span>
					</li>
					<li>
						<span>Edit Orders</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
 <span class="error_test"> Please fill out all mandatory fields </span>
</div>
<?php if($successMessage) echo $successMessage; ?>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit order Details Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Order Details Information</h4>
							<form action="edit_order_details.php?update=<?php echo $id; ?>" id="edit_order_details" method="POST" name="edit-acc-info">
							<?php 
								$match = "SELECT * FROM `stork_order_details` WHERE `order_details_id`='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
									while($row = mysql_fetch_array($qry)) 
									{
							?>
								<div class="form-group">
								    <label for="last-name">Order ID<span class="required">*</span></label>
									<input type="text" class="form-control" id="orderid" placeholder="Order ID" name="order_id" value="<?php echo($row['order_id']); ?>">
								</div>
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper Print Type<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="order_details_paper_print_type">
								        <option>
											<span>Select Paper Print Type</span>
										</option>
								        <?php
					                        $query = mysql_query("select * from stork_paper_print_type");
					                        while ($rowPaperPrintType = mysql_fetch_array($query)) {
					                        if($row['order_details_paper_print_type_id'] == $rowPaperPrintType['paper_print_type_id'])   
												echo "<option selected value='".$rowPaperPrintType['paper_print_type_id']."'>".$rowPaperPrintType['paper_print_type']."</option>";
											else
												echo "<option value='".$rowPaperPrintType['paper_print_type_id']."'>".$rowPaperPrintType['paper_print_type']."</option>";
					                      } ?>
								    </select>
								    </div>
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper Side<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_b" name="order_details_paper_side">
								        <option>
											<span>Select Paper Side</span>
										</option>
								        <?php
					                        $query = mysql_query("select * from stork_paper_side");
					                        while ($rowPaperSide = mysql_fetch_array($query)) {
					                        if($row['order_details_paper_side_id'] == $rowPaperSide['paper_side_id'])   
												echo "<option selected value='".$rowPaperSide['paper_side_id']."'>".$rowPaperSide['paper_side']."</option>";
											else
												echo "<option value='".$rowPaperSide['paper_side_id']."'>".$rowPaperSide['paper_side']."</option>";	
					                    } ?>
								    </select>
								    </div>
								<div class="cate-filter-content">	
								    <label for="first-name">Order Paper Size<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_c" name="order_details_paper_size">
								        <option>
											<span>Select Paper Size</span>
										</option>
										<?php
											$query = mysql_query("select * from stork_paper_size");
									        while ($rowPaperSize = mysql_fetch_array($query)) {
					                        if($row['order_details_paper_size_id'] == $rowPaperSize['paper_size_id'])   
												echo "<option selected value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";
											else
												echo "<option value='".$rowPaperSize['paper_size_id']."'>".$rowPaperSize['paper_size']."</option>";	
			                        	} ?>
								    </select>
								</div>
								<div class="cate-filter-content">
								    <label for="last-name">Order Paper Type<span class="required">*</span></label>
										<select class="product-type-filter form-control" id="sel_d" name="order_details_paper_type">
								        <option>
											<span>Select the Paper Type</span>
										</option>
								       <?php
					                        $query = mysql_query("select * from stork_paper_type");
					                        while ($rowPaperType = mysql_fetch_array($query)) {
						                        if($row['order_details_paper_type_id'] == $rowPaperType['paper_type_id'])   
													echo "<option selected value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";
												else
													echo "<option value='".$rowPaperType['paper_type_id']."'>".$rowPaperType['paper_type']."</option>";	
					                    } ?>
								    </select>
								</div>
										
								<div class="form-group">
								    <label for="last-name">Total No.Of Pages<span class="required">*</span></label>
									<input type="text" class="form-control" id="pages" placeholder="Total No.Of Pages" name="order_details_total_no_of_pages" value="<?php echo($row['order_details_total_no_of_pages']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Color Print Pages<span class="required">*</span></label>
									<input type="text" class="form-control" id="colorprintpage" placeholder="Color Print Pages" name="order_details_color_print_pages" value="<?php echo($row['order_details_color_print_pages']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Comments<span class="required">*</span></label>
								    <textarea placeholder="Comments" id="comments"name="order_details_comments" class="form-control width_text_area"><?php echo($row['order_details_comments']); ?></textarea>	
								</div>
								<div class="form-group">
								    <label for="last-name">Total Amount<span class="required">*</span></label>
									<input type="text" class="form-control" id="amount" maxlength=10 placeholder="Total Amount" name="order_details_total_amount" value="<?php echo($row['order_details_total_amount']); ?>">
								</div>

											<div class="cate-filter-content">	
								    <label for="first-name">Order Detail Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_e" name="order_details_status">
								        <option>
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if ($row['order_details_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['order_details_status'] == 0) echo "selected"; ?>>InActive</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
								</div>
							<?php 
							} 
							}
							?>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 