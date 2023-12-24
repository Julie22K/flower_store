<?php
session_start();
$name_page="Товари";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<div class="row g-3 m-3">
  <div class="col">    
    <div class="btn-group" role="group" aria-label="Фільтрувати">
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataProducts('filter_neprodani')">Не продані</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataProducts('filter_prodani')">Продані</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataProducts('filter_all')">Всі</button>
    </div>
  </div>
  <div class="col">
    <div class="btn-group" role="group" aria-label="Сортувати">
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataProducts('sort_date')">За датою ↓</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataProducts('sort_price')">За ціною ↓</button>
    </div>
    </div>
    <div class="col">
        <button type="button" class="btn btn-primary mb-3 btn-sm" onclick="location.href='./add/product.php'">Додати</button>
    </div>
</div>

<div class="row row-cols-4" id="products_container"></div>
</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>