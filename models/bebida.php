<?php

namespace RestauranteLegal\Models;

use Exception;

class Bebida
{

    private int $idBebida;
    private string $nomeBebida;
    private float $volumeml;
    private bool $alcoolico;
    private string $descricao;
    private float $preco;
    private string $tabela = "bebidas";

    //Construtor
    public function __construct(

        int $id,
        string $nome,
        $volumeml,
        $alcoolico,
        string $descricao,
        $preco
    ) {

        $this->setIdBebida($id);
        $this->setNomeBebida($nome);
        $this->setVolumeml($volumeml);
        $this->setAlcoolico($alcoolico);
        $this->setDescricao($descricao);
        $this->setPreco($preco);

    }
    //Getters and setters

    public function setIdBebida(int $pIdBebida): void
    {
        $this->idBebida = $pIdBebida;
    }

    public function getIdBebida(): int
    {
        return $this->idBebida;
    }

    public function getNomeBebida(): string
    {
        return $this->nomeBebida;
    }

    public function setNomeBebida(string $pNomeBebida): void
    {
        $nome = trim($pNomeBebida);

        if ($nome === "") {
            throw new Exception("O nome da bebida não pode ser vazio");
        } else if (strlen($nome) < 3) {
            throw new Exception("O nome da bebida deve ter ao menos 3 caracteres");
        }

        $this->nomeBebida = $pNomeBebida;
    }

    public function getVolumeml(): float
    {
        return $this->volumeml;
    }

    public function setVolumeml($pVolumeml): void
    {
        if (!is_numeric($pVolumeml)) {
            throw new Exception("O volume da bebida deve ser um valor numérico");
        }

        $volume = (float) $pVolumeml;
        if ($volume < 200) {
            throw new Exception("O volume da bebida deve ser maior do que 200 ml");
        }

        $this->volumeml = $volume;
    }

    public function getAlcoolico(): bool
    {
        return $this->alcoolico;
    }

    public function setAlcoolico($pAlcoolico): void
    {
        if (!is_bool($pAlcoolico)) {
            throw new Exception("O valor de alcoólico deve ser TRUE ou FALSE");
        }

        $this->alcoolico = $pAlcoolico;
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
            throw new Exception("O preço da bebida não pode ser texto");
        }

        $preco = (float) $pPreco;
        if ($preco <= 0) {
            throw new Exception("O preço da bebida deve ser maior do que zero");
        }

        $this->preco = $preco;
    }

    public function getPrecoFormatado(): string
    {
        return "R$" . number_format($this->preco, 2, ',', '.');
    }

    public function getBebidaHTML(): string
    {
        return "Id" . $this->getIdBebida() . "<br>
        Nome da Bebida:" . $this->getNomeBebida() . "<br>
        Volume (ml): " . $this->getVolumeml() . "<br>
        Alcoólico: " . ($this->getAlcoolico() ? "TRUE" : "FALSE") . "<br>
        Descrição: " . $this->getDescricao() . "<br>
        Preço:" . $this->getPrecoFormatado();

    }

}