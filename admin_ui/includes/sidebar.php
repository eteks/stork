<aside class="col-md-3 col-sm-4 col-xs-12 account-sidebar sidebar">
	<h3 class="acc-title lg">Dashboard</h3>
	<div class="sidey" style="">
		<div class="side-cont">
			<ul class="nav">
				<li class="has_submenu">
					<a href="users.php">
						<!--<i class="fa fa-user"></i> --> User
						<span class="caret pull-right"></span>
					</a>
				<!-- Sub menu -->
					<ul>
						<li>
							<a href="admin_users.php"> <i class="fa fa-list"></i><span id="allProducts"> Admin User </span></a>
						</li> 
						<li>
							<a href="users.php"> <i class="fa fa-list"></i><span id="allProducts"> All Users (6)</span></a>
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
							<a href="add_state.php"><i class="fa fa-plus-circle"></i><span id="allProducts"> Add States</span></a>
						</li>
						<!-- <li>
							<a href="update_product.php"><i class="fa fa-check-square-o"></i> Bulk Update Products</a>
						</li> -->
						<li>
							<a href="states.php"> <i class="fa fa-list"></i><span id="allProducts"> All States (2)</span></a>
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
							<a href="areas.php"><i class="fa fa-list"></i><span> All Areas (2)</span></a>
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
							<a href="colleges.php"><i class="fa fa-list"></i><span> All Colleges (2) </span></a>
						</li> 
					</ul>
				</li>

				<?php 
					if(basename($_SERVER['PHP_SELF'])=="add_paper_size.php" || 
					basename($_SERVER['PHP_SELF'])=="paper_size.php" || basename($_SERVER['PHP_SELF'])=="edit_paper_size.php")
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
						<!-- <i class="fa fa-leaf"></i> -->Papersize
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_paper_size.php"><i class="fa fa-plus-circle"></i><span> Add Papersize <span></a>  
						</li>
						<li>
							<a href="paper_size.php"><i class="fa fa-list"></i><span> All Papersizes (2) <span></a>
						</li>
					</ul>
				</li>

				<!-- Paper_side -->
				<li class="has_submenu">
					<a href="#">
						<!-- <i class="fa fa-leaf"></i> --> Paperside
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_paper_side.php"><i class="fa fa-plus-circle"></i><span> Add Paperside <span></a>  
						</li>
						<li>
							<a href="papersides.php"><i class="fa fa-list"></i><span> All Papersides (2) <span></a>
						</li>
					</ul>
				</li>

				<li class="has_submenu">
					<a href="#">
						<!-- <i class="fa fa-file"></i> --> PaperType
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_paper_type.php"><i class="fa fa-plus-circle"></i><span> Add PaperType <span></a>
						</li>
						<li>
							<a href="papertypes.php"><i class="fa fa-list"></i><span> All PaperTypes (2) <span></a>
						</li> 
					</ul>
				</li>

				<li class="has_submenu">
					<a href="#">
						<!-- <i class="fa fa-file"></i> --> PaperPrintType
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_paper_print_type.php"><i class="fa fa-plus-circle"></i><span> Add PaperPrintType <span></a>
						</li>
						<li>
							<a href="paperprinttypes.php"><i class="fa fa-list"></i><span> All PaperPrintTypes (2) </span></a>
						</li> 
					</ul>
				</li>

				<li class="has_submenu">
					<a href="#">
						<!-- <i class="fa fa-file"></i> --> Cost Estimation
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_cost_estimation.php"><i class="fa fa-plus-circle"></i><span> Add Cost Estimation </span></a>
						</li> 
						<li>
							<a href="cost_estimation.php"><i class="fa fa-list"></i><span> All Cost Estimation (1) </span></a>
						</li> 
					</ul>
				</li>
				<li class="has_submenu">
					<a href="#">
						<!-- <i class="fa fa-file"></i> --> Order
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="orders.php"><i class="fa fa-list"></i><span> All Order ()</span></a>
						</li> 
						<li>
							<a href="order_details.php"><i class="fa fa-list"></i><span> Order Details () </span></a>
						</li>
						<li>
							<a href="track_order.php"><i class="fa fa-list"></i><span> Track Order () </span></a>
						</li>
					</ul>
				</li>
				<li class="has_submenu">
					<a href="#">
						<!-- <i class="fa fa-file"></i> --> Offer Zone
						<span class="caret pull-right"></span>
					</a>
					<!-- Sub menu -->
					<ul>
						<li>
							<a href="add_offer_zone.php"><i class="fa fa-plus-circle"></i> Add OfferZone</a>
						</li>
						<li>
							<a href="offer_zones.php"><i class="fa fa-file"></i> All OfferZone ()</a>
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