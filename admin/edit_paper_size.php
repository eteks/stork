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
		$paper_size = $_POST["paper_size"];
		$paper_size_status = $_POST["paper_size_status"];
		// $qry   = mysqlQuery("SELECT * FROM `stork_state` WHERE `id`='$val'");
		// $fetch = mysql_fetch_array($qry);
		$qr = mysqlQuery("SELECT * FROM stork_paper_size WHERE 	paper_size='$paper_size' AND paper_size_id NOT IN('$val')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Papersize Already exists</b></div>";	
		} else {
			mysqlQuery("UPDATE `stork_paper_size` SET `paper_size`='$paper_size',`paper_size_status`='$paper_size_status' WHERE `paper_size_id`=".$val);
			$successMessage = "<div class='alert alert-success'><li class='fa fa-check-square-o'></li><b> Papersize Updated Successfully.</b></div>";	
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
<title>Edit Papersize: <?php echo(getTitle()) ?></title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<div class="page-content blocky">
	<div class="container" style="margin-top:20px;">
		<?php include 'includes/sidebar.php'; ?>
		<div class="mainy">
			<!-- Page title -->
			<div class="page-title">
				<h2><i class="fa fa-pencil-square color"></i> Edit Papersize </h2> 
				<hr />
			</div>
			<!-- Page title -->
			<div class="row">
				<div class="awidget">
					<form class="form-horizontal edit_paper_size" role="form" action="edit_paper_size.php?update=<?php echo $id; ?>" method="post">
					<span class="error_edit_paper_size"> Please fill out required fields </span>
					<?php 
					if($successMessage) echo $successMessage; 
					$match = "SELECT * FROM `stork_paper_size` WHERE `paper_size_id`='$id'";
					$qry = mysqlQuery($match);
					$numRows = mysql_num_rows($qry); 
					if ($numRows > 0)
					{
						while($row = mysql_fetch_array($qry)) 
						{
						?>
							<div class="form-group">
								<label class="col-lg-2 control-label">Paper Size</label><span>*</span>
								<div class="col-lg-10">
									<input type="text" id="edit_paper_size_form" class="form-control" name="paper_size" value="<?php echo($row['paper_size']); ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Papersize status</label><span>*</span>
								<div class="col-lg-10">
									<select class="form-control" name="paper_size_status">
										<option value="1" <?php if ($row['paper_size_status'] == 1) echo "selected"; ?>>Active</option>
										<option value="0" <?php if ($row['paper_size_status'] == 0) echo "selected"; ?>>InActive</option>
										
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