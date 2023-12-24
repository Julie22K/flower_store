<?php 


require '../config\connect.php'; 


for($i=1;$i<=10;$i++){
    $name="new item" . $i;
    $description="some text";
    $res=mysqli_query($db, "INSERT INTO `items`(`name`, `description`) VALUES ('$name','$description')");

}



header('Location: ../index.php');
