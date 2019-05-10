<?php

$email = $_POST['email'];
$str = "";

// Data referring to the phpmyadmin Shopping Cart database
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shoppingcartdb";

// Connect to ShoppingCartDB
$conn = mysql_connect($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

}
else {

	$use = mysql_query("USE shoppingcartdb", $conn);

	$result = mysql_query("SELECT orderInfo FROM orders WHERE account = '$email'", $conn);

	if($result) {
		while($row = mysql_fetch_array($result)) {

			$str .= $row[0];
			$str .= ";";

		}

	}

	header('Content-type: application/json');
	echo '{"str":"'.$str.'"}';
}

mysql_close($conn);
?>
