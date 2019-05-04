
<?php
//$FirstName = filter_input(INPUT_POST, 'reg_first');
//$LastName = filter_input(INPUT_POST, 'reg_last');
//$email = filter_input(INPUT_POST, 'reg_email');
//$phoneNumber = filter_input(INPUT_POST, 'reg_phone');
//$password = filter_input(INPUT_POST, 'reg_password');

$password=$_POST['pass'];
$FirstName=$_POST['fname'];
$LastName=$_POST['lname'];
$email=$_POST['email'];
$phoneNumber=$_POST['phone'];


//	Encrypt password
$password = md5($password);

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
               // echo json_encode($data);
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else {
		$sql = "SET foreign_key_checks = 0";
		$sql = "INSERT INTO Register_User (LastName, FirstName, password, email, phoneNumber)
			values ('$LastName','$FirstName','$password','$email','$phoneNumber')";
//
		if ($conn->query($sql)){
			header('Content-type: application/json');
			echo '{"username":"kenny","password": "'.$password.'"}';

		//	$data ='{username:"' .$username . '",password:"' . $password .'"}';
		//	echo json_encode($data);

		//	header('Location: VELZ.html');	
		}
	else{
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

//$data ='{username:"' .$username . '",password:"' . $password .'"}';
       // echo json_encode($data);

?>
