<?php
$name_page="Додати працівника";
?>
<?php require '../blocks/header.php'; ?>
<?php require '../blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<form action="../vendor/employer/add.php" method="POST">
<div class="row g-3 m-3">
  <div class="col">
    <input type="text" class="form-control" name="full_name" placeholder="ПІБ">
  </div>
  <div class="col">
    <input type="phone" class="form-control" name="phone" placeholder="Телефон">
  </div>
</div>
<div class="row g-3 m-3">
  <div class="col">
    <input type="text" class="form-control" name="posada" placeholder="Посада">
  </div>
  <div class="col">
    <input type="number" min="0" step="1" class="form-control" name="zarplata" placeholder="Заробітна плата">
  </div>
  <button type="submit" class="btn btn-primary">Додати</button>
</form>
</div>
<!--code-->
<?php require '../blocks/footer.php'; ?>