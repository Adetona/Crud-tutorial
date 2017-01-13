<Html> 

<head> 

<title> Read record </title> 

<style> 

td {

padding : 10px ; 	

background-color : orange ; 
	
}


</style>  
 
 
</head> 

<body>

<table> 

 
<tr> 

<th> Name </th> 

<th> Email </th>

<th> Number </th> 

<th> Location </th> 

<th> Edit </th> 

<th> Delete </th> 

</tr> 
 

<?php 

require_once ('config.php') ; 

$query  = "SELECT * FROM customerdb" ; 

$result  = mysqli_query ($conn , $query) ; 


while ($row  = mysqli_fetch_array ($result) ) {
	
echo '<tr>' ;   

echo '<td>'.$row ['Name']. '</td>' ; 

echo '<td>' .$row ['Email']. '</td>' ;    

echo   '<td>' .$row ['Number']. '</td>' ;  

echo '<td>' .$row['Location']. '</td>' ;  

echo '<td>'. '<a href="edit.php?edit='.$row ['ID'].'" > Edit </a>'.'</td>' ;   

echo '<td>'. '<a href="index.php?Delete='.$row ['ID'].'" > Delete  </a>'.'</td>' ; 


echo '<tr>' ;  


}

echo '</tr>' ;   

?>
</table> 

</body> 

</html>



