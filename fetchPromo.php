<?php

$start="";
$due="";
$rate="";

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


	$result = mysql_query("SELECT Start_Date, ExpiredDate, Percentage FROM Promo_Code", $conn);

	if($result) {
		while($row = mysql_fetch_array($result)) {

			$start .= $row[0];
			$start .= ",";
			$due .= $row[1];
			$due .= ",";
			$rate .= $row[2];
			$rate .= ",";	
		}

	}

	header('Content-type: application/json');
	echo '{"start":"'.$start.'","due":"'.$due.'","rate":"'.$rate.'"}';

}

mysql_close($conn);
?>
