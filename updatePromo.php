<?php
$index=$_POST['index'];
$rate=$_POST['rate'];
$start=$_POST['start'];
$due=$_POST['due'];

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
	mysql_query("UPDATE Promo_Code SET Start_Date = '$start', ExpiredDate = '$due', Percentage = '$rate' WHERE Item_id = '$index'", $conn);

	mysql_close($conn);
}
?>
