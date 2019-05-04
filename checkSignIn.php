<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shoppingcartdb";

	// Connect to ShoppingCartDB
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	//id = sign_password
	if (mysqli_connect_error()) {
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}

	$username = filter_input(INPUT_POST, 'sign_account');
	$password = filter_input(INPUT_POST, 'sign_password');


	
	//$result1 = mysql_query("SELECT password FROM register_user WHERE password = 123456");
//	= $password

	//	if(mysql_num_rows($result1) > 0) {
	//		echo "Password match!";
	//	}

	//	else  {
	//		echo "No match on password!";
	//	}
	//
        
	
	

?>
