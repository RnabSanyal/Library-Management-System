<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<?php
		session_start();
	?>
</head>
<body>
	<?php 
		if(isset($_SESSION["id"])):?>
			<?php
				$id = $_SESSION["id"];
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "librman";
				$name =  $_GET["book"];
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 

				$checkStud = "SELECT * from books WHERE stud_id = '".$id."'";
				$result = mysqli_query($conn, $checkStud);
				$num = mysqli_num_rows($result);
				
				if($num >= 6):?>
				
					<center><h2>Sorry you cannot order any more books!</h2></center>
				
				<?php endif;
					if ($num<6):
				?>
					<?php
						//echo $name;
						$find = "SELECT * FROM books WHERE title = '".$name."' AND orders IS NULL AND borrows IS NULL";
						$result = mysqli_query($conn, $find);
						$row = mysqli_fetch_array($result);
						if(isset($row)):
					?>
						<?php
							date_default_timezone_set('Asia/Kolkata');
							//echo $row["id"];
							//echo "\n";
							//echo date('Y-m-d H:i:s', time());
							$order = "UPDATE books SET orders = '".time()."', stud_id = '".$id."' WHERE id = '".$row["id"]."'";
							//echo "$order";
							if(mysqli_query($conn, $order)):
						?>
							<center><h2>Your order for <?=$name?> has been placed</h2></center>
							<center><h3>Please collect the book in 30 minutes from now</h3></center>
							<center><h3>Click <a href = "studSearch.php">Here</a> to go back</h3></center>
						<?php endif;

						?>
					<?php endif;?>
					<!--ELSE IF BOOK NOT AVAILABLE-->
					<?php
						if(!isset($row)){
							echo "<center><h3>This book is either all ordered or borrowed. Check after sometime.</h3></center>";
						} 
					?>
				<?php endif; ?>	
		<?php endif;
			if(!isset($_SESSION["id"])){
				echo "<center><h1>You werent supposed to reach here... We suspect Illuminati</h1></center>";
			}
		?>
</body>
</html>