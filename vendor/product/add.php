<?php 


require 'C:\Users\Julie\source\flower_store\config\connect.php'; 


print_r($_POST);
$title=$_POST["title"];
$description=$_POST["description"];
$image=$_POST["image"];
$date=$_POST["date"];
$price=$_POST["price"];
$material_ids=$_POST["material_ids"];
    
$res=mysqli_query($db, "INSERT INTO `products`(`title`, `description`, `image`, `date`, `price`) 
VALUES ('$title','$description','$image','$date','$price')");

$product_id=mysqli_fetch_all(mysqli_query($db, "SELECT MAX(id) FROM `products`;"))[0][0];

print_r($product_id);

foreach($material_ids as $material_id){
    $res=mysqli_query($db, "UPDATE materials
    SET `product_id` = $product_id
    WHERE `id` = $material_id;");
print_r($material_id);
}

header('Location: ../../products.php');
