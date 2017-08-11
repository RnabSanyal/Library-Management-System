<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>






<!--Code For SideBar-->
	<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
	  	<button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
	  	<a href="#" class="w3-bar-item w3-button w3-black">Issue Book</a>
	  	<a href="#" class="w3-bar-item w3-button">Take a return</a>
	  	<a href="#" class="w3-bar-item w3-button">Add Books</a>
	</div>

	<script>
		function w3_open() {
		    document.getElementById("mySidebar").style.display = "block";
		}
		function w3_close() {
		    document.getElementById("mySidebar").style.display = "none";
		}
	</script>
<!---->

<!--Header-->
	<div class="w3-teal" style="font-size: 120%">
	  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
	  Welcome Admin
	  <!--<div class="w3-container">
	    <h1>My Page</h1>
	  </div>-->
	</div>
	<br><br><br><br> <!--Coz I got lazy...-->
<!---->
	<?php
	if(isset($_GET["book_id"])){
		$id = $_GET["book_id"];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "librman";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		date_default_timezone_set('Asia/Kolkata');
		
		$sql = "UPDATE books SET orders = NULL, borrows = '".time()."' WHERE id = '".$id."'";


		if(mysqli_query($conn, $sql)){
			//echo "<center><h3>Changes Updated to Database!<h3></center>";
			//sleep(3);
			header("Location: rand.php");
		}else{
			echo "Something went wrong";
		}

	} 
	?>
	<center>
		<div class="w3-card-4" style="width: 500px">

			<header class="w3-container w3-orange">
			  <h1>Issue an ordered book</h1>
			</header>
			<br><br><br>
			<div class="w3-container">
			  <form action="" method="GET">
			  	<center>
			  		Enter Book ID: 
			  		<input type="text" name="book_id">
			  		<button class="w3-btn w3-green" type="submit">Issue</button>
			  	</center>
			  </form>
			</div>
			<br><br><br>
			<footer class="w3-container w3-blue">
			</footer>

		</div>
	</center>







<!--footer-->
	<div style="position: absolute; bottom: 0; width: 100%;" class="w3-teal">
		<h3 style="text-align: right; vertical-align: middle;">DBIT Library</h3>
	</div>
<!---->

</body>
</html>