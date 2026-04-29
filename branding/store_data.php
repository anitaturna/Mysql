<?php
$database = mysqli_connect("localhost","root", "",  "brand-manufacture");

// if(!$database){
//     die("Connection failed: " . mysqli_connect_error());
// }

// Manufacture insert
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    
    $database->query("CALL add_manufc_data('$name', '$address')");
}

// Product insert
if(isset($_POST['add_submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $manufacture_id = $_POST['manufacture_id'];

    $database->query("CALL add_product_data('$name', '$price', '$manufacture_id')");
}
?>

<?php
if(isset($_POST['delete_product'])){
    $delete = $_POST['manufacture_id'];
    $database->query("DELETE FROM manufactures WHERE id = '$delete'");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>product_manu_table</title>
</head>
<body>

<form method="post"> 
    <fieldset> 
        <h3>Manufacture</h3>
        Name:<br>
        <input type="text" name="name"><br><br>

        Address:<br>
        <input type="text" name="address"><br><br>

        <input type="submit" name="submit" value="Add Manufacture">
    </fieldset>
</form>

<br><br>
 
<form method="post"> 
    <fieldset> 
        <h3>Product</h3>

        Name:<br>
        <input type="text" name="name"><br><br>

        Price:<br>
        <input type="text" name="price"><br><br>

       Manufacture:<br>
    <select name="manufacture_id">
    <?php
        $manufact = $database->query("SELECT * FROM manufactures");
        while(list($id, $name) = $manufact->fetch_row()){
            echo "<option value='$id'>$name</option>";
        }
    ?>
</select>
        
         <input type="submit" name="add_submit" value="Add product">
    </fieldset>
</form> 
<table border="2"> 
        <thead> 
            <tr> 
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody> 
            <?php
                $manufact = $database->query("SELECT * FROM view_manufact");
                while(list($id,$name,$price)= $manufact->fetch_row()){
                  ?>
                  <tr> 
                    <td><?php echo $name ?></td>
                    <td><?php echo $price?></td> 
                  </tr> 
                  <?php 
                }
            ?>
        </tbody>
</table>


<form action="" method="post"> 
             <fieldset> 
                    Manufacture:<br>
    <select name="manufacture_id">
    <?php
        $manufact = $database->query("SELECT * FROM manufactures");
        while(list($id, $name) = $manufact->fetch_row()){
            echo "<option value='$id'>$name</option>";
        }
    ?>
</select>
<input type="submit" name="delete_product" value="delete">
             </fieldset>   
</form>

</body>
</html>