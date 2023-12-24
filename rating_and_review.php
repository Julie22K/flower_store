<?php
session_start();
$name_page="Оцінки та відгуки";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<div class="row g-3 m-3">
  <div class="col">    
    <div class="btn-group" role="group" aria-label="Фільтрувати">
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataRatingAndReviews('filter_all')">Всі</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataRatingAndReviews('filter_with')">З відгуками</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataRatingAndReviews('filter_without')">Без відгуків</button>
    </div>
  </div>
  <div class="col">
    <div class="btn-group" role="group" aria-label="Сортувати">
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataRatingAndReviews('sort_name')">За ПІБ ↓</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataRatingAndReviews('sort_ratingup')">За оцінкою ↑</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataRatingAndReviews('sort_ratingdown')">За оцінкою ↓</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="showDataRatingAndReviews('sort_date')">За датою ↓</button>
    </div>
  </div>
  <div class="col">
    <input type="search" class="form-control" placeholder="Пошук..." onchange="showDataRatingAndReviews(this.value)">
  </div>
</div>

<div id="ratingandreview"></div>

</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>