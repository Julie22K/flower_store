<?php 


require 'C:\Users\Julie\source\flower_store\config\connect.php';

$id=$_GET["id"];

$res=mysqli_query($db, "DELETE FROM products WHERE `id`=$id");

header('Location: ../../products.php');
