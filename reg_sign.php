<?php

$Type=$_POST['type'];
$Email=$_POST['email'];
$Phone=$_POST['phone'];
$Pass=$_POST['currpass'];

$Pass = md5($Pass);

if (!empty($password)) {
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "shoppingcartdb";

	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()) {
		$password="false";

		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else {
		$sql = "SET foreign_key_checks = 0";

		if ($Type == 2) {
		$sql = "SELECT FirstName, LastName, password, VIP, ExistedUser_ID FROM Register_User WHERE email = '.$Email.'";
		}
		else if ($Type == 3) {
			$sql = "SELECT FirstName, LastName, password, VIP, ExistedUser_ID FROM Register_User WHERE phoneNumber = "$Phone"
				LIMIT 1";
		
		}

		else {
		$sql = "SELECT FirstName, LastName, password, AdminUser_id FROM Admin
			WHERE email = "$Email"
				LIMIT 1";
		 
		}

		$result = $conn->query($sql);
                if($result->num-rows > 0)
		{
			if($row["password"]==$Pass)
			{
				$Pass=2;
			}
			else
			{
				$Pass=1;
			}
			header('Content-type: application/json');
			while($row=mysql_fetch_array($result)){
				echo '{"fname":"'.$row["FirstName"].'","pass":"'.$Pass.'"}';
			}
		}
		else {
			header('Contect-type: application/json');
			while ($row=mysql_fetch_array($result)){
				echo '{"pass":"0"}';
		}

		}

		$conn->close();
	}

?>
