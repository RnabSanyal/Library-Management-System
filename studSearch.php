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
		<div class="w3-bar w3-blue">
	  		<a href="#" class="w3-bar-item w3-button w3-ripple w3-hover-indigo w3-purple">	
	  			Search
	  		</a>
	  		<a href="accnt.php" class="w3-bar-item w3-button w3-ripple w3-hover-indigo">	My Account
	  		</a>
	  		<?php if(isset($_SESSION["id"])):?>
	  			<a href="logout.php" class="w3-bar-item w3-button w3-right">Logout</a>
	  		<?php endif;
	  			if(!isset($_SESSION["id"])):?>
	  			<a href="stud_Login.html" class="w3-bar-item w3-button w3-right">Login</a>
	  		<?php endif;?>
		</div>
	</div>
	<!--<div style="position: absolute; top: 38%; text-align: center; width: 100%; font-size: 150%">
		Search for a Book!
	</div>-->
	<form action="search.php" method="GET">
		<div style="margin-top: 12%">
			<center>
			  <span style="font-size: 200%">Search for a Book!</span>
			  <div class="w3-card" style="width:50%;">
				<input type="text" name="search" placeholder="Search..">
			  </div>
			</center>
		</div>
		<center>
			<button class="w3-btn w3-hover-indigo w3-blue w3-ripple" style="margin-top: 1%">
				Search
			</button>
		</center>
	</form>

	<div style="position: absolute; bottom: 0; width: 100%;" class="w3-blue">
		<h3 style="text-align: right; vertical-align: middle;">DBIT Library</h3>
	</div>

</body>
</html>
