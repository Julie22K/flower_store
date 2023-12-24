<?php 

require 'C:\Users\Julie\source\flower_store\config\connect.php'; 

print_r($_POST);
$client_id=$_POST["client_id"];
$employer_id=$_POST["employer_id"];
$product_id=$_POST["product_id"];
$date=$_POST["date"];
    
$res=mysqli_query($db, "INSERT INTO `sales`(`client_id`, `employer_id`, `product_id`, `date`) 
VALUES ('$client_id','$employer_id','$product_id','$date')");

header('Location: ../../sales.php');
