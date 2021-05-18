<html>
<?php
session_start();
session_destroy();
echo "<h1><i>You are successfully logout.<br> click here to login again.. <br><br><a href='login.php'>  Login  </a></h1>";
?>
<style>
body {
  background-image: url("pics/vegetables.jpg");
   background-position: center;
  background-repeat: no-repeat;
  background-size: cover
}
h1{
	text-align:center;
	color:#043927;
	margin:250px 0 0 0;	
}
a{
	text-decoration:none;
	color:white;
	background-color:#043927;
	padding:10px 10px 10px 10px ;
	margin:250px 0 0 0;	
}


</style>
</html>