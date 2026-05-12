<?php
$database = mysqli_connect("localhost","root","","brand-manufacture");
if(isset($_POST['insert'])){
    $name = $_POST['name'];
   
    $contact = $_POST['contact'];
   

    $query = "INSERT INTO brand (name,contact) VALUES('$name','$contact')";

    if(mysqli_query($database,$query)==true){
        header("location:view.php");
        exit();
    }
    else{
        echo "data is not inserted!".mysqli_error($database);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <h2>Student info form</h2>
    <form action="" method="post"> 
    Name: <br>
    <input type="text" name="name" id=""> <br> <br>
   
    Contact: <br>
    <input type="text" name="contact" id=""><br> <br>
   
    <button type="submit" name="insert">submit</button>


    </form>
</body>
</html>