<?php
function selectfunction($need,$tablename,$wherecon,$con)
{
	
	if($wherecon != ''){
		$query = "select ".$need." from ".$tablename." where ".$wherecon;
	}else{
		$query = "select ".$need." from ".$tablename;
	}
	$result = mysqli_query($con,$query);
	return $result;
}

function updatefunction($update_data,$tablename,$wherecon,$con)
{
	
	if($wherecon != ''){
		$query = "update ".$tablename." set ".$update_data." where ".$wherecon;
	}else{
		$query = "update ".$tablename." set ".$update_data;
	}
	$result = mysqli_query($con,$query);
	return $result;
}

function deletefunction($tablename,$wherecon,$con)
{
	if($wherecon != ''){
		$query = "delete from".$tablename." where ".$wherecon;
	}else{
		$query = "delete from ".$tablename;
	}
	$result = mysqli_query($con,$query);
	return $result;
}
function insertfunction($insert_variable,$insert_data,$tablename,$wherecon,$con)
{
	if($wherecon != ''){
		$query = "insert into ".$tablename."(".$insert_variable.") values (".$insert_data.") where ".$wherecon;
	}else{
		$query = "insert into ".$tablename."(".$insert_variable.") values (".$insert_data.")";
	}
	$result = mysqli_query($con,$query);
	return $result;
}
?>