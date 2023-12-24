<?php 


require 'C:\Users\Julie\source\flower_store\config\connect.php'; 


print_r($_POST);
$full_name=$_POST["full_name"];
$phone=$_POST["phone"];
    
$res=mysqli_query($db, "INSERT INTO `clients`(`full_name`, `phone`) 
VALUES ('$full_name','$phone')");

header('Location: ../../clients.php');
