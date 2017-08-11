	<!DOCTYPE html>
	<html>
	<head>
		<title>Account</title>
		<meta name="viewport" content="width=device-width, initial-	scale=1">
		<link rel="stylesheet" href="w3.css">
	</head>
	<body>
	<?php
	session_start();
	if(isset($_SESSION["id"])):
	?>
	

	<div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		<div class="w3-panel w3-blue" style = "margin: 0;">
	  		<p style = "margin: 5px 5px 5px 1px; font-size: 120%">Welcome <?=$_SESSION["fname"]?></p> 
		</div> 
		<div class="w3-bar w3-blue">
	  		<a href="studSearch.php" class="w3-bar-item w3-button w3-ripple w3-hover-indigo">	
	  			Search
	  		</a>
	  		<a href="accnt.php" class="w3-bar-item w3-button w3-ripple w3-hover-indigo  w3-purple">	My Account
	  		</a>
	  		<a href="#" class="w3-bar-item w3-button w3-right">Logout</a>
		</div>
	</div>
	
	<center><h2><?=$_SESSION["fname"]?> <?=$_SESSION["lname"]?></h2></center>
	<center>All books</center>
	
		<table class="w3-table-all w3-hoverable">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Author</th>
					<th>Status</th>
					<th>Date</th>
				</tr>
			</thead>
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

			$sql = "SELECT * FROM books WHERE stud_id = '".$_SESSION["id"]."'";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)): ?>

				<?php
					$color = "";
					$status = ""; 
					if(isset($row["borrows"])){
						$color = "w3-green";
						$status = "Borrowed";
						if(time() - $row["borrows"] > 432000){
							$color = "w3-red";
							$status = "Overdue";
						}
					}else if(isset($row["orders"])){
						$color = "w3-yellow";
						$status = "Ordered";
					}

				?>

			<tr class = "<?=$color?> w3-hover-white">
				<td><?=$row["id"]?></td>
				<td><?=$row["title"]?></td>
				<td><?=$row["author"]?></td>
				<td><?=$status?></td>
				<?php 
					if($status == "Ordered"):?>
				<td><?php date_default_timezone_set('Asia/Kolkata'); echo date('d:m:Y H:i:s', $row["orders"]);?></td>
				<?php endif;
					if($status != "Ordered"):?>
				<td><?php date_default_timezone_set('Asia/Kolkata'); echo date('d:m:Y H:i:s', $row["borrows"])?></td>
				<?php endif; ?>	
			</tr>


			<?php endwhile;?>	 	

		</table>
	<?php
	endif;
	if(!isset($_SESSION["id"])){
		echo "<center><h2>You Donot Have An Account Yet</h2></center>";
	}
	?>


	<div style="position: absolute; bottom: 0; width: 100%;" class="w3-blue">
		<h3 style="text-align: right; vertical-align: middle;">DBIT Library</h3>
	</div>
	</body>
	</html>
