<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Areas</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-9 hidden-xs dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="col-md-3 search-w SC-w hd-pd ">
				<span class="search-icon dropdowSCIcon" title="Search">
					<i class="fa fa-search"></i>
				</span>
				<div class="search-safari" style="display:none;">
					<!-- <div class="search-form dropdowSCContent">
						<form method="POST" action="#">
							<input type="text" name="search" placeholder="Search" />
							<input type="submit" name="search" value="Search">
							<i class="fa fa-search"></i>
						</form>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
<?php 
if($_SESSION['is_superuser'] == 1 )
	include 'includes/sidebar_admin.php';
else
	include 'includes/sidebar.php';	
?>
<div class="mainy col-md-9 col-sm-8 col-xs-12"> 
	<div class="heading_section col-md-12">
	<h3 class="acc-title lg clone_heading"> Dashboard Information</h3>
	<div class="clear_both"> </div>
</div>
<div class="dashboard_content">
	<span class="dashboard_message"> Welcome <?php echo $_SESSION['user_name']; ?> !  You have logged in as <?php if($_SESSION['is_superuser'] == 1 ) echo "administrator"; else echo "Staff"; ?></span>
</div> <!-- dashboard_content -->
<div id="font_user"> 
	<i class="fa fa-user" aria-hidden="true"> </i> 
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>