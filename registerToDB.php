
<?php
$password=$_POST['pass'];
$FirstName=$_POST['fname'];
$LastName=$_POST['lname'];
$email=$_POST['email'];
$phoneNumber=$_POST['phone'];


//	Encrypt password
//$password = md5($password);

if (!empty($password)){
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "shoppingcartdb";

	// Connect to ShoppingCartDB
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()) {
                $password="false";
                $data ='{username:"' .$username . '",password:"' . $password .'"}';
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else {
		$sql = "SET foreign_key_checks = 0";
		$sql = "INSERT INTO Register_User (LastName, FirstName, password, email, phoneNumber)
			values ('$LastName','$FirstName','$password','$email','$phoneNumber')";

		if ($conn->query($sql)){
			header('Content-type: application/json');
			echo '{"username":"kenny","password": "'.$password.'"}';

		}
	else {
			echo "Error: ". $sql ."
				". $conn->error;
		}

		$conn->close();


	}
}
else {
	echo "All fields are required";
	die();
}

?>
