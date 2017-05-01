<?php
require_once("config.php");


//checking if the user has clicked the edit button
if(isset($_GET["edit"])){
    $ID = $_GET["edit"];
    $query = "SELECT * FROM customerdb WHERE ID = $ID";
    $result  = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    extract($row);
    
}


//checking if the user has submitted the form
else if(isset($_POST["submit"])){
    //checking If the user has completely filled all the form fields
    if(isset($_POST ["Name"],$_POST["Email"],$_POST["Number"],$_POST["Location"])){
        //get the ID of the record to modify in the database
        $ID = $_GET ["toedit"];
        echo $ID;
        /*
mysqli_real_escape_string is for security purposes. It is used for escaping special characters inserted by the user which can sometimes be harmful to our database 
*/ 
 
$Name = mysqli_real_escape_string ($conn , $_POST ["Name"]) ;
$Email = mysqli_real_escape_string ($conn , $_POST ["Email"]) ; 
$Phoneno = mysqli_real_escape_string ($conn , $_POST ["Number"]) ;
$Location = mysqli_real_escape_string ($conn , $_POST ["Location"]) ;

//Inserting the submitted data into the database
$sql = "UPDATE customerdb SET Name = '$Name',Email = '$Email',Phoneno = '$Phoneno', Location = '$Location' WHERE ID = '$ID' ";

if(mysqli_query($conn,$sql)){
    $msg = "Successfully edited";
    $msg = urlencode($msg);
    header("Location:index.php?msg=".$msg);

}
else{$msg = "oops! There is an error when editing your record. Retry again" . mysqli_error($conn);
$_SESSION['msg'] = $msg;
    header("Location:index.php");}

    }
}
//If the user did not click the edit link in index.php or the submit button in edit.php and tries to access this page, redirect the user back to index.php_ini_loaded_file
else{
    header("Location:index.php");
}
?>

<!DOCTYPE>
<html>
    <head>
        <title>
        Edit Customer records
        </title>
    </head>
    <body>
        <h1>Edit this customer record</h1>
        <form method="POST" action ="<?php echo $_SERVER ['PHP_SELF'] . "?toedit=$ID"; ?>">
        <?php 
        $form_fields = <<<START
        <p><input type="text" name="Name" value="$Name"></p>
        <p><input type="text" name="Email" value="$Email"></p>
        <p><input type="text" name="Number" value="$Phoneno"></p>
        <p><input type="text" name="Location" value="$Location"></p>
        
        

START;
echo $form_fields;
?>
        


        <button name  = "submit">Submit</button>
        <a href="index.php"><button>Go back</button></a>
        </form>
    </body>
</html>


