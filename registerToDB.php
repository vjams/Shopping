<?php
$con = mysqli_connect('127.0.0.1', 'root', 'OmeletPenguin0!', 'ShoppingCart');

	if(!$con) {
		echo 'Not connected to server';
	}

	if (!mysqli_select_db($con, 'ShoppingCart')) {
		echo 'Database not selected';
	}

	$LastName = $_POST['reg_name'];
	$password = $_POST['reg_password'];

	$sql = "SET FOREIGN_KEY_CHECKS=0";
	$sql = "INSERT INTO Register_User (ExistedUser_id, LastName, FirstName, Existed_UserName, password, Shipping_Address)
			VALUES ('work', 'work', 'work', 'work', '$password', '123 street')";

	if (!mysqli_query($con, $sql)) {
		echo 'Not inserted';
	}

	else {
		echo 'Inserted data';
	}

	header("refresh:2; url=registration.html");
?>
