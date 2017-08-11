<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta name="viewport" content="width=device-width, initial-	scale=1">
	<link rel="stylesheet" href="w3.css">
	<style type="text/css">
		input[type=text] {
		    width: 100%;
		    box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    font-size: 16px;
		    background-color: white;
		    padding: 12px 15px 12px 15px;
		}

		.center{
			margin-right: auto;
			margin-left: auto;
		}
	</style>
<?php
	session_start();
	if(isset($_SESSION["id"])){
		$name = $_SESSION["fname"];
	}
	else{
		$name = "Guest";
	}
?>
</head>

<body>
	<div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		<div class="w3-panel w3-blue" style = "margin: 0;">
	  		<p style = "margin: 5px 5px 5px 1px; font-size: 120%">Welcome <?=$name?></p> 
		</div> 
		<div class="w3-bar w3-blue" style="margin-bottom: 1%">
	  		<a href="studSearch.php" class="w3-bar-item w3-button w3-ripple w3-hover-indigo w3-purple">	
	  			Search
	  		</a>
	  		<a href="accnt.php" class="w3-bar-item w3-button w3-ripple w3-hover-indigo">	My Account
	  		</a>
		</div>
	</div>
	<div>
		<hr style="margin: 0; padding: 0">
		<center><h4>Search Results</h4></center>
		<hr style="margin: 0; padding: 0">
	</div>
<?php
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
$name =  $_GET["search"];
$nameX = "title like '%".$name."%'";//str_replace(" ", "%", $name)
//$nameY = "title like '%".str_replace(" ", "%' OR title like '%", $name)."%'";
$str = $nameX; // . " OR " . $nameY

$sql = "SELECT * FROM Books WHERE ".$str." group by title";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)==0){
	echo "<center><h5>No Books Found</h5></center>";	
}
while($row = mysqli_fetch_array($result)): ?>
	<a href = "order.php?book=<?= $row["title"]?>" class="w3-btn w3-ripple w3-khaki" style="margin: 10px auto; width: 80%; display: block;">
		<h2 style="text-align: center; margin-bottom: 0px; padding-bottom: 0"><?=$row["title"]?></h2>
		<hr> 
		<div class="w3-col" style="width: 50%; border-right: 1px solid #eceff1; text-align: right; padding-right: 0.4%">Author: <?=$row["author"]?></div><div class="w3-col" style="width: 50%; text-align: left; padding-left: 0.4%">Genre: <?=$row["genre"]?></div>
	</a>
<?php endwhile;
$conn->close();
?>
<hr>
</body>
</html>