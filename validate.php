<html>
<?php

$link = mysqli_connect("localhost", "root", "1122", "demo");

// Check connection
if ($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];


	$result = mysqli_query($link, "SELECT * FROM table1 ORDER BY id DESC");
	while ($res = mysqli_fetch_array($result)) {

		if ($email == $res['email'] and $pass == $res['password']) {
			if (isset($_POST['remember'])) {
				setcookie('email', $email, time() + 60 * 60 * 7);
			}
			session_start();
			$_SESSION['email'] = $email;
			echo $_SESSION['email'];
			header("location: home.php");
		} else {
			echo "Email or Password is incorrect. <br> 
Click here to <a href='login.php'>try again</a>";
		}
	}






	if ($email == $myemail and $pass == $mypass) {
		if (isset($_POST['remember'])) {
			setcookie('email', $email, time() + 60 * 60 * 7);
		}
		session_start();
		$_SESSION['email'] = $email;
		echo $_SESSION['email'];
		header("location: home.php");
	} else {
		echo "<h2>Email or Password is incorrect. <br> 
Click here to login again..<br><br> <a href='login.php'>Login</a></h2>";
	}
} else {
	header("location: login.php");
}

?>
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
		margin: 100px 0 0 0;
	}

	a {
		text-decoration: none;
		color: white;
		background-color: maroon;
		padding: 10px 10px 10px 10px;
		margin: 100px 0 0 0;
	}

	</style </html>