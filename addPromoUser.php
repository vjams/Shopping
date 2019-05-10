<?php
$email=$_POST['email'];
$promo=$_POST['promo'];

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
	mysql_query("UPDATE Register_User SET Promo = '$promo' WHERE 
		email = '$email'", $conn);




	mysql_close($conn);	
}



?>
