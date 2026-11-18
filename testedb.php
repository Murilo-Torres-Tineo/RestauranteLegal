<?php

require __DIR__ . "/config/Database.php";
require __DIR__ . "/models/prato.php";
require __DIR__ . "/models/bebida.php";
require __DIR__ . "/models/sobremesa.php";

use RestauranteLegal\Config\Database;
use RestauranteLegal\Models\Prato;
use RestauranteLegal\Models\Bebida;
use RestauranteLegal\Models\Sobremesa;

$meuBancoDeDados = new Database(); //criando objeto database
$minhaConexao = $meuBancoDeDados->conectar(); //chamando metodo conectar do Database


if (is_string($minhaConexao)) {
    echo $minhaConexao;
} else {
    // echo "Conectou...";
}


$meuPrato = new Prato(1, "Feijoada", "Deliciosa Feijoada", 46.99);

// var_dump($meuPrato);

echo $meuPrato->getPratoHTML() . "<br>";

$minhabebida = new Bebida(1, "Água", "500ml", "N", "Garrafinha de plátisco que contem água mineral fresca", 5.00);
echo $minhabebida->getBebidaHTML() . "<br>";

$minhasobremesa = new Sobremesa(1, " Pudim de Leite Condensado", "Pudim tradicional com calda de caramelo", 12.00);
echo $minhasobremesa->getSobremesaHTML() . "<br>";

echo "<br> =====Segundo Prato===== <br>";

try {
    $meusegundoprato = new Prato(2, "Lasanha", "Maravilhosa Lasanha à bolonhesa", 39.90);
    echo $meusegundoprato->getPratoHTML();
} catch (\Throwable $th) {
    echo $th->getMessage();
}