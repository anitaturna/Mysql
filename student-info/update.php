<?php
$database = mysqli_connect("localhost", "root","","student-info");
if($_GET['update_data']){
    $id =$_GET['update_data'];

    $result =$database->query( "SELECT * FROM student where id = '$id'");
    $data = mysqli_fetch_assoc($result);

    //database table field
    
    $old_name = $data ['name'];
    $old_email = $data ['email'];
    $old_contact = $data ['contact'];
    $old_address = $data ['address'];
}

if(isset($_POST['btnupdate'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact']; 
    $address = $_POST['address'];

    $query="UPDATE student SET name='$name',email='$email', contact='$contact',address='$address' WHERE id='$id'";
    
    if(mysqli_query($database,$query)){
       
        header("Location: view.php");
        exit();
    }else{
        echo "Data not updated! " . mysqli_error($database);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student Info</title>
    <!-- boostrap theke cdn link add kore connection-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5"> 
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h3 class="mb-0">Add Student Info</h3>
                    </div>
                    <div class="card-body">
                        <!-- action খালি রাখার মানে হলো একই পেজে ডাটা প্রসেস হবে -->
                        <form action="" method="post"> 
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $old_name?>" required>
                            </div>

                             <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $old_email?>" required>
                            </div>

                             <div class="mb-3">
                                <label class="form-label">Contact:</label>
                                <input type="text" name="contact" class="form-control" value="<?php echo $old_contact?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Address:</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $old_address ?>" required> 
                            </div>
                            
                            
                            <div class="card-footer text-center">
                               
                                <button type="submit" name="btnupdate" class="btn btn-primary w-100">Save Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>