<?php
session_start();
$name_page="Інформація про працівника:";
?>
<?php require 'blocks/header.php'; ?>
<?php
$employer_id=$_GET["id"];
$employer=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM employee WHERE employee.id=$employer_id;"))[0];
?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<button type="button" class="btn btn-primary mb-3" onclick="location.href='./update/employer.php'">Редагувати</button>
<button type="button" class="btn btn-primary mb-3" onclick="location.href='./vendor/employer/delete.php'">Звільнити</button>
<h2><?=$employer[1]?></h2>
<h5 class="card-subtitle mb-2 text-body-secondary">
<i class="bi bi-telephone"> <?=$employer[2]?></i> <br>
    <i class="bi bi-person-badge"> <?=$employer[3]?></i> <br>
    <i class="bi bi-cash"> <?=$employer[4]?> грн</i>
</h5>
<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <?php
    switch($employer[3]){
      case "Флорист":
        $data_info=mysqli_fetch_all(mysqli_query($db, ""))[0];
        echo '<li class="list-group-item">Зібрано букетів за останній повний місяць: ' . $data_info[0] . '</li>';
        echo '<li class="list-group-item">Зібрано букетів за весь час: ' . $data_info[1] . '</li>';
        echo '<li class="list-group-item">Зібрано букетів за останній повний місяць на суму: ' . $data_info[2] . '</li>';
        echo '<li class="list-group-item">Зібрано букетів за весь час на суму: ' . $data_info[3] . '</li>';
        break;
      case "Продавець консультант":
        $data_info=mysqli_fetch_all(mysqli_query($db, "SELECT COUNT(s.id) as total_sales, COUNT(CASE WHEN s.date BETWEEN DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AND CURRENT_DATE THEN s.id END) as sales_in_last_month, COALESCE(SUM(p.price), 0) as total_product_price, COALESCE(SUM(CASE WHEN s.date BETWEEN DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AND CURRENT_DATE THEN p.price ELSE 0 END), 0) as product_price_in_last_month FROM employee as e LEFT JOIN sales as s ON e.id = s.employer_id LEFT JOIN products as p ON s.product_id = p.id WHERE e.id=$employer_id;"))[0];
        echo '<li class="list-group-item">Виконано замовлень за останній повний місяць: ' . $data_info[0] . '</li>';
        echo '<li class="list-group-item">Виконано замовлень за весь час: ' . $data_info[1] . '</li>';
        echo '<li class="list-group-item">Виконано замовлень за останній повний місяць на суму: ' . $data_info[2] . '</li>';
        echo '<li class="list-group-item">Виконано замовлень за весь час на суму: ' . $data_info[3] . '</li>';
        break;
      case "Менеджер по доставці":
        $data_info=mysqli_fetch_all(mysqli_query($db, "SELECT COUNT(s.id) as total_sales, COUNT(CASE WHEN s.date BETWEEN DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AND CURRENT_DATE THEN s.id END) as sales_in_last_month, COALESCE(SUM(d.price), 0) as total_product_price, COALESCE(SUM(CASE WHEN s.date BETWEEN DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AND CURRENT_DATE THEN d.price ELSE 0 END), 0) as product_price_in_last_month FROM employee as e LEFT JOIN deliveries as d ON e.id = d.employer_id LEFT JOIN sales as s ON d.sale_id = s.id WHERE e.id=$employer_id;"))[0];
        echo '<li class="list-group-item">Виконано доставок за останній повний місяць: ' . $data_info[0] . '</li>';
        echo '<li class="list-group-item">Виконано доставок за весь час: ' . $data_info[1] . '</li>';
        echo '<li class="list-group-item">Виконано доставок за останній повний місяць на суму: ' . $data_info[2] . '</li>';
        echo '<li class="list-group-item">Виконано доставок за весь час на суму: ' . $data_info[3] . '</li>';
        break;
    }
    ?>
  </ul>
</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>