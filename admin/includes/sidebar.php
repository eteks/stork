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
function countPapersize()
{
	$query = mysqlQuery("SELECT count(paper_size_id) as total FROM `stork_paper_size`");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countPaperside()
{
	$query = mysqlQuery("SELECT count(paper_side_id) as total FROM `stork_paper_side`");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countPapertype()
{
	$query = mysqlQuery("SELECT count(paper_type_id) as total FROM `stork_paper_type`");
	$fecth = mysql_fetch_array($query);
	return $fecth['total'];
}
function countPaperprinttype()
{
	$query = mysqlQuery("SELECT count(paper_print_type_id) as total FROM `stork_paper_print_type`");
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
?> 
<aside class="col-md-3 col-sm-4 col-xs-12 account-sidebar sidebar">
	<h3 class="acc-title lg">Dashboard</h3>
	<div class="sidey" style="">
		<div class="side-cont">
			<ul class="nav">
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="admin_users.php" || 
					basename($_SERVER['PHP_SELF'])=="users.php" || basename($_SERVER['PHP_SELF'])=="edit_admin_users.php" || basename($_SERVER['PHP_SELF'])=="edit_users.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<li>
							<a href="admin_users.php"> <i class="fa fa-list"></i><span id="allProducts"> Admin Users (<?php echo countAdminUsers() ?>)</span></a>
						</li> 
						<li>
							<a href="users.php"> <i class="fa fa-list"></i><span id="allProducts"> All Users (<?php echo countUsers() ?>)</span></a>
						</li> 
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_state.php" || 
					basename($_SERVER['PHP_SELF'])=="states.php" || basename($_SERVER['PHP_SELF'])=="edit_state.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!--<i class="fa fa-map-marker"></i> --> State
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<!-- <a href="add_product.php"><i class="fa fa-plus-circle"></i> Bulk Add Products</a> -->
							<a href="add_state.php"><i class="fa fa-plus-circle"></i><span id="allProducts"> Add State</span></a>
						</li>
						<!-- <li>
							<a href="update_product.php"><i class="fa fa-check-square-o"></i> Bulk Update Products</a>
						</li> -->
						<li>
							<a href="states.php"> <i class="fa fa-list"></i><span id="allProducts"> All States (<?php echo countState() ?>)</span></a>
						</li> 
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_city.php" || 
					basename($_SERVER['PHP_SELF'])=="city.php" || basename($_SERVER['PHP_SELF'])=="edit_city.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!--<i class="fa fa-map-marker"></i> --> City
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<!-- <a href="add_product.php"><i class="fa fa-plus-circle"></i> Bulk Add Products</a> -->
							<a href="add_city.php"><i class="fa fa-plus-circle"></i><span id="allProducts"> Add City</span></a>
						</li>
						<!-- <li>
							<a href="update_product.php"><i class="fa fa-check-square-o"></i> Bulk Update Products</a>
						</li> -->
						<li>
							<a href="city.php"> <i class="fa fa-list"></i><span id="allProducts"> All Cities (<?php echo countCity() ?>)</span></a>
						</li> 
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_area.php" || 
					basename($_SERVER['PHP_SELF'])=="areas.php" || basename($_SERVER['PHP_SELF'])=="edit_area.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!-- <i class="fa fa-home"></i> -->Area
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_area.php"><i class="fa fa-plus-circle"></i><span> Add Area </span></a>
						</li>
						<li>
							<a href="areas.php"><i class="fa fa-list"></i><span> All Areas (<?php echo countArea() ?>)</span></a>
						</li>				
					</ul>
				</li>
		 
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_college.php" || 
					basename($_SERVER['PHP_SELF'])=="colleges.php" || basename($_SERVER['PHP_SELF'])=="edit_college.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!-- <i class="fa fa-location-arrow"></i> --> College
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_college.php"><i class="fa fa-plus-circle"></i><span> Add college </span></a>
						</li>
						<li>
							<a href="colleges.php"><i class="fa fa-list"></i><span> All Colleges (<?php echo countCollege() ?>) </span></a>
						</li> 
					</ul>
				</li>

				<li>
					<a href="printing_type.php">
						<!-- <i class="fa fa-location-arrow"></i> --> Printing Type
						<span class="caret pull-right"></span>
					</a>
				</li>



				<!--  Plain printing start -->
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_paper_print_type.php?type=plain" || 
					basename($_SERVER['PHP_SELF'])=="paperprinttypes.php?type=plain" || basename($_SERVER['PHP_SELF'])=="add_paper_side.php?type=plain" || 
					basename($_SERVER['PHP_SELF'])=="papersides.php?type=plain" || basename($_SERVER['PHP_SELF'])=="add_paper_type.php?type=plain" || 
					basename($_SERVER['PHP_SELF'])=="papertypes.php?type=plain" || basename($_SERVER['PHP_SELF'])=="add_paper_size.php?type=plain" || 
					basename($_SERVER['PHP_SELF'])=="paper_size.php?type=plain")
					{ 
						?> 
						<li class="has_submenu open">
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
				<li>
					<a href="paperprinttypes.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Print Types (<?php echo countPaperprinttype() ?>) </span></a>
				</li>
				<!-- Paper_side -->
				<li>
					<a href="papersides.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Sides (<?php echo countPaperside() ?>) </span></a>
				</li>
				<!-- Paper_type -->
				<li>
					<a href="papertypes.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Types (<?php echo countPapertype() ?>) </span></a>
				</li>
				<!-- Paper_size -->
				<li>
					<a href="paper_size.php?type=plain" class="plain_print_menu"><i class="fa fa-list"></i><span> Paper Sizes (<?php echo countPapersize() ?>) </span></a>
				</li>
			</ul>
			</li>

			<!-- Plain printing end -->

			<!--  Project printing start -->
					

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_paper_print_type.php?type=project" || 
					basename($_SERVER['PHP_SELF'])=="paperprinttypes.php?type=project" || basename($_SERVER['PHP_SELF'])=="add_paper_side.php?type=project" || 
					basename($_SERVER['PHP_SELF'])=="papersides.php?type=project" || basename($_SERVER['PHP_SELF'])=="add_paper_type.php?type=project" || 
					basename($_SERVER['PHP_SELF'])=="papertypes.php?type=project" || basename($_SERVER['PHP_SELF'])=="add_paper_size.php?type=project" || 
					basename($_SERVER['PHP_SELF'])=="paper_size.php?type=project" )
					{ 
						?> 
						<li class="has_submenu open">
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
					<li>
						<a href="paperprinttypes.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Print Types (<?php echo countPaperprinttype() ?>) </span></a>
					</li>
					<!-- Paper_side -->
					<li>
						<a href="papersides.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Sides (<?php echo countPaperside() ?>) </span></a>
					</li>
					<!-- Paper_type -->
					<li>
						<a href="papertypes.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Types (<?php echo countPapertype() ?>) </span></a>
					</li>
					<!-- Paper_size -->
					<li>
						<a href="paper_size.php?type=project" class="project_print_menu"><i class="fa fa-list"></i><span> Paper Sizes (<?php echo countPapersize() ?>) </span></a>
					</li>
					</ul>
				</li>

			<!--  Project printing end -->

			<!-- Multicolor printing start -->

			<?php 
				if(basename($_SERVER['PHP_SELF'])=="add_paper_print_type.php?type=multi" || 
				basename($_SERVER['PHP_SELF'])=="paperprinttypes.php?type=multi" || basename($_SERVER['PHP_SELF'])=="add_paper_side.php?type=multi" || 
					basename($_SERVER['PHP_SELF'])=="papersides.php?type=multi" || basename($_SERVER['PHP_SELF'])=="add_paper_type.php?type=multi" || 
					basename($_SERVER['PHP_SELF'])=="papertypes.php?type=multi" || basename($_SERVER['PHP_SELF'])=="add_paper_size.php?type=multi" || 
					basename($_SERVER['PHP_SELF'])=="paper_size.php?type=multi")
					{ 
						?> 
						<li class="has_submenu open">
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
					<li>
						<a href="paperprinttypes.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Print Types (<?php echo countPaperprinttype() ?>) </span></a>
					</li>
					<!-- Paper_side -->
					<li>
						<a href="papersides.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Sides (<?php echo countPaperside() ?>) </span></a>
					</li>
					<!-- Paper_type -->
					<li>
						<a href="papertypes.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Types (<?php echo countPapertype() ?>) </span></a>
					</li>
					<!-- Paper_size -->
					<li>
						<a href="paper_size.php?type=multi" class="multicolor_print_menu"><i class="fa fa-list"></i><span> Paper Sizes (<?php echo countPapersize() ?>) </span></a>
					</li>
					</ul>
				</li>

			<!--  Multicolor printing end -->


				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_printing_cost_estimation.php" || 
					basename($_SERVER['PHP_SELF'])=="printing_cost_estimation.php" || basename($_SERVER['PHP_SELF'])=="edit_printing_cost_estimation.php" || basename($_SERVER['PHP_SELF'])=="printing_cost_estimation_combination.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!-- <i class="fa fa-file"></i> --> Printing Cost Estimation
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_printing_cost_estimation.php"><i class="fa fa-plus-circle"></i><span> Add Printing Cost Estimation </span></a>
						</li> 
						<!-- <li>
							<a href="printing_cost_estimation.php"><i class="fa fa-list"></i><span> View Estimated Cost (<?php echo countCostEstimation() ?>) </span></a>
						</li> --> 
						<li>
							<a href="printing_cost_estimation_combination.php"><i class="fa fa-list"></i><span> All Printing Cost Estimation </span></a>
						</li> 
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_project_printing_cost.php" ||basename($_SERVER['PHP_SELF'])=="project_printing_cost_estimation_combination.php" ||basename($_SERVER['PHP_SELF'])=="edit_project_printing_cost.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!-- <i class="fa fa-file"></i> --> Project Printing Cost Estimation
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_project_printing_cost.php"><i class="fa fa-plus-circle"></i><span> Add Project Printing Cost </span></a>
						</li> 
						<!-- <li>
							<a href="printing_cost_estimation.php"><i class="fa fa-list"></i><span> View Estimated Cost (<?php echo countCostEstimation() ?>) </span></a>
						</li> --> 
						<li>
							<a href="project_printing_cost_estimation_combination.php"><i class="fa fa-list"></i><span> All Project Printing Cost Estimation </span></a>
						</li> 
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_multicolor_printing_cost.php" ||basename($_SERVER['PHP_SELF'])=="multicolor_printing_cost_estimation_combination.php" ||basename($_SERVER['PHP_SELF'])=="edit_multicolor_printing_cost.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!-- <i class="fa fa-file"></i> --> Multicolor Printing Cost Estimation
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_multicolor_printing_cost.php"><i class="fa fa-plus-circle"></i><span> Add Multicolor Printing Cost </span></a>
						</li> 
						<!-- <li>
							<a href="printing_cost_estimation.php"><i class="fa fa-list"></i><span> View Estimated Cost (<?php echo countCostEstimation() ?>) </span></a>
						</li> --> 
						<li>
							<a href="multicolor_printing_cost_estimation_combination.php"><i class="fa fa-list"></i><span> All Multicolor Printing Cost Estimation </span></a>
						</li> 
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_binding_cost_estimation.php" || 
					basename($_SERVER['PHP_SELF'])=="binding_cost_estimation_combination.php" || basename($_SERVER['PHP_SELF'])=="edit_cost_estimation_binding.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!-- <i class="fa fa-file"></i> --> Binding Cost Estimation
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_binding_cost_estimation.php"><i class="fa fa-plus-circle"></i><span> Add Binding Cost Estimation </span></a>
						</li> 
						<!-- <li>
							<a href="cost_estimation.php"><i class="fa fa-list"></i><span> View Estimated Cost (<?php echo countCostEstimation() ?>) </span></a>
						</li> --> 
						<li>
							<a href="binding_cost_estimation_combination.php"><i class="fa fa-list"></i><span> All Binding Cost Estimation </span></a>
						</li> 
					</ul>
				</li>
				
				<?php 
					if(basename($_SERVER['PHP_SELF'])=="orders.php" || basename($_SERVER['PHP_SELF'])=="edit_orders.php" || basename($_SERVER['PHP_SELF'])=="order_details.php" || basename($_SERVER['PHP_SELF'])=="edit_order_details.php" || basename($_SERVER['PHP_SELF'])=="track_order.php" || basename($_SERVER['PHP_SELF'])=="edit_track_order.php" || basename($_SERVER['PHP_SELF'])=="transaction.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<li>
							<a href="orders.php"><i class="fa fa-list"></i><span> All Orders (<?php echo countOrder() ?>)</span></a>
						</li> 
						<li>
							<a href="order_details.php"><i class="fa fa-list"></i><span> Order Details (<?php echo countOrderDetails() ?>) </span></a>
						</li>
						<li>
							<a href="track_order.php"><i class="fa fa-list"></i><span> Track Order (<?php echo countOrder() ?>) </span></a>
						</li>
						<li>
							<a href="transaction.php"><i class="fa fa-list"></i><span> Transaction Details (<?php echo countTransaction() ?>) </span></a>
						</li>
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_offer_zone.php" || 
					basename($_SERVER['PHP_SELF'])=="offer_zones.php" ||basename($_SERVER['PHP_SELF'])=="edit_offer_zone.php")
					{ 
						?> 
						<li class="has_submenu open">
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
						<!-- <i class="fa fa-file"></i> --> Offer Zone
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_offer_zone.php"><i class="fa fa-plus-circle"></i><span> Add Offer Zone </span></a>
						</li>
						<li>
							<a href="offer_zones.php"><i class="fa fa-list"></i><span> All Offer Zone (<?php echo countOfferZone() ?>) </span></a>
						</li> 
					</ul>
				</li>
				<!-- <li>
					<a href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
				</li> -->
			</ul>
		</div>
	</div>
</aside><!--Account Sidebar: End-->