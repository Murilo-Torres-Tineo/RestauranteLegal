<?php

require __DIR__ . "config\Database.php";

use RestauranteLegal\Config\Database;

$meuBancoDeDdaos = new Database();
$meuBancoDeDdaos->conectar();