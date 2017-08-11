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
<title>Delete User</title></head>
<body>
<?php
if(isset($_POST['DELETE']))
{
	//$uid = ''; 
	//$uid = $_POST['id'];
	
	$sql = "DELETE FROM student WHERE id='" . $_POST['id'] . "'";
	
	if (mysqli_query($conn, $sql))
	{
			echo "<center><h3>User Erased</h3></center>";
	} 
	else 
	{
		echo "Error deleting record: " . mysqli_error($conn);
	}
}

?>
</body>
</html>