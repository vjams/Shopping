<?php
$name=$_POST['name'];
$price=$_POST['price'];
$Vprice=$_POST['vprice'];
$Pic=$_POST['pic'];
$Stock=$_POST['stock'];
$des=$_POST['des'];
$seller=$_POST['seller'];

// phpmyadmin database information
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
	$sql = mysql_query("USE shoppingcartdb", $conn);
	$sql = mysql_query("UPDATE items SET price = '$price', Vprice = '$Vprice', Pic = '$Pic', Stock = '$Stock', description = '$des', Seller = '$seller' WHERE Name = '$name'",$conn);




}

mysql_close($conn);


?>
