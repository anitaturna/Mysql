<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "business";
$conn = mysqli_connect($host, $user, $pass, $database);
// if(isset($_POST['btnsubmit'])){
//     die("connection failed.".$conn->connect_error);}
//     echo "connection successful.";
 

if(isset($_POST['btnsubmit'])){
    $n = $_POST['name'];
    $p = $_POST['price'];
    $m = $_POST['manufacture_id'];
    $conn->query("call new_data_add('$n', '$p', '$m')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bd-connection-table</title>
</head>
<body>
    <form action="" method="post"> 
        Name:
        <input type="text" name="name" id="" placeholder="Product Name"> <br> <br>
        Price:
        <input type="text" name="price" id="" placeholder="Price"> <br> <br>
        Manufacture ID:
        <input type="text" name="manufacture_id" id="" placeholder="Manufacture ID"> <br> <br>
        Submit:
        <input type="submit" name="btnsubmit" value="Submit">

    </form>

    <?php
    $views = $conn->query("SELECT * FROM product");
    while(list($n,$p) = $views->fetch_row()){
       echo "<tr> 
         <td>$n</td>
            <td>$p</td>
       </tr>"
    }

    ?>
</body>
</html>