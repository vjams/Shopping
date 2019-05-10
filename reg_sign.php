<?php

$Type=$_POST['type'];
$Email=$_POST['email'];


$Pass=$_POST['pass'];

if (!empty($Pass)) {
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "shoppingcartdb";

	$conn = mysql_connect($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()) {
		$Pass="0";

		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else {
		$row;
		if ($Type == 2) {
			$use = mysql_query("USE shoppingcartdb", $conn);
			$result = mysql_query("SELECT FirstName, LastName, password, Cart, Promo, VIP, ExistedUser_ID FROM Register_User WHERE email = '$Email'", $conn);

		}

		else {
			$use = mysql_query("USE shoppingcartdb", $conn);
			$result = mysql_query("SELECT FirstName, LastName, password, AdminUser_id FROM Admin WHERE email = '$Email'", $conn);
		}
	}

	if($result)
	{

		$row = mysql_fetch_array( $result );
	
		if(convert_uudecode($row[2])==$Pass)
		{
			$Pass=1;
		}
		else
		{
			$Pass=2;
		}
		header('Content-type: application/json');
		if ($Type == 2) {
			echo '{"fname":"'.$row[0].'","lname":"'.$row[1].'","cart":"'.$row[3].'","promo":"'.$row[4].'","VIP":"'.$row[5].'","pass":"'.$Pass.'"}';
		}
		else {
			echo '{"fname":"'.$row[0].'","pass":"'.$Pass.'"}';	
		}
	}
	else {


		header('Contect-type: application/json');
		echo '{"pass":"0"}';
	}




}

mysql_close($conn);



?>
