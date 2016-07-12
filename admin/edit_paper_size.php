
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Paper size</title>
</head>
<body>
<?php 
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$paper_size = $_POST["Papersize"];
		$printing_type = $_POST['printing_type'];
		$paper_size_status = $_POST["paper_size_status"];
		$qr = mysqlQuery("SELECT * FROM stork_paper_size WHERE 	paper_size='$paper_size' AND paper_size_id NOT IN('$val') AND printing_type_id='$printing_type'");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='container error_message_mandatory'><span> Papersize Already exists! </span></div>";	
		} else {
			mysqlQuery("UPDATE `stork_paper_size` SET `paper_size`='$paper_size',`paper_size_status`='$paper_size_status' WHERE `paper_size_id`=".$val);
			if(($paper_size_status == 0 && !$_POST['change_status'])||($paper_size_status == 1 && $_POST['change_status'])){
				mysqlQuery("UPDATE `stork_cost_estimation` SET `cost_estimation_status`='$paper_size_status' WHERE `cost_estimation_paper_size_id`=".$val);
			}
			$successMessage = "<div class='container error_message_mandatory'><span> Papersize Updated Successfully! </span></div>";		
		}				
	}	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	$select_type = mysql_query ("SELECT * FROM stork_paper_size WHERE paper_size_id='$id'");
	$printing_type_id = mysql_fetch_array($select_type);
	$printing_type = $printing_type_id ['printing_type_id'];
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
						<span> Paper size </span>
					</li>
					<li>
						<span>Edit Paper size</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
	<?php include 'includes/sidebar.php'; ?>
	<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Paper Size Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Size Information</h4>
							<?php
							$papersize_query = mysqlQuery ("SELECT * FROM stork_paper_size WHERE paper_size_id='$id'");
							$papersize_array=mysql_fetch_array($papersize_query);
							?>
							<form action="edit_paper_size.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_paper_size">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
								<?php if ($papersize_array['paper_size_status'] == 0){ ?>
									<input type="hidden" name="change_status" class="change_status_value">
								<?php } ?>
								<div class="form-group">
								    <label for="last-name">Paper Size<span class="required">*</span></label>
									<input type="text" class="form-control" id="papersize" name="Papersize" value="<?php echo $papersize_array['paper_size']; ?>" id="first-name" placeholder="Area Name">
								</div>
								<input type="hidden" name="printing_type" value="<?php echo $printing_type ?>" >
								<div class="cate-filter-content">	
								    <label for="first-name">Papersize Status<span class="required">*</span></label>
									<select class="product-type-filter form-control change_status" id="sel_a" name="paper_size_status">
								 <option value="">
											<span>Select Status</span>
										</option>
								        <option value="1" <?php if($papersize_array['paper_size_status'] == 1)  echo "selected" ?> >
											<span>Active</span>
										</option>
										<option value="0" <?php if($papersize_array['paper_size_status'] == 0)  echo "selected" ?> >
										<span>Inactive</span>
										</option>
										
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
								</div>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 