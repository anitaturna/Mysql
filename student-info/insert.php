<?php
$database = mysqli_connect("localhost","root","","student-info");
if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $query = "INSERT INTO student(name,email,contact,address) VALUES('$name', '$email','$contact','$address')";

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
    Email: <br>
    <input type="text" name="email" id=""><br> <br>
    Contact: <br>
    <input type="text" name="contact" id=""><br> <br>
    Address: <br>
    <textarea name="address" id="address"></textarea> <br> <br>
    <button type="submit" name="insert">submit</button>


    </form>
</body>
</html>