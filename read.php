
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <a href="insert.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            
        </tr>



<?php 

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "VAGITARIO");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 


$result = mysqli_query($link, "SELECT * FROM table1 ORDER BY id DESC");
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['first_name']."</td>";
            echo "<td>".$res['last_name']."</td>";
            echo "<td>".$res['email']."</td>"; 
            echo "<td>".$res['password']."</td>";			
                }


if(mysqli_query($link, $result)){
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
        ?>


</table>
</body>
</html>