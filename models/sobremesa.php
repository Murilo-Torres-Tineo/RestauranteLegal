<?php

namespace RestauranteLegal\Models;

use Exception;

class Sobremesa
{

    private int $idSobremesa;
    private string $nomeSobremesa;
    private string $descricao;
    private float $preco;
    private string $tabela = "sobremesas";

    //Construtor
    public function __construct(

        int $id,
        string $nome,
        string $descricao,
        $preco
    ) {

        $this->setIdSobremesa($id);
        $this->setNomeSobremesa($nome);
        $this->setDescricao($descricao);
        $this->setPreco($preco);

    }
    //Getters and setters

    public function setIdSobremesa(int $pIdSobremesa): void
    {
        $this->idSobremesa = $pIdSobremesa;
    }

    public function getIdSobremesa(): int
    {
        return $this->idSobremesa;
    }

    public function getNomeSobremesa(): string
    {
        return $this->nomeSobremesa;
    }

    public function setNomeSobremesa(string $pNomeSobremesa): void
    {
        $nome = trim($pNomeSobremesa);

        if ($nome === "") {
            throw new Exception("O nome da sobremesa não pode ser vazio");
        } else if (strlen($nome) < 3) {
            throw new Exception("O nome da sobremesa deve ter ao menos 3 caracteres");
        }

        $this->nomeSobremesa = $pNomeSobremesa;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $pDescricao): void
    {
        $this->descricao = $pDescricao;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco($pPreco): void
    {
        if (is_string($pPreco) || !is_numeric($pPreco)) {
            throw new Exception("O preço da sobremesa não pode ser texto");
        }

        $preco = (float) $pPreco;
        if ($preco <= 0) {
            throw new Exception("O preço da sobremesa deve ser maior do que zero");
        }

        $this->preco = $preco;
    }

    public function getPrecoFormatado(): string
    {
        return "R$" . number_format($this->preco, 2, ',', '.');
    }

    public function aplicarDesconto($valorDesconto): void
    {
        if (!is_numeric($valorDesconto)) {
            throw new Exception("O desconto deve ser um valor numérico");
        }

        $desconto = (float) $valorDesconto;
        if ($desconto < 0 || $desconto > 100) {
            throw new Exception("O desconto deve estar entre 0 e 100 porcento");
        }

        $novoPreco = $this->preco * (1 - ($desconto / 100));
        $this->setPreco($novoPreco);
    }

    public function getSobremesaHTML(): string
    {
        return "Id" . $this->getIdSobremesa() . "<br>
        Nome da Sobremesa:" . $this->getNomeSobremesa() . "<br>
        Descrição: " . $this->getDescricao() . "<br>
        Preço:" . $this->getPrecoFormatado();

    }

}