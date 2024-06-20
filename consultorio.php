<?php

class Consultorio{
    private $nome;
    private $anoNasc;
    private $peso;
    private $altura;

    public function __construct()
    {
        $this->nome = " ";
        $this->anoNasc = 0;
        $this->peso = 0.0;
        $this->altura = 0.0;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setAnoNasc($anoNasc){
        $this->anoNasc = $anoNasc;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function setAltura($altura){
        $this->altura = $altura;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getAnoNasc(){
        return $this->anoNasc;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function calcularIdade($anoNasc){
        return (2024 - $anoNasc);
    }

    public function calcularImc($peso, $altura){
        return number_format(($peso / pow($altura, 2)), 2);
    }

    public function imprimirTudo(){
        echo "Ficha Técnica de $this->nome <br>";
        echo "Altura: $this->altura m <br>";
        echo "Peso: $this->peso Kg <br>";
        echo "Idade: ".$this->calcularIdade($this->anoNasc)." anos <br>";
        echo "IMC: ".$this->calcularImc($this->peso, $this->altura)." <br>";
    }
}