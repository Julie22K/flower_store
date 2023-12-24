<?php
$name_page="Додати продажу";
$product_id=0;
if (isset($_GET["product_id"])) {
  $product_id=$_GET["product_id"];
}
?>
<?php require '../blocks/header.php'; ?>
<?php require '../blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<form action="../vendor/sale/add.php" method="POST">
<div class="row g-3 m-2">
  <div class="col">
    <select name="product_id" class="form-control">
      <option value="" default>Товар</option>
      <?php 
      $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM products;"));
      foreach($data as $item){?>
      <option value="<?=$item[0]?>" <?=($product_id!=0&&$item[0]==$product_id)?"selected":""?>><?=$item[1]?></option>
      <?php }?>
    </select>
  </div>
  <div class="col">
    <select name="employer_id" class="form-control">
      <option value="" default>Працівник</option>
      <?php 
      $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM employee WHERE posada='Продавець консультант';"));
      foreach($data as $item){?>
      <option value="<?=$item[0]?>"><?=$item[1]?></option>
      <?php }?>
    </select>
  </div>
</div>
<div class="row g-3 m-2">
  <div class="col">
    <select name="client_id" class="form-control">
      <option value="" default>Клієнт</option>
      <?php 
      $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM clients;"));
      foreach($data as $item){?>
      <option value="<?=$item[0]?>"><?=$item[1]?></option>
      <?php }?>
    </select>
  </div>
  <div class="col">
    <input type="date" class="form-control" name="date" placeholder="Дата продажі">
  </div>
</div>
  <button type="submit" class="btn btn-primary">Додати</button>
</div>
</form>
</div>
<!--code-->
<?php require '../blocks/footer.php'; ?>