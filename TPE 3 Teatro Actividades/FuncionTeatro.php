<?php
include 'FuncionTPE3.php';

class FuncionTeatro extends FuncionTPE3
{

    /**
     * FuncionTeatro constructor.
     */
    public function __construct($nom, $hora, $tiempo, $costo)
    { parent:: __construct($nom, $hora, $tiempo, $costo);

    }

    public function __toString(): string
    {
        return parent::__toString();
    }


}