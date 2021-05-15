<?php


class FuncionTPE3
{
    private $nombre;
    private $horaInicio;
    private $duracion;
    private $precio;


    public function __construct($nom, $hora, $tiempo, $costo)
    {
        $this->nombre = $nom;
        $this->horaInicio = $hora;
        $this->duracion = $tiempo;
        $this->precio = $costo;

    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }

    public function setHoraInicio($hora)
    {
        $this->horaInicio = $hora;
    }

    public function setDuracion($tiempo)
    {
        $this->duracion = $tiempo;
    }

    public function setPrecio($costo)
    {
        $this->precio = $costo;


    }
    public function __toString(): string
    {
        $cadena = "\nNombre de la funcion: {$this->getNombre()}
        \n Hora de inicio: {$this->getHoraInicio()}
        \n Duracion: {$this->getDuracion()}
        \nPrecio: {$this->getPrecio()}\n";

        return $cadena;
    }

    public function calcularCosto()
    {
        return $this->getPrecio();
    }
}