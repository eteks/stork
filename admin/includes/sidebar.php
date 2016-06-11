<?php
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
function totalSourcesCount()
{
	$query = mysqlQuery("SELECT count(id) as totalFeeds FROM envatoSources");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalFeeds'];
}
?> 
<div class="sidebar-dropdown"><a href="#">MENU</a></div>
<div class="sidey">
	<div class="side-cont">
		<ul class="nav">
			<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_user.php" || 
			basename($_SERVER['PHP_SELF'])=="users.php")
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
					<a href="admin_users.php"> <i class="fa fa-list"></i><span id="allProducts"> Admin User </span></a>
				</li> 
				<li>
					<a href="users.php"> <i class="fa fa-list"></i><span id="allProducts"> All Users (<?php echo(countUsers()) ?>)</span></a>
				</li> 
			</ul>
			</li>

			<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_state.php" || 
			basename($_SERVER['PHP_SELF'])=="states.php")
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
					<a href="add_state.php"><i class="fa fa-plus-circle"></i> Add States</a>
				</li>
				<!-- <li>
					<a href="update_product.php"><i class="fa fa-check-square-o"></i> Bulk Update Products</a>
				</li> -->
				<li>
					<a href="states.php"> <i class="fa fa-list"></i><span id="allProducts"> All States (<?php echo(countState()) ?>)</span></a>
				</li> 
			</ul>
			</li>


			<?php if(basename($_SERVER['PHP_SELF'])=="areas.php" || basename($_SERVER['PHP_SELF'])=="add_area.php")
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
					<a href="add_area.php"><i class="fa fa-plus-circle"></i> Add Area </a>
				</li>
				<li>
					<a href="areas.php"><i class="fa fa-list"></i> All Areas (<?php echo(countArea()) ?>)</a>
				</li>				
			</ul>
			</li>


			<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_college.php" || 
			basename($_SERVER['PHP_SELF'])=="colleges.php")
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
					<a href="add_college.php"><i class="fa fa-plus-circle"></i> Add college</a>
				</li>
				<li>
					<a href="colleges.php"><i class="fa fa-file"></i> All Colleges (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
			</ul>
			</li>

			<?php 
			if(basename($_SERVER['PHP_SELF'])=="paper_size.php" || basename($_SERVER['PHP_SELF'])=="add_paper_size.php")
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
					<a href="add_paper_size.php"><i class="fa fa-leaf"></i> Add Papersize </a>  
				</li>
				<li>
					<a href="paper_size.php"><i class="fa fa-leaf"></i> All Papersizes (<?php echo(totalSourcesCount()) ?>)</a>
				</li>
			</ul>
			</li>

			<!-- Paper_side -->


			<?php 
			if(basename($_SERVER['PHP_SELF'])=="papersides.php" || basename($_SERVER['PHP_SELF'])=="add_paper_side.php")
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
				<i class="fa fa-leaf"></i> Paperside
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_paper_side.php"><i class="fa fa-leaf"></i> Add Paperside </a>  
				</li>
				<li>
					<a href="papersides.php"><i class="fa fa-leaf"></i> All Papersides (<?php echo(totalSourcesCount()) ?>)</a>
				</li>
			</ul>
			</li>

			<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_paper_type.php" || 
			basename($_SERVER['PHP_SELF'])=="papertypes.php")
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
				<!-- <i class="fa fa-file"></i> --> PaperType
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_paper_type.php"><i class="fa fa-plus-circle"></i> Add PaperType</a>
				</li>
				<li>
					<a href="papertypes.php"><i class="fa fa-file"></i> All PaperTypes (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
			</ul>
			</li>

			<?php 
			if(basename($_SERVER['PHP_SELF'])=="paperprinttypes.php" || 
			basename($_SERVER['PHP_SELF'])=="add_paper_print_type.php")
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
				<i class="fa fa-file"></i> PaperPrintType
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_paper_print_type.php"><i class="fa fa-plus-circle"></i> Add PaperPrintType</a>
				</li>
				<li>
					<a href="paperprinttypes.php"><i class="fa fa-file"></i> All PaperPrintTypes (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
			</ul>
			</li>

			<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_cost_estimation.php" || 
			basename($_SERVER['PHP_SELF'])=="cost_estimation.php")
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
				<!-- <i class="fa fa-file"></i> --> Cost Estimation
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_cost_estimation.php"><i class="fa fa-plus-circle"></i> Add Cost Estimation</a>
				</li> 
				<li>
					<a href="cost_estimation.php"><i class="fa fa-list"></i> All Cost Estimation (<?php echo(countCostEstimation()) ?>)</a>
				</li> 
			</ul>
			</li>
			<?php 
			if(basename($_SERVER['PHP_SELF'])=="view_order.php" || 
			basename($_SERVER['PHP_SELF'])=="order.php")
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
				<!-- <i class="fa fa-file"></i> --> Order
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="pages.php"><i class="fa fa-list"></i> All Order (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
			</ul>
			</li>
				<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_trackorder.php" || 
			basename($_SERVER['PHP_SELF'])=="trackorder.php")
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
				<!-- <i class="fa fa-file"></i> --> Track Order
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="pages.php"><i class="fa fa-file"></i> Set Track Order (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
				<li>
					<a href="pages.php"><i class="fa fa-list"></i> All Track Order (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
			</ul>
			</li>
			<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_offerzone.php" || 
			basename($_SERVER['PHP_SELF'])=="offerzone.php")
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
					<a href="add_page.php"><i class="fa fa-plus-circle"></i> Add OfferZone</a>
				</li>
				<li>
					<a href="pages.php"><i class="fa fa-file"></i> All OfferZone (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
			</ul>
			</li>
			<li>
				<a href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
			</li>
		</ul>
	</div>
</div>