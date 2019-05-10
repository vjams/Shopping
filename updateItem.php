<?php
$name=$_POST['name'];
$price=$_POST['price'];
$Vprice=$_POST['vprice'];
$Pic=$_POST['pic'];
$Stock=$_POST['stock'];
$des=$_POST['des'];
$seller=$_POST['seller'];
$id=$_POST['id'];

// phpmyadmin database information
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shoppingcartdb";

// // Connect to ShoppingCartDB
$conn = mysql_connect($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {

	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

}

else {
	$sql = mysql_query("SET foreign_key_checks = 0", $conn);
	$sql = mysql_query("USE shoppingcartdb", $conn);
	$sql = mysql_query("INSERT INTO items (Name, price, Vprice, Pic, Stock, description, Seller) values ('$name','$price','$Vprice','$Pic', '$Stock', '$des', '$seller')",$conn);

	$sql = mysql_query("INSERT INTO Promo_Code(Item_id) values ('$id')", $conn);



}

mysql_close($conn);


?>
