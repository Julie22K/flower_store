<?php 


require 'C:\Users\Julie\source\flower_store\config\connect.php'; 


print_r($_POST);
$full_name=$_POST["full_name"];
$phone=$_POST["phone"];
$posada=$_POST["posada"];
$zarplata=$_POST["zarplata"];
    
$res=mysqli_query($db, "INSERT INTO `employee`(`full_name`, `phone`, `posada`, `zarplata`) 
VALUES ('$full_name','$phone','$posada','$zarplata')");

header('Location: ../../employee.php');
