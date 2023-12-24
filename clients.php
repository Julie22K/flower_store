<?php
session_start();
$name_page="Покупці";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<button type="button" class="btn btn-primary mb-3 btn-sm" onclick="location.href='./add/client.php'">Додати</button>
<table id="DataTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ПІБ</th>
            <th>Телефон</th>
            <th>Кількість покупок</th>
            <th>Відгуки</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM clients JOIN ratings_and_reviews on ratings_and_reviews.client_id=clients.id;"));
    foreach($data as $item){
    ?>
        <tr>
            <td><?=$item[1]?></td>
            <td><?=$item[2]?></td>
            <td>
                <ul style="list-style:none;">
                <?php
                $data_=mysqli_fetch_all(mysqli_query($db, "SELECT count(sales.id),sum(products.price) FROM sales JOIN products ON products.id=sales.product_id WHERE sales.client_id=$item[0];"));
                foreach($data_ as $item_){
                ?>
                    <li><?=$item_[1]?> грн / <?=$item_[0]?> р. </li>
                <?php
                }
                ?>
                </ul></td>
            <td>
                <ul style="list-style:none;">
                <?php
                $data_=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ratings_and_reviews WHERE ratings_and_reviews.client_id=$item[0];"));
                foreach($data_ as $item_){
                ?>
                    <li><?=$item_[3]==""?"":"\"" . $item_[3] . "\"/"?> Оцінка: <?=$item_[2]?>/5</li>
                <?php
                }
                ?>
                </ul>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>