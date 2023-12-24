<?php
$name_page="Додати товар";
?>
<?php require '../blocks/header.php'; ?>
<?php require '../blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<form action="../vendor/product/add.php" method="POST">
<div class="row g-3 m-2">
  <div class="col">
    <input type="text" class="form-control" name="title" placeholder="Назва">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="image" placeholder="Зображення">
  </div>
</div>
<div class="row g-3 m-2">
  <div class="col">
    <input type="number" step="0.01" class="form-control" name="price" placeholder="Ціна">
  </div>
  <div class="col">
    <input type="date" class="form-control" name="date" placeholder="Дата виготовлення">
  </div>
</div>
<div class="row g-3 m-2">
  <div class="col">
    <textarea class="form-control" name="description" placeholder="Опис"></textarea>
  </div>
  <div class="col">
    <select name="material_ids[]" class="form-control" multiple>
      <option value="" default>Оберіть матеріал</option>
      <?php 
      $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM materials WHERE product_id IS NULL;"));
      foreach($data as $item){?>
      <option value="<?=$item[0]?>"><?=$item[1]?></option>
      <?php 
      }
      ?>
    </select>    
</div>
</div>
  <button type="submit" class="btn btn-primary m-3">Додати</button>
</form>
</div>
<!--code-->
<?php require '../blocks/footer.php'; ?>