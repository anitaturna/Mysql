<?php
$db = new mysqli("localhost","root","","manufacturer");

// delete
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $db->query("DELETE FROM products WHERE id='$id'");
    header("location:dataView.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Brand & Product Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="text-center">Brand and Products Table</h3>

    <table class="table table-success table-striped">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Brand Name</th>
            <th>Contact</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php
        $query = $db->query("
            SELECT 
                products.id,
                products.name AS product_name,
                products.price,
                products.product_image,
                brand.name AS brand_name,
                brand.contact
            FROM products
            JOIN brand ON products.brand_id = brand.id
        ");

        while($row = $query->fetch_assoc()){
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['brand_name']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['price']}</td>
                <td>
                    <img src='uploads/{$row['product_image']}' width='60'>
                </td>
                <td>
                    <a href='edit.php?update_id={$row['id']}' class='btn btn-dark'>Update</a>
                    <a href='dataView.php?delete_id={$row['id']}' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
</div>

</body>
</html>