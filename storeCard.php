
<?php
$email=$_POST['email'];
$str=$_POST['str'];


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
	$sql = mysql_query("SET foreign_key_checks = 0", $conn);
	$sql = mysql_query("USE shoppingcartdb", $conn);
	$sql = mysql_query("UPDATE Register_User SET Card = '$str' WHERE email = '$email'", $conn);





}

mysql_close($conn);
?>
