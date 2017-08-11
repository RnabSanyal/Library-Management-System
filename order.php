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
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION["id"])): ?>
	<?php
		$book = $_GET["book"];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "librman";
		$count=0;
		$borrow=0;
		$order=0;
		$avail=0;
		date_default_timezone_set('Asia/Kolkata');
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM BOOKS WHERE title = '".$book."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)==0){
			echo "<center><h5>No Books Found</h5></center>";	
		}

		while($row = mysqli_fetch_array($result)){
			$count = $count + 1;
			if($count == 1){
				$author = $row["author"];
 				$genre = $row["genre"];
			}
			if(isset($row["borrows"])){
				$borrow = $borrow + 1;
				continue;
			}
			else if(isset($row["orders"])){
				$time = $row["orders"];
				$sysTime = time();
				$diff = $sysTime - $time;
				if($diff > 1800){
					$sql = "UPDATE books SET orders = NULL, stud_id = NULL WHERE id = '".$row["id"]."'";
					//$result2 = mysqli_query($conn, $sql);
					//echo $sql;
					if (mysqli_query($conn, $sql)) {
    					//echo "Record updated successfully";
					} else {
    					echo "Error updating record: " . mysqli_error($conn);
					}
				}
				else{
					$order = $order + 1;
				}
			}
 		}
 		$avail = $count - $borrow - $order;
 		
	?>

	<div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); position:absolute; z-index: 10; width:100%">
		<div class="w3-panel w3-blue" style = "margin: 0;">
	  		<p style = "margin: 5px 5px 5px 1px; font-size: 120%">Welcome <?=$_SESSION["fname"]?></p> 
		</div> 
		<div class="w3-bar w3-blue">
	  		<a href="studSearch.php" class="w3-bar-item w3-button w3-ripple w3-hover-indigo w3-purple">	
	  			Search
	  		</a>
	  		<a href="accnt.php" class="w3-bar-item w3-button w3-ripple w3-hover-indigo">	My Account
	  		</a>
		</div>
	</div>
	<div class="w3-container" style="height: 530px; margin: 0">
		<div class="w3-container" style="background-color: #ecf0f1; margin-top: 70px; padding-bottom: 100px;">
			<h1><?=$book?></h1>
			<h4>Genre: <?=$genre?></h4>
			<h4>Author: <?=$author?></h4>
			<br>
			<br>
			<div class="w3-row">
				<div class="w3-col m3 w3-blue">
					<center><h4>Total</h4></center>
					<center><?=$count?></center>					
				</div>

				<div class="w3-col m3 w3-red">
					<center><h4>Borrowed</h4></center>
					<center><?=$borrow?></center>
				</div>


				<div class="w3-col m3 w3-yellow">
					<center><h4>Ordered</h4></center>
					<center><?=$order?></center>
				</div>


				<div class="w3-col m3 w3-green">
					<center><h4>Available</h4></center>
					<center><?=$avail?></center>
				</div>
			</div>
			<center><a href = "orderFinal.php?book=<?=$book?>" class="w3-btn w3-xxlarge w3-hover-indigo w3-blue w3-ripple" style="margin-top: 8%; ">Order</button></a></center>
		</div>
	</div>


	<div style="position: fixed; bottom: 0; width: 100%; height:50px; margin: 0; padding: 0" class="w3-blue"; >
		<h3 style="text-align: right; vertical-align: middle;">DBIT Library</h3>
	</div>

<?php endif;
	if(!isset($_SESSION["id"])){
		echo "<center><h2>Login to Order books</h2></center>
		<center>Click here to <a href='stud_Login.html'>Login</a></center><br>
		<center>Click here to go back <a href='studSearch.php'>Home</a></center>";
	}

?>
</body>
</html>