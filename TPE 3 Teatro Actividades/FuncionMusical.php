<?php
include "FuncionTPE3.php";

class FuncionMusical extends FuncionTPE3
{
 private $director;
 private $cantPersonas;

    /**
     * FuncionMusical constructor.
     * @param $director
     * @param $cantPersonas
     */
    public function __construct($nom, $hora, $tiempo, $costo,$dir, $cantPers)
    {   parent:: __construct($nom, $hora, $tiempo, $costo);
        $this->director = $dir;
        $this->cantPersonas = $cantPers;
    }


    public function getDirector()
    {
        return $this->director;
    }


    public function setDirector($dir): void
    {
        $this->director = $dir;
    }


    public function getCantPersonas()
    {
        return $this->cantPersonas;
    }


    public function setCantPersonas($cantPers): void
    {
        $this->cantPersonas = $cantPers;
    }

    public function __toString(): string
    {
        $cadena = parent::__toString();
        $cadena.= "Director:{$this->getDirector()}
                 \nPersonas en Escena:{$this->getCantPersonas()}";
        return $cadena;

    }
    public function calcularCosto()
    {
        return parent::calcularCosto() * 1.12;
    }
}