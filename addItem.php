<?php
$name="";
$pic="";
$price="";
$instock="";
$vprice="";
$seller="";
$des="";

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
	$use = mysql_query("USE shoppingcartdb", $conn);
	$result = mysql_query("SELECT Name, Pic, price, Stock, Vprice, Seller, description FROM items", $conn);

	if($result) {
		while($row = mysql_fetch_array($result)) {
			$name .= $row[0];
			$name .= ",";
			$pic .= $row[1];
			$pic .= ",";
			$price .= $row[2];
			$price .= ",";
			$instock .= $row[3];
			$instock .=",";
			$vprice .= $row[4];
			$vprice .= ",";
			$seller .= $row[5];
			$seller .= ",";
			$des .= $row[6];
			$des .= ",";

		}

	}

	header('Content-type: application/json');
	echo '{"name":"'.$name.'","pic":"'.$pic.'","price":"'.$price.'","instock":"'.$instock.'","vprice":"'.$vprice.'","seller":"'.$seller.'","des":"'.$des.'"}';	

}

mysql_close($conn);


?>
