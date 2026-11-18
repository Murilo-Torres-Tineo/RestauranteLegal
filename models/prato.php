<?php

namespace RestauranteLegal\Models;

use Exception;

class Prato
{

    private int $idPrato;
    private string $nomePrato;
    private string $descricao;
    private float $preco;
    private string $tabela = "pratos";

    //Construtor
    public function __construct(

        int $id,
        string $nome,
        string $descricao,
        float $preco
    ) {

        $this->setIdPrato($id);
        $this->setNomePrato($nome);
        $this->setDescricao($descricao);
        $this->setPreco($preco);

    }
    //Getters and setter

    public function setIdPrato(int $pIdPrato): void
    {
        $this->idPrato = $pIdPrato;
    }
    public function getNomePrato(): string
    {
        return $this->nomePrato;
    }

    public function setNomePrato(string $pNomeprato): void
    {
        // Não pode ser vazio
        // Ao menos 3 caracteres
        if (strlen(trim($pNomeprato)) == 0) {
            throw new Exception("O nome do prato não pode ser vazio");
        } else if (strlen(trim($pNomeprato)) < 3) {
            throw new Exception("O nome do prato deve ter ao menos 3 caracteres");
        }
        $this->nomePrato = $pNomeprato;
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
    public function getIdPrato(): int
    {
        return $this->idPrato;
    }
    public function getPrecoFormatado(): string
    {
        return "R$" . number_format($this->preco, 2);
    }

    public function setPreco(float $pPreco): void
    {
        // Não pode ser negativo nem zero
        if ($pPreco <= 0) {
            throw new Exception("O preço do prato não pode ser negativo ou zero.");
        }
        $this->preco = $pPreco;
    }

    public function getPratoHTML(): string
    {
        return "Id" . $this->getIdPrato() . "<br>
        Nome do Prato:" . $this->getNomePrato() . "<br>
        Descrição: " . $this->getDescricao() . "<br>
        Preço:" . $this->getPrecoFormatado();

    }

}