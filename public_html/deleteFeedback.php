<?php
	session_start();
	
	$id = NULL;
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		exit('<p>This page has been accessed in error</p>');
	}
	
	$sql = "DELETE FROM contact_us WHERE id = $id;";
	
	if($conn = mysqli_connect('localhost', 'root', '', 'the_fashion_shop')) {
		if(mysqli_query($conn, $sql)) {
			header('location: feedback.php?msg=Feeback has been deleted');
			exit();
		}
	}
?>
