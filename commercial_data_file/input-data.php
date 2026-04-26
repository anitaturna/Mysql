<?php
$database = mysqli_connect("localhost","root","","commercial_data_file");


//insert manufacture data
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $database->query("CALL manu_data('$name','$address','$contact')");
}


//insert product data
if(isset($_POST['add_submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $manufacture_id = $_POST['manufacture_id'];
    $database->query("CALL product_data('$name','$price','$manufacture_id')");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product-doc</title>
</head>
<body>

    <!-- form for product -->
    <form action="" method="post"> 
         <h3>Manufacture</h3>
         Name:<br>
        <input type="text" name="name"><br><br>

        Address:<br>
        <input type="text" name="address"><br><br>
        contact: <br>
        <input type="number" name="contact" id=""> <br> <br>

        <input type="submit" name="submit" value="Add Manufacture">
    </form> <br> <br>



    <!-- form for manufacture -->
    <form action="" method="post"> 
        <h3>Product</h3>
        Name:<br>
        <input type="text" name="name"><br><br>

        Price:<br>
        <input type="text" name="price"><br><br>

        Manufacture-id:<br>
        <select name="manufacture_id" id=""> 
            <?php
                $manufact = $database->query("SELECT * FROM manufacture");
                while(list($id,$name) = $manufact->fetch_row()){
                     echo "<option value='$id'>$name</option>";
                }
            ?>
        </select>
        <input type="submit" name="add_submit" value="Add product">
    </form>

    <br> <br>


    <!-- table show -->
     <table border="2"> 
                <thead> 
                    <tr> 
                       
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>

                <tbody> 
                <?php
                     $manufact = $database->query("SELECT * FROM view_manufact");
                     while(list($name,$address)= $manufact->fetch_row()){
                ?>
                <tr> 
                    
                    <td><?php echo $name?></td>
                    <td><?php echo $address?></td>
                    
                </tr>
                <?php 
                }
                ?>
                </tbody>
     </table>
    

     </form>
</body>
</html>