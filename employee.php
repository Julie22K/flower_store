<?php
session_start();
$name_page="Працівники";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
<button type="button" class="btn btn-primary mb-3 btn-sm" onclick="location.href='./add/employer.php'">Додати</button>
<div class="row row-cols-3">
<?php
    $data=mysqli_fetch_all(mysqli_query($db, "SELECT * FROM employee;"));
    foreach($data as $item){
    ?>
        <div class="col">
            <div class="card mb-4" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$item[1]?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">
                        <i class="bi bi-telephone"> <?=$item[2]?></i> <br>
                        <i class="bi bi-person-badge"> <?=$item[3]?></i> <br>
                        <i class="bi bi-cash"> <?=$item[4]?> грн</i>
                    </h6>
                    <p class="card-text"></p>
                    <a href="employer.php?id=<?=$item[0]?>" class="card-link">Детальніше</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
  </div>
</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>