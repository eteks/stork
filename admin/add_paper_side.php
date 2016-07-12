<?php
include "includes/header.php";
if(!isset($_GET['type'])){
  die('<script type="text/javascript">window.location.href="index.php";</script>');
  exit();
 }
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Paper Side</title>
</head>
<body>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$paper_side = $_POST['paper_side'];
		$paper_side_status=$_POST['paper_side_status'];

		$type = $_POST['type_name'];
		$type_array=array("plain"=>"plain_printing","project"=>"project_printing","multi"=>"multicolor_printing");
  		$type_name = $type_array[$type];
		$select_type = mysql_query ("SELECT * FROM stork_printing_type WHERE printing_type='$type_name'");
		$printing_type_id = mysql_fetch_array($select_type);
		$printing_type = $printing_type_id ['printing_type_id'];

		if($paper_side=="" || $paper_side_status=="") {
		$successMessage ="<div class='container error_message_mandatory'><span> Please fill all required(*) fields</span></div>";
		}
		else {
			$qr=mysql_query("SELECT * FROM stork_paper_side WHERE paper_side='$paper_side' AND printing_type_id = '$printing_type'");
			$row=mysql_fetch_array($qr);
			if($row > 0) {
			$successMessage =  "<div class='container error_message_mandatory'><span> Paper side already exist </span></div>";
			}
			else {
				mysqlQuery("INSERT INTO `stork_paper_side` (paper_side,paper_side_status,printing_type_id) VALUES ('$paper_side','$paper_side_status','$printing_type')");
				$successMessage =  "<div class='container error_message_mandatory'><span> Paper side inserted successfully </span></div>";
			}
		}
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
						<span> Paper Side </span>
					</li>
					<li>
						<span>Add Paper Side</span>
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
						<h3 class="acc-title lg">Add Paper Side Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paper Side Information</h4>
							<?php 	$type_name = $_GET['type']; ?>
							<form action="add_paper_side.php?type=<?php echo $type_name; ?>" method="POST" name="edit-acc-info" id="add_paper_side">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
					 				<?php if($successMessage) echo $successMessage; ?>
								<div class="form-group">
								    <label for="last-name">Paper Side<span class="required">*</span></label>
									<input type="text" class="form-control" id="paperside" autocomplete="off" name="paper_side" placeholder="Paper Side">
								</div>
								<input type="hidden" name="type_name" value="<?php echo $type_name; ?>">
								<div class="cate-filter-content">	
								    <label for="first-name">Paper Side Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="sel_a" name="paper_side_status">
								        <option value="">
											<span>Select Status</span>
										</option>
								        <option value="1">
											<span>Active</span>
										</option>
										<option value="0">
											<span>Inactive</span>
										</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Save</button>
								</div>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<?php include 'includes/footer.php'; ?> 