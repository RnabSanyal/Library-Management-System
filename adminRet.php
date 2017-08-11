<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
</head>
<body>

<?php
	session_start();
	if(isset($_SESSION["id"])):
?>




<!--Code For SideBar-->
	<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
	  	<button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
	  	<a href="adminIss.php" class="w3-bar-item w3-button ">Issue Book</a>
	  	<a href="adminRet.php" class="w3-bar-item w3-button w3-black">Take a return</a>
	  	<a href="adminAddBk.php" class="w3-bar-item w3-button">Add Books</a>
	  	<a href="adminDelUs.php" class="w3-bar-item w3-button">Remove a student</a>
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
	  <a href="logout.php" class="w3-bar-item w3-button w3-right">Logout</a>
	  <!--<div class="w3-container">
	    <h1>My Page</h1>
	  </div>-->
	</div>
	<br><br><br><br> <!--Coz I got lazy...-->
<!---->
	
	<center>
		<div class="w3-card-4" style="width: 500px">

			<header class="w3-container w3-orange">
			  <h1>Take a return</h1>
			</header>
			<br><br><br>
			<div class="w3-container">
			  <form action="" method="GET">
			  	<center>
			  		Enter Book ID: 
			  		<input type="text" name="book_id">
			  		<button class="w3-btn w3-green" type="submit">Return</button>
			  	</center>
			  	<center>
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
						
						$sql = "SELECT * FROM books WHERE id = '".$id."'";

						$result = mysqli_query($conn, $sql);

						$row = mysqli_fetch_array($result);

						if(!isset($row["borrows"])){
							header("Location: rand2.php?mes=Not yet borrowed");
						}else{
							$diff = time() - $row["borrows"];
							if( $diff > 432000){
								$mult = floor($diff/86400) - 5;
								$charge = 5 * $mult;
								$sql = "UPDATE books SET borrows = NULL WHERE id = '".$id."'";

								$result = mysqli_query($conn, $sql);

								$row = mysqli_fetch_array($result);
								$mes = "Changes updated to Database. <br>Please Collect an overdue fee of RS. ".$charge;
								header("Location: rand2.php?mes= <?=$mes?>");
							}else{

								$sql = "UPDATE books SET borrows = NULL, stud_id = NULL WHERE id = '".$id."'";

								$result = mysqli_query($conn, $sql);

								$row = mysqli_fetch_array($result);

								header("Location: rand2.php?mes= Database has been Updated");
							}

						}

					} 
					?>
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
<?php endif;
?>
</body>
</html>