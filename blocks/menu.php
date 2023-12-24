<?php
function is_active_link($link_name,$name_page){
    return $link_name==$name_page?"active":"";
}
?>
<ul class="nav nav-underline m-3">
  <li class="nav-item">
    <a class="nav-link <?=is_active_link("Товари",$name_page)?>" href="products.php">Товари</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=is_active_link("Покупці",$name_page)?>" href="clients.php">Покупці</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=is_active_link("Продажі",$name_page)?>" href="sales.php">Продажі</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=is_active_link("Склад",$name_page)?>" href="scklad.php">Склад</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=is_active_link("Працівники",$name_page)?>" href="employee.php">Працівники</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=is_active_link("Статистика",$name_page)?>" href="statistic.php">Статистика</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=is_active_link("Оцінки та відгуки",$name_page)?>" href="rating_and_review.php">Оцінки та відгуки</a>
  </li>
  <li style="margin-left:400px;margin-top:10px;" >
    <a style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></a>
  </li>
  <li style="margin-left:10px;margin-top:10px;" >
    <a href="vendor/logout.php" class="logout">Вихід</a>
  </li>
</ul>