<?php
include_once "Categoria.php";
class Equipo {

private $nombre;
private $nombreCapitan;
private $cantJugadores;
private $categoria;

    //Metodo constructor
    public function __construct($nombre, $nombreCapitan, $cantJugadores, $categoria)
    {
        $this->nombre = $nombre;
        $this->nombreCapitan = $nombreCapitan;
        $this->cantJugadores = $cantJugadores;
        $this->categoria = $categoria;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }


    public function getNombreCapitan()
    {
        return $this->nombreCapitan;
    }


    public function setNombreCapitan($nombreCapitan): void
    {
        $this->nombreCapitan = $nombreCapitan;
    }


    public function getCantJugadores()
    {
        return $this->cantJugadores;
    }


    public function setCantJugadores($cantJugadores): void
    {
        $this->cantJugadores = $cantJugadores;
    }


    public function getCategoria()
    {
        return $this->categoria;
    }


    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }

    public function __toString(): string
    {
        $salida = "Nombre Equipo: {$this->getNombre()}
        \nCapitan: {$this->getNombreCapitan()}
        \nCantidad de Jugadores: {$this->getCantJugadores()}
        \nCategoria: {$this->obtenerCategoria()}";

         return $salida;
    }

    public function obtenerCategoria(){
        return $this->getCategoria()->__toString();
    }
}