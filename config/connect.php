<?php

$par1_ip = "127.0.0.1";
$par2_name = 'root';
$par3_p = '';
$par4_dp = 'flowerstore';

$db = mysqli_connect($par1_ip, $par2_name, $par3_p, $par4_dp);

mysqli_set_charset($db, 'utf8');
if (!$db) {
    echo "error";
}

