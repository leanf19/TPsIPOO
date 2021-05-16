<?php
require "FuncionTPE3.php";


class FuncionCine extends FuncionTPE3
{
    private $genero;
    private $pais;


    public function __construct($nom, $hora, $tiempo, $costo,$igenero, $ipais)
    {   parent:: __construct($nom, $hora, $tiempo, $costo);
        $this->genero = $igenero;
        $this->pais = $ipais;
    }


    public function getGenero()
    {
        return $this->genero;
    }


    public function setGenero($igenero): void
    {
        $this->genero = $igenero;
    }


    public function getPais()
    {
        return $this->pais;
    }


    public function setPais($ipais): void
    {
        $this->pais = $ipais;
    }

    public function __toString(): string
    {
        $cadena = parent::__toString();
        $cadena.= "Genero:{$this->getGenero()}
                 \nPais:{$this->getPais()}\n";
        return $cadena;

    }
    public function calcularCosto()
    { //Teniendo en cuenta que el costo es lo que se le aplica al total solo se vera reflejado el interes no la suma de la entrada+interes (no *1.65)
        return parent::calcularCosto() * 0.65;
    }
}