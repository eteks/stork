<?php
include "includes/header.php";
$error = "";
$csrfError = false;
$csrfVariable = 'csrf_' . basename($_SERVER['PHP_SELF']);
if (isset($_GET['update']))
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		$val = $_GET['update'];
		$val = mres($val);
		$area_state_id = $_POST["state_id"];
		$area_name = $_POST["area_name"];
		$area_status = $_POST["area_status"];
		$qr = mysqlQuery("SELECT * FROM area_state WHERE area_state_id='$area_state_id' AND area_name='$area_name' AND area_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Area Already exists</b></div>";	
		} else {
			mysqlQuery("UPDATE `stork_area` SET `area_name`='$area_name',`area_status`='$area_status',`area_state_id`='$area_state_id' WHERE `area_id`=".$val);
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Area Updated Successfully.</b></div>";	
		}
				
	}
	
}
$id=$val;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
if(isset($_POST['title']))
{
	if($_SESSION[$csrfVariable] != $_POST['csrf'])
		$csrfError = true;
	$id = $_GET['id'];
	$title = htmlspecialchars($_POST["title"]);
	$description = mysql_real_escape_string($_POST["description"]);
	$screens = $_POST["screens"];
	$cat = $_POST["category"];
	$image = $_POST["image"];
	$url = $_POST["url"];
	$demo = $_POST["demo"];
	$price = $_POST["price"];
	$tags = $_POST["tags"];
	$rating = $_POST["rating"];
	if(strlen($title)<5 || strlen($title)>50)
		$error .="o. Title Must Be Between 5 to 50 Characters<br />";
	if(!validUrl($url))
		$error .="o. Invalid Purchase URL<br />";
	if(!is_numeric($price))
		$error .="o. Price Is Not In Valid Format<br />";
	if($error=="" && !$csrfError)
	{
		updateProductDb($id,$cat,$title,$description,$screens,$image,$url,$demo,$price,$tags,$rating);
		$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b>  Product saved Successfully.</b></div>";
	}
}
$key = sha1(microtime());
$_SESSION[$csrfVariable] = $key;
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Edit Area</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
	<div class="container" style="margin-top:20px;">
		<?php include 'includes/sidebar.php'; ?>
		<div class="mainy">
			<!-- Page title -->
			<div class="page-title">
				<h2><i class="fa fa-pencil-square color"></i> Edit Area </h2> 
				<hr />
			</div>
			<!-- Page title -->
			<div class="row">
				<div class="awidget">
					<form class="form-horizontal edit_area_form"  role="form" action="edit_area.php?update=<?php echo $id; ?>" method="post">
					<span class="error_area"> Please fill out required fields </span>
					<?php 
					if($successMessage) echo $successMessage; 
					$match = "SELECT * FROM `stork_area` WHERE `area_id`='$id'";
					$qry = mysqlQuery($match);
					$numRows = mysql_num_rows($qry); 
					if ($numRows > 0)
					{
						while($row = mysql_fetch_array($qry)) 
						{
						?>
							<div class="form-group">

								<label class="col-lg-2 control-label">State</label><span>*</span>
								<div class="col-lg-10">
								<select class="form-control" id="category2" name="state_id">
								<option value="">Select the state</option>
								<?php
			                    $query = mysql_query("select * from stork_state where state_status='1'");
		                        while ($staterow = mysql_fetch_array($query)) {
		                        if($row['area_state_id'] == $staterow['state_id'])   
		                        	echo "<option selected value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
		                        else
		                        	echo "<option value='".$staterow['state_id']."'>".$staterow['state_name']."</option>";
		                        }
			                        ?>
								</select>
								</div>
							</div>
							<div class="form-group">

								<label class="col-lg-2 control-label">Area Name</label><span>*</span>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="edit_state" name="area_name" value="<?php echo($row['area_name']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Area status</label><span>*</span>
								<div class="col-lg-10">
									<select class="form-control" name="area_status">
										<option value="1" <?php if ($row['area_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['area_status'] == 0) echo "selected"; ?>>InActive</option>
										
									</select>
								</div>
							</div>
							<hr />
							<input type="hidden" name="csrf" value="<?php echo $key; ?>" />
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button type="submit" name="submit" class="btn btn-success" value="Add"><i class="fa fa-floppy-o"></i> Update</button> 
								
								</div>
							</div>
							<?php 
						} 
						}
						?>
						</form>
						<?php              
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div> 
</div>
<?php include 'includes/footer.php'; ?>
<script>
	$(document).ready(function () 
	{
		$('#teg').tagsInput({
		// my parameters here
		});
		$('.alert-success').delay(2000).fadeOut();
	});
</script>