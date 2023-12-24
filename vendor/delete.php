<?php 


require 'C:\Users\Julie\source\flower_store\config\connect.php';

$id=$_GET["id"];

$res=mysqli_query($db, "DELETE FROM tablename WHERE `id`=$id");

header('Location: ../../index.php');
