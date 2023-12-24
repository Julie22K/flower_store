<?php
session_start();
$name_page="Склад";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<button type="button" class="btn btn-primary mb-3 btn-sm" onclick="location.href='./add/scklad.php'">Додати</button>
<table id="DataTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Назва матеріалу</th>
            <th>Опис</th>
            <th>К-сть</th>
            <th>Од.виміру</th>
            <th>Дата закупки</th>
            <th>Ціна</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM materials;"));
    foreach($data as $item){
    ?>
        <tr>
            <td><?=$item[1]?></td>
            <td><?=$item[2]?></td>
            <td><?=$item[3]?></td>
            <td><?=$item[4]?></td>
            <td><?=$item[5]?></td>
            <td><?=$item[6]?> грн</td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>