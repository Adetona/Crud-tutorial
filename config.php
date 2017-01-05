<?php 

//Setting the credentials to connect to the database 

$host = 'Localhost' ; 


$dbName = 'crud' ; 


$dbUser = 'root' ; 

$dbPass = '' ; 

$conn = mysqli_connect ($host , $dbUser , '' , $dbName) ; 

//Checking if the connection is successful

/*if ($conn) {
echo ‘Successfully connected’ ; 
 
}
else {
echo ‘Not connected’.mysqli_error ($conn) ; 
 
}*/ 




?> 