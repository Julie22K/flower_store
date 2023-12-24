<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
$name_page="Головна";
?>
<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>
<!--code-->
<div class="container">
<h1><?=$name_page?></h1>
</div>
<!--code-->
<?php require 'blocks/footer.php'; ?>