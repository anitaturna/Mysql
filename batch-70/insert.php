<?php
// ১. ডাটাবেজ কানেকশন (আপনার ডাটাবেজ নাম 'batch-70' হলে এটি ঠিক আছে)
$database = mysqli_connect("localhost", "root", "", "batch-70");

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    
    
    $q = "INSERT INTO morning_btch(name,cntact) VALUES ('$name', '$contact')";
    
    if (mysqli_query($database, $q)) {
        header("location:view.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student Info</title>
    <!-- বুটস্ট্র্যাপ সিডিএন ঠিক করা হয়েছে -->
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
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contact:</label>
                                <input type="text" name="contact" class="form-control" required> 
                            </div>
                            
                            
                            <div class="card-footer text-center">
                               
                                <button type="submit" name="submit" class="btn btn-primary w-100">Save Data</button>
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

