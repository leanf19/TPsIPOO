<?php
require "Torneo.php";

class TorneoNacional extends Torneo {



    public function __construct($idTorneo,$colPartidos, $montoPremio, $localidad)
    {
        parent:: __construct($idTorneo,$colPartidos, $montoPremio, $localidad);
    }

    public function obtenerPremioTorneo()
    {
        $equipoGanador = $this->obtenerEquipoGanadorTorneo();
        $equipo = $equipoGanador['Equipo'];
        $cantGanados = 0;
        foreach ($this->getPartidos() as $partido) {
            if ($partido->getCantGolesE1() > $partido->getCantGolesE2()) {
                if ($equipo == $partido->getEquipo1()) {
                    $cantGanados++;
                } else {
                    if ($equipo == $partido->getEquipo2()) {
                        $cantGanados++;
                    }
                }
            }
        }

        return (parent::obtenerPremioTorneo() * 1.10) * $cantGanados;
    }

}
