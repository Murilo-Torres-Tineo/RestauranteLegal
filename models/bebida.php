<?php

namespace RestauranteLegal\Models;

class Bebida
{

    private int $idBebida;
    private string $nomeBebida;
    private string $volumeml;
    private string $alcoolico;
    private string $descricao;
    private float $preco;
    private string $tabela = "bebidas";

    //Construtor
    public function __construct(

        int $id,
        string $nome,
        string $volumeml,
        string $alcoolico,
        string $descricao,
        float $preco
    ) {

        $this->idBebida = $id;
        $this->nomeBebida = $nome;
        $this->volumeml = $volumeml;
        $this->alcoolico = $alcoolico;
        $this->descricao = $descricao;
        $this->preco = $preco;

    }
    //Getters and setter
    public function getNomeBebida(): string
    {
        return $this->nomeBebida;
    }
    public function getVolumeml(): string
    {
        return $this->volumeml;
    }
    public function getAlcoolico(): string
    {
        return $this->alcoolico;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
    public function getIdBebida(): int
    {
        return $this->idBebida;
    }
    public function getPrecoFormatado(): string
    {
        return "R$" . number_format($this->preco, 2);
    }

    public function getBebidaHTML(): string
    {
        return "Id" . $this->getIdBebida() . "<br>
        Nome da Bebida:" . $this->getNomeBebida() . "<br>
        Volume (ml): " . $this->getVolumeml() . "<br>
        Alcoólico: " . $this->getAlcoolico() . "<br>
        Descrição: " . $this->getDescricao() . "<br>
        Preço:" . $this->getPrecoFormatado();

    }

}