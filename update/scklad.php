<?php
$name_page="Додати матеріал на склад";
?>
<?php require '../blocks/header.php'; ?>
<?php require '../blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<form action="../vendor/scklad/add.php" method="POST">
<div class="row g-3 m-2">
  <div class="col">
    <input type="text" class="form-control" name="title" placeholder="Назва">
  </div>
  <div class="col">
    <input type="date" class="form-control" name="date" placeholder="Дата закупки">
  </div>
  <div class="col">
    <input type="number" min="0" step="0.01" class="form-control" name="price" placeholder="Ціна">
  </div>
</div>
<div class="row g-3 m-2">
  <div class="col">
    <textarea class="form-control" name="description" placeholder="Опис"></textarea>
  </div>
</div>
  <button type="submit" class="btn btn-primary">Додати</button>
</div>
</form>
</div>
<!--code-->
<?php require '../blocks/footer.php'; ?>