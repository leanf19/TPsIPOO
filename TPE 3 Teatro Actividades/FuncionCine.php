<?php
include 'FuncionTPE3.php';


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
        $salida = parent::__toString();
        $salida.= "Genero:{$this->getGenero()}
                 \nPais:{$this->getPais()}";
        return $salida;

    }

}