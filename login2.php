<?php
	$id = $_POST["id"];
	$pass = $_POST["password"];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "librman";
	$err = "";

	date_default_timezone_set('Asia/Kolkata');
	// Create connection

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	$auth = "SELECT * FROM admin WHERE id = '".$id."'";
	$result = mysqli_query($conn, $auth);

	if(mysqli_num_rows($result)==1){
			$user = mysqli_fetch_array($result);
			if(!strcmp($pass, $user["passwd"])){
				session_start();
				$_SESSION["id"] = $id;
				//$name = explode(" ", $user["name"]);
				//$_SESSION["id"] = $id;
				//$_SESSION["lname"] = $name[1];
				header("Location: adminIss.php");
			}
			else{
				$err = "Password is incorrect";
				echo $err;
			}
	}
	else{
		$err = "Userid is Incorrect";
		echo $err;
	}

?>