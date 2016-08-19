<header>
	<!-- Navbar Html Start-->
	<section id="top-header" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="top-links col-lg-7 col-md-6 col-sm-5 col-xs-6">
					<ul>
						<li class="hidden-xs">
							<a title="Facebook" href="https://www.facebook.com/Print-Stork-145625759197915/?ref=aymt_homepage_panel">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li class="hidden-xs">
							<a title="Twitter" href="https://twitter.com/printstork">
								<i class="fa fa-twitter"></i> 
							</a>
						</li> 
						<li class="hidden-xs">
							<a title="Google Plus" href="https://plus.google.com/u/0/">
								<i aria-hidden="true" class="fa fa-google-plus"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- <div class="top-header-right f-right col-lg-5 col-md-6 col-sm-7 col-xs-6">
					<div class="w-header-right">
						<div class="th-hotline">
							<i class="fa fa-phone"></i>
							<span>1.866.614.8002</span>
						</div> 
					</div>
				</div> -->
			</div>
		</div>
	</section>
	<!-- Navbar Html end -->

	<!--Menubar Html Start-->

	<section class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-2 col-sm-8 col-xs-8 w-logo">
					<div class="logo hd-pd ">
						<a href="dashboard.php">
							<img src="style/img/logo.png" alt="printshop logo">
						</a>
					</div>	
				</div>
				<div class="col-lg-7 col-md-8 col-sm-2 col-xs-2">
				</div>
				<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 headerCS">
					
					<div class="user_logout">
						<span class="dropdowSCIcon">
							<ul class="">
								<li class="dropdown">
									<a class="username_display" href="dashboard.php"><?php echo $_SESSION['user_name']; ?></a>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Profile/Logout">
										<i class="fa fa-user"></i>
									</a>
									<ul class="dropdown-menu animated fadeInUp">
										<li>
											<a href="edit_admin_users.php?id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-user"></i>&nbsp;Profile</a>
										</li>
										<li>
											<a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
										</li>
									</ul>
								</li>
							</ul>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Menubar Html End -->
</header>
<!--Header: End-->

<!-- Submenu Html Start -->

<!-- <section class="header-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 hidden-xs dashboard_header">
				<h1 class="mh-title"> My Dashboard </h1>
			</div>
			<div class="breadcrumb-w col-sm-9">
				<span class="">You are here:</span>
				<ul class="breadcrumb">
					<li>
						<a href="/">Home</a>
					</li>
					<li>
						<span>My Dashboard</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section> -->



					