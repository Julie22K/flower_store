<?php
require 'C:\Users\Julie\source\flower_store\config\connect.php';

$str=$_GET["data"];
$data=[];
switch($str){
    case "sort_name":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews JOIN clients ON clients.id=ratings_and_reviews.client_id ORDER BY clients.full_name ASC;")); 
        break;
    case "sort_ratingup":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews JOIN clients ON clients.id=ratings_and_reviews.client_id ORDER BY ratings_and_reviews.rating ASC;")); 
        break;
    case "sort_ratingdown":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews JOIN clients ON clients.id=ratings_and_reviews.client_id ORDER BY ratings_and_reviews.rating DESC;")); 
        break;
    case "sort_date":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews JOIN clients ON clients.id=ratings_and_reviews.client_id ORDER BY ratings_and_reviews.date;")); 
        break;
    case "filter_with":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews JOIN clients ON clients.id=ratings_and_reviews.client_id WHERE ratings_and_reviews.review!='';")); 
        break;
    case "filter_without":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews JOIN clients ON clients.id=ratings_and_reviews.client_id WHERE ratings_and_reviews.review='';")); 
        break;
    default:
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews JOIN clients ON clients.id=ratings_and_reviews.client_id WHERE ratings_and_reviews.review LIKE '%$str%'")); 
        break;
}
$res="";
foreach($data as $item){
$res= $res . '<div class="card m-3" style="width: 100%"><div class="card-body"><h5 class="card-title">' . $item[6] . '</h5><h6 class="card-subtitle mb-2 text-body-secondary">Оцінка: ' . $item[2] . '/5</h6><p class="card-text">' . $item[3] . '</p><p class="card-text">' . $item[4] . '</p></div></div>';
}
echo $res;