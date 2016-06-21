<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	print_r($_POST);
	if($_POST['submit_type'] == 'add_to_cart'){
		$print_type = $_POST['print_type'];
		$print_side = $_POST['print_side'];
		$paper_type = $_POST['papar_type'];
		$paper_size = $_POST['papar_size'];
	}
	
	
}

?>