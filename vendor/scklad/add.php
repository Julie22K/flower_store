<?php 



require 'C:\Users\Julie\source\flower_store\config\connect.php'; 

print_r($_POST);
$title=$_POST["title"];
$description=$_POST["description"];
$date=$_POST["date"];
$price=$_POST["price"];
    
$res=mysqli_query($db, "INSERT INTO `materials`(`title`, `description`, `date`, `price`) 
VALUES ('$title','$description','$date','$price')");

header('Location: ../../scklad.php');
