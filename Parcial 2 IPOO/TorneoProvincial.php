<?php

class TorneoProvincial extends Torneo {

    private $provincia;

    public function __construct($idTorneo,$colPartidos, $montoPremio, $localidad, $provincia)
    {
        parent:: __construct($idTorneo,$colPartidos, $montoPremio, $localidad);
        $this->$provincia = $provincia;
    }


    public function getProvincia()
    {
        return $this->provincia;
    }


    public function setProvincia($provincia): void
    {
        $this->provincia = $provincia;
    }

    public function __toString(): string
    {
        $cadena = parent::__toString();
        $cadena.= "Provincia: {$this->getProvincia()}";
        return $cadena;

    }
    public function obtenerPremioTorneo()
    {
        return $this->getMontoPremio();
    }
}