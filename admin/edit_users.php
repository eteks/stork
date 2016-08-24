
<?php
include "includes/header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Edit Users</title>
</head>
<body>

<?php
	if (isset($_GET['update']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
			$val = $_GET['update'];
			$val = mres($val);
			$username = $_POST["username"];
			$password = $_POST["password"];
			$first_name = $_POST["first_name"];
			$last_name = $_POST["last_name"];
			$user_type = $_POST["user_type"];
			$user_email = $_POST["user_email"];
			$user_dob = explode('/',$_POST["user_dob"]);
			$user_dob = $user_dob[2].'-'.$user_dob[1].'-'.$user_dob[0];
			$line1 = $_POST["line1"];
			$line2 = $_POST["line2"];
			// echo $_POST["user_area_id"]."<br>";
			// echo $_POST["user_city_id"]."<br>";
			// echo $_POST["user_state_id"]."<br>";
			$user_area_id = $_POST["user_area_id"] != '' ? $_POST["user_area_id"] : "null";
			$user_city_id = $_POST["user_city_id"] != '' ? $_POST["user_city_id"] : "null";
			$user_state_id = $_POST["user_state_id"] != '' ? $_POST["user_state_id"] : "null";
			$user_mobile = $_POST["user_mobile"];
			$user_status = $_POST["user_status"];
			$qr = mysqlQuery("SELECT * FROM `stork_users` WHERE `username`='$username' AND `user_email`='$user_email' AND user_id NOT IN('$val')");
			$row = mysql_num_rows($qr);
			if($row > 0){
				$successMessage = "<div class='container error_message_mandatory'><span> User Already exists! </span></div>";	
			} else {
				mysqlQuery("UPDATE stork_users SET username='$username',password='$password',first_name='$first_name',last_name='$last_name'
					,user_type='$user_type',user_email='$user_email',user_dob='$user_dob',shipping_default_addr1='$line1',shipping_default_addr2='$line2',
						shipping_default_area_id=$user_area_id,
					user_city_id=$user_city_id,user_state_id=$user_state_id,user_mobile='$user_mobile',user_status='$user_status' WHERE user_id=".$val);
				$successMessage = "<div class='container error_message_mandatory'><span> User Updated Successfully! </span></div>";	
			}
					
		}
		
	}
	$id=$val;
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
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
						<a href="/">User</a>
					</li>
					<li>
						<span>Edit Users</span>
					</li>
				</ul>
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
		<!--Account main content : Begin -->
					<section class="account-main col-md-9 col-sm-8 col-xs-12">
						<h3 class="acc-title lg">Edit Users Information</h3>
						<div class="form-edit-info">
							<h4 class="acc-sub-title">User Information</h4>
							<form action="edit_users.php?update=<?php echo $id; ?>" method="POST" name="edit-acc-info" id="edit_users">
								<div class="container">
 									<span class="error_test"> Please fill all required(*) fields </span>
								</div>
								<div class="container">
 									<span class="error_email"> Please Enter Valid email address </span>
								</div>
								<div class="container">
									 <span class="error_phone"> Please Enter Valid mobile number </span>
								</div>
								<?php if($successMessage) echo $successMessage; ?>
							<?php 
								$match = "SELECT * FROM stork_users WHERE user_id='$id'";
								$qry = mysqlQuery($match);
								$numRows = mysql_num_rows($qry); 
								if ($numRows > 0)
								{
								while($row = mysql_fetch_array($qry)) 
								{
							?>
								<div class="form-group">
								    <label for="last-name">User Name<span class="required"></span></label>
									<input type="text" class="form-control" tabindex="" id="username" autocomplete="off" placeholder="User Name" name="username" value="<?php echo($row['username']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Password<span class="required"></span></label>
									<input type="password" class="form-control" id="password" autocomplete="off" placeholder="Password" name="password" value="<?php echo($row['password']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Firstname<span class="required"></span></label>
									<input type="text" class="form-control" id="firstname" autocomplete="off" placeholder="First Name" name="first_name" value="<?php echo($row['first_name']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">Lastname<span class="required"></span></label>
									<input type="text" class="form-control" id="lastname" autocomplete="off" placeholder="Last Name" name="last_name" value="<?php echo($row['last_name']); ?>">
								</div>
								<div class="form-group">
								    <label for="first-name">User Type<span class="required"></span></label>
									<select class="product-type-filter form-control" id="sel_a" name="user_type">
								        <option value="">
											Select User Type
										</option>
								        <option value="1" <?php if ($row['user_type'] == 1) echo "selected"; ?>>Student</option>
										<option value="2" <?php if ($row['user_type'] == 2) echo "selected"; ?>>Profession</option>	
								    </select>
								</div>
								<div class="form-group">
								    <label for="last-name">Email<span class="required"></span></label>
									<input type="text" class="form-control" id="test" autocomplete="off" placeholder="Email id" name="user_email" value="<?php echo($row['user_email']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Date of Birth<span class="required"></span></label>
								   
									<input type="text" class="form-control" id="dob" autocomplete="off" placeholder="Date Of Birth" name="user_dob" value="<?php $dobdate=strtotime($row['user_dob']); $dob = date('d/m/Y', $dobdate); echo $dob; ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Shipping Address1<span class="required"></span></label>
									<input type="text" class="form-control" id="address" autocomplete="off" placeholder="Address" name="line1" value="<?php echo($row['shipping_default_addr1']); ?>">
								</div>
								<div class="form-group">
								    <label for="last-name">Shipping Address2<span class="required"></span></label>
									<input type="text" class="form-control" id="" autocomplete="off" placeholder="Address" name="line2" value="<?php echo($row['shipping_default_addr2']); ?>">
								</div>

								<?php  	

								if($row['shipping_default_area_id']!=null) {
									$user_area_id = $row['shipping_default_area_id'];   	
						            $query_area = mysql_query("select * from stork_area inner join stork_city on stork_area.area_city_id=stork_city.city_id inner join  stork_state on stork_area.area_state_id=stork_state.state_id where stork_area.area_id='$user_area_id'");
									$area_array = mysql_fetch_array($query_area);
									$edit_area_id = $area_array['area_id'];
									$edit_area_state_id = $area_array['state_id'];
									$edit_area_city_id = $area_array['city_id'];
								?>
								<div class="form-group">
								    <label for="first-name">State</label>
									<select class="product-type-filter form-control state_act" name="user_state_id" disabled>
								        <option value="<?php echo $area_array['state_id'] ?>"> <?php echo $area_array['state_name']; ?> </option>";
					                </select>
								</div>
								<div class="form-group">
								    <label for="first-name">City</span></label>
									<select class="product-type-filter form-control city_act" name="user_city_id" disabled>
										<option value="<?php echo $area_array['city_id']; ?>"> <?php echo $area_array['city_name']; ?> </option>
									</select>
								</div>
								<div class="form-group">
								    <label for="first-name">Area</span></label>
									<select class="product-type-filter form-control area_act" name="user_area_id">
								        <option value="">
											Select Area
										</option>
								        <?php
								        	$user_city_id = $row['user_city_id'];   	
						                    $query = mysql_query("select * from stork_area where area_city_id='$edit_area_city_id' and area_state_id='$edit_area_state_id' and area_status='1' order by area_name asc");
					                        while ($arearow = mysql_fetch_array($query)) {
					                        if($edit_area_id == $arearow['area_id'])   
					                        	echo "<option selected value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
					                        else
					                        	echo "<option value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
					                        }
					                    ?>
								    </select>
								</div>
								<?php 
								}
								else {
								?>
								<div class="form-group">
								    <label for="first-name">State</label>
									<select class="product-type-filter form-control state_act" name="user_state_id">
								        <option value="">
											Select State
										</option>
								        <?php
						                    $query = mysql_query("select * from stork_state where state_status='1' order by state_name asc");
					                        while ($staterow = mysql_fetch_array($query)) {
					                        if($row['user_state_id'] == $staterow['state_id'])echo "<option selected value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
					                        else
					                        	echo "<option value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
					                        }
			                        	?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="first-name">City</span></label>
									<select class="product-type-filter form-control city_act" name="user_city_id">
								        <option value="">
											Select City
										</option>
								        <?php
								        	$user_state_id = $row['user_state_id'];
						                    $query = mysql_query("select * from stork_city where city_state_id='$user_state_id' and city_status='1' order by city_name asc");
					                        while ($staterow = mysql_fetch_array($query)) {
					                        if($row['user_city_id'] == $staterow['city_id'])echo "<option selected value='".$staterow['city_id']."'>".$staterow['city_name']."</option>";  
					                        else
					                        	echo "<option value='".$staterow['city_id']."'>".$staterow['city_name']."</option>";
					                        }
			                        	?>
								    </select>
								</div>
								<div class="form-group">
								    <label for="first-name">Area</span></label>
									<select class="product-type-filter form-control area_act" name="user_area_id">
								        <option value="">
											Select Area
										</option>
								        <?php
								        	$user_city_id = $row['user_city_id'];   	
						                    $query = mysql_query("select * from stork_area where area_city_id='$user_city_id' and area_status='1' order by area_name asc");
					                        while ($arearow = mysql_fetch_array($query)) {
					                        if($row['user_area_id'] == $arearow['area_id'])   
					                        	echo "<option selected value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
					                        else
					                        	echo "<option value='".$arearow['area_id']."'>".$arearow['area_name']."</option>";
					                        }
					                    ?>
								    </select>
								</div>
								<?php 
								}
								?>
								<div class="form-group">
								    <label for="last-name">Mobile<span class="required"></span></label>
									<input type="text" class="form-control" id="phone" maxlength="10"  autocomplete="off" placeholder="Mobile Number" name="user_mobile" value="<?php echo($row['user_mobile']); ?>">
								</div>
								
								<div class="cate-filter-content">	
								    <label for="first-name">User Status<span class="required"></span></label>
									<select class="product-type-filter form-control" id="sel_b" name="user_status">
								        <option>
											<span>Select status</span>
										</option>
								        <option value="1" <?php if ($row['user_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['user_status'] == 0) echo "selected"; ?>>InActive</option>
								    </select>
								</div>
								<div class="account-bottom-action">
									<button type="submit" class="gbtn btn-edit-acc-info">Update</button>
								</div>
							<?php 
							} 
							}
							?>
							</form>
						</div>
					</section><!-- Cart main content : End -->
</div><!-- container -->
</div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
     var d = new Date();
     var curr_year = d.getFullYear();
     $("#dob").datepicker(
       { yearRange: '1900:'+ curr_year, changeMonth:true, changeYear:true, maxDate: '-1d'});
    });
 </script>
<?php include 'includes/footer.php'; ?> 