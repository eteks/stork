
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$paper_side = $_POST['paper_side'];
		$paper_side_status=$_POST['paper_side_status'];
		if($paper_side=="" || $paper_side_status=="") {
			$successMessage = "<div class='container error_message_mandatory'><span> Please fill out all mandatory fields </span></div>";
		}
		else {
			$qr=mysql_query("SELECT * FROM stork_paper_side WHERE paper_side='$paper_side'");
			$row=mysql_fetch_array($qr);
			if($row > 0) {
				$successMessage = "<div class='container error_message_mandatory'><span> Paper side already exist </span></div>";
			}
			else {
				mysqlQuery("INSERT INTO `stork_paper_side` (paper_side,paper_side_status) VALUES ('$paper_side','$paper_side_status')");
				$successMessage = "<div class='container error_message_mandatory'><span> Paper side inserted successfully </span></div>";
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
						<span> Paper side </span>
					</li>
					<li>
						<span>Add Paper side</span>
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
						<h3 class="acc-title lg">Add Paperside Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">Paperside Information</h4>
							<form action="add_paper_side.php" method="POST" name="edit-acc-info" id="add_paper_side">
								<div class="form-group">
								    <label for="last-name">Paperside<span class="required">*</span></label>
									<input type="text" class="form-control" id="first-name" name="paper_side" placeholder="Paperside">
								</div>
								<div class="cate-filter-content">	
								    <label for="first-name">Paperside Status<span class="required">*</span></label>
									<select class="product-type-filter form-control" id="s5" name="paper_side_status">
								        <option value="">
											<span>Select status</span>
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