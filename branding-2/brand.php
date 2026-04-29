<?php
$database = new mysqli("localhost","root","","manufacturer");



// if ($database->connect_error) {
//     die("Connection failed: " . $database->connect_error);
// }else
// {
//     echo "database connected!";
// }

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $contact = $_POST['contact'];

    $insertQuery="INSERT INTO brand (name,contact) values ('$name','$contact')"; 
    if(mysqli_query($database,$insertQuery)===true){
         echo "data inserted successfull!";
          header("location:Product.php"); 
        }else {
        echo "data not inserted!".mysqli_error();
     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Form</title>
    <link rel="stylesheet" href="brand.css">
</head>
<body>
    <h2>Brand Information Form</h2>
    <form action="" method="post">
                
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>