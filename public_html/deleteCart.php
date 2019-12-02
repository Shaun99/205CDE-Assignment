<?php
	session_start();
	
	$id = NULL;
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		exit('<p>This page has been accessed in error</p>');
	}
	
	$sql = "DELETE FROM ordered_item WHERE order_id = $id;";
	
	if($conn = mysqli_connect('localhost', 'root', '', 'the_fashion_shop')) {
		if(mysqli_query($conn, $sql)) {
			header('location: cart.php?msg=Item has been removed from the cart.');
			exit();
		}
	}
?>
