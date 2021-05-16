<?php
//include "FuncionTPE3.php";

class FuncionTeatro extends FuncionTPE3
{

    /**
     * FuncionTeatro constructor.
     */
    public function __construct($nomb, $hora, $tiempo, $costo)
    { parent:: __construct($nomb, $hora, $tiempo, $costo);

    }

    public function __toString(): string
    {
        return parent::__toString();
    }
    public function calcularCosto()
    { //Teniendo en cuenta que el costo es lo que se le aplica al total solo se vera reflejado el interes no la suma de la entrada+interes (no *1.45)
        return parent::calcularCosto() * 0.45;
    }

}