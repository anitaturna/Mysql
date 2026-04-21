<?php
$conn = mysqli_connect("localhost", "root", "", "sumi_fotka");
if(!$conn){
    die("this link is invalid");
}
echo "successfull";
?>