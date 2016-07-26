<?php 
function countCity()
{
	$query = mysqlQuery("SELECT count(city_id) as total FROM stork_city");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countState()
{
	$query = mysqlQuery("SELECT count(state_id) as total FROM stork_state");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countArea()
{
	$query = mysqlQuery("SELECT count(area_id) as total FROM stork_area");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countMulticolorCopies()
{
	$query = mysqlQuery("SELECT count(multicolor_copies_id) as total FROM stork_multicolor_copies");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countCostEstimation(){
	$query = mysqlQuery("SELECT count(cost_estimation_id) as total FROM stork_cost_estimation");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countAdminUsers(){
	$query = mysqlQuery("SELECT count(adminuser_id) as total FROM stork_admin_users");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countUsers(){
	$query = mysqlQuery("SELECT count(user_id) as total FROM stork_users");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function totalPagesCount()
{
	$query = mysqlQuery("SELECT count(id) as totalPages FROM `pages`");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalPages'];
}
function countCollege()
{
	$query = mysqlQuery("SELECT count(college_id) as total FROM `stork_college`");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countPapersize($type_name)
{
	$select_type = mysql_query ("SELECT * FROM stork_printing_type WHERE printing_type='$type_name'");
	$printing_type_id = mysql_fetch_array($select_type);
	$printing_type = $printing_type_id ['printing_type_id'];

	$query = mysqlQuery("SELECT count(paper_size_id) as total FROM `stork_paper_size` WHERE printing_type_id='$printing_type'");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countPaperside($type_name)
{
	$select_type = mysql_query ("SELECT * FROM stork_printing_type WHERE printing_type='$type_name'");
	$printing_type_id = mysql_fetch_array($select_type);
	$printing_type = $printing_type_id ['printing_type_id'];

	$query = mysqlQuery("SELECT count(paper_side_id) as total FROM `stork_paper_side` WHERE printing_type_id='$printing_type'");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countPapertype($type_name)
{
	$select_type = mysql_query ("SELECT * FROM stork_printing_type WHERE printing_type='$type_name'");
	$printing_type_id = mysql_fetch_array($select_type);
	$printing_type = $printing_type_id ['printing_type_id'];

	$query = mysqlQuery("SELECT count(paper_type_id) as total FROM `stork_paper_type` WHERE printing_type_id='$printing_type'");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countPaperprinttype($type_name)
{
	$select_type = mysql_query ("SELECT * FROM stork_printing_type WHERE printing_type='$type_name'");
	$printing_type_id = mysql_fetch_array($select_type);
	$printing_type = $printing_type_id ['printing_type_id'];

	$query = mysqlQuery("SELECT count(paper_print_type_id) as total FROM `stork_paper_print_type` WHERE printing_type_id='$printing_type'");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function totalSourcesCount()
{
	$query = mysqlQuery("SELECT count(id) as totalFeeds FROM envatoSources");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalFeeds'];
}
function countOrder()
{
	$query = mysqlQuery("SELECT count(order_id) as total FROM stork_order");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countOrderDetails()
{
	$query = mysqlQuery("SELECT count(order_details_id) as total FROM stork_order_details");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countOfferZone()
{
	$query = mysqlQuery("SELECT count(offer_zone_id) as total FROM stork_offer_zone");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countTransaction()
{
	$query = mysqlQuery("SELECT count(transaction_id) as total FROM stork_ccavenue_transaction");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countScheduleTime()
{
	$query = mysqlQuery("SELECT count(schedule_time_id) as total FROM stork_cabin_schedule_time");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countCabinSystemDetails()
{
	$query = mysqlQuery("SELECT count(total_number_of_system_id) as total FROM stork_cabin_total_number_of_system");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countCabinTimeSchedule()
{
	$query = mysqlQuery("SELECT count(schedule_time_id) as total FROM stork_cabin_schedule_time");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countHolidayDetails()
{
	$query = mysqlQuery("SELECT count(holiday_id) as total FROM stork_cabin_holiday");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countCabinCostEstimation()
{
	$query = mysqlQuery("SELECT count(cabin_cost_estimation_id) as total FROM stork_cabin_cost_estimation");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countSystemAvailability()
{
	$query = mysqlQuery("SELECT count(system_availability_id) as total FROM stork_cabin_system_availability");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countCabinOrderDetails()
{
	$query = mysqlQuery("SELECT count(cabin_order_id) as total FROM stork_cabin_order");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countCabinTransactionDetails()
{
	$query = mysqlQuery("SELECT count(cabin_transaction_id) as total FROM stork_cabin_ccavenue_transaction");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
?> 
<aside class="col-md-3 col-sm-4 col-xs-12 account-sidebar sidebar">
	<h3 class="acc-title lg">Dashboard</h3>
	<div class="sidey" style="">
		<div class="side-cont">
			<ul class="nav admin_sidebar">
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="admin_users.php" || 
					basename($_SERVER['PHP_SELF'])=="users.php" || basename($_SERVER['PHP_SELF'])=="edit_admin_users.php" || basename($_SERVER['PHP_SELF'])=="edit_users.php")
					{ 
						?> 
						<li class="has_submenu open test">
						<?php 
					} 
					else 
					{ 
						?>
						<li class="has_submenu">
						<?php 
					}  
				?>
					<a href="users.php">
						<!--<i class="fa fa-user"></i> --> User
						<span class="caret pull-right"></span>
					</a>
				<!-- Sub menu -->
					<ul>
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="admin_users.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li class="">
						<?php 
					}  
				?>				
					<a href="admin_users.php"> <i class="fa fa-list"></i><span id="allProducts"> Admin Users (<?php echo countAdminUsers() ?>)</span></a>
						</li> 
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="users.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li class="">
						<?php 
					}  
				?>
							<a href="users.php"> <i class="fa fa-list"></i><span id="allProducts"> All Users (<?php echo countUsers() ?>)</span></a>
						</li> 
					</ul>
				</li>
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_state.php" || 
					basename($_SERVER['PHP_SELF'])=="states.php" || basename($_SERVER['PHP_SELF'])=="edit_state.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>				
					<a href="states.php">
						<!--<i class="fa fa-map-marker"></i> --> State
						<span class="caret pull-right"></span>
					</a>
				</li>
				
				
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_city.php" || 
					basename($_SERVER['PHP_SELF'])=="city.php" || basename($_SERVER['PHP_SELF'])=="edit_city.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="city.php">
						<!--<i class="fa fa-map-marker"></i> --> City
						<span class="caret pull-right"></span>
					</a>		
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_area.php" || 
					basename($_SERVER['PHP_SELF'])=="areas.php" || basename($_SERVER['PHP_SELF'])=="edit_area.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="areas.php">
						<!-- <i class="fa fa-home"></i> -->Area
						<span class="caret pull-right"></span>
					</a>
				</li>
		 
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_college.php" || 
					basename($_SERVER['PHP_SELF'])=="colleges.php" || basename($_SERVER['PHP_SELF'])=="edit_college.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="colleges.php">
						<!-- <i class="fa fa-location-arrow"></i> --> College
						<span class="caret pull-right"></span>
					</a>
				</li>

					<?php 
					if(basename($_SERVER['PHP_SELF'])=="printing_type.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
					<a href="printing_type.php">
						<!-- <i class="fa fa-location-arrow"></i> --> Printing Type
						<span class="caret pull-right"></span>
					</a>
				</li>



				<!--  Plain printing start -->
				<?php 
					// if(basename($_SERVER['REQUEST_URI'])=="add_paper_print_type.php?type=plain"  || basename($_SERVER['REQUEST_URI'])=="paperprinttypes.php?type=plain" || basename($_SERVER['REQUEST_URI'])=="add_paper_side.php?type=plain" || 
					// basename($_SERVER['REQUEST_URI'])=="papersides.php?type=plain" || basename($_SERVER['REQUEST_URI'])=="add_paper_type.php?type=plain" || 
					// basename($_SERVER['REQUEST_URI'])=="papertypes.php?type=plain" || basename($_SERVER['REQUEST_URI'])==trim("add_paper_size.php?type=plain") || 
					// basename($_SERVER['REQUEST_URI'])=="paper_size.php?type=plain")
					// {
					if(basename($_SERVER['REQUEST_URI'])=="paperprinttypes.php?type=plain" || 
					basename($_SERVER['REQUEST_URI'])=="add_paper_print_type.php?type=plain" || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_print_type.php?type=plain")!==false || basename($_SERVER['REQUEST_URI'])=="papersides.php?type=plain" || basename($_SERVER['REQUEST_URI'])=="add_paper_side.php" || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_side.php?type=plain")!==false || basename($_SERVER['REQUEST_URI'])=="papertypes.php?type=plain" || 
					basename($_SERVER['REQUEST_URI'])=="add_paper_type.php?type=plain" || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_type.php?type=plain")!==false || 
					basename($_SERVER['REQUEST_URI'])=="paper_size.php?type=plain" || 
					basename($_SERVER['REQUEST_URI'])=="add_paper_size.php?type=plain" || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_size.php?type=plain")!==false)
					{ 
						?> 
						
						<li class="has_submenu open test">
						<?php 

					} 
					else 
					{
						?>

						<li class="has_submenu">
						<?php 
					}  
				 ?>
					<a href="#">
						Plain printing
						<span class="caret pull-right"></span>
					</a>
				<ul>
				<!-- Paper_print_type -->
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="paperprinttypes.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="paperprinttypes.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Print Types (<?php echo countPaperprinttype("plain_printing") ?>) </span></a>
				</li>
				<!-- Paper_side -->
			<?php 
					if(basename($_SERVER['PHP_SELF'])=="papersides.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
					<a href="papersides.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Sides (<?php echo countPaperside("plain_printing") ?>) </span></a>
				</li>
				<!-- Paper_type -->
			<?php 
					if(basename($_SERVER['PHP_SELF'])=="papertypes.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
					<a href="papertypes.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Types (<?php echo countPapertype("plain_printing") ?>) </span></a>
				</li>
				<!-- Paper_size -->
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="paper_size.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
					<a href="paper_size.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Sizes (<?php echo countPapersize("plain_printing") ?>) </span></a>
					<!-- <a href="paperprinttypes.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Print Types </span></a>
				</li>
			
				<li>
					<a href="papersides.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Sides </span></a>
				</li>
			
				<li>
					<a href="papertypes.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Types </span></a>
				</li>
			
				<li>
					<a href="paper_size.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Sizes </span></a> -->
				</li>
			</ul>
			</li>

			<!-- Plain printing end -->

			<!--  Project printing start -->
					

				<?php 
					if(basename($_SERVER['REQUEST_URI'])=="add_paper_print_type.php?type=project" || 
					basename($_SERVER['REQUEST_URI'])=="paperprinttypes.php?type=project" || basename($_SERVER['REQUEST_URI'])=="add_paper_side.php?type=project" || 
					basename($_SERVER['REQUEST_URI'])=="papersides.php?type=project" || basename($_SERVER['REQUEST_URI'])=="add_paper_type.php?type=project" || 
					basename($_SERVER['REQUEST_URI'])=="papertypes.php?type=project" || basename($_SERVER['REQUEST_URI'])=="add_paper_size.php?type=project" || 
					basename($_SERVER['REQUEST_URI'])=="paper_size.php?type=project" || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_type.php?type=project")!==false || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_side.php?type=project")!==false || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_print_type.php?type=project")!==false || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_size.php?type=project")!==false)
					{ 
						?> 
						<li class="has_submenu open test">
						<?php 
					} 
					else 
					{ 
						?>
						<li class="has_submenu">
						<?php
					}  
				 ?>
					<a href="#">
						Project printing
						<span class="caret pull-right"></span>
					</a>
					<ul>
					<!-- Paper_print_type -->
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="paperprinttypes.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="paperprinttypes.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Print Types (<?php echo countPaperprinttype("project_printing") ?>) </span></a>
					</li>
					<!-- Paper_side -->
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="papersides.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="papersides.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Sides (<?php echo countPaperside("project_printing") ?>) </span></a>
					</li>
					<!-- Paper_type -->
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="papertypes.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="papertypes.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Types (<?php echo countPapertype("project_printing") ?>) </span></a>
					</li>
					<!-- Paper_size -->
							<?php 
					if(basename($_SERVER['PHP_SELF'])=="paper_size.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="paper_size.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Sizes (<?php echo countPapersize("project_printing") ?>) </span></a>
						<!-- <a href="paperprinttypes.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Print Types </span></a>
					</li>
					<li>
						<a href="papersides.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Sides </span></a>
					</li>
					<li>
						<a href="papertypes.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Types </span></a>
					</li>
					<li>
						<a href="paper_size.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Sizes </span></a> -->
					</li>
					</ul>
				</li>

			<!--  Project printing end -->

			<!-- Multicolor printing start -->

			<?php
				if(basename($_SERVER['REQUEST_URI'])=="add_paper_print_type.php?type=multi" || 
				basename($_SERVER['REQUEST_URI'])=="paperprinttypes.php?type=multi" || basename($_SERVER['REQUEST_URI'])=="add_paper_side.php?type=multi" || 
					basename($_SERVER['REQUEST_URI'])=="papersides.php?type=multi" || basename($_SERVER['REQUEST_URI'])=="add_paper_type.php?type=multi" || 
					basename($_SERVER['REQUEST_URI'])=="papertypes.php?type=multi" || basename($_SERVER['REQUEST_URI'])=="add_paper_size.php?type=multi" || 
					basename($_SERVER['REQUEST_URI'])=="paper_size.php?type=multi" || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_type.php?type=multi")!==false || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_side.php?type=multi")!==false || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_print_type.php?type=multi")!==false || strpos(basename($_SERVER['REQUEST_URI']), "edit_paper_size.php?type=multi")!==false)
					{ 
						?> 
						<li class="has_submenu open test">
						<?php 
					} 
					else 
					{ 
						?>
						<li class="has_submenu">
						<?php 
					}  
				 ?>
				 	<a href="#">
						Multicolor printing
						<span class="caret pull-right"></span>
					</a>
					<ul>
					<!-- Paper_print_type -->
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="paperprinttypes.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="paperprinttypes.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Print Types (<?php echo countPaperprinttype("multicolor_printing") ?>) </span></a>
					</li>
					<!-- Paper_side -->
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="papersides.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="papersides.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Sides (<?php echo countPaperside("multicolor_printing") ?>) </span></a>
					</li>
					<!-- Paper_type -->
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="papertypes.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="papertypes.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Types (<?php echo countPapertype("multicolor_printing") ?>) </span></a>
					</li>
					<!-- Paper_size -->
					<li>
						<a href="paper_size.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Sizes (<?php echo countPapersize("multicolor_printing") ?>) </span></a>
						<!-- <a href="paperprinttypes.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Print Types </span></a>
					</li>
					<li>
						<a href="papersides.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Sides </span></a>
					</li>
					<li>
						<a href="papertypes.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Types </span></a>
					</li>
					<li>
						<a href="paper_size.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Sizes </span></a> -->
					</li>
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_multicolor_copies.php" || 
					basename($_SERVER['PHP_SELF'])=="multicolor_copies.php" || basename($_SERVER['PHP_SELF'])=="edit_multicolor_copies.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="multicolor_copies.php">
						<!--<i class="fa fa-user"></i> --> Mutlicolor Copies
						<span class="caret pull-right"></span>
					</a>
				</li>

		
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_printing_cost_estimation_combination.php" || 
					basename($_SERVER['PHP_SELF'])=="printing_cost_estimation_combination.php" || basename($_SERVER['PHP_SELF'])=="edit_printing_cost_estimation_combination.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="printing_cost_estimation_combination.php">
						<!-- <i class="fa fa-file"></i> --> Plain Printing Cost Estimation
						<span class="caret pull-right"></span>
					</a>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_project_printing_cost_estimation_combination.php" || 
					basename($_SERVER['PHP_SELF'])=="project_printing_cost_estimation_combination.php" || basename($_SERVER['PHP_SELF'])=="edit_project_printing_cost_estimation_combination.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="project_printing_cost_estimation_combination.php">
						<!-- <i class="fa fa-file"></i> --> Project Printing Cost Estimation
						<span class="caret pull-right"></span>
					</a>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_multicolor_printing_cost_estimation_combination.php" || 
					basename($_SERVER['PHP_SELF'])=="multicolor_printing_cost_estimation_combination.php" || basename($_SERVER['PHP_SELF'])=="edit_multicolor_printing_cost_estimation_combination.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="multicolor_printing_cost_estimation_combination.php">
						<!-- <i class="fa fa-file"></i> --> Multicolor Printing Cost Estimation
						<span class="caret pull-right"></span>
					</a>					
				</li>

			<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_binding_cost_estimation_combination.php" || 
					basename($_SERVER['PHP_SELF'])=="binding_cost_estimation_combination.php" || basename($_SERVER['PHP_SELF'])=="edit_binding_cost_estimation_combination.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>	
					<a href="binding_cost_estimation_combination.php">
						<!-- <i class="fa fa-file"></i> --> Binding Cost Estimation
						<span class="caret pull-right"></span>
					</a>
				</li>
				
			<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_system_details.php" || basename($_SERVER['PHP_SELF'])=="add_cabin_system_details.php"|| basename($_SERVER['PHP_SELF'])=="edit_cabin_system_details.php" || basename($_SERVER['PHP_SELF'])=="add_cabin_schedule_time.php" || basename($_SERVER['PHP_SELF'])=="edit_cabin_schedule_time.php" ||
						basename($_SERVER['PHP_SELF'])=="cabin.php" || basename($_SERVER['PHP_SELF'])=="cabin_schedule_time.php"|| basename($_SERVER['PHP_SELF'])=="cabin_cost_estimation.php"|| basename($_SERVER['PHP_SELF'])=="cabin_holiday_details.php" || basename($_SERVER['PHP_SELF'])=="add_cabin_holiday_details.php"
						|| basename($_SERVER['PHP_SELF'])=="edit_cabin_holiday_details.php"
						|| basename($_SERVER['PHP_SELF'])=="cabin_cost_estimation.php" ||
						basename($_SERVER['PHP_SELF'])=="add_cabin_cost_estimation.php" ||
						basename($_SERVER['PHP_SELF'])=="edit_cabin_cost_estimation.php" ||
						basename($_SERVER['PHP_SELF'])=="cabin_system_availability.php" ||
						basename($_SERVER['PHP_SELF'])=="cabin_order_details.php" ||
						basename($_SERVER['PHP_SELF'])=="cabin_transaction_details.php"
						)					{ 
						?> 
						<li class="has_submenu open test">
						<?php 
					} 
					else 
					{ 
						?>
						<li class="has_submenu">
						<?php 
					}  
				 ?>
					<a href="#">
					
						<!-- <i class="fa fa-file"></i> --> Cabin Booking Details

						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>						
					<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_system_details.php" || basename($_SERVER['PHP_SELF'])=="add_cabin_system_details.php" || basename($_SERVER['PHP_SELF'])=="edit_cabin_system_details.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>		
							<a href="cabin_system_details.php"><i class="fa fa-list"></i><span> Cabin System Details (<?php echo countCabinSystemDetails() ?>) </span></a>
						</li>
							<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_schedule_time.php" || basename($_SERVER['PHP_SELF'])=="add_cabin_schedule_time.php" || basename($_SERVER['PHP_SELF'])=="edit_cabin_schedule_time.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="cabin_schedule_time.php"><i class="fa fa-list"></i><span> Cabin Time Schedule (<?php echo countCabinTimeSchedule() ?>) </span></a>
						</li>
							<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_holiday_details.php" || basename($_SERVER['PHP_SELF'])=="add_cabin_holiday_details.php" || basename($_SERVER['PHP_SELF'])=="edit_cabin_holiday_details.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
				<a href="cabin_holiday_details.php"><i class="fa fa-list"></i><span> Holiday Details (<?php echo countHolidayDetails() ?>) </span></a>
						</li>
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_cost_estimation.php" || basename($_SERVER['PHP_SELF'])=="add_cabin_cost_estimation.php" || basename($_SERVER['PHP_SELF'])=="edit_cabin_cost_estimation.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="cabin_cost_estimation.php"><i class="fa fa-list"></i><span> Cabin Cost Estimation(<?php echo countCabinCostEstimation() ?>) </span></a>
						</li>
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_system_availability.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="cabin_system_availability.php"><i class="fa fa-list"></i><span> Cabin System Availability(<?php echo countSystemAvailability() ?>) </span></a>
						</li>
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_order_details.php" || 
						basename($_SERVER['PHP_SELF'])=="edit_cabin_order_details.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
						<a href="cabin_order_details.php"><i class="fa fa-list"></i><span> Cabin Order Details(<?php echo countCabinOrderDetails() ?>) </span></a>
						</li>
						<?php 
					if(basename($_SERVER['PHP_SELF'])=="cabin_transaction_details.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="cabin_transaction_details.php"><i class="fa fa-list"></i><span> Cabin Transaction Details(<?php echo countCabinTransactionDetails() ?>) </span></a>
						</li>
					</ul>
				</li>
				
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="orders.php" || basename($_SERVER['PHP_SELF'])=="edit_orders.php" || basename($_SERVER['PHP_SELF'])=="order_details.php" || basename($_SERVER['PHP_SELF'])=="edit_order_details.php" || basename($_SERVER['PHP_SELF'])=="track_order.php" || basename($_SERVER['PHP_SELF'])=="edit_track_order.php" || basename($_SERVER['PHP_SELF'])=="transaction.php")
					{ 
						?> 
						<li class="has_submenu open test">
						<?php 
					} 
					else 
					{ 
						?>
						<li class="has_submenu">
						<?php 
					}  
				 ?>
					<a href="#">
						<!-- <i class="fa fa-file"></i> --> Order and Transaction
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
							<?php 
					if(basename($_SERVER['PHP_SELF'])=="orders.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="orders.php"><i class="fa fa-list"></i><span> All Orders (<?php echo countOrder() ?>)</span></a>
						</li> 
							<?php 
					if(basename($_SERVER['PHP_SELF'])=="order_details.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="order_details.php"><i class="fa fa-list"></i><span> Order Details (<?php echo countOrderDetails() ?>) </span></a>
						</li>
							<?php 
					if(basename($_SERVER['PHP_SELF'])=="track_order.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="track_order.php"><i class="fa fa-list"></i><span> Track Order (<?php echo countOrder() ?>) </span></a>
						</li>
							<?php 
					if(basename($_SERVER['PHP_SELF'])=="transaction.php")
					{ 
						?> 
						<li class="test_a">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
							<a href="transaction.php"><i class="fa fa-list"></i><span> Transaction Details (<?php echo countTransaction() ?>) </span></a>
						</li>
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_offer_zones.php" || 
					basename($_SERVER['PHP_SELF'])=="offer_zones.php" || basename($_SERVER['PHP_SELF'])=="edit_offer_zones.php")
					{ 
						?> 
						<li class="test">
						<?php 
					} 
					else 
					{ 
						?>
						<li>
						<?php 
					}  
				?>
					<a href="offer_zones.php">
						<!-- <i class="fa fa-file"></i> --> Offer Zone
						<span class="caret pull-right"></span>
					</a>
				</li>
				<!-- <li>
					<a href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
				</li> -->
			</ul>
		</div>
	</div>
</aside><!--Account Sidebar: End-->