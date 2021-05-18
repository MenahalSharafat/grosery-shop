<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">

</head>
<style>
	body {
		background-image: url("pics/vegetables.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover
	}
</style>

<body>
	<div class="a">

		<form method="post" action="validate.php"><br><br>
			<table>
				<tr>
					<td colspan="2" align="center">
						<h1><i><b>Login</b></h1>
					</td>
				</tr>
				<tr>
					<td><i><b> Email</b> </td>
					<td> <input type="email" name="email" placeholder=" Email Address" required> </td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td><i><b> Password</b> </td>
					<td> <input type="password" name="password" placeholder="password" required> </td>
				</tr>
				<tr></tr>
				<tr></tr>
				<!-- <tr>
		<td colspan="2" align="center">	<input type="checkbox" name="remember" value="1"> <i>Remember Me</td>
	</tr> -->
				<tr></tr>
				<tr></tr>
				<tr>
					<td colspan="2" align="center"> <input type="submit" value="  Login  " name="login" style="background-color:#043927; color:white; border:none; width:80px; height:30px">
						&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						<a href="form.html"><i>Register</a>
					</td>
				</tr>
			</table>
		</form>


	</div>
	<style>
		td {
			color: #043927;
			font-size: 18px;
		}

		td a {
			color: #043927;
			font-size: 20px;
		}

		table {
			rgin: 150px 0 0 155px
		}
	</style>
</body>

</html>