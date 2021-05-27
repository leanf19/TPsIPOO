<?php

class Torneo {

    private $idTorneo;
    private $partidos;
    private $montoPremio;
    private $localidad;

    //Metodo Constructor
    public function __construct($idTorneo,$colPartidos,$montoPremio, $localidad)
    {
        $this->idTorneo = $idTorneo;
        $this->partidos = $colPartidos;
        $this->montoPremio = $montoPremio;
        $this->localidad = $localidad;
    }


    public function getIdTorneo()
    {
        return $this->idTorneo;
    }


    public function setIdTorneo($idTorneo): void
    {
        $this->idTorneo = $idTorneo;
    }



    public function getPartidos(): array
    {
        return $this->partidos;
    }


    public function setPartidos(array $partidos): void
    {
        $this->partidos = $partidos;
    }


    public function getMontoPremio()
    {
        return $this->montoPremio;
    }


    public function setMontoPremio($montoPremio): void
    {
        $this->montoPremio = $montoPremio;
    }


    public function getLocalidad()
    {
        return $this->localidad;
    }


    public function setLocalidad($localidad): void
    {
        $this->localidad = $localidad;
    }

    public function __toString(): string
    {
        $salida = "Id Torneo: {$this->getIdTorneo()}
        \nMonto Premio: {$this->getMontoPremio()}
        \nLocalidad : {$this->getLocalidad()}
        \nPartidos :\n";
        //a continuacion se muestra cada Partido del arreglo
        $salida .= $this->concatenarFunciones();
        return $salida;
    }

    public function concatenarFunciones()
    {
        $i=1;
        $salida = "";
        foreach ($this->partidos as $partido) {
            $salida .= "-----------------------------------------------\n";
            $salida .= "Partido $i:";
            $salida .= $partido->__toString();
            $salida .= "-----------------------------------------------\n";
            $i++;
        }
        return $salida;
    }


    public function obtenerEquipoGanadorTorneo()
    {
        $partidosJugados = array();
        foreach ($this->getPartidos() as $partido) {
            $equipo1 = $partido->getEquipo1()->getNombre();
            $equipo2 = $partido->getEquipo2()->getNombre();
            if ($partido->getCantGolesE1() > $partido->getCantGolesE2()) {
                //Si gana el Equipo1 Comprueba que el objeto equipo1 exista en la coleccion de partidos jugados
                if (array_key_exists($equipo1, $partidosJugados)) {
                    $partidosJugados[$equipo1]['Ganados']++;
                    $partidosJugados[$equipo1]['goles'] += $partido->getCantGolesE1();
                    //Comprueba que el objeto equipo2 exista en la coleccion de partidos jugados
                    if (array_key_exists($equipo2, $partidosJugados)) {
                        $partidosJugados[$equipo2]['goles'] += $partido->getCantGolesE2();
                    } else {
                        //Si el objeto equipo2 no existe en la coleccion de partidos jugados la añade
                        $partidosJugados[$equipo2] = array("Equipo" => $partido->getEquipo2(), "Ganados" => 0, "goles" => $partido->getCantGolesE2());
                    }
                } else {
                    //Si el objeto equipo1 no existe en la coleccion de partidos jugados la añade
                    $partidosJugados[$equipo1] = array("Equipo" => $partido->getEquipo1(), "Ganados" => 1, "goles" => $partido->getCantGolesE1());
                    if (array_key_exists($equipo2, $partidosJugados)) {

                        $partidosJugados[$equipo2]['goles'] += $partido->getCantGolesE2();
                    } else {
                        //Si el objeto equipo2 no existe en la coleccion de partidos jugados la añade
                        $partidosJugados[$equipo2] = array("Equipo" => $partido->getEquipo2(), "Ganados" => 0, "goles" => $partido->getCantGolesE2());
                    }
                }
            } else if ($partido->getCantGolesE2() > $partido->getCantGolesE1()) {
                //SI GANA el Equipo 2 comprueba que el objeto equipo2 exista en la coleccion de partidos jugados
                if (array_key_exists($equipo2, $partidosJugados)) {
                    //incrementa la cantidad de partidos ganados
                    $partidosJugados[$equipo2]['Ganados']++;
                    //suma a la cantidad de goles total
                    $partidosJugados[$equipo2]['goles'] += $partido->getCantGolesE2();
                    if (array_key_exists($equipo1, $partidosJugados)) {
                        $partidosJugados[$equipo1]['goles'] += $partido->getCantGolesE1();
                    } else {
                        $partidosJugados[$equipo1] = array("Equipo" => $partido->getEquipo1(), "Ganados" => 0, "goles" => $partido->getCantGolesE1());
                    }
                } else {
                    //Si el objeto equipo2 no existe en la coleccion de partidos jugados la añade
                    $partidosJugados[$equipo2] = array("Equipo" => $partido->getEquipo2(), "Ganados" => 1, "goles" => $partido->getCantGolesE2());
                    if (array_key_exists($equipo1, $partidosJugados)) {
                        $partidosJugados[$equipo1]['goles'] += $partido->getCantGolesE1();
                    } else {
                        $partidosJugados[$equipo1] = array("Equipo" => $partido->getEquipo1(), "Ganados" => 0, "goles" => $partido->getCantGolesE1());
                    }
                }
            } else {

                //EN CASO DE EMPATE Se guardan solo los goles de cada equipo y si no existen en la coleccion de partidos jugados se crean
                if (array_key_exists($equipo1, $partidosJugados)) {
                    $partidosJugados[$equipo1]['goles'] += $partido->getCantGolesE1();
                } else {
                    $partidosJugados[$equipo1] = array("Equipo" => $partido->getEquipo1(), "Ganados" => 0, "goles" => $partido->getCantGolesE1());
                }

                if (array_key_exists($equipo2, $partidosJugados)) {
                    $partidosJugados[$equipo2]['goles'] += $partido->getCantGolesE2();
                } else {
                    $partidosJugados[$equipo2] = array("Equipo" => $partido->getEquipo2(), "Ganados" => 0, "goles" => $partido->getCantGolesE2());
                }
            }
        }
        //Compara los equipos de la lista de partidos jugados dos a dos para obtener el de mayor cantidad de partidos ganados en la primer posicion del arreglo
        usort($partidosJugados, function ($E1, $E2) {
            return $E1['Ganados'] <=> $E2['Ganados'];
        });
        //Guarda y devuelve al equipo con mayor cantidad de goles
        if (!empty($partidosJugados)) {
            $primerEquipo = $partidosJugados[array_key_first($partidosJugados)];
            $equipoGanador = array("Equipo" => $primerEquipo['Equipo'], "goles" => ['goles']);
        }

        return $equipoGanador;
    }

    public function obtenerPremioTorneo()
    {
        return $this->getMontoPremio();
    }

}