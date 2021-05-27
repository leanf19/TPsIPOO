<?php
include_once "Equipo.php";
class Partido {

    private $idPartido;
    private $fecha;
    private $equipo1;
    private $cantGolesE1;
    private $equipo2;
    private $cantGolesE2;



    //Metodo constructor
 public function __construct($idPartido, $fecha, $equipo1, $cantGolesE1, $equipo2, $cantGolesE2)
{
    $this->idPartido = $idPartido;
    $this->fecha = $fecha;
    $this->equipo1 = $equipo1;
    $this->cantGolesE1 = $cantGolesE1;
    $this->equipo2 = $equipo2;
    $this->cantGolesE2 = $cantGolesE2;
}


public function getIdPartido()
{
    return $this->idPartido;
}

public function setIdPartido($idPartido): void
{
    $this->idPartido = $idPartido;
}

public function getFecha()
{
    return $this->fecha;
}

public function setFecha($fecha): void
{
    $this->fecha = $fecha;
}

public function getEquipo1()
{
    return $this->equipo1;
}

public function setEquipo1($equipo1): void
{
    $this->equipo1 = $equipo1;
}

public function getCantGolesE1()
{
    return $this->cantGolesE1;
}

public function setCantGolesE1($cantGolesE1): void
{
    $this->cantGolesE1 = $cantGolesE1;
}

public function getEquipo2()
{
    return $this->equipo2;
}

public function setEquipo2($equipo2): void
{
    $this->equipo2 = $equipo2;
}

public function getCantGolesE2()
{
    return $this->cantGolesE2;
}

public function setCantGolesE2($cantGolesE2): void
{
    $this->cantGolesE2 = $cantGolesE2;
}

    public function __toString()
    {
        $salida = "idPartido: {$this->getIdPartido()}
        \nFecha:{$this->getFecha()}
        \nEquipo 1:{$this->obtenerCadenaE1()}\n
        Cantidad goles E1: {$this->getCantGolesE1()}
        \nEquipo 2: {$this->obtenerCadenaE2()}
        \nCantidad goles E2: {$this->getCantGolesE2()}";

        return $salida;
    }


    public function obtenerCadenaE1(){

        $equipo1 = $this->getEquipo1();
        $cadena = $equipo1->__toString();
        return $cadena;
    }

    public function obtenerCadenaE2(){

        $equipo2 = $this->getEquipo2();
        $cadena = $equipo2->__toString();
        return $cadena;
    }


}