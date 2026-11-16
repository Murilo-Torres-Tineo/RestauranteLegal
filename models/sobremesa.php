<?php

namespace RestauranteLegal\Models;

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
        float $preco
    ) {

        $this->idSobremesa = $id;
        $this->nomeSobremesa = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;

    }
    //Getters and setter
    public function getNomeSobremesa(): string
    {
        return $this->nomeSobremesa;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
    public function getIdSobremesa(): int
    {
        return $this->idSobremesa;
    }
    public function getPrecoFormatado(): string
    {
        return "R$" . number_format($this->preco, 2);
    }

    public function getSobremesaHTML(): string
    {
        return "Id" . $this->getIdSobremesa() . "<br>
        Nome da Sobremesa:" . $this->getNomeSobremesa() . "<br>
        Descrição: " . $this->getDescricao() . "<br>
        Preço:" . $this->getPrecoFormatado();

    }

}