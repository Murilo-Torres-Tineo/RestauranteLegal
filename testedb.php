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

$minhabebida = new Bebida(1, "Água", 500, false, "Garrafinha de plástico que contém água mineral fresca", 5.00);
echo $minhabebida->getBebidaHTML() . "<br>";

$minhasobremesa = new Sobremesa(1, " Pudim de Leite Condensado", "Pudim tradicional com calda de caramelo", 12.00);
echo $minhasobremesa->getSobremesaHTML() . "<br>";

echo "<br> =====Segundo Prato===== <br>";

try {
    $meusegundoprato = new Prato(2, "Lasanha", "Maravilhosa Lasanha à bolonhesa", 39.90);
    echo $meusegundoprato->getPratoHTML() . "<br>";
} catch (\Throwable $th) {
    echo $th->getMessage() . "<br>";
}

// Nome vazio
try {
    new Prato(3, "", "Prato especial", 35.00);
} catch (Throwable $erro) {
    echo "Erro Prato: " . $erro->getMessage() . "<br>";
}

// Nome muito curto
try {
    new Prato(4, "AB", "Prato especial", 35.00);
} catch (Throwable $erro) {
    echo "Erro Prato: " . $erro->getMessage() . "<br>";
}

// Preço inválido
try {
    new Prato(5, "Pizza", "Pizza de mussarela", 0);
} catch (Throwable $erro) {
    echo "Erro Prato: " . $erro->getMessage() . "<br>";
}

echo "<br>===== Testes de desconto =====<br>";

$minhasobremesa->aplicarDesconto(10);
echo "Desconto de 10%: " . $minhasobremesa->getPrecoFormatado() . "<br>";

$minhasobremesa->aplicarDesconto(25);
echo "Desconto de 25%: " . $minhasobremesa->getPrecoFormatado() . "<br>";

$minhasobremesa->aplicarDesconto(50);
echo "Desconto de 50%: " . $minhasobremesa->getPrecoFormatado() . "<br>";

echo "<br>===== Testes de validação =====<br>";

try {
    $minhasegundabebida = new Bebida(2, "Coca-Cola", 350, false, "Refrigerante de cola", 7.00);
    echo $minhasegundabebida->getBebidaHTML() . "<br>";
} catch (\Throwable $th) {
    echo $th->getMessage() . "<br>";
}

// Nome vazio
try {
    new Bebida(2, "", 500, false, "Água mineral", 5.00);
} catch (Throwable $erro) {
    echo "Erro Bebida: " . $erro->getMessage() . "<br>";
}

// Nome com menos de 3 caracteres
try {
    new Bebida(3, "AB", 500, false, "Água mineral", 5.00);
} catch (Throwable $erro) {
    echo "Erro Bebida: " . $erro->getMessage() . "<br>";
}

// Volume inválido
try {
    new Bebida(4, "Suco", 150, false, "Suco natural", 5.00);
} catch (Throwable $erro) {
    echo "Erro Bebida: " . $erro->getMessage() . "<br>";
}

// Alcoólico inválido
try {
    new Bebida(5, "Vinho", 750, "sim", "Vinho tinto", 30.00);
} catch (Throwable $erro) {
    echo "Erro Bebida: " . $erro->getMessage() . "<br>";
}

// Preço inválido
try {
    new Bebida(6, "Refrigerante", 350, false, "Refrigerante gelado", 0);
} catch (Throwable $erro) {
    echo "Erro Bebida: " . $erro->getMessage() . "<br>";
}

echo "<br>===== Sobremesas válidas =====<br>";

// Sobremesa 1
try {
    $sobremesa1 = new Sobremesa(2, "Brigadeiro", "Doce tradicional de chocolate", 5.00);
    echo $sobremesa1->getSobremesaHTML() . "<br>";
} catch (Throwable $erro) {
    echo $erro->getMessage() . "<br>";
}

// Sobremesa 2
try {
    $sobremesa2 = new Sobremesa(3, "Pudim", "Pudim de leite condensado com caramelo", 12.00);
    echo $sobremesa2->getSobremesaHTML() . "<br>";
} catch (Throwable $erro) {
    echo $erro->getMessage() . "<br>";
}

// Nome vazio
try {
    new Sobremesa(4, "", "Bolo de chocolate", 20.00);
} catch (Throwable $erro) {
    echo "Erro Sobremesa: " . $erro->getMessage() . "<br>";
}

// Nome com menos de 3 caracteres
try {
    new Sobremesa(5, "AB", "Doce de chocolate", 10.00);
} catch (Throwable $erro) {
    echo "Erro Sobremesa: " . $erro->getMessage() . "<br>";
}

// Preço negativo
try {
    new Sobremesa(6, "Torta", "Torta de morango", -15.00);
} catch (Throwable $erro) {
    echo "Erro Sobremesa: " . $erro->getMessage() . "<br>";
}