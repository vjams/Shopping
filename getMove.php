<?php
$email=$_POST['email'];


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
	$sql = mysql_query("SELECT moveIndex FROM Register_User WHERE email = '$email'", $conn);


	if($result) {
		$row = mysql_fetch_array($result);
	}



}

header('Content-type: application/json');
echo '{"email":"'.$email.'","str":"'.$row[0].'"}';

mysql_close($conn);
?>
