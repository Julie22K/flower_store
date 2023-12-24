<?php
require 'C:\Users\Julie\source\flower_store\config\connect.php';

$str=$_GET["data"];
$data=[];
switch($str){
    case "filter_neprodani":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT products.* FROM products WHERE NOT exists (SELECT * FROM sales WHERE sales.product_id = products.id);;"));
        break;
    case "filter_prodani":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT products.* FROM products WHERE exists (SELECT * FROM sales WHERE sales.product_id = products.id);;"));
        break;
    case "filter_all":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM products;"));
        break;
    case "sort_date":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM products ORDER BY date;"));
        break;
    case "sort_price":
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM products ORDER BY price;"));
        break;
    default:
        $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM products;"));
    break;
}

foreach($data as $item){
?>
<div class="col">
<div class="card mb-4" style="width: 15rem;">
<img src="<?=$item[3]==""?'https://dicentra.ua/assets/images/products/2711/fer-3360-15-rodos.jpg':$item[3]?>" class="card-img-top" alt="<?=$item[1]?>">
<div class="card-body">
    <h5 class="card-title"><?=$item[1]?></h5>
    <p class="card-text"><?=$item[2]?></p>
</div>
<ul class="list-group list-group-flush">
    <li class="list-group-item"><i class="bi bi-tag"></i> <?=$item[4]?> грн</li>
    <li class="list-group-item"><i class="bi bi-calendar"></i> <?=$item[5]?></li>
    <?php 
    $materials=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM materials WHERE product_id=$item[0];"));
    if(count($materials)!=0)    {          
    ?>
    <li class="list-group-item">
        <ul>
            <?php
            foreach($materials as $material){
            ?>
                <li><?=$material[1]?></li><!--Додати одиниці виміру і кількість у матеріали-->
            <?php
            }
            ?>
        </ul>
    </li>
    <?php
    }
    ?>
</ul>
<div class="card-body">
    <a href="./add/sale.php?product_id=<?=$item[0]?>" class="card-link">Продати</a>
    <a href="./vendor/product/delete.php?id=<?=$item[0]?>" class="card-link" title="Прибрати з продажу">Прибрати з продажу</a>
</div>
</div>
</div>
<?php
}
?>