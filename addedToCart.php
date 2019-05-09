<?php
$email=$_POST['email'];
$cart=$_POST['cart'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shoppingcartdb";

// Connect to ShoppingCartDB
$conn = mysql_connect($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
	
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error$

}

else {
	$use = mysql_query("USE shoppingcartdb", $conn);
	mysql_query($conn, "UPDATE Register_User SET Cart = '$cart' WHERE 
			email = '$email'");




	mysql_close($conn);	
}


?>
