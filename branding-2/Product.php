<?php
$database = new mysqli("localhost","root","","manufacturer");

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand_id = $_POST['brand_id'];

    // image handling
    $product_image = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];

    // upload folder
    move_uploaded_file($tmp_name, "uploads/".$product_image);

    // insert query
    $insertQuery = "INSERT INTO products (name, price, brand_id, product_image)
    VALUES ('$name', '$price', '$brand_id', '$product_image')";

    if($database->query($insertQuery)){
        header("location:dataView.php");
    } else {
        echo "Data not inserted: " . $database->error;
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
    <form action="" method="post" enctype="multipart/form-data">
                
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="contact">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="brand_id">Brand ID:</label>
        <select name="brand_id">
        <?php    
        $brand_id= $database->query("select * from brand");
        while(list($id,$name)=$brand_id->fetch_row()){
            echo "<option value='$id'>$name</option>";
        }

        ?>
        </select>
               
        <label>Product Image:</label><br>
        <input type="file" name="product_image" accept="image/*"><br><br>
        
        
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>