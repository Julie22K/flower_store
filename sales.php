<?php
session_start();
$name_page="Продажі";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<button type="button" class="btn btn-primary mb-3 btn-sm" onclick="location.href='./add/sale.php'">Додати</button>
<table id="DataTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Товар</th>
            <th>Дата продажу</th>
            <th>Дохід</th>
            <th>Витрати</th>
            <th>Чистий дохід</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $data=mysqli_fetch_all(mysqli_query($db, "SELECT p.title,s.date,p.price, ( SELECT SUM(m.price) FROM materials as m WHERE m.product_id=p.id) as vitrata FROM sales as s JOIN products as p on p.id=s.product_id;"));
    foreach($data as $item){
    ?>
        <tr>
            <td><?=$item[0]?></td>
            <td><?=$item[1]?></td>
            <td><?=$item[2]?> грн</td>
            <td><?=$item[3]?> грн</td>
            <td><?=$item[2]-$item[3]?> грн</td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>