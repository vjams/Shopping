<?php
$FirstName = filter_input(INPUT_POST, 'reg_first');
$LastName = filter_input(INPUT_POST, 'reg_last');
$email = filter_input(INPUT_POST, 'reg_email');
$phoneNumber = filter_input(INPUT_POST, 'reg_phone');
$password = filter_input(INPUT_POST, 'reg_password');

//	Encrypt password
$password = md5($password);

	if (!empty($password)){
			$host = "localhost";
			$dbusername = "root";
			$dbpassword = "OmeletPenguin0!";
			$dbname = "shoppingcartdb";
			
			// Connect to ShoppingCartDB
			$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
			
			if (mysqli_connect_error()) {
				die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
			}
			else {
				$sql = "INSERT INTO register_user (LastName, FirstName, password, email, phoneNumber)
				values ('$LastName','$FirstName','$password','$email','$phoneNumber')";
				
				if ($conn->query($sql)){
			echo"Congratulations "; echo '<br />';
			echo"Your Registration was successful "; echo '<br />';
			echo "go back to sign in "; echo '<br />';
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
?>
