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
			<a href="#">
				<i class="fa fa-th"></i> User
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<!-- <a href="add_product.php"><i class="fa fa-plus-circle"></i> Bulk Add Products</a> -->
					<a href=""><i class="fa fa-plus-circle"></i> Add User</a>
				</li>
				<!-- <li>
					<a href="update_product.php"><i class="fa fa-check-square-o"></i> Bulk Update Products</a>
				</li> -->
				<li>
					<a href=""> <i class="fa fa-th"></i><span id="allProducts"> All Users </span></a>
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
				<i class="fa fa-th"></i> State
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
					<a href="states.php"> <i class="fa fa-th"></i><span id="allProducts"> All States (<?php echo(countState()) ?>)</span></a>
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
				<i class="fa fa-folder-open"></i> Area
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_area.php"><i class="fa fa-plus-circle"></i> Add Area </a>
				</li>
				<li>
					<a href="areas.php"><i class="fa fa-folder-open"></i> All Areas (<?php echo(countArea()) ?>)</a>
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
				<i class="fa fa-file"></i> College
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_page.php"><i class="fa fa-plus-circle"></i> Add college</a>
				</li>
				<li>
					<a href="pages.php"><i class="fa fa-file"></i> All Colleges (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
			</ul>
			</li>

			<?php 
			if(basename($_SERVER['PHP_SELF'])=="papersize.php" || basename($_SERVER['PHP_SELF'])=="add_papersize.php")
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
				<i class="fa fa-leaf"></i> Papersize
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="addSource.php"><i class="fa fa-leaf"></i> Add Papersize </a>  
				</li>
				<li>
					<a href="sources.php"><i class="fa fa-leaf"></i> All Papersize (<?php echo(totalSourcesCount()) ?>)</a>
				</li>
			</ul>
			</li>

			<?php 
			if(basename($_SERVER['PHP_SELF'])=="add_papertype.php" || 
			basename($_SERVER['PHP_SELF'])=="papertype.php")
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
				<i class="fa fa-file"></i> PaperType
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_page.php"><i class="fa fa-plus-circle"></i> Add PaperType</a>
				</li>
				<li>
					<a href="pages.php"><i class="fa fa-file"></i> All PaperType (<?php echo(totalPagesCount()) ?>)</a>
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
				<i class="fa fa-file"></i> Cost Estimation
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="add_cost_estimation.php"><i class="fa fa-file"></i> Add Cost Estimation</a>
				</li> 
				<li>
					<a href="cost_estimation.php"><i class="fa fa-file"></i> All Cost Estimation (<?php echo(countCostEstimation()) ?>)</a>
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
				<i class="fa fa-file"></i> Order
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="pages.php"><i class="fa fa-file"></i> All Order (<?php echo(totalPagesCount()) ?>)</a>
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
				<i class="fa fa-file"></i> Track Order
				<span class="caret pull-right"></span>
			</a>
			<!-- Sub menu -->
			<ul>
				<li>
					<a href="pages.php"><i class="fa fa-file"></i> Set Track Order (<?php echo(totalPagesCount()) ?>)</a>
				</li> 
				<li>
					<a href="pages.php"><i class="fa fa-file"></i> All Track Order (<?php echo(totalPagesCount()) ?>)</a>
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
				<i class="fa fa-file"></i> Offer Zone
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