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
	  	<a href="adminRet.php" class="w3-bar-item w3-button">Take a return</a>
	  	<a href="adminAddBk.php" class="w3-bar-item w3-button w3-black">Add Books</a>
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
			  <h1>Add Books</h1>
			</header>
			<br><br><br>
			<div class="w3-container">
			  <form action="addbook.php" method="post">
			  	<center style = "padding-bottom: 10px">
			  		Title: 
			  		<input type="text" name="title">
			  	</center>
			  	<center style = "padding-bottom: 10px">
			  		Author: 
			  		<input type="text" name="author">
			  	</center>
			  	<center style = "padding-bottom: 10px">
			  		Genre: 
			  		<input type="text" name="genre">
			  	</center>
			  	<center style = "padding-bottom: 10px">
			  		Number of Copies: 
			  		<input type="text" name="copies" style="width: 30px">
			  	</center>
			  	<center>
			  		<button class="w3-btn w3-green" type="submit" name="ADD" value="ADD">Enter</button>
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