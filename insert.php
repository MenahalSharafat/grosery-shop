<html>
<style>
	body {
		background-image: url("1.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover
	}

	h1 {
		text-align: center;
		color: white;
		margin: 250px 0 0 0;
	}

	a {
		text-decoration: none;
		color: white;
		background-color: maroon;
		padding: 10px 10px 10px 10px;
		margin: 250px 0 0 0;
	}
</style>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "1122", "demo");

// Check connection
if ($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$Birthday = mysqli_real_escape_string($link, $_REQUEST['Birthday']);

// Attempt insert query execution
$sql = "INSERT INTO table1 (first_name, last_name, email, password, Birthday) VALUES ('$first_name', '$last_name', '$email', '$password', '$Birthday')";
if (mysqli_query($link, $sql)) {
	echo "<h1><i>Records added successfully.<br>click here to login again.. <br><br><a href='login.php'>  Login  </a><h1>";
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>

</html>