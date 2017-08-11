<?php
$host="localhost";
$dbuser="root";
$pass="";
$dbname="librman";
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno())
{
	die("Connection failed !!".mysqli_connect_errno());
}
?>
<html>
<head>
<title>ADD BOOKS</title></head>
<body>
<?php
if(isset($_POST['ADD']))
{
	$title = $_POST['title'];
	$author = $_POST['author'];
	$genre = $_POST['genre'];
	$copies = $_POST['copies'];
	/*if(empty($title)||empty($author)||empty($genre)||empty($copies))
	   {
		  echo" OOPS!!!Cannot have any blanck field!";
	  */ 
	if($copies > 1)
	{
		for($i=1;$i<=$copies;$i++)
		{
			$sql = "INSERT INTO books (title,author,genre)".
				"VALUES('$title','$author','$genre')";
			$res = mysqli_query($conn,$sql);
				
		}
		
	}
	else
	{
		$sql = "INSERT INTO books (title,author,genre)".
				"VALUES('$title','$author','$genre')";
		$res = mysqli_query($conn,$sql);
					
	}
	echo "<center><h2>Books Added Successfully!</h2></center><br><center><h2>Click <a href = 'adminAddBk.php'>Here</a> to go back</h2></center>";
}
else
{
	echo "Form not submitted properly !";
}

?>
</body>
</html>