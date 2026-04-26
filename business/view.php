<?php
$database = mysqli_connect("localhost", "root", "", "batch-70");

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    
    // টেবিল নামে হাইফেন থাকলে ব্যাকটিক (`) ব্যবহার করা জরুরি
    $q = "INSERT INTO `batch-70` (name, cntact) VALUES ('$name', '$contact')";
    
    if (mysqli_query($database, $q)) {
        header("Location: view.php"); // সঠিক রিডাইরেকশন
        exit(); 
    } else {
        echo "Data Isn't Inserted: " . mysqli_error($database);
    }
}

//dalete check
if(isset($_GET['delete_data'])){
    $dltid =$_GET['delete_data'];
    $database->query("DELETE FROM morning_btch where id='$dltid'");
    header("location:view.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5"> 
        <div class="row"> 
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr> 
                        <th>Id</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // এখানেও সঠিক টেবিল নাম (batch-70) ব্যবহার করা হয়েছে
                    $data = $database->query("SELECT * FROM morning_btch ");
                    while(list($_id, $name, $contact) = $data->fetch_row()){
                        echo "<tr>
                            <td>$_id</td>
                            <td>$name</td>
                            <td>$contact</td>
                            <td>
                            <a href='view.php?delete_data=$_id' class='btn btn-danger'>DELETE</a>
                         </td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
            <a href="insert.php">
                <button type="submit" class="btn btn-info">insert</button>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
