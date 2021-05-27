<?php

class Categoria {

    private $idCategoria;
    private $descripcion;

    //Metodo constructor
    public function __construct($idCategoria, $descripcion)
    {
        $this->idCategoria = $idCategoria;
        $this->descripcion = $descripcion;
    }


    public function getIdCategoria()
    {
        return $this->idCategoria;
    }


    public function setIdCategoria($idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }


    public function getDescripcion()
    {
        return $this->descripcion;
    }


    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }


    public function __toString(): string
    {     $salida = "Id Categoria: {$this->getIdCategoria()}
        \nDescripcion: {$this->getDescripcion()}\n";
        return $salida;

    }
}